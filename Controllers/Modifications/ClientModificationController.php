<?php
require_once dirname(__FILE__) . "/../../Views/ClientModificationView.php";

class ClientModificationController
{
    /** @var IClientsCreator */
    private $model;

    /** @var ClientModificationView */
    private $view;

    public function __construct(IClientsCreator $model, $view) {
        $this->model;
        $this->view;
    }

    public function start() {
        //Se muestran los datos del cliente
        if (isset($_GET)) {
            $clientId = $_GET['client_id'];

        }
        //Se actualiza al cliente
        else if (isset($_POST)) {

        }
        //Se elige al cliente
        else {

        }
    }

    public function showClientData(ClientDAO $clientDAO, $view, $clientId) {
        /** @var $client Cliente */
        $client = $clientDAO->get($clientId);
        $clientData = array();
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
        $this->view->showModificationPage($clientData);
    }


}
?>