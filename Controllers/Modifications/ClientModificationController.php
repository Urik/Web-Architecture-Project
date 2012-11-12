<?php
require_once dirname(__FILE__) . "/../../Views/ClientModificationView.php";
require_once dirname(__FILE__) . "/../../interfaces/IClientsCreator.php";
require_once dirname(__FILE__) . "/../../Others/Producer.php";
require_once dirname(__FILE__) . "/../../Others/Cliente.php";
require_once dirname(__FILE__) . "/../../DAOs/ClientDAO.php";

class ClientModificationController
{
    /** @var IClientsCreator */
    private $model;

    /** @var ClientModificationView */
    private $view;

    /** @var ClientDAO */
    private $clientDao;

    public function __construct(IClientsCreator $model, $view) {
        $this->model = $model;
        $this->view = $view;
        $this->clientDao = new ClientDAO();
    }

    public function start() {
        //Se muestran los datos del cliente
        if (isset($_GET)) {
            $clientId = $_GET['clientId'];
            $client = $this->clientDao->get($clientId);
            $this->showClientData($client);
        }
        //Se actualiza al cliente
        else if (isset($_POST)) {
            $id = $_POST[ClientColumns::ID];
            $nombre = $_POST[ClientColumns::NOMBRE];
            $apellido = $_POST[ClientColumns::APELLIDO];
            $dni = $_POST[ClientColumns::DNI];
            $direccion = $_POST[ClientColumns::DIRECCION];
            $this->clientDao->



        }
        //Se elige al cliente
        else {

        }
    }

    public function showClientData(Cliente $client) {
        /** @var $client Cliente */
        $clientData = array();
        if (!is_null($client)) {
            $clientData["nick"] = $client->getNick();
            $clientData["password"] = $client->getPassword();
            $clientData["email"] = $client->getEmail();
            $clientData["first_name"] = $client->getNombre();
            $clientData["last_name"] = $client->getApellido();
            $clientData["birth_date"] = $client->getBirthday();
            $clientData["address"] = $client->getDireccion();
            $clientData["phone"] = $client->getTelefono1();
            $clientData["cuit"] = $client->getCuit();
            $clientData["condicion_impositva"] = $client->getCondicionImpositiva();
        } else {
            $clientData["nick"] = "";
            $clientData["password"] = "";
            $clientData["email"] = "";
            $clientData["first_name"] = "";
            $clientData["last_name"] = "";
            $clientData["birth_date"] = "";
            $clientData["address"] = "";
            $clientData["phone"] = "";
            $clientData["cuit"] = "";
            $clientData["condicion_impositva"] = "";;
        }
        $this->view->showModificationPage($clientData);
    }

    public function setClientDAO(ClientDAO $clientDao) {
        $this->clientDao = $clientDao;
    }

    public function updateClient($client) {
        return $this->clientDao->update($client);
    }
}
if (!isset($_SESSION)) {
    session_start();
}
/** @var $model IClientsCreator */
$model = unserialize($_SESSION["user"]);
$view = new ClientModificationView();
$controller = new ClientModificationController($model, $view);
$view->setController($controller);

$controller->start();

?>