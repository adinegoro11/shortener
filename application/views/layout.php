<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="<?= base_url();?>dist/icon.png">

    <title>URL Shortener</title>

    <!-- Bootstrap core CSS -->
    <link href="<?= base_url();?>dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?= base_url();?>dist/css/navbar-fixed-top.css" rel="stylesheet">

    <!-- dataTables -->
    <link href="<?= base_url();?>dist/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <script src="<?= base_url();?>dist/js/jquery.min.js"></script>
    <script src="<?= base_url();?>dist/js/jquery.dataTables.min.js"></script>
    <script src="<?= base_url();?>dist/js/dataTables.bootstrap.min.js"></script>

  </head>

  <body>
    <?php $this->load->view('topmenu'); ?>

    <div class="container">
        <?php $this->load->view($isi); ?>
    </div> <!-- /container -->

    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="<?= base_url();?>dist/js/bootstrap.min.js"></script>

  </body>
</html>
