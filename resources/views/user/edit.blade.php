<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Job Portal Edit User Profile</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <link
      rel="icon"
      href="{{ asset('assets/img/kaiadmin/favicon.ico') }}"
      type="image/x-icon"
    />

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
                    <a href="{{ url('/') }}" class="nav-item nav-link">Home</a>
                    <a href="{{ route('user.login') }}" class="nav-item nav-link @if(request()->routeIs('user.login')) active @endif">Sign In</a>
                    <a href="{{ route('user.register') }}" class="nav-item nav-link @if(request()->routeIs('user.register')) active @endif">Sign Up</a>
                    <a href="{{ url('/contact') }}" class="nav-item nav-link">Contact</a>
                </div>
                <a href="{{ route('admin.login') }}" class="btn btn-primary rounded-0 py-4 px-lg-4 d-none d-lg-block">Post A Job<i class="fa fa-arrow-right ms-3"></i></a>
            </div>
        </nav>
        <!-- Navbar End -->
        

        <!-- Header End -->
        <div class="container-xxl py-5 bg-dark page-header mb-5">
            <div class="container my-5 pt-5 pb-4">
                <h1 class="display-3 text-white mb-3 animated slideInDown">Edit Your Details</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb text-uppercase">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Pages</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">Edit User</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- Header End -->


        <!-- Edit User Start -->
        <div class="container-xxl py-5">
            <div class="container d-flex justify-content-center">
                <div class="row g-4 justify-content-center">
                    <!-- Edit User Heading -->
                    <div class="col-12 text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">
                        <h1>Edit Your Details</h1>
                    </div>
            
                    <!-- Edit User Form -->
                    <div class="col-md-6 wow fadeInUp" data-wow-delay="0.2s">
                        <form method="POST" action="{{ route('user.update') }}">
                            @csrf
                            @method('PUT') <!-- Spoof the PUT request -->
                            
                            <div class="row g-3">
                                <!-- Name Field -->
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Your Name" value="{{ old('name', $user->name) }}" required>
                                        <label for="name">Your Name</label>
                                        @error('name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                        
                                <!-- Email Field -->
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Your Email" value="{{ old('email', $user->email) }}" required>
                                        <label for="email">Your Email</label>
                                        @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                        
                                <!-- Password Field (Optional) -->
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="New Password (Leave blank to keep current password)">
                                        <label for="password">New Password (Leave blank to keep current password)</label>
                                        @error('password')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                        
                                <!-- Confirm Password Field -->
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password">
                                        <label for="password_confirmation">Confirm Password</label>
                                        @error('password_confirmation')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                        
                                <!-- Submit Button -->
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary w-100">Update Profile</button>
                                </div>
                        
                            </div>
                        </form>                                                
                    </div>
                </div>
            </div>
        </div>        
        <!-- Edit User End -->


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
