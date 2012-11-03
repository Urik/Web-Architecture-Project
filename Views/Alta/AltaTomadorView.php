<?php

class AltaTomadorView
{
    /** @var AltaTomadorController */
    private $controller;

    /**
     * @param $controller AltaTomadorControllerr
     */
    public function setController($controller) {
        $this->controller = $controller;
    }

    public function showRegistrationPage() {
        include dirname(__FILE__) . "/../../Views/WebPages/productor/alta_cliente_template.php";
    }

    public function showSuccess() {

    }

    public function showError($message) {
        //TODO make failure screen
    }


}
