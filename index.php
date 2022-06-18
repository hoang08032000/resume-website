<?php
include("database.php");
$page = '';
$id = '';
if (isset($_GET['page'])) {
    $page = $_GET['page'];
    $id = $_GET['id'] ? $_GET['id'] : '';
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
    if ($page == 'home' || !$page) {
        if (!$id) {
            include 'components/home.php';
        } else {
            include 'components/nav.php';
            include 'components/about.php';
            include 'components/education.php';
            include 'components/experience.php';
            include 'components/skill.php';
            include 'components/fotter.php';
        }
    } else if ($page == 'send-mail') {
        include 'components/send_mail.php';
    }

    ?>




    <!--SCROLL REVEAL-->
    <script src="https://unpkg.com/scrollreveal"></script>

    <!--MAIN JS-->
    <script src="js/main.js"></script>
</body>

</html>