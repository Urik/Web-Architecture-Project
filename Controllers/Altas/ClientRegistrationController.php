<?php
require_once "Views/Alta/AltaTomadorView.php";

if (!isset($_SESSION)) {
    session_start();
}

class AltaTomadorController
{
    /** @var IClientsCreator */
    private $model;
    /** @var AltaTomadorView */
    private $view;

    public function __construct($model, $view) {
        $this->model = $model;
        $this->view =  $view;
    }

    public function start() {
        if (!isset($_POST)) {
            $this->view->showRegistrationPage();
        } else {

            $success = createClient(new UserCreator(), new UserDAO());
            if ($success) {
                $this->view->showSuccess();
            } else {
                //TODO Review error messages.
                $this->view->showError('Error!');
            }
        }
    }

    private function createUser() {

    }

    public function createClient(UserCreator $userCreator, UserDAO $userDAO, $nick, $password, $email, $birthday,
        $firstName, $lastName, $address, $dni, $telefono, $cuit, $telefonos) {
        try {
            $userData = [
                UserColumns::NICK => $nick,
                UserColumns::PASSWORD => $password,
                UserColumns::EMAIL => $email,
                UserColumns::BIRTH_DATE => $birthday,
                UserColumns::USER_TYPE => UserTypes::CLIENT
            ];
            $userDAO->create($userData);

            $user = $userDAO->getByValues($userData);

            $clientData = [
                ClientColumns::APELLIDO => $lastName,
                ClientColumns::DIRECCION => $address,
                ClientColumns::DNI => $dni,
                ClientColumns::NOMBRE => $firstName,
                ClientColumns::PRODUCTOR_ID => $this->model->getId(),
                ClientColumns::USER_ID => $user[0]->getId()
            ];
            $this->model->createClient($clientData);
        } catch (ProducerCreationException $e) {
            $userDAO->delete($user);
        } catch (UserCreationException $e) {
        }
    }
}

$model = $_SESSION["model"];
$view = new AltaTomadorView();
$controller = new AltaTomadorController($model, $view);
$view->setController($controller);
$controller->start();