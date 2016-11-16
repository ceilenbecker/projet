<?php
require 'inc/config.php';

$errorList = array();
$successList = array();

// Formulaire soumis
if (!empty($_POST)) {
	$emailLoginToto = isset($_POST['emailLoginToto']) ? trim($_POST['emailLoginToto']) : '';
	$passwordLoginToto1 = isset($_POST['passwordLoginToto1']) ? trim($_POST['passwordLoginToto1']) : '';

	$formOk = true;
	if (strlen($passwordLoginToto1) < 8) {
		$errorList[] = 'Le password doit contenir au moins 8 caractères<br>';
		$formOk = false;
	}
	if (empty($emailLoginToto)) {
		$errorList[] = 'Email est vide<br>';
		$formOk = false;
	}
	else if (!filter_var($emailLoginToto, FILTER_VALIDATE_EMAIL)) {
		$errorList[] = 'Email invalide<br>';
		$formOk = false;
	}

	if ($formOk) {
		if (checkLoginPasswordToto($emailLoginToto, $passwordLoginToto1)) {
			$successList[] = 'Login OK<br>';
		}
		else {
			$errorList[] = 'Email ou mot de passe inconnus<br>';
		}
	}
}

// VIEW
require 'views/header.php';
require 'views/signin.php';
require 'views/footer.php';