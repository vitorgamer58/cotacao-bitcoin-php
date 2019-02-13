<?php
$json_file = file_get_contents("https://braziliex.com/api/v1/public/ticker/btc_brl");

$json_str = json_decode($json_file, true);
$itens = $json_str['last'];
echo $itens;

?>
