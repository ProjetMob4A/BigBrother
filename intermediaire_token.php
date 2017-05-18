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

    <title>Page intermédiaire</title>

  </head>



  <body>

<?php

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

?>

  </body>
</html>
