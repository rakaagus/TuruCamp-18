<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Kecamatan</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="<?= base_url() ?>">Home</a></li>
						<li class="breadcrumb-item active">Kecamatan</li>
					</ol>
				</div>
			</div>
		</div>
		<!-- /.container-fluid -->
	</section>

	

	<!-- Main content -->
	
	<section class="content">
		<?php
			if(validation_errors()){
		?>
		<div class="card">
			<div class="card-header">
				error
			</div>
			<div class="card-body">
				<ul>
					<?php if(form_error('nama')){ ?>
					<li><?php echo form_error('nama'); ?></li>
					<?php }?>
				</ul>
			</div>
		</div>
		<?php } ?>

		<!-- Default box -->
		<div class="card">
			<div class="card-header">
				<h3 class="card-title">Data Kecamatan</h3>

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
			<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                Tambah Data
            </button>
			<table class="table table-striped">
				<thead>
					<tr>
						<th>No</th>
						<th>Nama Kecamatan</th>
						<th>Tools</th>
					</tr>
				</thead>
				<tbody>
					<?php
                        $nomor = 1;
						foreach($list_data as $kecamatan):
					?>
					<tr>
						<td><?= $nomor?></td>
						<td><?= $kecamatan->nama_kecamatan?></td>
						<td>
                            <button type="button" class="btn btn-warning text-white" data-toggle="modal" data-target="#editmodal<?= $kecamatan->id ?>">
                                Update
                            </button>
							<button type="button" class="btn btn-danger text-white" data-toggle="modal" data-target="#deletemodal<?= $kecamatan->id ?>">
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
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Form Tambah Data</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
        <?php echo form_open('kecamatan/save')?>
                <div class="form-group">
                    <label for="nama">Nama Kecamatan</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="<?php echo set_value('nama'); ?>">
                </div>
                <div class="form-group">
                    <button name="submit" type="submit" class="btn btn-primary">Submit</button>
                </div>
        <?php echo form_close();?>
        </div>
        </div>
    </div>
    </div>
    <!-- Modal -->
    
    <!--Modal edit-->
    <?php foreach($list_data as $kecamatan):?>
    <div class="modal fade" id="editmodal<?= $kecamatan->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Form Update Data</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
        <?php  $hidden = ['id_edit' => $kecamatan->id]; ?>
        <?php echo form_open('kecamatan/save', '', $hidden)?>
                <div class="form-group">
                    <label for="nama">Nama Kecamatan</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="<?= $kecamatan->nama_kecamatan; ?>">
                </div>
                <div class="form-group">
                    <button name="submit" type="submit" class="btn btn-primary">Submit</button>
                </div>
        <?php echo form_close();?>
        </div>
        </div>
    </div>
    </div>
    <?php endforeach;?>
    <!--Modal edit-->

	<!-- Modal Delete-->
	<?php foreach($list_data as $kecamatan):?>
	<div class="modal fade" id="deletemodal<?= $kecamatan->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
		<div class="modal-header">
			<h5 class="modal-title" id="exampleModalLabel">Confirm Delete</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<div class="modal-body">
			Yakin Delete Data ini? <?= $kecamatan->nama_kecamatan ?>, data Akan Dihapus Permanen
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			<a class="btn btn-danger" href="<?= base_url() ?>index.php/kecamatan/delete?id=<?= $kecamatan->id ?>" role="button">Hapus Sekarang</a>
		</div>
		</div>
	</div>
	</div>
	<?php endforeach;?>

</div>
<!-- /.content-wrapper -->
