<?php

require('securite.php');

/* Fonctions relatives aux candidats */

// Incrémentation du score

function IncrementScore($id){

  $sql = "UPDATE Candidats SET Score=Score+1 WHERE id_candidat=$id";

  $req = mysql_query(securite_bdd($sql));

  return 0;
}

function listAll(){
  
  $sql = "Select id_candidat, Nom from Candidats";

  $req = mysql_query(securite_bdd($sql));

  return $req;
}

function getScore($id){

  $sql = "SELECT Score FROM Candidats WHERE id_candidat = $id";

  $req = mysql_query(securite_bdd($sql));

  $data = mysql_fetch_assoc($req);

  return ($data['Score']);

}

// Score en pourcentage

function Pourcentage($id){

  $sql = "SELECT sum(Score) AS somme FROM Candidats";

  $req = mysql_query(securite_bdd($sql));
  
  $data = mysql_fetch_assoc($req);

  $total = $data['somme'];

  $score = getScore($id);

  $pourcentage = $score / $total * 100;

  return $pourcentage;
}

function getResults(){

  $sql = "Select Nom, id_candidat, Score FROM Candidats";

  $req = mysql_query(securite_bdd($sql));

  return $req;

}

function addCandidat($id, $nom){

  $sql = "INSERT Candidats (id_candidat, Nom, Score) VALUES ($id, $nom, 0)";

  $req = mysql_query(securite_bdd($sql));

}

function deleteCandidat($id){

  $sql = "DELETE FROM Candidats WHERE id_candidat = $id";

  $req = mysql_query(securite_bdd($sql));

}

function setAllNull(){

  $sql = "UPDATE Candidats SET Score = 0 WHERE 1=1";

  $req = mysql_query($sql);

}

?>
