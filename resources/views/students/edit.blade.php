{{-- @extends('layout')
@section('content') --}}

@extends('layouts.app')
@section('content')

<div class="card">
  <div class="card-header">Edit Page</div>

  {{-- this is add for slug --}}
  {{-- <a href="{{ route('students.update', $student->slug) }}" method="POST">Edit Student</a>     this is add for slug --}}
  {{-- <form action="{{ route('students.update', $student->slug) }}" method="POST"> --}}

  <div class="card-body">
    {{-- <form action="{{ route('students.update', $student->id) }}" method="POST"> --}}
<!-- Example link in a view -->
{{-- <a href="{{ route('students.edit', $student->slug) }}">Edit Student</a> --}}

<form action="{{ route('students.update', $student->slug) }}" method="POST">

        {{-- {!! csrf_field() !!} --}}
        @csrf
        @method("PUT")
        <input type="hidden" name="id" id="id" value="{{$student->slug}}" />
        <label>Name</label></br>
        <input type="text" name="name" id="name" value="{{$student->name}}" class="form-control"></br>
        <label>Address</label></br>
        <input type="text" name="address" id="address" value="{{$student->address}}" class="form-control"></br>
        <label>Mobile</label></br>
        <input type="number" name="mobile" id="mobile" value="{{$student->mobile}}" class="form-control"></br>

        <input type="submit" value="Update" class="btn btn-success"></br>
    </form>

  </div>
</div>

@stop
