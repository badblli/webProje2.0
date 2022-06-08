<?php
require_once '../../config/guvenlik.php';
if(OturumAktif()==true)
{
    require_once '../../config/config.php';
	require_once '../../config/fonksiyon.php';
    require_once '../Sayfalar/SayfaUst.php';
    require_once '../Sayfalar/SolMenu.php';
    ?>
	<link rel="stylesheet" href="plugins/filesupload/css/jquery.fileupload.css">
	 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-success">
            <div class="box-header">
              <h3 class="box-title">Genel Ayarlar
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
                                <label class="col-sm-3 control-label">Geliştirici Url</label>
                                <div class="col-sm-8">
                                    <input type="url" name="SiteUrl"
                                           class="form-control input-sm "
                                           value=""
                                           placeholder="http://badblli.me">
                                </div>
                            </div>
                            <div class="form-group" >
                                <label class="col-sm-3 control-label">Site Başlığı</label>
                                <div class="col-sm-8">
                                    <input id="Title" type="text"
                                           name="Title"
                                           class="form-control input-sm "
                                           value="<?= $SiteTitle ?>"
                                           placeholder="<?= $SiteTitle ?>">
                                </div>
                            </div>
                            <div class="form-group" >
                                <label class="col-sm-3 control-label">Site Açıklaması (Description)</label>
                                <div class="col-sm-8">
                                    <input id="Description" type="text"
                                           name="Description"
                                           class="form-control input-sm "
                                           value="<?= $SiteDescription ?>"
                                           placeholder="<?= $SiteDescription ?>">
                                </div>
                            </div>
                            <div class="form-group" >
                                <label class="col-sm-3 control-label">Anahtar Kelimeler (Keywords)</label>
                                <div class="col-sm-8">
                                    <input id="Keywords" type="text"
                                           name="Keywords"
                                           class="form-control input-sm "
                                           value="<?= $SiteKeywords ?>"
                                           placeholder="<?= $SiteKeywords ?>">
                                </div>
                            </div>
                            <div class="form-group" >
                                <label class="col-sm-3 control-label">Site Yazarı (Author)</label>
                                <div class="col-sm-8">
                                    <input id="Author" type="text"
                                           name="Author"
                                           class="form-control input-sm "
                                           value="<?= $Author ?>"
                                           placeholder="<?= $Author ?>">
                                </div>
                            </div>
							<hr>
							<hr>
							<div class="col-md-6">						
							</div>
							<div class="col-md-6">	
								<div class="form-group" >
									<label class="col-sm-4 control-label">Site Durumu</label>
									<div class="col-sm-6">
										<select id="IsActive" type="text"
											name="IsActive" value="<?= $IsActive ?>" class="form-control input-sm">
											<option></option>
											<option value="1">Aktif</option>
											<option value="2">Pasif</option>
										</select>
									</div>
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
		

<!-- The Load Image plugin is included for the preview images and image resizing functionality -->
<script src="plugins/filesupload/js/load-image.all.min.js"></script>
<!-- The Canvas to Blob plugin is included for image resizing functionality -->
<script src="plugins/filesupload/js/canvas-to-blob.min.js"></script>

		
<script src="plugins/filesupload/js/jquery.iframe-transport.js"></script>
<!-- The basic File Upload plugin -->
<script src="plugins/filesupload/js/jquery.fileupload.js"></script>
<!-- The File Upload processing plugin -->
<script src="plugins/filesupload/js/jquery.fileupload-process.js"></script>
<!-- The File Upload image preview & resize plugin -->
<script src="plugins/filesupload/js/jquery.fileupload-image.js"></script>
<!-- The File Upload audio preview plugin -->
<script src="plugins/filesupload/js/jquery.fileupload-audio.js"></script>
<!-- The File Upload video preview plugin -->
<script src="plugins/filesupload/js/jquery.fileupload-video.js"></script>
<!-- The File Upload validation plugin -->
<script src="plugins/filesupload/js/jquery.fileupload-validate.js"></script>
	<script>

$("#Tema").val("<?=$Tema?>");	
$("#IsActive").val("<?=$IsActive?>");	
		
				function Form1Kaydet() {
                    var Form1 = document.getElementById('Form1');
                    var FormPost = $("#Form1").serialize();
                    $.ajax(
                        {
                            url: "ajax/Kayit/AyarGenel.php",
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
var UstLogoName="<?=$UstLogo?>";	
var UstLogoLink;	
var AltLogoName="<?=$AltLogo?>";	
var AltLogoLink;	
$("#UstLogoName").val(UstLogoName);
if(UstLogoName){
	$("#UstLogoFiles").append('<img src="../../images/'+UstLogoName+'"  width="100px"  >');
}
$("#AltLogoName").val(AltLogoName);
if(AltLogoName){
	$("#AltLogoFiles").append('<img src="../../images/'+AltLogoName+'" width="100px"  >');
}
$(function () {
    'use strict';
    // Change this to the location of your server-side upload handler:
    var url = 'ajax/FileUpload/',
        uploadButton = $('<label/>')
            .addClass('btn btn-primary btn-block btn-sm')
            .prop('disabled', true)
            .text('Yükleniyor...')
            .on('click', function () {
                var $this = $(this),
                    data = $this.data();
                $this
                    .off('click')
                    .text('İptal')
                    .on('click', function () {
                        $this.remove();
                        data.abort();
                    });
                data.submit().always(function () {
                    $this.remove();
                });
            });
//Üst Logo İçin			
    $('#UstLogo').fileupload({
        url: url,
        dataType: 'json',
        autoUpload: false,
        acceptFileTypes: /(\.|\/)(gif|jpe?g|png)$/i,
        maxFileSize: 999000,
        // Enable image resizing, except for Android and Opera,
        // which actually support image resizing, but fail to
        // send Blob objects via XHR requests:
        disableImageResize: /Android(?!.*Chrome)|Opera/
            .test(window.navigator.userAgent),
        previewMaxWidth: 100,
        previewMaxHeight: 100,
        previewCrop: true
    }).on('fileuploadadd', function (e, data) {
		$("#UstLogoFiles img").hide();
        data.context = $('<div/>').appendTo('#UstLogoFiles');
        $.each(data.files, function (index, file) {
            var node = $('<p/>')
                    .append($('<span/>').text(file.name));
            if (!index) {
                node
                    .append('<br>')
                    .append(uploadButton.clone(true).data(data));
            }
            node.appendTo(data.context);
        });
    }).on('fileuploadprocessalways', function (e, data) {
        var index = data.index,
            file = data.files[index],
            node = $(data.context.children()[index]);
        if (file.preview) {
            node
                .prepend('<br>')
                .prepend(file.preview);
        }
        if (file.error) {
            node
                .append('<br>')
                .append($('<span class="text-danger"/>').text(file.error));
        }
        if (index + 1 === data.files.length) {
            data.context.find('label')
                .text('Yükle')
                .prop('disabled', !!data.files.error);
        }
    }).on('fileuploadprogressall', function (e, data) {
        var progress = parseInt(data.loaded / data.total * 100, 10);
        $('#UstLogoProgress .progress-bar').css(
            'width',
            progress + '%'
        );
    }).on('fileuploaddone', function (e, data) {
        $.each(data.result.files, function (index, file) {
			UstLogoName=file.name;
			UstLogoLink=file.url;
			$("#UstLogoName").val(UstLogoName);
            if (file.url) {
                var link = $('<a>')
                    .attr('target', '_blank')
                    .prop('href', file.url);
                $(data.context.children()[index])
                    .wrap(link);
				$("#UstLogoResimSec").hide();
				$("#UstLogoProgress").hide();
            } else if (file.error) {
                var error = $('<span class="text-danger"/>').text(file.error);
                $(data.context.children()[index])
                    .append('<br>')
                    .append(error);
            }
        });
    }).on('fileuploadfail', function (e, data) {
        $.each(data.files, function (index) {
            var error = $('<span class="text-danger"/>').text('Yüklenirken Hata Oluştu.');
            $(data.context.children()[index])
                .append('<br>')
                .append(error);
        });
    }).prop('disabled', !$.support.fileInput)
        .parent().addClass($.support.fileInput ? undefined : 'disabled');
		
		
		
//Alt Logo İçin		
	$('#AltLogo').fileupload({
        url: url,
        dataType: 'json',
        autoUpload: false,
        acceptFileTypes: /(\.|\/)(gif|jpe?g|png)$/i,
        maxFileSize: 999000,
        // Enable image resizing, except for Android and Opera,
        // which actually support image resizing, but fail to
        // send Blob objects via XHR requests:
        disableImageResize: /Android(?!.*Chrome)|Opera/
            .test(window.navigator.userAgent),
        previewMaxWidth: 100,
        previewMaxHeight: 100,
        previewCrop: true
    }).on('fileuploadadd', function (e, data) {
		$("#AltLogoFiles img").hide();
        data.context = $('<div/>').appendTo('#AltLogoFiles');
        $.each(data.files, function (index, file) {
            var node = $('<p/>')
                    .append($('<span/>').text(file.name));
            if (!index) {
                node
                    .append('<br>')
                    .append(uploadButton.clone(true).data(data));
            }
            node.appendTo(data.context);
        });
    }).on('fileuploadprocessalways', function (e, data) {
        var index = data.index,
            file = data.files[index],
            node = $(data.context.children()[index]);
        if (file.preview) {
            node
                .prepend('<br>')
                .prepend(file.preview);
        }
        if (file.error) {
            node
                .append('<br>')
                .append($('<span class="text-danger"/>').text(file.error));
        }
        if (index + 1 === data.files.length) {
            data.context.find('label')
                .text('Yükle')
                .prop('disabled', !!data.files.error);
        }
    }).on('fileuploadprogressall', function (e, data) {
        var progress = parseInt(data.loaded / data.total * 100, 10);
        $('#AltLogoProgress .progress-bar').css(
            'width',
            progress + '%'
        );
    }).on('fileuploaddone', function (e, data) {
        $.each(data.result.files, function (index, file) {
			AltLogoName=file.name;
			AltLogoLink=file.url;
			$("#AltLogoName").val(AltLogoName);
            if (file.url) {
                var link = $('<a>')
                    .attr('target', '_blank')
                    .prop('href', file.url);
                $(data.context.children()[index])
                    .wrap(link);
				$("#AltLogoResimSec").hide();
				$("#AltLogoProgress").hide();	
            } else if (file.error) {
                var error = $('<span class="text-danger"/>').text(file.error);
                $(data.context.children()[index])
                    .append('<br>')
                    .append(error);
            }
        });
    }).on('fileuploadfail', function (e, data) {
        $.each(data.files, function (index) {
            var error = $('<span class="text-danger"/>').text('Yüklenirken Hata Oluştu.');
            $(data.context.children()[index])
                .append('<br>')
                .append(error);
        });
    }).prop('disabled', !$.support.fileInput)
        .parent().addClass($.support.fileInput ? undefined : 'disabled');	
});	
	</script>
</body>
</html>
<?php } ?>