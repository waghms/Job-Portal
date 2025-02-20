

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Edit profile</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
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
                    {{-- <a href="{{ url('/') }}" class="nav-item nav-link">Home</a> --}}
                    <a href="{{ route('user.dashboard') }}" class="nav-item nav-link">Dashboard</a>
                    <a href="{{ route('user.applications') }}" class="nav-item nav-link">My Applications</a>
                    <a href="{{ url('/user/profile/show') }}" class="nav-item nav-link active">Profile</a>
                    
                    @if(Auth::check())
                        <div class="nav-item dropdown">
                            <a class="btn btn-primary rounded-0 py-4 px-lg-4 d-none d-lg-block" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                {{ Auth::user()->name }}<i class="fa fa-user ms-3"></i>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="{{ route('user.logout') }}">Logout <i class="fa fa-sign-out-alt ms-3"></i></a></li>
                            </ul>
                        </div>
                    @else
                        <a href="{{ route('user.login') }}" class="nav-item nav-link">Profile</a>
                    @endif
                </div>
            </div>
        </nav>
        <!-- Navbar End -->

        <!-- Header Section -->
        <div class="container-xxl py-5 bg-dark page-header mb-5">
            <div class="container my-5 pt-5 pb-4">
            <h1 class="display-3 text-white mb-3 animated slideInDown">Update Profile</h1>
            </div>
        </div>
        
        <!-- Job Application Form -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="row g-4 justify-content-center">
                    <div class="col-md-8">
                        <form action="{{ route('user.profile.update', $profile->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <!-- Personal Details -->
                            <h4>Personal Details</h4>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="firstname">First Name</label>
                                        <input type="text" class="form-control @error('firstname') is-invalid @enderror" name="firstname" value="{{ old('firstname', $profile->firstname) }}" required>
                                        @error('firstname')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="middlename">Middle Name</label>
                                        <input type="text" class="form-control" name="middlename" value="{{ old('middlename', $profile->middlename) }}">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="lastname">Last Name</label>
                                        <input type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{ old('lastname', $profile->lastname) }}" required>
                                        @error('lastname')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="dob">Date of Birth</label>
                                        <input type="date" class="form-control @error('dob') is-invalid @enderror" name="dob" value="{{ old('dob', $profile->dob) }}" required>
                                        @error('dob')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                    </div>
                                </div>
                            </div>

                            <!-- Email and Gender in One Row -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email', $profile->email) }}" required>
                                        @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="gender">Gender</label>
                                        <select name="gender" class="form-control @error('gender') is-invalid @enderror" required>
                                            <option value="Male" {{ old('gender', $profile->gender) == 'Male' ? 'selected' : '' }}>Male</option>
                                            <option value="Female" {{ old('gender', $profile->gender) == 'Female' ? 'selected' : '' }}>Female</option>
                                            <option value="Other" {{ old('gender', $profile->gender) == 'Other' ? 'selected' : '' }}>Other</option>
                                        </select>
                                        @error('gender')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                    </div>
                                </div>
                            </div>

                            <!-- Horizontal Line after Personal Details -->
                            <hr class="my-4">

                            <!-- Address Section -->
                            <h4>Address</h4>
                            <div class="form-group">
                                <label for="address">Address</label>
                                <textarea class="form-control @error('address') is-invalid @enderror" name="address" required>{{ old('address', $profile->address) }}</textarea>
                                @error('address')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>

                            <!-- Country and State in One Row -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="country">Country</label>
                                        <input type="text" class="form-control @error('country') is-invalid @enderror" name="country" value="{{ old('country', $profile->country) }}" required>
                                        @error('country')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="state">State</label>
                                        <input type="text" class="form-control @error('state') is-invalid @enderror" name="state" value="{{ old('state', $profile->state) }}" required>
                                        @error('state')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                    </div>
                                </div>
                            </div>

                            <!-- District and Pincode in One Row -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="district">District</label>
                                        <input type="text" class="form-control @error('district') is-invalid @enderror" name="district" value="{{ old('district', $profile->district) }}" required>
                                        @error('district')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="pincode">Pincode</label>
                                        <input type="text" class="form-control @error('pincode') is-invalid @enderror" name="pincode" value="{{ old('pincode', $profile->pincode) }}" required>
                                        @error('pincode')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                    </div>
                                </div>
                            </div>

                            <!-- Contact Number and Pancard Number in One Row -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="contact_no">Contact Number</label>
                                        <input type="text" class="form-control @error('contact_no') is-invalid @enderror" name="contact_no" value="{{ old('contact_no', $profile->contact_no) }}" required>
                                        @error('contact_no')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="pancard_no">Pancard Number</label>
                                        <input type="text" class="form-control @error('pancard_no') is-invalid @enderror" name="pancard_no" value="{{ old('pancard_no', $profile->pancard_no) }}" required>
                                        @error('pancard_no')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                    </div>
                                </div>
                            </div>

                            <!-- Horizontal Line after Personal Details -->
                            <hr class="my-4">

                            <!-- Education Section -->
                            <h4>Education Details</h4>
                            <div class="form-group">
                                <label for="ssc_highschool_name">SSC Highschool Name</label>
                                <input type="text" class="form-control @error('ssc_highschool_name') is-invalid @enderror" name="ssc_highschool_name" value="{{ old('ssc_highschool_name', $profile->ssc_highschool_name) }}" required>
                                @error('ssc_highschool_name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="ssc_percentage">SSC Percentage</label>
                                        <input type="text" class="form-control @error('ssc_percentage') is-invalid @enderror" name="ssc_percentage" value="{{ old('ssc_percentage', $profile->ssc_percentage) }}" required>
                                        @error('ssc_percentage')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="ssc_passout_year">SSC Passout Year</label>
                                        <input type="text" class="form-control @error('ssc_passout_year') is-invalid @enderror" name="ssc_passout_year" value="{{ old('ssc_passout_year', $profile->ssc_passout_year) }}" required>
                                        @error('ssc_passout_year')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                    </div>
                                </div>
                            </div>

                            <!-- HSC Details -->
                            <div class="form-group">
                                <label for="hsc_highschool_name">HSC Highschool Name</label>
                                <input type="text" class="form-control @error('hsc_college_name') is-invalid @enderror" name="hsc_college_name" value="{{ old('hsc_college_name', $profile->hsc_college_name) }}" required>
                                @error('hsc_highschool_name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="hsc_percentage">HSC Percentage</label>
                                        <input type="text" class="form-control @error('hsc_percentage') is-invalid @enderror" name="hsc_percentage" value="{{ old('hsc_percentage', $profile->hsc_percentage) }}" required>
                                        @error('hsc_percentage')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="hsc_passout_year">HSC Passout Year</label>
                                        <input type="text" class="form-control @error('hsc_passout_year') is-invalid @enderror" name="hsc_passout_year" value="{{ old('hsc_passout_year', $profile->hsc_passout_year) }}" required>
                                        @error('hsc_passout_year')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                    </div>
                                </div>
                            </div>

                            <!-- Graduation Details -->
                            <div class="form-group">
                                <label for="graduation_college_name">Graduation College Name</label>
                                <input type="text" class="form-control @error('graduation_college_name') is-invalid @enderror" name="graduation_college_name" value="{{ old('graduation_college_name', $profile->graduation_college_name) }}" required>
                                @error('graduation_college_name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="graduation_percentage">Graduation Percentage</label>
                                        <input type="text" class="form-control @error('graduation_percentage') is-invalid @enderror" name="graduation_percentage" value="{{ old('graduation_percentage', $profile->graduation_percentage) }}" required>
                                        @error('graduation_percentage')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="graduation_passout_year">Graduation Passout Year</label>
                                        <input type="text" class="form-control @error('graduation_passout_year') is-invalid @enderror" name="graduation_passout_year" value="{{ old('graduation_passout_year', $profile->graduation_passout_year) }}" required>
                                        @error('graduation_passout_year')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                    </div>
                                </div>
                            </div>

                            <!-- Horizontal Line after Personal Details -->
                            <hr class="my-4">

                            <!-- Work Experience Section -->
                            <h4>Work Experience</h4>
                            <div class="form-group">
                                <label for="company_name">Company Name</label>
                                <input type="text" class="form-control @error('company_name') is-invalid @enderror" name="company_name" value="{{ old('company_name', $profile->company_name) }}" required>
                                @error('company_name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="postname">Post Name</label>
                                        <input type="text" class="form-control @error('postname') is-invalid @enderror" name="postname" value="{{ old('postname', $profile->postname) }}" required>
                                        @error('postname')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="location">Location</label>
                                        <input type="text" class="form-control @error('location') is-invalid @enderror" name="location" value="{{ old('location', $profile->location) }}" required>
                                        @error('location')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="work_experience">Work Experience</label>
                                        <input type="text" class="form-control @error('work_experience') is-invalid @enderror" name="work_experience" value="{{ old('work_experience', $profile->work_experience) }}" required>
                                        @error('work_experience')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="profilephoto">Profile Photo</label>
                                        <input type="file" class="form-control" name="profilephoto">
                                    </div>
                                </div>
                            </div>


                            <div class="form-group">
                                <label for="skills">Skills</label>
                                <textarea class="form-control @error('skills') is-invalid @enderror" name="skills" required>{{ old('skills', $profile->skills) }}</textarea>
                                @error('skills')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>

                            <button type="submit" class="btn btn-primary w-100 mt-3">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Job Application Form -->

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

    <!-- Template Javascript -->
    <script src="{{ asset('index/js/main.js') }}"></script>
</body>
</html>
