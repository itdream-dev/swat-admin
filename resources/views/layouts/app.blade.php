<!doctype html>
<html class="fixed">
<head>

	<!-- Basic -->
	<meta charset="UTF-8">

	<title>SWATCoin - Admin</title>
	<meta name="keywords" content="CryptoflipCar - Admin" />
	<meta name="description" content="CryptoflipCar - Admin">
	<meta name="author" content="okler.net">
  <link rel="shortcut icon" href="/img/fav-icon.png">
	<!-- Mobile Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

	<!-- Web Fonts  -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">

	<!-- Vendor CSS -->
	<link rel="stylesheet" href="/assets/vendor/bootstrap/css/bootstrap.css" />

	<link rel="stylesheet" href="/assets/vendor/font-awesome/css/font-awesome.css" />
	<link rel="stylesheet" href="/assets/vendor/magnific-popup/magnific-popup.css" />
	<link rel="stylesheet" href="/assets/vendor/bootstrap-datepicker/css/bootstrap-datepicker3.css" />

	<!-- Specific Page Vendor CSS -->
	<link rel="stylesheet" href="/assets/vendor/jquery-ui/jquery-ui.css" />
	<link rel="stylesheet" href="/assets/vendor/jquery-ui/jquery-ui.theme.css" />
	<link rel="stylesheet" href="/assets/vendor/bootstrap-multiselect/bootstrap-multiselect.css" />
	<link rel="stylesheet" href="/assets/vendor/morris.js/morris.css" />

	<!-- Theme CSS -->
	<link rel="stylesheet" href="/assets/stylesheets/theme.css" />

	<!-- Skin CSS -->
	<link rel="stylesheet" href="/assets/stylesheets/skins/default.css" />

	<!-- Theme Custom CSS -->
	<link rel="stylesheet" href="/assets/stylesheets/theme-custom.css">
	<link rel="stylesheet" href="/assets/vendor/jquery-datatables-bs3//assets/css/datatables.css" />
	<link rel="stylesheet" href="/assets/vendor/pnotify/pnotify.custom.css">
	<link rel="stylesheet" href="/assets/vendor/bootstrap-timepicker/css/bootstrap-timepicker.css">


	<!-- Head Libs -->
	<script src="/assets/vendor/modernizr/modernizr.js"></script>
	<!-- Vendor -->
	<script src="/assets/vendor/jquery/jquery.js"></script>
	<script src="/assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
	<script src="/assets/vendor/bootstrap/js/bootstrap.js"></script>
	<script src="/assets/vendor/nanoscroller/nanoscroller.js"></script>
	<script src="/assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
	<script src="/assets/vendor/magnific-popup/jquery.magnific-popup.js"></script>
	<script src="/assets/vendor/jquery-placeholder/jquery-placeholder.js"></script>
	<script src="/assets/vendor/pnotify/pnotify.custom.js"></script>
	<script src="/assets/vendor/bootstrap-timepicker/bootstrap-timepicker.js"></script>
	@if (isset($settings) && isset($settings['net_type']))
	@if ($settings['net_type'] == 'test')
	<script src="/web3/abi_test.js"></script>
	@else
	<script src="/web3/abi.js"></script>
	@endif
	@endif
</head>
<body>
	<section class="body">

		<!-- start: header -->
		<header class="header">
			<div class="logo-container">
				<a href="../" class="logo">
					<img src="/images/logo.png" style="width:40px;margin-top:-10px;margin-right:5px"/> <span style="color:#e7c967;font-size:30px; font-weight:bold; line-height:30px">SWATCoin - ADMIN</span>
				</a>
				<div class="visible-xs toggle-sidebar-left" data-toggle-class="sidebar-left-opened" data-target="html" data-fire-event="sidebar-left-opened">
					<i class="fa fa-bars" aria-label="Toggle sidebar"></i>
				</div>
			</div>

			<!-- start: search & user box -->
			<div class="header-right">

				<span class="separator"></span>

				<div id="userbox" class="userbox">
					<a href="#" data-toggle="dropdown">
						<figure class="profile-picture">
							<img src="/assets/images/!logged-user.jpg" alt="Joseph Doe" class="img-circle" data-lock-picture="/assets/images/!logged-user.jpg" />
						</figure>
						<div class="profile-info" data-lock-name="John Doe" data-lock-email="johndoe@okler.com">
							<span class="name">Sky Clean</span>
							<span class="role">administrator</span>
						</div>

						<i class="fa custom-caret"></i>
					</a>

					<div class="dropdown-menu">
						<ul class="list-unstyled">
							<li class="divider"></li>
							<li>
								<a role="menuitem" tabindex="-1" href="pages-user-profile.html"><i class="fa fa-user"></i> My Profile</a>
							</li>
							<li>
								<a role="menuitem" tabindex="-1" href="#" data-lock-screen="true"><i class="fa fa-lock"></i> Lock Screen</a>
							</li>
							<li>
								<a role="menuitem" tabindex="-1" href="{{ route('logout') }}" onclick="event.preventDefault();console.log('logout');
								document.getElementById('logout-form').submit();">
								<i class="fa fa-power-off"></i> Log Out
							</a>
						</li>

						<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
							{{ csrf_field() }}
						</form>
					</ul>
				</div>
			</div>
		</div>
		<!-- end: search & user box -->
	</header>
	<!-- end: header -->

	<div class="inner-wrapper">
		<!-- start: sidebar -->
		<aside id="sidebar-left" class="sidebar-left">

			<div class="sidebar-header">
				<div class="sidebar-title">
					Page Menu
				</div>
				<div class="sidebar-toggle hidden-xs" data-toggle-class="sidebar-left-collapsed" data-target="html" data-fire-event="sidebar-left-toggle">
					<i class="fa fa-bars" aria-label="Toggle sidebar"></i>
				</div>
			</div>

			<div class="nano">
				<div class="nano-content">
					<nav id="menu" class="nav-main" role="navigation">
						<ul class="nav nav-main">
							<li>
								<a href="/dashboard">
									<i class="fa fa-home" aria-hidden="true"></i>
									<span>Dashboard</span>
								</a>
							</li>

							<!-- <li class="nav-parent">
								<a>
									<i class="fa fa-user" aria-hidden="true"></i>
									<span>User management</span>
								</a>
								<ul class="nav nav-children">
									<li>
										<a href="/users">
											User list
										</a>
									</li>
									<li>
										<a href="/users/new">
											Add new user
										</a>
									</li>
								</ul>
							</li> -->

							<li class="nav-parent">
								<a>
									<i class="fa fa-mobile" aria-hidden="true"></i>
									<span>Device management</span>
								</a>
								<ul class="nav nav-children">
									<li>
										<a href="/devices">
											Device list
										</a>
									</li>
									<li>
										<a href="/devices/new">
											Add new device
										</a>
									</li>
								</ul>
							</li>

							<li>
								<a href="/settings">
									<i class="fa fa-home" aria-hidden="true"></i>
									<span>Settings</span>
								</a>
							</li>
						</ul>
					</nav>
				</div>

				<script>
				// Maintain Scroll Position
				if (typeof localStorage !== 'undefined') {
					if (localStorage.getItem('sidebar-left-position') !== null) {
						var initialPosition = localStorage.getItem('sidebar-left-position'),
						sidebarLeft = document.querySelector('#sidebar-left .nano-content');

						sidebarLeft.scrollTop = initialPosition;
					}
				}
				</script>

			</div>

		</aside>

		@yield('content')
	</div>

</section>



<!-- Specific Page Vendor -->
<script src="/assets/vendor/jquery-ui/jquery-ui.js"></script>
<script src="/assets/vendor/jqueryui-touch-punch/jqueryui-touch-punch.js"></script>
<script src="/assets/vendor/jquery-appear/jquery-appear.js"></script>
<script src="/assets/vendor/bootstrap-multiselect/bootstrap-multiselect.js"></script>
<script src="/assets/vendor/jquery.easy-pie-chart/jquery.easy-pie-chart.js"></script>
<script src="/assets/vendor/flot/jquery.flot.js"></script>
<script src="/assets/vendor/flot.tooltip/flot.tooltip.js"></script>
<script src="/assets/vendor/flot/jquery.flot.pie.js"></script>
<script src="/assets/vendor/flot/jquery.flot.categories.js"></script>
<script src="/assets/vendor/flot/jquery.flot.resize.js"></script>
<script src="/assets/vendor/jquery-sparkline/jquery-sparkline.js"></script>
<script src="/assets/vendor/raphael/raphael.js"></script>
<script src="/assets/vendor/morris.js/morris.js"></script>
<script src="/assets/vendor/gauge/gauge.js"></script>
<script src="/assets/vendor/snap.svg/snap.svg.js"></script>
<script src="/assets/vendor/liquid-meter/liquid.meter.js"></script>
<script src="/assets/vendor/jqvmap/jquery.vmap.js"></script>
<script src="/assets/vendor/jqvmap/data/jquery.vmap.sampledata.js"></script>
<script src="/assets/vendor/jqvmap/maps/jquery.vmap.world.js"></script>
<script src="/assets/vendor/jqvmap/maps/continents/jquery.vmap.africa.js"></script>
<script src="/assets/vendor/jqvmap/maps/continents/jquery.vmap.asia.js"></script>
<script src="/assets/vendor/jqvmap/maps/continents/jquery.vmap.australia.js"></script>
<script src="/assets/vendor/jqvmap/maps/continents/jquery.vmap.europe.js"></script>
<script src="/assets/vendor/jqvmap/maps/continents/jquery.vmap.north-america.js"></script>
<script src="/assets/vendor/jqvmap/maps/continents/jquery.vmap.south-america.js"></script>

<script src="/assets/vendor/jquery-datatables/media/js/jquery.dataTables.js"></script>
<script src="/assets/vendor/ios7-switch/ios7-switch.js"></script>
<script src="/assets/vendor/jquery-datatables/extras/TableTools/js/dataTables.tableTools.min.js"></script>

<script src="/assets/vendor/jquery-datatables-bs3//assets/js/datatables.js"></script>
<!-- Theme Base, Components and Settings -->
<script src="/assets/javascripts/theme.js"></script>

<!-- Theme Custom -->
<script src="/assets/javascripts/theme.custom.js"></script>

<!-- Theme Initialization Files -->
<script src="/assets/javascripts/theme.init.js"></script>

<!-- Examples -->
<script src="/assets/javascripts/tables/examples.datatables.default.js"></script>

</body>
</html>
