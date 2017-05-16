<!DOCTYPE html>

<html>

  <head>

    <meta charset="UTF-8" />

    <title>Page de Vote</title>

  </head>



  <body>

    <h1>Page de vote</h1>



    <h2>Liste des candidats</h2>


<?php

require('candidats.php');

$db = mysql_connect('localhost', 'root', 'azerty');

mysql_select_db('bigbrother',$db);

// Récpère liste candidats

$req = listAll();

// Affichage de la liste

while($data = mysql_fetch_assoc($req)){

  echo $data['Nom'].' '.$data['id_candidat'].'<br>';

}

?>

    <form name="vote" method="post" action="soumission_vote.php">

    <table><tr><td><label>Vote</label></td>

      <td><input type="text" name="id" placeholder="Identifiant" required></td></tr>

      <tr><td><input type="submit" name="Nom" value="Envoyer"></td>

      <td></td></tr>

    </table>

    </form>


</body>
</html>
