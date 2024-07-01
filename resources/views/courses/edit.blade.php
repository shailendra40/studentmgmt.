{{-- @extends('layout')
@section('content') --}}

@extends('layouts.app')
@section('content')

<div class="card">
  <div class="card-header">Edit Page</div>
  <div class="card-body">

      <form action="{{ route('courses.update', $course->id) }}" method="POST">
        {!! csrf_field() !!}
        @method("PUT")
        <input type="hidden" name="id" id="id" value="{{$course->id}}" id="id" />
        <label>Name</label></br>
        <input type="text" name="name" id="name" value="{{$course->name}}" class="form-control"></br>
        <label>Syllabus</label></br>
        <input type="text" name="address" id="address" value="{{$course->syllabus}}" class="form-control"></br>
        <label>Duration</label></br>
        <input type="number" name="duration" id="duration" value="{{$course->duration}}" class="form-control"></br>
        <input type="submit" value="Update" class="btn btn-success"></br>
    </form>

  </div>
</div>

@stop
