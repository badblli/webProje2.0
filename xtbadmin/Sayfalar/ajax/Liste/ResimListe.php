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
	 
	$sql = $db->prepare("select r.ID,KatID,Resim,ResimAdi,ResimAciklamasi,KategoriAdi,Aciklama  from resimler r  
						left join resimkategorileri rk on rk.ID=r.KatID
						where r.IsActive=1 and
                            (
                            ResimAdi like :Kosul
                            or Resim like :Kosul
                            or ResimAciklamasi like :Kosul
                            or KategoriAdi like :Kosul
                            or Aciklama like :Kosul
                            ) order by r.ID desc");
	$sql->bindParam(":Kosul",$Kosul,PDO::PARAM_STR);							
    $sql->execute();
	
				     while($row=$sql->fetch(PDO::FETCH_ASSOC)) 
					{
						$say++;
						$Resim= $row['Resim'];
						$ResimAdi= $row['ResimAdi'];
						$KategoriAdi= $row['KategoriAdi'];
						$ResimAciklamasi= kisalt($row['ResimAciklamasi'],130);
						$ID = $row['ID'];
						
					$deger[] ='
						<tr style="cursor:pointer" ondblclick="SatirSet(this);">
							<td style="display: none;">
								'.$ID.'
							</td>
							<td class="ResimSekil"><img src="../../images/'.$Resim.'" height="50px" width="50px"></td>
							<td>'.$KategoriAdi.'</td>
							<td>'.$ResimAdi.'</td>
							<td>'.$ResimAciklamasi.'</td>
						</tr>  ';
					}	
					
	$sonuc["say"] = 'Toplam '.$say.' Kayıt Bulunuyor' ;
	$sonuc["ok"]  = $deger;
	echo json_encode($sonuc); 
	

} ?>