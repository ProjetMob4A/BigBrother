<?

require_once('electeurs.php');

$n_s = 1370477
$e_s = 377
$d_s = 112493

function getTokenPublicKey($id_electeur){

 return getCert($id_electeur); 

}

function encrypt($id, $message){

  ($n, $e) = getTokenPublicKey($id);

  return (pow($message, $e) % $n);

}

function decrypt($n){

    return (pow($c, $d_serv) % $n_serv);

}

?>
