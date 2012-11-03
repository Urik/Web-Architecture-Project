<?php
include_once dirname(__FILE__) . "/ModificationView.php";

class ClientModificationView extends ModificationView {
    /** @var ClientModificationController */
    private $controller = null;

    /**
     * @param $controller ClientModificationController
     */

    public function setController($controller) {
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
        include dirname(__FILE__) . "/WebPages/productor/modificar_cliente_template.php";
    }

}

?>