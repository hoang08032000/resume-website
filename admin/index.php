<?php
include("database.php");
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
    <title>Admin</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://cdn.ckeditor.com/ckeditor5/34.1.0/classic/ckeditor.js"></script>
    <script src="https://kit.fontawesome.com/072b43310d.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <?php
    if (!$page) {
        if (!isset($_SESSION['profile_session'])) {
            include 'components/sign_in.php';
        } else {
            echo "<script>window.open('index.php?page=home','_self')</script>";
        }
    } elseif($page == 'home'){
        include 'components/nav.php';
        include 'components/list_cv.php';
    } elseif($page == 'add-cv'){
        include 'components/nav.php';
        include 'components/form_cv.php';
    } elseif($page == 'edit-cv'){
        include 'components/nav.php';
        include 'components/edit_cv.php';
    } elseif($page == 'delete'){
        include 'components/delete.php';
    }
    // include 'list_cv.php';
    ?>
</body>

</html>