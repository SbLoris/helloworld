<?php
require_once("api/includeAll.php");
$stylesheets = array("css/style_client.css");
include("header.php");
// Récupérer l'identifiant du rendez-vous à partir de la méthode GET
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}

$mysqli = new DatabaseConnection();
$result = mysqli_query($mysqli->mysqli, "SELECT id, nom, prenom, adresse, email, telephone FROM clients ");
$page = 'nom_de_la_page'; 
if (!$result) {
    die('Erreur dans la requête : ' . mysqli_error($mysqli->mysqli));
}
?>



<body>
<div class="card-container">
	<form class="card" action = './inc/clientAdd.php' method ='POST'>
		<!-- <input type = 'file' name = 'addImage'> --> <!-- Pas d'images dans la db -->
		<h1>Nouveau Client</h1>
		<div class="champs" style = 'display: flex'>
			<input class="contact" name = 'addLastName' placeholder = 'Nom'>
			<input class="contact" name = 'addFirstName' placeholder ='Prénom'>
		</div>		
		<input class="contact" name = 'addAddress' placeholder = 'Adresse'>
		<input class="contact" name = 'addEmail' placeholder = 'Email'>
		<input class="contact" name = 'addPhone' placeholder = 'Téléphone'><br>
		<button class="create" type = 'submit'> Créer</div>
</form>
</div>

<?php while ($row = mysqli_fetch_assoc($result)): ?>
	<div class="card-container">
		<div class="card">
			<img src="https://via.placeholder.com/150" alt="Photo de profil">
			<h2 class = "clientName"><span class = "lastName"> <?php echo($row["nom"] . ' ') ?></span><span class = "firstName"><?php echo($row["prenom"]) ?></span></h2>
			<p class = "clientAddress"><strong>Adresse: </strong><span class = "address"><?php echo($row["adresse"]) ?></span></p>
			<a class = "clientEmail" href="mailto: <?php echo($row["email"])?>"><strong>Email: </strong><span class = "email" ><?php echo($row["email"]) ?></span></a>
			<p class = "clientPhone"><strong>Téléphone: </strong><span class = "phone"><?php echo($row["telephone"]) ?></span></p>
			<input class="clientId" name = "id" style = "display:none" value = <?php echo($row["id"]) ?>>
			<div class="bouton" style = 'display: flex'>
				<div class="modify">Modifier</div>
				<div class="delete">Supprimer</div>
			</div>
		</div>
	</div>
<?php endwhile ?>
</body>



<script src="./js/client.js"></script>
<?php include ("footer.php");?>