<?php

try{
    $conn = new PDO("mysql:host=localhost;dbname=hotel", "root", "");
}
catch(Exception $e){
    echo ("Erreur: " .$e->getMessage());
    exit();
}
//if($SERVER["REQUEST_METHOD"] == "POST"){
    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $telephone = $_POST['telephone'];
    $date_heure_arrivee = $_POST['date_heure_arrivee'];
    $date_heure_depart = $_POST['date_heure_depart'];
    $nb_personnes = $_POST['nb_personne'];
    $type_chambre = $_POST['type_chambre'];

$sql = $conn->prepare("INSERT INTO reservation(nom, email, telephone, date_heure_arrivee, date_heure_depart, nb_personne, type_chambre) VALUES (:nom, :email, :telephone, :date_heure_arrivee, :date_heure_depart, :nb_personnes, :type_chambre)");

$sql->bindParam(':nom', $nom);
$sql->bindParam(':email', $email);
$sql->bindParam(':telephone', $telephone);
$sql->bindParam(':date_heure_arrivee', $date_heure_arrivee);
$sql->bindParam(':date_heure_depart', $date_heure_depart);
$sql->bindParam(':nb_personnes', $nb_personnes);
$sql->bindParam(':type_chambre', $type_chambre);

$sql->execute();
echo "Réservation effectué";

?>