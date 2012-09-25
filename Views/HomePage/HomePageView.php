<?php

abstract class HomePageView {
    
    private $controller;
    
    public function __construct($controller) {
        $this->controller = $controller;
    }
    
    public abstract function showHome($parameters);
    
    protected function getController() {
        return $this->controller;
    }
}

?>
