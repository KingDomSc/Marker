<?php
session_start();
include('api/api.php');
if (isset($_SESSION['csrftoken'])) {
    if (check_login($_SESSION['csrftoken']) == false) { header('location: index.php'); }
} else { header('location: index.php'); }
if (isset($_GET['p'])) {
    if (isset($_GET['m'])) {
        
    } else { header('location: index.php'); }
} elseif (isset($_GET['t'])) {
    if (isset($_GET['m'])) {
        
    } else { header('location: index.php'); }
} elseif (isset($_GET['r'])) {
    if (isset($_GET['m'])) {
        if (file_exists('vc/'.$_GET['m'].'.php')) {
            unlink('vc/'.$_GET['m'].'.php');
            header('location: panel.php');
        } else { header('location: panel.php'); }
    } else { header('location: index.php'); }
} elseif (isset($_GET['b'])) {
    if (isset($_GET['m'])) {
        if (file_exists('vc/'.$_GET['m'].'.php')) {
            require('api/blacklist.php');
            require('vc/'.$_GET['m'].'.php');
            if (strpos($blacklist, $ip_address.'-') !== 0) {
                $old = $blacklist . $ip_address . '-';
                $file = fopen('api/blacklist.php', 'w') or die(write_response('fail', 'there is problem in request'));
                fwrite($file, '<?php
$blacklist = "'.$old.'";
?>');
                fclose($file);
            }
            unlink('vc/'.$_GET['m'].'.php');
            header('location: panel.php');
        } else { header('location: panel.php'); }
    } else { header('location: index.php'); }
} else { header('location: index.php'); }
?>