<?

function encrypt($n, $e, $m){

  return (pow($m, $e) % $n);

}

function decrypt($n, $d, $c){

    return (pow($c, $d) % $n);

}

?>
