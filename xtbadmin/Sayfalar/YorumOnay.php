<?php
require_once '../../system/guvenlik.php';
if(OturumAktif()==true)
{
    require_once '../../system/ayar.php';
	require_once '../../system/fonksiyon.php';
    require_once 'SayfaUst.php';
    require_once 'SolMenu.php';
	$ID="";
	$Baslik= "";
	$Icerik= "";
	if($_GET)
	{
		 if ($_SERVER['REQUEST_METHOD'] === 'GET') 
		 {
			if($_GET['islem']=="Duzenle")
			{
				$ID=$_GET['ID'];
				$Query=$db->prepare("SELECT * FROM yorumlar WHERE ID=?");
				$Query->execute(array($ID));
				$Row = $Query->fetch(PDO::FETCH_ASSOC);
				if($Row)
				{
					$AdSoyad= $Row["AdSoyad"];
					$Email= $Row["Email"];
					$Yorum= $Row["Yorum"];
					$Onaylandi= $Row["Onaylandi"];
					$Tarih= $Row["Tarih"];
					$IsActive= $Row["IsActive"];
					$IP= $Row["IP"];
					$Tarayici= $Row["Tarayici"];
					$IsletimSistemi= $Row["IsletimSistemi"];
					if($IsActive==1){
							if($Onaylandi==1){
								$sec='green"';
								$Durumu='Onaylı';
							} else if( $Onaylandi==0){
								$sec='yellow"';
								$Durumu='Bekliyor';
							}
						} else if( $IsActive==0){
							$sec='red"';
								$Durumu='Silindi';
						}
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
              <h3 class="box-title">Yorum Onay
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
			
				<div class="col-md-8">
				<!-- Widget: user widget style 1 -->
					<div class="box box-widget widget-user-2">
						<!-- Add the bg color to the header using any of the bg-* classes -->
						<div class="widget-user-header bg-green">
						<h3 class="widget-user-username"><?= $AdSoyad ?></h3>
						</div>
						<div class="box-footer no-padding">
						<ul class="nav nav-stacked">
							<li><a href="#">Gönderim Zamanı :<span class="pull-right badge"><?= $Tarih ?></span></a></li>
							<li><a href="#">Gönderilen Yorum :</a></li>
							<li><a href="#"><span class="pull-right "><?= $Yorum ?> </span></a>
							</li>
							
						</ul>
						</div>
					</div>
				<!-- /.widget-user -->
				</div>
				<div class="col-md-4">
				<!-- Widget: user widget style 1 -->
					<div class="box box-widget widget-user-2">
						<!-- Add the bg color to the header using any of the bg-* classes -->
						<div class="widget-user-header bg-green">
						<h3 class="widget-user-username">Detaylı Bilgi</h3>
						</div>
						<div class="box-footer no-padding">
						<ul class="nav nav-stacked">
							<li><a href="#">Durumu <span class="pull-right badge bg-<?=$sec?>"><?= $Durumu ?></span></a></li>
							<li><a href="#">IP <span class="pull-right badge"><?= $IP ?></span></a></li>
							<li><a href="#">Tarayıcı <span class="pull-right badge "><?= $Tarayici ?></span></a></li>
							<li><a href="#">İşletim Sistemi <span class="pull-right badge"><?= $IsletimSistemi ?></span></a></li>
						</ul>
						</div>
					</div>
				<!-- /.widget-user -->
				</div>
				
				<div class="col-md-6"></div>
				<div class="col-md-6">
					<div class="form-group ">
						<div class="col-sm-3 margin"></div>
								<div class="col-sm-3 margin">
									<span id="Sil" class="btn btn-block btn-sm btn-danger">Sil</span>
								</div>
							<?php if($_GET){if($_GET['islem']=="Duzenle") { ?>
								<div class="col-sm-3 margin">
									<span id="Onayla" class="btn btn-block btn-sm btn-success">Onayla</span>
								</div>
							<?php }  }  ?>
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
			var ID="<?=$ID?>";
				function Form1Kaydet() {
                    
                    $.ajax(
                        {
                            url: "ajax/Kayit/YorumOnay.php",
                            type: "POST",
                            dataType: "JSON",
                            data: "islem=Onay&&ID="+ID,
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
                                            window.location="YorumListe.php";
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
                    $.ajax(
                        {
                            url: "ajax/Sil/YorumSil.php",
                            type: "POST",
                            dataType: "JSON",
                            data: "islem=Sil&ID="+ID,
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
                                            window.location="YorumListe.php";
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
		$("#Onayla").click(function(){
			
			Form1Kaydet();
		});	
		$("#Sil").click(function(){
			
			Form1Guncelle();
		});		
	</script>
</body>
</html>
<?php } ?>