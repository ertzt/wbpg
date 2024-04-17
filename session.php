<?php 
session_start();
function isLoggedIn(){
    return isset($_SESSION['username']);
}
function redirectToLogin(){
    if (!isLoggedIn()){
        header("Location: login.php");
    exit;
}
}
?>