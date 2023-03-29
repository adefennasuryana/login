<?php 
include 'koneksi.php';

$id = $_GET['id'];
$username = $_POST['username'];
$email = $_POST['email'];
$password = md5($_POST['password']);

mysqli_query($conn, "UPDATE users set username='$username', email='$email', password='$password' WHERE id='$id'");


?>