<!-- resources/views/layouts/user.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <!-- Add any CSS files here -->
</head>
<body>

    <!-- User Header Section -->
    <header>
        <nav>
            <!-- Navigation links -->
            <a href="{{ route('user.dashboard') }}">Dashboard</a>
            <a href="{{ route('user.logout') }}">Logout</a>
        </nav>
    </header>

    <!-- Main content section -->
    <main>
        @yield('content')
    </main>

    <!-- Footer Section -->
    <footer>
        <p>© 2024 User Panel</p>
    </footer>

</body>
</html>