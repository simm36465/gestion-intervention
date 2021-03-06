<?php
session_start();

include("include/inc/connect.php");
$REFCODE = $_GET['ref'];

$verify_ref = "SELECT * FROM interventions WHERE ref= :REFCODE";
$exist_ref = $conn->prepare($verify_ref);
$exist_ref->bindParam(':REFCODE', $REFCODE, PDO::PARAM_STR);
$exist_ref->execute();
$num_un_ex = $exist_ref->rowCount();
if ($num_un_ex > 0) {

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
    $heurdatage = preg_split('/\s+/', $row['heurdatage'], -1, PREG_SPLIT_NO_EMPTY);
    $date =  $heurdatage[0];
    $heure =  $heurdatage[1];
}

}else {
  header('HTTP/1.0 404 Not Found');
die;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include './include/inc/header.php' ?>
    <title>Edit</title>
</head>
<body>
<div class="container">
<?php include './include/inc/navbar.php'  ?>

<div class="container my-3">
  
  <div class="card">

    <div class="card-body">
      
      <div class="tab-content">
        <div class="tab-pane fade show active" id="first" role="tabpanel" aria-labelledby="first-tab">
        <div class="container">
<fieldset class="border p-4">
<legend  class="w-auto">Intervention Details</legend>

    <main>

        <section>
            <form class="form-inline" action="" method="post" id="interventionFrom">
            
                <div class="input-group mb-3 col-6">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Date d'ouverture</span>
                  </div>
                  <input type="date" id="inter_date" name="inter_date" class="form-control" value="<?php echo $date; ?>" aria-label="date" aria-describedby="basic-addon1">
                  <input type="time" id="inter_time" name="inter_time" class="form-control" value="<?php echo $heure; ?>" aria-label="Time" aria-describedby="basic-addon1">

                </div>

                <div class="input-group mb-3 col-6">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Cat??gorie</span>
                  </div>
                  <select id="categorie" name="categorie" class="form-select form-control" aria-label="Default select example" aria-describedby="basic-addon1">
                  <?php echo '<option class="bg-info" selected  value='.$_SESSION['categorie'].'>'.$_SESSION['categorie'].'</option>'; ?>
              <optgroup label="Root entity">
							<optgroup label="Application pilotage">
								<option  class="tree b" value="Application pilotage"> Pilotage</option>
								<option class="tree b" value="Application pilotage > SIG">SIG</option>
							</optgroup>

							<optgroup label="Applications support">
								<option  class="treeroot" value="Applications support">Applications support</option>
								<option  class="tree b" value="Applications support > Courrier">Courrier</option>
								<option  class="tree b" value="Applications support > Gestion des Appels d'Offres">Gestion des Appels d'Offres</option>
								<option  class="tree b" value="Applications support > Gestion des R??clamations">Gestion des R??clamations</option>
								<option  class="tree b" value="Applications support > GSM">GSM</option>
								<option  class="tree b" value="Applications support > IProfil">IProfil</option>
								<option  class="tree b" value="Applications support > syst??me eau et ??lectricit??">syst??me eau et ??lectricit??</option>
								<option  class="tree b" value="Applications support > syst??me Inventaire">syst??me Inventaire</option>
								<option  class="tree b" value="Applications support > syst??me juridique">syst??me juridique</option>
								<option  class="tree b" value="Applications support > syst??me par auto">syst??me par auto</option>
								<option  class="tree b" value="Applications support > syst??me r??gie">syst??me r??gie</option>
								<option  class="tree b" value="Applications support > syst??me stock">syst??me stock</option>
							</optgroup>
						<optgroup label="Materiels">
								<option class="treeroot" value="Materiels > Materiels ">Materiels</option>
								<option class="tree b" value="Materiels > PC de bureau">PC de bureau</option>
								<option class="tree b" value="Materiels > PC Portable">PC Portable</option>
								<option class="tree b" value="Materiels > Scanners">Scanners</option>
								<option class="tree b" value="Materiels > Imprimant">Imprimant</option>
						</optgroup>

						<option  class="treeroot" value="Organisation documentaire">Organisation documentaire</option>
						<option  class="treeroot" value="Organisation ??v??nement">Organisation ??v??nement</option>
						<option  class="treeroot" value="PA et Reporting">PA et Reporting</option>
						<optgroup label="Portail">
								<option  class="tree b" value="Portail > site internet">site internet</option>
								<option  class="tree b" value="Portail > site intranet">site intranet</option>
						</optgroup>
						<optgroup label="R??seaux">
								<option  class="tree b" value="R??seaux > Acc??s r??seaux">Acc??s r??seaux</option>
								<option  class="tree b" value="R??seaux > Extension r??seau">Extension r??seau</option>
								<option  class="tree b" value="R??seaux > Prises r??seaux">Prises r??seaux</option>
								<option  class="tree b" value="R??seaux > R??seau sans fil">R??seau sans fil</option>
						</optgroup>
						<optgroup label="S??curit??">
								<option  class="tree b" value="S??curit?? > Audit">Audit</option>
								<option  class="tree b" value="S??curit?? > FireWall">FireWall</option>
								<option  class="tree b" value="S??curit?? > VPN">VPN</option>
						</optgroup>
						<optgroup label="Syst??me">
								<option  class="tree b" value="Syst??me > Active Directory">Active Directory</option>
								<option  class="tree b" value="Syst??me > Antivirus">Antivirus</option>
								<option  class="tree b" value="Syst??me > Bureautique">Bureautique</option>
								<option  class="tree b" value="Syst??me > Clone des machines">Clone des machines</option>
								<option  class="tree b" value="Syst??me > Messagerie">Messagerie</option>
								<option  class="tree b" value="Syst??me > Sauvegarde et r??plication">Sauvegarde et r??plication</option>
								<option  class="tree b" value="Syst??me > T??l??phonie IP">T??l??phonie IP</option>
								<option  class="tree b" value="Syst??me > Tracabilit??">Tracabilit??</option>
								<option  class="tree b" value="Syst??me > Virtualisation">Virtualisation</option>
						</optgroup>
							<optgroup label="T??l??phonie Mobile">
								<option  class="tree b" value="T??l??phonie Mobile > Smartphones">Smartphones</option>
								<option  class="tree b" value="T??l??phonie Mobile > Tablette">Tablette</option>
							</optgroup>
						</optgroup>
                        </select>
            
                </div>
                <div class="input-group mb-3 col-6">
                  <div class="input-group-prepend">
                    <span  class="input-group-text" id="basic-addon1">Demandeur</span>
                  </div>
                  <select id="demandeur" name="demandeur" class="form-select form-control" aria-label="Default select example" aria-describedby="basic-addon1">
                  <?php echo '<option class="bg-info" value='.$_SESSION['demandeur'].' selected   >'.$_SESSION['demandeur'].'</option>'; ?>
						    <option value="Blythe Cannon">Blythe Cannon</option>
							<option value="Aubree Dodson">Aubree Dodson</option>
							<option value="Randall Ware">Randall Ware</option>
							<option value="Charity Hagan">Charity Hagan</option>
							<option value="Angelika Richmond">Angelika Richmond</option>
							<option value="Tori Frank">Tori Frank</option>
							<option value="Jonny Guzman">Jonny Guzman</option>
							<option value="Tayyab Andersen">Tayyab Andersen</option>
							<option value="Annabell Stott">Annabell Stott</option>
							<option value="Natasha Lennon">Natasha Lennon</option>
							<option value="Cristiano Hughes">Cristiano Hughes</option>
							
                        </select>
            
                </div>
                <div class="input-group mb-3 col-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Statut</span>
                  </div>
                  <select id="statut" name="statut" class="form-select form-control" aria-label="Default select example" aria-describedby="basic-addon1">
                  <?php echo '<option class="bg-info" value='.$_SESSION['statut'].' selected  >'.$_SESSION['statut'].'</option>'; ?>
        
                  <option value="Nouveau">Nouveau</option>
                          <option value="En cours (Attribu??)">En cours (Attribu??)</option>
                          <option value="En cours (Planifi??)">En cours (Planifi??)</option>
                          <option value="En attente">En attente</option>
                          <option  value="R??solu">R??solu</option>
                          <option value="Close">Close</option>
                        </select>
            
                </div>
                <div class="input-group mb-3 col-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Urgence</span>
                  </div>
                  <select id="urgence"  name="urgence" class="form-select form-control" aria-label="Default select example" aria-describedby="basic-addon1">
                  <?php echo '<option class="bg-info" value='.$_SESSION['urgence'].' selected  >'.$_SESSION['urgence'].'</option>'; ?>

                          <option value="Tr??s haute">Tr??s haute</option>
                          <option value="Haute">Haute</option>
                          <option  value="Moyenne">Moyenne</option>
                          <option value="Basse">Basse</option>
                          <option value="Tr??s basse">Tr??s basse</option>
                        </select>
            
                </div>
                <div class="input-group mb-3 col-4">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Impact</span>
                  </div>
                  <select id="impact" name="impact" class="form-select form-control" aria-label="Default select example" aria-describedby="basic-addon1">
                  <?php echo '<option class="bg-info" value='.$_SESSION['impact'].' selected  >'.$_SESSION['impact'].'</option>'; ?>

                          <option value="Tr??s haute">Tr??s haute</option>
                          <option value="Haute">Haute</option>
                          <option  value="Moyenne">Moyenne</option>
                          <option value="Basse">Basse</option>
                          <option value="Tr??s basse">Tr??s basse</option>
                        </select>
            
                </div>

        
                <div class="input-group mb-3 col-4">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Type</span>
                  </div>
                  <select id="type" name="type" class="form-select form-control" aria-label="Default select example" aria-describedby="basic-addon1">
                  <?php echo '<option class="bg-info" value='.$_SESSION['type'].' selected >'.$_SESSION['type'].'</option>'; ?>

                          <option value="Incident">Incident</option>
                          <option value="Demande">Demande</option>
                        </select>
            
                </div>

                <div class="input-group mb-3 col-4">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Intervenant</span>
                  </div>
                  <select id="intervenant" name="intervenant" class="form-select form-control" aria-label="Default select example" aria-describedby="basic-addon1">
                          <option value="Mohammed LAKSIR" selected>Mohammed LAKSIR</option>
                        </select>
            
                </div>
                <div class="input-group mb-3 col-4">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">??l??ment associ??</span>
                  </div>
                  <select id="element_associe" name="element_associe" class="form-select form-control" aria-label="Default select example" aria-describedby="basic-addon1">
                  <?php echo '<option value='.$_SESSION['element_associe'].' selected  >'.$_SESSION['element_associe'].'</option>'; ?>
      
                  <option value="G??n??ral"  >G??n??ral</option>
                        <option value="Ordinateur">Ordinateur</option>
                        <option value="Moniteur">Moniteur</option>
                        <option value="Mat??riel r??seau">Mat??riel r??seau</option>
                        <option value="P??riph??rique">P??riph??rique</option>
                        <option value="T??l??phone">T??l??phone</option>
                        <option value="Imprimante">Imprimante</option>
                        <option value="Logiciel">Logiciel</option>
                        </select>
            
                </div>
                <div class="input-group mb-3 col-4">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Fait ?? :</span>
                  </div>
                  <select id="lieu" name="lieu" class="form-select form-control" aria-label="Default select example" aria-describedby="basic-addon1">
                  <?php echo '<option value='.$_SESSION['lieu'].' selected  >'.$_SESSION['lieu'].'</option>'; ?>

                  <option value="Direction r??gionale de Casablanca"  >Direction r??gionale de Casablanca</option>
						      <option value="Direction Provinciale Meknes">Direction Provinciale Meknes</option>
						      <option value="Direction R??gionale de RABAT">Direction R??gionale de RABAT</option>
						      <option value="Administration Centrale">Administration Centrale</option>
                        </select>
            
                </div>
                <div class="input-group mb-3 col-4">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Le :</span>
                  </div>
                  <input type="text" id="dateIntervension" name="dateIntervension"  class="form-control" value="<?php echo $_SESSION['creation_date'] ?>" aria-describedby="basic-addon1">
            
                </div>
                <div class="input-group mb-3 col-12">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Titre</span>
                  </div>
                  <input type="text" id="titre" name="titre" class="form-control" value="<?php echo $_SESSION['titre'] ?>" aria-label="titre" aria-describedby="basic-addon1">
            
                </div>
                <div class="input-group mb-3 p-6 col-12">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Description</span>
                  </div>
                  <textarea id="description" name="description"  class="form-control" rows="6"  aria-label="Description" aria-describedby="basic-addon1">
                  <?php echo $_SESSION['description'] ?>
                  </textarea>
            
                </div>
                <div class="input-group mb-3 p-6 col-12">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Observations</span>
                  </div>
                  <textarea id="observations" name="observations"  class="form-control" rows="6"  aria-label="Description" aria-describedby="basic-addon1">
            
                  <?php echo $_SESSION['observation'] ?>
                  </textarea>
            
                </div>


                    <input type="submit" id="submitbtn" name="submitbtn" class="btn btn-primary" value="Modifier"/>
            
            </form>
        </section>
    </main>
    </fieldset>	
    </div>
        </div>

      </div>
      <!-- END TABS DIV -->
      
    </div>
    <div class="card-footer p-0">
      <h5 class="text-center"><small class="text-muted">Mohammed LAKSIR</small></h5>
    </div>
  </div>
</div>

</div>
</body>
<script>
	$('#submitbtn').click( function(e) {
  e.preventDefault();
  var datainter = $("#interventionFrom").serializeArray();
  var description = tinymce.get("description").getContent();
  var observation = tinymce.get("observations").getContent();
      datainter[13].value = description;
      datainter[14].value = observation;
    $.ajax({
        url: 'include/inc/_edit.php',
        type: 'post',
        data: datainter,
        success: function(data) {
          if (data === "done") {
			    console.log(data);
          location.reload();
          } else {
              console.log(data);
            $.notify(data, "error");
          }
        },
        error: function(err){
          console.log(err);
        }
    });
});
</script>
<script>
tinymce.init({
		selector: '#description',
		branding: false,
		width : "100%",
		plugins: 'lists, autoresize',
		toolbar: 'bullist',
		autoresize_on_init: false,
		menubar:false,
		statusbar: false,
    });

	tinymce.init({
      	selector: '#observations',
	  	branding: false,
		width : "100%",
		plugins: 'lists, autoresize',
		toolbar: 'bullist',
		autoresize_on_init: false,
		menubar:false,
		statusbar: false,
    });
</script>

