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
						<div class="col-lg-3 col-md-4 col-sm-12">
							<button type="button" class="btn btn-success btn-sm btn-block" data-toggle="modal" data-target="#modal_add"><i class="icon-plus3"></i> Tambah Data</button>
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
								<th>Nama</th>
								<th>Email</th>
								<th>Username</th>
								<th>Role</th>
								<th>Status</th>
								<th class="text-center">Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php $i=1; foreach ($users as $user): ?>
							<tr>
								<td><?= $i++ ?></td>
								<td><?= $user['Nama']; ?></td>
								<td><?= $user['Email']; ?></td>
								<td><?= $user['Username']; ?></td>
								<td>
									<?php if($user['Role'] == 1){echo 'Super Admin';}elseif($user['Role'] == 2){echo 'User';} ?>	
								</td>
								<td>
									<?php if ($user['Status'] == 0){echo '<span class="badge badge-danger">Tidak Aktif</span>';}elseif($user['Status'] == 1){echo '<span class="badge badge-success">Aktif</span>';} ?>
								</td>
								<td class="text-center">
									<button class="btn btn-sm btn-warning" title="Reset Password" data-toggle="modal" data-target="#modal_reset<?= $user['ID'] ?>"><i class="icon-reset"></i></button>
									<button class="btn btn-sm btn-success" title="Edit Data" data-toggle="modal" data-target="#modal_edit<?= $user['ID'] ?>"><i class="icon-pencil"></i></button>
									<button class="btn btn-sm btn-danger" title="Hapus Data" data-toggle="modal" data-target="#modal_delete<?= $user['ID'] ?>"><i class="icon-trash"></i></button>
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

			<!-- Modal add user start -->
				<div id="modal_add" class="modal fade" tabindex="-1">
					<div class="modal-dialog modal-sm">
						<div class="modal-content">
							<div class="modal-header bg-success">
								<h5 class="modal-title">Tambah <?= $title; ?></h5>
								<button type="button" class="close" data-dismiss="modal">&times;</button>
							</div>
						<!-- form input add user start -->
						<form action="<?= base_url(); ?>Users/save" method="post">
							<div class="modal-body">			
									<div class="form-group">
										<label>Masukkan Nama :</label>
										<input type="text" class="form-control" placeholder="Nama" name="Nama" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')">
									</div>

									<div class="form-group">
										<label>Masukkan Email :</label>
										<input type="email" class="form-control" placeholder="Email" name="Email" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')">
									</div>

									<div class="form-group">
										<label>Masukkan Username :</label>
										<input type="text" class="form-control" placeholder="Username" name="Username" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')">
									</div>

									<div class="form-group">
										<label>Masukkan Password:</label>
										<input type="password" class="form-control" placeholder="Password" name="Password" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')">
									</div>

									<div class="form-group">
										<label>Masukkan Role :</label>
										<select class="form-control" name="Role">
											<option value="1">Super Admin</option>
											<option value="2">User</option>
										</select>
									</div>

									<div class="form-group">
										<label>User Aktif?</label>
										<select class="form-control" name="Status">
											<option value="0">Tidak Aktif</option>
											<option value="1">Aktif</option>
										</select>
									</div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-link text-success" data-dismiss="modal">Close</button>
								<button type="submit" class="btn bg-success">Tambah Data</button>
							</div>
						</form>
						<!-- form input add user end -->
						</div>
					</div>
				</div>
				<!-- Modal add user end -->

				<!-- Modal edit user start -->
				<?php foreach ($users as $use): ?>
				<div id="modal_edit<?= $use['ID']  ?>" class="modal fade" tabindex="-1">
					<div class="modal-dialog modal-sm">
						<div class="modal-content">
							<div class="modal-header bg-success">
								<h5 class="modal-title">Edit <?= $title; ?> <?= $use['Nama'] ?></h5>
								<button type="button" class="close" data-dismiss="modal">&times;</button>
							</div>
						<!-- form input edit user start -->
						<form action="<?= base_url(); ?>Users/Update/<?= $use['ID'] ?>" method="post">
							<div class="modal-body">			
									<div class="form-group">
										<label>Masukkan Nama :</label>
										<input type="text" class="form-control" placeholder="Nama" name="Nama" value="<?= $use['Nama']; ?>" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')">
									</div>

									<div class="form-group">
										<label>Masukkan Email :</label>
										<input type="email" class="form-control" placeholder="Email" name="Email" value="<?= $use['Email']; ?>" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')">
									</div>

									<div class="form-group">
										<label>Masukkan Username :</label>
										<input type="text" class="form-control" placeholder="Username" name="Username" value="<?= $use['Username']; ?>" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')">
									</div>

									<div class="form-group">
										<label>Masukkan Role :</label>
										<select class="form-control" name="Role">
											<option value="1" <?php if($use['Role'] == 1){echo 'selected';} ?>>Super Admin</option>
											<option value="2" <?php if($use['Role'] == 2){echo 'selected';} ?>>User</option>
										</select>
									</div>

									<div class="form-group">
										<label>User Aktif?</label>
										<select class="form-control" name="Status">
											<option value="0" <?php if($use['Status'] == 0){echo 'selected';} ?>>Tidak Aktif</option>
											<option value="1" <?php if($use['Status'] == 1){echo 'selected';} ?>>Aktif</option>
										</select>
									</div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-link text-success" data-dismiss="modal">Close</button>
								<button type="submit" class="btn bg-success">Edit Data</button>
							</div>
						</form>
						<!-- form input edit user end -->
						</div>
					</div>
				</div>
				<?php endforeach ?>
				<!-- Modal edit user end -->

				<!-- Modal delete user start -->
				<?php foreach ($users as $us): ?>
				<div id="modal_delete<?= $us['ID'] ?>" class="modal fade" tabindex="-1">
					<div class="modal-dialog modal-sm">
						<div class="modal-content">
							<div class="modal-header bg-danger">
								<h5 class="modal-title">Hapus <?= $title; ?> <?= $us['Nama'] ?></h5>
								<button type="button" class="close" data-dismiss="modal">&times;</button>
							</div>
						<!-- form input delete user start -->
						<form action="<?= base_url(); ?>Users/Delete/<?= $us['ID'] ?>" method="post">
							<div class="modal-body">			
									<p>Apakah Anda yakin ingin menghapus data ini?</p>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-link text-danger" data-dismiss="modal">Close</button>
								<button type="submit" class="btn bg-danger">Hapus Data</button>
							</div>
						</form>
						<!-- form input delete user end -->
						</div>
					</div>
				</div>
				<?php endforeach ?>
				<!-- Modal delete user end -->

				<!-- Modal reset password user start -->
				<?php foreach ($users as $u): ?>
				<div id="modal_reset<?= $u['ID'] ?>" class="modal fade" tabindex="-1">
					<div class="modal-dialog modal-sm">
						<div class="modal-content">
							<div class="modal-header bg-warning">
								<h5 class="modal-title">Reset Password <?= $title; ?> <?= $u['Nama'] ?></h5>
								<button type="button" class="close" data-dismiss="modal">&times;</button>
							</div>
						<!-- form reset password user start -->
						<form action="<?= base_url(); ?>Users/Reset/<?= $u['ID'] ?>" method="post">
							<div class="modal-body">			
									<p>Apakah Anda yakin ingin reset password data ini?</p>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-link text-warning" data-dismiss="modal">Close</button>
								<button type="submit" class="btn bg-warning">Reset Password</button>
							</div>
						</form>
						<!-- form reset password user end -->
						</div>
					</div>
				</div>
				<?php endforeach ?>
				<!-- Modal reset password user end -->