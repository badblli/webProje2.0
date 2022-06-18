<?php
session_start();
if ($_SESSION && $_SESSION["Oturum"] != False) {
    if($_SESSION['UserID']){
		header('location: Sayfalar/Anasayfa.php');
	}
} else {
	$_SESSION["Oturum"] = False;
	$_SESSION['Token'] = "";
	require_once('../config/config.php');
	require_once('../config/fonksiyon.php');
    $user = GetInfo();
    $ip = $user['ip'];
    $hostadi = $user['hostadi'];
    $proxy = $user['proxy'];

        if ($_POST) {
            $KullaniciAdi = p("KullaniciAdi");
            $Sifre = sha1(md5(p("Sifre")));

            $KullaniciAdi_log = $_POST['KullaniciAdi'];
            $Sifre_log = $_POST['Sifre'];

            if (empty($Sifre) or empty($KullaniciAdi)) {
                $bilgi = 'Kullanıcı Adı & Şifre Boş Olamaz...';
                $deger = 'info';
            } else {
                
                $sql = $conn->prepare("SELECT * FROM kullanicilar WHERE 1=1 and IsActive=1 and KullaniciAdi=:KullaniciAdi AND Sifre = :Sifre");
                $query = $conn->query("SELECT * FROM kullanicilar WHERE 1=1 and IsActive=1 and KullaniciAdi='{$KullaniciAdi}' AND Sifre='{$Sifre}'")->fetch(PDO::FETCH_ASSOC);
                $sql->bindparam(':KullaniciAdi', $KullaniciAdi, PDO::PARAM_STR);
                $sql->bindparam(':Sifre', $Sifre, PDO::PARAM_INT);

                $sql->execute();
                if ($sql->rowCount()) {
                    $UserID = $query["UserID"];
                    $Yetki = $query["Yetki"];
                    $KullaniciAdi = $query["KullaniciAdi"];
                    $Sifre = $query["Sifre"];
                    $Adi = $query["Adi"];
                    $Soyadi = $query["Soyadi"];

                    $query = $conn->prepare("INSERT INTO oturumtakip (basarili,ip,hostadi,proxy)  VALUES (?,?,?,?)");
                    $query->execute(array(1,$ip,$hostadi,$proxy));

                    $query = $conn->prepare('SELECT * FROM kullanicilar WHERE UserID=? AND IsActive=?');
                    $query->execute(array($UserID,1));
                    $row = $query->fetch(PDO::FETCH_ASSOC);
                    if ($row) {
						$_SESSION['Token'] = md5($_SERVER['HTTP_USER_AGENT']."-Guvenlik");
                        $_SESSION["Oturum"] = TRUE;
                        $_SESSION["UserID"] = $UserID;
                        $_SESSION["KullaniciAdi"] = $KullaniciAdi;
                        $_SESSION["Sifre"] = $Sifre;
                        $_SESSION["Adi"] = $Adi;
                        $_SESSION["Soyadi"] = $Soyadi;
                        $_SESSION["Yetki"] = $Yetki;
                        if ($Yetki == "Admin") {
							$bilgi = 'Admin Girişi Başarılı, Lütfen Bekleyiniz.';
							$deger = 'success';
						} else if ($Yetki == "Personel"){
							$bilgi = 'Personel Girişi Başarılı, Lütfen Bekleyiniz.';
							$deger = 'success';
                        } else {
                            $bilgi = 'Yetkisiz Giriş..!';
                            $deger = 'danger';
                            session_destroy();
                            header("refresh:5;url=index.php");
                            exit;
                        }
						header("refresh:3;url=Sayfalar/Anasayfa.php");
                    }
                } else {
                    $log = $conn->prepare("INSERT INTO oturumtakip (password, username, ip,  basarili,proxy,hostadi) VALUES (?,?,?,?,?,?)");
                    $log->execute(array($Sifre_log, $KullaniciAdi_log, $ip, 0, $proxy, $hostadi));
                    if ($log) {
                        $bilgi = ' Kullanıcı Adı Veya Şifre Hatalı.';
                        $deger = 'warning';
                    }
                }
            }
        } else {
            $bilgi = '';
        }
    ?>
    <!-- 
Bismillahirrahmanirrahim
Bu Sistem Mücahit TOPAL tarafından Kodlanmıştır.
info@mucahittopal.com
www.mucahittopal.com
-->
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Oturum Aç | @badblli</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" type="text/css" href="css/theme.css">
    <link rel="stylesheet" type="text/css" href="css/admin-forms.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
   <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
   <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
   <![endif]-->
</head>
<body class="external-page sb-l-c sb-r-c">
    <!-- End: Settings Scripts -->
    <!-- Start: Main -->
    <div id="main" class="animated fadeIn">
        <!-- Start: Content -->
        <section id="content_wrapper">
            <!-- begin canvas animation bg -->
            <div id="canvas-wrapper" style="height: 613px;">
                <canvas id="demo-canvas" width="1366" height="613"></canvas>
            </div>
            <!-- Begin: Content -->
            <section id="content">
                <div class="admin-form theme-info" id="login1" style="max-width: 400px;">
                    <div class="row mb15 table-layout">
                    </div>
                    <div class="panel panel-info mt10 br-n">
 
                        <form method="post" action="#" id="contact">
                            <div class="panel-body bg-light p30">
                                <div class="row">
                                    <div class="col-sm-12 pr30">

                                        <div class="section">
                                            <label for="username" class="field-label text-muted fs18 mb10">Kullanıcı Adı</label>
                                            <label for="username" class="field prepend-icon">
                                                <input type="text" name="KullaniciAdi" id="username" class="gui-input" placeholder="Kullanıcı Adı">
                                                <label for="username" class="field-icon"><i class="fa fa-user"></i>
                                                </label>
                                            </label>
                                        </div>
                                        <!-- end section -->

                                        <div class="section">
                                            <label for="username" class="field-label text-muted fs18 mb10">Şifre</label>
                                            <label for="password" class="field prepend-icon">
                                                <input type="password" name="Sifre" id="password" class="gui-input" placeholder="Şifre">
                                                <label for="password" class="field-icon"><i class="fa fa-lock"></i>
                                                </label>
                                            </label>
                                        </div>
                                        <!-- end section -->

                                    </div>
   
                                </div>
                            </div>
                            <!-- end .form-body section -->
                            <div class="panel-footer clearfix p10 ph15">
							<?php if ($bilgi) { ?>
								<div class="alert alert-<?= $deger; ?> alert-dismissable">
									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
									<h4><i class="icon fa fa-check"></i> <?= $bilgi; ?></h4>
								</div>
							<?php } ?>
                                    <button type="submit" class="button btn-primary mr10 pull-right">Giriş Yap</button>

                            </div>
                            <!-- end .form-footer section -->
                        </form>
                    </div>
                </div>

            </section>
            <!-- End: Content -->

        </section>
        <!-- End: Content-Wrapper -->

    </div>

    <script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="js/jquery-ui.min.js"></script>

    <!-- Bootstrap -->
    <script type="text/javascript" src="js/bootstrap.min.js"></script>

    <!-- Page Plugins -->
    <script type="text/javascript" src="js/EasePack.min.js"></script>
    <script type="text/javascript" src="js/rAF.js"></script>
    <script type="text/javascript" src="js/TweenLite.min.js"></script>
    <script type="text/javascript" src="js/login.js"></script>

    <!-- Page Javascript -->
    <script type="text/javascript">
        jQuery(document).ready(function() {           
             CanvasBG.init({
                Loc: {
                    x: window.innerWidth / 2,
                    y: window.innerHeight / 3.3
                },
            });


        });
    </script>
<div style="display:none" alt="@badblli" title="@badblli">@badblli</div>

    <!-- END: PAGE SCRIPTS -->
	</body>
</html>

<?php } ?>