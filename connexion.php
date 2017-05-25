<?php

require_once('securite.php');
require_once('electeurs.php');

// Vérifie mot de passe

function checkPassword($id, $passwd_in){

  $salt = 'BAUDELAIRE';

  $passwd_in = securite_bdd($passwd_in);

  $sql = "SELECT Password FROM Users WHERE id = $id";

  $req = mysql_query(securite_bdd($sql));

  $data = mysql_fetch_assoc($req);

  if ($data['Password'] === hash('sha256', $salt . $passwd_in))

    return 1;

  else

    return 0;

}

function destroy($id){

  $sql = "DELETE FROM Users WHERE id = $id";

  $req = mysql_query(securite_bdd($sql));

}

function checkSecret($id, $secret_in){
  $secret = getSecret($id);

  if ($secret === $secret_in)

    return 1;

  else

    return 0;
}

?>
