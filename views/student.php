<div class="panel panel-primary">
  <!-- Default panel contents -->
  <div class="panel-heading">Student</div>
  <div class="panel-body">
    <p><?= $studentInfos['stu_fname'] ?> <?= $studentInfos['stu_lname'] ?> participe à la session <?= $studentInfos['loc_name'] ?> commencant le <?= $studentInfos['tra_start_date'] ?> et terminant le <?= $studentInfos['tra_end_date'] ?>.</p>
  </div>
  
  <!-- List group -->
  <ul class="list-group">
    <li class="list-group-item">Nom : <?= $studentInfos['stu_lname'] ?></li>
    <li class="list-group-item">Prénom : <?= $studentInfos['stu_fname'] ?></li>
    <li class="list-group-item">Email : <?= $studentInfos['stu_email'] ?></li>
    <li class="list-group-item">Age : <?= $studentInfos['stu_age'] ?></li>
    <li class="list-group-item">Sympathie : <?= getSympathieTexte($studentInfos['stu_friendliness']) ?></li>
    <li class="list-group-item">Ville : <?= $studentInfos['cit_name'] ?></li>
    <li class="list-group-item">Pays : <?= $studentInfos['cou_name'] ?></li>
  </ul>
</div>