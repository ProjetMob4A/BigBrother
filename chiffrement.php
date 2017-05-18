<?php

require_once('electeurs.php');

$ns = 1370477;
$es = 377;
$ds = 112493;

function strToInt($string){
    $hex = '';
    for ($i=0; $i<strlen($string); $i++){
        $ord = ord($string[$i]);
        $hexCode = dechex($ord);
        $hex .= substr('0'.$hexCode, -2);
    }
    return hexdec($hex);
}
function intToStr($int){
    $hex=dechex($int);
    $string='';
    for ($i=0; $i < strlen($hex)-1; $i+=2){
        $string .= chr(hexdec($hex[$i].$hex[$i+1]));
    }
    return $string;
}

function getTokenPublicKey($id_electeur){

 return getCert($id_electeur); 

}

function rsa_encrypt($id, $message){

  $rep = getTokenPublicKey($id);

  $message = strToInt($message);

  parse_str($rep, $output);

  $n = $output['n'];

  $e = $output['e'];

  return (pow($message, $e) % $n);

}

function rsa_decrypt($c){

    return intToStr(pow($c, $ds) % $ns);

}

?>
