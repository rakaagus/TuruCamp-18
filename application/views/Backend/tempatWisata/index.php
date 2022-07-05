<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Tempat Wisata</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="<?= base_url() ?>">Home</a></li>
						<li class="breadcrumb-item active">Tempat Wisata</li>
					</ol>
				</div>
			</div>
		</div>
		<!-- /.container-fluid -->
	</section>

	<!-- Main content -->
	<section class="content">
		<!-- Default box -->
		<div class="card">
			<div class="card-header">
				<h3 class="card-title">Data Tempat Wisata</h3>

				<div class="card-tools">
					<button
						type="button"
						class="btn btn-tool"
						data-card-widget="collapse"
						title="Collapse"
					>
						<i class="fas fa-minus"></i>
					</button>
					<button
						type="button"
						class="btn btn-tool"
						data-card-widget="remove"
						title="Remove"
					>
						<i class="fas fa-times"></i>
					</button>
				</div>
			</div>
			<div class="card-body">
			<a class="btn btn-primary" href="<?= base_url() ?>index.php/tempatwisata/create" role="button">Tambah Data</a>
			<table class="table table-striped">
				<thead>
					<tr>
						<th>No</th>
						<th>Nama Wisata</th>
                        <th>alamat</th>
                        <th>latlong</th>
                        <th>Jenis Wisata</th>
                        <th>Kecamatan</th>
						<th>Tools</th>
					</tr>
				</thead>
				<tbody>
					<?php
                        $nomor = 1;
						foreach($list_data as $wisata):
					?>
					<tr>
						<td><?= $nomor?></td>
						<td><?= $wisata->nama?></td>
                        <td><?= $wisata->alamat?></td>
                        <td><?= $wisata->latlong?></td>
                        <td><?= $wisata->nama_jenis ?></td>
                        <td><?= $wisata->nama_kecamatan?></td>
						<td>
                        	<a class="btn btn-info" href="<?= base_url() ?>index.php/tempatwisata/detail?id=<?= $wisata->id?>" role="button">Detail</a>
							<a class="btn btn-warning" href="" role="button">Update</a>
							<a class="btn btn-danger" href="" role="button" onclick="">Delete</a>
						</td>
					</tr>
					<?php
                        $nomor++;
						endforeach;
					?>
				</tbody>
			  </table>
            </div>
			<!-- /.card-body -->
			<div class="card-footer">Footer</div>
			<!-- /.card-footer-->
		</div>
		<!-- /.card -->
	</section>
	<!-- /.content -->

</div>
<!-- /.content-wrapper -->
