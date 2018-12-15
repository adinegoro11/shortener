<!-- Fixed navbar -->
<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">

    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Shortener</a>
    </div>

    <div id="navbar" class="navbar-collapse collapse">
      <ul class="nav navbar-nav">
        <li><a href="<?= base_url().'link/index';?>">Home</a></li>
        <li><a href="<?= base_url().'link/hitung';?>">Dashboard</a></li>
      </ul>

      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Profile <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="<?= base_url()."user/index";?>"><?= $this->session->userdata('username');?></a></li>
            <li role="separator" class="divider"></li>
            <li><a href="<?= base_url()."login/logout";?>">Sign Out</a></li>
          </ul>
        </li>
      </ul>

</div><!--/.nav-collapse -->
</div>
</nav>
