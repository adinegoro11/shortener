<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Sign Up</title>

    <!-- Bootstrap core CSS -->
    <link href="<?= base_url();?>dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?= base_url();?>dist/css/signin.css" rel="stylesheet">

  </head>

  <body>

    <div class="container">

	<form class="form-signin" action="<?= base_url().'user/sign_up'; ?>" method="POST">
		<h2 class="form-signin-heading">Sign Up</h2>

		<label for="inputEmail" class="sr-only">Username</label>
		<input type="text" name="username" class="form-control" placeholder="Username" required autofocus>
		
		<label for="inputPassword" class="sr-only">Password</label>
		<input type="password" name="password" class="form-control" placeholder="Password" required>

		<label for="pass2" class="sr-only">Password Re-type</label>
		<input type="password" name="pass2" class="form-control" placeholder="Password Re-type" required>

		<div class="checkbox">
			<span id="helpBlock" class="help-block"><?= validation_errors() ?></span>
		</div>
		
		<button class="btn btn-lg btn-primary btn-block" type="submit">Sign Up</button>
	</form>

    </div> <!-- /container -->

  </body>
</html>
