<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Create Tempat Wisata</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="<?= base_url() ?>">Home</a></li>
						<li class="breadcrumb-item"><a href="<?= base_url() ?>index.php/tempatwisata">Tempat Wisata</a></li>
						<li class="breadcrumb-item active">Create Tempat Wisata</li>
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
				<h3 class="card-title">Crete</h3>

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
            <?php echo form_open('tempatwisata/save')?>
            <div class="form-group row">
                <label for="nama" class="col-4 col-form-label">Nama Wisata</label> 
                <div class="col-8">
                <input id="nama" name="nama" type="text" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <label for="latlong" class="col-4 col-form-label">LatLong</label> 
                <div class="col-8">
                <input id="latlong" name="latlong" type="text" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <label for="jnswisata" class="col-4 col-form-label">Jenis Wisata</label> 
                <div class="col-8">
                <select id="jnswisata" name="jnswisata" class="custom-select">
                    <?php 
                        foreach($list_jnsWisata as $wisata):
                    ?>
                    <option value="<?= $wisata->id ?>"><?= $wisata->nama_jenis ?></option>
                    <?php endforeach;?>
                </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="kecamatan" class="col-4 col-form-label">Kecamatan</label> 
                <div class="col-8">
                <select id="kecamatan" name="kecamatan" class="custom-select">
                    <?php
                        foreach($list_kecamatan as $kecamatan):
                    ?>
                    <option value="<?= $kecamatan->id ?>"><?= $kecamatan->nama_kecamatan ?></option>
                    <?php endforeach;?>
                </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="rating" class="col-4 col-form-label">Rating</label> 
                <div class="col-8">
                <input id="rating" name="rating" type="number" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <label for="harga" class="col-4 col-form-label">Harga Pertiket Masuk</label> 
                <div class="col-8">
                <input id="harga" name="harga" type="number" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <label for="website" class="col-4 col-form-label">Website</label> 
                <div class="col-8">
                <input id="website" name="website" type="text" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <label for="fasilitas" class="col-4 col-form-label">Fasilitas</label> 
                <div class="col-8">
                <input id="fasilitas" name="fasilitas" type="text" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <label for="deskripsi" class="col-4 col-form-label">Deskripsi Wisata</label> 
                <div class="col-8">
                <textarea id="deskripsi" name="deskripsi" cols="40" rows="5" class="form-control"></textarea>
                </div>
            </div> 
            <div class="form-group row">
                <label for="alamat" class="col-4 col-form-label">alamat Wisata</label> 
                <div class="col-8">
                <textarea id="alamat" name="alamat" cols="40" rows="5" class="form-control"></textarea>
                </div>
            </div> 
            <div class="form-group row">
                <div class="offset-4 col-8">
                <button name="submit" type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
            <?php echo form_close();?>
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
