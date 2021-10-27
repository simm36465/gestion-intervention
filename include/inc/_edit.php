<?php
session_start();
include("connect.php");
$REFCODE = $_SESSION['ref'];
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
$refcode = $REFCODE;
$id="";

$verify_ref = "SELECT * FROM interventions WHERE ref= :REFCODE";
$exist_ref = $conn->prepare($verify_ref);
$exist_ref->bindParam(':REFCODE', $REFCODE, PDO::PARAM_STR);
$exist_ref->execute();
$num_un_ex = $exist_ref->rowCount();
if ($num_un_ex > 0) {


    $sql = "UPDATE interventions SET heurdatage=:hdate, categorie=:categorie, statut=:statut, urgence=:urgence, demandeur=:demandeur, impact=:impact, intertype=:intype, intervenant=:intervenant, element_associe=:element_s, creation_date=:intdate, lieu=:lieu, titre=:title, interdescription=:intdesc, observation=:obser WHERE ref=:REFCODE";
    $q_modify = $conn->prepare($sql);
    $data = [
        'hdate'=> $hdate,
        'categorie'=> $categorie,
        'demandeur'=> $demandeur,
        'statut'=> $statut,
        'urgence'=> $urgence,
        'demandeur'=> $demandeur,
        'impact'=> $impact,
        'intype'=> $type,
        'intervenant'=> $intervenant,
        'element_s'=> $element_s,
        'lieu'=> $lieu,
        'intdate'=> $intdate,
        'title'=> $title,
        'intdesc'=> $intdesc,
        'obser'=> $obser,
        'REFCODE' => $REFCODE,
    ];

    $q_modify->execute($data);
    echo "done";


}else {
    header('HTTP/1.0 404 Not Found');
    die;
}

 








?>