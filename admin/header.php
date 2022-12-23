 <nav class="main-header navbar navbar-expand navbar-white navbar-light">
<ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
	<ul class="navbar-nav">
       <center>Home</center>
    </ul>
    

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
     
		 <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-user"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header"><?php echo $_SESSION['full_name']; ?></span>
          <div class="dropdown-divider"></div>
            <a href="password.php" class="nav-link <?php if($page1=="My Profile") echo "active"; ?>"></i> Change Password</a>
						          <div class="dropdown-divider"></div>
            <a href="logout.php" class="nav-link <?php if($page1=="Logout") echo "active"; ?>"></i>Logout</a>
            <!--<span class="float-right text-muted text-sm">3 mins</span>-->
          <div class="dropdown-divider"></div>
        </div>
      </li>
      </li>
    </ul>
  </nav>
  