<?php

require_once "Views/HomePage/HomePageView.php";

class AdministratorHomePageView extends HomePageView {

    public function showHome($parameters) {
        header('Location: ./WebPages/home_admin.php');
    }

}

?>
