<?php
include 'view/header.html';
error_reporting(-1);
ini_set('display_errors',1);
ini_set('display_startup_erros',1);

//Braziliex
$jsonbraziliex = file_get_contents("https://braziliex.com/api/v1/public/ticker/btc_brl"); //puxa os dados da api
$databrzx = json_decode($jsonbraziliex, true); //decodifica os dados da api
$braziliex = $databrzx['last']; //seleciona um valor especifico da api
$braziliexvolume = $databrzx['baseVolume'];
$braziliex = intval($braziliex); //transforma em numero
$braziliexvolume = intval($braziliexvolume);
$varbraziliex = $braziliex * $braziliexvolume;


//Bitcointrade
$json_bitcointrade = file_get_contents("https://api.bitcointrade.com.br/v1/public/BTC/ticker");
$data_bitcoin_trade = json_decode($json_bitcointrade, true);
$bitcointrade = $data_bitcoin_trade['data']['last'];
$bitcointradevolume = $data_bitcoin_trade['data']['volume'];
$bitcointrade = intval($bitcointrade);
$bitcoinvolume = intval($bitcointradevolume);
$varbitcointrade = $bitcointrade * $bitcointradevolume;


//Calcula o preco medio ponderado
$var_media = $varbraziliex + $varbitcointrade; //soma todas as variaveis
$volumetotal = $braziliexvolume + $bitcointradevolume; //soma todos os volumes
$preco_ponderado = $var_media / $volumetotal; //calcula o preco medio ponderado
$preco_ponderado = intval($preco_ponderado); //arredonda o numero
//echo "o preço médio ponderado é R$:", number_format($preco_ponderado, 2, ',', '.');
include 'view/home.html';
?>