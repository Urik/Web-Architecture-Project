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
            return new HomePageController($view, new HomePageModel());
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
            $view = new ClienteHomePageView($this);
        } elseif ($user instanceof Producer) {
            $view = new ProducerHomePageView($this);
        } elseif ($user instanceof Compania) {
            $view = new CompaniaHomePageView($this);
        } else {
            $view = new AdministratorHomePageView($this);
        }
        return $view;
    }
}

?>
