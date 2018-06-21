<?php

require_once '../repository/GalerieRepository.php';


/**
 * Siehe Dokumentation im DefaultController.
 */
class GalerieController
{
    public function index()
    {
        $galerieRepository = new GalerieRepository();

        $view = new View('galerie_index');
        $view->title = 'Galerie';
        $view->heading = 'Galerie';
        $view->galerie = $galerieRepository->readAll();
        $view->display();
    }

    public function delete()
    {
        $galerieRepository = new GalerieRepository();
        $galerieRepository->deleteById($_GET['id']);

        // Anfrage an die URI /user weiterleiten (HTTP 302)
        header('Location: /galerie');
    }

    public function galerie()
    {
        $view = new View('galerie_create');
        $view->title = 'Galerie erstellen';
        $view->heading = 'Galerie erstellen';
        $view->display();
    }

    public function doGalerie()
    {
        if ($_POST['galerieerstellen']) {
            $benutzer = $_SESSION['id'];
            $galeriename = $_POST['galeriename'];
            $privacy = $_POST['privatsphäre'];

            $galerieRepository = new GalerieRepository();
            $galerieRepository->create($benutzer, $galeriename, $privacy);

        }

        // Anfrage an die URI /user weiterleiten (HTTP 302)
        header('Location: /');

    }

    public function oeffentlich()
    {
        $error = [];
        $view = new View('galerie_oeffentlich');
        $view->title = 'Öffentlicher Bereich';
        $view->heading = 'Öffentlicher Bereich';
        $view->errors = $error;
        $view->display();
    }

    public function member()
    {
        $error = [];
        $view = new View('galerie_member');
        $view->title = 'Member Bereich';
        $view->heading = 'Member Bereich';
        $view->errors = $error;
        $view->display();
    }

    public function show(){

    }
}

