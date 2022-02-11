	<!--sidebar wrapper -->
		<div class="sidebar-wrapper" data-simplebar="true">
			<div class="sidebar-header">
				<div>
					<img src="<?php echo base_url() ?>assets/admin/images/logo-icon.png" class="logo-icon" alt="logo icon">
				</div>
				<div>
					<h4 class="logo-text">Gamenow</h4>
				</div>
				
			</div>
			<!--navigation-->
			<ul class="metismenu" id="menu">
				
				<li class="menu-label">Navigation</li>
				
				<li>
					<a href="<?php echo site_url('Admin/Dashboard') ?>">
						<div class="parent-icon"><i class='bx bx-home-circle'></i></div>
						<div class="menu-title">Dashboard</div>
					</a>
				</li>
				
				<li>
					<a href="<?php echo site_url('Admin/Partners') ?>">
						<div class="parent-icon"><i class='bx bx-group'></i></div>
						<div class="menu-title">Manage Partners</div>
					</a>
				</li>
				
				<li>
					<a href="<?php echo site_url('Admin/Games') ?>">
						
						<div class="font-22"><i class="lni lni-game"></i></div>
						<div class="menu-title">Manage Games</div>
					</a>
				</li>
				
				<li>
					<a href="<?php echo site_url('Admin/Tournaments') ?>">
						
						<div class="font-22"><i class="lni lni-game"></i></div>
						<div class="menu-title">Manage Tournaments</div>
					</a>
				</li>
                                
                                <li>
					<a href="<?php echo site_url('Admin/Advertisements') ?>">
						
						<div class="font-22"><i class="lni lni-game"></i></div>
						<div class="menu-title">Manage Advertisements</div>
					</a>
				</li>
				
				<li>
					<a href="<?php echo site_url('admin/logout') ?>">
						<div class="parent-icon"><i class="bx bx-log-out-circle"></i>
						</div>
						<div class="menu-title">Logout</div>
					</a>
				</li>
				
			</ul>
			<!--end navigation-->
		</div>
		<!--end sidebar wrapper -->
		
		<!--start header -->
		<header>
			<div class="topbar d-flex align-items-center">
				<nav class="navbar navbar-expand">
					<div class="mobile-toggle-menu"><i class='bx bx-menu'></i>
					</div>
					<div class="search-bar flex-grow-1">
						<div class="position-relative search-bar-box">
							<input type="text" class="form-control search-control" placeholder="Type to search..."> <span class="position-absolute top-50 search-show translate-middle-y"><i class='bx bx-search'></i></span>
							<span class="position-absolute top-50 search-close translate-middle-y"><i class='bx bx-x'></i></span>
						</div>
					</div>
					
					<div class="user-box dropdown">
						<a class="d-flex align-items-center nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
							<img src="<?php echo base_url() ?>assets/admin/images/avatars/avatar-2.png" class="user-img" alt="user avatar">
							<div class="user-info ps-3">
								<p class="user-name mb-0"> <?php echo $this->session->userdata('name') ?> </p>
								<p class="designattion mb-0"> (<?php echo $this->session->userdata('access') ?>) </p>
							</div>
						</a>
						<ul class="dropdown-menu dropdown-menu-end">
							<li>
								<a class="dropdown-item" href="<?php echo site_url('Admin/UpdatePassword') ?>"><i class="bx bx-user"></i><span>Profile</span></a>
							</li>
							<li>
								<a class="dropdown-item" href="<?php echo site_url('Admin/UpdatePassword') ?>"><i class="bx bx-cog"></i><span>Settings</span></a>
							</li>
							
							<li>
								<div class="dropdown-divider mb-0"></div>
							</li>
							<li><a class="dropdown-item" href="<?php echo site_url('admin/logout') ?>"><i class='bx bx-log-out-circle'></i><span>Logout</span></a>
							</li>
						</ul>
					</div>
				</nav>
			</div>
		</header>
		<!--end header -->
		
		