<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel Authentication Demo</title>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
    <!-- Custom js -->
    <script src="{{ asset('/') }}js/script.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link href="{{ asset('/') }}css/main.css" rel="stylesheet">

</head>

<body>

    <!-- Fixed Header -->
    <header class="navbar navbar-expand navbar-dark fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Laravel Authentication Demo</a>
            <div class="ms-auto dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="{{ asset('/') }}images/dummy_image.jpg" alt="Profile" class="profile-image">
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="{{ route('profile.edit') }}">Profile</a></li>
                    <li class="nav-item">
                        <form method="POST" action="{{ route('logout') }}" id="logout-form">
                            @csrf
                            <a class="dropdown-item" href="#" class="text-blue-300 hover:underline"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Logout
                            </a>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </header>

    @include('layouts.front.sidebar')


    <!-- Main Content Area -->
    <div class="content">
        @yield('content')
    </div>

    <!-- Footer -->
    <footer class="footer">
        <div class="container-fluid text-center">
            <span class="text-muted">&copy; 2024 Your Company</span>
        </div>
    </footer>
</body>

</html>
