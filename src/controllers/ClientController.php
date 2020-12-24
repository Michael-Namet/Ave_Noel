<?php

namespace App\controllers;

use App\repository\ClientRepository;
use App\config\Database;

class ClientController{

    public function liste()
    {
        $clientRepo = new ClientRepository;
        $client = $clientRepo->getClient(); 
        return $client;
    }

    public function show()
    {
        $client = new ClientRepository();
        $c=$client->getClient();
        foreach($c as $arr) {
            echo "<tr><td class='pseudo'> $arr[1] </td></tr>";
        }
    }
    
}
?>