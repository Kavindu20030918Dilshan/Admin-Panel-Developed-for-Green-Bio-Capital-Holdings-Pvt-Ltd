<?php

include "connection.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'Exception.php';
require 'PHPMailer.php';
require 'SMTP.php';

$email = $_POST["e"];
$vcode = uniqid();

$rs = Database::search("SELECT * FROM `admin` WHERE `email` = '" . $email . "'  ");
$num = $rs->num_rows;

if ($num > 0) {
    # user found

    Database::iud("UPDATE `admin` SET `vcode` = '" . $vcode . "' WHERE `email` = '" . $email . "' ");

    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth = true;                                   //Enable SMTP authentication
        $mail->Username = 'dilshan58762@gmail.com';                     //SMTP username
        $mail->Password = 'uwcxdtmkyevwvykt';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('dilshan58762@gmail.com', 'Green Bio Capital Holdings');
        $mail->addAddress($email);     //Add a recipient
        $mail->addReplyTo('info@example.com', 'Information');

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Admin Login Verification Code';
        $mail->Body = '<body style="margin: 0; padding: 0; font-family: Arial, sans-serif; background-color: #f6f6f6; color: #333333;">
    <div style="max-width: 600px; margin: 0 auto; background-color: #ffffff; padding: 20px; border-radius: 8px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
        
        <div style="padding: 20px 0; text-align: center;">
            <h1 style="font-size: 24px; color: #333333; margin: 0;"></h1>
            <p style="font-size: 16px; color: #666666; margin: 10px 0;">Please use the following verification code to complete admin signin.</p>
            <div style="display: inline-block; background-color: #0BDA51; color: #ffffff; font-size: 24px; padding: 10px 20px; border-radius: 4px; margin-top: 20px;">'.$vcode.'</div>
        </div>
        </br>
        <div style="text-align: center; padding-top: 20px; font-size: 12px; color: #aaaaaa;margin: top 10px;">
            &copy; 2024 Green Bio Capital Holdings || All rights reserved.
        </div>
    </div>
</body>';

        $mail->send();
        echo 'Success';
    } catch (Exception $email) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
} else {
    echo ("Admin Not Found. Please Check Your Email");
}
