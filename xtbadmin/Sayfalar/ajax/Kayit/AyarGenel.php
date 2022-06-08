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
		$SiteUrl	= $_POST['SiteUrl'];
		$Title		= $_POST['Title'];
		$Description= $_POST['Description'];
		$Keywords	= $_POST['Keywords'];
		$Author		= $_POST['Author'];
		$reCAPTCHA	= $_POST['reCAPTCHA'];
		$UstLogo	= $_POST['UstLogo'];
		$AltLogo	= $_POST['AltLogo'];
		$IsActive	= $_POST['IsActive'];
		$Tema	= $_POST['Tema'];
			
			
		$save = $db->prepare("UPDATE firmabilgileri SET SiteUrl=?,Title=?,Description=?,Keywords=?,Author=?,reCAPTCHA=?,UstLogo=?,Tema=?,AltLogo=?,IsActive=? LIMIT 1");
		$save->execute(array($SiteUrl,$Title,$Description,$Keywords,$Author,$reCAPTCHA,$UstLogo,$Tema,$AltLogo,$IsActive));
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