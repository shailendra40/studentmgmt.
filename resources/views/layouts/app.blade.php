<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Student Management System</title>



    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">



    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>



    {{-- <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    AllPHPTricks.com
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul> --}}

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            @canany(['create-role', 'edit-role', 'delete-role'])
                                <li><a class="nav-link" href="{{ route('roles.index') }}">Manage Roles</a></li>
                            @endcanany
                            @canany(['create-user', 'edit-user', 'delete-user'])
                                <li><a class="nav-link" href="{{ route('users.index') }}">Manage Users</a></li>
                            @endcanany
                            @canany(['create-student', 'edit-student', 'delete-student'])
                                <li><a class="nav-link" href="{{ route('students.index') }}">Manage Students</a></li>
                            @endcanany
                                {{-- ///////////////////////////// --}}
                            @canany(['create-teacher', 'edit-teacher', 'delete-teacher'])
                                <li><a class="nav-link" href="{{ route('teachers.index') }}">Manage Teachers</a></li>
                            @endcanany

                            @canany(['create-course', 'edit-course', 'delete-course'])
                                <li><a class="nav-link" href="{{ route('courses.index') }}">Manage Courses</a></li>
                            @endcanany

                            @canany(['create-batch', 'edit-batch', 'delete-batch'])
                                <li><a class="nav-link" href="{{ route('batches.index') }}">Manage Batches</a></li>
                            @endcanany

                            @canany(['create-enrollment', 'edit-enrollment', 'delete-enrollment'])
                                <li><a class="nav-link" href="{{ route('enrollments.index') }}">Manage Enrollments</a></li>
                            @endcanany

                            @canany(['create-payment', 'edit-payment', 'delete-payment'])
                                <li><a class="nav-link" href="{{ route('payments.index') }}">Manage Payments</a></li>
                            @endcanany

                            @canany(['create-role', 'edit-role', 'delete-role'])
                                <li><a class="nav-link" href="{{ route('roles.index') }}">Manage Roles</a></li>
                            @endcanany

                            @canany(['create-user', 'edit-user', 'delete-user'])
                                <li><a class="nav-link" href="{{ route('users.index') }}">Manage Users</a></li>
                            @endcanany


                                {{-- ///////////////////////////// --}}
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            <div class="container">
                <div class="row justify-content-center mt-3">
                    <div class="col-md-12">

                        @if ($message = Session::get('success'))
                            <div class="alert alert-success text-center" role="alert">
                                {{ $message }}
                            </div>
                        @endif

                        {{-- <h3 class="text-center mt-3 mb-3">Simple Laravel 10 User Roles and Permissions - <a href="https://www.allphptricks.com/">AllPHPTricks.com</a></h3>
                        @yield('content')

                        <div class="row justify-content-center text-center mt-3">
                            <div class="col-md-12">
                                <p>Back to Tutorial:
                                    <a href="https://www.allphptricks.com/simple-laravel-10-user-roles-and-permissions/"><strong>Tutorial Link</strong></a>
                                </p>
                                <p>
                                    For More Web Development Tutorials Visit: <a href="https://www.allphptricks.com/"><strong>AllPHPTricks.com</strong></a>
                                </p>
                            </div>
                        </div> --}}


                    </div>
                </div>
            </div>
        </main>
    </div>











    <style>
        /* The side navigation menu */
    .sidebar {
      /* margin: 0;
      padding: 0; */
      /* width: 200px; */
      width: 250px;
      background-color: #f1f1f1;

      overflow-y: auto; /* Add this line to enable vertical scroll */
      max-height: 100vh; /* Set a maximum height for the sidebar */

      /* BIGG ERROR INVEST 3HR. */

      /* position: fixed; */

      padding: 10px; /* Add padding for better appearance */
      height: 100%;

      overflow: hidden;
      transition: width 0.5s; /* Add transition effect */

      overflow: auto;
    }

    /* Sidebar links */
    .sidebar a {
      display: block;
      color: black;
      padding: 16px;
      text-decoration: none;

      transition: padding 0.5s; /* Add transition effect */
    }

    /* Active/current link */
    .sidebar a.active {
      background-color: #04AA6D;
      color: white;
    }

    /* Links on mouse-over */
    .sidebar a:hover:not(.active) {
      background-color: #555;
      color: white;

      padding-left: 20px; /* Change padding on hover */
    }

    /* Page content. The value of the margin-left property should match the value of the sidebar's width property */
    div.content {
      margin-left: 250px;
      padding: 1px 16px;
      /* height: 1000px; */
      min-height: 100vh; /* Set minimum height to full viewport height */

      overflow-y: auto; /* Add scroll to the content */

      /* Add transition effect */
      transition: margin-left 0.5s;
    }

    /* Optional: Adjust scrollbar appearance */
    .sidebar::-webkit-scrollbar {
        width: 8px; /* Set the width of the scrollbar */
    }

    .sidebar::-webkit-scrollbar-thumb {
        background-color: #ccc; /* Set the color of the scrollbar thumb */
    }

    .sidebar::-webkit-scrollbar-track {
        background-color: #f1f1f1; /* Set the color of the scrollbar track */
    }

    /* On screens that are less than 700px wide, make the sidebar into a topbar */
    @media screen and (max-width: 700px) {
      .sidebar {
        width: 100%;
        height: auto;
        position: relative;
      }
      .sidebar a {float: left;}
      div.content {margin-left: 0;}
    }

    /* On screens that are less than 400px, display the bar vertically, instead of horizontally */
    @media screen and (max-width: 400px) {
      .sidebar a {
        text-align: center;
        float: none;
      }
    }
        </style>











    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>


    <div class="container">
        <div class="row">
            <div class="col-md-12">
                {{-- <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <a class="navbar-brand" href="#">
                        <h2>SCHOOL MANAGEMENT SYSTEM</h2>
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </nav> --}}



                {{-- <nav class="navbar navbar-expand-lg navbar-light" style="background-color: skyblue;">
                    <a class="navbar-brand d-flex justify-content-center" href="#">
                        <h2>SCHOOL MANAGEMENT SYSTEM</h2>
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </nav> --}}


                {{-- <div class="container mx-auto">
                    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: skyblue;">
                        <a class="navbar-brand" href="#">
                            <h2>SCHOOL MANAGEMENT SYSTEM</h2>
                        </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                    </nav>
                </div> --}}


                {{-- <nav class="navbar navbar-expand-lg navbar-light d-flex justify-content-center" style="background-color: skyblue;">
                    <a class="navbar-brand mx-auto" href="#">
                        <h2>SCHOOL MANAGEMENT SYSTEM</h2>
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </nav> --}}

                <nav class="navbar navbar-expand-lg navbar-light d-flex justify-content-center mt-2" style="background-color: skyblue;">
                    <a class="navbar-brand mx-auto" href="#">
                        <h2>SCHOOL MANAGEMENT SYSTEM</h2>
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </nav>


            </div>
        </div>
    {{-- </div> --}}
    <div class="row">
        <div class = "col-md-3">
                <div class="sidebar">
                {{-- <a href="#home"><i class="fas fa-home"></i> Home</a> --}}
                {{-- <a href="#home">Home {{ request()->route()->getName() }} {{  request()->routeIs }}</a> --}}

                {{-- <a class="{{ request()->routeIs('layout') ? 'active' : '' }}" href="{{ route('layout')}}"><i class="fas fa-home"></i> Home</a> --}}

                {{-- <a class="{{ request()->is('home') ? 'active' : '' }}" href="{{ url('/home') }}"><i class="fas fa-home"></i> Home</a> --}}
                <a class="{{ request()->is('home') ? 'active' : '' }}" href="{{ route('home') }}"><i class="fas fa-home"></i> Home</a>


                <a class="{{ request()->routeIs('students.index', 'students.create', 'students.show', 'students.edit', 'students.update', ) ? 'active' : '' }}" href="{{ route('students.index') }}"><i class="fas fa-user"></i> Student</a>
                <a class="{{ request()->routeIs('teachers.index', 'teachers.create', 'teachers.show', 'teachers.edit', 'teachers.update', ) ? 'active' : '' }}" href="{{ route('teachers.index') }}"><i class="fas fa-chalkboard-teacher"></i> Teacher</a>
                <a class="{{ request()->routeIs('courses.index', 'courses.create', 'courses.show', 'courses.edit', 'courses.update', ) ? 'active' : '' }}" href="{{ route('courses.index') }}"><i class="fas fa-book"></i> Courses</a>
                <a class="{{ request()->routeIs('batches.index', 'batches.create', 'batches.show', 'batches.edit', 'batches.update', ) ? 'active' : '' }}" href="{{ route('batches.index') }}"><i class="fas fa-layer-group"></i> Batches</a>
                <a class="{{ request()->routeIs('enrollments.index', 'enrollments.create', 'enrollments.show', 'enrollments.edit', 'enrollments.update', ) ? 'active' : '' }}" href="{{ route('enrollments.index') }}"><i class="fas fa-address-book"></i> Enrollment</a>
                {{-- <a class="{{ request()->routeIs('payments.index') ? 'active' : '' }}" href="{{ url('/payments') }}">Payment</a> --}}

                {{-- <a class="{{ request()->routeIs('payments.*') ? 'active' : '' }}" href="{{ url('/payments') }}">Payment</a> --}}
                <a class="{{ request()->routeIs(['payments.index', 'payments.create', 'payments.show', 'payments.edit']) ? 'active' : '' }}" href="{{ route('payments.index') }}"><i class="fas fa-money-check"></i> Payment</a>
                <a class="{{ request()->routeIs(['roles.index', 'roles.create', 'roles.show', 'roles.edit']) ? 'active' : '' }}" href="{{ route('roles.index') }}"><i class="fas fa-user-shield"></i> Role Management</a>
                <a class="{{ request()->routeIs(['users.index', 'users.create', 'users.show', 'users.edit']) ? 'active' : '' }}" href="{{ route('users.index') }}"><i class="fas fa-users"></i> User Management</a>
                </div>
            </div>

            <div class="col-md-9">
            {{-- <div class="col-md-3"> --}}
                {{-- <div class="content"> --}}
                      @yield('content')
                      {{-- <div class="content" style="max-height: 80vh; overflow-y: auto;" class="text-center mt-3 font-italic"> --}}
                        <div class="content" style="max-height: 80vh; overflow-y: auto; margin-top: 2rem; font-style: italic;">
                    <div >
                        This is School Management Project &copy; 2024
                    </div>
                {{-- </div> --}}
            </div>

            {{-- <div class="col-md-9">
                <div class="content" style="max-height: 80vh; overflow-y: auto;">
                    @yield('content')
                </div>
            </div>
kkkkkmmm5000 --}}

    </div>
</div>









</body>
</html>
