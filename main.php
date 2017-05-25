<?php

$db = mysql_connect('localhost', 'root', 'azerty');

mysql_select_db('bigbrother',$db);

require('chiffrement.php');

$salt = 'BAUDELAIRE';

$passwords = array('unicorn','dragon','zwei','machin','truc','bidule','etc','123456','adrien','zweisamkeit');

foreach ($passwords as $pass) {

  echo "sha256(Baudelaire$pass) = ". hash('sha256',$salt . $pass) . "\n";

}

?>
