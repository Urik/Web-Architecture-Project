<?php

require_once "Others/HomePageFactory.php";

require_once "Views/IndexView.php";

require_once "Controllers/Login.php";

/**
 * Maneja la pantalla inicial de aplicacion.
 */
class IndexController {

    /** @var IndexView */
    private $view;

    public function __construct() {
        $this->view = new IndexView($this);
    }

    /**
     * Si ya hay un usuario loggeado, es redireccionado hacia su correspondiente pagina. Sino, se pide el logueo.
     */
    public function start() {
        if (!empty($_POST['email'])) {
            if (!isset($_SESSION)) {
                session_start();
            }
            $login = new LoginController();

            /* @var User */
            $user = $login->loguear($_POST['email'], $_POST['pass']);
            $_SESSION["user"] = serialize($user);
            if (!is_null($user)) {
                $homePage = (new HomePageFactory())->getController($user);
                $homePage->showHome([/*"user_Actual" => $user->getEmail()*/]);
            }
        } else {
            $this->view->showIndex();
        }
    }
}
?>