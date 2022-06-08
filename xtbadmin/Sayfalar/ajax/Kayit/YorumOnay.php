<?php
require_once '../../../../system/guvenlik.php';
if(OturumAktif()==true)
{
require_once '../../../../system/ayar.php';

if($_POST){
	$islem		=$_POST['islem'];
	$Sonuc=[];
 if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	 
	if($islem=="Onay")
	{
		$ID = $_POST['ID'];
		$query = $db->prepare("Update yorumlar set IsActive=?,Onaylandi=? WHERE ID=?");
		$Yanit = $query->execute(array(1,1,$ID));
	}

	if ( $Yanit )
		{						   
			$Sonuc["ok"] = 'Onay İşlemi Başarılı !' ;
		}
		else
		{					   
			$Sonuc["hata"] = 'Onay İşlemi Başarısız !' ;
		}

}

echo json_encode($Sonuc);
				
				
		
				
}
}
 ?>