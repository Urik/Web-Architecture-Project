<?php
include_once dirname(__FILE__) . "/ModificationView.php";

class ClientModificationView extends ModificationView {
    /** @var ClientModificationController */
    private $controller = null;

    /**
     * @param $controller ClientModificationController
     */
    function __construct($controller)
    {
        $this->controller = $controller;
    }

    public function showSelectionPage($members)
    {

    }

    public function showModificationPage($data)
    {
        if (!isset($_SESSION)) {
            session_start();
        }
        $data = array();
        $_SESSION["nick"] = $data["nick"];
        $_SESSION["password"] = $data["password"];
        $_SESSION["email"] = $data["email"];
        $_SESSION["first_name"] = $data["first_name"];
        $_SESSION["last_name"] = $data["last_name"];
        $_SESSION["birth_date"] = $data["birth_date"];
        $_SESSION["address"] = $data["address"];
        $_SESSION["phone"] = $data["phone"];
        $_SESSION["cuit"] = $data["cuit"];
        $_SESSION["condicion_impositva"] = $data["condicion_impositva"];
        header("Location: ./WebPages/productor/modificar_cliente_template.php");
    }

}

?>