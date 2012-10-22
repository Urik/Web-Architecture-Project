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

    public function showRegistrationForm() {
        //TODO make form.
    }

    public function showSuccess() {
        //TODO make success screen.
    }

    public function showError($message) {
        //TODO make failure screen
    }


}
