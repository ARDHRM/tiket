<?php
session_start();


if(!isset($_SESSION['username'])){
    die("Anda belum login");
	
}


if($_SESSION['level']!="user"){
    die("<script>alert('Anda Belum Mendaftar')</script>");
    header('Location:login.php');
}
?>