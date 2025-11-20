<?php

namespace App\Controller;

use App\Model\Movie;
use App\Model\Category;
use App\Repository\MovieRepository;
use App\Utils\Tools;

class MovieController
{
    //Attributs
    private MovieRepository $movieRepository;

    //Constructeur
    public function __construct()
    {
        $this->movieRepository = new MovieRepository();
    }

    //Méthodes
        /**
     * Méthode pour rendre une vue avec un template
     * @param string $template Le nom du template à inclure
     * @param string|null $title Le titre de la page
     * @param array $data Les données à passer au template
     * @return void
     */
    public function render(string $template, ?string $title, array $data = []): void
    {
        include __DIR__ . "/../../template/template_" . $template . ".php";
    }

    //Méthode pour ajouter un film (Movie)
    public function addMovie()
    {
        return $this->render("add_movie", "Add Category");
    }
}
