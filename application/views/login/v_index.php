<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Login</title>

    <!-- Bootstrap core CSS -->
    <link href="<?= base_url();?>dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?= base_url();?>dist/css/signin.css" rel="stylesheet">

  </head>

  <body>

    <div class="container">

      <form class="form-signin" action="<?= base_url().'login/index'; ?>" method="POST">
        <h2 class="form-signin-heading">Please sign in</h2>
        <label for="inputEmail" class="sr-only">Username</label>
        <input type="text" name="username" class="form-control" placeholder="Username" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" name="password" class="form-control" placeholder="Password" required>
        <?php if($this->session->flashdata('login') == 1){ ?>
        <div class="checkbox">
         <span id="helpBlock" class="help-block">Invalid username or password</span>
        </div>
        <?php } ?>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
        <a href="<?= base_url().'user/sign_up';?>" class="btn btn-lg btn-default btn-block">Sign Up</a> 
      </form>

    </div> <!-- /container -->

  </body>
</html>
