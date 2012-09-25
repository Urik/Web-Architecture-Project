<?php

require_once "Views/IndexView.php";

require_once "Controllers/Login.php";

class IndexController {

    /** @var IndexView */
    private $view;

    public function __construct() {
        $this->view = new IndexView($this);
    }

    public function start() {
        if (!empty($_POST['email'])) {
            session_start();
            $login = new LoginController();

            /* @var User */
            $user = $login->loguear($_POST['email'], $_POST['pass']);

            if (!is_null($user)) {
                $user->showHomePage(null);
            }
        } else {
            $this->view->showIndex();
        }
    }
    
    

}

?>
