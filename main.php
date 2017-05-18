<?php

$db = mysql_connect('localhost', 'root', 'azerty');

mysql_select_db('bigbrother',$db);

require('candidats.php');
require('electeurs.php');

echo getAvote(2);
?>
