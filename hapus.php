<?php
session_start();
if(!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}
require "functions.php";
if(isset($_GET['id'])) {
 hapus($_GET['id']);
}
?>