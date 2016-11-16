<div class="page-header">
  <h1>Ajout d'un étudiant <small>dans la DB Webforce3</small></h1>
</div>

<div class="row">
	<div class="col-md-2 col-sm-2 col-xs-0"></div>
	<div class="col-md-8 col-sm-8 col-xs-12">
		<form action="" method="post" enctype="multipart/form-data">
			<fieldset>
				<input type="text" class="form-control" name="studentName" value="" placeholder="Nom"><br />
				<input type="text" class="form-control" name="studentFirstname" value="" placeholder="Prénom"><br />
				<input type="email" class="form-control" name="studentEmail" value="" placeholder="E-mail"><br />
				<input type="date" class="form-control" name="studentBirhtdate" value="" placeholder="Date de naissance (aaaa-mm-jj)"><br />
				Ville de résidence :<br />
				<select name="cit_id" class="form-control">
					<option value="0">choisissez :</option>
					<?php foreach ($citiesList as $key=>$value) :?>
					<option value="<?= $key ?>"><?= $value ?></option>
					<?php endforeach; ?>
				</select><br />
				Nationalité :<br />
				<select name="cou_id" class="form-control">
					<option value="0">choisissez :</option>
					<?php foreach ($countriesList as $key=>$value) :?>
					<option value="<?= $key ?>"><?= $value ?></option>
					<?php endforeach; ?>
				</select><br />
				Sympathie :<br />
				<select name="stu_friendliness" class="form-control">
					<option value="">choisissez :</option>
					<?php foreach ($friendlinessList as $key=>$value) :?>
					<option value="<?= $key ?>"><?= $value ?></option>
					<?php endforeach; ?>
				</select><br />
				<input type="submit" class="btn btn-primary btn-block" value="Valider"><br />
			</fieldset>
		</form>
	</div>
	<div class="col-md-2 col-sm-2 col-xs-0"></div>
</div>