<?php
session_start();
ob_start(); 
require_once __DIR__ . '/vendor/autoload.php';
include("include/inc/connect.php");
// header("Content-type: application/pdf");
$REFCODE = $_GET['ref'];
$sqlstatment = "SELECT * FROM interventions WHERE ref=:REFCODE";
$qstmt = $conn->prepare($sqlstatment);
$qstmt->bindParam(':REFCODE', $REFCODE, PDO::PARAM_STR);
$qstmt->execute();
$rows = $qstmt->fetchAll();
foreach ($rows as $row) {
$_SESSION['ref'] = $row['ref'];
$_SESSION['id'] = $row['id'];
$_SESSION['heurdatage'] = $row['heurdatage'];
$_SESSION['element_associe'] = $row['element_associe'];
$_SESSION['type'] = $row['intertype'];
$_SESSION['urgence'] = $row['urgence'];
$_SESSION['impact'] = $row['impact'];
$_SESSION['statut'] = $row['statut'];
$_SESSION['demandeur'] = $row['demandeur'];
$_SESSION['intervenant'] = $row['intervenant'];
$_SESSION['categorie'] = $row['categorie'];
$_SESSION['titre'] = $row['titre'];
$_SESSION['description'] = $row['interdescription'];
$_SESSION['observation'] = $row['observation'];
$_SESSION['lieu'] = $row['lieu'];
$_SESSION['creation_date'] = $row['creation_date'];


}
$intname = "Intervention(".$_SESSION['id'].").pdf";
// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('MOHAMMED LAKSIR');
$pdf->SetTitle($intname);
$pdf->SetSubject('INTERVENTION');

// remove default header/footer
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);


// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);




$pdf->SetAutoPageBreak(TRUE, '10');

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
// set margins
$pdf->SetMargins('15', '0', '0');

// ---------------------------------------------------------


// add a page
$pdf->AddPage();
$html = <<<EOF
    <div>
        <img src="image/header.png" alt="header">
    </div>
        <span></span>
EOF;
$pdf->writeHTML($html, true, false, false, false, '');
// set margins
$pdf->SetMargins('15', '0', '15');
$html = <<<EOF
    <style>
        .table1,
        tr,
        th,
        td {
            border: 1px solid black;
            border-collapse: collapse;
            text-align: center;
            padding:5px;
            font-size:12px;
            font-weight:bold;
        }
    </style>

    <table style="width:100%" class="table1">
        <tr>
            <th colspan="7" class="fiche"><h1> Fiche d&#39;Intervention ({$_SESSION['ref']})</h1></th>
        </tr>
        <tr>
            <td>N°</td>
            <td>Date</td>
            <td>Élément associé</td>
            <td>Type</td>
            <td>Urgence</td>
            <td>Impact</td>
            <td>Statut</td>
        </tr>
        <tr>
            <td >{$_SESSION['id']}</td>
            <td >{$_SESSION['heurdatage']}</td>
            <td >{$_SESSION['element_associe']}</td>
            <td >{$_SESSION['type']}</td>
            <td >{$_SESSION['urgence']}</td>
            <td >{$_SESSION['impact']}</td>
            <td >{$_SESSION['statut']}</td>
        </tr>
    </table>
EOF;
  $pdf->writeHTML($html, true, false, false, false, '');



$html = <<<EOF
  <style>
      .table2,
      tr,
      td {
          border: 1px solid black;
          border-collapse: collapse;
          padding:0 0 15px 5px;
          font-size:12px;
          font-weight:bold;
      }
  </style>

  <table style="width:100%" class="table2">

      <tr>
          <td>
          <h4>Client :</h4>
         <span> {$_SESSION['demandeur']} </span>
          </td>

          <td >
          <h4>Intervenant :</h4>
          <span> {$_SESSION['intervenant']} </span>
          </td>

      </tr>
  </table>
EOF;
$pdf->writeHTML($html, true, false, false, false, '');


$html = <<<EOF
    <style>
        .table3,
        tr,
        td {
            border: 1px solid black;
            border-collapse: collapse;
            font-size:12px;
            font-weight:bold;
            padding:0 0 15px 5px;
        }
    </style>
    <table style="width:100%" class="table3">

    <tr>
        <td class="cate" colspan="3">
            <h4>Catégorie :</h4>
            <span>{$_SESSION['categorie']}</span>
        </td>
    </tr>

    <tr>
        <td class="cate" colspan="3">
        <h4>Nature de l’intervention :</h4>
        <span>{$_SESSION['titre']}</span>
    </td>
    </tr>

    <tr>
        <td  colspan="3">
        <h4>Description :</h4>
        <span>{$_SESSION['description']}</span>
    </td>
    </tr>

    <tr>
        <td  colspan="3">
        <h4>Activité :</h4>
        <span>{$_SESSION['observation']}</span>
    </td>
    </tr>
    <tr>
        <td> <h4>Fait à :</h4> 
            <div>{$_SESSION['lieu']}</div>
        </td>
        <td rowspan="2" class="favo">
            <h4> Signature de Demandeur :</h4>
            <div>

            </div>
    </td>
        <td rowspan="2" class="favo">
            <h4> Signature de l’intervenant :</h4>
        <div>
        
        </div>
    </td>
    </tr>
    <tr>
        <td> <h4>Le :</h4> 
            <div>{$_SESSION['creation_date']}</div>
        </td>
    </tr>
    </table>
    </div>
EOF;
  $pdf->writeHTML($html, true, false, false, false, '');




  ob_end_clean();
//Close and output PDF document
//$pdf->IncludeJS("print();");
$pdf->Output();
//============================================================+
// END OF FILE
//============================================================+


?>