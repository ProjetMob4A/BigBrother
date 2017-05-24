<?php

require_once('connexion.php');
require_once('securite.php');
require_once('electeurs.php');

session_start();

$db = mysql_connect('localhost', 'root', 'azerty');

mysql_select_db('bigbrother',$db);

?>

<!DOCTYPE html>

<html>

  <head>

    <meta charset="UTF-8" />

    <title>Authentification du token</title>

  </head>

	Authentification du token en cours.

  <body>

<?php

require_once('chiffrement.php');

set_time_limit(0);

ob_implicit_flush();

$address = '172.30.3.85';
$port = 10000;

if (($sock = socket_create(AF_INET, SOCK_STREAM, SOL_TCP)) === false) {
    echo "socket_create() a échoué : raison : " . socket_strerror(socket_last_error()) . "\n";
}

if (socket_bind($sock, $address, $port) === false) {
    echo "socket_bind() a échoué : raison : " . socket_strerror(socket_last_error($sock)) . "\n";
}

if (socket_listen($sock, 5) === false) {
    echo "socket_listen() a échoué : raison : " . socket_strerror(socket_last_error($sock)) . "\n";
}

    if (($msgsock = socket_accept($sock)) === false) {
        echo "socket_accept() a échoué : raison : " . socket_strerror(socket_last_error($sock)) . "\n";
        break;
    }
    $id = $_SESSION['id'];
    $msg = rsa_encrypt($id, $id);
    socket_write($msgsock, $msg, strlen($msg));
        if (false === ($buf = socket_read($msgsock, 2048, PHP_NORMAL_READ))) {
            echo "socket_read() a échoué : raison : " . socket_strerror(socket_last_error($msgsock)) . "\n";
            break 2;
	}
        $secret = $buf;
	$secret = substr($secret, 0, -1);
    socket_close($msgsock);

socket_close($sock);

if (checkSecret($id, $secret)){
        $_SESSION['secret_checked'] = 1;
        
        header('Location: vote.php');
}

else{
        header('Location: token.php');
}

mysql_close();

?>

<?php
/*
$secret_in = securite_bdd($_POST["secret"]);

$id = $_SESSION["id"];

if (checkSecret($id, $secret_in)){

	$_SESSION['secret_checked'] = 1;
	
	header('Location: vote.php');
}

else{
	header('Location: token.php');
}

mysql_close();
*/
?>

  </body>
</html>
