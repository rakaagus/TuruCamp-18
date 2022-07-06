<footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.1.0
    </div>
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?php echo base_url('plugins/jquery/jquery.min.js')?>"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url('plugins/bootstrap/js/bootstrap.bundle.min.js')?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('dist/js/adminlte.min.js')?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url('dist/js/demo.js')?>"></script>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
	<?php if ($this->session->flashdata('success')): ?>
		let isi = <?= json_encode($this->session->flashdata('success'))?>;
		Swal.fire({
		position: 'top-end',
		icon: 'success',
		title: 'Berhasil',
		text: isi,
		showConfirmButton: 'Oke',
		timer: 2500
		})
	<?php endif;?>	

	<?php if ($this->session->flashdata('error')): ?>
		let isi = <?= json_encode($this->session->flashdata('error'))?>;
		Swal.fire({
		position: 'top-end',
		icon: 'error',
		title: 'Something Wrong',
		text: isi,
		showConfirmButton: 'Oke',
		timer: 2500
		})
	<?php endif;?>

	function konfirmasi(){
		let id = document.getElementById('hapus');
		let href = id.getAttribute('href');
		Swal.fire({
		title: 'Apakah Anda Yakin Ingin Mengahpus Data ini?',
		text: "Data Akan Dihapus permanen",
		icon: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Ya, Hapus Data Ini!'
		}).then((result) => {
		if (result.value) {
			window.location.href = href;
		}
		})
	}

</script>
</body>
</html>