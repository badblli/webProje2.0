<?php
require 'config/config.php';
$urun = DB::get("SELECT * FROM products;");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin Panel</title>
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
<nav class="w3-sidebar w3-red w3-collapse w3-top w3-large w3-padding" style="z-index:3;width:300px;font-weight:bold;" id="mySidebar"><br>
    <a href="javascript:void(0)" onclick="w3_close()" class="w3-button w3-hide-large w3-display-topleft" style="width:100%;font-size:22px">Close Menu</a>
    <div class="w3-container">
        <h3 class="w3-padding-64"><b>ADMIN Panel</b><br>designed by @badblli</h3>
    </div>
    <div class="w3-bar-block">
        <a href="index.php" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Anasayfa</a>
        <a href="#istatislikler" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">İstatislikler</a>
        <a href="#urunler" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Ürünler</a>
        <a href="#ayarlar" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Website Ayarları</a>
    </div>
</nav>

<!-- Top menu on small screens -->
<header class="w3-container w3-top w3-hide-large w3-red w3-xlarge w3-padding">
    <a href="javascript:void(0)" class="w3-button w3-green w3-margin-right" onclick="w3_open()">☰</a>
    <span>Company Name</span>
</header>

<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:340px;margin-right:40px">

    <!-- Header -->
    <div class="w3-container" style="margin-top:80px" id="Gübreler">
        <h1 class="w3-jumbo"><b>Hoşgeldiniz...</b></h1>
        <h1 class="w3-xxxlarge w3-text-red"><b>İstatistikler.</b></h1>
        <hr style="width:50px;border:5px solid red" class="w3-round">
    </div>

    <div class="w3-row-padding w3-grayscale">
        <div class="w3-col m4 w3-margin-bottom">
            <div class="w3-light-grey">
            <?php
                 $hepsi = $conn->prepare("SELECT COUNT(id) FROM products LIMIT 1");
                 $gubre = $conn->prepare("SELECT COUNT(id) FROM products WHERE urunTuru = 'Gübre'");
                 $ilac = $conn->prepare("SELECT COUNT(id) FROM products WHERE urunTuru = 'İlaç'");
                 $hepsi->execute();
                    $gubre->execute();
                    $ilac->execute();
                 $count = $hepsi->rowCount();
                    $gubreCount = $gubre->rowCount();
                    $ilacCount = $ilac->rowCount();
                 $urunToplam = $hepsi->fetch(PDO::FETCH_ASSOC);
                    $gubreToplam = $gubre->fetch(PDO::FETCH_ASSOC);
                    $ilacToplam = $ilac->fetch(PDO::FETCH_ASSOC);
                 
            ?>
            <h3 class="w3-xlarge w3-text-red">Toplam Ürün: <?php echo $urunToplam['COUNT(id)'];?> Adet</h3>
            <h4>Toplam Gübre: <?php echo $gubreToplam['COUNT(id)'];?> Adet</h4>
            <h4>Toplam Zirai İlaç: <?php echo $ilacToplam['COUNT(id)'];?> Adet</h4>

        </div>

    </div>
    <div class="w3-col m4 w3-margin-bottom">
            <div class="w3-light-grey">
            <?php
                  
            ?>
            <h3 class="w3-xlarge w3-text-red">Aktif Kullanıcılar<? echo $onlineUsers; ?></h3>

        </div>

 
    

   



    <!-- End page content -->
</div>


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
