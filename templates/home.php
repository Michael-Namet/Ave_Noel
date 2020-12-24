<!DOCTYPE html>
<html>

<head>
    <title> Ave_Noel </title>
    <meta charset="utf-8" />
    <link rel="stylesheet" type="text/css" href="assets/projet.css">
</head>

<body>
    <br>
    
    <?php include "header.php";
    require 'vendor/autoload.php'; 
    use App\repository\postRepository;?>
    
    <br><br><br>

    <fieldset class="newPost"style="border : 0;">
    <?php
    if (isset($_SESSION['mail']))
    {
        echo "<fieldset style='width:80%;margin:0 auto'>";
        echo "<form id='poster' action='index.php' method='post'>";
        echo "<input type='text' name='titre' size='30' placeholder='Titre'/>";
        echo "<br><br>";
        echo "<textarea rows='4' cols='80' name='contenu' style='margin:0 auto'>";
        echo "Votre poste";
        echo "</textarea>";
        echo "<br><br>";
        echo "<input type='submit' value='Poster'></button>";
        echo "</form>";
        echo "</fieldset>";
        echo "<br><br>";
        $a = new PostRepository();
		$a->post();
    } 
         $post = new PostRepository();
         $p=array_reverse($post->getPost());
         foreach ($p as $arr) {
            echo "<fieldset style='width:80%;margin:0 auto;'>";
            $pseudo=$post->getPseudo($arr[1]);
            echo  "<div style='float:right;'>$arr[4] </div>";
            echo "<h3> @$pseudo[0]</h3>";
            echo "<h3 style='text-align:center;font-style:bold;'> $arr[3] </h3>";
            echo  $arr[2] ;
            echo "</fieldset>";
            echo "<br><br>";
        }
        
    ?>
    </fieldset>
    <h1> Derniers Posts </h1>
</body>

</html>