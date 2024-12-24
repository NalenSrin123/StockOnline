<?php
 session_start();
 if(empty($_SESSION['name'])){
    header('location: login.php');
 }else{
    header('location: dashboard.php');
 }   
?>