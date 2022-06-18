<?php
include 'database.php';

$user_id = $_GET['id'];
echo $user_id;
$sql = 'SELECT * FROM user WHERE id = "' . $user_id . '"';

$user = mysqli_query($connect, $sql);

$firstname = '';
$lastname = '';
$address = '';
$email = '';
$phone = '';
// $dob = '';

if (mysqli_num_rows($user) > 0) {
    foreach ($user as $row) {
        $firstname = $row['first_name'];
        $lastname = $row['last_name'];
        $address = $row['address'];
        $phone = $row['phone'];
        $email = $row['email'];
    }
}

?>

<footer class="footer">
    <p class="footer__title"><?php echo $firstname . ' ' . $lastname ?></p>

    <!-- <div class="footer__social">
        <p class="footer__text">Mạng xã hội</p><br>
        <a href="#" class="footer__icon"><i class='bx bxl-linkedin'></i></a>
        <a href="#" class="footer__icon"><i class='bx bxl-facebook-circle'></i></a>
        <a href="#" class="footer__icon"><i class='bx bxl-twitter'></i></a>
    </div> -->
    <div class="footer__contact">
        <p class="footer__text2">Liên hệ</p><br>
        <a href="#" class="footer__contacttext">Email: <?php echo $email ?> <br>ĐIện thoại: <?php echo $phone ?></a>
    </div>

</footer>