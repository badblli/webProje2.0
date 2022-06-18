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
	 
	$sql = $conn->prepare("select urunResim, urunAdi,urunTuru, ureticiFirma, urunSatisFiyat, urunAciklama, id  from products");
	//$sql->bindParam(":Kosul",$Kosul,PDO::PARAM_STR);							
    $sql->execute();
	
				     while($row=$sql->fetch(PDO::FETCH_ASSOC)) 
					{
						$say++;
						$Resim= $row['urunResim'];
						$UrunAdi= $row['urunAdi'];
						$UrunTipiAdi= $row['urunTuru'];
						$ureticiFirma = $row['ureticiFirma'];
						//$Fiyat= $row['urunSatisFiyat'];
						$UrunAciklama= kisalt($row['urunAciklama'],130);
						$ID = $row['id'];
						
					$deger[] ='
						<tr style="cursor:pointer" ondblclick="SatirSet(this);">
							<td style="display: none;">
								'.$ID.'
							</td>
							<td class="ResimSekil"><img src="'.$Resim.'" height="50px" width="50px"></td>
							<td>'.$UrunAdi.'</td>
							<td>'.$UrunTipiAdi.'</td>
							<td>'.$ureticiFirma.'</td>
							<td>'.$UrunAciklama.'</td>
						</tr>  ';
					}	
					
	$sonuc["say"] = 'Toplam '.$say.' Kayıt Bulunuyor' ;
	$sonuc["ok"]  = $deger;
	echo json_encode($sonuc); 
	

} ?>