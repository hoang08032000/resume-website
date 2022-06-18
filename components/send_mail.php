<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';
include 'database.php';
if ($_GET['id']) {
    $user_id = $_GET['id'];
    $user = mysqli_query($connect, 'SELECT * FROM user WHERE id = "' . $user_id . '"');
    $user_name = '';
    if (mysqli_num_rows($user) > 0) {
        foreach ($user as $row) {
            $user_name = $row['first_name'] . ' ' . $row['last_name'];
        }
    }
}


if (isset($_POST['send-mail'])) {

    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'ssl://smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'testphpsendmail83@gmail.com';                     //SMTP username
        $mail->Password   = 'gfoepoogdwmjaigh';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('testphpsendmail83@gmail.com.com', 'Resume Website');
        $mail->addAddress($_POST['your_email'], $_POST['your_name']);     //Add a recipient
        // $mail->addAddress('hoangtoviet.803@gmail.com');               //Name is optional
        // $mail->addReplyTo('info@example.com', 'Information');
        // $mail->addCC('cc@example.com');
        // $mail->addBCC('bcc@example.com');

        // //Attachments
        // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = '[CV] Send from Resume Website';
        $mail->Body    = 'Chúng tôi quan tâm đến CV của bạn <b>"' . $user_name . '"!</b>';
        $mail->AltBody = $_POST['your-message'];

        if ($mail->send()) {
            echo '<script>
                    alert("Thành công")
                    window.open("index.php?page=home","_self")
                </script>';
        } else {
            echo '<script>alert("Thất bại")</script>';
        }
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>
<form action="" method="POST">
    <section class="contact section" id="contact">
        <h2 class="section-title">Contact</h2>

        <div class="contact__container bd-grid">
            <form action="" class="contact__form">
                <input type="text" placeholder="Your name" class="contact__input" name="your_name">
                <input type="mail" placeholder="Your mail address*" class="contact__input" name="your_email">

                <textarea name="" id="" cols="0" rows="10" placeholder="Enter your message*" class="contact__input" name="your_message"></textarea>

                <input name="send-mail" type="submit" value="Submit" class="contact__button button">
            </form>
        </div>
    </section>
</form>