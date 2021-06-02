<!-- Page content -->
	<div class="page-content">

		<!-- Main sidebar -->
		<div class="sidebar sidebar-light sidebar-main sidebar-expand-md">

			<!-- Sidebar mobile toggler -->
			<div class="sidebar-mobile-toggler text-center">
				<a href="#" class="sidebar-mobile-main-toggle">
					<i class="icon-arrow-left8"></i>
				</a>
				<span class="font-weight-semibold">Navigation</span>
				<a href="#" class="sidebar-mobile-expand">
					<i class="icon-screen-full"></i>
					<i class="icon-screen-normal"></i>
				</a>
			</div>
			<!-- /sidebar mobile toggler -->


			<!-- Sidebar content -->
			<div class="sidebar-content">

				<!-- User menu -->
				<div class="sidebar-user-material">
					<div class="sidebar-user-material-body bg-success">
						<div class="card-body text-center">
							<a href="#">
								<img src="<?= base_url(); ?>global_assets/images/placeholders/placeholder.jpg" class="img-fluid rounded-circle shadow-1 mb-3" width="80" height="80" alt="">
							</a>
							<h6 class="mb-0 text-white text-shadow-dark"><?= $this->session->userdata("Nama") ?></h6>
							<span class="font-size-sm text-white text-shadow-dark"><?= $this->session->userdata("Email") ?></span>
						</div>
													
						<div class="sidebar-user-material-footer">
							<a href="#user-nav" class="d-flex justify-content-between align-items-center text-shadow-dark dropdown-toggle" data-toggle="collapse"><span>Pengaturan Akun</span></a>
						</div>
					</div>

					<div class="collapse" id="user-nav">
						<ul class="nav nav-sidebar">
							<li class="nav-item">
								<a href="<?= base_url(); ?>Auth/logout" class="nav-link">
									<i class="icon-switch2"></i>
									<span>Logout</span>
								</a>
							</li>
						</ul>
					</div>
				</div>
				<!-- /user menu -->


				<!-- Main navigation -->
				<div class="card card-sidebar-mobile">
					<ul class="nav nav-sidebar" data-nav-type="accordion">

						<!-- Main -->
						<li class="nav-item-header"><div class="text-uppercase font-size-xs line-height-xs">Main</div> <i class="icon-menu" title="Main"></i></li>
						<li class="nav-item">
							<a href="<?= base_url(); ?>Dashboard" class="nav-link <?php if($title == "Dashboard"){echo "active";} ?>">
								<i class="icon-home4"></i>
								<span>
									Dashboard
								</span>
							</a>
						</li>
						<?php if($this->session->userdata("Role") == 1) : ?>
						<li class="nav-item">
							<a href="<?= base_url(); ?>Kategori" class="nav-link <?php if($title == "Data Kategori"){echo "active";} ?>">
								<i class="icon-list-unordered"></i>
								<span>
									Data Kategori
								</span>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?= base_url(); ?>Users" class="nav-link <?php if($title == "Data User"){echo "active";} ?>">
								<i class="icon-user-plus"></i>
								<span>
									Data User
								</span>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?= base_url(); ?>Log" class="nav-link <?php if($title == "Log Aktivitas"){echo "active";} ?>">
								<i class="icon-history"></i>
								<span>
									Log Aktivitas
								</span>
							</a>
						</li>
					<?php endif; ?>
					<?php if($this->session->userdata("Role") == 2 || $this->session->userdata("Role") == 3) : ?>
						<li class="nav-item">
							<a href="<?= base_url(); ?>Dokumen" class="nav-link <?php if($title == "Data Dokumen"){echo "active";} ?>">
								<i class="icon-folder6"></i>
								<span>
									Data Dokumen
								</span>
							</a>
						</li>
					<?php endif; ?>
					</ul>
				</div>
				<!-- /main navigation -->

			</div>
			<!-- /sidebar content -->
			
		</div>
		<!-- /main sidebar -->
				<!-- Main content -->
		<div class="content-wrapper">