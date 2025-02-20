<!-- resources/views/layouts/admin.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- Add any CSS files here -->
</head>
<body>

    <!-- Admin Header Section -->
    <header>
        <nav>
            <!-- Navigation links -->
            <a href="{{ route('admin.dashboard') }}">Dashboard</a>
            <a href="{{ route('admin.logout') }}">Logout</a>
        </nav>
    </header>

    <!-- Main content section -->
    <main>
        @yield('content')
    </main>

    <!-- Footer Section -->
    <footer>
        <p>© 2024 Admin Panel</p>
    </footer>

</body>
</html>