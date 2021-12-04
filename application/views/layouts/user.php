<!DOCTYPE html>
<html lang="en">

<?php $this->load->view('components/user/head') ?>

<body data-layout="horizontal" data-topbar="dark">

	<!-- Pre-loader -->
	<div id="preloader">
		<div id="status">
			<div class="spinner">Loading...</div>
		</div>
	</div>
	<!-- End Preloader-->

	<!-- Begin page -->
	<div id="wrapper">

		<?php $this->load->view('components/user/nav') ?>
		<!-- End Navigation Bar-->

		<!-- ============================================================== -->
		<!-- Start Page Content here -->
		<!-- ============================================================== -->

		<div class="content-page">
			<div class="content">
				<!-- Start Content-->
				<div class="container-fluid">
					<div class="row">
						<div class="col-12">
							<?= $this->session->flashdata('act') ?>
						</div>
					</div>
					<!-- start page title -->
					<?php $this->load->view($page) ?>
					<!-- end page title -->
				</div>
				<!-- container-fluid -->
				<!-- content -->
			</div>

			<?php $this->load->view('components/footer') ?>

		</div>

		<!-- ============================================================== -->
		<!-- End Page content -->
		<!-- ============================================================== -->


	</div>
	<!-- END wrapper -->

	<!-- Right Sidebar -->
	<div class="right-bar">
		<div class="rightbar-title">
			<a href="javascript:void(0);" class="right-bar-toggle float-right">
				<i class="mdi mdi-close"></i>
			</a>
			<h4 class="font-16 m-0 text-white">Theme Customizer</h4>
		</div>
		<div class="slimscroll-menu rightbar-content">

			<div class="p-3">
				<div class="alert alert-warning" role="alert">
					<strong>Customize </strong> the overall color scheme, layout, etc.
				</div>
				<div class="mb-2">
					<img src="<?= base_url() ?>assets/images/layouts/light.png" class="img-fluid img-thumbnail" alt="">
				</div>
				<div class="custom-control custom-switch mb-3">
					<input type="checkbox" class="custom-control-input theme-choice" id="light-mode-switch" checked />
					<label class="custom-control-label" for="light-mode-switch">Light Mode</label>
				</div>

				<div class="mb-2">
					<img src="<?= base_url() ?>assets/images/layouts/dark.png" class="img-fluid img-thumbnail" alt="">
				</div>
				<div class="custom-control custom-switch mb-3">
					<input type="checkbox" class="custom-control-input theme-choice" id="dark-mode-switch" data-bsStyle="<?= base_url() ?>assets/css/bootstrap-dark.min.css" data-appStyle="<?= base_url() ?>assets/css/app-dark.min.css" />
					<label class="custom-control-label" for="dark-mode-switch">Dark Mode</label>
				</div>

				<div class="mb-2">
					<img src="<?= base_url() ?>assets/images/layouts/rtl.png" class="img-fluid img-thumbnail" alt="">
				</div>
				<div class="custom-control custom-switch mb-3">
					<input type="checkbox" class="custom-control-input theme-choice" id="rtl-mode-switch" data-appStyle="<?= base_url() ?>assets/css/app-rtl.min.css" />
					<label class="custom-control-label" for="rtl-mode-switch">RTL Mode</label>
				</div>

				<div class="mb-2">
					<img src="<?= base_url() ?>assets/images/layouts/dark-rtl.png" class="img-fluid img-thumbnail" alt="">
				</div>
				<div class="custom-control custom-switch mb-5">
					<input type="checkbox" class="custom-control-input theme-choice" id="dark-rtl-mode-switch" data-bsStyle="<?= base_url() ?>assets/css/bootstrap-dark.min.css" data-appStyle="<?= base_url() ?>assets/css/app-dark-rtl.min.css" />
					<label class="custom-control-label" for="dark-rtl-mode-switch">Dark RTL Mode</label>
				</div>

				<a href="https://1.envato.market/k0YEM" class="btn btn-danger btn-block mt-3" target="_blank"><i class="mdi mdi-download mr-1"></i> Download Now</a>
			</div>
		</div> <!-- end slimscroll-menu-->
	</div>
	<!-- /Right-bar -->

	<!-- Right bar overlay-->
	<div class="rightbar-overlay"></div>

	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	<!-- Vendor js -->
	<script src="<?= base_url() ?>assets/js/vendor.min.js"></script>
	<!-- Plugins Js -->
	<script src="<?= base_url() ?>assets/libs/bootstrap-tagsinput/bootstrap-tagsinput.min.js"></script>
	<script src="<?= base_url() ?>assets/libs/switchery/switchery.min.js"></script>
	<script src="<?= base_url() ?>assets/libs/multiselect/jquery.multi-select.js"></script>
	<script src="<?= base_url() ?>assets/libs/jquery-quicksearch/jquery.quicksearch.min.js"></script>
	<script src="<?= base_url() ?>assets/libs/select2/select2.min.js"></script>
	<script src="<?= base_url() ?>assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
	<script src="<?= base_url() ?>assets/libs/jquery-mask-plugin/jquery.mask.min.js"></script>
	<script src="<?= base_url() ?>assets/libs/moment/moment.js"></script>
	<script src="<?= base_url() ?>assets/libs/bootstrap-timepicker/bootstrap-timepicker.min.js"></script>
	<script src="<?= base_url() ?>assets/libs/bootstrap-colorpicker/bootstrap-colorpicker.min.js"></script>
	<script src="<?= base_url() ?>assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
	<script src="<?= base_url() ?>assets/libs/bootstrap-daterangepicker/daterangepicker.js"></script>
	<script src="<?= base_url() ?>assets/libs/bootstrap-maxlength/bootstrap-maxlength.min.js"></script>
	<script src="<?= base_url() ?>assets/libs/datatables/jquery.dataTables.min.js"></script>
	<script src="<?= base_url() ?>assets/libs/datatables/dataTables.bootstrap4.js"></script>
	<script src="<?= base_url() ?>assets/libs/datatables/dataTables.responsive.min.js"></script>
	<script src="<?= base_url() ?>assets/libs/datatables/responsive.bootstrap4.min.js"></script>
	<script src="<?= base_url() ?>assets/libs/datatables/dataTables.buttons.min.js"></script>

	<!-- Init js-->
	<script src="<?= base_url() ?>assets/js/pages/form-advanced.init.js"></script>
	<!-- Datatables init -->
	<script src="<?= base_url() ?>assets/js/pages/datatables.init.js"></script>
	<!-- App js -->
	<script src="<?= base_url() ?>assets/js/app.min.js"></script>

	<script>
		function uppercase(text) {
			text.value = text.value.toUpperCase()
		}
	</script>

</body>

</html>
