<?php session_start(); //start session?>

<?php
$_SESSION['username'] = null; // destroy the session no value is there
$_SESSION['firstname'] = null;
$_SESSION['lastname'] = null;
$_SESSION['user_role'] = null;

header("Location:../index.php");

?>