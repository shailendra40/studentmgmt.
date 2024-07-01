{{-- @extends('layout')
@section('content') --}}

@extends('layouts.app')
@section('content')

<div class="card">
  <div class="card-header">Teacher Details</div>
  <div class="card-body">

        <div class="card-body">
        <h5 class="card-title">Name : {{ $teacher->name }}</h5>
        <p class="card-text">Address : {{ $teacher->address }}</p>
        <p class="card-text">Mobile : {{ $teacher->mobile }}</p>
  </div>

    </hr>

  </div>
</div>
@endsection


{{-- <h5 class="card-title">Name: {{ $teacher[0]->name }}</h5>
<p class="card-text">Address: {{ $teacher[0]->address }}</p>
<p class="card-text">Mobile: {{ $teacher[0]->mobile }}</p> --}}
