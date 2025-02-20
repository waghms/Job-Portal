<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Job Portal User Dashboard</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <link
      rel="icon"
      href="{{ asset('assets/img/kaiadmin/favicon.ico') }}"
      type="image/x-icon"
    />

    <!-- Favicon -->
    {{-- <link href="{{ asset('index/img/favicon.icon') }}" rel="icon"> --}}

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
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->

        <!-- Navbar Start -->
        <nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
            <a href="index.html" class="navbar-brand d-flex align-items-center text-center py-0 px-4 px-lg-5">
                <h1 class="m-0 text-primary">Job Portal</h1>
            </a>
            <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto p-4 p-lg-0">
                    {{-- <a href="{{ url('/') }}" class="nav-item nav-link">Home</a> --}}
                    <a href="{{ route('user.dashboard') }}" class="nav-item nav-link active">Dashboard</a>
                    <a href="{{ route('user.applications') }}" class="nav-item nav-link">My Applications</a>
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


        <!-- Carousel Start -->
        <div class="container-fluid p-0">
            <div class="owl-carousel header-carousel position-relative">
                <div class="owl-carousel-item position-relative">
                    <!-- Use asset() to reference the image -->
                    <img class="img-fluid" src="{{ asset('index/img/carousel-1.jpg') }}" alt="Carousel Image 1">
                    <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center" style="background: rgba(43, 57, 64, .5);">
                        <div class="container">
                            <div class="row justify-content-start">
                                <div class="col-10 col-lg-8">
                                    <h1 class="display-3 text-white animated slideInDown mb-4">Find The Perfect Job That You Deserved</h1>
                                    <p class="fs-5 fw-medium text-white mb-4 pb-2">The perfect job should inspire your creativity, push your boundaries, and offer endless opportunities.</p>
                                    <a href="" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Search A Job</a>
                                    <a href="" class="btn btn-secondary py-md-3 px-md-5 animated slideInRight">Find A Talent</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="owl-carousel-item position-relative">
                    <!-- Use asset() to reference the image -->
                    <img class="img-fluid" src="{{ asset('index/img/carousel-2.jpg') }}" alt="Carousel Image 2">
                    <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center" style="background: rgba(43, 57, 64, .5);">
                        <div class="container">
                            <div class="row justify-content-start">
                                <div class="col-10 col-lg-8">
                                    <h1 class="display-3 text-white animated slideInDown mb-4">Find The Best Startup Job That Fit You</h1>
                                    <p class="fs-5 fw-medium text-white mb-4 pb-2">Explore opportunities where your ideas, energy, and innovation can push the boundaries of what’s possible.</p>
                                    <a href="" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Search A Job</a>
                                    <a href="" class="btn btn-secondary py-md-3 px-md-5 animated slideInRight">Find A Talent</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Carousel End -->

        <!-- Category Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">Explore By Category</h1>
                <div class="row g-4">
                    @foreach ($vacancyCounts as $category => $count)
                        <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                            <a class="cat-item rounded p-4" href="">
                                <i class="fa fa-3x 
                                    @if($category == 'Marketing') fa-mail-bulk
                                    @elseif($category == 'Customer Service') fa-headset
                                    @elseif($category == 'Human Resource') fa-user-tie
                                    @elseif($category == 'Project Management') fa-tasks
                                    @elseif($category == 'Business Development') fa-chart-line
                                    @elseif($category == 'Sales & Communication') fa-hands-helping
                                    @elseif($category == 'Design & Creative') fa-drafting-compass
                                    @elseif($category == 'Others') fa-book-reader
                                    @endif 
                                text-primary mb-4"></i>
                                <h6 class="mb-3">{{ $category }}</h6>
                                <p class="mb-0">{{ $count }} Vacancy{{ $count > 1 ? 's' : '' }}</p>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div> 
        <!-- Category End -->


        <!-- About Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="row g-5 align-items-center">
                    <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                        <div class="row g-0 about-bg rounded overflow-hidden">
                            <div class="col-6 text-start">
                                <img class="img-fluid w-100" src="{{ asset('index/img/about-1.jpg') }}">
                            </div>
                            <div class="col-6 text-start">
                                <img class="img-fluid" src="{{ asset('index/img/about-2.jpg') }}" style="width: 85%; margin-top: 15%;">
                            </div>
                            <div class="col-6 text-end">
                                <img class="img-fluid" src="{{ asset('index/img/about-3.jpg') }}" style="width: 85%;">
                            </div>
                            <div class="col-6 text-end">
                                <img class="img-fluid w-100" src="{{ asset('index/img/about-4.jpg') }}">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                        <h1 class="mb-4">We Help To Get The Best Job And Find A Talent</h1>
                        <p class="mb-4">At Job Portal, we’re not just a job board—we’re your partner in creating meaningful career growth and business success. Whether you're an ambitious job seeker or an organization searching for the right talent, we offer a platform designed to connect you with the best, faster and smarter.</p>
                        <p><i class="fa fa-check text-primary me-3"></i>Explore Job Opportunities That Match Your Skills and Ambitions.</p>
                        <p><i class="fa fa-check text-primary me-3"></i>Grow and Enhance Your Career with Expert Resources.</p>
                        <p><i class="fa fa-check text-primary me-3"></i>Stay Ahead with Real-Time Notifications and Alerts.</p>
                        <p><i class="fa fa-check text-primary me-3"></i>Access to Exclusive Job Listings and Opportunities.</p>
                        <p><i class="fa fa-check text-primary me-3"></i>Personalized Job Recommendations Just for You.</p>
                        <p><i class="fa fa-check text-primary me-3"></i>Easy and Streamlined Job Application Process.</p>
                        <p><i class="fa fa-check text-primary me-3"></i>Build a Professional Profile That Stands Out.</p>   
                        {{-- <a class="btn btn-primary py-3 px-5 mt-3" href="">Read More</a> --}}
                    </div>
                </div>
            </div>
        </div>
        <!-- About End -->
        

        <!-- Jobs List Section -->
        <div class="container-xxl py-5">
            <div class="container">
                <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">Job Listing</h1>
                <div class="tab-class text-center wow fadeInUp" data-wow-delay="0.3s">
                    <div class="tab-content">
                        <!-- All Jobs -->
                        <div class="tab-pane fade show p-0 active">
                            @foreach($Jobs as $job)
                                <div class="job-item p-4 mb-4">
                                    <div class="row g-4">
                                        <div class="col-sm-12 col-md-8 d-flex align-items-center">
                                            <img class="flex-shrink-0 img-fluid border rounded" src="{{ asset('index/img/jobs.png') }}" alt="Job Image" style="width: 80px; height: 80px;">
                                            <div class="text-start ps-4">
                                                <h5 class="mb-3">{{ $job->postname }}</h5>
                                                <span class="text-truncate me-3"><i class="fa fa-map-marker-alt text-primary me-2"></i>{{ $job->location }}</span>
                                                <span class="text-truncate me-3"><i class="far fa-clock text-primary me-2"></i>{{ $job->job_type }}</span>
                                                <span class="text-truncate me-0"><i class="far fa-money-bill-alt text-primary me-2"></i>{{ $job->salary }}</span>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center">
                                            <div class="d-flex mb-3">
                                                <!-- <a class="btn btn-light btn-square me-3" href=""><i class="far fa-heart text-primary"></i></a> -->
                                                <!-- View button linked to job details page -->
                                                <a class="btn btn-primary" href="{{ route('user.jobs.pageDetails', $job->job_id) }}">View</a>
                                            </div>
                                            <small class="text-truncate"><i class="far fa-calendar-alt text-primary me-2"></i>Deadline: {{ $job->last_date }}</small>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                            <!-- If you prefer custom pagination, use the following instead of default one: -->
                            <div class="card-body">
                                <div class="demo">
                                    <ul class="pagination justify-content-center">
                                        <!-- Previous Button -->
                                        @if ($Jobs->onFirstPage())
                                            <li class="page-item disabled">
                                                <a class="page-link" href="#" aria-label="Previous">
                                                    <span aria-hidden="true">&laquo;</span>
                                                    <span class="sr-only">Previous</span>
                                                </a>
                                            </li>
                                        @else
                                            <li class="page-item">
                                                <a class="page-link" href="{{ $Jobs->previousPageUrl() }}" aria-label="Previous">
                                                    <span aria-hidden="true">&laquo;</span>
                                                    <span class="sr-only">Previous</span>
                                                </a>
                                            </li>
                                        @endif

                                        <!-- Page Numbers -->
                                        @foreach ($Jobs->getUrlRange(1, $Jobs->lastPage()) as $page => $url)
                                            <li class="page-item {{ $page == $Jobs->currentPage() ? 'active' : '' }}">
                                                <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                                            </li>
                                        @endforeach

                                        <!-- Next Button -->
                                        @if ($Jobs->hasMorePages())
                                            <li class="page-item">
                                                <a class="page-link" href="{{ $Jobs->nextPageUrl() }}" aria-label="Next">
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
                             
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Jobs List Section -->
        

        <!-- Resume Upload Section -->

        <div class="container-xxl py-5">
            <div class="container">
            <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">Upload Resume</h1>
                <div class="col-lg-12 text-center wow fadeInUp" data-wow-delay="0.1s">
                    <div class="job-item p-4 mb-4">
                        <h4>Upload Your Resume</h4>

                        <!-- Check if the user is authenticated and has a resume -->
                        @auth
                            @if(Auth::user()->resume)
                                <div class="mb-3">
                                    <strong>Current Resume:</strong>
                                    <a href="{{ Storage::url(Auth::user()->resume) }}" target="_blank">View Resume</a>
                                </div>
                            @else
                                <p>No resume uploaded yet.</p>
                            @endif
                        @else
                            <p>Please log in to upload or view your resume.</p>
                        @endauth

                        <!-- Resume Upload Form -->
                        @auth
                        <form action="{{ route('user.uploadResume') }}" method="POST" enctype="multipart/form-data" class="mx-auto" style="max-width: 400px;">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="resume">Choose Resume</label><br><br>
                                <input type="file" class="form-control" name="resume" id="resume">
                                @error('resume')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Upload Resume</button>
                        </form>
                        @endauth
                    </div>
                </div>
            </div>
        </div>

        <!-- Testimonial Start -->
        <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
            <div class="container">
                <h1 class="text-center mb-5">Our Clients Say!!!</h1>
                <div class="owl-carousel testimonial-carousel">
                    <div class="testimonial-item bg-light rounded p-4">
                        <i class="fa fa-quote-left fa-2x text-primary mb-3"></i>
                        <p>Dolor et eos labore, stet justo sed est sed. Diam sed sed dolor stet amet eirmod eos labore diam</p>
                        <div class="d-flex align-items-center">
                            <img class="img-fluid flex-shrink-0 rounded" src="{{ asset('index/img/testimonial-1.jpg') }}" style="width: 50px; height: 50px;">
                            <div class="ps-3">
                                <h5 class="mb-1">Client Name</h5>
                                <small>Profession</small>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-item bg-light rounded p-4">
                        <i class="fa fa-quote-left fa-2x text-primary mb-3"></i>
                        <p>Dolor et eos labore, stet justo sed est sed. Diam sed sed dolor stet amet eirmod eos labore diam</p>
                        <div class="d-flex align-items-center">
                            <img class="img-fluid flex-shrink-0 rounded" src="{{ asset('index/img/testimonial-2.jpg') }}" style="width: 50px; height: 50px;">
                            <div class="ps-3">
                                <h5 class="mb-1">Client Name</h5>
                                <small>Profession</small>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-item bg-light rounded p-4">
                        <i class="fa fa-quote-left fa-2x text-primary mb-3"></i>
                        <p>Dolor et eos labore, stet justo sed est sed. Diam sed sed dolor stet amet eirmod eos labore diam</p>
                        <div class="d-flex align-items-center">
                            <img class="img-fluid flex-shrink-0 rounded" src="{{ asset('index/img/testimonial-3.jpg') }}" style="width: 50px; height: 50px;">
                            <div class="ps-3">
                                <h5 class="mb-1">Client Name</h5>
                                <small>Profession</small>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-item bg-light rounded p-4">
                        <i class="fa fa-quote-left fa-2x text-primary mb-3"></i>
                        <p>Dolor et eos labore, stet justo sed est sed. Diam sed sed dolor stet amet eirmod eos labore diam</p>
                        <div class="d-flex align-items-center">
                            <img class="img-fluid flex-shrink-0 rounded" src="{{ asset('index/img/testimonial-4.jpg') }}" style="width: 50px; height: 50px;">
                            <div class="ps-3">
                                <h5 class="mb-1">Client Name</h5>
                                <small>Profession</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Testimonial End -->


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

    <!-- Template Javascript -->
    <script src="{{ asset('index/js/main.js') }}"></script>
    
</body>

</html>