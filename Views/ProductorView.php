<?php

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
        parent::showHome();
        header('Location" ./WebPages/home_productor');
    }

}

?>
