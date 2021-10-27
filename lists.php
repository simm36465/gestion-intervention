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
    <title>List</title>
</head>
<body>
<div class="container">
<?php include './include/inc/navbar.php' ?>
<div class="card mt-4">
<div class="card-body">
<table id="dt-multi-checkbox" class="table" cellspacing="0" width="100%">
  <thead>
    <tr>
      <th></th>
      <th class="th-sm">N°</th>
      <th class="th-sm">Ref</th>
      <th class="th-sm">Titre</th>
      <th class="th-sm">Demandeur</th>
      <th class="th-sm">Date</th>
      <th class="th-sm">Options</th>

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
      <td>'.$row['id'].'</td>
      <td>'.$row['ref'].'</td>
      <td>'.$row['titre'].'</td>
      <td>'.$row['demandeur'].'</td>
      <td>'.$row['creation_date'].'</td>
      <td>
        <div class="btn-group-sm" role="group" aria-label="Second group">
        <a href="print.php?ref='.$row['ref'] .'" class="btn btn-primary print"><i class="fas fa-print" aria-hidden="true"></i></a>
        <a href="edit.php?ref='.$row['ref'] .'" class="btn btn-warning edit"><i class="fas fa-edit" aria-hidden="true"></i></a>
        <a href="delete.php?ref='.$row['ref'] .'" class="btn btn-danger delete"><i class="fas fa-trash" aria-hidden="true"></i></a>
        </div>
      </td>
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
// $('.print').click( function() {
// var REF = $(this).data("ref");
// $.ajax({
//         url: 'print.php',
//         type: 'post',
//         data: {
//           "ref":REF
//         },
//         success: function(data) {
//          if (data === "DONE") {
//           window.location.href='pdf.php';
//          } else {
           
//          }
//         },
//         error: function(err){
//           console.log(err);
//         }
//     });

// });

</script>
<script>
    $(document).ready(function () {
  $('#dt-multi-checkbox').dataTable({

    columnDefs: [{
      orderable: false,
      className: 'select-checkbox',
      targets: 0
    }],
    select: {
      style: 'multi',
      selector: 'td:first-child'
    }
  });
});
</script>
</body>
</html>




