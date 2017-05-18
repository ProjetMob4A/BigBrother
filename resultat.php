<!DOCTYPE html>

<html>

  <head>

    <meta charset="UTF-8" />

    <link rel="stylesheet" type="text/css" href="css/resultat.css">
    <link rel="icon" href="img/title.png" />
    <title>Elections 2017</title>

  </head>



  <body>

    <img src="img/title.png" alt="elections 2017" />
    <h1>Résultats</h1>

<?php

require('candidats.php');

$db = mysql_connect('localhost', 'root', 'azerty');

mysql_select_db('bigbrother',$db);

$req = getResults();

while($data = mysql_fetch_assoc($req)){


  echo '<h3>'.$data['Nom'].' IDENTIFIANT : '.$data['id_candidat'].' SCORE : '.$data['Score'].'</h3>';

}

?>

</body>

</html>
