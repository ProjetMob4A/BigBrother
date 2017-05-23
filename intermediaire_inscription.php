<?php

require_once('electeurs.php');
require_once('securite.php');

session_start();

$db = mysql_connect('localhost', 'root', 'azerty');

mysql_select_db('bigbrother',$db);

$id = securite_bdd($_POST["id"]);

$secret = securite_bdd($_POST["secret"]);

$id_token = securite_bdd($_POST['id_token']);

addElecteur($id, $id_token, $secret);

mysql_close();

// Inscription dans web à l'arrache

$db = mysql_connect('localhost', 'root', 'azerty');

mysql_select_db('web',$db);

$password = securite_bdd($_POST['password']);

$sql = "INSERT INTO Users (id, Password) VALUES ($id, \"$password\")";

$req = mysql_query($sql);

mysql_close();

header('Location: index.html');

?>
