<?php
/*
*
* Veritabanı bağlantısı için
* gerekli bağlantı bilgilerinin
* bulunduğu ayar dosyası.
*
*/

header('Content-Type: text/html; Charset=UTF-8');
date_default_timezone_set('Europe/Istanbul');
/*
define('MYSQL_HOST',	'104.248.247.191');
define('MYSQL_DB',		'projects');
define('MYSQL_USER',	'test');
define('MYSQL_PASS',	'');
define('PATH',    'http://localhost/webproje.github.io/');*/

define('MYSQL_HOST',	'localhost');
define('MYSQL_DB',		'projects');
define('MYSQL_USER',	'root');
define('MYSQL_PASS',	'');
define('PATH',    'http://localhost/webproje.github.io/');

//include 'config/db.php';
//include '../../config/db.php';
try {
   // $conn = new PDO('mysql:host=104.248.247.191;dbname=projects;charset=utf8', "test", "");
   $conn = new PDO('mysql:host=localhost;dbname=projects;charset=utf8', "root", "");
}
catch (PDOException $hata){
    echo "Bağlantı hatası <br />" . $hata->getMessage();
}
    $configquery = $conn->prepare("SELECT * FROM config LIMIT 1");
    $configquery->execute();
    $configcount = $configquery->rowCount();
    $config = $configquery->fetch(PDO::FETCH_ASSOC);

    if($configcount>0){
        $SiteAdi   = $config["SiteAdi"];
        $SiteTitle   = $config["SiteTitle"];
        $SiteDescription   = $config["SiteDescription"];
        $SiteKeywords   = $config["SiteKeywords"];
        $SiteCopyright   = $config["SiteCopyright"];
        $SiteLogo   = $config["SiteLogo"];
        $SiteEmail   = $config["SiteEmail"];
        $SiteEmailSifre   = $config["SiteEmailSifre"];
        $FacebookLink   = $config["FacebookLink"];
        $TwitterLink   = $config["TwitterLink"];
        $InstagramLink   = $config["InstagramLink"];
        $SabitTelefon   = $config["SabitTelefon"];
        //$Author = $config["Author"];







    }
    else{
        die();
    }