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
					<div class="row m-2">
						<div class="col-lg-3 col-md-4 col-sm-12 mb-2">
							<a href="<?= base_url(); ?>Dokumen/tambah_data" class="btn btn-success btn-sm btn-block"><i class="icon-plus3"></i> Tambah Data</a>
						</div>
						<div class="col-lg-3 col-md-4 col-sm-12 mb-2">
							<a href="<?= base_url(); ?>Dokumen/export" class="btn btn-success btn-sm btn-block"><i class="icon-file-excel"></i> Export Data</a>
						</div>
					</div>
						<div class="row m-1 mt-2">
							<div class="col-lg-12">
								<!-- Falshdata notif -->
								<?= $this->session->flashdata('notif'); ?>
							</div>					
						</div>		

					<table class="table datatable-responsive">
						<thead>
							<tr>
								<th>No</th>
								<th>No Dokumen</th>
								<th>Deskripsi</th>
								<th>Kategori</th>
								<th>Pihak Terkait</th>
								<th>Masa Berlaku</th>
								<th class="text-center">Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php $i=1; foreach ($dokumen as $dokum): ?>
							<tr>
								<td><?= $i++ ?></td>
								<td><?= $dokum['No_Dokumen']; ?></td>
								<td><?= $dokum['Deskripsi']; ?></td>
								<td><?php 
									if ($dokum['ID_Kategori'] == 1) {echo "Personal";}elseif ($dokum['ID_Kategori'] == 2) {echo "Company";}
								 ?></td>
								<td><?= $dokum['Pihak_Terkait']; ?></td>
								<td><?= date('d-m-Y', strtotime($dokum['Tanggal_Awal'])); ?> - <?= date('d-m-Y', strtotime($dokum['Tanggal_Akhir'])); ?></td>
								<td class="text-center">
									<a href="<?php if(strlen($dokum['Lampiran']) == 0){echo"#";}else{echo base_url()."global_assets/Lampiran/".$dokum['Lampiran'];} ?>" class="btn btn-sm btn-info" title="Download Lampiran"><i class="icon-download4"></i></a>
									<button class="btn btn-sm btn-primary" title="Reminder Dokumen" data-toggle="modal" data-target="#modal_reminder<?= $dokum['ID'] ?>"><i class="icon-calendar2"></i></button>
									<a href="<?= base_url(); ?>Dokumen/edit_data/<?= $dokum['ID'] ?>" class="btn btn-sm btn-success" title="Edit Data"><i class="icon-pencil"></i></a>
									<button class="btn btn-sm btn-danger" title="Hapus Data" data-toggle="modal" data-target="#modal_delete<?= $dokum['ID'] ?>"><i class="icon-trash"></i></button>
								</td>
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

				<!-- Modal reminder dokumen start -->
				<?php foreach ($dokumen as $dok): ?>
				<div id="modal_reminder<?= $dok['ID'] ?>" class="modal fade" tabindex="-1">
					<div class="modal-dialog modal-lg">
						<div class="modal-content">
							<div class="modal-header bg-primary">
								<h5 class="modal-title">Reminder <?= $title; ?> <?= $dok['No_Dokumen'] ?></h5>
								<button type="button" class="close" data-dismiss="modal">&times;</button>
							</div>
							<div class="modal-body">
							<div class="row mb-3">
								<div class="col-lg-3 col-md-3 col-sm-12">
									<button class="btn btn-primary btn-block" data-toggle="modal" data-target="#add_reminder<?= $dok['ID'] ?>">Tambah Data</button>
								</div>
							</div>
								<div class="table-responsive">	
								<table class="table">
									<thead>
									<tr>
										<th>No</th>
										<th>Tanggal</th>
										<th>Status</th>
										<th class="text-center">Aksi</th>
									</tr>
									</thead>
									<tbody>
									<?php $i=1; foreach ($reminder as $remin): ?>
									<?php if ($dok['ID'] == $remin['ID_Dokumen']): ?>
									<tr>
										<td><?= $i++ ?></td>
										<td><?= date('d-m-Y', strtotime($remin['Tanggal'])); ?></td>
										<td>
											<?php if ($remin['Status'] == 1){echo '<span class="badge badge-success">Terkirim</span>';}else{echo '<span class="badge badge-info">Pending</span>';} ?>
										</td>
										<td class="text-center">
											<button class="btn btn-sm btn-success" title="Edit Data" data-toggle="modal" data-target="#edit_reminder<?= $remin['ID_Reminder'] ?>"><i class="icon-pencil"></i></button>
											<button class="btn btn-sm btn-danger" title="Hapus Data" data-toggle="modal" data-target="#delete_reminder<?= $remin['ID_Reminder'] ?>"><i class="icon-trash"></i></button>
										</td>
									</tr>
									<?php endif ?>
									<?php endforeach ?>
									</tbody>
								</table>
								</div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-link text-primary" data-dismiss="modal">Close</button>
							</div>
						</div>
					</div>
				</div>
				<?php endforeach ?>
				<!-- Modal reminder dokumen end -->

				<!-- Modal delete dokumen start -->
				<?php foreach ($dokumen as $d): ?>
				<div id="modal_delete<?= $d['ID'] ?>" class="modal fade" tabindex="-1">
					<div class="modal-dialog modal-sm">
						<div class="modal-content">
							<div class="modal-header bg-danger">
								<h5 class="modal-title">Hapus <?= $title; ?> <?= $d['No_Dokumen'] ?></h5>
								<button type="button" class="close" data-dismiss="modal">&times;</button>
							</div>
						<!-- form input delete dokumen start -->
						<form action="<?= base_url(); ?>Dokumen/Delete/<?= $d['ID'] ?>" method="post">
							<div class="modal-body">			
									<p>Apakah Anda yakin ingin menghapus data ini?</p>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-link text-danger" data-dismiss="modal">Close</button>
								<button type="submit" class="btn bg-danger">Hapus Data</button>
							</div>
						</form>
						<!-- form input delete dokumen end -->
						</div>
					</div>
				</div>
				<?php endforeach ?>
				<!-- Modal delete dokumen end -->

				<!-- Modal add reminder start -->
				<?php foreach ($dokumen as $dokume): ?>
				<div id="add_reminder<?= $dokume['ID'] ?>" class="modal fade" tabindex="-1">
					<div class="modal-dialog modal-sm">
						<div class="modal-content">
							<div class="modal-header bg-primary">
								<h5 class="modal-title">Tambah Data Reminder <?= $dokume['No_Dokumen'] ?></h5>
								<button type="button" class="close" data-dismiss="modal">&times;</button>
							</div>
						<!-- form input add reminder start -->
						<form action="<?= base_url(); ?>Dokumen/save_reminder" method="post">
							<div class="modal-body">	
									<input type="hidden" name="ID_Dokumen" value="<?= $dokume['ID'] ?>">		
									<div class="form-group">
										<label>Masukkan Tanggal :</label>
										<input type="date" class="form-control" placeholder="Tanggal" name="Tanggal" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')">
									</div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-link text-primary" data-dismiss="modal">Close</button>
								<button type="submit" class="btn bg-primary">Tambah Data</button>
							</div>
						</form>
						<!-- form input add reminder end -->
						</div>
					</div>
				</div>
				<?php endforeach ?>
				<!-- Modal add reminder end -->

				<!-- Modal edit reminder start -->
				<?php foreach ($reminder as $re): ?>
				<div id="edit_reminder<?= $re['ID_Reminder']  ?>" class="modal fade" tabindex="-1">
					<div class="modal-dialog modal-sm">
						<div class="modal-content">
							<div class="modal-header bg-success">
								<h5 class="modal-title">Edit Data Reminder</h5>
								<button type="button" class="close" data-dismiss="modal">&times;</button>
							</div>
						<!-- form input edit reminder start -->
						<form action="<?= base_url(); ?>Dokumen/Update_Reminder/<?= $re['ID_Reminder'] ?>" method="post">
							<div class="modal-body">			
									<div class="form-group">
										<label>Masukkan Tanggal :</label>
										<input type="date" class="form-control" placeholder="Tanggal" name="Tanggal" value="<?= $re['Tanggal'] ?>" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')">
									</div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-link text-success" data-dismiss="modal">Close</button>
								<button type="submit" class="btn bg-success">Edit Data</button>
							</div>
						</form>
						<!-- form input edit reminder end -->
						</div>
					</div>
				</div>
				<?php endforeach ?>
				<!-- Modal edit reminder end -->

				<!-- Modal delete reminder start -->
				<?php foreach ($reminder as $r): ?>
				<div id="delete_reminder<?= $r['ID_Reminder'] ?>" class="modal fade" tabindex="-1">
					<div class="modal-dialog modal-sm">
						<div class="modal-content">
							<div class="modal-header bg-danger">
								<h5 class="modal-title">Hapus Data Reminder</h5>
								<button type="button" class="close" data-dismiss="modal">&times;</button>
							</div>
						<!-- form input delete dokumen start -->
						<form action="<?= base_url(); ?>Dokumen/Delete_Reminder/<?= $r['ID_Reminder'] ?>" method="post">
							<div class="modal-body">			
									<p>Apakah Anda yakin ingin menghapus data ini?</p>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-link text-danger" data-dismiss="modal">Close</button>
								<button type="submit" class="btn bg-danger">Hapus Data</button>
							</div>
						</form>
						<!-- form input delete dokumen end -->
						</div>
					</div>
				</div>
				<?php endforeach ?>
				<!-- Modal delete dokumen end -->