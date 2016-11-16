<?php foreach ($trainingList as $currentLocation=>$locationTrainingList) : ?>
<div class="panel panel-primary">
  <!-- Default panel contents -->
  <div class="panel-heading"><?= $currentLocation ?></div>
  <div class="panel-body">
  
	Liste des sessions de formation webforce3 à <?= $currentLocation ?>
  </div>
  <!-- Table -->
  <table class="table">
  <thead>
  	<tr>
      <th>ID</th>
  		<th>Début</th>
      <th>Fin</th>
  		<th>Effectif</th>
  	</tr>
  </thead>
  <tbody>
  <?php foreach ($locationTrainingList as $currentTraining) : ?>
  	<tr>
  		<td><a href="list.php?id=<?= $currentTraining['tra_id'] ?>"><?= $currentTraining['tra_id'] ?></a></td>
  		<td><a href="list.php?id=<?= $currentTraining['tra_id'] ?>"><?= $currentTraining['tra_start_date'] ?></a></td>
      <td><a href="list.php?id=<?= $currentTraining['tra_id'] ?>"><?= $currentTraining['tra_end_date'] ?></a></td>
  		<td><a href="list.php?id=<?= $currentTraining['tra_id'] ?>"><?= $currentTraining['nb'] ?></a></td>
  	</tr>
  <?php endforeach; ?>
  </tbody>
  </table>
</div>
<?php endforeach; ?>