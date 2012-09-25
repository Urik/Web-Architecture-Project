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
        header('Location: Views/WebPages/home_productor.php');
    }

}

?>
