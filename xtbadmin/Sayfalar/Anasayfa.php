<?php require_once '../Sayfalar/SayfaUst.php'; ?>
<?php require_once '../Sayfalar/SolMenu.php'; ?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    
    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
		<div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?= $UrunSonuc?></h3>

              <p>Ürünler</p>
            </div>
            <div class="icon">
              <i class="fa fa-object-group "></i>
            </div>
            <a href="UrunListe.php" class="small-box-footer">Devamı <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
		<div class="col-lg-3 col-xs-6">
          <!-- small box -->
		  <?php $UrunTipQuery=$conn->query("SELECT COUNT(DISTINCT urunTuru) AS Sonuc FROM products");//SELECT COUNT(DISTINCT urunTuru) AS Sonuc FROM products
				$UrunTipRow = $UrunTipQuery->fetch(PDO::FETCH_ASSOC);
				$UrunTipSonuc=$UrunTipRow['Sonuc']; ?>
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?= $UrunTipSonuc?></h3>

              <p>Ürün Tipleri</p>
            </div>
            <div class="icon">
              <i class="fa fa-gg"></i>
            </div>
            <a href="UrunTipListe.php" class="small-box-footer">Devamı <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-red">
            <div class="inner">
              <h3><?=$YorumSonuc?></h3>

              <p>Mesajlar</p>
            </div>
            <div class="icon">
              <i class="fa fa-comment-o"></i>
            </div>
            <a href="YorumListe.php" class="small-box-footer">Devamı <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?=$KullSonuc?></h3>

              <p>Kullanıcılar</p>
            </div>
            <div class="icon">
              <i class="fa  fa-users "></i>
            </div>
            <a href="KullaniciListe.php" class="small-box-footer">Devamı <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
      </div>
      <!-- /.row -->
      <!-- Main row -->
      
      <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 
<?php   require_once 'SayfaAlt.php'; 
		require_once 'SagMenu.php'; 
		require_once 'SayfaJs.php'; ?>

</body>
</html>