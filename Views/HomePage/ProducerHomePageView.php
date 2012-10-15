<?php

/*

 */

/**
 * Description of ProducerHomePageView
 *
 * @author Usuario
 */
class ProducerHomePageView extends HomePageView {

    public function showHome($parameters) {
        session_start();
        //$_SESSION["parameters"] = $parameters;
        header('Location: Views/WebPages/home_productor.php');
    }

}

?>
