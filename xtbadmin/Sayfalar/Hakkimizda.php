<?php
require_once '../../config/guvenlik.php';
if(OturumAktif()==true)
{
    require_once '../../config/config.php';
	require_once '../../config/fonksiyon.php';
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
              <h3 class="box-title">Hakkında
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
              <form id="Form1">
                <textarea id="Hakkinda" name="Hakkinda" rows="10" cols="80"><?=$SiteDescription?></textarea>
				<div class="col-md-6"></div>
				<div class="col-md-6">
					<div class="form-group ">
						<div class="col-sm-3 margin"></div>
								<div class="col-sm-3 margin">
									<button type="reset" class="btn btn-block btn-sm  btn-default ">Temizle</button>
								</div>
							<?php if($_GET){if($_GET['islem']=="duzenle") { ?>
								<div class="col-sm-3 margin">
									<span id="Duzenle" class="btn btn-block btn-sm bg-info">Düzenle</span>
								</div>
							<?php }  } else { ?>
								<div class="col-sm-3 margin">
									<span id="Kaydet" class="btn btn-block btn-sm btn-info">Kaydet</span><br />
								</div>
							<?php  } ?>
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
		
	<script src="https://cdn.ckeditor.com/4.5.7/standard/ckeditor.js"></script>
	<script>
		// Replace the <textarea id="editor1"> with a CKEditor
		// instance, using default configuration.
		CKEDITOR.replace('Hakkinda');
		
				function Form1Kaydet() {
                    var Form1 = document.getElementById('Form1');
                    if (Form1.Hakkinda.value == "") {
                        BootstrapDialog.show({
                            type: BootstrapDialog.TYPE_WARNING,
                            title: "Uyarı",
                            message: "Lütfen Hakkında Alanını Boş Bırakmayın..!"

                        });
                        return;
                    }
                    var FormPost = $("#Form1").serialize();
                    $.ajax(
                        {
                            url: "ajax/Kayit/Hakkinda.php",
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
			for (var Hakkinda in CKEDITOR.instances)
					CKEDITOR.instances[Hakkinda].updateElement();
			Form1Kaydet();
		});		
	</script>
</body>
</html>
<?php } ?>