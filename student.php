<?php

require 'inc/config.php';

$stuID = isset($_GET['id']) ? intval($_GET['id']) : 0;
$studentInfos = array();

$sql = '
	SELECT stu_id, stu_lname, stu_fname, cou_name, stu_email, cit_name, stu_friendliness, stu_age, tra_start_date, tra_end_date, loc_name
	FROM student
	LEFT OUTER JOIN city ON city.cit_id = student.city_cit_id
	LEFT OUTER JOIN country ON country.cou_id = city.country_cou_id
	LEFT OUTER JOIN training ON training.tra_id = student.training_tra_id
	LEFT OUTER JOIN location ON location.loc_id = training.location_loc_id
	WHERE stu_id = :stuId
';
$sth = $pdo->prepare($sql);
$sth->bindValue(':stuId', $stuID, PDO::PARAM_INT);

if ($sth->execute() === false) {
	print_r($pdo->errorInfo());
}
else {
	$studentInfos = $sth->fetch();
}


// VIEW
require 'views/header.php';
require 'views/student.php';
require 'views/footer.php';