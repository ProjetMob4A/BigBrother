<!DOCTYPE html>

<html>

  <head>

    <meta charset="UTF-8" />

    <title>Résultats</title>

  </head>



  <body>

    <h1>Résultats</h1>

<?php

require('candidats.php');

$db = mysql_connect('localhost', 'root', 'azerty');

mysql_select_db('bigbrother',$db);

$req = getResults();

while($data = mysql_fetch_assoc($req)){

  echo $data['Nom'].' '.$data['id_candidat'].' | Score :'.$data['Score'].'<br>';

}

?>

</body>

</html>
