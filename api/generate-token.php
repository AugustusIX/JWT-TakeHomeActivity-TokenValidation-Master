<?php
  require_once('connection.php');

  function generateToken($id, $new_token, $conn){
    $header = [
      'typ' => 'JWT',
      'alg' => 'HS256',
      'dev' => 'Roidellene Eugenio'
    ];

    $header = json_encode($header);
    $header = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($header));

    $query = "SELECT * FROM tb_users WHERE id = '" . $id . "'";
		$result = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($result);

    if($new_token == 0)
    {
      $time = time();
      $date = date("Y-m-d h:m:s",$time);

      $sql = "UPDATE tb_users SET user_date = '".$date."' WHERE id = '".$id."'";
      $result = mysqli_query($conn, $sql);
    }
    else
    {
      $date = $row['user_date'];
    }

    $payload = [
      'id' => $row['id'],
      'username' => $row['username'],
      'full_name' => $row['full_name'],
      'user_date' => $date
    ];

    $payload = json_encode($payload);
    $payload = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($payload));

    $signature = hash_hmac('sha256', $header.".".$payload, base64_encode('leo123'));
    $signature = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($signature));

    $jwt = "$header.$payload.$signature";
    return $jwt;
  }
?>
