<?php

$IPAdresi = $_SERVER["REMOTE_ADDR"] ?? '165.22.205.60';
$ZamanDamgasi = time();
$TarihSaat = date("d.m.Y H:i:s", $ZamanDamgasi);

function RakamHaricTumKarakterleriSil($Deger){
    $Islem = preg_filter("/[^0-9]/", "", $Deger);
    $Sonuc = $Islem;
    return $Sonuc;
}

function DonusumleriGeriDondur($Deger){
    $GeriDondur = htmlspecialchars_decode($Deger, ENT_QUOTES);
    $Sonuc = $GeriDondur;
    return $Sonuc;
}

function Guvenlik($Deger)
{
    $BoslukSil = trim($Deger);
    $TagSil = strip_tags($BoslukSil);
    $EtkisizYap = htmlspecialchars($TagSil);
    $Sonuc = $EtkisizYap;
    return $Sonuc;
}

function SayiliIcerikleriFiltrele($Deger)
{
    $BoslukSil = trim($Deger);
    $TagSil = strip_tags($BoslukSil);
    $EtkisizYap = htmlspecialchars($TagSil);
    $Temizle = RakamHaricTumKarakterleriSil($EtkisizYap);
    $Sonuc = $Temizle;
    return $Sonuc;
}

//2. DERS
