<?php
session_start();
include('api/api.php');
if (isset($_SESSION['csrftoken'])) {
    if (check_login($_SESSION['csrftoken']) == false) { header('location: index.php'); }
} else { header('location: index.php'); }
include('api/config.php');
if (isset($_POST['submit'])) {
    $config_file = fopen('api/config.php', 'w') or die('error');
    $data = '<?php
$username = '."'".$_POST['username']."'".'; # Admin username
$password = '."'".$_POST['password']."'".'; # Admin Password
?>';
    fwrite($config_file, $data);
    fclose($config_file);
    $_SESSION['csrftoken'] = md5($_POST['username'].$_POST['password']);
    header('location: setting.php');
}
?>
<html>
    <head>
        <title>Marker - Panel</title>
        <meta charset="utf-8">
        <meta name="robots" content="noodp"/>
        <meta property="og:locale" content="ar_AR" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=8" />
        <meta name="theme-color" content="#cccccc" />
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta http-equiv="Content-Script-Type" content="text/javascript" />
        <link type="text/css" rel="stylesheet" href="style.css">
        <script src="linked/a5794e9cdf.js"></script>
        <script src="linked/jquert-3.2.1.min.js"></script>
    </head>
    <body>
        <section class="head">
            <a href="panel.php">Home</a>
            <a href="setting.php">Setting</a>
            <a href="blacklist.php">Black List</a>
            <a href="api/builder.rar">Donwload Builder</a>
            <a href="logout.php">Logout</a>
        </section>
        <section class="tools">
            <form method="post">
                <input type="text" name="username" value="<?php echo $username; ?>"><br>
                <input type="text" name="password" value="<?php echo $password; ?>"><br><br>
                <input type="submit" name="submit" value="Change Username And Password">
            </form>
        </section>
    </body>
</html>