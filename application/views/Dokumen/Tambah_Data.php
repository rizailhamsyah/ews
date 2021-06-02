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

				<!-- add data content -->
				<div class="row">
					<div class="col-lg-12">
						<!-- Basic responsive configuration -->
				<div class="card">
					<div class="card-header header-elements-inline">
						<h5 class="card-title"><?= $title; ?></h5>
						<div class="header-elements">
							<div class="list-icons">
		                		<a class="list-icons-item" data-action="collapse"></a>
		                		<a class="list-icons-item" data-action="reload"></a>
		                	</div>
	                	</div>
					</div>
						<div class="row m-1 mt-2">
							<div class="col-lg-12">
								<!-- Falshdata notif -->
								<?= $this->session->flashdata('notif'); ?>
							</div>					
						</div>
			<form action="<?= base_url(); ?>Dokumen/save" method="post" enctype="multipart/form-data">		
				<div class="row m-2">
					<div class="col-lg-6 col-md-6 col-sm-12">
						<div class="form-group">
							<label>Masukkan No Dokumen :</label>
							<input type="text" class="form-control" placeholder="No Dokumen" name="No_Dokumen" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')">
						</div>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-12">
						<div class="form-group">
							<label>Masukkan Deskripsi :</label>
							<input type="text" class="form-control" placeholder="Deskripsi" name="Deskripsi" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')">
						</div>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-12">
						<div class="form-group">
							<label>Masukkan Kategori :</label>
							<select class="form-control" name="ID_Kategori">
								<?php foreach ($kategori as $kat): ?>	
								<option value="<?= $kat['ID']; ?>"><?= $kat['Kategori'] ?></option>
								<?php endforeach ?>
							</select>
						</div>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-12">
						<div class="form-group">
							<label>Masukkan Pihak Terkait :</label>
							<input type="text" class="form-control" placeholder="Pihak Terkait" name="Pihak_Terkait" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')">
						</div>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-12">
						<div class="form-group">
							<label>Masukkan Email :</label>
							<input type="email" class="form-control" placeholder="Email" name="Email" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')">
						</div>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-12">
						<div class="form-group">
							<label>Masukkan Tanggal Awal :</label>
							<input type="date" class="form-control" placeholder="Tanggal Awal" name="Tanggal_Awal" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')">
						</div>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-12">
						<div class="form-group">
							<label>Masukkan Tanggal Akhir :</label>
							<input type="date" class="form-control" placeholder="Tanggal Akhir" name="Tanggal_Akhir" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')">
						</div>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-12">
						<div class="form-group">
							<label>Masukkan Lampiran (Opsional) :</label>
							<input type="file" class="form-control" placeholder="Lampiran" name="Lampiran" accept="application/pdf">
						</div>
					</div>
				</div>
				<div class="row mb-3 ml-2 mr-2">
					<div class="col-lg-3 col-md-3 col-sm-12">
						<button type="submit" class="btn btn-success btn-block">Simpan Data</button>
					</div>
				</div>
			</form>
				</div>
				<!-- /basic responsive configuration -->
					</div>
				</div>
				<!-- /add data content -->

			</div>
			<!-- /content area -->