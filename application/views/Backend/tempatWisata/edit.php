<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Update Tempat Wisata</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="<?= base_url() ?>">Home</a></li>
						<li class="breadcrumb-item"><a href="<?= base_url() ?>index.php/tempatwisata">Tempat Wisata</a></li>
						<li class="breadcrumb-item active">Update Tempat Wisata</li>
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
            <?php echo form_open_multipart('tempatwisata/save')?>
            <input type="hidden" name="id_edit" value="<?=$wisata->id;?>">
            <input type="hidden" name="foto1" value="<?=$wisata->foto1;?>">
            <input type="hidden" name="foto2" value="<?=$wisata->foto2;?>">
            <input type="hidden" name="foto3" value="<?=$wisata->foto3;?>">


            <div class="form-group row">
                <label for="nama" class="col-4 col-form-label">Nama Wisata</label> 
                <div class="col-8">
                <input id="nama" name="nama" type="text" class="form-control" value="<?= $wisata->nama ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="latlong" class="col-4 col-form-label">LatLong</label> 
                <div class="col-8">
                <input id="latlong" name="latlong" type="text" class="form-control" value="<?= $wisata->latlong ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="jnswisata" class="col-4 col-form-label">Jenis Wisata</label> 
                <div class="col-8">
                <select id="jnswisata" name="jnswisata" class="custom-select">
                    <?php 
                        foreach($list_jenisWisata as $jenis):
                            $selected = "";
                            if($wisata->jenis_wisata_id == $jenis->id){
                                $selected = "selected";
                            }
                    ?>
                    <option value="<?= $jenis->id ?>" <?= $selected ?> ><?= $jenis->nama_jenis ?></option>
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
                            $selected = "";
                            if($wisata->kecamatan_id == $kecamatan->id ){
                                $selected = "selected";
                            }
                    ?>
                    <option value="<?= $kecamatan->id ?>" <?= $selected ?> ><?= $kecamatan->nama_kecamatan ?></option>
                    <?php endforeach;?>
                </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="rating" class="col-4 col-form-label">Rating</label> 
                <div class="col-8">
                <input id="rating" name="rating" type="number" class="form-control" value="<?= $wisata->skor_rating ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="harga" class="col-4 col-form-label">Harga Pertiket Masuk</label> 
                <div class="col-8">
                <input id="harga" name="harga" type="number" class="form-control" value="<?= $wisata->harga_tiket ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="website" class="col-4 col-form-label">Website</label> 
                <div class="col-8">
                <input id="website" name="website" type="text" class="form-control" value="<?= $wisata->website ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="fasilitas" class="col-4 col-form-label">Fasilitas</label> 
                <div class="col-8">
                <input id="fasilitas" name="fasilitas" type="text" class="form-control" value="<?= $wisata->fasilitas ?>" >
                </div>
            </div>
            <div class="form-group row">
                <label for="deskripsi" class="col-4 col-form-label">Deskripsi Wisata</label> 
                <div class="col-8">
                <textarea id="deskripsi" name="deskripsi" cols="40" rows="5" class="form-control"><?= $wisata->deskripsi ?></textarea>
                </div>
            </div> 
            <div class="form-group row">
                <label for="alamat" class="col-4 col-form-label">alamat Wisata</label> 
                <div class="col-8">
                <textarea id="alamat" name="alamat" cols="40" rows="5" class="form-control"><?= $wisata->alamat ?></textarea>
                </div>
            </div> 
            <div class="form-group row">
                <label for="foto" class="col-4 col-form-label">Foto</label> 
                <div class="col-8">
                <div class="input-group">
                    <input type="file" name="foto[]" placeholder="Uploads foto" class="form-control" multiple>
                </div>
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
