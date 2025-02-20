<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Job Portal Aptitude Test</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <link rel="icon" href="{{ asset('assets/img/kaiadmin/favicon.ico') }}" type="image/x-icon" />

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

        <!-- Header End -->
        <div class="container-xxl py-5 bg-dark page-header mb-5">
            <div class="container my-5 pt-5 pb-4">
                <h1 class="display-3 text-white mb-3 animated slideInDown">Aptitude Test</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb text-uppercase">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Pages</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">Aptitude Test</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- Header End -->

        <!-- Aptitude Test Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">Aptitude Test</h1>

                <div class="row g-4">
                    <div class="col-12">
                        <div class="row gy-4">
                            <div class="col-md-4 wow fadeIn" data-wow-delay="0.1s">
                                <div class="d-flex align-items-center bg-light rounded p-4">
                                    <div class="bg-white border rounded d-flex flex-shrink-0 align-items-center justify-content-center me-3" style="width: 45px; height: 45px;">
                                        <i class="fa fa-hourglass-start text-primary"></i> 
                                    </div>
                                    <span>Remaining Time: <span id="time">20:00</span> Minutes</span>
                                </div>
                            </div>
                            <div class="col-md-4 wow fadeIn" data-wow-delay="0.3s">
                                <div class="d-flex align-items-center bg-light rounded p-4">
                                    <div class="bg-white border rounded d-flex flex-shrink-0 align-items-center justify-content-center me-3" style="width: 45px; height: 45px;">
                                        <i class="fa fa-clock text-primary"></i> 
                                    </div>
                                    <span>Total Time: 20:00 Minutes</span>
                                </div>
                            </div>
                            <div class="col-md-4 wow fadeIn" data-wow-delay="0.5s">
                                <div class="d-flex align-items-center bg-light rounded p-4">
                                    <div class="bg-white border rounded d-flex flex-shrink-0 align-items-center justify-content-center me-3" style="width: 45px; height: 45px;">
                                        <i class="fa fa-check-circle text-primary"></i>
                                    </div>
                                    <span>Total Marks: 100</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 wow fadeInUp" data-wow-delay="0.1s">
                        <div id="testSection">
                            <form action="{{ route('user.aptitude.test.submit', ['job_id' => $job_id]) }}" method="POST" id="aptitudeTestForm">
                                @csrf
                                @foreach ($questions as $index => $question)
                                <div class="question" data-question-id="{{ $question->id }}" style="display: none;">
                                    <h3 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s"><strong>Type:</strong> {{ $question->type }}</h3>
                                    <h4>Question {{ $index + 1 }}: {{ $question->question }}</h4>

                                    <label style="font-size: 18px;">
                                        <input type="radio" name="answers[{{ $question->id }}]" value="a">
                                        {{ $question->option_a }}
                                    </label><br>
                                    <label style="font-size: 18px;">
                                        <input type="radio" name="answers[{{ $question->id }}]" value="b">
                                        {{ $question->option_b }}
                                    </label><br>
                                    <label style="font-size: 18px;">
                                        <input type="radio" name="answers[{{ $question->id }}]" value="c">
                                        {{ $question->option_c }}
                                    </label><br>
                                    <label style="font-size: 18px;">
                                        <input type="radio" name="answers[{{ $question->id }}]" value="d">
                                        {{ $question->option_d }}
                                    </label><br><br>
                                </div>
                                @endforeach

                                <!-- Navigation Buttons -->
                                <button class="btn btn-primary w-40 py-2" type="button" id="prevBtn" style="display: inline; margin-right: 10px;padding-right: 40px;padding-left: 40px;">Back</button>
                                <button class="btn btn-primary w-40 py-2" type="button" id="nextBtn" style="padding-right: 40px;padding-left: 40px;">Next</button>
                                <button class="btn btn-primary w-40 py-2" type="submit" id="submitBtn" style="display: none; padding-right: 40px;padding-left: 40px;">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Aptitude Test End -->

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

    <script>
        let currentQuestionIndex = 0;
        const totalQuestions = {{ count($questions) }};
        let timer = 20 * 60;  // 20 minutes in seconds
        let timerInterval;

        // Start the timer immediately
        startTimer();
        showQuestion(0);

        // Timer functionality
        function startTimer() {
            timerInterval = setInterval(function () {
                let minutes = Math.floor(timer / 60);
                let seconds = timer % 60;
                document.getElementById('time').textContent = `${minutes}:${seconds < 20 ? '0' : ''}${seconds}`;
                timer--;

                // Stop the timer and submit the form when time is up
                if (timer < 0) {
                    clearInterval(timerInterval);
                    document.getElementById('aptitudeTestForm').submit();  // Automatically submit the form when time is up
                }
            }, 1000);
        }

        // Show question based on index
        function showQuestion(index) {
            const questions = document.querySelectorAll('.question');
            questions.forEach((question) => question.style.display = 'none');
            questions[index].style.display = 'block';

            // Show Next and Back buttons as needed
            document.getElementById('prevBtn').style.display = index > 0 ? 'inline' : 'none';
            document.getElementById('nextBtn').style.display = index < totalQuestions - 1 ? 'inline' : 'none';
            document.getElementById('submitBtn').style.display = index === totalQuestions - 1 ? 'inline' : 'none';
        }

        // Next button functionality
        document.getElementById('nextBtn').addEventListener('click', function () {
            if (currentQuestionIndex < totalQuestions - 1) {
                currentQuestionIndex++;
                showQuestion(currentQuestionIndex);
            }
        });

        // Previous button functionality
        document.getElementById('prevBtn').addEventListener('click', function () {
            if (currentQuestionIndex > 0) {
                currentQuestionIndex--;
                showQuestion(currentQuestionIndex);
            }
        });

        // Submit button confirmation
        document.getElementById('submitBtn').addEventListener('click', function (e) {
            const confirmation = confirm("Are you sure you want to submit the test?");
            if (!confirmation) {
                e.preventDefault(); // Prevent form submission if user cancels
            }
        });

        // Disable text selection and copying
        document.addEventListener('copy', function (e) {
            e.preventDefault(); // Prevent the copy event
            alert("Copying is disabled on this page.");
        });

        // Optional: Prevent text selection using CSS
        document.body.style.userSelect = 'none'; // Disable selection across the page

        // Disable the back navigation by manipulating the browser history
        window.history.pushState(null, null, window.location.href);
        window.onpopstate = function () {
            window.history.pushState(null, null, window.location.href);
        };

        // Prevent page refresh or navigation away with a warning
        window.addEventListener("beforeunload", function (e) {
            e.preventDefault();
            e.returnValue = ''; // Standard for most browsers
            return ''; // For some older browsers
        });
    </script>
</body>

</html>
