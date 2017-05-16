<?php

require('connexion.php');

session_start();

$db = mysql_connect('localhost', 'root', 'azerty');

mysql_select_db('bigbrother',$db);

?>

<!DOCTYPE html>

<html>

  <head>

    <meta charset="UTF-8" />

    <title>Page soumission vote</title>

  </head>

  <body>

<?php

require('electeurs.php');

require('candidats.php');

$id_candidat = $_POST["id"];

$avote = getAvote($_SESSION['id']);

if ($avote == 0){

  IncrementScore($id_candidat);
  setAvote($_SESSION['id'], True);
  header('Location: resultat.php');

}

else{

  // Déjà voté
  header('Location: resultat.php');
}
?>
</body>
</html>
