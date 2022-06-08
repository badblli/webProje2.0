  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">Menüler</li>
        <li><a href="index.php"><i class="fa fa-home"></i> <span>Anasayfa</span></a></li>
        <li><a href="Hakkimizda.php"><i class="fa fa-info"></i> <span>Hakkımızda</span></a></li>
        <li><a href="Iletisim.php"><i class="fa fa-send-o"></i> <span>İletişim</span></a></li>
		<li class="treeview">
		<?php $UrunQuery=$conn->query("SELECT count(1) AS Sonuc FROM products WHERE urunDurum=1");
				$UrunRow = $UrunQuery->fetch(PDO::FETCH_ASSOC);
				$UrunSonuc=$UrunRow['Sonuc']; ?>
          <a href="#">
            <i class="fa fa-object-group "></i>
            <span>Ürünler</span>
            <span class="pull-right-container">
              <span class="label bg-green pull-right"><?=$UrunSonuc?></span>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="UrunEkle.php"><i class="fa fa-plus"></i> Ekle</a></li>
            <li><a href="UrunListe.php"><i class="fa fa-reorder"></i> Liste</a></li>
          </ul>
        </li>
		<li class="treeview">
		<?php $YorumQuery=$conn->query("SELECT count(1) AS Sonuc FROM notifications WHERE durum=1");
				$YorumRow = $YorumQuery->fetch(PDO::FETCH_ASSOC);
				$YorumSonuc=$YorumRow['Sonuc']; ?>
          <a href="#">
            <i class="fa fa-comment-o"></i>
            <span>Mesajlar</span>
            <span class="pull-right-container">
              <span class="label bg-green pull-right"><?=$YorumSonuc?></span>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="YorumListe.php"><i class="fa fa-reorder"></i> Liste</a></li>
          </ul>
        </li>
		<li class="treeview">
		<?php $KullQuery=$conn->query("SELECT count(1) AS Sonuc FROM notifications WHERE durum=1");
				$KullRow = $KullQuery->fetch(PDO::FETCH_ASSOC);
				$KullSonuc=$KullRow['Sonuc']; ?>
          <a href="#">
            <i class="fa  fa-users "></i>
            <span>Kullacılar</span>
            <span class="pull-right-container">
              <span class="label bg-green pull-right"><?=$KullSonuc?></span>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="KullaniciEkle.php"><i class="fa fa-plus"></i> Ekle</a></li>
            <li><a href="KullaniciListe.php"><i class="fa fa-reorder"></i> Liste</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa  fa-cogs"></i>
            <span>Site Ayarları</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="AyarGenel.php"><i class="fa fa-cog"></i> Genel Ayarlar</a></li>
            <li><a href="AyarMail.php"><i class="fa fa-envelope-o"></i> Mail Ayarları</a></li>
            <li><a href="AyarSosyalMedya.php"><i class="fa fa-share-alt"></i> Sosyal Medya</a></li>
            <li><a href="AyarAltBilgi.php"><i class="fa fa-pencil-square-o"></i> Alt Bilgi</a></li>
          </ul>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
