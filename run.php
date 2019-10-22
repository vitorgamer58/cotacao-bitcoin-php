<?php

$cachetime = 300; //diferença entre o tempo atual e o tempo de ultima modificação dos arquivos de Cache (em segundos)
//puxa as exchanges

//braziliex
//$jsonbraziliex = file_get_contents("https://braziliex.com/api/v1/public/ticker/btc_brl"); //puxa os dados da api

//cache da API
$cache_braziliex = 'braziliex.cache';
if(file_exists($cache_braziliex)) {
  if(time() - filemtime($cache_braziliex) > $cachetime) {
     // too old , re-fetch
     $cache = file_get_contents("https://braziliex.com/api/v1/public/ticker/btc_brl"); //Atualiza o Cache
     file_put_contents($cache_braziliex, $cache);
     $jsonbraziliex = file_get_contents($cache_braziliex);
  } else {
     $jsonbraziliex = file_get_contents($cache_braziliex);
  }
} else {
  // no cache, create one
  $cache = file_get_contents("https://braziliex.com/api/v1/public/ticker/btc_brl"); //Cria o Cache
  file_put_contents($cache_braziliex, $cache);
  $jsonbraziliex = file_get_contents($cache_braziliex);
}


$databrzx = json_decode($jsonbraziliex, true); //decodifica os dados da api
$braziliex_price = $databrzx['last']; //seleciona um valor especifico da api
$braziliex_volume = $databrzx['baseVolume'];
//$braziliex_price = intval($braziliex_price); //transforma em numero
//$braziliex_volume = intval($braziliex_volume);
$varbraziliex = $braziliex_price * $braziliex_volume;




//bitcointrade
//$json_bitcointrade = file_get_contents("https://api.bitcointrade.com.br/v2/public/BRLBTC/ticker");

//cache da API
$cache_bitcointrade = 'bitcoinreade.cache';
if(file_exists($cache_bitcointrade)) {
  if(time() - filemtime($cache_bitcointrade) > $cachetime) {
     // too old , re-fetch
     $cache = file_get_contents("https://api.bitcointrade.com.br/v2/public/BRLBTC/ticker"); //Atualiza o Cache
     file_put_contents($cache_bitcointrade, $cache);
     $json_bitcointrade = file_get_contents($cache_bitcointrade);
  } else {
     $json_bitcointrade = file_get_contents($cache_bitcointrade);
  }
} else {
  // no cache, create one
  $cache = file_get_contents("https://api.bitcointrade.com.br/v2/public/BRLBTC/ticker"); //Cria o Cache
  file_put_contents($cache_bitcointrade, $cache);
  $json_bitcointrade = file_get_contents($cache_bitcointrade);
}



$data_bitcoin_trade = json_decode($json_bitcointrade, true);
$bitcointrade_price = $data_bitcoin_trade['data']['last'];
$bitcointrade_volume = $data_bitcoin_trade['data']['volume'];
//$bitcointrade_price = intval($bitcointrade_price);
//$bitcointrade_volume = intval($bitcointrade_volume);
$varbitcointrade = $bitcointrade_price * $bitcointrade_volume;

//walltime
//$json_walltime = file_get_contents("https://s3.amazonaws.com/data-production-walltime-info/production/dynamic/walltime-info.json");

//cache da API
$cache_walltime = 'walltime.cache';
if(file_exists($cache_walltime)) {
  if(time() - filemtime($cache_walltime) > $cachetime) {
     // too old , re-fetch
     $cache = file_get_contents("https://s3.amazonaws.com/data-production-walltime-info/production/dynamic/walltime-info.json"); //Atualiza o Cache
     file_put_contents($cache_walltime, $cache);
     $json_walltime = file_get_contents("walltime.cache");
  } else {
     $json_walltime = file_get_contents("walltime.cache");
  }
} else {
  // no cache, create one
  $cache = file_get_contents("https://s3.amazonaws.com/data-production-walltime-info/production/dynamic/walltime-info.json"); //Cria o Cache
  file_put_contents($cache_walltime, $cache);
  $json_walltime = file_get_contents("walltime.cache");
}

$datawalltime = json_decode($json_walltime, true);
$walltime_price = $datawalltime['BRL_XBT']['last_inexact'];
$walltime_volume = $datawalltime['BRL_XBT']['quote_volume24h_inexact'];
//$walltime_price = intval($walltime_price);
//$walltime_volume = intval($walltime_volume);
$varwalltime = $walltime_price * $walltime_volume;

//bitcointoyou
//$json_bitcointoyou = file_get_contents("https://www.bitcointoyou.com/api/ticker.aspx");

//cache da API
$cache_bitcointoyou = 'bitcointoyou.cache';
if(file_exists($cache_bitcointoyou)) {
  if(time() - filemtime($cache_bitcointoyou) > $cachetime) {
     // too old , re-fetch
     $cache = file_get_contents("https://www.bitcointoyou.com/api/ticker.aspx"); //Atualiza o Cache
     file_put_contents($cache_bitcointoyou, $cache);
     $json_bitcointoyou = file_get_contents($cache_bitcointoyou);
  } else {
     $json_bitcointoyou = file_get_contents($cache_bitcointoyou);
  }
} else {
  // no cache, create one
  $cache = file_get_contents("https://www.bitcointoyou.com/api/ticker.aspx"); //Cria o Cache
  file_put_contents($cache_bitcointoyou, $cache);
  $json_bitcointoyou = file_get_contents($cache_bitcointoyou);
}

$databitcointoyou = json_decode($json_bitcointoyou, true);
$bitcointoyou_price = $databitcointoyou['ticker']['last'];
$bitcointoyou_volume = $databitcointoyou['ticker']['vol'];
//$bitcointoyou_price = intval($bitcointoyou_price);
//$bitcointoyou_volume = intval($bitcointoyou_volume);
$varbitcointoyou = $bitcointoyou_price * $bitcointoyou_volume;

//mercadobitcoin
//$json_mercadobitcoin = file_get_contents("https://www.mercadobitcoin.net/api/btc/ticker/");

//cache da API
$cache_mercadobitcoin = 'mercadobitcoin.cache';
if(file_exists($cache_mercadobitcoin)) {
  if(time() - filemtime($cache_mercadobitcoin) > $cachetime) {
     // too old , re-fetch
     $cache = file_get_contents("https://www.mercadobitcoin.net/api/btc/ticker/"); //Atualiza o Cache
     file_put_contents($cache_mercadobitcoin, $cache);
     $json_mercadobitcoin = file_get_contents($cache_mercadobitcoin);
  } else {
     $json_mercadobitcoin = file_get_contents($cache_mercadobitcoin);
  }
} else {
  // no cache, create one
  $cache = file_get_contents("https://www.mercadobitcoin.net/api/btc/ticker/"); //Cria o Cache
  file_put_contents($cache_mercadobitcoin, $cache);
  $json_mercadobitcoin = file_get_contents($cache_mercadobitcoin);
}

$datamercadobitcoin = json_decode($json_mercadobitcoin, true);
$mercadobitcoin_price = $datamercadobitcoin['ticker']['last'];
$mercadobitcoin_volume = $datamercadobitcoin['ticker']['vol'];
//$mercadobitcoin_price = intval($mercadobitcoin_price);
//$mercadobitcoin_volume = intval($mercadobitcoin_volume);
$varmercadobitcoin = $mercadobitcoin_price * $mercadobitcoin_volume;





//Calcula o preco medio ponderado
$allvariables = $varbraziliex + $varbitcointrade + $varwalltime + $varbitcointoyou + $varmercadobitcoin; //soma todas as variaveis

$volumetotal = $braziliex_volume + $bitcointrade_volume + $walltime_volume + $bitcointoyou_volume + $mercadobitcoin_volume; //soma todos os volumes
$volumetotal = round($volumetotal, 8); //Bitcoin tem 8 casas decimais

$preco_ponderado = $allvariables / $volumetotal; //calcula o preco medio ponderado

//$preco_ponderado = intval($preco_ponderado); //transforma em numero

//Calcula o MarketShare
$pbraziliex = round(($braziliex_volume/$volumetotal)*100, 2);
$pbitcointrade = round(($bitcointrade_volume/$volumetotal)*100, 2);
$pwalltime = round(($walltime_volume/$volumetotal)*100, 2);
$pbitcointoyou = round(($bitcointoyou_volume/$volumetotal)*100, 2);
$pmercadobitcoin = round(($mercadobitcoin_volume/$volumetotal)*100, 2);

//puxa a data e hora do servidor
//isso mostra em que data estão os valores, para evitar equívocos com o cache
date_default_timezone_set('America/Sao_Paulo');
//$date = date('Y-m-d H:i');

//cache da API
$cache_data = 'data2.cache';
if(file_exists($cache_data)) {
  if(time() - filemtime($cache_data) > $cachetime) {
     // too old , re-fetch
     $cache = date('Y-m-d H:i'); //Atualiza o Cache
     file_put_contents($cache_data, $cache);
     $date = file_get_contents($cache_data);
  } else {
     $date = file_get_contents($cache_data);
  }
} else {
  // no cache, create one
  $cache = date('Y-m-d H:i'); //Cria o Cache
  file_put_contents($cache_data, $cache);
  $date = file_get_contents($cache_data);
}

?>
