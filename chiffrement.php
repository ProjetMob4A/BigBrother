<?php

require_once('electeurs.php');

$ns = 1370477;
$es = 377;
$ds = 112493;

function getTokenPublicKey($id_electeur){

 return getCert($id_electeur); 

}

function encrypt($id, $message){

  $rep = getTokenPublicKey($id);

  parse_str($rep, $output);

  $n = $output['n'];

  $e = $output['e'];

  return (pow($message, $e) % $n);

}

function decrypt($c){

    return (pow($c, $ds) % $ns);

}

?>
