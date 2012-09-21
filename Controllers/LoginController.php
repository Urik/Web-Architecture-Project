<?php
require_once "../Models/LoginModel.php";
require_once '../Views/NotLoggedInView.php';
require_once '../Views/LoggedInView.php';
class LoginController {

    function __construct() {
        if (isset($_POST["name"]) && isset($_POST["family_name"])) {
/**/
            $model = new LoginModel();
            $user = $model->getUser($_POST["name"], $_POST["family_name"]);
            if (!is_null($user)) {
                $this->showLoggedInView($user);
            }
        }
        $this->showNotLoggedInView();
    }

    function showNotLoggedInView() {
        $parameters = "";
        new NotLoggedInView($parameters);
    }
    /* @var $user User */
    function showLoggedInView($user) {
        $variables["nick"] = $user->getNick();
        new LoggedInView($variables);
    }

}

$controller = new LoginController();

?>