<?php

require('connexion.php')

$db = mysql_connect('localhost', 'root', 'azerty');

mysql_select_db('bigbrother',$db);

if (checkPassword($_POST['id'], $_POST['password'])){
  header('Location: vote.php');
}

else{
  echo "Acces Denied";
}

mysql_close();

?>
