<?php
require_once "../../Views/Alta/AltaTomadorView.php";
require_once "../../Others/UserCreator.php";
require_once "../../DAOs/UserDAO.php";
require_once "../../Others/UserColumns.php";
require_once "../../Others/UserTypes.php";

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
            $nick = $_POST["nick"];
            $password = $_POST["password"];
            $repeatedPassword = $_POST["repeated_password"];
            $email = $_POST["email"];
            $firstName = $_POST["name"];
            $lastName = $_POST["last_name"];
            $birthDay = $_POST["birth_date"];
            $phone = $_POST["phone"];
            $cuit = $_POST["cuit"];
            $address = $_POST["address"];
            $condicionImpositiva = $_POST["condicion_impoisitva"];
            $dni = $_POST["dni"];
            $success = $this->createClient(new UserCreator(), new UserDAO(), $nick, $password,
                $email, $birthDay, $firstName, $lastName, $address, $dni, $phone, $cuit);
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
        $firstName, $lastName, $address, $dni, $telefono, $cuit) {
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

$model = $_SESSION["user"];
$view = new AltaTomadorView();
$controller = new AltaTomadorController($model, $view);
$view->setController($controller);
$controller->start();

?>