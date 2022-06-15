<?php 
include 'database.php';
$user_id = $_GET['id'];
echo $user_id;
if($user_id) {
    $delete_user = mysqli_query($connect, 'DELETE FROM user  WHERE user.id = "'.$user_id.'"');
    $delete_experience = mysqli_query($connect, 'DELETE FROM experience  WHERE experience.user_id = "'.$user_id.'"');
    $delete_education = mysqli_query($connect, 'DELETE FROM education  WHERE education.user_id = "'.$user_id.'"');
    $delete_skill = mysqli_query($connect, 'DELETE FROM skills  WHERE skills.user_id = "'.$user_id.'"');

    if($delete_user && $delete_education && $delete_experience && $delete_skill) {
        echo '<script>alert("Delete success")</script>';
    } else {
        echo '<script>alert("Delete fail")</script>';
    }
    echo '<script>window.open("index.php?page=home","_self")</script>';
} else {
    echo '<script>alert("Delete fail")</script>';
    echo '<script>window.open("index.php?page=home","_self")</script>';
}
?>