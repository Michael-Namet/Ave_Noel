<?php

namespace App\controller;

class DefaultController
{

    public function home()
    {
        require('index.php/?controller=home&action=show');
    }
}
?>