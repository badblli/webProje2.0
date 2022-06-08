<?php
require_once '../../config/guvenlik.php';
if(OturumAktif()==true)
{
    require_once '../../config/config.php';
	  require_once '../../config/fonksiyon.php';
    require_once '../Sayfalar/SayfaUst.php';
    require_once '../Sayfalar/SolMenu.php';
	
    ?>
	
	
	 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-success">
            <div class="box-header">
              <h3 class="box-title">Ürünler Liste 
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
            <div class="box-body">
			   <div class="row">
				<div class="col-md-12">
					<div class="col-sm-2">
						<a href ="UrunEkle.php" ><button  class="btn btn-block btn-success">Ekle</button></a><br />
					</div>

                    <div class="col-sm-3 pull-right">
                        <div  class="input-group custom-search-form">
                            <input id="TxtArama"   type="text" class="form-control">
                            <span  id="AramaBTN"  class="input-group-btn">
                             <button   class="btn bg-green" type="button">
                             <span   class="glyphicon glyphicon-search"></span>
                            </button>
                            </span>
                        </div><!-- /input-group -->
                    </div>
                </div>
                   <div class="col-md-12">
                       <div class="col-sm-3  pull-right">
                           <span class=" pull-right"id="ListeToplamKalan"></span><br />
                       </div>
				</div>
				</div>
                   <div class="table-responsive" style="height: 400px">
                   <div id="SonucListeLoad"></div>
                  <table id="Tablo" class="table table-bordered table-hover table-striped">
				  
                    <thead>
                      <tr>
                        <th style="display: none;"></th>
                        <th>Resim</th>
                        <th>Kategori</th>
                        <th>Ürün&nbsp;Adı</th>
                        <th>Üretici&nbsp;Firma</th>
                        <th>Ürün&nbsp;Türü</th>
                        <th>Açıklama</th>
                      </tr>
                    </thead>
                    <tbody id="SonucListe">
                    </tbody>
                    
                  </table>
				  </div>
                </div><!-- /.box-body -->
          </div>
          <!-- /.box -->

        </div>
        <!-- /.col-->
      </div>
      <!-- ./row -->
    </section>
    <!-- /.content -->
  </div>
	
	<div id="contextMenu" class="dropdown clearfix">
        <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu" style="display:block;position:static;margin-bottom:5px; border-color: #08ae66">
          <li id="DetayGorMenu"><a tabindex="-1"href="#">Düzenle</a></li>
          <li id="SilMenu"><a tabindex="-1" href="#">Sil</a></li>
          <li id="TopluSilMenu"><a tabindex="-1" href="#">Tümünü Sil</a></li>
          <li class="divider" style="background-color:#08ae66"></li>
          <li><h6><center>Menü</center></h6></li>

        </ul>
      </div>
	
<?php   require_once 'SayfaAlt.php'; 
		require_once 'SagMenu.php'; 
		require_once 'SayfaJs.php'; ?>
		
	
	<script>
      $(function () {

        $('#Tablo').DataTable({
          "paging": false,
          "lengthChange": false,
          "searching": false,
          "ordering": false,
          "info": false,
          "autoWidth": false
        });
      });

	
      function SonucListele() {
          $("#SonucListe").empty();
		  $("#SonucListe").load("ajax/Liste/UrunListe.php", function (cevap,durum) {
			  if(durum =="success")
				{
				  cevap=jQuery.parseJSON(cevap);
                  $("#SonucListe").empty();
                  $("#SonucListe").prepend(cevap.ok);
				  $("#ListeToplamKalan").empty();
				  $("#ListeToplamKalan").prepend(cevap.say);
				 
				}  
		  });
      }
      SonucListele();

      function SatirSet(e) {
        var ID =$(e)["0"].children[0].innerText;
        ID =   SayiTemizle(ID);
        window.location.href =("UrunEkle.php?islem=Duzenle&ID="+ID);
      }



      function SayiTemizle(e) {
        var value=e.replace(/[^0-9.,]*/g, '');
        value=value.replace(/\s/g, "");
        value=value.replace(/\.{2,}/g, '.');
        value=value.replace(/\.,/g, ',');
        value=value.replace(/\,\./g, ',');
        value=value.replace(/\,{2,}/g, ',');
        value=value.replace(/\.[0-9]+\./g, '.');
        return value;
      }

      $(function() {
        var $contextMenu = $("#contextMenu");
        var TiklanilanID;
        $("#DetayGorMenu").click(function()
        {
          window.location.href=("UrunEkle.php?islem=Duzenle&ID="+TiklanilanID);
        });
        $("#SilMenu").click(function()
        {
          var result = confirm("Silmek İstediğinize Emin Misiniz?");
          if (result) {

            $.ajax({
              url: "ajax/Sil/UrunSil.php",
              dataType: "JSON",
              type: "POST",
              data: {"islem":"Sil","ID":TiklanilanID},
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
                                        message: hatayok
                                    });
									SonucListele();
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
        });
        $("#TopluSilMenu").click(function()
        {
          var result = confirm("Tümünü Silmek İstediğinize Emin Misiniz?");
          if (result) {
            $.ajax({
              url: "ajax/Sil/UrunSil.php",
              dataType: "JSON",
              type: "POST",
              data: {"islem":"TopluSil"},
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
                                        message: hatayok
                                    });
									SonucListele();
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
        });

        $("body").on("contextmenu", "table tr", function(e) {
          $contextMenu.css({
            display: "block",
            left: e.pageX,
            top: e.pageY
          });
          ID =$(this)["0"].children[0].innerText;
          TiklanilanID =   SayiTemizle(ID);

          return false;
        });

        $contextMenu.on("click", "a", function() {
          $contextMenu.hide();
        });
        $("body").click(function() {
          $contextMenu.hide();
        });
      });
      var PostLoad = $("#SonucListeLoad");
      PostLoad.load("ajax/images/loading.html");
      PostLoad.hide();
      var PostRequest;
      function AramaIslemi(){
          PostLoad.show();
          if($("#TxtArama").val().length<=0)
          {
              if(PostRequest!=undefined)
              {
                  PostRequest.abort();
              }
              SonucListele();
              PostLoad.hide();
          }
          else{

              if(PostRequest!=undefined)
              {
                  PostRequest.abort();
              }
              PostRequest= $.post("ajax/Liste/UrunListe.php",{Like:$("#TxtArama").val()},function (cevap) {
				  cevap=jQuery.parseJSON(cevap);
                  $("#SonucListe").empty();
                  $("#SonucListe").prepend(cevap.ok);
				  $("#ListeToplamKalan").empty();
				  $("#ListeToplamKalan").prepend(cevap.say);
                  PostLoad.hide();
              });
          }

      }
	  $("#TxtArama").keyup(function () {
          
		AramaIslemi();  

      });
	  $("#AramaBTN").click(function(){
		AramaIslemi();
      });  
        </script>
</body>
</html>
<?php } ?>