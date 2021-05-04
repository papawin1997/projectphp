<?php
session_start();
session_destroy();
//header("location:login.php");
header('Location: ' . $_SERVER['HTTP_REFERER']);
?>