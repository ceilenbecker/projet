<?php
function getSympathieTexte($idSympathie) {
	$sympathieList = array(
		1 => 'Pas sympa',
		2 => 'Assez sympa',
		3 => 'Sympa',
		4 => 'Très sympa',
		5 => 'Génial',
	);
	if (array_key_exists($idSympathie, $sympathieList)) {
		return $sympathieList[$idSympathie];
	}
	return '-';
}

function checkLoginPasswordToto($emailToto, $passwordToto) {
	global $pdo; // Récupère une variable globale (=hors fonctions)

	$retour = false;

	$sql = '
		SELECT *
		FROM user
		WHERE usr_email = :email
		LIMIT 1
	';
	$pdoStatement = $pdo->prepare($sql);
	$pdoStatement->bindValue(':email', $emailToto);

	if ($pdoStatement->execute() === false) {
		print_r($pdoStatement->errorInfo());
	}
	else {
		if ($pdoStatement->rowCount() > 0) {
			$resList = $pdoStatement->fetch();
			$hashedPassword = $resList['usr_password'];

			// Je vérifie le mot de passe
			if (password_verify($passwordToto, $hashedPassword)) {
				$retour = true;
				// Ajouter le code pour mettre l'id en session
				$_SESSION['userID'] = $resList['usr_id'];
				putUserInSession($_SESSION['userID']);
			}
		}
	}

	return $retour;
}

function putUserInSession($userID) {
	global $pdo;

	$sql = '
		SELECT *
		FROM user
		WHERE usr_id = :id
		LIMIT 1
	';
	$pdoStatement = $pdo->prepare($sql);
	$pdoStatement->bindValue(':id', $userID);

	if ($pdoStatement->execute() === false) {
		print_r($pdoStatement->errorInfo());
	}
	else {
		if ($pdoStatement->rowCount() > 0) {
			$_SESSION['user'] = $pdoStatement->fetch(PDO::FETCH_ASSOC);
			unset($_SESSION['user']['usr_password']);
		}
	}
}