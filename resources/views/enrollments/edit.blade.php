{{-- @extends('layout')
@section('content') --}}

@extends('layouts.app')
@section('content')

<div class="card">
  <div class="card-header">Edit Page</div>
  <div class="card-body">

      <form action="{{ route('enrollments.update', $enrollments->id) }}" method="post">
        {!! csrf_field() !!}
        @method("PUT")
        <input type="hidden" name="id" id="id" value="{{$enrollments->id}}" id="id" />

        <label>Enroll No</label></br>
        <input type="text" name="enroll_no" id="enroll_no" class="form-control" value="{{$enrollments->enroll_no}}"></br>

        {{-- <label>Batch</label></br>
        <input type="text" name="batch_id" id="batch_id" class="form-control" value="{{$enrollments->batch_id}}"></br>

        <label>Student</label></br>
        <input type="number" name="student_id" id="student_id" class="form-control" value="{{$enrollments->student_id}}"></br> --}}


        <label for="batch">Select Batch:</label>
        <select name="batch_id" id="batch_id" class="form-control">
        <option selected disabled>Select a batch</option>
        @foreach($batches as $batch)
        <option value="{{ $batch->id }}" {{ $enrollments->batch_id == $batch->id ? 'selected' : '' }}>{{ $batch->name }}</option>
        @endforeach
        </select></br>

        <label for="student">Select Student:</label>
        <select name="student_id" id="student_id" class="form-control">
        <option selected disabled>Select a student</option>
        @foreach($students as $student)
        <option value="{{ $student->id }}" {{ $enrollments->student_id == $student->id ? 'selected' : '' }}>{{ $student->name }}</option>
        @endforeach
        </select></br>


        <label>Join Date</label></br>
        <input type="date" name="join_date" id="join_date" class="form-control" value="{{$enrollments->join_date}}"></br>

        <label>Fee</label></br>
        <input type="number" name="fee" id="fee" class="form-control" value="{{$enrollments->fee}}"></br>

        <input type="submit" value="Update" class="btn btn-success"></br>

    </form>

  </div>
</div>

@stop
