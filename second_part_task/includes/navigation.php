<!-- Nav Bar-->

<header id="topnav">
	<div class="topbar-main">
		<div class="container">
		
			<!-- Logo container-->
			<div class="logo"><a href="index.html" class="logo"><span>To-Do List Task</span></a></div>		
			<!-- End Logo container-->
			<div class="menu-extras">
				<ul class="nav navbar-nav navbar-right pull-right">
					<li class="navbar-c-items">                            
                        <a style="padding-right: 0px"><?php if($user->isLoggedIn()) { echo $user->getFullName(); } ?></a>                  
                    </li>    
					<li class="dropdown navbar-c-items">
						<a href="#" class="dropdown-toggle waves-effect waves-light profile" data-toggle="dropdown" aria-expanded="true"><img src="assets/images/avatar.png" alt="user-img" class="img-circle"> </a>
						<ul class="dropdown-menu">
							<li><a href="#"><i class="ti-user text-custom m-r-10"></i> Profile</a></li> 
							<li class="divider"></li>
							<li><a href="logout.php"><i class="ti-power-off text-danger m-r-10"></i> Logout</a></li>
						</ul>
					</li>
				</ul>
				<div class="menu-item">
					<!-- Mobile menu toggle-->
					<a class="navbar-toggle">
						<div class="lines">
							<span></span>
							<span></span>
							<span></span>
						</div>
					</a>
					<!-- End mobile menu toggle-->
				</div>
			</div>
		</div>
	</div>
	<div class="navbar-custom">
		<div class="container">
			<div id="navigation">
				<!-- Nav Menu -->
				<ul class="navigation-menu">
					<li class="has-submenu"><a href="index.php"><i class="fa fa-home"></i>Dashboard</a></li>					
					<li class="has-submenu"><a href="lists.php"><i class="fa fa-tasks"></i>To-Do</a><li>
				</ul>
				<!-- End Nav Menu -->
			</div>
		</div> 		
	</div> 
</header>
<!-- End Nav Bar-->