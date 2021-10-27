<?php
session_start();
include("connect.php");
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$hdate = $_POST['inter_date']." ".$_POST['inter_time'];
$categorie = $_POST['categorie'];
$demandeur = $_POST['demandeur'];
$statut = $_POST['statut'];
$urgence = $_POST['urgence'];
$impact = $_POST['impact'];
$type = $_POST['type'];
$intervenant = $_POST['intervenant'];
$element_s = $_POST['element_associe'];
$lieu = $_POST['lieu'];
$intdate = $_POST['dateIntervension'];
$title = $_POST['titre'];
$intdesc = $_POST['description'];
$obser = $_POST['observations'];
$refcode = refcode(6);
$id="";


$stmt = $conn->prepare("INSERT INTO interventions (id, ref, heurdatage, categorie, statut, urgence, demandeur, impact, intertype, intervenant, element_associe, creation_date, lieu, titre, interdescription, observation)
                              VALUES (:id, :refcode, :hdate, :categorie, :statut, :urgence, :demandeur, :impact, :intype, :intervenant, :element_s, :intdate, :lieu, :title, :intdesc, :obser )");

$stmt->bindParam(':id',  $id, PDO::PARAM_INT);
$stmt->bindParam(':refcode',  $refcode, PDO::PARAM_STR);
$stmt->bindParam(':hdate',  $hdate, PDO::PARAM_STR);
$stmt->bindParam(':categorie',  $categorie, PDO::PARAM_STR);
$stmt->bindParam(':demandeur',  $demandeur, PDO::PARAM_STR);
$stmt->bindParam(':statut',  $statut, PDO::PARAM_STR);
$stmt->bindParam(':urgence',  $urgence, PDO::PARAM_STR);
$stmt->bindParam(':demandeur',  $demandeur, PDO::PARAM_STR);
$stmt->bindParam(':impact',  $impact, PDO::PARAM_STR);
$stmt->bindParam(':intype',  $type, PDO::PARAM_STR);
$stmt->bindParam(':intervenant',  $intervenant, PDO::PARAM_STR);
$stmt->bindParam(':element_s',  $element_s, PDO::PARAM_STR);
$stmt->bindParam(':lieu',  $lieu, PDO::PARAM_STR);
$stmt->bindParam(':intdate',  $intdate, PDO::PARAM_STR);
$stmt->bindParam(':title',  $title, PDO::PARAM_STR);
$stmt->bindParam(':intdesc',  $intdesc, PDO::PARAM_STR);
$stmt->bindParam(':obser',  $obser, PDO::PARAM_STR);
$stmt->execute();
echo 'DONE';
//header("Location: create.php");






function refcode($length_of_string) 
    { 
        $str_result = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890abcdefghijklmnopqrstuvwxyz'; 
        return substr(str_shuffle($str_result), 0, $length_of_string); 
    } 

?>