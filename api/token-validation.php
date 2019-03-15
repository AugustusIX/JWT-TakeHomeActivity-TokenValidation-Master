<?php
    require_once('connection.php');
    require_once('generate-token.php');

    session_start();
    $jwt = $_SESSION['jwt'];    
    $id = $_SESSION['id'];

    validateToken($id, $jwt, $conn);

    function validateToken($id, $userToken, $conn){
        $existingToken = generateToken($id, 1, $conn);

        echo "Existing token: ". $existingToken;

        if($userToken===$existingToken){
            echo "<br> Valid token";
            echo "<br>";
            echo "$userToken";
        }else{
            echo "<br> Invalid token!";
            echo "<br>";
            echo "$userToken";
        }
    }
?>