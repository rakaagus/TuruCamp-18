<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Jenis Wisata</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="<?= base_url() ?>">Home</a></li>
						<li class="breadcrumb-item active">Jenis Wisata</li>
					</ol>
				</div>
			</div>
		</div>
		<!-- /.container-fluid -->
	</section>

	<!-- Main content -->
	<section class="content">
		<!-- Default box -->
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
		
		<div class="card">
			<div class="card-header">
				<h3 class="card-title">Data Jenis Wisata</h3>

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
						<th>Nama Jenis Wisata</th>
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
						<td><?= $wisata->nama_jenis?></td>
						<td>
                            <button type="button" class="btn btn-warning text-white" data-toggle="modal" data-target="#editmodal<?= $wisata->id ?>">
                                Update
                            </button>
							<button type="button" class="btn btn-danger text-white" data-toggle="modal" data-target="#deletemodal<?= $wisata->id ?>">
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
        <?php echo form_open('jeniswisata/save')?>
                <div class="form-group">
                    <label for="nama">Jenis Wisata</label>
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
    <?php foreach($list_data as $wisata):?>
    <div class="modal fade" id="editmodal<?= $wisata->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Form Update Data</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
        <?php  $hidden = ['id_edit' => $wisata->id]; ?>
        <?php echo form_open('jeniswisata/save', '', $hidden)?>
                <div class="form-group">
                    <label for="nama">Jenis Wisata</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="<?= $wisata->nama_jenis; ?>">
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
			Yakin Delete Data ini? <?= $wisata->nama_jenis ?>, data Akan Dihapus Permanen
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			<a class="btn btn-danger" href="<?= base_url() ?>index.php/jeniswisata/delete?id=<?= $wisata->id ?>" role="button">Hapus Sekarang</a>
		</div>
		</div>
	</div>
	</div>
	<?php endforeach;?>

</div>
<!-- /.content-wrapper -->
