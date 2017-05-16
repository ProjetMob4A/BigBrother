<?php

// Vérifie si $id a voté ou non

function getAvote($id){

  $sql = "Select A_vote FROM Electeurs WHERE id_electeur = $id";

  $req = mysql_query($sql);

  $data = mysql_fetch_assoc($req);

  return $data['A_vote'];

}

function setAvote($id, $bool){

  $sql = "UPDATE Electeurs SET A_vote=$bool WHERE id_electeur=$id";

  $req = mysql_query($sql);

}

// Envoie le secret de id

function getSecret($id){

  $sql = "Select Secret FROM Electeurs WHERE id_electeur = $id";

  $req = mysql_query($sql);

  $data = mysql_fetch_assoc($req);

  return $data['Secret'];

}

// Envoie le certificat associé

function getCert($id){

  $sql = "Select C.cert AS cert FROM Certificats C INNER JOIN Tokens T ON T.id_cert = C.id_cert INNER JOIN Electeurs E ON E.id_token = T.id_token where id_electeur = $id";

  $req = mysql_query($sql);

  $data = mysql_fetch_assoc($req);

  return $data['cert'];

}

// Ajoute un électeur

function addElecteur($id_electeur, $id_token, $secret){
  
  $sql = "INSERT INTO Electeurs (id_electeur, id_token, secret, A_vote) VALUES ($id_electeur, $id_token, $secret, 0)";

  $req = mysql_query($sql);

}

// Met à jour un attribut d'un électeur

function updateElecteur($id, $attribut, $value){

  $sql = "UPDATE Electeurs SET $attribut = $value WHERE id_electeur = $id";

  $req = mysql_query($sql);

}

// Supprime un électeur

function deleteElecteur($id){

  $sql = "DELETE FROM Electeurs where id_electeur = $id";

  $req = mysql_query($sql);

}

?>
