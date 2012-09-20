<?php
require_once("user.php");
require_once("LoginModel.php");

function showNotLoggedInView() {
	require("NotLoggedInView.php");
}

function showLoggedInView($user) {
	require("LoggedInView.php");
}

if (isset($_POST["name"]) && isset($_POST["family_name"])) {
    
	$model = new LoginModel();
	$user = $model->getUser($_POST["name"], $_POST["family_name"]);
	if (!is_null($user)) {
		showLoggedInView($user);
		return;
	}
}
showNotLoggedInView();
?>