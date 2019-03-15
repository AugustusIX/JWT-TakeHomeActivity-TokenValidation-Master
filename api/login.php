<?php
    require_once('generate-token.php');
    require_once('connection.php');

    session_start();

    $username = $_POST['username'];
	$password = $_POST['password'];

	$query = "SELECT * FROM tb_users WHERE username = '" . $username . "' AND password = '" . $password . "'";

	$result = mysqli_query($conn, $query);
	$counter = mysqli_num_rows($result);

	if($counter == 1)
    {
		$sql = "SELECT * FROM tb_users WHERE username = '" . $username . "'";
		$result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($result);

        $id = $row['id'];
        $jwt = generateToken($id, 0, $conn);
        $_SESSION['id'] = $id;
        $_SESSION['jwt'] = $jwt;
        
        header("Location: ../token-validation.html");
    }
    else
    {
        echo "Login failed";
    }
?>