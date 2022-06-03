<?php 
     $DB_HOST = 'localhost';
     $DB_USER = 'root';
     $DB_PASSWORD = '08032000';
     $DB_NAME = 'web2022';
 
     $connect = mysqli_connect($DB_HOST, $DB_USER, $DB_PASSWORD, $DB_NAME);
     if(!$connect) {
         die("Cannot connect DB: ". mysqli_connect_error());
         exit();
     }
?>