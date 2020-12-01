
<div class="wrapper">

<header class="main-header">
  <!-- Logo -->
  <a href="#" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini"><b>SGI</b></span>
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg"><b>SIGAWAI</b> PANEL</span>
  </a>
  <!-- Header Navbar: style can be found in header.less -->
  <nav class="navbar navbar-static-top">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </a>
    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">
        <!-- User Account: style can be found in dropdown.less -->
        <li class="dropdown user user-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <img src="<?= base_url('assets/'); ?>dist/img/avatar8.png" class="user-image" alt="User Image">
            <span class="hidden-xs"><?= $user['name'] ?></span>
          </a>
          <ul class="dropdown-menu">
            <!-- User image -->
            <li class="user-header">
              <img src="<?= base_url('assets/'); ?>dist/img/avatar8.png" class="img-circle" alt="User Image">

              <p>
                Hello, <?= $user['name']; ?>
                <small>Member since <?= date('d M Y',$user['created_at']); ?></small>
              </p>
            </li>
            
            <!-- Menu Footer-->
            <li class="user-footer">
              <div class="pull-left">
                
              </div>
              <div class="pull-right">
                <a href="<?= base_url('auth/logout'); ?>" class="btn btn-default btn-flat">Sign out</a>
              </div>
            </li>
          </ul>
        </li>
        <!-- Control Sidebar Toggle Button -->
        <li>
          <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
        </li>
      </ul>
    </div>
  </nav>
</header>