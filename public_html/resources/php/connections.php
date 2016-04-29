<?PHP
$configured = false;

$local_config = dirname(__FILE__) . "/config-override.php";
if (file_exists($local_config)) {
    require_once($local_config);
} else {
    $convar["WWW-SVE"]["server"] = "localhost";
    $convar["WWW-SVE"]["db"] = "InFocus";
    $convar["WWW-SVE"]["pw"] = "dWidHLhdPmiZmCaD25Mn";
    $convar["WWW-SVE"]["user"] = "WWW-SVE";

    $convar["WWW-SIU"]["server"] = "localhost";
    $convar["WWW-SIU"]["db"] = "InFocus";
    $convar["WWW-SIU"]["pw"] = "1YVSApbt8EOeBanys4HE";
    $convar["WWW-SIU"]["user"] = "WWW-SIU";

    $convar["WWW-Admin"]["server"] = "localhost";
    $convar["WWW-Admin"]["db"] = "InFocus";
    $convar["WWW-Admin"]["pw"] = "0xWv4boo7i6IzI5mmQwj";
    $convar["WWW-Admin"]["user"] = "WWW-Admin";

    $connection = mysqli_connect($convar["WWW-SVE"]["server"],$convar["WWW-SVE"]["user"],$convar["WWW-SVE"]["pw"], $convar["WWW-SVE"]["db"],3306);
    error_log(mysqli_error($connection));
    $connection = mysqli_connect('67.43.0.33','InFocus','InF0cusP@ssw0rd', 'InFocus',3306);
    mysqli_set_charset($connection, "utf8");
    ini_set('default_charset', 'utf-8');
}
