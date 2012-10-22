<?php
require_once 'Views/Alta/ClientRegistrationController.php';
require_once 'Others/Producer.php';

if (!isset($_SESSION)) {
    session_start();
}

class AltaTomadorController
{
    /** @var Producer */
    private $model;
    /** @var AltaTomadorView */
    private $view;

    public function __construct($model, $view) {
        $this->model = $model;
        $this->view =  $view;
    }

    public function start() {
        if (!isset($_POST)) {
            $this->view->showRegistrationForm();
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

    public function createClient(UserCreator $userCreator, UserDAO $userDAO) {
        try {
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