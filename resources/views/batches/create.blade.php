{{-- @extends('layout')
@section('content') --}}

@extends('layouts.app')
@section('content')

<div class="card">
  <div class="card-header"><nav class="navbar navbar-expand-lg navbar-light d-flex justify-content-center" style="background-color: #bbbdbe ;">Add New Batch</div>
  <div class="card-body">

      <form action="{{ route('batches.store') }}" method="POST">
        {!! csrf_field() !!}
        <label>Batch Name</label></br>
        <input type="text" name="name" id="name" class="form-control"></br>

        <label for="course">Select Course:</label>
        <select name="course_id" id="course_id" class="form-control">
        <option selected disabled>Select a course</option>

        @foreach($courses as $course)
        <option value="{{ $course->id }}">{{ $course->name }}</option>
        @endforeach
        </select></br>

        <label>Start Date</label></br>
        <input type="date" name="start_date" id="start_date" class="form-control"></br>
        <input type="submit" value="Save" class="btn btn-success"></br>
    </form>

  </div>
</div>

@stop
