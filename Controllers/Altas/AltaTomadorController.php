<?php
if (!isset($_SESSION)) {
    session_start();
}

class AltaTomadorController
{
    /** @var Producer */
    private $model;
    private $view;

    public function __construct($model, $view) {
        $this->model = $model;
        $this->view =  $view;
    }

    public function showPage() {

    }

    public function createClient(UserCreator $userCreator, UserDAO $userDAO) {
        $userData = [
            UserColumns::NICK => $_POST["nick"],
            UserColumns::PASSWORD => $_POST["password"],
            UserColumns::EMAIL => $_POST["email"],
            UserColumns::BIRTH_DATE => $_POST["birthday"],
            UserColumns::USER_TYPE => UserTypes::CLIENT
        ];
        $userDAO->create($userData);
        $user = $userDAO->getByValues($userData);
        $clientData = [
            ClientColumns::APELLIDO => $_POST["familyName"],
            ClientColumns::DIRECCION => $_POST["address"],
            ClientColumns::DNI => $_POST["dni"],
            ClientColumns::NOMBRE => $_POST["name"],
            ClientColumns::PRODUCTOR_ID => $this->model->getId(),
            ClientColumns::USER_ID => $user[0]->getId()
        ];
        $this->model->createClient($clientData);
    }
}

$model = $_SESSION["model"];
$view = new AltaTomadorView();
$controller = new AltaTomadorController($model, $view);
$view->setController($controller);
if (!isset($_POST)) {
    $controller->showPage();
} else {
    $controller->createClient(new UserCreator(), new UserDAO());
}