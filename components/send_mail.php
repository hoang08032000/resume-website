<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'class.phpmailer.php';
require 'class.smtp.php';
require 'vendor/autoload.php';

$mail = new PHPMailer(true);
try {

    $mail->IsSMTP(); 
    $mail->CharSet   = "utf-8";
    $mail->SMTPDebug  = 0;                     // enables SMTP debug information (for testing)
    $mail->SMTPAuth   = true;                    // enable SMTP authentication
    $mail->SMTPSecure = "ssl";                 // sets the prefix to the servier
    $mail->Host       = "smtp.gmail.com";        
    $mail->Port       = 465;
    $mail->Username   = 'testphpsendmail83@gmail.com';     // SMTP username
    $mail->Password   = '08032000tvh';         // SMTP password

    $mail->setFrom('testphpsendmail83@gmail.com', 'Name');           // Set sender of the mail
    $mail->addAddress('hoangtoviet.803@gmail.com');           // Add a recipient
    // $mail->addAddress('receiver2@gfg.com', 'Name');   // Name is optional

    $mail->isHTML(true);
    $mail->Subject = 'Subject';
    $mail->Body    = 'HTML message body in <b>bold</b>!';
    $mail->AltBody = 'Body in plain text for non-HTML mail clients';

    if ($mail->send()) {
        echo 'thanhcong';
    } else {
        echo 'that bai';
    }
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
// include 'send-mail-func.php';
// if (isset($_POST['send-mail'])) {
//     if (sendMail('PHP send mail', $_POST['your_name'] . $_POST['your_email'], $_POST['your_email'], '')) {
//         echo 'thanh cong';
//     } else {
//         echo 'that bai';
//     }
// }

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