<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>View Tempat Wisata</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="<?= base_url() ?>">Home</a></li>
						<li class="breadcrumb-item"><a href="<?= base_url() ?>index.php/tempatwisata">Tempat Wisata</a></li>
						<li class="breadcrumb-item active">Detail Tempat Wisata</li>
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
				<h3 class="card-title">Detail Tempat Wisata</h3>

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
                <div class="row mb-2">
                    <div class="col-sm-8">
                        <table class="table table-striped">
                            <tbody>
                                <tr>
                                    <td>Nama Wisata</td><td><?= $wisata->nama; ?></td>
                                </tr>
                                <tr>
                                    <td>Alamat</td><td><?= $wisata->alamat; ?></td>
                                </tr>
                                <tr>
                                    <td>Deskripsi</td><td><?= $wisata->deskripsi; ?></td>
                                </tr>
                                <tr>
                                    <td>Rating</td><td><?= $wisata->skor_rating; ?></td>
                                </tr>
                                <tr>
                                    <td>Latlong</td><td><?= $wisata->latlong; ?></td>
                                </tr>
                                <tr>
                                    <td>Harga Tiket</td><td><?= $wisata->harga_tiket; ?></td>
                                </tr>
                                <tr>
                                    <td>Website</td><td><?= $wisata->website; ?></td>
                                </tr>
                                <tr>
                                    <td>fasilitas</td><td><?= $wisata->fasilitas; ?></td>
                                </tr>
                                <tr>
                                    <td>Kecamatan</td><td><?= $wisata->nama_kecamatan; ?></td>
                                </tr>
                                <tr>
                                    <td>Jenis Wisata</td><td><?= $wisata->nama_jenis; ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-sm-4">
						<?php
						$foto1 = $wisata->foto1;
						$foto2 = $wisata->foto2;
						$foto3 = $wisata->foto3;

						$filegambar1 = base_url('/uploads/wisata/'.$foto1);
						$filegambar2 = base_url('/uploads/wisata/'.$foto2);
						$filegambar3 = base_url('/uploads/wisata/'.$foto3);
						$array = get_headers($filegambar1);
						$array2 = get_headers($filegambar2);
						$array3 = get_headers($filegambar3);
						$string1 = $array[0];
						$string2 = $array2[0];
						$string3 = $array3[0];

						if($foto1 == null){
							echo '<img src="'.base_url('/uploads/wisata/no_image.png').'" alt="foto1"/>';
						}else{
							if(strpos($string1, "200")){
								echo '<img width="90%" class="img-thumbnail" src="'.$filegambar1.'" alt="foto1"/>';
							}
							else{
								echo '<img src="'.base_url('/uploads/wisata/no_image.png').'" alt="foto1"/>';
							}
						}

						if($foto2 == null){
							echo '<img src="'.base_url('/uploads/wisata/no_image.png').'" alt="foto2"/>';
						}else{
							if(strpos($string2, "200")){
								echo '<img width="70%" class="img-thumbnail" src="'.$filegambar2.'" alt="foto2"/>';
							}
							else{
								echo '<img src="'.base_url('/uploads/wisata/no_image.png').'" alt="foto2"/>';
							}
						}

						if($foto3 == null){
							echo '<img src="'.base_url('/uploads/wisata/no_image.png').'" alt="foto3"/>';
						}else{
							if(strpos($string3, "200")){
								echo '<img width="60%" class="img-thumbnail" src="'.$filegambar3.'" alt="foto3"/>';
							}
							else{
								echo '<img src="'.base_url('/uploads/wisata/no_image.png').'" alt="foto3"/>';
							}
						}
						?>
						<br>
						<?= form_open_multipart('tempatwisata/uploads');?>
							<input type="hidden" name="id" value="<?=$wisata->id;?>">
							<input type="hidden" name="nama" value="<?=$wisata->nama;?>">
							<input type="hidden" name="foto1" value="<?=$wisata->foto1;?>">
							<input type="hidden" name="foto2" value="<?=$wisata->foto2;?>">
							<input type="hidden" name="foto3" value="<?=$wisata->foto3;?>">
							<div class="input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text">Upload</span>
							</div>
							<div class="custom-file">
								<input type="file" class="custom-file-input" id="inputGroupFile01" name="foto[]" multiple>
								<label class="custom-file-label" for="inputGroupFile01">Choose file</label>
							</div>
							</div>
							<input type="submit" class="btn btn-success" value="uploads">
						<?= form_close();?>
					</div>
                </div>
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
