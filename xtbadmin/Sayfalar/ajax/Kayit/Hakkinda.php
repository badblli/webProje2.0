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
		$Hakkinda= $_POST['Hakkinda'];
			
		if ($Hakkinda == "")
        {
			$Sonuc["hata"]='Lütfen Hakkında Alanını Boş Bırakmayın..!';
			echo json_encode($Sonuc);
			return;	
        }	
		$save = $db->prepare("UPDATE firmabilgileri SET Hakkinda=? LIMIT 1");
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