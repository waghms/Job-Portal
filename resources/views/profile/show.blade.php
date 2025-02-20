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
            <a href="index.html" class="navbar-brand d-flex align-items-center text-center py-0 px-4 px-lg-5">
                <h1 class="m-0 text-primary">Job Portal</h1>
            </a>
            <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto p-4 p-lg-0">
                    {{-- <a href="{{ url('/') }}" class="nav-item nav-link">Home</a> --}}
                    <a href="{{ route('user.dashboard') }}" class="nav-item nav-link">Dashboard</a>
                    <a href="{{ route('user.applications') }}" class="nav-item nav-link">My Applications</a>
                    <a href="{{ url('/user/profile/show') }}" class="nav-item nav-link active">Profile</a>
                    
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
                <h1 class="display-3 text-white mb-3 animated slideInDown">Your Profile</h1>
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

        <!-- Profile Details Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">Profile Information</h1>
                
                {{-- @if(session('message'))
                    <div class="alert alert-success">{{ session('message') }}</div>
                @endif --}}
                
                @if($profile)
                    <div class="row g-4">
                        <div class="col-md-6">
                            <div class="profile-detail bg-light rounded p-4 wow fadeInUp" data-wow-delay="0.1s">
                                <p><strong>First Name:</strong> {{ $profile->firstname }}</p>
                                <p><strong>Last Name:</strong>  {{ $profile->lastname }}</p>
                                <p><strong>Email:</strong> {{ $profile->email }}</p>
                                <p><strong>Date of Birth:</strong> {{ $profile->dob }}</p>
                                <p><strong>Gender:</strong> {{ $profile->gender }}</p>
                                <p><strong>Contact Number:</strong> {{ $profile->contact_no }}</p>
                                <p><strong>Address:</strong> {{ $profile->address }}</p>
                                <p><strong>Country:</strong> {{ $profile->country }}</p>
                                <p><strong>State:</strong> {{ $profile->state }}</p>
                                <p><strong>District:</strong> {{ $profile->district }}</p>
                                <p><strong>Pincode:</strong> {{ $profile->pincode }}</p>
                                <p><strong>Pancard Number:</strong> {{ $profile->pancard_no }}</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="profile-detail bg-light rounded p-4 wow fadeInUp" data-wow-delay="0.3s">
                                <p><strong>High School Name:</strong> {{ $profile->ssc_highschool_name }}</p>
                                <p><strong>SSC Percentage:</strong> {{ $profile->ssc_percentage }}%</p>
                                <p><strong>SSC Passout Year:</strong> {{ $profile->ssc_passout_year }}</p>
                                <p><strong>HSC College Name:</strong> {{ $profile->hsc_college_name }}</p>
                                <p><strong>HSC Percentage:</strong> {{ $profile->hsc_percentage }}%</p>
                                <p><strong>HSC Passout Year:</strong> {{ $profile->hsc_passout_year }}</p>
                                <p><strong>Graduation College Name:</strong> {{ $profile->graduation_college_name }}</p>
                                <p><strong>Graduation Percentage:</strong> {{ $profile->graduation_percentage }}%</p>
                                <p><strong>Graduation Passout Year:</strong> {{ $profile->graduation_passout_year }}</p>
                                <p><strong>Skills:</strong> {{ $profile->skills }}</p>
                                <p><strong>Company Name:</strong> {{ $profile->company_name }}</p>
                                <p><strong>Work Experience:</strong> {{ $profile->work_experience }}</p>
                            </div>
                        </div>
                    </div>

                     
                    <!-- Back Button -->
					<div class="d-flex justify-content-center mt-4">
						<a href="{{ route('user.dashboard') }}" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Back</a>

                    <!-- Edit Button -->
                        <a href="{{ route('user.profile.edit', $profile->id) }}" class="btn btn-secondary py-md-3 px-md-5 me-3 animated slideInRight">Edit</a>
                    </div>

                    
                @else
                    <p class="text-center">No profile details available.</p>
                @endif
            </div>
        </div>
        <!-- Profile Details End -->

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
