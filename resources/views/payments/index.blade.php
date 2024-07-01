{{-- @extends('layout')
@section('content') --}}

@extends('layouts.app')
@section('content')

{{-- @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif --}}

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

@if(session('success'))
    <div class="alert alert-success" id="flash-message">
        {{ session('success') }}
    </div>
    <script>
        $(document).ready(function(){
            // Set a timer to hide the flash message after 5 seconds with a sliding effect
            setTimeout(function(){
                $("#flash-message").slideUp(500, function(){
                    $(this).remove();
                });
            }, 3000);
        });
    </script>
@endif

                <div class="card">
                    <div class="card-header">
                        <h2><nav class="navbar navbar-expand-lg navbar-light d-flex justify-content-center" style="background-color: #D0D3D4 ;">Payments</h2>
                    </div>
                    <div class="card-body">
                        <a href="{{ route('payments.create') }}" class="btn btn-success btn-sm" title="Add New Payment">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New Payment
                        </a>
                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Enrollment No</th>
                                        <th>Paid Date</th>
                                        <th>Amount</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($payments as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->enrollments->enroll_no }}</td>
                                        <td>{{ $item->paid_date }}</td>
                                        <td>{{ $item->amount }}</td>
                                        <td>
                                            {{-- <a href="{{ url('/payments/' . $item->id) }}" title="View Payment"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            <a href="{{ url('/payments/' . $item->id . '/edit') }}" title="Edit Payment"><button class="btn btn-primary btn-sm"><i class="fas fa-edit" aria-hidden="true"></i> Edit</button></a> --}}

                                            <a href="{{ route('payments.show', $item->id) }}" title="View Payment"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            <a href="{{ route('payments.edit', $item->id) }}" title="Edit Payment"><button class="btn btn-primary btn-sm"><i class="fas fa-edit" aria-hidden="true"></i> Edit</button></a>

                                            {{-- <form method="POST" action="{{ url('/payments' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline"> --}}
                                            <form method="POST" action="{{ route('payments.destroy', $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Payment" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fas fa-trash-alt" aria-hidden="true"></i> Delete</button>
                                                {{-- <button type="submit" class="btn btn-danger btn-sm" title="Delete Payment" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="bi bi-pencil-trash" aria-hidden="true"></i> Delete</button> --}}
                                            </form>


                                            <a href="{{ url('/report/report1/' .$item->id) }}" title="Edit Payment"><button class="btn btn-success"><i class="fa fa-print" aria-hidden="true"><i>Print</button></a>


                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>

@endsection
