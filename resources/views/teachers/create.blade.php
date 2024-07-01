{{-- @extends('layout')
@section('content') --}}

@extends('layouts.app')
@section('content')


<div class="card">
  <div class="card-header"><nav class="navbar navbar-expand-lg navbar-light d-flex justify-content-center" style="background-color: #bbbdbe ;">Add New Teacher</div>
  <div class="card-body">

      <form action="{{ route('teachers.store') }}" method="POST">
        {{--        {!! csrf_field() !!}       --}}
        @csrf
        {{-- <label>Name</label></br> --}}
        <label for="name">Name <span style="color: red;">*</span></label><br>
        {{-- <input type="text" name="name" id="name" class="form-control"></br> --}}
        <input type="text" name="name" id="name" class="form-control" maxlength="10" placeholder="Enter name (max 10 characters)" required oninput="capitalizeFirstLetter('name')"></br>
            {{-- //required> ---->  replace to required oninput="capitalizeFirstLetter('name')"> --}}


        {{-- <label>Address</label></br> --}}
        <label for="address">Address <span style="color: red;">*</span></label><br>
        {{-- <input type="text" name="address" id="address" class="form-control"></br> --}}
        <input type="text" name="address" id="address" class="form-control" maxlength="10" placeholder="Enter address (max 10 characters)" required oninput="capitalizeFirstLetter('address')"></br>
                {{-- //required> ---->  replace to required oninput="capitalizeFirstLetter('name')"> --}}

        {{-- <label>Mobile (10 digits)</label><br> --}}
        <label for="mobile">Mobile (10 digits) <span style="color: red;">*</span></label><br>
        {{-- <input type="number" name="mobile" id="mobile" class="form-control"></br> --}}
        <input type="tel" name="mobile" id="mobile" class="form-control" pattern="[0-9]{10}" title="Please enter a valid 10-digit mobile number" placeholder="Enter 10-digit mobile number" required><br>

        {{-- <input type="number" name="mobile" id="mobile" class="form-control" pattern="[0-9]{10}" title="Please enter a valid 10-digit mobile number"><br> --}}
        {{-- <input type="number" name="mobile" id="mobile" class="form-control" minlength="10" pattern="[0-9]+"><br> --}}
        {{-- <input type="tele" name="mobile" id="mobile" class="form-control" minlength="10" pattern="^[A-Za-z]+$"><br> --}}
        {{-- <input type="numeric" name="mobile" id="mobile" class="form-control" minlength="10" pattern="[0-9]+"><br> --}}

        <input type="submit" value="Save" class="btn btn-success"></br>
    </form>

  </div>
</div>

<script>
    function capitalizeFirstLetter(inputId) {
      let input = document.getElementById(inputId);
      input.value = input.value.charAt(0).toUpperCase() + input.value.slice(1);
    }
  </script>

@stop
