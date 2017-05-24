<?php

require_once('electeurs.php');

$ns = 219;
$es = 5;
$ds = 29;

function getTokenPublicKey($id_electeur){

 return getCert($id_electeur); 

}

function rsa_encrypt($id, $message){

  $rep = getTokenPublicKey($id);

  $len = strlen($message);

  $res="";

  $n = $output['n'];

  $e = $output['e'];

  for ($i=0; $i < $len; $i++){

    $res .= ':'.strval(bcpowmod(ord($message[$i]),$e,$n));
  }

  return ($res);

}

function rsa_decrypt($c){

    global $ns, $ds;

    $chars = preg_split('/:/',$c, -1, PREG_SPLIT_NO_EMPTY);

    $res = "";

    $len = sizeof($chars);

    for ($i=0; $i < $len; $i++){ 

      $res .= chr(bcpowmod(intval(hexdec($chars[$i])),$ds,$ns));

    }

    return $res;

}

?>
