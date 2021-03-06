<?php
session_start();
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
    <title>Create</title>
</head>
<body>
<div class="container">
<?php include './include/inc/navbar.php' ?>

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
			<form class="form-inline" method="POST" action="" id="interventionFrom">
			
				<div class="input-group mb-3 col-6">
				  <div class="input-group-prepend">
				    <span class="input-group-text" id="basic-addon1">Date d'ouverture</span>
				  </div>
				  <input type="date" id="inter_date" name="inter_date" class="form-control" placeholder="date" aria-label="date" aria-describedby="basic-addon1">
				  <input type="time" id="inter_time" name="inter_time" class="form-control" placeholder="Time" aria-label="Time" aria-describedby="basic-addon1">

				</div>

				<div class="input-group mb-3 col-6">
				  <div class="input-group-prepend">
				    <span class="input-group-text" id="basic-addon1">Catégorie</span>
				  </div>
				  <select id="categorie" name="categorie" class="form-select form-control" aria-label="Default select example" aria-describedby="basic-addon1">
						  <option selected >-------------</option>
						  <optgroup label="Root entity">
							<optgroup label="Application pilotage">
								<option  class="tree b" value="Application pilotage"> Pilotage</option>
								<option class="tree b" value="Application pilotage > SIG">SIG</option>
							</optgroup>

							<optgroup label="Applications support">
								<option  class="treeroot" value="Applications support">Applications support</option>
								<option  class="tree b" value="Applications support > Courrier">Courrier</option>
								<option  class="tree b" value="Applications support > Gestion des Appels d'Offres">Gestion des Appels d'Offres</option>
								<option  class="tree b" value="Applications support > Gestion des Réclamations">Gestion des Réclamations</option>
								<option  class="tree b" value="Applications support > GSM">GSM</option>
								<option  class="tree b" value="Applications support > IProfil">IProfil</option>
								<option  class="tree b" value="Applications support > système eau et électricité">système eau et électricité</option>
								<option  class="tree b" value="Applications support > système Inventaire">système Inventaire</option>
								<option  class="tree b" value="Applications support > système juridique">système juridique</option>
								<option  class="tree b" value="Applications support > système par auto">système par auto</option>
								<option  class="tree b" value="Applications support > système régie">système régie</option>
								<option  class="tree b" value="Applications support > système stock">système stock</option>
							</optgroup>
						<optgroup label="Materiels">
								<option class="treeroot" value="Materiels > Materiels ">Materiels</option>
								<option class="tree b" value="Materiels > PC de bureau">PC de bureau</option>
								<option class="tree b" value="Materiels > PC Portable">PC Portable</option>
								<option class="tree b" value="Materiels > Scanners">Scanners</option>
								<option class="tree b" value="Materiels > Imprimant">Imprimant</option>
						</optgroup>

						<option  class="treeroot" value="Organisation documentaire">Organisation documentaire</option>
						<option  class="treeroot" value="Organisation événement">Organisation événement</option>
						<option  class="treeroot" value="PA et Reporting">PA et Reporting</option>
						<optgroup label="Portail">
								<option  class="tree b" value="Portail > site internet">site internet</option>
								<option  class="tree b" value="Portail > site intranet">site intranet</option>
						</optgroup>
						<optgroup label="Réseaux">
								<option  class="tree b" value="Réseaux > Accès réseaux">Accès réseaux</option>
								<option  class="tree b" value="Réseaux > Extension réseau">Extension réseau</option>
								<option  class="tree b" value="Réseaux > Prises réseaux">Prises réseaux</option>
								<option  class="tree b" value="Réseaux > Réseau sans fil">Réseau sans fil</option>
						</optgroup>
						<optgroup label="Sécurité">
								<option  class="tree b" value="Sécurité > Audit">Audit</option>
								<option  class="tree b" value="Sécurité > FireWall">FireWall</option>
								<option  class="tree b" value="Sécurité > VPN">VPN</option>
						</optgroup>
						<optgroup label="Système">
								<option  class="tree b" value="Système > Active Directory">Active Directory</option>
								<option  class="tree b" value="Système > Antivirus">Antivirus</option>
								<option  class="tree b" value="Système > Bureautique">Bureautique</option>
								<option  class="tree b" value="Système > Clone des machines">Clone des machines</option>
								<option  class="tree b" value="Système > Messagerie">Messagerie</option>
								<option  class="tree b" value="Système > Sauvegarde et réplication">Sauvegarde et réplication</option>
								<option  class="tree b" value="Système > Téléphonie IP">Téléphonie IP</option>
								<option  class="tree b" value="Système > Tracabilité">Tracabilité</option>
								<option  class="tree b" value="Système > Virtualisation">Virtualisation</option>
						</optgroup>
							<optgroup label="Téléphonie Mobile">
								<option  class="tree b" value="Téléphonie Mobile > Smartphones">Smartphones</option>
								<option  class="tree b" value="Téléphonie Mobile > Tablette">Tablette</option>
							</optgroup>
						</optgroup>
						</select>
			
				</div>
				<div class="input-group mb-3 col-6">
				  <div class="input-group-prepend">
				    <span  class="input-group-text" id="basic-addon1">Demandeur</span>
				  </div>
				  <select id="demandeur" name="demandeur" class="form-select form-control" aria-label="Default select example" aria-describedby="basic-addon1">
						    <option selected  >-------------</option>
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
						  <option value="Nouveau">Nouveau</option>
						  <option value="En cours (Attribué)">En cours (Attribué)</option>
						  <option value="En cours (Planifié)">En cours (Planifié)</option>
						  <option value="En attente">En attente</option>
						  <option selected value="Résolu">Résolu</option>
						  <option value="Close">Close</option>
						</select>
			
				</div>
				<div class="input-group mb-3 col-3">
				  <div class="input-group-prepend">
				    <span class="input-group-text" id="basic-addon1">Urgence</span>
				  </div>
				  <select id="urgence"  name="urgence" class="form-select form-control" aria-label="Default select example" aria-describedby="basic-addon1">
						  <option selected disabled=>-------------</option>
						  <option value="Très haute">Très haute</option>
						  <option value="Haute">Haute</option>
						  <option selected value="Moyenne">Moyenne</option>
						  <option value="Basse">Basse</option>
						  <option value="Très basse">Très basse</option>
						</select>
			
				</div>
				<div class="input-group mb-3 col-4">
				  <div class="input-group-prepend">
				    <span class="input-group-text" id="basic-addon1">Impact</span>
				  </div>
				  <select id="impact" name="impact" class="form-select form-control" aria-label="Default select example" aria-describedby="basic-addon1">
				  <option selected disabled=>-------------</option>
						  <option value="Très haute">Très haute</option>
						  <option value="Haute">Haute</option>
						  <option selected value="Moyenne">Moyenne</option>
						  <option value="Basse">Basse</option>
						  <option value="Très basse">Très basse</option>
						</select>
			
				</div>

		
				<div class="input-group mb-3 col-4">
				  <div class="input-group-prepend">
				    <span class="input-group-text" id="basic-addon1">Type</span>
				  </div>
				  <select id="type" name="type" class="form-select form-control" aria-label="Default select example" aria-describedby="basic-addon1">
						 
						  <option value="Incident" selected>Incident</option>
						  <option value="Demande">Demande</option>
						</select>
			
				</div>

				<div class="input-group mb-3 col-4">
				  <div class="input-group-prepend">
				    <span class="input-group-text" id="basic-addon1">Intervenant</span>
				  </div>
				  <select id="intervenant" name="intervenant" class="form-select form-control" aria-label="Default select example" aria-describedby="basic-addon1">
						  <option value="Mohammed LAKSIR" >Mohammed LAKSIR</option>
						  <option value="Nassira RACHID" >Nassira RACHID</option>
						</select>
			
				</div>
				<div class="input-group mb-3 col-4">
				  <div class="input-group-prepend">
				    <span class="input-group-text" id="basic-addon1">Élément associé</span>
				  </div>
				  <select id="element_associe" name="element_associe" class="form-select form-control" aria-label="Default select example" aria-describedby="basic-addon1">
						<option value="Général" selected >Général</option>
						<option value="Ordinateur">Ordinateur</option>
						<option value="Moniteur">Moniteur</option>
						<option value="Matériel réseau">Matériel réseau</option>
						<option value="Périphérique">Périphérique</option>
						<option value="Téléphone">Téléphone</option>
						<option value="Imprimante">Imprimante</option>
						<option value="Logiciel">Logiciel</option>
						</select>
			
				</div>
				<div class="input-group mb-3 col-4">
				  <div class="input-group-prepend">
				    <span class="input-group-text" id="basic-addon1">Fait à :</span>
				  </div>
				  <select id="lieu" name="lieu" class="form-select form-control" aria-label="Default select example" aria-describedby="basic-addon1">
						<option value="Direction régionale de Casablanca" selected >Direction régionale de Casablanca</option>
						<option value="Direction Provinciale Meknes">Direction Provinciale Meknes</option>
						<option value="Direction Régionale de RABAT">Direction Régionale de RABAT</option>
						<option value="Administration Centrale">Administration Centrale</option>
						</select>
			
				</div>
				<div class="input-group mb-3 col-4">
				  <div class="input-group-prepend">
				    <span class="input-group-text" id="basic-addon1">Le :</span>
				  </div>
				  <input type="text" id="dateIntervension" name="dateIntervension"  class="form-control" value="<?php echo date("d/m/Y h:i");?>" aria-describedby="basic-addon1">
			
				</div>
				<div class="input-group mb-3 col-12">
				  <div class="input-group-prepend">
				    <span class="input-group-text" id="basic-addon1">Titre</span>
				  </div>
				  <input type="text" id="titre" name="titre" class="form-control" placeholder="Titre" aria-label="titre" aria-describedby="basic-addon1">
			
				</div>
				<div class="input-group mb-3 p-6 col-12">
				  <div class="input-group-prepend">
				    <span class="input-group-text" id="basic-addon1">Description</span>
				  </div>
				  <textarea id="description" name="description"  class="form-control" rows="6"  aria-label="Description" aria-describedby="basic-addon1"></textarea>
			
				</div>
				<div class="input-group mb-3 p-6 col-12">
				  <div class="input-group-prepend">
				    <span class="input-group-text" id="basic-addon1">Activités</span>
				  </div>
				  <textarea id="observations" name="observations"  class="form-control" rows="6"  aria-label="Description" aria-describedby="basic-addon1"></textarea>
			
				</div>


					<input type="submit" id="submitbtn" name="submitbtn" class="btn btn-primary" value="Enregistrer"/>

			
			
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
<script>
$('#submitbtn').click( function(e) {
  e.preventDefault();
  var datainter = $("#interventionFrom").serializeArray();
  var description = tinymce.get("description").getContent();
  var observation = tinymce.get("observations").getContent();
  datainter.push({name: "description", value: description});
  datainter.push({name: "observations", value: observation});
    $.ajax({
        url: 'include/inc/intervension.php',
        type: 'POST',
        data: datainter,
        success: function(data) {
			if (data === "DONE") {
			    console.log(data);
				$.notify("Intervension Ajoute avec Succès", "success");
				$("#interventionFrom")[0].reset();
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
		deprecation_warnings: false
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
		deprecation_warnings: false
    });
</script>
</body>
</html>