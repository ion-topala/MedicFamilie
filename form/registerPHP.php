<?php

session_start();
include("connection.php");
include("functions.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    //smth was posted
    $username = clearString($_POST['username']);
    $password = clearString($_POST['password']);
    $password2 = clearString($_POST['password2']);
    $fname =  clearString($_POST['firstName']);
    $sname =  clearString($_POST['secondName']);

    $username = mysqli_real_escape_string($con, $username);
    $password = mysqli_real_escape_string($con, $password);
    $password2 = mysqli_real_escape_string($con, $password2);
    $fname = mysqli_real_escape_string($con, $fname);
    $sname = mysqli_real_escape_string($con, $sname);

    $query = "select * from users where user_name = '$username' limit 1";
    $check_login = mysqli_query($con,$query);

    if (mysqli_num_rows($check_login) > 0){
        $response = [
            'status' => false,
            'type' => 1,
            'message' => "Asa utilizator deja exista",
            'fields' => ['username']
        ];
        echo json_encode($response);
    }
    else{
        if($username === '' || !filter_var($username, FILTER_VALIDATE_EMAIL)){
            $error_fields[] = 'username';
        }
        if ($password === '' || strlen($password) < 8 || strongPassword($password)){
            $error_fields[] = 'password';
        }
        if ($password2 === '' || $password2 !==$password ){
            $error_fields[] = 'password2';
        }
        if($fname === '' || is_numeric($fname))
        {
            $error_fields[] = 'firstName';
        }
        if ($sname === '' || is_numeric($sname))
        {
            $error_fields[] = 'secondName';
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

        $user_id = random_num(20);
        $query = "INSERT INTO users(user_id, user_name, password, nume, prenume) values ('$user_id', '$username', '$password', '$fname','$sname')";
        mysqli_query($con, $query);
        $_SESSION['message'] = "Inregistrare cu succes!";
        $response = [
            //de verificat
            "status" => true,
            "message" => "Totul a decurs OK!",
        ];
        echo json_encode($response);
    }
}
