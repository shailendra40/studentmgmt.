{{-- @extends('layout')
@section('content')

<div class="card">
  <div class="card-header">Student Details</div>
  <div class="card-body">
        <h5 class="card-title">Name : {{ $student->name }}</h5>
        <p class="card-text">Address : {{ $student->address }}</p>
        <p class="card-text">Mobile : {{ $student->mobile }}</p>
  </div>
  </div>
@endsection --}}


<!-- students.show.blade.php -->

{{-- @extends('layout')
@section('content') --}}

@extends('layouts.app')
@section('content')

    <div class="card">
        <div class="card-header">Student Details</div>
        <div class="card-body">
            <h5 class="card-title">Name: {{ $student->name }}</h5>
            <p class="card-text">Address: {{ $student->address }}</p>
            <p class="card-text">Mobile: {{ $student->mobile }}</p>

            <!-- Edit link -->
            <a href="{{ route('students.edit', $student->slug) }}" class="btn btn-primary">Edit Student</a>
            {{-- <a href="{{ route('students.edit', $student->slug) }}">Edit</a> --}}

        </div>
    </div>
@endsection
