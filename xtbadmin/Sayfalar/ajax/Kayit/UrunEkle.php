<?php
require_once '../../config/guvenlik.php';
if(OturumAktif()==true)
{
    require_once '../../config/config.php';
	require_once '../../config/fonksiyon.php';

if($_POST){
	$islem		=$_POST['islem'];
	$Sonuc=[];
 if ($_SERVER['REQUEST_METHOD'] === 'POST') {
 
	if($islem=="Kayit")
    {
		$urunAdi		= $_POST['urunAdi'];
		$urunTuru		= $_POST['urunTuru'];
		$ureticiFirma	= $_POST['ureticiFirma'];
		$urunAciklama	= $_POST['urunAciklama	'];
		$urunResim		= $_POST['urunResim'];
		$urunDurum		= $_POST['urunDurum'];
		if ($urunAdi == "" )
        {
			$Sonuc["hata"]='Lütfen Ürün Adını Boş Bırakmayın..!';
			echo json_encode($Sonuc);
			return;	
        }	
		if ($UrunResmi == "")
        {
			$Sonuc["hata"]='Lütfen Resim Alanını Boş Bırakmayın..!';
			echo json_encode($Sonuc);
			return;	
        }	
			
		$save = $db->prepare("INSERT INTO products (urunAdi,urunTuru,ureticiFirma,urunAciklama, urunResim, urunDurum) VALUES (?,?,?,?,?,?)");
		$save->execute(array($urunAdi,$ureticiFirma,$ureticiFirma,$urunAciklama	,$UrunTipi,$UrunRengi,$UrunAciklama,1));
		if ( $save )
		{									   
			$Sonuc["ok"] = 'Başarı ile Eklenmiştir !' ;
		}
		else
		{									   
			$Sonuc["hata"] = 'Ekleme İşlemi Başarısız !' ;
		}
	}
	if($islem=="Duzenle")
    {
		$urunAdi		= $_POST['urunAdi'];
		$urunTuru		= $_POST['urunTuru'];
		$ureticiFirma	= $_POST['ureticiFirma'];
		$urunAciklama	= $_POST['urunAciklama	'];
		$urunResim		= $_POST['urunResim'];
		$urunDurum		= $_POST['urunDurum'];
		
		if ($urunAdi == "" )
        {
			$Sonuc["hata"]='Lütfen Ürün Adını Boş Bırakmayın..!';
			echo json_encode($Sonuc);
			return;	
        }	
		if ($urunResim == "")
        {
			$Sonuc["hata"]='Lütfen Resim Alanını Boş Bırakmayın..!';
			echo json_encode($Sonuc);
			return;	
        }
		
		$save = $db->prepare("UPDATE products SET urunAdi=?,urunTuru=?,ureticiFirma=?,urunAciklama=?, urunResim=?, urunDurum=? WHERE id=id");
		$save->execute(array($urunAdi,$ureticiFirma,$ureticiFirma,$urunAciklama	,$UrunTipi,$UrunRengi,$UrunAciklama,1));
		if ( $save )
		{									   
			$Sonuc["ok"] = 'Başarı ile Güncellenmiştir !' ;
		}
		else
		{									   
			$Sonuc["hata"] = 'Güncelleme İşlemi Başarısız !' ;
		}
	}
}
	echo json_encode($Sonuc);
	}
}
 ?>