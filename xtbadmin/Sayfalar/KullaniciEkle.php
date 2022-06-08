<?php
require_once '../../config/guvenlik.php';
if(OturumAktif()==true)
{
    require_once '../../config/config.php';
	require_once '../../config/fonksiyon.php';
    require_once '../Sayfalar/SayfaUst.php';
    require_once '../Sayfalar/SolMenu.php';
	$ID="";
	$Adi= "";
	$Soyadi= "";
	$TelNo= "";
	$Email= "";
	$Adres= "";
	$KullaniciAdi= "";
	$Sifre= "";
	$Yetki= "";
	if($_GET)
	{
		 if ($_SERVER['REQUEST_METHOD'] === 'GET') 
		 {
			if($_GET['islem']=="Duzenle")
			{
				$ID=$_GET['ID'];
				$Query=$conn->prepare("SELECT * FROM kullanicilar WHERE IsActive=1 AND UserID=?");
				$Query->execute(array($ID));
				$Row = $Query->fetch(PDO::FETCH_ASSOC);
				if($Row)
				{
					$Adi			= $Row["Adi"];
					$Soyadi			= $Row["Soyadi"];
					$TelNo			= $Row["TelNo"];
					$Email			= $Row["Email"];
					$Adres			= $Row["Adres"];
					$KullaniciAdi	= $Row["KullaniciAdi"];
					$Sifre			= $Row["Sifre"];
					$Yetki			= $Row["Yetki"];
				}
			}
		}
	}
    ?>
	 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-success">
            <div class="box-header">
              <h3 class="box-title">Kullanıcı Kayıt
              </h3>
              <!-- tools box -->
              <div class="pull-right box-tools">
                <button type="button" class="btn bg-green btn-sm" data-widget="collapse" data-toggle="tooltip" title="Gizle">
                  <i class="fa fa-minus"></i></button>
                <button type="button" class="btn bg-green btn-sm" data-widget="remove" data-toggle="tooltip" title="Kaldır">
                  <i class="fa fa-times"></i></button>
              </div>
              <!-- /. tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body pad">
                <form action="#" method="post" id="Form1" class="form-horizontal">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Kullanıcı Adı</label>
                                <div class="col-sm-9">
                                    <input type="text" name="KullaniciAdi"
                                           class="form-control input-sm "
                                           value="<?= $KullaniciAdi ?>"
                                           placeholder="<?= $KullaniciAdi ?>">
                                </div>
                            </div>
                            <div class="form-group" >
                                <label class="col-sm-2 control-label">Şifre</label>
                                <div class="col-sm-9">
                                    <input id="Sifre" type="password"
                                           name="Sifre"
                                           class="form-control input-sm "
                                           value="<?= $Sifre ?>"
                                           placeholder="Şifre Girin">
                                </div>
                            </div>
                            <div class="form-group" >
                                <label class="col-sm-2 control-label">Adı</label>
                                <div class="col-sm-9">
                                    <input id="Adi" type="text"
                                           name="Adi"
                                           class="form-control input-sm "
                                           value="<?= $Adi ?>"
                                           placeholder="<?= $Adi ?>">
                                </div>
                            </div>
                            <div class="form-group" >
                                <label class="col-sm-2 control-label">Soyadı</label>
                                <div class="col-sm-9">
                                    <input id="Soyadi" type="text"
                                           name="Soyadi"
                                           class="form-control input-sm "
                                           value="<?= $Soyadi ?>"
                                           placeholder="<?= $Soyadi ?>">
                                </div>
                            </div>
                            <div class="form-group" >
                                <label class="col-sm-2 control-label">TelNo</label>
                                <div class="col-sm-9">
                                    <input id="TelNo" type="text"
                                           name="TelNo"
                                           class="form-control input-sm "
                                           value="<?= $TelNo ?>"
                                           placeholder="<?= $TelNo ?>">
                                </div>
                            </div>
                            <div class="form-group" >
                                <label class="col-sm-2 control-label">Email</label>
                                <div class="col-sm-9">
                                    <input id="Email" type="email"
                                           name="Email"
                                           class="form-control input-sm "
                                           value="<?= $Email ?>"
                                           placeholder="<?= $Email ?>">
                                </div>
                            </div>
                            <div class="form-group" >
                                <label class="col-sm-2 control-label">Adres</label>
                                <div class="col-sm-9">
                                    <input id="Adres" type="text"
                                           name="Adres"
                                           class="form-control input-sm "
                                           value="<?= $Adres ?>"
                                           placeholder="<?= $Adres ?>">
                                </div>
                            </div>
							<div class="form-group" >
                                <label class="col-sm-2 control-label">Yetki</label>
								<div class="col-sm-9">
									<select id="Yetki" type="text" name="Yetki" value="" class="form-control input-sm">
										<option value=""></option>
										<option value="Admin">Admin</option>
										<option value="Personel">Personel</option>
									</select>
								</div>		
                            </div>
                        
                        </div>
						<div class="col-md-6"></div>
						<div class="col-md-6">
							<div class="form-group ">
								<div class="col-sm-3 margin"></div>
									<div class="col-sm-3 margin">
										<button type="reset" class="btn btn-block btn-sm  btn-default">Temizle</button>
									</div>
							<?php if($_GET){if($_GET['islem']=="Duzenle") { ?>
								<div class="col-sm-3 margin">
									<span id="Duzenle" class="btn btn-block btn-sm btn-info">Düzenle</span>
								</div>
							<?php }  } else { ?>
								<div class="col-sm-3 margin">
									<span id="Kaydet" class="btn btn-block btn-sm btn-info">Kaydet</span><br />
								</div>
							<?php  } ?>
							</div>
						</div>
                    </div>
              </form>
            </div>
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col-->
      </div>
      <!-- ./row -->
    </section>
    <!-- /.content -->
  </div>
<?php   require_once 'SayfaAlt.php'; 
		require_once 'SagMenu.php'; 
		require_once 'SayfaJs.php'; ?>
	<script>
	$("#Yetki").val("<?=$Yetki?>");	
		
				function Form1Kaydet() {
                    var Form1 = document.getElementById('Form1');
					if (Form1.KullaniciAdi.value == "") {
                        BootstrapDialog.show({
                            type: BootstrapDialog.TYPE_WARNING,
                            title: "Uyarı",
                            message: "Lütfen Kullanıcı Adını Boş Bırakmayın..!"
                        });
                        return;
                    }
                    if (Form1.Sifre.value == "") {
                        BootstrapDialog.show({
                            type: BootstrapDialog.TYPE_WARNING,
                            title: "Uyarı",
                            message: "Lütfen Şifreyi Boş Bırakmayın..!"
                        });
                        return;
                    }
                    if (Form1.Yetki.value == "") {
                        BootstrapDialog.show({
                            type: BootstrapDialog.TYPE_WARNING,
                            title: "Uyarı",
                            message: "Lütfen Yetki Alanını Boş Bırakmayın..!"
                        });
                        return;
                    }
                    var FormPost = $("#Form1").serialize();
                    $.ajax(
                        {
                            url: "ajax/Kayit/KullaniciEkle.php",
                            type: "POST",
                            dataType: "JSON",
                            data: FormPost+"&islem=Kayit",
                            success: function (cevap) {
                                var hatavar = cevap.hata;
                                var hatayok = cevap.ok;
                                if (hatavar) {
                                    BootstrapDialog.show({
                                        type: BootstrapDialog.TYPE_DANGER,
                                        title: "Sonuç",
                                        message: hatavar
                                    });
                                } else {
                                    BootstrapDialog.show({
                                        title: "Sonuç",
                                        message: hatayok,
                                        onhidden: function (dialogRef) {
                                            window.location="KullaniciListe.php";
                                        }
                                    });
                                }
                            },
                            error: function (cevap) {
                                BootstrapDialog.show({
                                    type: BootstrapDialog.TYPE_DANGER,
                                    title: "Hata",
                                    message: "Kayıt sırasında hata oluştu..!"
                                });
                                console.log(cevap);
                            }
                        });
                }
				function Form1Guncelle() {
                    var Form1 = document.getElementById('Form1');
					var ID = "<?=$ID?>";
                    if (Form1.KullaniciAdi.value == "") {
                        BootstrapDialog.show({
                            type: BootstrapDialog.TYPE_WARNING,
                            title: "Uyarı",
                            message: "Lütfen Kullanıcı Adını Boş Bırakmayın..!"
                        });
                        return;
                    }
                    if (Form1.Sifre.value == "") {
                        BootstrapDialog.show({
                            type: BootstrapDialog.TYPE_WARNING,
                            title: "Uyarı",
                            message: "Lütfen Şifreyi Boş Bırakmayın..!"
                        });
                        return;
                    }
                    if (Form1.Yetki.value == "") {
                        BootstrapDialog.show({
                            type: BootstrapDialog.TYPE_WARNING,
                            title: "Uyarı",
                            message: "Lütfen Yetki Alanını Boş Bırakmayın..!"
                        });
                        return;
                    }
                    var FormPost = $("#Form1").serialize();
                    $.ajax(
                        {
                            url: "ajax/Kayit/KullaniciEkle.php",
                            type: "POST",
                            dataType: "JSON",
                            data: FormPost+"&islem=Duzenle&ID="+ID,
                            success: function (cevap) {
                                var hatavar = cevap.hata;
                                var hatayok = cevap.ok;
                                if (hatavar) {
                                    BootstrapDialog.show({
                                        type: BootstrapDialog.TYPE_DANGER,
                                        title: "Sonuç",
                                        message: hatavar
                                    });
                                } else {
                                    BootstrapDialog.show({
                                        title: "Sonuç",
                                        message: hatayok,
                                        onhidden: function (dialogRef) {
                                            window.location="KullaniciListe.php";
                                        }
                                    });
                                }
                            },
                            error: function (cevap) {
                                BootstrapDialog.show({
                                    type: BootstrapDialog.TYPE_DANGER,
                                    title: "Hata",
                                    message: "Kayıt sırasında hata oluştu..!"
                                });
                                console.log(cevap);
                            }
                        });
                }
		$("#Kaydet").click(function(){
			
			Form1Kaydet();
		});	
		$("#Duzenle").click(function(){
			Form1Guncelle();
		});			
	</script>
</body>
</html>
<?php } ?>