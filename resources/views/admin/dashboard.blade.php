<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>JOB Portal Admin Dashboard</title>
    <meta
      content="width=device-width, initial-scale=1.0, shrink-to-fit=no"
      name="viewport"
    />
    <link
      rel="icon"
      href="{{ asset('assets/img/kaiadmin/favicon.ico') }}"
      type="image/x-icon"
    />

    <!-- Fonts and icons -->
    <script src="{{ asset('assets/js/plugin/webfont/webfont.min.js') }}"></script>
    <script>
      WebFont.load({
        google: { families: ["Public Sans:300,400,500,600,700"] },
        custom: {
          families: [
            "Font Awesome 5 Solid",
            "Font Awesome 5 Regular",
            "Font Awesome 5 Brands",
            "simple-line-icons",
          ],
          urls: ["{{ asset('assets/css/fonts.min.css') }}"],
        },
        active: function () {
          sessionStorage.fonts = true;
        },
      });
    </script>

    <!-- CSS Files -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/plugins.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/kaiadmin.min.css') }}" />

    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link rel="stylesheet" href="{{ asset('assets/css/demo.css') }}" />
  </head>
  <body>
    <div class="wrapper">
      <!-- Sidebar -->
      <div class="sidebar" data-background-color="dark">
        <div class="sidebar-logo">
          <!-- Logo Header -->
          <div class="logo-header" data-background-color="dark">
            {{-- <a href="{{ route('admin.dashboard')}}" class="logo">
              <img
                src="{{ asset('assets/img/kaiadmin/logo_light.svg') }}"
                alt="navbar brand"
                class="navbar-brand"
                height="20"
              />
            </a> --}}
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
              <li class="nav-item active">
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
                  <li class="active"> 
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
              <li class="nav-item submenu">
							<a data-bs-toggle="collapse" href="#sidebarLayouts">
								<i class="fas fa-desktop"></i>
								<p>APTITUDE TEST</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="sidebarLayouts">
								<ul class="nav nav-collapse">
									<li>
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
              <a href="index.html" class="logo">
                <img
                  src="{{ asset('assets/img/kaiadmin/logo_light.svg') }}"
                  alt="navbar brand"
                  class="navbar-brand"
                  height="20"
                />
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
            <div
              class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4"
            >
              <div>
                <h3 class="fw-bold mb-3">Dashboard</h3>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-6 col-md-3">
                <div class="card card-stats card-round">
                  <div class="card-body">
                    <div class="row align-items-center">
                      <div class="col-icon">
                        <div
                          class="icon-big text-center icon-primary bubble-shadow-small"
                        >
                          <i class="fas fa-users"></i>
                        </div>
                      </div>
                      <div class="col col-stats ms-3 ms-sm-0">
                        <div class="numbers">
                          <p class="card-category">Total Applicants</p>
                          <h4 class="card-title">{{ $totalApplications ?? 0 }}</h4>
                          {{-- Total Applications: {{ $totalApplications }} --}}
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-3">
                <div class="card card-stats card-round">
                  <div class="card-body">
                    <div class="row align-items-center">
                      <div class="col-icon">
                        <div
                          class="icon-big text-center icon-success bubble-shadow-small"
                        >
                          <i class="fas fa-check-circle"></i>
                        </div>
                      </div>
                      <div class="col col-stats ms-3 ms-sm-0">
                        <div class="numbers">
                          <p class="card-category">Selected Applicants</p>
                          <h4 class="card-title">{{ $selectedCount }}</h4>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-3">
                <div class="card card-stats card-round">
                  <div class="card-body">
                    <div class="row align-items-center">
                      <div class="col-icon">
                        <div
                          class="icon-big text-center icon-danger bubble-shadow-small"
                        >
                          <i class="fas fa-times-circle"></i>
                        </div>
                      </div>
                      <div class="col col-stats ms-3 ms-sm-0">
                        <div class="numbers">
                          <p class="card-category">Rejected Applicants</p>
                          <h4 class="card-title">{{ $rejectedCount }}</h4>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-3">
                <div class="card card-stats card-round">
                  <div class="card-body">
                    <div class="row align-items-center">
                      <div class="col-icon">
                        <div
                          class="icon-big text-center icon-secondary bubble-shadow-small"
                        >
                          <i class="far fa-clock"></i>
                        </div>
                      </div>
                      <div class="col col-stats ms-3 ms-sm-0">
                        <div class="numbers">
                          <p class="card-category">Pending Applicants</p>
                          <h4 class="card-title">{{ $pendingCount }}</h4>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                  <div class="card card-round">
                      <div class="card-header">
                          <div class="card-head-row">
                              <div class="card-title">Monthly Applicant Statistics</div>
                          </div>
                      </div>
                      <div class="card-body">
                          <div class="chart-container">
                              <canvas id="monthwiseChart" style="height: 400px; width: 100%"></canvas>
                          </div>
                      </div>
                  </div>
              </div>
            </div>
                <div class="col-md-12">
                  <div class="card card-round">
                      <div class="card-header">
                          <div class="card-head-row card-tools-still-right">
                              <div class="card-title">Applications</div>
                              <div class="card-tools">
                                  <div class="dropdown">
                                      <button
                                          class="btn btn-icon btn-clean me-0"
                                          type="button"
                                          id="dropdownMenuButton"
                                          data-bs-toggle="dropdown"
                                          aria-haspopup="true"
                                          aria-expanded="false"
                                      >
                                          <i class="fas fa-ellipsis-h"></i>
                                      </button>
                                      <div
                                          class="dropdown-menu"
                                          aria-labelledby="dropdownMenuButton"
                                      >
                                          <form method="GET" action="{{ route('admin.dashboard') }}">
                                              @csrf
                                              <!-- Status Dropdown -->
                                              <div class="form-group">
                                                  <label for="status">Filter by Status</label>
                                                  <select name="status" class="form-control" id="status" onchange="this.form.submit()">
                                                      <option value="" {{ request('status') == '' ? 'selected' : '' }}>All Applications</option>
                                                      <option value="Selected" {{ request('status') == 'Selected' ? 'selected' : '' }}>Selected</option>
                                                      <option value="Pending" {{ request('status') == 'Pending' ? 'selected' : '' }}>Pending</option>
                                                      <option value="Shortlisted" {{ request('status') == 'Shortlisted' ? 'selected' : '' }}>Shortlisted</option>
                                                      <option value="Rejected" {{ request('status') == 'Rejected' ? 'selected' : '' }}>Rejected</option>
                                                      <option value="On_Hold" {{ request('status') == 'On_Hold' ? 'selected' : '' }}>On Hold</option>
                                                      <option value="Closed" {{ request('status') == 'Closed' ? 'selected' : '' }}>Closed</option>
                                                  </select>
                                              </div>
                                          </form>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  
                      <div class="card-body p-0">
                          <div class="table-responsive">
                              <table class="table align-items-center mb-0">
                                  <thead class="thead-light">
                                      <tr>
                                          <th scope="col">SR No</th>
                                          <th scope="col">Applicant</th>
                                          <th scope="col">Job Role</th>
                                          <th scope="col" class="text-end">Date & Time</th>
                                          <th scope="col" class="text-end">Marks</th>
                                          <th scope="col" class="text-end">Status</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      @if(isset($applications) && $applications->count() > 0)
                                          @foreach($applications as $index => $application)
                                              <tr>
                                                  <th scope="row">{{ $index + 1 }}</th>
                                                  <td>{{ ($application->firstname ?? 'N/A') . ' ' . ($application->lastname ?? '') }}</td>
                                                  <td>{{ $application->jobroll ?? 'N/A' }}</td>
                                                  <td class="text-end">{{ \Carbon\Carbon::parse($application->created_at)->format('M d, Y, h:i A') }}</td>
                                                  <td class="text-end">{{ $application->marks ?? 'N/A' }}</td>
                                                  <td class="text-end">
                                                      <span class="badge 
                                                          {{ $application->status == 'Shortlisted' ? 'badge-success' : 
                                                          ($application->status == 'Rejected' ? 'badge-danger' : 
                                                          ($application->status == 'Selected' ? 'badge-primary' : 
                                                          ($application->status == 'On_Hold' ? 'badge-warning' : 'badge-info'))) }}">
                                                          {{ ucfirst($application->status) }}
                                                      </span>
                                                  </td>
                                              </tr>
                                          @endforeach
                                      @else
                                          <tr>
                                              <td colspan="6" class="text-center">No applications found</td>
                                          </tr>
                                      @endif
                                  </tbody>
                              </table>
                          </div>
                      </div>
                  </div>
                </div>
                <!-- Custom Pagination -->
								<div class="card-body">
									<div class="demo">
										<ul class="pagination pg-primary">
											<!-- Previous Button -->
											@if ($applications->onFirstPage())
												<li class="page-item disabled">
													<a class="page-link" href="#" aria-label="Previous">
														<span aria-hidden="true">&laquo;</span>
														<span class="sr-only">Previous</span>
													</a>
												</li>
											@else
												<li class="page-item">
													<a class="page-link" href="{{ $applications->previousPageUrl() }}" aria-label="Previous">
														<span aria-hidden="true">&laquo;</span>
														<span class="sr-only">Previous</span>
													</a>
												</li>
											@endif
											
											<!-- Page Numbers -->
											@foreach ($applications->getUrlRange(1, $applications->lastPage()) as $page => $url)
												<li class="page-item {{ ($applications->currentPage() == $page) ? 'active' : '' }}">
													<a class="page-link" href="{{ $url }}">{{ $page }}</a>
												</li>
											@endforeach
											
											<!-- Next Button -->
											@if ($applications->hasMorePages())
												<li class="page-item">
													<a class="page-link" href="{{ $applications->nextPageUrl() }}" aria-label="Next">
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
                <button
                  type="button"
                  class="selected changeLogoHeaderColor"
                  data-color="dark"
                ></button>
                <button
                  type="button"
                  class="changeLogoHeaderColor"
                  data-color="blue"
                ></button>
                <button
                  type="button"
                  class="changeLogoHeaderColor"
                  data-color="purple"
                ></button>
                <button
                  type="button"
                  class="changeLogoHeaderColor"
                  data-color="light-blue"
                ></button>
                <button
                  type="button"
                  class="changeLogoHeaderColor"
                  data-color="green"
                ></button>
                <button
                  type="button"
                  class="changeLogoHeaderColor"
                  data-color="orange"
                ></button>
                <button
                  type="button"
                  class="changeLogoHeaderColor"
                  data-color="red"
                ></button>
                <button
                  type="button"
                  class="changeLogoHeaderColor"
                  data-color="white"
                ></button>
                <br />
                <button
                  type="button"
                  class="changeLogoHeaderColor"
                  data-color="dark2"
                ></button>
                <button
                  type="button"
                  class="changeLogoHeaderColor"
                  data-color="blue2"
                ></button>
                <button
                  type="button"
                  class="changeLogoHeaderColor"
                  data-color="purple2"
                ></button>
                <button
                  type="button"
                  class="changeLogoHeaderColor"
                  data-color="light-blue2"
                ></button>
                <button
                  type="button"
                  class="changeLogoHeaderColor"
                  data-color="green2"
                ></button>
                <button
                  type="button"
                  class="changeLogoHeaderColor"
                  data-color="orange2"
                ></button>
                <button
                  type="button"
                  class="changeLogoHeaderColor"
                  data-color="red2"
                ></button>
              </div>
            </div>
            <div class="switch-block">
              <h4>Navbar Header</h4>
              <div class="btnSwitch">
                <button
                  type="button"
                  class="changeTopBarColor"
                  data-color="dark"
                ></button>
                <button
                  type="button"
                  class="changeTopBarColor"
                  data-color="blue"
                ></button>
                <button
                  type="button"
                  class="changeTopBarColor"
                  data-color="purple"
                ></button>
                <button
                  type="button"
                  class="changeTopBarColor"
                  data-color="light-blue"
                ></button>
                <button
                  type="button"
                  class="changeTopBarColor"
                  data-color="green"
                ></button>
                <button
                  type="button"
                  class="changeTopBarColor"
                  data-color="orange"
                ></button>
                <button
                  type="button"
                  class="changeTopBarColor"
                  data-color="red"
                ></button>
                <button
                  type="button"
                  class="selected changeTopBarColor"
                  data-color="white"
                ></button>
                <br />
                <button
                  type="button"
                  class="changeTopBarColor"
                  data-color="dark2"
                ></button>
                <button
                  type="button"
                  class="changeTopBarColor"
                  data-color="blue2"
                ></button>
                <button
                  type="button"
                  class="changeTopBarColor"
                  data-color="purple2"
                ></button>
                <button
                  type="button"
                  class="changeTopBarColor"
                  data-color="light-blue2"
                ></button>
                <button
                  type="button"
                  class="changeTopBarColor"
                  data-color="green2"
                ></button>
                <button
                  type="button"
                  class="changeTopBarColor"
                  data-color="orange2"
                ></button>
                <button
                  type="button"
                  class="changeTopBarColor"
                  data-color="red2"
                ></button>
              </div>
            </div>
            <div class="switch-block">
              <h4>Sidebar</h4>
              <div class="btnSwitch">
                <button
                  type="button"
                  class="changeSideBarColor"
                  data-color="white"
                ></button>
                <button
                  type="button"
                  class="selected changeSideBarColor"
                  data-color="dark"
                ></button>
                <button
                  type="button"
                  class="changeSideBarColor"
                  data-color="dark2"
                ></button>
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
    <script src="{{ asset('assets/js/core/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/core/bootstrap.min.js') }}"></script>

    <!-- jQuery Scrollbar -->
    <script src="{{ asset('assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js') }}"></script>

    <!-- Chart JS -->
    <script src="{{ asset('assets/js/plugin/chart.js/chart.min.js') }}"></script>

    <!-- jQuery Sparkline -->
    <script src="{{ asset('assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js') }}"></script>

    <!-- Chart Circle -->
    <script src="{{ asset('assets/js/plugin/chart-circle/circles.min.js') }}"></script>

    <!-- Datatables -->
    <script src="{{ asset('assets/js/plugin/datatables/datatables.min.js') }}"></script>

    <!-- Bootstrap Notify -->
    <script src="{{ asset('assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js') }}"></script>

    <!-- jQuery Vector Maps -->
    <script src="{{ asset('assets/js/plugin/jsvectormap/jsvectormap.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugin/jsvectormap/world.js') }}"></script>

    <!-- Sweet Alert -->
    <script src="{{ asset('assets/js/plugin/sweetalert/sweetalert.min.js') }}"></script>

    <!-- Kaiadmin JS -->
    <script src="{{ asset('assets/js/kaiadmin.min.js') }}"></script>

    <!-- Kaiadmin DEMO methods, don't include it in your project! -->
    <script src="{{ asset('assets/js/setting-demo.js') }}"></script>
    <script src="{{ asset('assets/js/demo.js') }}"></script> 
    <script>
      $("#lineChart").sparkline([102, 109, 120, 99, 110, 105, 115], {
        type: "line",
        height: "70",
        width: "100%",
        lineWidth: "2",
        lineColor: "#177dff",
        fillColor: "rgba(23, 125, 255, 0.14)",
      });

      $("#lineChart2").sparkline([99, 125, 122, 105, 110, 124, 115], {
        type: "line",
        height: "70",
        width: "100%",
        lineWidth: "2",
        lineColor: "#f3545d",
        fillColor: "rgba(243, 84, 93, .14)",
      });

      $("#lineChart3").sparkline([105, 103, 123, 100, 95, 105, 115], {
        type: "line",
        height: "70",
        width: "100%",
        lineWidth: "2",
        lineColor: "#ffa534",
        fillColor: "rgba(255, 165, 52, .14)",
      });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const monthwiseData = @json($monthwiseData); // Data from the controller
    
        // Month names array
        const monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
    
        // Prepare data for the chart
        const labels = monthNames; // Month names for X-axis
    
        // Fill missing months with zero values
        const fillMissingData = (month) => {
            const monthData = monthwiseData[month];
            return monthData ? monthData : { total: 0, selected: 0, rejected: 0, pending: 0 };
        };
    
        // Map data for each status
        const totalApplications = monthNames.map((_, i) => fillMissingData(i + 1).total);
        const selectedApplications = monthNames.map((_, i) => fillMissingData(i + 1).selected);
        const rejectedApplications = monthNames.map((_, i) => fillMissingData(i + 1).rejected);
        const pendingApplications = monthNames.map((_, i) => fillMissingData(i + 1).pending);
    
        // Create clustered bar chart
        new Chart(document.getElementById('monthwiseChart'), {
            type: 'bar',
            data: {
                labels: labels, // Month names on X-axis
                datasets: [
                    {
                        label: 'Total Applications',
                        data: totalApplications,
                        backgroundColor: 'rgba(21, 114, 232, 0.8)', // #1572e8
                        borderColor: 'rgba(21, 114, 232, 1)', // #1572e8
                        borderWidth: 1,
                        barThickness: 20, // Adjust thickness of bars
                        categoryPercentage: 0.8, // Controls the width of each bar group
                        barPercentage: 0.7, // Controls the width of the bars within the group
                    },
                    {
                        label: 'Selected Applications',
                        data: selectedApplications,
                        backgroundColor: 'rgba(49, 206, 54, 0.8)', // Green color with rgba
                        borderColor: 'rgba(49, 206, 54, 1)', // Solid green border
                        borderWidth: 1,
                        barThickness: 20, // Adjust thickness of bars
                        categoryPercentage: 0.8,
                        barPercentage: 0.7,
                    },
                    {
                        label: 'Rejected Applications',
                        data: rejectedApplications,
                        backgroundColor: 'rgba(242, 89, 97, 0.8)', // #f25961
                        borderColor: 'rgba(242, 89, 97, 1)', // #f25961
                        borderWidth: 1,
                        barThickness: 20, // Adjust thickness of bars
                        categoryPercentage: 0.8, // Controls the width of each bar group
                        barPercentage: 0.7, // Controls the width of the bars within the group
                    },
                    {
                        label: 'Pending Applications',
                        data: pendingApplications,
                        backgroundColor: 'rgba(104, 97, 206, 0.8)', // #6861ce
                        borderColor: 'rgba(104, 97, 206, 1)', // #6861ce
                        borderWidth: 1,
                        barThickness: 20, // Adjust thickness of bars
                        categoryPercentage: 0.8, // Controls the width of each bar group
                        barPercentage: 0.7, // Controls the width of the bars within the group
                    }
                ]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top', // Position the legend at the top
                    },
                    tooltip: {
                        callbacks: {
                            label: function(tooltipItem) {
                                return tooltipItem.dataset.label + ': ' + tooltipItem.raw;
                            }
                        }
                    }
                },
                scales: {
                    x: {
                        title: {
                            display: true,
                            text: 'Month'
                        },
                        stacked: false, // Bars will be side-by-side
                    },
                    y: {
                        title: {
                            display: true,
                            text: 'Number of Applicants'
                        },
                        beginAtZero: true, // Ensure the Y-axis starts from zero
                    }
                }
            }
        });
    </script>    
  </body>
</html>
