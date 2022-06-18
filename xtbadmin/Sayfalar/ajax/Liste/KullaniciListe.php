<?php
require_once '../../../../config/guvenlik.php';
if(OturumAktif()==true)
{
require_once '../../../../config/config.php';
require_once '../../../../config/fonksiyon.php';

 if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$Kosul=$_POST["Like"];
	$Kosul="%".$Kosul."%"; 
 }else{
	$Kosul="%%"; 
	}
	$say=0;
	$deger=array();
	$sonuc = array();
	 
	$sql = $conn->prepare("select *  from kullanicilar  
						where IsActive=1 and
                            (
                            KullaniciAdi like :Kosul
                            or Yetki like :Kosul
                            or Adi like :Kosul
                            or Soyadi like :Kosul
                            or TelNo like :Kosul
                            or Email like :Kosul
                            or Adres like :Kosul
                            ) order by UserID desc");
	$sql->bindParam(":Kosul",$Kosul,PDO::PARAM_STR);							
    $sql->execute();
	
				     while($row=$sql->fetch(PDO::FETCH_ASSOC)) 
					{
						$say++;
						$KullaniciAdi= $row['KullaniciAdi'];
						$Yetki= $row['Yetki'];
						$Adi= $row['Adi'];
						$Soyadi= $row['Soyadi'];
						$TelNo= $row['TelNo'];
						$Email= $row['Email'];
						$Adres= kisalt($row['Adres'],130);
						$ID = $row['UserID'];
						
					$deger[] ='
						<tr style="cursor:pointer" ondblclick="SatirSet(this);">
							<td style="display: none;">
								'.$ID.'
							</td>
							<td>'.$KullaniciAdi.'</td>
							<td>'.$Yetki.'</td>
							<td>'.$Adi.'</td>
							<td>'.$Soyadi.'</td>
							<td>'.$TelNo.'</td>
							<td>'.$Email.'</td>
							<td>'.$Adres.'</td>
						</tr>  ';
					}	
					
	$sonuc["say"] = 'Toplam '.$say.' Kayıt Bulunuyor' ;
	$sonuc["ok"]  = $deger;
	echo json_encode($sonuc); 
	

} ?>