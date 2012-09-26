<?php

require_once "Controllers/IndexController.php";

class IndexView {
    /** @var IndexController */
    private $controller = null;
    
    public function __construct(IndexController $controller) {
        $this->controller = $controller;
    }
    
    public function showIndex() {
        header("Location: Views/WebPages/Index/IndexTemplate.php");
        exit();
    }
}

?>
