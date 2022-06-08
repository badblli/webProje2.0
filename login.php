<!--Login.php-->
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <link href="css/bootstrap.min.css" rel="stylesheet"/>
    <title>Giriş</title>
    <style>
        .kutu {
            margin-top: 40px
        }
    </style>
</head>
<body>
<?php
session_start(); //oturum başlattık
include("config/config.php"); //veri tabanına bağlandık 

//eğer mevcut oturum varsa sayfayı yönlendiriyoruz.
if (isset($_SESSION["Oturum"]) && $_SESSION["Oturum"] == "6789") {
    header("location:admin.php");
} //eğer önceden beni hatırla işaretlenmiş ise oturum oluşturup sayfayı yönlendiriyoruz.
else if (isset($_COOKIE["cerez"])) {
    //Kullanıcı adlarını çeken sorgumuz
    $sorgu =  $conn->query("select kullaniciAdi from admin");

    //Kullanıcı adlarını döngü yardımı ile tek tek elde ediyoruz
    while ($sonuc = $sorgu->fetch(PDO::FETCH_ASSOC)) {
        //eğer bizim belirlediğimiz yapıya uygun kullanıcı var mı diye bakıyoruz.
        if ($_COOKIE["cerez"] == md5("aa" . $sonuc['kullaniciAdi'] . "bb")) {

            //oturum oluşturma buradaki değerleri güvenlik açısından
            //farklı değerler yapabilirsiniz
            //aynı zamanda kullanıcı adınıda burada tuttum
            $_SESSION["Oturum"] = "6789";
            $_SESSION["kullaniciAdi"] = $sonuc['kullaniciAdi'];

            //sonrasında admin sayfasına yönlendiriyorum
            header("location:admin.php");
        }
    }
}
//Giriş formu doldurulmuşsa kontrol ediyoruz
if ($_POST) {
    $txtKadi = $_POST["txtKadi"]; //Kullanıcı adını değişkene atadık
    $txtParola = $_POST["txtParola"]; //Parolayı değişkene atadık
}
?>
<!-- Formumuzu oluşturuyoruz-->
<form id="form1" method="post">
    <div class="row align-content-center justify-content-center ">
        <div class="col-md-3 kutu">
            <h3 class="text-center">Giriş Ekranı</h3>
            <table class="table">
                <tr>
                    <td>
                        <!-- Kullanıcı adı form gönderildiğinde kaybolmasın diye value ya ekliyoruz-->
                        <input type="text" ID="txtKadi" name="txtKadi" class="form-control" placeholder="Kullanıcı adı"
                               value='<?php echo @$txtKadi ?>'/>

                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="password" ID="txtParola" name="txtParola" class="form-control" placeholder="Parola"/>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>
                            <input type="checkbox" ID="ckbHatirla" name="ckbHatirla"/>
                            Beni hatırla
                        </label>
                        <br>
                        <?php
                        //Post varsa yani submit yapılmışsa veri tabanından kontrolü yapıyoruz.
                        if ($_POST) {
                            //sorguda kullanıcı adını alıp ona karşılık parola var mı diye bakıyoruz.
                            $sorgu = $conn->query("select kullaniciSifre from admin where kullaniciAdi='$txtKadi'");
                            $sonuc = $sorgu->fetch(PDO::FETCH_ASSOC);

                            //parolaları md5 ile şifreledim ve başına sonuna kendimce eklemeler yaptım.
                            if (md5("56" . $txtParola . "23") == $sonuc["kullaniciSifre"]) {
                                $_SESSION["Oturum"] = "6789"; //oturum oluşturma
                                $_SESSION["kullaniciAdi"] = $txtKadi;

                                //eğer beni hatırla seçilmiş ise cookie oluşturuyoruz.
                                //cookie de şifreleyerek kullanıcı adından oluşturdum
                                if (isset($_POST["ckbHatirla"])) {
                                    setcookie("cerez", md5("aa" . $txtKadi . "bb"), time() + (60 * 60 * 24 * 7));
                                }
                                header("location:admin.php"); //sayfa yönlendirme
                            } else {
                                //eğer kullanıcı adı ve parola doğru girilmemiş ise
                                //hata mesajı verdiriyoruz
                                echo "Kullanıcı adı veya parola yanlış!";
                            }
                        }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td class="text-center">
                        <input type="submit" class="btn btn-primary btn-block" ID="btnGiris" value="Giriş"/>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</form>
</body>
</html>