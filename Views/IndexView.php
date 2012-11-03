<?php

require_once "Controllers/IndexController.php";

class IndexView {
    /** @var IndexController */
    private $controller = null;
    
    public function __construct(IndexController $controller) {
        $this->controller = $controller;
    }
    
    public function showIndex() {
        include dirname(__FILE__) . "/WebPages/Index/IndexTemplate.php";
    }
}

?>
