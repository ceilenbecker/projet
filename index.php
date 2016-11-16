<?php

<<<<<<< HEAD
require '../inc/config.php';
=======
echo 'ALL YOUR BASE ARE BELONG TO US !!!';

require 'inc/config.php';
>>>>>>> 357c7bdb6ca902a5dcf74149a9284b79558646e2

echo 'ben';

$sql = '
	SELECT tra_id, tra_start_date, tra_end_date, loc_name, count(*) as nb
	FROM student
	LEFT OUTER JOIN location ON location.loc_id = training.location_loc_id
	LEFT OUTER JOIN student ON student.training_tra_id = training.tra_id
	GROUP BY tra_id, tra_start_date, tra_end_date, loc_name
	ORDER BY tra_start_date ASC
';
$sth = $pdo->prepare($sql);

if ($sth !== false) {
	$tmpTrainingList = $sth->fetchAll(PDO::FETCH_ASSOC);

	// Je génère un tableau formaté, avec la liste pour chaque lieu
	foreach ($tmpTrainingList as $currentTraining) {
		$trainingList[$currentTraining['tra_end_date']][] = $currentTraining;
	}
}
else {
	print_r($pdo->errorInfo());
	echo "toto";
}

// VIEW
require 'views/header.php';
require 'views/home.php';
//require 'views/footer.php';