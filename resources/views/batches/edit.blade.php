{{-- @extends('layout')
@section('content') --}}

@extends('layouts.app')
@section('content')

<div class="card">
  <div class="card-header">Edit Page</div>
  <div class="card-body">

      <form action="{{ route('batches.update', $batch->id) }}" method="POST">
        {!! csrf_field() !!}
        @method("PUT")
        <input type="hidden" name="id" id="id" value="{{$batch->id}}" id="id" />
        <label>Batch Name</label></br>
        <input type="text" name="name" id="name" value="{{$batch->name}}" class="form-control"></br>
        {{-- <label>Course Name</label></br>
        <input type="number" name="course_id" id="course_id" value="{{$batches->course_id}}" class="form-control"></br> --}}

        <label for="course">Select Course:</label>
        <select name="course_id" id="course_id" class="form-control">
        <option selected disabled>Select a course</option>

        @foreach($courses as $course)
        <option value="{{ $course->id }}" {{ $batch->course_id == $course->id ? 'selected' : '' }}>{{ $course->name }}</option>
        @endforeach
        </select></br>

        <label>Start Date</label></br>
        <input type="date" name="start_date" id="start_date" value="{{$batch->start_date}}" class="form-control"></br>
        <input type="submit" value="Update" class="btn btn-success"></br>
    </form>

  </div>
</div>

@stop
