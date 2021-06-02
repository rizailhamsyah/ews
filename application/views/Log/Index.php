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

				<!-- Users content -->
				<div class="row">
					<div class="col-lg-12">
						<!-- Basic responsive configuration -->
				<div class="card">
					<div class="card-header header-elements-inline">
						<h5 class="card-title">Daftar <?= $title; ?></h5>
						<div class="header-elements">
							<div class="list-icons">
		                		<a class="list-icons-item" data-action="collapse"></a>
		                		<a class="list-icons-item" data-action="reload"></a>
		                	</div>
	                	</div>
					</div>

					<table class="table datatable-responsive">
						<thead>
							<tr>
								<th>No</th>
								<th>Tanggal</th>
								<th>Jam</th>
								<th>User</th>
								<th>Aktivitas</th>
								<th>Sistem Operasi</th>
								<th>Aplikasi</th>
								<th>IP Address</th>
							</tr>
						</thead>
						<tbody>
							<?php $i=1; foreach ($log as $l): ?>
							<tr class="<?php if($l['Status'] == 1){echo 'table-success';}elseif($l['Status'] == 2){echo 'table-warning';}elseif($l['Status'] == 3){echo 'table-danger';} ?>">
								<td><?= $i++; ?></td>
								<td><?= date('d-m-Y', strtotime($l['Tanggal_Waktu'])) ?></td>
								<td><?= date('H:i:s', strtotime($l['Tanggal_Waktu'])) ?></td>
								<td><?= $l['User'] ?></td>
								<td><?= $l['Aktivitas'] ?></td>
								<td><?= $l['Sistem_Operasi'] ?></td>
								<td><?= $l['Aplikasi'] ?></td>
								<td><?= $l['IP_Address'] ?></td>
							</tr>
							<?php endforeach ?>
						</tbody>
					</table>
				</div>
				<!-- /basic responsive configuration -->
					</div>
				</div>
				<!-- /Users content -->

			</div>
			<!-- /content area -->