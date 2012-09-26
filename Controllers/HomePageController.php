<?php

class HomePageController {
    /** @var HomePageView */
    private $view;
    /** @var HomePageModel */
    private $model;
    
    public function __construct($view, $model) {
        $this->view = $view;     
        $this->model = $model;
    }
    
    public function showHome() {
        return $this->view->showHome(array());
    }
    
    public function getView() {
        return $this->view;
    }
    
    public function getModel() {
        return $this->model;
    }
}

?>
