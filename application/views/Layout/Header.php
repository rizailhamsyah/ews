<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title><?= $title ?> - Early Warning System</title>

	<!-- Favicon -->
	<link rel="shortcut icon" href="<?= base_url(); ?>global_assets/images/logo.svg">

	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="<?= base_url(); ?>global_assets/css/icons/icomoon/styles.min.css" rel="stylesheet" type="text/css">
	<link href="<?= base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="<?= base_url(); ?>assets/css/bootstrap_limitless.min.css" rel="stylesheet" type="text/css">
	<link href="<?= base_url(); ?>assets/css/layout.min.css" rel="stylesheet" type="text/css">
	<link href="<?= base_url(); ?>assets/css/components.min.css" rel="stylesheet" type="text/css">
	<link href="<?= base_url(); ?>assets/css/colors.min.css" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->

	<!-- Core JS files -->
	<script src="<?= base_url(); ?>global_assets/js/main/jquery.min.js"></script>
	<script src="<?= base_url(); ?>global_assets/js/main/bootstrap.bundle.min.js"></script>
	<script src="<?= base_url(); ?>global_assets/js/plugins/loaders/blockui.min.js"></script>
	<script src="<?= base_url(); ?>global_assets/js/plugins/ui/ripple.min.js"></script>
	<!-- /core JS files -->

	<!-- Theme JS files -->
	<script src="<?= base_url(); ?>global_assets/js/plugins/visualization/d3/d3.min.js"></script>
	<script src="<?= base_url(); ?>global_assets/js/plugins/visualization/d3/d3_tooltip.js"></script>
	<script src="<?= base_url(); ?>global_assets/js/plugins/forms/styling/switchery.min.js"></script>
	<script src="<?= base_url(); ?>global_assets/js/plugins/ui/moment/moment.min.js"></script>
	<script src="<?= base_url(); ?>global_assets/js/plugins/pickers/daterangepicker.js"></script>
	<script src="<?= base_url(); ?>global_assets/js/plugins/tables/datatables/datatables.min.js"></script>
	<script src="<?= base_url(); ?>global_assets/js/plugins/tables/datatables/extensions/responsive.min.js"></script>

	<script src="assets/js/app.js"></script>
	<script src="<?= base_url(); ?>global_assets/js/demo_pages/dashboard.js"></script>
	<script src="<?= base_url(); ?>global_assets/js/demo_charts/pages/dashboard/light/streamgraph.js"></script>
	<script src="<?= base_url(); ?>global_assets/js/demo_charts/pages/dashboard/light/sparklines.js"></script>
	<script src="<?= base_url(); ?>global_assets/js/demo_charts/pages/dashboard/light/lines.js"></script>	
	<script src="<?= base_url(); ?>global_assets/js/demo_charts/pages/dashboard/light/areas.js"></script>
	<script src="<?= base_url(); ?>global_assets/js/demo_charts/pages/dashboard/light/donuts.js"></script>
	<script src="<?= base_url(); ?>global_assets/js/demo_charts/pages/dashboard/light/bars.js"></script>
	<script src="<?= base_url(); ?>global_assets/js/demo_charts/pages/dashboard/light/progress.js"></script>
	<script src="<?= base_url(); ?>global_assets/js/demo_charts/pages/dashboard/light/heatmaps.js"></script>
	<script src="<?= base_url(); ?>global_assets/js/demo_charts/pages/dashboard/light/pies.js"></script>
	<script src="<?= base_url(); ?>global_assets/js/demo_charts/pages/dashboard/light/bullets.js"></script>
	<script src="<?= base_url(); ?>global_assets/js/demo_pages/datatables_responsive.js"></script>
	<script src="<?= base_url(); ?>global_assets/js/demo_pages/form_checkboxes_radios.js"></script>
	<script src="<?= base_url(); ?>global_assets/js/plugins/forms/validation/validate.min.js"></script>
	<!-- /theme JS files -->

</head>

<body>
	<!-- Main navbar -->
	<div class="navbar navbar-expand-md navbar-dark bg-success navbar-static">
		<div class="navbar-brand">
			<h6 class="text-white m-0">
				<!-- <img src="<?= base_url(); ?>global_assets/images/ews.png" alt=""> -->
				Early Warning System
			</h6>
		</div>

		<div class="d-md-none">
			<button class="navbar-toggler sidebar-mobile-main-toggle" type="button">
				<i class="icon-paragraph-justify3"></i>
			</button>
		</div>

		<div class="collapse navbar-collapse" id="navbar-mobile">
			<ul class="navbar-nav">
				<li class="nav-item">
					<a href="#" class="navbar-nav-link sidebar-control sidebar-main-toggle d-none d-md-block">
						<i class="icon-paragraph-justify3"></i>
					</a>
				</li>
			</ul>
		</div>
	</div>
	<!-- /main navbar -->