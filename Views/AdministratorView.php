<?php

require_once "UserView.php";

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AdministratorView
 *
 * @author Usuario
 */
class AdministratorView extends UserView {

    public function showHome() {
        parent::showHome();
        include './WebPages/home_admin.php';
    }

}

?>
