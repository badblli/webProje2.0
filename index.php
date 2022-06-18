<?php
require("config/config.php");
require("config/functions.php");
require("config/sitePages.php");
$icerikler = $conn->prepare("SELECT * FROM config ORDER BY id DESC");
$hepsi = $conn->prepare("SELECT COUNT(id) FROM products LIMIT 1");
$gubre = $conn->prepare("SELECT COUNT(id) FROM products WHERE urunTuru = 'Gübre' and urunDurum = '1'");
$ilac = $conn->prepare("SELECT COUNT(id) FROM products WHERE urunTuru = 'İlaç' and urunDurum = '1'");
$firmailac = $conn->prepare("SELECT distinct ureticiFirma FROM products WHERE urunTuru = 'İlaç' and urunDurum = '1'");
$firmagubre = $conn->prepare("SELECT distinct ureticiFirma FROM products WHERE urunTuru = 'Gübre' and urunDurum = '1'");
$butunfirmalar = $conn->prepare("SELECT distinct ureticiFirma FROM products  WHERE  urunDurum = '1'");
$hepsi->execute();
   $gubre->execute();
   $ilac->execute();
   $firmailac->execute();
    $firmagubre->execute();
    $butunfirmalar->execute();
$count = $hepsi->rowCount();
   $gubreCount = $gubre->rowCount();
   $ilacCount = $ilac->rowCount();
$urunToplam = $hepsi->fetch(PDO::FETCH_ASSOC);
   $gubreToplam = $gubre->fetch(PDO::FETCH_ASSOC);
   $ilacToplam = $ilac->fetch(PDO::FETCH_ASSOC);
    $firmailacToplam = $firmailac->fetch(PDO::FETCH_ASSOC);
    $firmagubreToplam = $firmagubre->fetch(PDO::FETCH_ASSOC);
    $butunfirmalarToplam = $butunfirmalar->fetch(PDO::FETCH_ASSOC);
/*if(isset($_REQUEST["SayfaKodu"])) {
    $SayfaKoduDegeri = SayiliIcerikleriFiltrele($_REQUEST["SayfaKodu"]);
} else {
    $SayfaKoduDegeri = 0;
}
echo $SayfaKoduDegeri;
//center'a yazılır ama bizim center yok
if((!$SayfaKoduDegeri) or ($SayfaKoduDegeri == "") or ($SayfaKoduDegeri==0)){
    include($Sayfa[0]);
}else{
    include($Sayfa[$SayfaKoduDegeri]);
}*/
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <style>
        .button {
            display: inline-block;
            border-radius: 4px;
            background-color: #53940c;
            border: none;
            color: #FFFFFF;
            text-align: center;
            font-size: 14px;
            padding: 10px;
            width: 150px;
            transition: all 0.5s;
            cursor: pointer;
            margin: 5px;
        }

        .button span {
            cursor: pointer;
            display: inline-block;
            position: relative;
            transition: 0.5s;
        }

        .button span:after {
            content: '\00bb';
            position: absolute;
            opacity: 0;
            top: 0;
            right: -20px;
            transition: 0.5s;
        }

        .button:hover span {
            padding-right: 25px;
        }

        .button:hover span:after {
            opacity: 1;
            right: 0;
    </style>
  <title><?php echo DonusumleriGeriDondur($SiteTitle); ?></title>
  <meta charset="utf-8">
    <meta name="Robots" content="index, follow">
    <meta name="googlebot" content="index, follow">
    <meta name="revisit-after" content="7 days">
    <meta name="description" content="<?php echo DonusumleriGeriDondur($SiteDescription); ?>">
    <meta name="keywords" content="<?php echo DonusumleriGeriDondur($SiteKeywords); ?>">
    <meta name="copyright" content="<?php echo DonusumleriGeriDondur($SiteCopyright); ?>">

  <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  <link rel="stylesheet" type="text/css" href="style.css" />
    <script type="text/javascript" src="config/functions.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">

<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
     <strong> <a class="navbar-brand" href="#">Balabanlar</a></strong>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#about">HAKKIMIZDA</a></li>
        <li><a href="#news">HABERLER</a></li>
        <li><a href="#products">ÜRÜNLER</a></li>
        <li><a href="#contact">İLETİŞİM</a></li>
        <li><a href="xtbadmin/Sayfalar/Anasayfa.php">ADMIN</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="jumbotron text-center">

  <h1>Balabanlar </h1>
  <p>Ziraat Mühendisliği</p>
  <p>Bu web sayfası Ondokuz Mayıs Üniversitesi Web Projesi Yönetimi dersi Final Projesi için oluşturulmuştur.</p>

<p>20480098 - Busenur Adıbelli</p><a href="https://badblli.me" title="Visit Owner">badblli.me</a></p>
</div>

<!-- Container (About Section) -->
<div id="about" class="container-fluid">
  <div class="row">
    <div class="col-sm-8">
      <h2>FİRMAMIZ HAKKINDA</h2><br>
      <h4>16 yıllık tecrübe...</h4><br>
      <p><?php echo DonusumleriGeriDondur($SiteDescription); ?></p>
      <br><a href="#products" button class="btn btn-default btn-lg">Ürünlere göz at</button></a>
    </div>
    <div class="col-sm-4">
            <div class="panel panel-default text-center">
                    <img src="https://i.hizliresim.com/l963891.png" alt="Hanife Balaban" width="100%" height="100%">
                <div class="panel-body">

                    <p><strong>Hanife BALABAN</strong></p>
                    <p><strong>Selçuk Üniversitesi</strong>  Ziraat Mühendisliği</p>
                    <p>
                        <i class="fa fa-instagram w3-hover-opacity"><a href="<?php echo DonusumleriGeriDondur($InstagramLink); ?>">  Instagram</a>&nbsp;&nbsp;</i>
                        <i class="fa fa-facebook-official w3-hover-opacity"><a href="<?php echo DonusumleriGeriDondur($FacebookLink); ?>">  Facebook</a>&nbsp;&nbsp;</i>
                        <i class="fa fa-twitter w3-hover-opacity"><a href="<?php echo DonusumleriGeriDondur($TwitterLink); ?>">  Twitter</a>&nbsp;&nbsp;</i>
                    </p>

                </div>
            </div>
        </div>
  </div>
</div>

<!-- <div class="container-fluid bg-grey">
  <div class="row">
    <div class="col-sm-4">
      <span class="glyphicon glyphicon-globe logo slideanim"></span>
    </div>
    <div class="col-sm-8">
      <h2>Our Values</h2><br>
      <h4><strong>MISSION:</strong> Our mission lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</h4><br>
      <p><strong>VISION:</strong> Our vision Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
      Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
    </div>
  </div>
</div> -->

<!-- Container (Services Section)
<div id="services" class="container-fluid text-center">
  <h2>SERVICES</h2>
  <h4>What we offer</h4>
  <br>
  <div class="row slideanim">
    <div class="col-sm-4">
      <span class="glyphicon glyphicon-off logo-small"></span>
      <h4>POWER</h4>
      <p>Lorem ipsum dolor sit amet..</p>
    </div>
    <div class="col-sm-4">
      <span class="glyphicon glyphicon-heart logo-small"></span>
      <h4>LOVE</h4>
      <p>Lorem ipsum dolor sit amet..</p>
    </div>
    <div class="col-sm-4">
      <span class="glyphicon glyphicon-lock logo-small"></span>
      <h4>JOB DONE</h4>
      <p>Lorem ipsum dolor sit amet..</p>
    </div>
  </div>
  <br><br>
  <div class="row slideanim">
    <div class="col-sm-4">
      <span class="glyphicon glyphicon-leaf logo-small"></span>
      <h4>GREEN</h4>
      <p>Lorem ipsum dolor sit amet..</p>
    </div>
    <div class="col-sm-4">
      <span class="glyphicon glyphicon-certificate logo-small"></span>
      <h4>CERTIFIED</h4>
      <p>Lorem ipsum dolor sit amet..</p>
    </div>
    <div class="col-sm-4">
      <span class="glyphicon glyphicon-wrench logo-small"></span>
      <h4 style="color:#303030;">HARD WORK</h4>
      <p>Lorem ipsum dolor sit amet..</p>
    </div>
  </div>
</div> -->

<!-- Container (news Section) -->
<div id="news" class="container-fluid text-center bg-grey">
  <h2>HABERLER</h2><br>
  <h4>Bizi Takip Edin</h4>
  <div class="row text-center slideanim">
    <div class="col-sm-4">
      <iframe src="https://www.cnnturk.com/yurttan-haberler/antalya/zmonun-serik-temsilcisi-balaban" width="400" height="600" frameborder="0"></iframe>
    </div>
    <div class="col-sm-4">

      <div id="fb-root1"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/tr_TR/sdk.js#xfbml=1&version=v13.0" nonce="7ZLYkDp3"></script>
<div class="fb-post" data-href="https://www.facebook.com/permalink.php?story_fbid=1178238715997661&amp;id=151907311964145" data-width="300" data-show-text="false"><blockquote cite="https://www.facebook.com/permalink.php?story_fbid=pfbid037oVQY6ZSudPaHoErPV2jni4pGuwjEk3kxm8FPizH7jo2Dj1kJiiSfwHbHca4gPnGl&amp;id=151907311964145" class="fb-xfbml-parse-ignore"><a href="https://facebook.com/100057218568905">Balabanlar ziraat mühendisliği</a> paylaştı:&nbsp;<a href="https://www.facebook.com/permalink.php?story_fbid=pfbid037oVQY6ZSudPaHoErPV2jni4pGuwjEk3kxm8FPizH7jo2Dj1kJiiSfwHbHca4gPnGl&amp;id=151907311964145">12 Ekim 2021 Salı</a></blockquote></div>

    </div>
    <div class="col-sm-4">

      <div id="fb-root2"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/tr_TR/sdk.js#xfbml=1&version=v13.0" nonce="J6Vo7zuU"></script>
<div class="fb-post" data-href="https://www.facebook.com/permalink.php?story_fbid=355191564969051&amp;id=151907311964145" data-width="300" data-show-text="false"><blockquote cite="https://www.facebook.com/permalink.php?story_fbid=355191564969051&amp;id=151907311964145" class="fb-xfbml-parse-ignore"><a href="https://facebook.com/100057218568905">Balabanlar ziraat mühendisliği</a> paylaştı:&nbsp;<a href="https://www.facebook.com/permalink.php?story_fbid=355191564969051&amp;id=151907311964145">7 Nisan 2018 Cumartesi</a></blockquote></div>

    </div>
  </div><br>
  
  
</div>

<!-- Container (products Section) -->
<div id="products" class="container-fluid">
  <div class="text-center">
    <h2>ÜRÜNLER</h2>
    <h4>Size en uygun kategoriyi seçin</h4>
  </div>
  <div class="row slideanim">
    <div class="col-sm-4 col-xs-12">
      <div class="panel panel-default text-center">
        <div class="panel-heading">
          <h1>Gübreler</h1>
        </div>
         <div class="panel-body">
         <h4 class="w3-xlarge w3-text-green">Üreticiler</strong></h4>
          <p><strong><?php echo $gubreToplam['COUNT(id)'];?></strong> Ürün</p>
          <p><?php foreach ($firmagubre as $f) : ?>
                    <?php
                    print_r($f['ureticiFirma']);
                    ?></p>
                    <?php endforeach; ?>
          <p><button class="button" onclick="document.location='urunler.php'"><span>Ürünleri Gör </span></button></p>
        </div>
      </div>      
    </div>     
    <div class="col-sm-4 col-xs-12">
      <div class="panel panel-default text-center"> 
        <div class="panel-heading">
          <h1>Zirai İlaçlar</h1>
        </div>
         <div class="panel-body">
         <h4 class="w3-xlarge w3-text-green">Üreticiler</strong></h4>
         <p><strong><?php echo $ilacToplam['COUNT(id)'];?></strong> Ürün</p>
         <p><?php foreach ($firmailac as $f) : ?>
                    <?php
                    print_r($f['ureticiFirma']);
                    ?></p>
                    <?php endforeach; ?>
             <p><button class="button" onclick="document.location='urunler.php'"><span>Ürünleri Gör </span></button></p>
        </div>
      </div>      
    </div>       
    <div class="col-sm-4 col-xs-12">
      <div class="panel panel-default text-center"> 
        <div class="panel-heading">
          <h1>Premium | Çok Yakında...</h1>
        </div>
        <div class="panel-body">
        <h4 class="w3-xlarge w3-text-green">Tüm Üreticilerimiz</strong></h4>
        <p><strong><?php echo $urunToplam['COUNT(id)'];?></strong> Ürün</p>
        <p><?php foreach ($butunfirmalar as $f) : ?>
                    <?php
                    print_r($f['ureticiFirma']);
                    ?></p>
                    <?php endforeach; ?>
          <p><button class="button" onclick="document.location='urunler.php'"><span>Ürünleri Gör </span></button></p>
        </div>
      </div>      
    </div>    
  </div>
</div>

<!-- Container (Contact Section) -->
<div id="contact" class="container-fluid bg-grey">
  <h2 class="text-center">İLETİŞİM</h2>
  <div class="row">
    <div class="col-sm-5">
      <p>Bizimle iletişime geçin, 24 saat içinde size geri dönelim.</p>
      <p><span class="glyphicon glyphicon-map-marker"></span> Serik, Antalya</p>
      <p><span class="glyphicon glyphicon-phone"></span><?php echo DonusumleriGeriDondur($SabitTelefon); ?></p>
      <p><span class="glyphicon glyphicon-envelope"></span><a href="bsnradblli@gmail.com"> hanifeblbn@gmail.com</a></p>
        <p>
            <div class="fa fa-instagram w3-hover-opacity"><a href="<?php echo DonusumleriGeriDondur($InstagramLink); ?>">  Instagram</a>&nbsp;&nbsp;</div>
            <div class="fa fa-facebook-official w3-hover-opacity"><a href="<?php echo DonusumleriGeriDondur($FacebookLink); ?>">  Facebook</a>&nbsp;&nbsp;</div>
            <div class="fa fa-twitter w3-hover-opacity"><a href="<?php echo DonusumleriGeriDondur($TwitterLink); ?>">  Twitter</a>&nbsp;&nbsp;</div>
        </p>
    </div>
    <div class="col-sm-7 slideanim">
      <div class="row">
        <div class="col-sm-6 form-group">
          <input class="form-control" id="name" name="name" placeholder="İsim Soyisim" type="text" required>
        </div>
        <div class="col-sm-6 form-group">
          <input class="form-control" id="email" name="email" placeholder="Email" type="email" required>
        </div>
      </div>
      <textarea class="form-control" id="comments" name="comments" placeholder="Bir şeyler yazın..." rows="5"></textarea><br>
      <div class="row">
        <div class="col-sm-12 form-group">
          <button class="btn btn-default pull-right" type="submit">Gönder</button>
        </div>
      </div>
    </div>
  </div>
  <div class="jumbotron text-center">
  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3189.95992446562!2d31.065314614529807!3d36.915222568917606!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14c37d3a98ba9c2b%3A0x377331a5ae76a44d!2sBalabanlar%20Ziraat%20M%C3%BChendisli%C4%9Fi!5e0!3m2!1str!2str!4v1648052780773!5m2!1str!2str"  border:1px; allowfullscreen="" loading="lazy"></iframe>
  </div>
</div>

<footer class="container-fluid text-center">
  <a href="#myPage" title="To Top">
    <span class="glyphicon glyphicon-chevron-up"></span>
  </a>
  <p>Made By <a href="https://badblli.me" title="Visit Owner">badblli.me</a></p>
    <p>
        <?php echo DonusumleriGeriDondur($SiteCopyright); ?>
    </p>
</footer>


<script src="script.js"></script>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>
<?php
$conn = null;
?>