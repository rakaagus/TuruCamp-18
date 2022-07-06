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
							<a class="btn btn-warning" href="<?= base_url() ?>index.php/tempatwisata/edit?id=<?= $wisata->id ?>" role="button">Update</a>
							<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deletemodal<?= $wisata->id ?>">
								Delete
							</button>
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

	<!-- Modal -->
	<?php foreach($list_data as $wisata):?>
	<div class="modal fade" id="deletemodal<?= $wisata->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
		<div class="modal-header">
			<h5 class="modal-title" id="exampleModalLabel">Confirm Delete</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<div class="modal-body">
			Yakin Delete Data ini? <?= $wisata->nama ?>, data Akan Dihapus Permanen
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			<a class="btn btn-danger" id="hapus-wisata" href="<?= base_url() ?>index.php/tempatwisata/delete?id=<?= $wisata->id ?>" role="button">Hapus Sekarang</a>
		</div>
		</div>
	</div>
	</div>
	<?php endforeach;?>

</div>
<!-- /.content-wrapper -->