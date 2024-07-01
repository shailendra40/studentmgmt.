{{-- @extends('layout')
@section('content') --}}

@extends('layouts.app')
@section('content')

<div class="card">
  <div class="card-header">Edit Page</div>
  <div class="card-body">

      {{-- <form action="{{ url('payments/' .$payments->id) }}" method="post">
        {!! csrf_field() !!}
        @method("PATCH") --}}




        <form action="{{ route('payments.update', $payments->id) }}" method="POST">
            {!! csrf_field() !!}
            @method("PUT")

        {{-- <form method="POST" action="{{ url('payments', ['payments' => $payments->id]) }}">
            @csrf
            @method('PUT') --}}

        <input type="hidden" name="id" id="id" value="{{$payments->id}}" id="id" />
        <label>Enrollment No</label></br>

        <select name="enrollments_id" id="enrollments_id" class="form-control">
            <option selected disabled>Select a enrollment</option>
            @foreach($enrollments as $enrollments)
            <option value="{{ $enrollments->id }}" {{ $payments->enrollments->enroll_no == $enrollments->enroll_no ? 'selected' : '' }}>{{ $enrollments->enroll_no }}</option>
            @endforeach
        </select></br>

        <label for="payment">Paid Date:</label>
        <input type="text" name="paid_date" id="paid_date" value="{{$payments->paid_date}}"  class="form-control"></br>

        <label>Amount</label></br>
        <input type="number" name="amount" id="amount" value="{{$payments->amount}}" class="form-control"></br>
        <input type="submit" value="Update" class="btn btn-success"></br>
    </form>

  </div>
</div>

@stop
