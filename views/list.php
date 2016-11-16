<?php if (isset($trainingInfos)) : ?>
  <div class="well">
    Session de formation à <?= $trainingInfos['loc_name'] ?> du <?= $trainingInfos['tra_start_date'] ?> au <?= $trainingInfos['tra_end_date'] ?>.
  </div>
<?php endif; ?>

<div class="panel panel-primary">
  <!-- Default panel contents -->
  <div class="panel-heading">Liste des étudiants</div>
  
  <!-- Table -->
  <table class="table">
    <thead>
      <tr>
        <th>Nom</th>
        <th>Prénom</th>
        <th>Ville</th>
        <th>Pays</th>
      </tr>
    </thead>
    <tbody>
<?php foreach ($studentListe as $currentEtudiant) : ?>
      <tr>
        <td><a href="student.php?id=<?= $currentEtudiant['stu_id'] ?>"><?= $currentEtudiant['stu_lname'] ?></a></td>
        <td><?= $currentEtudiant['stu_fname'] ?></td>
        <td><?= $currentEtudiant['cit_name'] ?></td>
        <td><?= $currentEtudiant['cou_name'] ?></td>
      </tr>
<?php endforeach; ?>
    </tbody>
  </table>
</div>

<?php if ($displayPagination) : ?>
<nav aria-label="Page navigation">
  <ul class="pager">
    <?php if ($page-1>0) : ?>
    <li class="previous"><a href="list.php?page=<?= $page-1?>&id=<?= $traId ?>"><span aria-hidden="true">&larr;</span> Previous</a></li>
    <?php endif; ?>
    <?php if (sizeof($studentListe)>=$nbParPage) : ?>
    <li class="next"><a href="list.php?page=<?= $page+1?>&id=<?= $traId ?>">Next <span aria-hidden="true">&rarr;</span></a></li>
    <?php endif; ?>
  </ul>
</nav>
<?php endif; ?>

<br />