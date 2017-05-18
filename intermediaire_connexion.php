<?php

require('connexion.php');

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

$id = mysql_real_escape_string($_POST["id"]);

$pass = mysql_real_escape_string($_POST["password"]);

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
