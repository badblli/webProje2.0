<?php
require_once '../../../../system/guvenlik.php';
if(OturumAktif()==true)
{
require_once '../../../../system/ayar.php';

if($_POST){
	$islem		=($_POST['islem']);
	$Sonuc=[];
 if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	 
	if($islem=="Sil")
{
	$ID = $_POST['ID'];
	$query = $db->prepare("Update kullanicilar set IsActive=? WHERE UserID=?");
	$delete = $query->execute(array(0,$ID));
} else if($islem=="TopluSil")
        {
            $query = $db->prepare("Update nedenbiz set IsActive=? WHERE IsActive=?");
            $delete = $query->execute(array(0,1));
        }

	if ( $delete )
		{						   
			$Sonuc["ok"] = 'Başarı ile Silinmiştir !' ;
		}
		else
		{					   
			$Sonuc["hata"] = 'Silme İşlemi Başarısız !' ;
		}

}

echo json_encode($Sonuc);
				
				
		
				
}
}
 ?>