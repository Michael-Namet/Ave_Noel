<!DOCTYPE html>
<html>

<head>
	<title> Ave_Noel </title>
	<meta charset="utf-8" />
	<link rel="stylesheet" type="text/css" href="../assets/projet.css">
</head>

<body>
	<br>

	<?php

	use App\repository\ClientRepository;

	require '../vendor/autoload.php';
	include "header.php"; ?>

	<fieldset class="newPost" style="text-align:center;">
		<form id="pay" action="creerCompte.php" method="post">
			<table id="cb" style="margin:0 auto;">
				<tr>
					<td>Nom</td>
					<td><input type="text" name="nom" required></td>
				</tr>
				<tr>
					<td>Prénom</td>
					<td><input type="text" name="prenom" required></td>
				</tr>
				<tr>
					<td>Pseudo</td>
					<td><input type="text" name="pseudo" required></td>
				</tr>
				<tr>
					<td>Adresse Mail</td>
					<td><input type="text" name="mail" required></td>
				</tr>
				<tr>
					<td>Mot de passe</td>
					<td><input type="password" name="mdp" required></td>
				</tr>
				<tr>
					<td>Confirmation du mot de passe</td>
					<td><input type="password" name="mdp2" required></td>
				</tr>
			</table>
			<br><br>
			<input type="submit" value="Envoyer" id="cpt">&nbsp;&nbsp;&nbsp;&nbsp;
			<input type="reset" value="Annuler" id="cpt">
			<br>
		</form>
		<?php
		$a = new ClientRepository();
		$a->addClient();
		?>
	</fieldset>
</body>

</html>