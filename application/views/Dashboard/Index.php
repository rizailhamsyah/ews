		<!-- Page header -->
			<div class="page-header page-header-light">
				<div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
					<div class="d-flex">
						<div class="breadcrumb">
							<a href="index.html" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
							<span class="breadcrumb-item active"><?= $title; ?></span>
						</div>

						<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
					</div>
				</div>
			</div>
			<!-- /page header -->
			<!-- Content area -->
			<div class="content">

				<!-- Dashboard content -->

				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12">
						<div class="card card-body">
							<div class="media">
								<div class="mr-3 align-self-center">
									<img src="<?= base_url(); ?>global_assets/images/logo_300.png" class="img-fluid" width="50px">
								</div>
								<div class="media-body">
									<span class="text-uppercase font-size-sm text-muted">Selamat Datang</span>
									<h3 class="font-weight-semibold mb-0"><?= $this->session->userdata('Nama') ?></h3>
								</div>
							</div>
						</div>
					</div>
				</div>

				<?php if ($this->session->userdata('Role') == 1): ?>
					
				<div class="row">
					<div class="col-sm-6 col-xl-3">
						<div class="card card-body">
							<div class="media">
								<div class="media-body">
									<h3 class="font-weight-semibold mb-0"><?= $Users; ?></h3>
									<span class="text-uppercase font-size-sm text-muted">total users</span>
								</div>

								<div class="ml-3 align-self-center">
									<i class="icon-users2 icon-3x text-blue-400"></i>
								</div>
							</div>
						</div>
					</div>

					<div class="col-sm-6 col-xl-3">
						<div class="card card-body">
							<div class="media">
								<div class="media-body">
									<h3 class="font-weight-semibold mb-0"><?= $Dokumen; ?></h3>
									<span class="text-uppercase font-size-sm text-muted">total dokumen</span>
								</div>

								<div class="ml-3 align-self-center">
									<i class="icon-folder-open2 icon-3x text-orange"></i>
								</div>
							</div>
						</div>
					</div>

					<div class="col-sm-6 col-xl-3">
						<div class="card card-body">
							<div class="media">
								<div class="media-body">
									<h3 class="font-weight-semibold mb-0"><?= $Kategori; ?></h3>
									<span class="text-uppercase font-size-sm text-muted">total kategori</span>
								</div>

								<div class="ml-3 align-self-center">
									<i class="icon-list2 icon-3x text-grey"></i>
								</div>
							</div>
						</div>
					</div>

					<div class="col-sm-6 col-xl-3">
						<div class="card card-body">
							<div class="media">
								<div class="media-body">
									<h3 class="font-weight-semibold mb-0"><?= $Log; ?></h3>
									<span class="text-uppercase font-size-sm text-muted">total aktivitas</span>
								</div>

								<div class="ml-3 align-self-center">
									<i class="icon-history icon-3x text-danger"></i>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php endif ?>

				<?php if ($this->session->userdata('Role') == 2): ?>
					
				<div class="row">
					<div class="col-sm-6 col-xl-3">
						<div class="card card-body">
							<div class="media">
								<div class="media-body">
									<h3 class="font-weight-semibold mb-0"><?= $Dokumen_Users ?></h3>
									<span class="text-uppercase font-size-sm text-muted">total dokumen</span>
								</div>

								<div class="ml-3 align-self-center">
									<i class="icon-folder-open2 icon-3x text-orange"></i>
								</div>
							</div>
						</div>
					</div>

					<div class="col-sm-6 col-xl-3">
						<div class="card card-body">
							<div class="media">
								<div class="media-body">
									<h3 class="font-weight-semibold mb-0"><?= $Reminder ?></h3>
									<span class="text-uppercase font-size-sm text-muted">total reminder</span>
								</div>

								<div class="ml-3 align-self-center">
									<i class="icon-bookmark icon-3x text-grey"></i>
								</div>
							</div>
						</div>
					</div>

					<div class="col-sm-6 col-xl-3">
						<div class="card card-body">
							<div class="media">
								<div class="media-body">
									<h3 class="font-weight-semibold mb-0"><?= $Pending ?></h3>
									<span class="text-uppercase font-size-sm text-muted">total pending</span>
								</div>

								<div class="ml-3 align-self-center">
									<i class="icon-stack icon-3x text-blue-400"></i>
								</div>
							</div>
						</div>
					</div>

					<div class="col-sm-6 col-xl-3">
						<div class="card card-body">
							<div class="media">
								<div class="media-body">
									<h3 class="font-weight-semibold mb-0"><?= $Kirim ?></h3>
									<span class="text-uppercase font-size-sm text-muted">total terkirim</span>
								</div>

								<div class="ml-3 align-self-center">
									<i class="icon-check icon-3x text-success"></i>
								</div>
							</div>
						</div>
					</div>
				</div>		
				<?php endif ?>

				<div class="row">
					<?php if ($this->session->userdata('Role') == 1): ?>
					<div class="col-lg-4 col-md-4 col-sm-12">
						<div class="card">
							<div class="card-header bg-primary">
								Reminder Dokumen Hari Ini
							</div>
							<div class="card-body" style="height: 300px; overflow-y: auto;">
								<!-- <div class="table-responsive"> -->
								<table class="table">
									<thead>
									<tr>
										<th>No. Dokumen</th>
										<th>Tanggal</th>
									</tr>
									</thead>
									<tbody>
										<?php foreach ($Hari as $Har): ?>
											<?php if ($Har['Tanggal'] == date('Y-m-d')): ?>
											<tr>
												<td><?= $Har['No_Dokumen'] ?></td>
												<td><?= date('d-m-Y', strtotime($Har['Tanggal'])) ?></td>
											</tr>
											<?php endif ?>
										<?php endforeach; ?>
									</tbody>
								</table>
								<!-- </div> -->
							</div>
						</div>
					</div>
					<?php endif ?>

					<?php if ($this->session->userdata('Role') == 2): ?>
					<div class="col-lg-4 col-md-4 col-sm-12">
						<div class="card">
							<div class="card-header bg-primary">
								Reminder Dokumen Hari Ini
							</div>
							<div class="card-body" style="height: 300px; overflow-y: auto;">
								<!-- <div class="table-responsive"> -->
								<table class="table">
									<thead>
									<tr>
										<th>No. Dokumen</th>
										<th>Tanggal</th>
									</tr>
									</thead>
									<tbody>
										<?php foreach ($Hari as $Har): ?>
											<?php if ($Har['Tanggal'] == date('Y-m-d') && $Har['ID_Users'] == $this->session->userdata('ID')): ?>
											<tr>
												<td><?= $Har['No_Dokumen'] ?></td>
												<td><?= date('d-m-Y', strtotime($Har['Tanggal'])) ?></td>
											</tr>
											<?php endif ?>
										<?php endforeach; ?>
									</tbody>
								</table>
								<!-- </div> -->
							</div>
						</div>
					</div>
					<?php endif ?>

					<?php if ($this->session->userdata('Role') == 1 ): ?>
					<div class="col-lg-4 col-md-4 col-sm-12">
						<div class="card">
							<div class="card-header bg-warning">
								Reminder Dokumen Bulan Ini
							</div>
							<div class="card-body" style="height: 300px; overflow-y: auto;">
								<div class="table-responsive">
								<table class="table">
									<thead>
									<tr>
										<th>No. Dokumen</th>
										<th>Tanggal</th>
									</tr>
									</thead>
									<tbody>
									<?php foreach ($Month_Week as $Month): ?>
									<?php 
										$date = date('Y-m-d');
										$date1=date_create($date);
								        $date2=date_create($Month['Tanggal_Akhir']);
								        $diff=date_diff($date1,$date2);
									 ?>
									 <?php if ($diff->format('%m') == 1): ?>
									<tr>
										<td><?= $Month['No_Dokumen'] ?></td>
										<td><?= date('d-m-Y', strtotime($Month['Tanggal_Akhir'])) ?></td>
									</tr>
									 <?php endif ?>
									<?php endforeach ?>
									</tbody>
								</table>
								</div>
							</div>
						</div>
					</div>
					<?php endif ?>

					<?php if ($this->session->userdata('Role') == 2 ): ?>
					<div class="col-lg-4 col-md-4 col-sm-12">
						<div class="card">
							<div class="card-header bg-warning">
								Reminder Dokumen Bulan Ini
							</div>
							<div class="card-body" style="height: 300px; overflow-y: auto;">
								<div class="table-responsive">
								<table class="table">
									<thead>
									<tr>
										<th>No. Dokumen</th>
										<th>Tanggal</th>
									</tr>
									</thead>
									<tbody>
									<?php foreach ($Month_Week as $Mont): ?>
									<?php 
										$date = date('Y-m-d');
										$date1=date_create($date);
								        $date2=date_create($Mont['Tanggal_Akhir']);
								        $diff=date_diff($date1,$date2);
									 ?>
									 <?php if ($diff->format('%m') == 1 && $Mont['ID_Users'] == $this->session->userdata('ID')): ?>
									<tr>
										<td><?= $Mont['No_Dokumen'] ?></td>
										<td><?= date('d-m-Y', strtotime($Mont['Tanggal_Akhir'])) ?></td>
									</tr>
									 <?php endif ?>
									<?php endforeach ?>
									</tbody>
								</table>
								</div>
							</div>
						</div>
					</div>
					<?php endif ?>

					<?php if ($this->session->userdata('Role') == 1): ?>	
					<div class="col-lg-4 col-md-4 col-sm-12">
						<div class="card">
							<div class="card-header bg-danger">
								Reminder Dokumen Minggu Ini
							</div>
							<div class="card-body" style="height: 300px; overflow-y: auto;">
								<div class="table-responsive">
								<table class="table">
									<thead>
									<tr>
										<th>No. Dokumen</th>
										<th>Tanggal</th>
									</tr>
									</thead>
									<tbody>
									<?php foreach ($Month_Week as $Week): ?>
									<?php 
										$date = date('Y-m-d');
										$date1=date_create($date);
								        $date2=date_create($Week['Tanggal_Akhir']);
								        $diff=date_diff($date1,$date2);
									 ?>
									 <?php if ($diff->days <= 7): ?>
									<tr>
										<td><?= $Week['No_Dokumen'] ?></td>
										<td><?= date('d-m-Y', strtotime($Week['Tanggal_Akhir'])) ?></td>
									</tr>
									 <?php endif ?>
									<?php endforeach ?>
									</tbody>
								</table>
								</div>
							</div>
						</div>
					</div>	
					<?php endif ?>

					<?php if ($this->session->userdata('Role') == 2): ?>	
					<div class="col-lg-4 col-md-4 col-sm-12">
						<div class="card">
							<div class="card-header bg-danger">
								Reminder Dokumen Minggu Ini
							</div>
							<div class="card-body" style="height: 300px; overflow-y: auto;">
								<div class="table-responsive">
								<table class="table">
									<thead>
									<tr>
										<th>No. Dokumen</th>
										<th>Tanggal</th>
									</tr>
									</thead>
									<tbody>
									<?php foreach ($Month_Week as $Week): ?>
									<?php 
										$date = date('Y-m-d');
										$date1=date_create($date);
								        $date2=date_create($Week['Tanggal_Akhir']);
								        $diff=date_diff($date1,$date2);
									 ?>
									 <?php if ($diff->days <= 7 && $Week['ID_Users'] == $this->session->userdata('ID')): ?>
									<tr>
										<td><?= $Week['No_Dokumen'] ?></td>
										<td><?= date('d-m-Y', strtotime($Week['Tanggal_Akhir'])) ?></td>
									</tr>
									 <?php endif ?>
									<?php endforeach ?>
									</tbody>
								</table>
								</div>
							</div>
						</div>
					</div>	
					<?php endif ?>

				</div>		
				<!-- <div class="row">
					<div class="col-lg-12">
						<div class="card p-5">
							<div class="card-body">
								<div class="row">
									<div class="col-lg-5 rounded mx-auto d-block">
									<img src="<?= base_url(); ?>global_assets/images/proses.svg">	
									</div>
								</div>
							</div>
						</div>
					</div>
				</div> -->
				<!-- /dashboard content -->

			</div>
			<!-- /content area -->