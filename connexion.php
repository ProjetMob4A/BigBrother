<?php

require('securite.php');

// Page connexion

function register($id, $passwd){

  $sql = "INSERT INTO Users (id, Password) VALUES ($id, $passwd)";

  $req = mysql_query(securite_bdd($sql));

  return 0;

}

// Vérifie mot de passe

function checkPassword($id, $passwd_in){

  $sql = "SELECT Password FROM Users WHERE id = $id";

  $req = mysql_query(securite_bdd($sql));

  $data = mysql_fetch_assoc($req);

  if ($data['Password'] === $passwd_in)

    return 1;

  else

    return 0;

}

function destroy($id){

  $sql = "DELETE FROM Users WHERE id = $id";

  $req = mysql_query(securite_bdd($sql));

}

?>
