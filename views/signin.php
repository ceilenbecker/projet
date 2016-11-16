<div class="row">
	<div class="col-md-2 col-sm-2 col-xs-0"></div>
	<div class="col-md-8 col-sm-8 col-xs-12">
		<div class="page-header">
  			<h1>Sign in</h1>
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
				<input type="email" class="form-control" name="emailLoginToto" value="" placeholder="Email address" /><br />
				<input type="password" class="form-control" name="passwordLoginToto1" value="" placeholder="Your password" /><br />
				<input type="submit" class="btn btn-success btn-block" value="Sign in" />
			</fieldset>
		</form>
	</div>
	<div class="col-md-2 col-sm-2 col-xs-0"></div>
</div>
<br />
<br />