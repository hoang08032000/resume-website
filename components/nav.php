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

<header class="l-header">
    <nav class="nav bd-grid">
        <div>
            <a href="#" class="nav__logo"><?php echo $firstname . ' ' . $lastname ?></a>
        </div>

        <div class="nav__menu" id="nav-menu">
            <ul class="nav__list">
                <li class="nav__item"><a href="#home" class="nav__link active">Trang chủ</a></li>
                <li class="nav__item"><a href="#aboutme" class="nav__link">Về bản thân</a></li>
                <li class="nav__item"><a href="#experience" class="nav__link">Kinh nghiệm</a></li>
                <li class="nav__item"><a href="#skills" class="nav__link">Các kỹ năng</a></li>
                <!-- <li class="nav__item"><a href="#contact" class="nav__link">Contact</a></li> -->
            </ul>
        </div>
        <div class="nav__toggle" id="nav-toggle">
            <i class='bx bx-menu'></i>
        </div>
    </nav>
</header>