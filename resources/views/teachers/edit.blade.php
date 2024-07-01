{{-- @extends('layout')
@section('content') --}}

@extends('layouts.app')
@section('content')

<div class="card">
  <div class="card-header">Edit Page</div>
  <div class="card-body">

      {{-- <form action="{{ route('teachers' .$teachers->id) }}" method="post"> --}}
        <form action="{{ route('teachers.update', $teacher->id) }}" method="POST">
            {!! csrf_field() !!}
            @method("PUT")
        <input type="hidden" name="id" id="id" value="{{$teacher->id}}" id="id" />
        <label>Name</label></br>
        <input type="text" name="name" id="name" value="{{$teacher->name}}" class="form-control"></br>
        <label>Address</label></br>
        <input type="text" name="address" id="address" value="{{$teacher->address}}" class="form-control"></br>
        <label>Mobile</label></br>
        <input type="number" name="mobile" id="mobile" value="{{$teacher->mobile}}" class="form-control"></br>
        <input type="submit" value="Update" class="btn btn-success"></br>
    </form>

  </div>
</div>

@stop
