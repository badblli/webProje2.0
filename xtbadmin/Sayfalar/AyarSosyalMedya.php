<?php
require_once '../../system/guvenlik.php';
if(OturumAktif()==true)
{
    require_once '../../system/ayar.php';
	require_once '../../system/fonksiyon.php';
    require_once 'SayfaUst.php';
    require_once 'SolMenu.php';
    ?>
	 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-success">
            <div class="box-header">
              <h3 class="box-title">Sosyal Medya
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
                                <label class="col-sm-2 control-label">Facebook</label>
                                <div class="col-sm-9">
                                    <input type="text" name="Facebook"
                                           class="form-control input-sm "
                                           value="<?= $Facebook ?>"
                                           placeholder="https://www.facebook.com/mucahid1topal">
                                </div>
                            </div>
                            <div class="form-group" >
                                <label class="col-sm-2 control-label">Twitter</label>
                                <div class="col-sm-9">
                                    <input id="Twitter" type="text"
                                           name="Twitter"
                                           class="form-control input-sm "
                                           value="<?= $Twitter ?>"
                                           placeholder="http://twitter.com/mucahittopal">
                                </div>
                            </div>
                            <div class="form-group" >
                                <label class="col-sm-2 control-label">Skype</label>
                                <div class="col-sm-9">
                                    <input id="Skype" type="text"
                                           name="Skype"
                                           class="form-control input-sm "
                                           value="<?= $Skype ?>"
                                           placeholder="http://skype.com/mucahittopall">
                                </div>
                            </div>
                            <div class="form-group" >
                                <label class="col-sm-2 control-label">GPlus</label>
                                <div class="col-sm-9">
                                    <input id="GPlus" type="text"
                                           name="GPlus"
                                           class="form-control input-sm "
                                           value="<?= $GPlus ?>"
                                           placeholder="https://plus.google.com/u/1/117110437704859894125">
                                </div>
                            </div>
                            <div class="form-group" >
                                <label class="col-sm-2 control-label">Instagram</label>
                                <div class="col-sm-9">
                                    <input id="Instagram" type="text"
                                           name="Instagram"
                                           class="form-control input-sm "
                                           value="<?= $Instagram ?>"
                                           placeholder="https://instagram.com/mucahittopall?ref=badge">
                                </div>
                            </div>
                            <div class="form-group" >
                                <label class="col-sm-2 control-label">Google Analytics</label>
                                <div class="col-sm-9">
                                    <input id="GoogleAnalytics" type="text"
                                           name="GoogleAnalytics"
                                           class="form-control input-sm "
                                           value="<?= $GoogleAnalytics ?>"
                                           placeholder="UA-XXXXXXXXX-X">
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
										<div class="col-sm-3 margin">
											<span id="Kaydet" class="btn btn-block btn-sm btn-info">Kaydet</span><br />
										</div>
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
		
		
				function Form1Kaydet() {
                    var Form1 = document.getElementById('Form1');
                    var FormPost = $("#Form1").serialize();
                    $.ajax(
                        {
                            url: "ajax/Kayit/AyarSosyalMedya.php",
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
                                            window.location="Anasayfa.php";
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
	</script>
</body>
</html>
<?php } ?>