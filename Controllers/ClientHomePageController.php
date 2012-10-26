<?php

class ClientHomePageController extends HomePageController{
    
    public function showHome() {
        $parameters = array();
        $this->getView()->showHome($parameters);
    }

}

?>
