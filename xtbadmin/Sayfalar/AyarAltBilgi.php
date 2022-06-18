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
              <h3 class="box-title">Alt Bilgi
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
				<div class="col-md-12">
					<div class="form-group margin">
                        <label class="col-sm-2 control-label">Footer Bilgisi
                            <span class="text-red"> *</span></label>
                        <div class="col-sm-8">
                            <input type="text" name="Footer1"
                                   class="form-control input-sm "
                                   value="<?= $SiteCopyright ?>"
                                   placeholder="Copyright | 2022 | badblli">
                        </div>
                    </div>
				</div>
				<div class="col-md-12">
					<textarea id="Footer" name="Footer" rows="10" cols="80"><?= $SiteCopyright ?></textarea>
				</div>
				<div class="col-md-6"></div>
				<div class="col-md-6">
					<div class="form-group ">
						<div class="col-sm-3 margin"></div>
								<div class="col-sm-3 margin">
									<button type="reset" class="btn btn-block btn-sm  btn-default ">Temizle</button>
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
		CKEDITOR.replace('Footer');
				function Form1Kaydet() {
                    var Form1 = document.getElementById('Form1');
                    if (Form1.Footer1.value == "") {
                        BootstrapDialog.show({
                            type: BootstrapDialog.TYPE_WARNING,
                            title: "Uyarı",
                            message: "Lütfen Footer Alanını Boş Bırakmayın..!"

                        });
                        return;
                    }
                    
                    var FormPost = $("#Form1").serialize();
                    $.ajax(
                        {
                            url: "ajax/Kayit/AyarAltBilgi.php",
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
			for (var Footer in CKEDITOR.instances)
					CKEDITOR.instances[Footer].updateElement();
			Form1Kaydet();
		});	
	</script>
</body>
</html>
<?php } ?>