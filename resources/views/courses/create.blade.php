{{-- @extends('layout')
@section('content') --}}

@extends('layouts.app')
@section('content')

<div class="card">
  <div class="card-header"><nav class="navbar navbar-expand-lg navbar-light d-flex justify-content-center" style="background-color: #bbbdbe ;">Add New Course</div>
  <div class="card-body">

      <form action="{{ route('courses.store') }}" method="POST">
        {{-- {!! csrf_field() !!} --}}
        @csrf
        <label>Name</label></br>
        <input type="text" name="name" id="name" class="form-control"></br>
        <label>Syllabus</label></br>
        <input type="text" name="syllabus" id="syllabus" class="form-control"></br>
        <label>Duration</label></br>
        <input type="number" name="duration" id="durationjjjjjjj" class="form-control"></br>
        <input type="submit" value="Save" class="btn btn-success"></br>
    </form>

  </div>
</div>

@stop
