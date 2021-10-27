<?php
session_start();
include("include/inc/connect.php");
if($_SESSION["USER"] == ""){
  header("Location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include './include/inc/header.php' ?>
    <title>Document</title>
</head>
<body>
<div class="container">
<?php include './include/inc/navbar.php' ?>
<div class="card mt-4">
<div class="card-body">
<table id="data_table" class="table" cellspacing="0" width="100%">
  <thead>
    <tr>
      <th>N°</th>
      <th class="th-sm">Ref</th>
      <th class="th-sm">Statut</th>
      <th class="th-sm">Titre</th>
      <th class="th-sm">Demandeur</th>
      <th class="th-sm">Date</th>
      <th class="th-sm">Affectation</th>

    </tr>
  </thead>
  <tbody>

 <?php 
      
      $sqlstatment = "SELECT * FROM interventions";
      $qstmt = $conn->prepare($sqlstatment);
      $qstmt->execute();
      $rows = $qstmt->fetchAll();
      foreach ($rows as $row) {
      //fetch intervention
      echo'
      <tr>
      <td></td>
      <td>'.$row['ref'].'</td>
      <td>'.$row['statut'].'</td>
      <td>'.$row['titre'].'</td>
      <td>'.$row['demandeur'].'</td>
      <td>'.$row['creation_date'].'</td>
      <td>'.$row['lieu'].'</td>
    </tr>
    ';
      }

?>

  </tbody>

</table>


</div>
</div>



</div>

<script>


$(document).ready(function() {
    var t = $('#data_table').DataTable( {
        "searching": false,
        "paging": false,
        bInfo: false,
        dom: 'Bfrtip',
        buttons: ['excel', 'pdf', 'print'],
        "order": [[ 1, 'asc' ]]
    } );

    t.on( 'order.dt search.dt', function () {
        t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
        } );
    } ).draw();
} );


</script>
</body>
</html>




