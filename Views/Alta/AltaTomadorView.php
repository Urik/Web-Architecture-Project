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
        header("Location:  ../../Views/WebPages/productor/alta_cliente_template.php");
    }

    public function showSuccess() {

    }

    public function showError($message) {
        //TODO make failure screen
    }


}
