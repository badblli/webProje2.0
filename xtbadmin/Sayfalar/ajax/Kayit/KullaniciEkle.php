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
		$KullaniciAdi	= $_POST['KullaniciAdi'];
		$Sifre			= sha1(md5($_POST['Sifre']));
		$Yetki			= $_POST['Yetki'];
		$Adi			= $_POST['Adi'];
		$Soyadi			= $_POST['Soyadi'];
		$TelNo			= $_POST['TelNo'];
		$Email			= $_POST['Email'];
		$Adres			= $_POST['Adres'];
			
		$save = $db->prepare("INSERT INTO kullanicilar (KullaniciAdi,Yetki,Adi,Soyadi,TelNo,Email,Adres,Sifre,IsActive) VALUES (?,?,?,?,?,?,?,?,?)");
		$save->execute(array($KullaniciAdi,$Yetki,$Adi,$Soyadi,$TelNo,$Email,$Adres,$Sifre,1));	
		if ( $save )
		{									   
			$Sonuc["ok"] = ' Kayıt İşlemi Başarılı !' ;
		}
		else
		{									   
			$Sonuc["hata"] = 'Kayıt İşlemi Başarısız !' ;
		}
	}else if($islem=="Duzenle")
    {
		$UserID			= $_POST['ID'];
		$KullaniciAdi	= $_POST['KullaniciAdi'];
		$Sifre			= $_POST['Sifre'];
		$Yetki			= $_POST['Yetki'];
		$Adi			= $_POST['Adi'];
		$Soyadi			= $_POST['Soyadi'];
		$TelNo			= $_POST['TelNo'];
		$Email			= $_POST['Email'];
		$Adres			= $_POST['Adres'];
		$SifreKontrol=$db->prepare("Select Sifre from kullanicilar where UserID=?");
		$SifreKontrol->execute(array($UserID));
		$Kayitli = $SifreKontrol->fetch(PDO::FETCH_ASSOC);
		if($Kayitli)
		{
			$KayitliSifre	= $Kayitli["Sifre"];
			if($KayitliSifre==$Sifre){
				$Sifre		= $_POST['Sifre'];
			} else {
				$Sifre		= sha1(md5($_POST['Sifre']));
			}
		}	
			
			
		$save = $db->prepare("UPDATE kullanicilar SET KullaniciAdi=?,Yetki=?,Adi=?,Soyadi=?,TelNo=?,Email=?,Adres=?,Sifre=? WHERE UserID=?");
		$save->execute(array($KullaniciAdi,$Yetki,$Adi,$Soyadi,$TelNo,$Email,$Adres,$Sifre,$UserID));
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