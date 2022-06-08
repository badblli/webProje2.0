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
		$SmtpHost		= $_POST['SmtpHost'];
		$SmtpUser		= $_POST['SmtpUser'];
		$SmtpPassword	= $_POST['SmtpPassword'];
		$SmtpPort		= $_POST['SmtpPort'];
			
			
		$save = $db->prepare("UPDATE firmabilgileri SET SmtpHost=?,SmtpUser=?,SmtpPassword=?,SmtpPort=? LIMIT 1");
		$save->execute(array($SmtpHost,$SmtpUser,$SmtpPassword,$SmtpPort));
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