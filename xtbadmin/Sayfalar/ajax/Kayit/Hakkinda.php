<?php
require_once '../../config/guvenlik.php';
if(OturumAktif()==true)
{
	require_once '../../../../config/config.php';
	require_once '../../../../config/fonksiyon.php';

if($_POST){
	$islem=$_POST['islem'];
	$Sonuc=[];
 if ($_SERVER['REQUEST_METHOD'] === 'POST') {
 
	if($islem=="Kayit")
    {
		$Hakkinda= $_POST['SiteDescription'];
			
		if ($Hakkinda == "")
        {
			$Sonuc["hata"]='Lütfen Hakkında Alanını Boş Bırakmayın..!';
			echo json_encode($Sonuc);
			return;	
        }
		$save = $conn->prepare("UPDATE config SET SiteDescription=? WHERE id=0");
		$save->execute(array($Hakkinda));
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