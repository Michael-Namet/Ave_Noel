<?php

namespace App\repository;

use App\config\Database;

class PostRepository
{
    function getPost()
    {
        $database = new Database();
        $conn = $database->getConnection();
        $posts = $conn->query('SELECT * FROM post');
        return $posts->fetchAll();
    }

    function getPseudo(int $id){
        $database = new Database();
        $conn = $database->getConnection();
        $pseudo = $conn->query("SELECT pseudo FROM Client WHERE idClient=$id");
        return $pseudo->fetch();
    }

    function getId(){
        $database = new Database();
        $conn = $database->getConnection();
        $mail = $_SESSION['mail'];
        $idC = $conn->query("SELECT idClient FROM client WHERE mail='$mail'");
        return $idC->fetch();
    }

    function post(){
        if (isset($_POST["titre"], $_POST["contenu"])){
            $database = new Database();
            $conn = $database->getMysqli();
            $pr = new PostRepository;
            $idC = $pr->getId();
            $id = '\N';
            $titre = htmlspecialchars($_POST["titre"]);
            $poste = htmlspecialchars($_POST["contenu"]);
            $sql = "INSERT INTO  post ( idPost, idClient, content, title) 
													VALUES ( $id, '$idC[0]', '$poste', '$titre');";
                                $resultat = $conn->query($sql);
        }
    }
}
?>