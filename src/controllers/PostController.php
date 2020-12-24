<?php

namespace App\controllers;

use App\src\model\Post;
use App\repository\PostRepository;

class PostController{

    public function show()
    {
        $post = new PostRepository();
         $p=array_reverse($post->getPost());
         foreach ($p as $arr) {
            $pseudo=$post->getPseudo($arr[1]);
            echo  "<div style='float:right;'>$arr[4] </div>";
            echo "<h3> @$pseudo[0]</h3>";
            echo "<h3 style='text-align:center;font-style:bold;'> $arr[3] </h3>";
            echo  $arr[2] ;
        }
    }

}

?>