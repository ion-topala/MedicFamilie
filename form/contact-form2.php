<?php
require 'PHPMailerAutoload.php';


$message = $_POST['message'];
$email = $_POST['email'];
$name = $_POST['name'];
$phone = $_POST['phone'];

if (filter_var($email, FILTER_VALIDATE_EMAIL) || $email !=='' || $message !=='' || $name !== '') {
    $response = [
        "status" => true,
    ];

    $mail = new PHPMailer;

    //$mail->SMTPDebug = 4;                               // Enable verbose debug output

    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'aposition30@gmail.com';                 // SMTP username
    $mail->Password = 'grdpricdiolyykke';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to
    $mail->Helo = "HELO";

    $mail->setFrom('aposition30@gmail.com', 'No-reply');
    $mail->addAddress('aposition30@gmail.com');     // Add a recipient
    //$mail->addAddress('ellen@example.com');               // Name is optional
    //$mail->addReplyTo('info@example.com', 'Information');
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');
    //
    //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
    $mail->isHTML(true);                                  // Set email format to HTML


    $mail->Subject = 'Message from the site';
    $mail->Body = "User Name: $name.<br>".
        "User Email: $email.<br>".
        "User Phone: $phone.<br>".
        "User Message: $message.<br>";
    //$mail->Body    = 'This is the HTML message body <b>in bold!</b>';
    $mail->AltBody = 'User message $message ';

    if (!$mail->send()) {
        echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
//        echo 'Message has been sent';
        echo json_encode($response);
    }
}else {
    $response = [
        "status" => false,
    ];
    echo json_encode($response);
}


//
//$to = 'aposition30@gmail.com';
//$from = 'FROM: Message from site\n\r';
//$email = $_POST['email'];
//$message = $_POST['message'];
//$name = $_POST['name'];
//
//$email_suject = "New Form Submission";
//
//$email_body = "User Name: $name.\n".
//    "User Email:$email.\n".
//    "User Message: $message.\n";
//
//$headers = "$from \r\n";
//$headers .= "Reply-to: $email \r\n";
//
