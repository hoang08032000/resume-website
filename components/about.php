<?php
include 'database.php';

$user_id = $_GET['id'];
$sql = 'SELECT * FROM user WHERE id = "' . $user_id . '"';
$sql_edu = 'SELECT * FROM education WHERE user_id = "'.$user_id.'"';
$user = mysqli_query($connect, $sql);
$edu = mysqli_query($connect, $sql_edu);

$firstname = '';
$lastname = '';
$address = '';
$email = '';
$phone = '';
$img = '';
// $dob = '';
$school = '';
$FoS = '';

if (mysqli_num_rows($user) > 0 && mysqli_num_rows($edu) > 0) {
    foreach ($user as $row) {
        $firstname = $row['first_name'];
        $lastname = $row['last_name'];
        $address = $row['address'];
        $phone = $row['phone'];
        $img = $row['image'];
        $email = $row['email'];
    }
    foreach($edu as $row){
        $school = $row['school_name'];
        $FoS = $row['field_of_study'];
    }
}



?>


<section class="home bd-grid" id="home">
    <div class="home__data">
        <h2 class="home__title">Xin chào,<br>Mình là <span class="home__title-color"><?php echo $lastname ?></span><br> Backend Developer </h2>

        <a href="index.php?page=send-mail&id=<?php echo $user_id ?>" class="button">Mail me</a>
    </div>

    <div class="home__social">
        <a href="" class="home__social-icon"><i class='bx bxl-linkedin'></i></a>
        <a href="" class="home__social-icon"><i class='bx bxl-facebook-circle'></i></a>
        <a href="" class="home__social-icon"><i class='bx bxl-twitter'></i></a>
    </div>

    <div class="home__img" >
        <img src="<?php echo $img ?>" alt="home__img" style="border-radius: 10px;">
    </div>
</section>

<section class="aboutme section " id="aboutme">
    <h2 class="section-title">Về bản thân</h2>

    <div class="aboutme__container bd-grid">
        <div class="aboutme__img">
            <img src="<?php echo $img ?>"  alt="home__img">
        </div>
        <div>
            <h2 class="aboutme__subtitle">Bản thân</h2>
            <p>Email: <?php echo $email ?></p>
            <p>Điện thoại: <?php echo $phone ?></p>
            <p>Địa chỉ: <?php echo $address ?></p>
            <br>
            <h2 class="aboutme__subtitle">Học vấn</h2>
            <p>Trường: <?php echo $school ?></p>
            <p>Chuyên ngành: <?php echo $FoS ?></p>
        </div>
    </div>


</section>