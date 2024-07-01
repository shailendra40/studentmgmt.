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
                        <h2><nav class="navbar navbar-expand-lg navbar-light d-flex justify-content-center" style="background-color: #D0D3D4 ;">Teachers</h2>
                    </div>
                    <div class="card-body">
                        <a href="{{ route('teachers.create') }}" class="btn btn-success btn-sm" title="Add New Teacher">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New Teacher
                        </a>
                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Address</th>
                                        <th>Mobile</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                {{-- @foreach($teachers as $teacher) --}}
                                @foreach($teachers as $teacher)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $teacher->name }}</td>
                                        <td>{{ $teacher->address }}</td>
                                        <td>{{ $teacher->mobile }}</td>

                                        <td>
                                            {{-- <a href="{{ url('/teachers/' . $teacher->id) }}" title="View Teacher"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            <a href="{{ url('/teachers/' . $teacher->id . '/edit') }}" title="Edit Teacher"><button class="btn btn-primary btn-sm"><i class="fas fa-edit" aria-hidden="true"></i> Edit</button></a> --}}

                                            <a href="{{ route('teachers.show', $teacher->id) }}" title="View Teacher"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>

                                            <a href="{{ route('teachers.edit', $teacher->id) }}" title="Edit Teacher"><button class="btn btn-primary btn-sm"><i class="fas fa-edit" aria-hidden="true"></i> Edit</button></a>

                                            <form method="POST" action="{{ route('teachers.destroy', $teacher->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Teacher" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fas fa-trash-alt" aria-hidden="true"></i> Delete</button>
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
