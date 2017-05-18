<!DOCTYPE html>

<html>

  <head>

    <meta charset="UTF-8" />

    <link rel="stylesheet" type="text/css" href="css/vote.css">
    <link rel="icon" href="img/title.png" />
    <title>Elections 2017</title>

  </head>

  <body>

    <img src="img/title.png" alt="elections 2017" />
    <h1>Liste des candidats</h1>


<?php

require('candidats.php');

$db = mysql_connect('localhost', 'root', 'azerty');

mysql_select_db('bigbrother',$db);

// Récpère liste candidats

$req = listAll();

// Affichage de la liste

while($data = mysql_fetch_assoc($req)){

  echo '<h3>'.$data['Nom'].' IDENTIFIANT : '.$data['id_candidat'].'</h3>';

}

?>

    <form name="vote" method="post" action="soumission_vote.php">

    <table><tr><td><label>Votre choix : </label></td>

      <td><input type="text" name="id" placeholder="identifiant" required></td></tr>

      <tr><td><input type="submit" name="Nom" value="A voté"></td>

      <td></td></tr>

    </table>

    </form>


</body>
</html>
