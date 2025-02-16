<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <!-- Navbar Search -->
        <li class="nav-item">
            <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                <i class="fas fa-search"></i>
            </a>
            <div class="navbar-search-block">
                <form class="form-inline">
                    <div class="input-group input-group-sm">
                        <input class="form-control form-control-navbar" type="search" placeholder="Search"
                            aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-navbar" type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                            <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </li>
        {{-- <li class="nav-item d-none d-sm-inline-block">
            <a href="index3.html" class="nav-link">Home</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="#" class="nav-link">Contact</a>
        </li> --}}
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        @auth
            <!-- Messages Dropdown Menu -->
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="far fa-regular fa-user"> {{ auth()->user()->name }}</i>
                    {{-- <span class="badge badge-danger navbar-badge">3</span> --}}
                    {{-- <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                        viewBox="0 0 24 24">
                        <style>
                            .user-1 {
                                animation: user-1 1s cubic-bezier(0.83, -0.07, 0, 1.04) both infinite alternate-reverse;
                            }

                            @keyframes user-1 {
                                0% {
                                    transform: translateY(0) translateX(0);
                                }

                                100% {
                                    transform: translateY(-1px) translateX(-2px);
                                }
                            }
                        </style>
                        <circle class="user-1" cx="12" cy="8.245" r="2.5" stroke="#265BFF" stroke-width="1.5" />
                        <ellipse cx="12" cy="15.926" stroke="#0A0A30" stroke-width="1.5" rx="5"
                            ry="2.329">
                    </svg>
                    {{ auth()->user()->name }} --}}

                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item">
                        <form action="/logout" method="post">
                            @csrf
                            <button class="btn" type="submit">
                                Logout
                            </button>
                        </form>
                    </a>
                </div>
            </li>

        @endauth


    </ul>
</nav>
