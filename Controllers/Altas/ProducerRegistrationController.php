<?php

require_once dirname(__FILE__) . "/../../DAOs/UserDAO.php";
require_once dirname(__FILE__) . "/../../Exceptions/ProducerCreationException.php";
require_once dirname(__FILE__) . "/../../Exceptions/UserCreationException.php";
require_once dirname(__FILE__) . "/../../Others/UserTypes.php";
require_once dirname(__FILE__) . "/../../Others/IUser.php";
require_once dirname(__FILE__) . "/../../Others/UserColumns.php";
require_once dirname(__FILE__) . "/../../Others/ProducerColumns.php";
class ProducerRegistrationController
{
    /** @var IProducersCreator */
    private $model;
    private $view;

    public function __construct(IProducersCreator $model, $view) {
        $this->model = $model;
        $this->view = $view;
    }

    public function start() {
        if (!isset($_POST) || empty($_POST)) {
            $this->view->showRegistrationPage();
        } else {
            $nick = $_POST[UserColumns::NICK];
            $password = $_POST[UserColumns::PASSWORD];
            $firstName = $_POST[ProducerColumns::NOMBRE];
            $lastName = $_POST[ProducerColumns::APELLIDO];
            $dni = $_POST[ProducerColumns::DNI];
            $address = $_POST[ProducerColumns::DIRECCION];
            $email = $_POST[UserColumns::EMAIL];
            $phone1 = "0"; //TODO arreglar el tema del phone1 y 2 en la base de datos.
            $phone2 = "0";
            $birthDay = $_POST[UserColumns::BIRTH_DATE];

            $success = $this->createProducer(new UserDAO(), $firstName, $lastName, $dni, $address, $email, $phone1, $phone2, $birthDay, $nick, $password);
            if ($success) {
                //Mostrar mensaje de exito.
            } else {
                //Mostrar mensaje de error.
            }
        }
    }

    public function createProducer(UserDAO $dao, $firstName, $lastName, $dni, $address, $email, $phone1, $phone2, $birthDay, $nick, $password) {
        $success = true;
        try {
            $userData = [
                UserColumns::NICK => $nick,
                UserColumns::BIRTH_DATE => $birthDay,
                UserColumns::PASSWORD => $password,
                UserColumns::BIRTH_DATE => $birthDay,
                UserColumns::USER_TYPE => UserTypes::PRODUCER
            ];

            $dao->create($userData);
            /** @var $user IUser */
            $user = $dao->getByValues($userData)[0];

            $id = 0;
            if ($this->model instanceof IUser) {
                $id = $this->model->getId();
            }

            $producerData = [
                ProducerColumns::APELLIDO => $lastName,
                ProducerColumns::DIRECCION => $address,
                ProducerColumns::DNI => $dni,
                ProducerColumns::NOMBRE => $firstName,
                ProducerColumns::TELEFONO_1 => $phone1,
                ProducerColumns::TELEFONO_2 => $phone2,
                ProducerColumns::USER_ID => $user->getId()
            ];

            $this->model->createProducer($producerData);
        } catch(ProducerCreationException $e) {
            $dao->delete($user);
            $success = false;
        } catch (UserCreationException $e) {
            $success = false;
        }
        return $success;
    }
}
