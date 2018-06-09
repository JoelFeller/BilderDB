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
        $view->title = 'Bild hinzufügen';
        $view->heading = 'Bild hinzufügen';
        $view->display();
    }

    public function doGalerie()
    {
        if ($_POST['submitpiccture']) {
            $title = $_POST['title'];
            $privacy = $_POST['privacy'];
            $description = $_POST['description'];
            $image = 'images/' . time() . '_' . $_FILES['image']['name'];

            move_uploaded_file($_FILES['image']['tmp_name'], $image);
            $galerieRepository = new GalerieRepository();
            $galerieRepository->create($title, $privacy, $description, $image);
            $galerieRepository->imgToFolder($image);
        }

        // Anfrage an die URI /user weiterleiten (HTTP 302)
        header('Location: /galerie');

    }

    public function oeffentlich()
    {


    }

    public function member()
    {


    }


    public function upimage(){
        //image extensions allowed
        $allowedExts = array("gif", "jpeg", "jpg", "png");
        $temp = explode(".", $_FILES["file"]["name"]);
        $extension = end($temp);
        if ((($_FILES["file"]["type"] == "image/gif")
                || ($_FILES["file"]["type"] == "image/jpeg")
                || ($_FILES["file"]["type"] == "image/jpg")
                || ($_FILES["file"]["type"] == "image/pjpeg")
                || ($_FILES["file"]["type"] == "image/x-png")
                || ($_FILES["file"]["type"] == "image/png"))
            && ($_FILES["file"]["size"] < 20000)
            && in_array($extension, $allowedExts))
        {
            if ($_FILES["file"]["error"] > 0)
            {
                echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
            }
            else
            {

                //Successfully uploaded
                echo "Your file " . $_FILES["file"]["name"] . " successfully uploaded!!<br>";
                echo "Details :";
                echo "Upload: " . $_FILES["file"]["name"] . "<br>";
                echo "Type: " . $_FILES["file"]["type"] . "<br>";
                echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";

                //Display Image
                echo "<img src=uploaded/" . $_FILES["file"]["name"] . ">";

                var_dump($_FILES);die;
                //Uploaded image folder
                if (file_exists("images/" . $_FILES["file"]["name"]))
                {
                    echo $_FILES["file"]["name"] . " already exists. ";
                }
                else
                {
                    move_uploaded_file($_FILES["file"]["tmp_name"],
                        "images/" . $_FILES["file"]["name"]);

                }
            }
        }
        else
        {
            //error message on the extension that are not allowed
            echo "Invalid file";
            $filename = preg_replace('/[^A-Z0-9]/','',$_FILES["file"]["name"]) . $extension;
            $logo = uploaded/$filename;

            //insert into database
            $strSQL = "INSERT INTO $table(name,image) VALUES('$name_file','$logo')";
            mysql_query($strSQL) or die(mysql_error());
        }
    }
}

