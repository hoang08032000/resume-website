<?php
include("connect_db.php");
$page = '';
if (isset($_GET['page'])) {
    $page = $_GET['page'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>

</head>

<body>
    <?php
    // echo $_SESSION['profile_session'];
    if ($page == 'signin') {
        if (!isset($_SESSION['profile_session'])) {
            include 'components/sign_in.php';
        } else {
            echo "<script>window.open('index.php','_self')</script>";
        }
    } elseif ($page == 'profile') {
        if (!isset($_SESSION['profile_session'])) {
            include 'components/nav.php';
            include 'components/home.php';
            include 'components/about.php';
            include 'components/education.php';
            include 'components/experience.php';
            include 'components/skill.php';
            include 'components/fotter.php';
        } else {
            echo "<script>window.open('index.php','_self')</script>";
        }
    } elseif ($page == 'signout'){
        unset($_SESSION['profile_session']);
		echo "<script>window.open('index.php','_self')</script>";
    } else {
        echo 'not thing here';
    }
    // if (!isset($_SESSION['profile_session'])) {
    //     // if($post == )
    // } else {
    // }
    ?>




    <!--SCROLL REVEAL-->
    <script src="https://unpkg.com/scrollreveal"></script>

    <!--MAIN JS-->
    <script src="js/main.js"></script>
</body>

</html>