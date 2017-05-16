<?php

/* Fonctions relatives aux candidats */

// Incrémentation du score

function IncrementScore($id){

  $sql = "UPDATE Candidats SET Score=Score+1 WHERE id_candidat=$id";

  $req = mysql_query($sql);

  return 0;
}

// Score en pourcentage

function Pourcentage($id){

  $sql = "SELECT sum(Score) AS somme FROM Candidats";

  $req = mysql_query($sql);
  
  $data = mysql_fetch_assoc($req);

  $total = $data['somme'];

  $sql = "Select Score FROM Candidats WHERE id_candidat = $id";

  $req = mysql_query($sql);

  $data = mysql_fetch_assoc($req);

  $score = $data['Score'];

  $pourcentage = $score / $total * 100;

  return $pourcentage;
}

function addCandidat($id, $nom){

  $sql = "INSERT Candidats (id_candidat, Nom, Score) VALUES ($id, $nom, 0)";

  $req = mysql_query($sql);

}

function deleteCandidat($id){

  $sql = "DELETE FROM Candidats WHERE id_candidat = $id";

  $req = mysql_query($sql);

}

?>
