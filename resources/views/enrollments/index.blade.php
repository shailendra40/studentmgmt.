{{-- @extends('layout')
@section('content') --}}

@extends('layouts.app')
@section('content')

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
                        <h2><nav class="navbar navbar-expand-lg navbar-light d-flex justify-content-center" style="background-color: #D0D3D4 ;">Enrollments</h2>
                    </div>
                    <div class="card-body">
                        <a href="{{route('enrollments.create') }}" class="btn btn-success btn-sm" title="Add New Enrollments">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New Enrollment
                        </a>
                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Enroll no</th>
                                        <th>Batch</th>
                                        <th>Student</th>
                                        <th>Join Date</th>
                                        <th>Fee</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($enrollments as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->enroll_no }}</td>
                                        <td>{{ $item->batches->name }}</td>
                                        <td>{{ $item->students->name }}</td>
                                        <td>{{ $item->join_date }}</td>
                                        <td>{{ $item->fee }}</td>
                                        <td>
                                            {{-- <a href="{{ route('enrollments.show' . $item->id) }}" title="View Enrollment"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            <a href="{{ route('enrollments.edit' . $item->id . '/edit') }}" title="Edit Enrollment"><button class="btn btn-primary btn-sm"><i class="fas fa-edit" aria-hidden="true"></i> Edit</button></a> --}}

                                            <a href="{{ route('enrollments.show', $item->id) }}" title="View Enrollment"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            <a href="{{ route('enrollments.edit', $item->id) }}" title="Edit Enrollment"><button class="btn btn-primary btn-sm"><i class="fas fa-edit" aria-hidden="true"></i> Edit</button></a>

                                            <form method="POST" action="{{ route('enrollments.destroy', $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Enrollment" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fas fa-trash-alt" aria-hidden="true"></i> Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>

@endsection
