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
		$Facebook		= $_POST['Facebook'];
		$Twitter		= $_POST['Twitter'];
		$Skype			= $_POST['Skype'];
		$GPlus			= $_POST['GPlus'];
		$Instagram		= $_POST['Instagram'];
		$GoogleAnalytics= $_POST['GoogleAnalytics'];
			
			
		$save = $db->prepare("UPDATE firmabilgileri SET Facebook=?,Twitter=?,Skype=?,GPlus=?,Instagram=?,GoogleAnalytics=? LIMIT 1");
		$save->execute(array($Facebook,$Twitter,$Skype,$GPlus,$Instagram,$GoogleAnalytics));
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