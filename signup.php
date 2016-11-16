<?php

require 'inc/config.php';

// J'initialise les variables
$emailToto = '';
$errorList = array();
$successList = array();

// Formulaire soumis
if (!empty($_POST)) {
	print_r($_POST);
	
	$emailToto = isset($_POST['emailToto']) ? trim($_POST['emailToto']) : '';
	$passwordToto1 = isset($_POST['passwordToto1']) ? trim($_POST['passwordToto1']) : '';
	$passwordToto2 = isset($_POST['passwordToto2']) ? trim($_POST['passwordToto2']) : '';

	$formOk = true;
	if ($passwordToto1 != $passwordToto2) {
		$errorList[] = 'Le mot de passe n\'est pas identique<br>';
		$formOk = false;
	}
	if (strlen($passwordToto1) < 8) {
		$errorList[] = 'Le password doit contenir au moins 8 caractères<br>';
		$formOk = false;
	}
	if (empty($emailToto)) {
		$errorList[] = 'Email est vide<br>';
		$formOk = false;
	}
	else if (!filter_var($emailToto, FILTER_VALIDATE_EMAIL)) {
		$errorList[] = 'Hahah banane<br>';
		$formOk = false;
	}

	if ($formOk) {
		$successList[] = 'OK<br>TODO insérer en DB<br>';

		$sql = '
			INSERT INTO user (usr_email, 
usr_password) VALUES (:email, :password)
		';
		$pdoStatement = $pdo->prepare($sql);
		$pdoStatement->bindValue(':email', $emailToto);
		//$pdoStatement->bindValue(':password', md5($passwordToto1)); // md5 simple
		//$pdoStatement->bindValue(':password', md5($passwordToto1.'jhdvb9l78!okcvnflk')); // md5 + salt
		$pdoStatement->bindValue(':password', password_hash($passwordToto1, PASSWORD_BCRYPT)); // password_hash

		if ($pdoStatement->execute() === false) {
			print_r($pdoStatement->errorInfo());
		}
		else {
			// Mettre en session l'ID du user
			$_SESSION['userID'] = $pdo->lastInsertId();
			putUserInSession($_SESSION['userID']);

			header('Location: signup.php');
		}
	}
}

// VIEW
require 'views/header.php';
require 'views/signup.php';
require 'views/footer.php';