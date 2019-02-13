<?php
error_reporting(E_ALL);

//Braziliex
$json_file = file_get_contents("https://braziliex.com/api/v1/public/ticker/btc_brl"); //puxa os dados da api
$json_str = json_decode($json_file, true); //decodifica os dados da api
$braziliex = $json_str['last']; //seleciona um valor especifico da api
$braziliexvolume = $json_str['baseVolume'];
$braziliex = intval($braziliex); //transforma em numero
$braziliexvolume = intval($braziliexvolume);

echo $varbrzx * $varbrzx2, "<br>"; 

//Bitcointrade
$json_file = file_get_contents("https://api.bitcointrade.com.br/v1/public/BTC/ticker");
$json_str = json_decode($json_file, true);
$bitcointrade = $json_str['data']['last'];
echo $bitcointrade;

?>
