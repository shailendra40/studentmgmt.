{{-- @extends('layout')
@section('content') --}}

@extends('layouts.app')
@section('content')

<div class="card">
  <div class="card-header">Batch Details</div>
  <div class="card-body">

        <div class="card-body">
        <h5 class="card-title">Name : {{ $batch->name }}</h5>
        <p class="card-text">Course Name : {{ $batch->courses->name }}</p>
        <p class="card-text">Start Date : {{ $batch->start_date }}</p>
  </div>

    </hr>

  </div>
</div>
@endsection
