<?php

require_once('connexion.php');
require_once('securite.php');

session_start();

$db = mysql_connect('localhost', 'root', 'azerty');

mysql_select_db('web',$db);

?>

<!DOCTYPE html>

<html>

  <head>

    <meta charset="UTF-8" />

    <title>Page intermédiaire</title>

  </head>



  <body>

<?php

$id = securite_bdd($_POST["id"]);

$pass = securite_bdd($_POST["password"]);

$_SESSION["id"]=$id;

$_SESSION["password"]=$pass;

echo $id.$pass;

if (checkPassword($id, $pass)){
	header('Location: vote.php');
}

else{
	header('Location: index.html');
}

mysql_close();

?>

  </body>
</html>
