<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Job Portal - Profile</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link rel="icon" href="{{ asset('assets/img/kaiadmin/favicon.ico') }}" type="image/x-icon">
    
    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Inter:wght@700;800&display=swap" rel="stylesheet">
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    
    <!-- Libraries Stylesheet -->
    <link href="{{ asset('index/lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('index/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    
    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('index/css/bootstrap.min.css') }}" rel="stylesheet">
    
    <!-- Template Stylesheet -->
    <link href="{{ asset('index/css/style.css') }}" rel="stylesheet">
    
</head>

<body>
    <div class="container-xxl bg-white p-0">
        <!-- Navbar Start -->
        <nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
            <a href="{{ url('/') }}" class="navbar-brand d-flex align-items-center text-center py-0 px-4 px-lg-5">
                <h1 class="m-0 text-primary">Job Portal</h1>
            </a>
            <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto p-4 p-lg-0">
                    {{-- <a href="{{ url('/') }}" class="nav-item nav-link">Home</a> --}}
                    <a href="{{ route('user.dashboard') }}" class="nav-item nav-link">Dashboard</a>
                    <a href="{{ route('user.applications') }}" class="nav-item nav-link active">My Applications</a>
                    <a href="{{ url('/user/profile/show') }}" class="nav-item nav-link">Profile</a>
                    @if(Auth::check())
                        <!-- If user is logged in, show the username with dropdown -->
                        <div class="nav-item dropdown">
                            <a class="btn btn-primary rounded-0 py-4 px-lg-4 d-none d-lg-block" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                {{ Auth::user()->name }}<i class="fa fa-user ms-3"></i>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="{{ route('user.logout') }}">Logout <i class="fa fa-sign-out-alt ms-3"></i></a></li>
                            </ul>
                        </div>
                    @else
                        <!-- If user is not logged in, show the Login button -->
                        <a href="{{ route('user.login') }}" class="nav-item nav-link">Profile</a>
                    @endif
                </div>
            </div>
        </nav>
        <!-- Navbar End -->

        <!-- Header Start -->
        <div class="container-xxl py-5 bg-dark page-header mb-5">
            <div class="container my-5 pt-5 pb-4">
                <h1 class="display-3 text-white mb-3 animated slideInDown">My Applications</h1>
            </div>
            @if(session('message'))
                <div class="d-flex justify-content-center">
                    <div class="btn btn-primary w-50 mt-3 text-center">
                        {{ session('message') }}
                    </div>
                </div>
            @endif
        </div>
        <!-- Header End -->

        <!-- Applications List Section -->
        <div class="container-xxl py-5">
            <div class="container">
                <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">Applications</h1>
                <div class="tab-class text-center wow fadeInUp" data-wow-delay="0.3s">
                    <div class="tab-content">
                        <!-- All Applications -->
                        <div class="tab-pane fade show p-0 active">
                            @if($applications->count() > 0)
                                @foreach($applications as $application)
                                    <div class="job-item p-4 mb-4">
                                        <div class="row g-4">
                                            <div class="col-sm-12 col-md-8 d-flex align-items-center">
                                                <img class="flex-shrink-0 img-fluid border rounded" src="{{ asset('index/img/jobs.png') }}" alt="Job Image" style="width: 80px; height: 80px;">
                                                <div class="text-start ps-4">
                                                    <h5 class="mb-3">{{ $application->jobroll }}</h5>
                                                    <span class="text-truncate me-3"><i class="fa fa-map-marker-alt text-primary me-2"></i>{{ $application->job->location }}</span>
                                                    <span class="text-truncate me-3"><i class="far fa-clock text-primary me-2"></i>{{ $application->job->job_type }}</span>
                                                    <span class="text-truncate me-0"><i class="far fa-money-bill-alt text-primary me-2"></i>{{ $application->job->salary }}</span>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center">
                                                <div class="d-flex mb-3">
                                                    <small class="text-truncate"><i class="fas fa-clipboard-list text-primary me-2"></i>Status: {{ $application->status }}</small>
                                                </div>
                                                <small class="text-truncate"><i class="far fa-calendar-alt text-primary me-2"></i>Applied on: {{ $application->created_at->format('d M, Y') }}</small><br>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                                <!-- Custom Pagination -->
                                <div class="card-body">
                                    <div class="demo">
                                        <ul class="pagination justify-content-center">
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
                                                <li class="page-item {{ $page == $applications->currentPage() ? 'active' : '' }}">
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
                                <!-- End of Custom Pagination -->
                            @else
                                <div class="text-center py-5">
                                    <h5 class="text-muted">No applications found.</h5>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Applications List Section -->


        <!-- Footer Start -->
        <div class="container-fluid bg-dark text-white-50 footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
            <div class="container">
                <div class="copyright">
                    <div class="row">
                        <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                            &copy; <a class="border-bottom" href="#">2024-2025 Job Portal</a>, All Rights Reserved.
                        </div>
                        <div class="col-md-6 text-center text-md-end">
                            <div class="footer-menu">
                                <a href="{{ url('/') }}">Home</a>
                                <a href="{{ url('/contact') }}">Contact</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End -->

        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('index/lib/wow/wow.min.js') }}"></script>
    <script src="{{ asset('index/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('index/lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('index/lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('index/js/main.js') }}"></script>
</body>
</html>
