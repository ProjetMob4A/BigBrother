<?php

require_once('connexion.php');
require_once('securite.php');

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

require_once('electeurs.php');

require_once('candidats.php');

$id_candidat = securite_bdd($_POST["id"]);

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
