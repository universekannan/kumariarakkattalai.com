 <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
   <!--   <img src="uploads/logo/sjei-logo.jpg" alt="Services Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">-->
      <span class="brand-text font-weight-light">Services</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
		      <li class="nav-item">
            <a href="dashboard.php" class="nav-link <?php if($page=="Dashboard") echo "active"; ?>">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>	
	      <li class="nav-item">
            <a href="donors.php" class="nav-link <?php if($page=="View Donors") echo "active"; ?>">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Manage Donors
              </p>
            </a>
          </li>
		  
		  
          <?php if($_SESSION['user_type']=="Admin"){ ?>

           <li class="nav-item has-treeview  <?php if($page=="Bloods") echo "menu-open"; ?>">
            <a href="" class="nav-link <?php if($page=="Bloods") echo "active"; ?>">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Manage Bloods
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="add-blood.php" class="nav-link <?php if($page1=="Add Blood") echo "active"; ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Blood</p>
                </a>
              </li>
              <li class="nav-item">
			    <a href="view-bloods.php" class="nav-link <?php if($page1=="View Blood") echo "active"; ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Bloods</p>
                </a>
              </li>
            </ul>
          </li>
         <li class="nav-item has-treeview  <?php if($page=="Matching") echo "menu-open"; ?>">
            <a href="" class="nav-link <?php if($page=="Matching") echo "active"; ?>">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Manage Matching
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="add-matching.php" class="nav-link <?php if($page1=="Add Matching") echo "active"; ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Matching</p>
                </a>
              </li>
              <li class="nav-item">
          <a href="matching.php" class="nav-link <?php if($page1=="View Matching") echo "active"; ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Matching</p>
                </a>
              </li>
            </ul>
          </li>     
		  <li class="nav-item">
            <a href="citys.php" class="nav-link <?php if($page=="View Citys") echo "active"; ?>">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Manage Citys
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview  <?php if($page=="Postarea") echo "menu-open"; ?>">

            <a href="" class="nav-link <?php if($page=="Postarea") echo "active"; ?>">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Manage Postarea
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="add-postarea.php" class="nav-link <?php if($page1=="Add Postarea") echo "active"; ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Postarea</p>
                </a>
              </li>
              <li class="nav-item">
          <a href="postarea.php" class="nav-link <?php if($page1=="View Postarea") echo "active"; ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Postarea</p>
                </a>
              </li>
            </ul>
          </li>  
		   <li class="nav-item has-treeview  <?php if($page=="Events") echo "menu-open"; ?>">
            <a href="" class="nav-link <?php if($page=="Events") echo "active"; ?>">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Manage Events
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="add-event.php" class="nav-link <?php if($page1=="Add Event") echo "active"; ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Event</p>
                </a>
              </li>
              <li class="nav-item">
          <a href="events.php" class="nav-link <?php if($page1=="View Events") echo "active"; ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Events</p>
                </a>
              </li>
            </ul>
          </li>  
		  
		  <li class="nav-item has-treeview  <?php if($page=="Users") echo "menu-open"; ?>">
            <a href="" class="nav-link <?php if($page=="Users") echo "active"; ?>">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Manage Users
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="add-user.php" class="nav-link <?php if($page1=="Add User") echo "active"; ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add user</p>
                </a>
              </li>
              <li class="nav-item">
          <a href="contact.php" class="nav-link <?php if($page1=="View Contact") echo "active"; ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Contact</p>
                </a>
              </li>
			  <li class="nav-item">
          <a href="users.php" class="nav-link <?php if($page1=="View Users") echo "active"; ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View users</p>
                </a>
              </li>
            </ul>
          </li>  
          <li class="nav-item">
            <a href="backup.php" class="nav-link <?php if($page=="Backup") echo "active"; ?>">
              <i class="nav-icon fas fa-database"></i>
              <p>
                Backup Database
              </p>
            </a>
          </li>
           <?php } ?>  
	  
          <li class="nav-item has-treeview  <?php if($page=="Profile") echo "menu-open"; ?>">
            <a href="" class="nav-link <?php if($page=="Profile") echo "active"; ?>">
              <i class="nav-icon fas fa-user-circle"></i>
              <p>
                <?php echo $_SESSION['full_name']; ?>
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <?php if($_SESSION['user_type']=="Admin"){ ?>
                <li class="nav-item">
                <a href="profile.php" class="nav-link <?php if($page1=="Profile") echo "active"; ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Profile</p>
                </a>
              </li>
              <?php } ?>  
              <li class="nav-item">
                <a href="password.php" class="nav-link <?php if($page1=="Change Password") echo "active"; ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Change Password</p>
                </a>
              </li>
			  <li class="nav-item">
                <a href="https://remotedesktop.google.com/support/" target="_blank" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Screen Share</p>
                </a>
              </li>
              <li class="nav-item">
			    <a href="logout.php" class="nav-link <?php if($page1=="Logout") echo "active"; ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Logout</p>
                </a>
              </li>
            </ul>
          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>