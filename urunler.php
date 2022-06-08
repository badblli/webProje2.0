<?php
require 'config/config.php';

$icerikler = DB::get("SELECT * FROM products ORDER BY id DESC");
$gubreler = DB::get("SELECT * FROM products WHERE urunTuru = 'Gubre' and urunDurum = '1'");
$ilaclar = DB::get("SELECT * FROM products WHERE urunTuru = 'İlaç'  and urunDurum = '1'");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Ürünler</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">
    <style>
        body,h1,h2,h3,h4,h5 {font-family: "Poppins", sans-serif}
        body {font-size:16px;}
        .w3-half img{margin-bottom:-6px;margin-top:16px;opacity:0.8;cursor:pointer}
        .w3-half img:hover{opacity:1}
    </style>
</head>
<body>

<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-green w3-collapse w3-top w3-large w3-padding" style="z-index:3;width:300px;font-weight:bold;" id="mySidebar"><br>
    <a href="javascript:void(0)" onclick="w3_close()" class="w3-button w3-hide-large w3-display-topleft" style="width:100%;font-size:22px">Close Menu</a>
    <div class="w3-container">
        <h3 class="w3-padding-64"><b>BALABANLAR<br>Ziraat Mühendisliği</b></h3>
    </div>
    <div class="w3-bar-block">
        <a href="index.php" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Anasayfa</a>
        <a href="#Gübreler" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Gübreler</a>
        <a href="#ilaclar" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Zirai İlaçlar</a>
        <a href="#iletisim" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">İletişim</a>
    </div>
</nav>

<!-- Top menu on small screens -->
<header class="w3-container w3-top w3-hide-large w3-green w3-xlarge w3-padding">
    <a href="javascript:void(0)" class="w3-button w3-green w3-margin-right" onclick="w3_open()">☰</a>
    <span>Company Name</span>
</header>

<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:340px;margin-right:40px">

    <!-- Header -->
    <div class="w3-container" style="margin-top:80px" id="Gübreler">
        <h1 class="w3-jumbo"><b>ÜRÜNLERİMİZ</b></h1>
        <h1 class="w3-xxxlarge w3-text-green"><b>Gübreler.</b></h1>
        <hr style="width:50px;border:5px solid green" class="w3-round">
    </div>

    
    <div class="w3-row-padding w3-grayscale">
    <?php foreach ($gubreler as $k => $v) : ?>
                    <?php
                    $resim = PATH . "img/$v->urunResim";
                    ?>
        <div class="w3-col m4 w3-margin-bottom" >
            <div class="w3-light-grey">
           
               <img src="<?php echo $v->urunResim ?>" alt="" style="width:50%">
                <div class="w3-container">

                    <h3><?php echo $v->urunAdi ?></h3>
                    <h4><?php echo $v->urunTuru ?></h3>
                    <p class="w3-opacity"><?php echo $v->ureticiFirma ?></p>
                    <p><?php echo $v->urunAciklama ?></p>
                </div>
                
            </div>
        </div>
        <?php endforeach; ?>
    </div>

    <!-- Zirai İlaçlar -->
    <div class="w3-container" id="ilaclar" style="margin-top:75px">
        <h1 class="w3-xxxlarge w3-text-green"><b>Zirai İlaçlar</b></h1>
        <hr style="width:50px;border:5px solid green" class="w3-round">
    </div>


    <!-- The Team -->
    <div class="w3-row-padding w3-grayscale">
    <?php foreach ($ilaclar as $k => $v) : ?>
                    <?php
                    $resim = PATH . "img/$v->urunResim";
                    ?>
        <div class="w3-col m4 w3-margin-bottom">
            <div class="w3-light-grey">
           
            <img src="<?php echo $v->urunResim ?>" alt="" style="width:50%">
                <div class="w3-container">

                    <h3><?php echo $v->urunAdi ?></h3>
                    <p class="w3-opacity"><?php echo $v->ureticiFirma ?></p>
                    <p><?php echo $v->urunAciklama ?></p>
                </div>
                
            </div>
        </div>
        <?php endforeach; ?>
    </div>
    

   

    <!-- Contact -->
    <div class="w3-container" id="contact" style="margin-top:75px">
        <h1 class="w3-xxxlarge w3-text-green"><b>İletişim.</b></h1>
        <hr style="width:50px;border:5px solid green" class="w3-round">
        <p>Fiyat bilgileri için bizimle iletişime geçin, 24 saat içinde size geri dönelim.</p>
        <form action="iletisim.php" method ="POST" target="_blank">
            <div class="w3-section">
                <label>İsim Soyisim</label>
                <input class="w3-input w3-border" type="text" name="name" required>
            </div>
            <div class="w3-section">
                <label>Email</label>
                <input class="w3-input w3-border" type="text" name="email" required>
            </div>
            <div class="w3-section">
                <label>Mesaj</label>
                <input class="w3-input w3-border" type="text" name="mesaj" required>
            </div>
            <button type="submit" class="w3-button w3-block w3-padding-large w3-green w3-margin-bottom">Gönder</button>
        </form>
    </div>

    <!-- End page content -->
</div>

<!-- Container -->
<div class="w3-light-grey w3-container w3-padding-32" style="margin-top:75px;padding-right:58px"><p class="w3-right">Made by <a href="https://badblli.me" title="Busenur Adıbelli" target="_blank" class="w3-hover-opacity">badblli.me</a></p></div>

<script>
    // Script to open and close sidebar
    function w3_open() {
        document.getElementById("mySidebar").style.display = "block";
        document.getElementById("myOverlay").style.display = "block";
    }

    function w3_close() {
        document.getElementById("mySidebar").style.display = "none";
        document.getElementById("myOverlay").style.display = "none";
    }

    // Modal Image Gallery
    function onClick(element) {
        document.getElementById("img01").src = element.src;
        document.getElementById("modal01").style.display = "block";
        var captionText = document.getElementById("caption");
        captionText.innerHTML = element.alt;
    }
</script>

</body>
</html>