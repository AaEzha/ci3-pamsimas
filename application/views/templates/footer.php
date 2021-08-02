  <!-- Footer -->
  <footer class="sticky-footer bg-white">
  	<div class="container my-auto">
  		<div class="copyright text-center my-auto">
  			<span>Copyright &copy; Pamsimas Nagari V Koto <?= date('Y'); ?> </span>
  		</div>
  	</div>
  </footer>
  <!-- End of Footer -->

  </div>
  <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
  	<i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  	<div class="modal-dialog" role="document">
  		<div class="modal-content">
  			<div class="modal-header">
  				<h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
  				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
  					<span aria-hidden="true">×</span>
  				</button>
  			</div>
  			<div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
  			<div class="modal-footer">
  				<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
  				<a class="btn btn-primary" href="<?= base_url('auth/logout'); ?>">Logout</a>
  			</div>
  		</div>
  	</div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
  <script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- DataTables  & Plugins -->
  <script src="<?= base_url('assets/vendor'); ?>/datatables/jquery.dataTables.min.js"></script>
  <script src="<?= base_url('assets/vendor'); ?>/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="<?= base_url('assets/vendor'); ?>/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="<?= base_url('assets/vendor'); ?>/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
  <script src="<?= base_url('assets/vendor'); ?>/datatables-buttons/js/dataTables.buttons.min.js"></script>
  <script src="<?= base_url('assets/vendor'); ?>/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
  <script src="<?= base_url('assets/vendor'); ?>/jszip/jszip.min.js"></script>
  <script src="<?= base_url('assets/vendor'); ?>/pdfmake/pdfmake.min.js"></script>
  <script src="<?= base_url('assets/vendor'); ?>/pdfmake/vfs_fonts.js"></script>
  <script src="<?= base_url('assets/vendor'); ?>/datatables-buttons/js/buttons.html5.min.js"></script>
  <script src="<?= base_url('assets/vendor'); ?>/datatables-buttons/js/buttons.print.min.js"></script>
  <script src="<?= base_url('assets/vendor'); ?>/datatables-buttons/js/buttons.colVis.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>
  <script src="<?= base_url('assets/jquery-ui-1.12.1/jquery-ui.min.js'); ?>"></script>

  <script>
  	$('.custom-file-input').on('change', function() {
  		let filename = $(this).val().split('\\').pop();
  		$(this).next('.custom-file-label').addClass("selected").html(filename);
  	});

  	$('.form-check-input').on('click', function() {
  		const menuId = $(this).data('menu');
  		const roleId = $(this).data('role');

  		$.ajax({
  			url: "<?= base_url('admin/changeaccess'); ?>",
  			type: 'post',
  			data: {
  				menuId: menuId,
  				roleId: roleId
  			},
  			success: function() {
  				document.location.href = "<?= base_url('admin/roleaccess/'); ?>" + roleId;
  			}

  		});
  	});

  	$(function() {
  		tgl = $("#datePembayaran").datepicker({
  			maxDate: "+0d",
  			dateFormat: "yy-mm-dd"
  		});

  		$('#tahun').change(function() {
  			$('#bulan').removeAttr('readonly');
  		})

  		$('#bulan').change(function() {
  			$('#datePembayaran').removeAttr('readonly');
  			$('#bulan').prop('readonly', true);
  			$('#tahun').prop('readonly', true);
  			// tgl.datepicker("option", "minDate", getDate($('#tahun').val() + '-' + $('#bulan').val()));

  		})

  		var dateFormat = "yy-mm";

  		function getDate(element) {
  			var date;
  			try {
  				date = $.datepicker.parseDate(dateFormat, element.value);
  			} catch (error) {
  				date = null;
  			}

  			return date;
  		}
  	});


  	$('#datePembayaran').change(function() {
  		var tanggal = $('#datePembayaran').val();
  		var tahun = $('#tahun').val();
  		var bulan = $('#bulan').val();
  		$.ajax({
  			url: '<?= base_url('user/cekBiaya') ?>',
  			method: 'post',
  			data: {
  				tanggal: tanggal,
  				tahun: tahun,
  				bulan: bulan,
  			},
  			dataType: 'json',
  			success: function(response) {

  				if (response == "no") {
  					alert("Sebelum input Tanggal Pembayaran, pastikan Tahun dan Bulan Tagihan sudah dipilih terlebih dahulu!");
  					console.error(response);
  					$('#datePembayaran').val("");
  				} else {
  					var denda = response.denda;
  					var total = response.total;
  					var tanggalBayar = response.tanggalBayar;
  					var diff = response.diff;
  					var tunggakan = response.tunggakan;

  					$('#denda').val(denda);
  					$('#tagihan').val(total);
  					$('#tunggakan').val(tunggakan);
  				}

  			},
  			error: function(response) {
  				console.error(response);
  			}
  		});
  	});

  	$("#tabel").DataTable({
  		"responsive": true,
  		"lengthChange": false,
  		"autoWidth": false,
  		"buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
  	}).buttons().container().appendTo('#tabel_wrapper .col-md-6:eq(0)');

  	function printDiv(divName) {
  		var printContents = document.getElementById(divName).innerHTML;
  		var originalContents = document.body.innerHTML;

  		document.body.innerHTML = printContents;

  		window.print();

  		document.body.innerHTML = originalContents;
  	}
  </script>
  <?php $this->load->view($js ?? 'templates/blank'); ?>
  </body>

  </html>
