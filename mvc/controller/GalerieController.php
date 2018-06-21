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
        $view->galeries = $galerieRepository->readAll();
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
        $galerieRepository = new GalerieRepository();
        $error = [];
        $view = new View('galerie_oeffentlich');
        $view->title = 'Öffentlicher Bereich';
        $view->heading = 'Öffentlicher Bereich';
        $view->galerien = $galerieRepository->readAll();
        $view->errors = $error;
        $view->display();
    }

    public function member()
    {
        $galerieRepository = new GalerieRepository();
        $error = [];
        $view = new View('galerie_member');
        $view->title = 'Member Bereich';
        $view->heading = 'Member Bereich';
        $view->galerien = $galerieRepository->readAll();
        $view->errors = $error;
        $view->display();
    }

    public function show(){
        $galerieRepository = new GalerieRepository();
        $galeriename = $_GET['galeriename'];
        $error = [];
        $view = new View('galerie_einzelansicht');
        $view->title = $galeriename;
        $view->heading = $galeriename;
        $view->galerien = $galerieRepository->readAll();
        $view->errors = $error;
        $view->display();
    }

    public function showpic(){
        $galerieRepository = new GalerieRepository();
        $galeriename = $_GET['galeriename'];
        $error = [];
        $view = new View('galerie_einzelansicht');
        $view->title = $galeriename;
        $view->heading = $galeriename;
        $view->galerien = $galerieRepository->readAll();
        $view->errors = $error;
        $view->display();
    }

    public function doEdit()
    {
        if ($_POST['galerieerstellen']) {
            $gid = $_POST['galerieauswahl'];
            $galeriename = $_POST['galeriename'];
            $privacy = $_POST['privatsphäre'];

                $error = [];

                $galerieRepository = new GalerieRepository();
                $galerieRepository->updateById($galeriename, $privacy, $gid);


                // Anfrage an die URI /user weiterleiten (HTTP 302)
                header('Location: /');


                $view = new View('galerie_edit');
                $view->title = 'Galerie bearbeiten';
                $view->heading = 'Galerie bearbeiten';
                $view->galerien = $galerieRepository->readAll();
                $view->errors = $error;
                $view->display();

            }
            else {
                $error = [];
                $view = new View('galerie_edit');
                $view->title = 'Galerie bearbeiten';
                $view->heading = 'Galerie bearbeiten';
                $view->errors = $error;
                $view->display();

                echo '<p>Error';
            }

        if ($_POST['delete']) {

            $galerieRepository = new GalerieRepository();
            if ($galerieRepository->readById($_GET['id']) > 0) {
                $galerieRepository->deleteById($_GET['id']);
                header("Location: /");
            } else {
                $error["wrong"] = "Hopp Thun!";
            }
            $view = new View('galerie_edit');
            $view->title = 'Galerie bearbeiten';
            $view->heading = 'Galerie bearbeiten';
            $view->errors = $error;
            $view->display();


        }
    }

    public function gallery(){
        $error = [];
        $view = new View('galerie_edit');
        $view->title = 'Galerie bearbeiten';
        $view->heading = 'Galerie bearbeiten';
        $view->errors = $error;
        $view->display();
    }
}

