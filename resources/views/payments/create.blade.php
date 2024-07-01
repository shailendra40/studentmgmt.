{{-- @extends('layout')
@section('content') --}}

@extends('layouts.app')
@section('content')

<div class="card">
  <div class="card-header"><nav class="navbar navbar-expand-lg navbar-light d-flex justify-content-center" style="background-color: #bbbdbe ;">Add New Payment</div>
  <div class="card-body">

    {{-- @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif --}}

      <form action="{{ route('payments.store') }}" method="post">
        {!! csrf_field() !!}
        <label>Enrollment No</label></br>

        <select name="enrollments_id" id="enrollments_id" class="form-control">
            <option selected disabled>Select a enrollment</option>
            @foreach($enrollments as $deee)
            <option value="{{ $deee->id }}">{{ $deee->enroll_no }}</option>
            @endforeach
        </select></br>

        <label for="payment">Paid Date:</label>
        <input type="text" name="paid_date" id="paid_date" class="form-control"></br>

        <label>Amount</label></br>
        <input type="number" name="amount" id="amount" class="form-control"></br>
        <input type="submit" value="Save" class="btn btn-success"></br>
    </form>

  </div>
</div>

@stop
