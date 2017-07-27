<?php
session_start();
if (isset($_POST['submit'])) {
    include('api/api.php');
    if(check_username_password($_POST['username'], $_POST['password'])) {
        $_SESSION['csrftoken'] = md5($_POST['username'].$_POST['password']);
        header('location: panel.php');
    } else { header('location: index.php?err'); }
} else { header('location: index.php'); }
?>