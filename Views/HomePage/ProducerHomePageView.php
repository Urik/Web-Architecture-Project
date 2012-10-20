<?php
if (!isset($_SESSION)) {
    session_start();
}

class ProducerHomePageView extends HomePageView {
    public function showHome($parameters) {
        $_SESSION["parameters"] = $parameters;
        $_SESSION["model"] = $this->getController()->getModel();
        header("Location:Views/WebPages/home_productor.php");
    }
}

?>