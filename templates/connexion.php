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


require '../vendor/autoload.php';
use App\repository\ClientRepository;

?>
    <?php include "header.php" ?>
    
    <br><br><br>

    <fieldset class="newPost" style="text-align:center;">
    <form name="formulaire2" id="form2" action="connexion.php" method="post">
        <p class="compt">
           Saisissez votre adresse mail :<br><br>
            <input type="text" name="mail" id="email"required>
        </p>
		<p id="infoema"></p>
        <p class="compt">
            Saisissez le mot de passe :<br><br>
            <input type="password" name="mdp" id="mdp" required>
        </p>
        <p id="infoMdp"></p><br>
        <input type="submit" value="Se connecter" id="cpt" >&nbsp;&nbsp;&nbsp;&nbsp;
		<input type="reset" value="Annuler" id="cpt" > 
    </form> 
    <?php
        $connexion = new ClientRepository();
        $connexion->connexion();
    ?>
    </fieldset>
</body>

</html>