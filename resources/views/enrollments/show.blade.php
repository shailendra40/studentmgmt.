{{-- @extends('layout')
@section('content') --}}

@extends('layouts.app')
@section('content')

<div class="card">
  <div class="card-header">Enrollments Page</div>
  <div class="card-body">

        <div class="card-body">
        <h5 class="card-title">Enroll Number : {{ $enrollments->enroll_no }}</h5>
        <p class="card-text">Batch : {{ $enrollments->batches->name }}</p>
        <p class="card-text">Student : {{ $enrollments->students->name }}</p>
        <p class="card-text">Join Date : {{ $enrollments->join_date }}</p>
        <p class="card-text">Fee : {{ $enrollments->fee }}</p>
  </div>

    </hr>

  </div>
</div>
@endsection
