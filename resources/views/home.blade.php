{{-- @extends('layout')
@section('content') --}}

@extends('layouts.app')
@section('content')




{{-- //this line of code take from laravel-10-proj. from || home.blade.php--}}

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}

                    <p>This is your application dashboard.</p>
                    @canany(['create-role', 'edit-role', 'delete-role'])
                        <a class="btn btn-primary" href="{{ route('roles.index') }}">
                            <i class="bi bi-person-fill-gear"></i> Manage Roles</a>
                    @endcanany
                    @canany(['create-user', 'edit-user', 'delete-user'])
                        <a class="btn btn-success" href="{{ route('users.index') }}">
                            <i class="bi bi-people"></i> Manage Users</a>
                    @endcanany
                    @canany(['create-student', 'edit-student', 'delete-student'])
                        <a class="btn btn-warning" href="{{ route('students.index') }}">
                            <i class="bi bi-bag"></i> Manage Students</a>
                    @endcanany
                    @canany(['create-teacher', 'edit-teacher', 'delete-teacher'])
                        <a class="btn btn-warning" href="{{ route('teachers.index') }}">
                            <i class="bi bi-bag"></i> Manage Teachers</a>
                    @endcanany
                    @canany(['create-course', 'edit-course', 'delete-course'])
                        <a class="btn btn-warning" href="{{ route('courses.index') }}">
                            <i class="bi bi-bag"></i> Manage Courses</a>
                    @endcanany
                    @canany(['create-batch', 'edit-batch', 'delete-batch'])
                        <a class="btn btn-warning" href="{{ route('batches.index') }}">
                            <i class="bi bi-bag"></i> Manage Batches</a>
                    @endcanany
                    @canany(['create-enrollment', 'edit-enrollment', 'delete-enrollment'])
                        <a class="btn btn-warning" href="{{ route('enrollments.index') }}">
                            <i class="bi bi-bag"></i> Manage Enrollments</a>
                    @endcanany
                    @canany(['create-payment', 'edit-payment', 'delete-payment'])
                        <a class="btn btn-warning" href="{{ route('payments.index') }}">
                            <i class="bi bi-bag"></i> Manage Payments</a>
                    @endcanany
                    <p>&nbsp;</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection













{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>School Management System</title> --}}



<style>
        body {
            margin: 0;
            /* padding: 0; */
            font-family: Arial, sans-serif;
        }

        header {
            background-color: #333;
            color: white;
            padding: 10px;
            text-align: center;
        }

        nav {
            background-color: #555;
            /* padding: 10px; */
            text-align: center;
            overflow: hidden;
        }

        nav a {
            /* float: left; */
            /* display: block; */
            display: inline-block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        main {
            padding: 20px;
            text-align: center;
        }
        nav a:hover {
            background-color: #ddd;
            color: black;
        }

    </style>

</head>
<body>

    <header>
        <h1>SCHOOL MANAGEMENT SYSTEM</h1>
    </header>

    <div class="fixed-title">
        <h1>STUDENT MANAGEMENT SYSTEM</h1>
    </div>

    <style>
        .fixed-title {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            background-color: #f1f1f1;
            padding: 10px;
            text-align: center;
        }
    </style>

    <nav>
        <!-- Your navigation links go here -->
        <a href="/">Home</a>
        <a href="/students">Students</a>
        <a href="/teachers">Teachers</a>
        <a href="/courses">Courses</a>
        <a href="/batches">Batches</a>
        <a href="/enrollments">Enrollment</a>
        <a href="/payments">Payments</a>
        <a href="/roles">Role Management</a>
        <a href="/users">User Management</a>

        {{-- Also add Same button login & singnout | Logout reverse --}}
        <a href="/login">Login</a>
        <a href="/signup">SignUp</a>

    </nav>

    <main>
        <!-- Your main content goes here -->
        <h2>Welcome to the School Management System</h2>
        <p>This is the main content area under the navbar.</p>
    </main>

</body>
</html>
