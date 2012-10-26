<?php

require_once "Others/Compania.php";

require_once "Others/Producer.php";

require_once "Others/Cliente.php";

require_once "Views/HomePage/AdministratorHomePageView.php";

require_once "Views/HomePage/CompaniaHomePageView.php";

require_once "Views/HomePage/ProducerHomePageView.php";

require_once "Views/HomePage/ClienteHomePageView.php";

require_once "Models/HomePageModel.php";

require_once "Controllers/HomePageController.php";

class HomePageFactory {
    
    /**
     * Obtiene el controlador para la homepage de un usuario correspondiente.
     * @param User $user El usuario para el que se busca su home page.
     * @return HomePageController Un controlador de Home Page.
     */
    public function getController($user) {
        $view = $this->getView($user);
        if (is_null($view)) {
            return null;
        } else {
            $controller = new HomePageController($view, new HomePageModel());
            $view->setController($controller);
            return $controller;
        }
    }

    /**
     * Obtiene para un usuario su vista de Home Page.
     * @param $user
     * @return AdministratorHomePageView|ClienteHomePageView|CompaniaHomePageView|null|ProducerHomePageView
     */
    public function getView($user) {
        $view = null;
        if ($user instanceof Cliente) {
            $view = new ClienteHomePageView();
        } elseif ($user instanceof Producer) {
            $view = new ProducerHomePageView();
        } elseif ($user instanceof Compania) {
            $view = new CompaniaHomePageView();
        } else {
            $view = new AdministratorHomePageView();
        }
        return $view;
    }
}

?>
