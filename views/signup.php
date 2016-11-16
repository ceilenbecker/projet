<div class="row">
	<div class="col-md-2 col-sm-2 col-xs-0"></div>
	<div class="col-md-8 col-sm-8 col-xs-12">
		<div class="page-header">
  			<h1>Sign up</h1>
		</div>
		<?php if (sizeof($errorList) > 0) : ?>
		<?php foreach ($errorList as $currentError) : ?>
			<div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<?= $currentError ?></div>
		<?php endforeach; ?>
		<?php endif; ?>
		<?php if (sizeof($successList) > 0) : ?>
		<?php foreach ($successList as $currentSuccess) : ?>
			<div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<?= $currentSuccess ?></div>
		<?php endforeach; ?>
		<?php endif; ?>
		<form action="" method="post">
			<fieldset>
				<input type="email" class="form-control" name="emailToto" value="<?= $emailToto ?>" placeholder="Email address" /><br />
				<input type="password" class="form-control" name="passwordToto1" value="" placeholder="Your password" /><br />
				<input type="password" class="form-control" name="passwordToto2" value="" placeholder="Confirm your password" /><br />
				<input type="submit" class="btn btn-success btn-block" value="Sign up" />
			</fieldset>
		</form>
	</div>
	<div class="col-md-2 col-sm-2 col-xs-0"></div>
</div>
<br /><br />