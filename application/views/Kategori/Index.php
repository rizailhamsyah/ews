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
								<th width="100px">No</th>
								<th>Kategori</th>
								<th class="text-center" width="150px">Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php $i=1; foreach ($kategori as $kate): ?>
							<tr>
								<td><?= $i++ ?></td>
								<td><?= $kate['Kategori']; ?></td>
								<td class="text-center">
									<button class="btn btn-sm btn-success" title="Edit Data" data-toggle="modal" data-target="#modal_edit<?= $kate['ID'] ?>"><i class="icon-pencil"></i></button>
									<button class="btn btn-sm btn-danger" title="Hapus Data" data-toggle="modal" data-target="#modal_delete<?= $kate['ID'] ?>"><i class="icon-trash"></i></button>
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

			<!-- Modal add kategori start -->
				<div id="modal_add" class="modal fade" tabindex="-1">
					<div class="modal-dialog modal-sm">
						<div class="modal-content">
							<div class="modal-header bg-success">
								<h5 class="modal-title">Tambah <?= $title; ?></h5>
								<button type="button" class="close" data-dismiss="modal">&times;</button>
							</div>
						<!-- form input add kategori start -->
						<form action="<?= base_url(); ?>Kategori/save" method="post">
							<div class="modal-body">			
									<div class="form-group">
										<label>Masukkan Kategori :</label>
										<input type="text" class="form-control" placeholder="Kategori" name="Kategori" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')">
									</div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-link text-success" data-dismiss="modal">Close</button>
								<button type="submit" class="btn bg-success">Tambah Data</button>
							</div>
						</form>
						<!-- form input add kategori end -->
						</div>
					</div>
				</div>
				<!-- Modal add kategori end -->

				<!-- Modal edit kategori start -->
				<?php foreach ($kategori as $kat): ?>
				<div id="modal_edit<?= $kat['ID']  ?>" class="modal fade" tabindex="-1">
					<div class="modal-dialog modal-sm">
						<div class="modal-content">
							<div class="modal-header bg-success">
								<h5 class="modal-title">Edit <?= $title; ?> <?= $kat['Kategori'] ?></h5>
								<button type="button" class="close" data-dismiss="modal">&times;</button>
							</div>
						<!-- form input edit kategori start -->
						<form action="<?= base_url(); ?>Kategori/Update/<?= $kat['ID'] ?>" method="post">
							<div class="modal-body">			
									<div class="form-group">
										<label>Masukkan Kategori :</label>
										<input type="text" class="form-control" placeholder="Kategori" name="Kategori" value="<?= $kat['Kategori']; ?>" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')">
									</div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-link text-success" data-dismiss="modal">Close</button>
								<button type="submit" class="btn bg-success">Edit Data</button>
							</div>
						</form>
						<!-- form input edit kategori end -->
						</div>
					</div>
				</div>
				<?php endforeach ?>
				<!-- Modal edit kategori end -->

				<!-- Modal delete kategori start -->
				<?php foreach ($kategori as $k): ?>
				<div id="modal_delete<?= $k['ID'] ?>" class="modal fade" tabindex="-1">
					<div class="modal-dialog modal-sm">
						<div class="modal-content">
							<div class="modal-header bg-danger">
								<h5 class="modal-title">Hapus <?= $title; ?> <?= $k['Kategori'] ?></h5>
								<button type="button" class="close" data-dismiss="modal">&times;</button>
							</div>
						<!-- form input delete kategori start -->
						<form action="<?= base_url(); ?>Kategori/Delete/<?= $k['ID'] ?>" method="post">
							<div class="modal-body">			
									<p>Apakah Anda yakin ingin menghapus data ini?</p>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-link text-danger" data-dismiss="modal">Close</button>
								<button type="submit" class="btn bg-danger">Hapus Data</button>
							</div>
						</form>
						<!-- form input delete kategori end -->
						</div>
					</div>
				</div>
				<?php endforeach ?>
				<!-- Modal delete kategori end -->