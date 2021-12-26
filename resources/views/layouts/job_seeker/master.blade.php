<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
        @yield('title')
    </title>
    {{-- font awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('custom/css/custom.css') }}">
</head>

<body>
    <nav class="profile_nav navbar navbar-expand-md navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="#">
                @yield('title')
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <img src="https://cahsi.utep.edu/wp-content/uploads/kisspng-computer-icons-user-clip-art-user-5abf13db5624e4.1771742215224718993529.png"
                    alt="user_img" width="35">
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item d-md-none">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <a class="nav-link" href="route('logout')" onclick="event.preventDefault();
                                this.closest('form').submit();">
                                Log out
                            </a>
                        </form>
                    </li>
                    <li class="nav-item dropdown d-md-flex align-items-center d-none">
                        <img src="https://cahsi.utep.edu/wp-content/uploads/kisspng-computer-icons-user-clip-art-user-5abf13db5624e4.1771742215224718993529.png"
                            alt="user_img" width="35">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            {{ auth()->user()->name }}
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">Profile</a></li>
                            <li><a class="dropdown-item" href="#">Setting</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <a class="dropdown-item" href="route('logout')" onclick="event.preventDefault();
                                        this.closest('form').submit();">
                                        Log out
                                    </a>
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="profile_header container-fluid">
        <div class="container profile_header_content">
            <div class="d-flex align-items-center">
                <img src="https://cahsi.utep.edu/wp-content/uploads/kisspng-computer-icons-user-clip-art-user-5abf13db5624e4.1771742215224718993529.png"
                    alt="user_img" width="35">
                <h4 class="p-3">My profile</h4>
            </div>
        </div>
    </div>
    <main class="container main_content">
        <ul class="nav nav-pills mb-3 justify-content-center" id="pills-tab" role="tablist">
            <li class="nav-item">
                <a href="/profile">
                    <button class="nav-link {{ Request::is('profile') ? 'active' : '' }}">
                        <i class="fas fa-user-tie me-1"></i>
                        <span>Profile</span> 
                    </button>
                </a>
            </li>

            <li class="nav-item">
                <a href="/profile/create/education-info">
                    <button class="nav-link {{ Request::is('profile/*/education-info*') ? 'active' : '' }}">
                        <i class="fas fa-school me-1"></i>
                        <span>Education</span>
                    </button>
                </a>
            </li>

            <li class="nav-item">
                <a href="/profile/create/experience-info">
                    <button class="nav-link {{ Request::is('profile/*/experience-info*') ? 'active' : '' }}">
                        <i class="fas fa-briefcase me-1"></i>
                        <span>Experience</span>
                    </button>
                </a>
            </li>

            <li class="nav-item">
                <a href="/profile/create/experience-info">
                    <button class="nav-link {{ Request::is('profile/*/skill*') ? 'active' : '' }}">
                        <i class="fas fa-tasks me-1"></i>
                        <span>Skill</span>
                    </button>
                </a>
            </li>

        </ul>
        <div class="tab-content" id="pills-tabContent">
            @yield('content')
        </div>
        
    </main>

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    @yield('scripts')
</body>

</html>
