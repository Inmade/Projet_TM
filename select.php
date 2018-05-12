<?php
header('Content-Type: text/html; charset=utf-8');
include 'connect.php';
$reponse = $conn->prepare("SELECT * FROM vehicule");
$reponse->execute();
while($r = $reponse->fetch(PDO::FETCH_ASSOC)){
    $donnees[] = array("id" => $r['idvehicule'],
    "cat" => $r['categorie'],
    "marque" => $r['marque'],
    "modele" => $r['modele'],
    "nb" => $r['nbPortes'],
    "trans" => $r['transmission'],
    "clim" => $r['climatisation']);
    "dispo" => $r['disponibilite']);
}
echo json_encode($donnees);
?>
