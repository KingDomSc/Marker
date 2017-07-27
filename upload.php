<?php
if (isset($_FILES['upload'])) {
    $path = $_FILES['upload']['tmp_name'];
    $name = $_FILES['upload']['name'];
    $name2 = md5($_SERVER['REMOTE_ADDR']);
    $ex = strtolower(pathinfo($name, PATHINFO_EXTENSION));
    if (($ex == 'jpg') || ($ex == 'jpeg')) {
        echo move_uploaded_file($path, 'ss/'.$name2.'.jpg');
    } else { echo 'error'; }
} else { header('location: index.php'); }
?>