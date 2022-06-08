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
		$Footer= $_POST['Footer'];
		$Footer1= $_POST['Footer1'];
			
			
		if ($Footer1 == "")
        {
			$Sonuc["hata"]='Lütfen Footer Alanını Boş Bırakmayın..!';
			echo json_encode($Sonuc);
			return;	
        }	
		$save = $db->prepare("UPDATE firmabilgileri SET Footer=?,Footer1=? LIMIT 1");
		$save->execute(array($Footer,$Footer1));
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