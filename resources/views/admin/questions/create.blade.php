<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Job Portal Add Questions</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="{{ asset('assets/img/kaiadmin/favicon.ico') }}" type="image/x-icon"/>

	<!-- Fonts and icons -->
	<script src="{{ asset('../assets/js/plugin/webfont/webfont.min.js') }}"></script>
	<script>
		WebFont.load({
			google: {"families":["Public Sans:300,400,500,600,700"]},
			custom: {"families":["Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['{{ asset('../assets/css/fonts.min.css') }}']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>

	<!-- CSS Files -->
	<link rel="stylesheet" href="{{ asset('../assets/css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('../assets/css/plugins.min.css') }}">
	<link rel="stylesheet" href="{{ asset('../assets/css/kaiadmin.min.css') }}">

	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link rel="stylesheet" href="{{ asset('../assets/css/demo.css') }}">
</head>
<body>
	<div class="wrapper">
		<!-- Sidebar -->
		<div class="sidebar" data-background-color="dark">
			<div class="sidebar-logo">
				<!-- Logo Header -->
				<div class="logo-header" data-background-color="dark">

					<a href="{{ route('admin.dashboard') }}" class="logo">
						<span class="navbar-brand" style="font-size: 25px; font-weight: bold; color: #fff;">Admin Panel</span>
					</a>
					<div class="nav-toggle">
						<button class="btn btn-toggle toggle-sidebar">
							<i class="gg-menu-right"></i>
						</button>
						<button class="btn btn-toggle sidenav-toggler">
							<i class="gg-menu-left"></i>
						</button>
					</div>
					<button class="topbar-toggler more">
						<i class="gg-more-vertical-alt"></i>
					</button>
				</div>
				<!-- End Logo Header -->	
			</div>	
			<div class="sidebar-wrapper scrollbar scrollbar-inner">
				<div class="sidebar-content">
					<ul class="nav nav-secondary">
						<li class="nav-item">
							<a
							  data-bs-toggle="collapse"
							  href="#dashboard"
							  class="collapsed"
							  aria-expanded="false"
							>
							  <i class="fas fa-home"></i>
							  <p>DASHBOARD</p>
							  <span class="caret"></span>
							</a>
							<div class="collapse" id="dashboard">
							  <ul class="nav nav-collapse">
								<li>
								  <a href="{{ route('admin.dashboard')}}">
									<span class="sub-item">Dashboard</span>
								  </a>
								</li>
							  </ul>
							</div>
						  </li>
						<li class="nav-item submenu">
							<a data-bs-toggle="collapse" href="#base">
								<i class="fas fa-layer-group"></i>
								<p>JOBS</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="base">
								<ul class="nav nav-collapse">
									<li>
										<a href="{{ route('admin.jobs.index')}}">
											<span class="sub-item">Jobs List</span>
										</a>
									</li>
									<li>
										<a href="{{ route('admin.jobs.create')}}">
											<span class="sub-item">Add New Job</span>
										</a>
									</li>
								</ul>
							</div>
						</li>
                        <li class="nav-item active submenu">
							<a data-bs-toggle="collapse" href="#sidebarLayouts">
								<i class="fas fa-desktop"></i>
								<p>APTITUDE TEST</p>
								<span class="caret"></span>
							</a>
							<div class="collapse show" id="sidebarLayouts">
								<ul class="nav nav-collapse">
									<li>
										<a href="{{ route('admin.questions.index')}}">
											<span class="sub-item">Questions List</span>
										</a>
									</li>
									<li class="active">
										<a href="{{ route('admin.questions.create')}}">
											<span class="sub-item">Add Questions</span>
										</a>
									</li>
								</ul>
							</div>
						</li>
						<li class="nav-item submenu">
							<a data-bs-toggle="collapse" href="#Forms">
								<i class="fas fa-pen-square"></i>
								<p>APPLICATIONS</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="Forms">
								<ul class="nav nav-collapse">
									<li>
										<a href="{{ route('admin.applications.index')}}">
											<span class="sub-item">Application List</span>
										</a>
									</li>
								</ul>
							</div>
						</li>
            			<li class="nav-item submenu">
							<a data-bs-toggle="collapse" href="#Widget">
								<i class="fas fa-th-list"></i>
								<p>USERS</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="Widget">
								<ul class="nav nav-collapse">
									<li>
										<a href="{{ route('admin.profiles.index')}}">
											<span class="sub-item">User List</span>
										</a>
									</li>
								</ul>
							</div>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<!-- End Sidebar -->

		<div class="main-panel">
			<div class="main-header">
				<div class="main-header-logo">
					<!-- Logo Header -->
					<div class="logo-header" data-background-color="dark">

						<a href="{{ asset('../index.html') }}" class="logo">
							<img src="{{ asset('../assets/img/kaiadmin/logo_light.svg') }}" alt="navbar brand" class="navbar-brand" height="20">
						</a>
						<div class="nav-toggle">
							<button class="btn btn-toggle toggle-sidebar">
								<i class="gg-menu-right"></i>
							</button>
							<button class="btn btn-toggle sidenav-toggler">
								<i class="gg-menu-left"></i>
							</button>
						</div>
						<button class="topbar-toggler more">
							<i class="gg-more-vertical-alt"></i>
						</button>

					</div>
					<!-- End Logo Header -->
				</div>
				<!-- Navbar Header -->
				<nav class="navbar navbar-header navbar-header-transparent navbar-expand-lg border-bottom">
					<div class="container-fluid">
					  <ul class="navbar-nav topbar-nav ms-md-auto align-items-center">
						<li class="nav-item topbar-user dropdown hidden-caret">
						  <a class="dropdown-toggle profile-pic" data-bs-toggle="dropdown" href="#" aria-expanded="false">
							<div class="avatar-sm">
							  <img src="{{ asset('assets/img/profile.jpg') }}" alt="..." class="avatar-img rounded-circle" />
							</div>
							<span class="profile-username">
							  <span class="op-7">Hi,</span>
							  <span class="fw-bold">{{ Auth::user()->name }}</span>
							</span>
						  </a>
						  <ul class="dropdown-menu dropdown-user animated fadeIn">
							<div class="dropdown-user-scroll scrollbar-outer">
							  <li>
								<div class="user-box">
								  <div class="avatar-lg">
									<img src="{{ asset('assets/img/profile.jpg') }}" alt="image profile" class="avatar-img rounded" />
								  </div>
								  <div class="u-text">
									<h4>{{ Auth::user()->name }}</h4>
									<p class="text-muted">{{ Auth::user()->email }}</p>
									<!-- Link to logout route -->
									<a class="btn btn-xs btn-secondary btn-sm" href="{{ route('admin.logout') }}">Logout</a>
								  </div>
								</div>
							  </li>
							</div>
						  </ul>
						</li>
					  </ul>
					</div>
				</nav>
				<!-- End Navbar -->
			</div>			
			<div class="container">
				<div class="page-inner">
					<div class="page-header">
						<h3 class="fw-bold mb-3">Add Question</h3>
						<ul class="breadcrumbs mb-3">
							<li class="nav-home">
								<a href="#">
									<i class="icon-home"></i>
								</a>
							</li>
							<li class="separator">
								<i class="icon-arrow-right"></i>
							</li>
							<li class="nav-item">
								<a href="#">APTITUDE TEST</a>
							</li>
							<li class="separator">
								<i class="icon-arrow-right"></i>
							</li>
							<li class="nav-item">
								<a href="#">Add Question</a>
							</li>
						</ul>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<h4 class="card-title">Add Question</h4>
								</div>
								<div class="card-body">
									<!-- Job Form -->
									<form action="{{ route('admin.questions.store') }}" method="POST">
										@csrf
										<div class="row">
											<!-- Job ID -->
											<div class="col-md-12">
												<div class="form-group">
													<label for="question">Question:</label>
													<input type="text" name="question" id="question" class="form-control" value="{{ old('question') }}" required>
												</div>
											</div>
										</div>
					
										<div class="row">
											<!-- Option A -->
											<div class="col-md-6">
												<div class="form-group">
													<label for="option_a">Option A:</label>
													<input type="text" name="option_a" id="option_a" class="form-control" value="{{ old('option_a') }}" required>
												</div>
											</div>
					
											<!-- Option B -->
											<div class="col-md-6">
												<div class="form-group">
													<label for="option_b">Option B:</label>
													<input type="text" name="option_b" id="option_b" class="form-control" value="{{ old('option_b') }}" required>
												</div>
											</div>
										</div>
					
										<div class="row">
											<!-- Option C -->
											<div class="col-md-6">
												<div class="form-group">
													<label for="option_c">Option C:</label>
													<input type="text" name="option_c" id="option_c" class="form-control" value="{{ old('option_c') }}" required>
												</div>
											</div>
					
											<!-- Option D -->
											<div class="col-md-6">
												<div class="form-group">
													<label for="option_d">Option D:</label>
													<input type="text" name="option_d" id="option_d" class="form-control" value="{{ old('option_d') }}" required>
												</div>
											</div>
										</div>
					
										<div class="row">
											<!-- Question Type -->
											<div class="col-md-6">
												<div class="form-group">
													<label for="type">Question Type:</label>
													<select name="type" id="type" class="form-control" required>
                                                        <option value="Reasoning" {{ old('type') == 'Reasoning' ? 'selected' : '' }}>Reasoning</option>
                                                        <option value="Logical" {{ old('type') == 'Logical' ? 'selected' : '' }}>Logical</option>
                                                        <option value="Quantitative" {{ old('type') == 'Quantitative' ? 'selected' : '' }}>Quantitative</option>
                                                        <option value="Verbal" {{ old('type') == 'Verbal' ? 'selected' : '' }}>Verbal</option>
                                                        <option value="Data Interpretation" {{ old('type') == 'Data Interpretation' ? 'selected' : '' }}>Data Interpretation</option>
													</select>
												</div>
											</div>
        
											<!-- Category -->
											<div class="col-md-6">
												<div class="form-group">
													<label for="correct_answer">Correct Answer:</label>
													<select name="correct_answer" id="correct_answer" class="form-control" required>
                                                        <option value="a" {{ old('correct_answer') == 'a' ? 'selected' : '' }}>Option A</option>
                                                        <option value="b" {{ old('correct_answer') == 'b' ? 'selected' : '' }}>Option B</option>
                                                        <option value="c" {{ old('correct_answer') == 'c' ? 'selected' : '' }}>Option C</option>
                                                        <option value="d" {{ old('correct_answer') == 'd' ? 'selected' : '' }}>Option D</option>
													</select>
												</div>
											</div>
										</div>
					
										<!-- Submit Button -->
										<button type="submit" class="btn btn-primary">Add Question</button>
									</form>
								</div>
							</div>
						</div>
					</div>									
				</div>
			</div>
			
			<footer class="footer">
				<div class="container-fluid d-flex justify-content-between">
				  <nav class="pull-left">
					<ul class="nav">
					  <li class="nav-item">
						<a class="nav-link" href="{{ route('admin.dashboard') }}">
						  Dashboard
						</a>
					  </li>
					  <li class="nav-item">
						<a class="nav-link" href="{{ route('admin.jobs.index') }}"> Jobs List</a>
					  </li>
					  <li class="nav-item">
						<a class="nav-link" href="{{ route('admin.jobs.create') }}"> Add New Job</a>
					  </li>
					</ul>
				  </nav>
				  <div class="copyright">
					2024-25, made with <i class="fa fa-heart heart text-danger"></i> by
					<a href="#">Job Portal</a>
				  </div>
				  {{-- <div>
					Distributed by
					<a target="_blank" href="https://themewagon.com/">ThemeWagon</a>.
				  </div> --}}
				</div>
			</footer>
		</div>
		
		<!-- Custom template | don't include it in your project! -->
		<div class="custom-template">
			<div class="title">Settings</div>
			<div class="custom-content">
				<div class="switcher">
					<div class="switch-block">
						<h4>Logo Header</h4>
						<div class="btnSwitch">
							<button type="button" class=" selected changeLogoHeaderColor" data-color="dark"></button>
							<button type="button" class="selected changeLogoHeaderColor" data-color="blue"></button>
							<button type="button" class="changeLogoHeaderColor" data-color="purple"></button>
							<button type="button" class="changeLogoHeaderColor" data-color="light-blue"></button>
							<button type="button" class="changeLogoHeaderColor" data-color="green"></button>
							<button type="button" class="changeLogoHeaderColor" data-color="orange"></button>
							<button type="button" class="changeLogoHeaderColor" data-color="red"></button>
							<button type="button" class="changeLogoHeaderColor" data-color="white"></button>
							<br/>
							<button type="button" class="changeLogoHeaderColor" data-color="dark2"></button>
							<button type="button" class="changeLogoHeaderColor" data-color="blue2"></button>
							<button type="button" class="changeLogoHeaderColor" data-color="purple2"></button>
							<button type="button" class="changeLogoHeaderColor" data-color="light-blue2"></button>
							<button type="button" class="changeLogoHeaderColor" data-color="green2"></button>
							<button type="button" class="changeLogoHeaderColor" data-color="orange2"></button>
							<button type="button" class="changeLogoHeaderColor" data-color="red2"></button>
						</div>
					</div>
					<div class="switch-block">
						<h4>Navbar Header</h4>
						<div class="btnSwitch">
							<button type="button" class="changeTopBarColor" data-color="dark"></button>
							<button type="button" class="changeTopBarColor" data-color="blue"></button>
							<button type="button" class="changeTopBarColor" data-color="purple"></button>
							<button type="button" class="changeTopBarColor" data-color="light-blue"></button>
							<button type="button" class="changeTopBarColor" data-color="green"></button>
							<button type="button" class="changeTopBarColor" data-color="orange"></button>
							<button type="button" class="changeTopBarColor" data-color="red"></button>
							<button type="button" class="changeTopBarColor" data-color="white"></button>
							<br/>
							<button type="button" class="changeTopBarColor" data-color="dark2"></button>
							<button type="button" class="selected changeTopBarColor" data-color="blue2"></button>
							<button type="button" class="changeTopBarColor" data-color="purple2"></button>
							<button type="button" class="changeTopBarColor" data-color="light-blue2"></button>
							<button type="button" class="changeTopBarColor" data-color="green2"></button>
							<button type="button" class="changeTopBarColor" data-color="orange2"></button>
							<button type="button" class="changeTopBarColor" data-color="red2"></button>
						</div>
					</div>
					<div class="switch-block">
						<h4>Sidebar</h4>
						<div class="btnSwitch">
							<button type="button" class="selected changeSideBarColor" data-color="white"></button>
							<button type="button" class="changeSideBarColor" data-color="dark"></button>
							<button type="button" class="changeSideBarColor" data-color="dark2"></button>
						</div>
					</div>
				</div>
			</div>
			<div class="custom-toggle">
				<i class="icon-settings"></i>
			</div>
		</div>
		<!-- End Custom template -->
	</div>
	<!--   Core JS Files   -->
	<script src="{{ asset('../assets/js/core/jquery-3.7.1.min.js') }}"></script>
	<script src="{{ asset('../assets/js/core/popper.min.js') }}"></script>
	<script src="{{ asset('../assets/js/core/bootstrap.min.js') }}"></script>
	
	<!-- jQuery Scrollbar -->
	<script src="{{ asset('../assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js') }}"></script>
	<!-- Moment JS -->
	<script src="{{ asset('../assets/js/plugin/moment/moment.min.js') }}"></script>

	<!-- Chart JS -->
	<script src="{{ asset('../assets/js/plugin/chart.js/chart.min.js') }}"></script>

	<!-- jQuery Sparkline -->
	<script src="{{ asset('../assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js') }}"></script>

	<!-- Chart Circle -->
	<script src="{{ asset('../assets/js/plugin/chart-circle/circles.min.js') }}"></script>

	<!-- Datatables -->
	<script src="{{ asset('../assets/js/plugin/datatables/datatables.min.js') }}"></script>

	<!-- Bootstrap Notify -->
	<script src="{{ asset('../assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js') }}"></script>

	<!-- jQuery Vector Maps -->
	<script src="{{ asset('../assets/js/plugin/jsvectormap/jsvectormap.min.js') }}"></script>
	<script src="{{ asset('../assets/js/plugin/jsvectormap/world.js') }}"></script>

	<!-- Sweet Alert -->
	<script src="{{ asset('../assets/js/plugin/sweetalert/sweetalert.min.js') }}"></script>

	<!-- Kaiadmin JS -->
	<script src="{{ asset('../assets/js/kaiadmin.min.js') }}"></script>

	<!-- Kaiadmin DEMO methods, don't include it in your project! -->
	<script src="{{ asset('../assets/js/setting-demo2.js') }}"></script>
</body>
</html>