<nav class="navbar navbar-expand-lg navbar-dark bg-default fixed-top" id="mainNav">
    <a class="navbar-brand" href="index.php"><img src="img/2.png" data-retina="true" alt="" width="163" height="36"></a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="index.php">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">Dashboard</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="My profile">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseProfile" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-wrench"></i>
            <span class="nav-link-text">Commodities</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseProfile">
            <li>
              <a href="commodities.php?action=addCommodity">AddCommodity</a>
            </li>
			<li>
              <a href="commodities.php">viewAllCommodities</a>
            </li>
          </ul>
        </li>
		<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Messages">
          <a class="nav-link" href="categories.php">
            <i class="fa fa-fw fa-envelope-open"></i>
            <span class="nav-link-text">Categories</span>
          </a>
        </li>
		<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Bookings">
          <a class="nav-link" href="comments.php?action=viewAllComments">
            <i class="fa fa-fw fa-archive"></i>
            <span class="nav-link-text">Comments <span class="badge badge-pill badge-primary">6 New</span></span>
          </a>
        </li>
		
	<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-gear"></i>
            <span class="nav-link-text">Users</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseComponents">
            <li>
              <a href="users.php">ViewAllUsers</a>
            </li>
			<li>
              <a href="users.php?action=addUser">AddUsers</a>
            </li>
          </ul>
        </li>
		<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Add listing">
          <a class="nav-link" href="add-listing.html">
            <i class="fa fa-fw fa-plus-circle"></i>
            <span class="nav-link-text">Profile</span>
          </a>
        </li>
        
		
      </ul>
      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul>
      
      
      <ul class="navbar-nav ml-auto">
        
      <li class="nav-item">
          <a href="../index.php" class="nav-link">
            <i class="fa fa-fw"></i>Home Page</a>
        </li>
        <!-- Logout -->
        <li class="nav-item">
          <a href="../includes/logout.php" class="nav-link" data-toggle="modal" data-target="#exampleModal">
            <i class="fa fa-fw fa-sign-out"></i>Logout</a>
        </li>
      </ul>
      
    </div>
  </nav>