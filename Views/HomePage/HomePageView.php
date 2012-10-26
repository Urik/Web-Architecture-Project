<?php

abstract class HomePageView {
    
    private $controller;
    
    public function __construct() {
    }
    
    public abstract function showHome($parameters);
    
    protected function getController() {
        return $this->controller;
    }

    public function setController($controller) {
        $this->controller = $controller;
    }
}

?>
