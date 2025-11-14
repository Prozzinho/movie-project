<?php

namespace App\Model;

use App\Database\Mysql;

class Category
{
    //Attributs
    private int $id;
    private string $name;
    private \PDO $connect;

    //Constructeur
    public function __construct(
        string $name
    )
    {
        $this->name = $name;
        //Injection de dépendance
        $this->connect = (new Mysql())->connectBDD();
    }

    //Getters et Setters

    //Méthodes
    //Ajouter une category

    //Afficher une category (par son id)

    //Afficher toutes les categories
}
