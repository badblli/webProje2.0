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
		$KatID			= $_POST['KatID'];
		$Resim			= $_POST['Resim'];
		$ResimAdi		= $_POST['ResimAdi'];
		$ResimAciklamasi= $_POST['ResimAciklamasi'];
		if ($KatID == "" && !is_numeric($KatID))
        {
			$Sonuc["hata"]='Lütfen Kategori Alanını Boş Bırakmayın..!';
			echo json_encode($Sonuc);
			return;	
        }	
		if ($Resim == "")
        {
			$Sonuc["hata"]='Lütfen Resim Alanını Boş Bırakmayın..!';
			echo json_encode($Sonuc);
			return;	
        }	
			
		$save = $db->prepare("INSERT INTO resimler (KatID,Resim,ResimAdi,ResimAciklamasi,IsActive) VALUES (?,?,?,?,?)");
		$save->execute(array($KatID,$Resim,$ResimAdi,$ResimAciklamasi,1));
		if ( $save )
		{									   
			$Sonuc["ok"] = 'Başarı ile Güncellenmiştir !' ;
		}
		else
		{									   
			$Sonuc["hata"] = 'Güncelleme İşlemi Başarısız !' ;
		}
	}
	if($islem=="Duzenle")
    {
		$ID				= $_POST['ID'];
		$KatID			= $_POST['KatID'];
		$Resim			= $_POST['Resim'];
		$ResimAdi		= $_POST['ResimAdi'];
		$ResimAciklamasi= $_POST['ResimAciklamasi'];
		
		if ($KatID == "" && !is_numeric($KatID))
        {
			$Sonuc["hata"]='Lütfen Kategori Alanını Boş Bırakmayın..!';
			echo json_encode($Sonuc);
			return;	
        }	
		if ($Resim == "")
        {
			$Sonuc["hata"]='Lütfen Resim Alanını Boş Bırakmayın..!';
			echo json_encode($Sonuc);
			return;	
        }	
		
		$save = $db->prepare("UPDATE resimler SET KatID=?,Resim=?,ResimAdi=?,ResimAciklamasi=?, IsActive=? WHERE ID=?");
		$save->execute(array($KatID,$Resim,$ResimAdi,$ResimAciklamasi,1,$ID));
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