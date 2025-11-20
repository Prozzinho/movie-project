<?php

namespace App\Repository;

use App\Database\Mysql;
use App\Model\Movie;
use App\Model\Category;

class MovieRepository
{
    //Attributs
    private \PDO $connect;

    public function __construct()
    {
        //Injection de dépendance
        $this->connect = (new Mysql())->connectBDD();
    }

    //Méthodes
    public function saveMovie(Movie $movie): void
    {
        try {
            //Ecrire la requête
            $sql = "INSERT INTO movie(title, `description`, publish_at)VALUE(?,?,?)";
            //Préparer la requête
            $req = $this->connect->prepare($sql);
            //Assigner les paramètres
            $req->bindValue(1, $movie->getTitle(), \PDO::PARAM_STR);
            $req->bindValue(2, $movie->getDescription(), \PDO::PARAM_STR);
            $req->bindValue(3, $movie->getPublishAt(), \PDO::PARAM_STR);
            //Exécuter la requête
            $req->execute();
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }
}