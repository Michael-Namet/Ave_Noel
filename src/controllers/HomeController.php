<?php


namespace App\controllers;

use App\repository\PostRepository;

class HomeController
{
    public function show()
    {
        require_once('templates/home.php');
    }
}