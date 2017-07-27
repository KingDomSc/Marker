<?php
session_start();
include('api/api.php');
if (isset($_SESSION['csrftoken'])) {
    if (check_login($_SESSION['csrftoken']) == false) { header('location: index.php'); }
} else { header('location: index.php'); }
if (isset($_GET['id'])) {
    include('api/blacklist.php');
    $ip = base64_decode(htmlspecialchars($_GET['id']));
    $file = fopen('api/blacklist.php','w') or die('error');
    $blacklist = str_replace($ip.'-', '', $blacklist);
    $data = '<?php
$blacklist = "'.$blacklist.'";
?>';
    fwrite($file, $data);
    fclose($file);
    header('location: blacklist.php');
}
if (isset($_GET['event'])) {
    $file = fopen('api/blacklist.php','w') or die('error');
    $blacklist = str_replace($ip.'-', '', $blacklist);
    $data = '<?php
$blacklist = "";
?>';
    fwrite($file, $data);
    fclose($file);
    header('location: blacklist.php');
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
        <style>
            #inside:hover {
                background: #c5c5c5;
            }
            #t:hover i {
                color: red;
            }
        </style>
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
        <section class="table">
            <table style="width: 100%;">
                <tr>
                    <th>#</th>
                    <th colspan="2">IP ADDRESS</th>
                </tr>
                <?php
                include('api/blacklist.php');
                $array1 = explode('-', $blacklist);
                $loops = 0;
                foreach ($array1 as $x) {
                    if ($loops <= (count($array1) - 2)) {
                ?>
                <tr id="inside">
                    <th><?php echo $loops + 1; ?></th>
                    <th style="position: absolute;"><?php echo $x; ?></th>
                    <th id="t" style="text-align: right;"><a href="blacklist.php?id=<?php echo base64_encode($x); ?>"><i class="fa fa-trash" aria-hidden="true"></i></a></th>
                </tr>
                <?php
                    }
                    $loops = $loops + 1;
                }
                ?>
            </table>
            <?php
            if (strlen($blacklist) >= 1) {
            ?>
            <section class="removeall">
                <a href="blacklist.php?event">Remove All</a>
            </section>
            <?php
            }
            ?>
        </section>
    </body>
</html>