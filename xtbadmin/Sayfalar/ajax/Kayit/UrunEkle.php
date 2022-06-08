<?php
require_once '../../../../system/guvenlik.php';
if(OturumAktif()==true)
{
require_once '../../../../system/ayar.php';
require_once '../../../../system/fonksiyon.php';

if($_POST){
	$islem		=$_POST['islem'];
	$Sonuc=[];
 if ($_SERVER['REQUEST_METHOD'] === 'POST') {
 
	if($islem=="Kayit")
    {
		$UrunKatID		= $_POST['UrunKatID'];
		$UrunResmi		= $_POST['Resim'];
		$UrunAdi		= $_POST['UrunAdi'];
		$UrunKodu		= $_POST['UrunKodu'];
		$UrunTipi		= $_POST['UrunTipi'];
		$UrunRengi		= $_POST['UrunRengi'];
		$UrunAciklama	= $_POST['UrunAciklama'];
		if ($UrunKatID == "" && !is_numeric($UrunKatID))
        {
			$Sonuc["hata"]='Lütfen Kategori Alanını Boş Bırakmayın..!';
			echo json_encode($Sonuc);
			return;	
        }	
		if ($UrunAdi == "" )
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
			
		$save = $db->prepare("INSERT INTO urunler (UrunKatID,UrunResmi,UrunAdi,UrunKodu,UrunTipi,UrunRengi,UrunAciklama,IsActive) VALUES (?,?,?,?,?,?,?,?)");
		$save->execute(array($UrunKatID,$UrunResmi,$UrunAdi,$UrunKodu,$UrunTipi,$UrunRengi,$UrunAciklama,1));
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
		$ID				= $_POST['ID'];
		$UrunKatID		= $_POST['UrunKatID'];
		$UrunResmi		= $_POST['Resim'];
		$UrunAdi		= $_POST['UrunAdi'];
		$UrunKodu		= $_POST['UrunKodu'];
		$UrunTipi		= $_POST['UrunTipi'];
		$UrunRengi		= $_POST['UrunRengi'];
		$UrunAciklama	= $_POST['UrunAciklama'];
		
		if ($UrunKatID == "" && !is_numeric($UrunKatID))
        {
			$Sonuc["hata"]='Lütfen Kategori Alanını Boş Bırakmayın..!';
			echo json_encode($Sonuc);
			return;	
        }	
		if ($UrunAdi == "" )
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
		
		$save = $db->prepare("UPDATE urunler SET UrunKatID=?,UrunResmi=?,UrunAdi=?,UrunKodu=?,UrunTipi=?,UrunRengi=?,UrunAciklama=?, IsActive=? WHERE ID=?");
		$save->execute(array($UrunKatID,$UrunResmi,$UrunAdi,$UrunKodu,$UrunTipi,$UrunRengi,$UrunAciklama,1,$ID));
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