<?php
function check_login($csrftoken) {
    require_once('config.php');
    if ($csrftoken == md5($username.$password)) { return true; } else { return false; }
}
function check_username_password($u,$p) {
    require_once('config.php');
    if (($u == $username) && ($p == $password)) { return true; } else { return false; }
}
?>