<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Job Portal Questions list</title>
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
									<li class="active">
										<a href="{{ route('admin.questions.index')}}">
											<span class="sub-item">Questions List</span>
										</a>
									</li>
									<li>
										<a href="{{ route('admin.questions.create')}}">
											<span class="sub-item">Add Question</span>
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
						<h3 class="fw-bold mb-3">All Questions</h3>
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
								<a href="#">All Questions</a>
							</li>
						</ul>
					</div>
					<div class="row">
						<!-- Questions Section -->
						<div class="col-md-12 mt-4">
							<div class="container mt-4">
								<!-- Search Bar for Questions -->
								<form method="GET" action="{{ route('admin.questions.index') }}" class="mb-4">
									<div class="row">
										<!-- Search Input: Full width on small screens, 6 columns on medium screens, and 4 on large screens -->
										<div class="col-12 col-md-8 col-lg-6">
											<input type="text" name="search" class="form-control" placeholder="Search Questions..." value="{{ $search }}">
										</div>

										<!-- Search Button: Full width on small screens, 4 columns on medium screens, and 2 columns on large screens -->
										<div class="col-12 col-md-4 col-lg-3">
											<button type="submit" class="btn btn-primary w-100">Search</button>
										</div>

										<!-- Add Button: Aligned to the end of the row (using ml-auto on larger screens) -->
										<div class="col-12 col-md-12 col-lg-3 d-flex justify-content-end mt-3 mt-md-0">
											<a href="{{ route('admin.questions.create') }}" class="btn btn-primary w-100">Add</a>
										</div>
									</div>
								</form>
							
								<!-- Jobs Table -->
								<div class="table-responsive">
									<table class="table table-striped table-bordered table-hover">
										<thead class="thead-dark">
											<tr>
												<th>Sr No</th>
												<th>Questions</th>
												<th>Question Category</th>
												<th>Actions</th>
											</tr>
										</thead>
										<tbody>
											@foreach ($questions as $index => $question)
												<tr>
													@if ($questions instanceof \Illuminate\Pagination\LengthAwarePaginator)
														<td>{{ ($questions->currentPage() - 1) * $questions->perPage() + $index + 1 }}</td>
													@else
														<td>{{ $index + 1 }}</td>  <!-- Just use the index directly if it's not paginated -->
													@endif
													<td>{{ $question->question }}</td>
													<td>{{ $question->type }}</td>
													<td>
														<a href="{{ route('admin.questions.show', $question->id) }}" class="btn btn-info btn-sm">View</a>
														<a href="{{ route('admin.questions.edit', $question->id) }}" class="btn btn-warning btn-sm">Edit</a>
														<form action="{{ route('admin.questions.destroy', $question->id) }}" method="POST" style="display:inline;">
															@csrf
															@method('DELETE')
															<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this question?')">Delete</button>
														</form>
													</td>
												</tr>
											@endforeach
										</tbody>
									</table>
								</div>

							
								<!-- Custom Pagination -->
								<div class="card-body">
									<div class="demo">
										<ul class="pagination pg-primary">
											<!-- Previous Button -->
											@if ($questions->onFirstPage())
												<li class="page-item disabled">
													<a class="page-link" href="#" aria-label="Previous">
														<span aria-hidden="true">&laquo;</span>
														<span class="sr-only">Previous</span>
													</a>
												</li>
											@else
												<li class="page-item">
													<a class="page-link" href="{{ $questions->previousPageUrl() }}" aria-label="Previous">
														<span aria-hidden="true">&laquo;</span>
														<span class="sr-only">Previous</span>
													</a>
												</li>
											@endif
											
											<!-- Page Numbers -->
											@foreach ($questions->getUrlRange(1, $questions->lastPage()) as $page => $url)
												<li class="page-item {{ ($questions->currentPage() == $page) ? 'active' : '' }}">
													<a class="page-link" href="{{ $url }}">{{ $page }}</a>
												</li>
											@endforeach
											
											<!-- Next Button -->
											@if ($questions->hasMorePages())
												<li class="page-item">
													<a class="page-link" href="{{ $questions->nextPageUrl() }}" aria-label="Next">
														<span aria-hidden="true">&raquo;</span>
														<span class="sr-only">Next</span>
													</a>
												</li>
											@else
												<li class="page-item disabled">
													<a class="page-link" href="#" aria-label="Next">
														<span aria-hidden="true">&raquo;</span>
														<span class="sr-only">Next</span>
													</a>
												</li>
											@endif
										</ul>
									</div>
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