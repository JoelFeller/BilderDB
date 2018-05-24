<?php

require_once '../repository/UserRepository.php';


/**
 * Siehe Dokumentation im DefaultController.
 */
class UserController
{
    public function index()
    {
        Security::checkLogin();
        Security::checkAdmin();
        $userRepository = new UserRepository();

        $view = new View('user_index');
        $view->title = 'User';
        $view->heading = 'User';
        $view->users = $userRepository->readAll();
        $view->display();
    }

    public function create()
    {
        $error = [];
        $view = new View('user_create');
        $view->title = 'Create user';
        $view->heading = 'Create user';
        $view->errors = $error;
        $view->display();
    }

    public function doCreate()
    {
        $error = [];
        if ($_POST['send']) {
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            $userRepository = new UserRepository();
            if($userRepository->checkName($username) < 1){
                if($userRepository->checkMail($email) < 1){
                    $userRepository->create($username, $email, $password);
                    header("Location : /user/login");
                }
                else {
                    $error["wrong"] = "Es existiert bereits ein Benutzer mit dieser Email-Adresse";
                }
            }else {
                $error["wrong"] = "Es existiert bereits ein Benutzer mit diesem Benutzernamen";
            }
            $view = new View('user_create');
            $view->title = 'Create user';
            $view->heading = 'Create user';
            $view->errors = $error;
            $view->display();


        }

        // Anfrage an die URI /user weiterleiten (HTTP 302)
        header('Location: /user/doCreate');
    }

    public function delete()
    {
        Security::checkLogin();
        $userRepository = new UserRepository();
        $userRepository->deleteById($_GET['id']);

        // Anfrage an die URI /user weiterleiten (HTTP 302)
        header('Location: /user');
    }


    public function dologin()
    {
        if (isset($_POST['submit'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            
            $userRepository = new UserRepository();
            $loginErfolgreich = $userRepository->login($username, $password);

            if($loginErfolgreich) {
                $_SESSION['username'] = $username;
                header('Location: /');

            }
            else
            {
              header('Location: /user/login');
            }



        }else{
          echo "Hopp Thun";
        }

    }

    public function login()
    {

        $view = new View('user_login');
        $view->title = 'Login';
        $view->heading = 'Login';
        $view->display();
    }

    public function doLogout()
    {
        session_destroy();
        session_unset();
        header('Location: /');
    }

}

?>