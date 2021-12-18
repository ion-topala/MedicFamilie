<?php
session_start();
include ("connection.php");
include ("functions.php");

if($_SERVER['REQUEST_METHOD'] == "POST")
{

    //smth was posted
    $username = clearString($_POST['username']);
    $password = clearString($_POST['password']);

    $username = mysqli_real_escape_string($con, $username);
    $username = mysqli_real_escape_string($con, $username);
    $error_fields = [];

    if($username === '' || strlen($username) != 13){
        $error_fields[] = 'username';
    }
    if ($password === '' || strlen($password) < 8 || strongPassword($password)){
        $error_fields[] = 'password';
    }
    if (!empty($error_fields)){
        $response = [
          "status" => false,
            "type" => 1,
          "message" => "Check your inputs",
            "fields"=> $error_fields
        ];
        echo json_encode($response);
        die();
    }

    $password = md5($password);
    //read from database
    $query = "select * from users where user_name = '$username' limit 1";
    $result = mysqli_query($con,$query);

    if ($result)
    {
        if ($result && mysqli_num_rows($result) > 0)
        {
            $user_data = mysqli_fetch_assoc($result);
            if ($user_data['password'] == $password)
            {
                $_SESSION['user_id'] = $user_data['user_id'];

                $lastSeen = "select last_seen from users where user_name = '$username' limit 1";
                $resultLastSeen = mysqli_query($con,$lastSeen);
                $userLastSeen =  mysqli_fetch_assoc($resultLastSeen);

                     //sa fac verificare
                    $userLastSeen = $userLastSeen['last_seen'];
                    $_SESSION['date'] = "Last time online $userLastSeen";

                $lastSeen = "UPDATE users SET last_seen=now() WHERE user_name = '$username'";
                $resultLastSeen = mysqli_query($con,$lastSeen);

                //echo "Autorizare cu succes";
                $response = [
                  "status" => true
                ];
                echo json_encode($response);
                //header("Location: ../cinderella.php");
                die;
            }
        }
    }
    $response = [
        "status" => false,
        "message" => "Wrong username or password"
    ];
    echo json_encode($response);
}
