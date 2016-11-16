<?php

require 'inc/config.php';

$studentListe = array();

// Gestion offset pour pagination
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
$traId = isset($_GET['id']) ? intval($_GET['id']) : 0;
// Je récupère le mot recherché
$search = isset($_GET['q']) ? trim($_GET['q']) : '';
$displayPagination = true;
$nbParPage = 5;
$offset = ($page - 1) * $nbParPage;

$sql = '
	SELECT stu_id, stu_lname, stu_fname, cou_name, stu_email, cit_name, stu_friendliness, stu_age
	FROM student
	LEFT OUTER JOIN city ON city.cit_id = student.city_cit_id
	LEFT OUTER JOIN country ON country.cou_id = city.country_cou_id
';
//echo $sql;exit;
if (!empty($traId)) {
	$sql .= ' WHERE training_tra_id = :traID';
}
if (!empty($search)) {
	$displayPagination = false;
	$sql .= '
		WHERE stu_lname LIKE :search
		OR stu_fname LIKE :search
		OR stu_email LIKE :search
		OR cit_name LIKE :search
		OR cou_name LIKE :search
		OR stu_age LIKE :search
	';
}
if ($displayPagination) {
	$sql .= '
		LIMIT '.$nbParPage.' OFFSET '.$offset.'
	';
}
$sth = $pdo->prepare($sql);

if (!empty($traId)) {
	$sth->bindValue(':traID', intval($traId), PDO::PARAM_INT);
}
if (!empty($search)) {
	// Important !!! mettre les % dans le bind !!
	$sth->bindValue(':search', '%'.$search.'%', PDO::PARAM_STR);
}

if ($sth->execute() === false) {
	print_r($sth->errorInfo());
}
else {
	$studentListe = $sth->fetchAll();
}

// Je récupère des informations sur la session
if (!empty($_GET['id'])) {
	$sql = '
		SELECT tra_start_date, tra_end_date, loc_name
		FROM training
		INNER JOIN location ON location.loc_id = training.location_loc_id
		WHERE tra_id = :traId
	';
	$sth = $pdo->prepare($sql);

	$sth->bindValue(':traId', intval($_GET['id']), PDO::PARAM_INT);

	if ($sth->execute() === false) {
		print_r($pdo->errorInfo());
	}
	else {
		$trainingInfos = $sth->fetch();
	}
}

// VIEW
require 'views/header.php';
require 'views/list.php';
require 'views/footer.php';