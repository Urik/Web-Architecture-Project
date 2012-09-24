<?php

require_once "Views/UserView.php";

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ProductorView
 *
 * @author Usuario
 */
class ProductorView extends UserView {
    public function showHome() {
        header('Location: Views/WebPages/home_productor.php');
    }

}

?>
