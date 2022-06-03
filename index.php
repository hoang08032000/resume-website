<?php
include("connect_db.php");
// $page = '';
// if (isset($_GET['page'])) {
//     $page = $_GET['page'];
// }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <?php 
    include 'components/nav.php';
    include 'components/home.php';
    include 'components/about.php';
    include 'components/education.php';
    include 'components/experience.php';
    include 'components/skill.php';
    include 'components/fotter.php';
    ?>


    <!--SCROLL REVEAL-->
    <script src="https://unpkg.com/scrollreveal"></script>

    <!--MAIN JS-->
    <script src="js/main.js"></script>
</body>

</html>