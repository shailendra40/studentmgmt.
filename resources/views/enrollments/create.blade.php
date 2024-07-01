{{-- @extends('layout')
@section('content') --}}

@extends('layouts.app')
@section('content')

<div class="card">
  <div class="card-header"><nav class="navbar navbar-expand-lg navbar-light d-flex justify-content-center" style="background-color: #bbbdbe ;">Add New Enrollment</div>
  <div class="card-body">

      <form action="{{ route('enrollments.store') }}" method="POST">
        {{-- {!! csrf_field() !!} --}}
        @csrf
        <label>Enroll No</label></br>
        <input type="text" name="enroll_no" id="enroll_no" class="form-control"></br>

        {{-- <label>Batch</label></br>
        <input type="text" name="batch_id" id="batch_id" class="form-control"></br>

        <label>Student</label></br>
        <input type="number" name="student_id" id="student_id" class="form-control"></br> --}}


        <label for="batch">Select Batch:</label>
        <select name="batch_id" id="batch_id" class="form-control">
        <option selected disabled>Select a batch</option>
        @foreach($batches as $batch)
        <option value="{{ $batch->id }}">{{ $batch->name }}</option>
        @endforeach
        </select></br>

        <label for="student">Select Student:</label>
        <select name="student_id" id="student_id" class="form-control">
        <option selected disabled>Select a student</option>
        @foreach($students as $student)
        <option value="{{ $student->id }}">{{ $student->name }}</option>
        @endforeach
        </select></br>


        <label>Join Date</label></br>
        <input type="date" name="join_date" id="join_date" class="form-control"></br>

        <label>Fee</label></br>
        <input type="number" name="fee" id="fee" class="form-control"></br>

        <input type="submit" value="Save" class="btn btn-success"></br>
    </form>

  </div>
</div>

@stop
