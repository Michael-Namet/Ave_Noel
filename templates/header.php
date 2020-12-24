
<?php
use App\repository\ClientRepository;
?>
<!DOCTYPE html>
<html>

<head>
</head>
<body>
<a href="/Ave_Noel/index.php"><input type="button" name="Home" id="Homebutton" value="Ave_Noel"></a>
<table style="float : right;border: 1px solid black; border-spacing : 5px;">
    <tr>
        <?php
        session_start();
        if (isset($_SESSION['mail'])) {
            echo "<td>";
            echo 'Bonjour <b>' . $_SESSION['mail'] . '</b>';
            echo "</td>";
            echo "<td>";
            echo "<a href='" . "/Ave_Noel/templates/deconnexion.php'" . "> <input type='button' class='connex' value='Se deconnecter'> </a>";
            echo "</td>";
        } else {
            echo "<td>";
            echo "<a href='" . "/Ave_Noel/templates/creerCompte.php'" . "> <input type='button' class='connex' value='Créer un compte'> </a>";
            echo "</td>";
            echo "<td>";
            echo "<a href='" . "/Ave_Noel/templates/connexion.php'" . "> <input type='button' class='connex' value='Se connecter'> </a>";
            echo "</td>";
        }
        ?>
    </tr>
</table>
<br><br><br>
<fieldset id="margeDroite">
    <h2> Les autres utilisateurs </h2>
<table class="tablePseudo">
<?php
    $client = new ClientRepository();
    $c=$client->getClient();
    foreach ($c as $arr) {
        echo "<tr><td class='pseudo'> $arr[1] </td></tr>";
    }
?>
</table>
</fieldset>
</body>
</html>