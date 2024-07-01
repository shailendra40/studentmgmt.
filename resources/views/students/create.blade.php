{{-- @extends('layout')
@section('content') --}}

@extends('layouts.app')
@section('content')

<div class="card">
  <div class="card-header">
    <nav class="navbar navbar-expand-lg navbar-light d-flex justify-content-center" style="background-color: #bbbdbe ;">Add New Student</nav>
</div>
  <div class="card-body">
      {{-- <form action="{{ url('students') }}" method="post"> --}}
      <form action="{{ route('students.store') }}" method="POST">
        @csrf
        {{-- {!! csrf_field() !!} --}}
        <label>Name</label></br>
        <input type="text" name="name" id="name" class="form-control"></br>
        <label>Address</label></br>
        <input type="text" name="address" id="address" class="form-control"></br>
        <label>Mobile</label></br>
        <input type="number" name="mobile" id="mobile" class="form-control"></br>
        <input type="submit" value="Save" class="btn btn-success"></br>
    </form>

  </div>
</div>

@stop
