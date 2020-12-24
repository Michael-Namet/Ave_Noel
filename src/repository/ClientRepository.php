<?php

namespace App\repository;

use App\config\Database;

class ClientRepository
{
    function getClient()
    {
        $database = new Database();
        $conn = $database->getConnection();

        $client = $conn->query('SELECT * FROM client');
        return $client->fetchAll();
    }

    function addClient()
    {
        if (isset($_POST["nom"], $_POST["prenom"], $_POST["pseudo"],$_POST["mail"], $_POST["mdp"], $_POST["mdp2"])) {

            $database = new Database();
            $conn = $database->getMysqli();
            $nom = htmlspecialchars($_POST["nom"]);
            $prenom = htmlspecialchars($_POST["prenom"]);
            $pseudo = htmlspecialchars($_POST["pseudo"]);
            $mail = htmlspecialchars($_POST["mail"]);
            $pw = htmlspecialchars($_POST["mdp"]);
            $pv = htmlspecialchars($_POST["mdp2"]);
            $now = date('Y-m-d H:i:s', strtotime(date('Y-m-d H:i:s')));
            $id = '\N';
            $admin = 0;
            $pass = password_hash($pw, PASSWORD_DEFAULT);
            $dn = $conn->query('SELECT mail FROM client WHERE mail="' . $mail . '"');
            $verifMail = $dn->num_rows;
            $dn = $conn->query('SELECT pseudo FROM client WHERE pseudo="' . $pseudo . '"');
            $verifPseudo = $dn->num_rows;
            if ($verifPseudo == 0) {
            if (preg_match('#^[a-zA-Z0-9_-]+.?[a-zA-Z0-9_-]*@[a-zA-Z0-9-]{2,}[.][a-zA-Z]{2,3}$#i', $mail)) {
                if ($verifMail == 0) {
                    if (strlen($pw) >= 6) {
                        if ($pw == $pv) {
                            if (preg_match('#^[a-zA-Z-_ ]+$#i', $nom) and preg_match('#^[a-zA-Z-_ ]+$#i', $prenom)) {
                                $sql = "INSERT INTO  client ( idClient, pseudo, mail, nom, prenom, mdp) 
													VALUES ( $id, '$pseudo', '$mail', '$nom', '$prenom', '$pass');";
                                $resultat = $conn->query($sql);
                                echo "</p>Votre compte a été créé avec succés, cliquez <a href='/Ave_Noel/templates/connexion.php'>ici</a> pour vous connecter";
                            } else {
                                echo "Le nom et/ou le prénom sont incorects";
                            }
                        } else {
                            echo "Les mdp ne sont pas identiques";
                        }
                    } else {
                        echo "La longueur minimale du mot de passe est de 6 caractères";
                    }
                } else {
                    echo "Cette adresse mail est déjà liée a un compte";
                }
            } else {
                echo "Adresse mail non valide";
            }
        } else {
            echo "Pseudo deja utilisé";
        }
        }
    }

    public function connexion()
    {
        if(isset($_POST["mdp"], $_POST["mail"]))
        {
            $database = new Database();
        $conn = $database->getMysqli();
        $pw = $_POST["mdp"];
        $mail = $_POST["mail"];
        $req = $conn->query('SELECT mdp FROM client WHERE mail="'.$mail.'"');
        $resultat = $req->fetch_array();//erreur ici ?
        if(password_verify($pw, $resultat[0])){
            $_SESSION['mail'] = $_POST["mail"];
            echo 'Vous êtes connecté !';
	        header("Refresh: 1.5;URL=/Ave_Noel/index.php");
        }
        else{
	        echo 'Mauvais identifiant ou mot de passe !';
        }
        }
    }
}
