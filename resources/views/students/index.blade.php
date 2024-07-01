{{-- @extends('layout')
@section('content') --}}

@extends('layouts.app')
@section('content')

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.6.0/css/bootstrap.min.css"> --}}
    <style>
        #search-form .form-control {
            width: 150px;
            /* Adjust the width as needed */
            border-radius: 5px;
            /* Add border-radius for rounded corners */
            border-color: #3498db;
            /* Set border color */
        }

        #search-form .btn-primary {
            background-color: #3498db;
            /* Set background color for the Search button */
            border-color: #3498db;
            /* Set border color for the Search button */
        }
    </style>
    <style>
        #search-form .form-control {
            width: 120px;
            /* Adjust the width as needed */
            border-radius: 3px;
            /* Add border-radius for rounded corners */
            border-color: #3498db;
            /* Set border color */
            font-size: 12px;
            /* Adjust font size */
        }

        #search-form .btn-primary {
            background-color: #3498db;
            /* Set background color for the Search button */
            border-color: #3498db;
            /* Set border color for the Search button */
            font-size: 12px;
            /* Adjust font size */
        }
    </style>
    <style>
        .table tbody tr:nth-child(even) {
            background-color: #f9f9f9;
            /* Light color for even rows */
            /* background-color: #f9f9f9;  */
            /* background-color: #f3f1f1; */
            /* background-color: #cabdbd; */
            background-color: #f3f1f1;
        }

        .table tbody tr:nth-child(odd) {
            background-color: white;
            /* White color for odd rows */
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    @if (session('success'))
        <div class="alert alert-success" id="flash-message">
            {{ session('success') }}
        </div>
        <script>
            $(document).ready(function() {
                // Set a timer to hide the flash message after 5 seconds with a sliding effect
                setTimeout(function() {
                    $("#flash-message").slideUp(500, function() {
                        $(this).remove();
                    });
                }, 3000);
            });
        </script>
    @endif

    <div class="card">
        <div class="card-header">
            <h2>
                <nav class="navbar navbar-expand-lg navbar-light d-flex justify-content-center"
                    style="background-color: #D0D3D4 ;">Students
            </h2>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <!-- Button for adding a new student -->
                    <a href="{{ route('students.create') }}" class="btn btn-success btn-sm" title="Add New Student">
                        <i class="fa fa-plus" aria-hidden="true"></i> Add New Student
                    </a>
                </div>

                <div class="col-md-4">
                    <form id="search-form" action="{{ route("search_data") }}" method="GET" class="form-inline">
                        <div class="form-group">
                            <input type="text" class="form-control" name="search" placeholder="Search">
                        </div>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-search"></i> Search
                        </button>
                    </form>
                </div>

                <div class="col-md-4">
                    <form id="delete-multiple-form" method="POST" action="{{ route("deleteMultipleItems") }}" accept-charset="UTF-8">
                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}
                        <input type="hidden" name="selected-ids" id="selected-ids">
                        <!-- Button for deleting all selected students -->
                        <button type="button" class="btn btn-danger btn-sm float-right" id="delete-selected"
                            title="Delete Student">
                            <i class="fas fa-trash-alt" aria-hidden="true"></i> Delete All Selected
                        </button>
                    </form>
                </div>

                <br />
                <br />
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                {{-- <th><input type="checkbox" name="" id="select_all_ids"></th> --}}
                                <th>
                                    <!-- Move the "Select All" checkbox here -->
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" name="select-all" id="select-all">
                                        <label class="custom-control-label" for="select-all"></label>
                                    </div>
                                </th>
                                <th>#</th>
                                <th>Name</th>
                                <th>Address</th>
                                <th>Mobile</th>
                                <th>Actions</th>
                                <th>
                                    {{-- <label for="select-all">Checkbox</label>
                                    <input type="checkbox" id="select-all"> --}}

                                    {{-- <input type="checkbox" id="select-all">
                                    <label for="select-all">Checkbox</label> --}}

                                    <!-- Your checkbox with Bootstrap styling -->

                                    {{-- <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="select-all">
                                    <label class="custom-control-label" for="select-all">Select All</label> --}}

                                    {{-- <input type="checkbox" class="select-item" data-ids="{{  url('/students' . '/' . $item->id)  }}" name="ids[]" value="{{ $item->id }}"> --}}
{{-- ss sky50y --}}
{{-- <div class="float-end">
    <a href="{{ route('roles.index') }}" class="btn btn-primary btn-sm">&larr; Back</a>
</div> --}}
                </div>
                </th>
                </tr>
                {{-- <tr>
                <th style="text-align: center;">#</th>
                <th style="text-align: center;">Name</th>
                <th style="text-align: center;">Address</th>
                <th style="text-align: center;">Mobile</th>
                <th style="text-align: center;">Actions</th>
                </tr> --}}
                </thead>
                <tbody>
                    @if(count($students) > 0)
                    @foreach ($students as $student)
                        <tr>
                            {{-- <style>
                            td {
                            text-align: center;
                            }
                            </style> --}}

                            {{-- Or, --}}

                            {{-- <tr>
                            <td style="text-align: center;">{{ $loop->iteration }}</td>
                            <td style="text-align: center;">{{ $item->name }}</td>
                            <td style="text-align: center;">{{ $item->address }}</td>
                            <td style="text-align: center;">{{ $item->mobile }}</td>
                            <!-- ... other td elements ... -->
                            </tr> --}}
                            <td>
                                <!-- Checkbox for each row -->
                                <input type="checkbox" class="select-item" data-id="{{ $student->id }}" name="ids[]" value="{{ $student->id }}">

                            </td>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $student->name }}</td>
                            <td>{{ $student->address }}</td>
                            <td>{{ $student->mobile }}</td>

                            <td>
                                {{-- <a href="{{ url('/students/' . $item->id) }}" title="View Student"><button class="btn btn-warning btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a> --}}
                                <a href="{{ route('students.show', $student->id) }}" title="View Student">
                                    <button class="btn btn-info btn-sm" style="margin-right: 5px;">
                                        <i class="fa fa-eye" aria-hidden="true"></i> View
                                    </button>
                                </a>
                                {{-- <a href="{{ url('/students/' . $item->id) }}" title="View Student"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a> --}}

                                {{-- <a href="{{ url('/students/' . $item->id . '/edit') }}" title="Edit Student"><button
                                        class="btn btn-primary btn-sm" style="margin-right: 5px;"><i class="fas fa-edit"
                                            aria-hidden="true"></i> Edit</button></a> --}}

                                <a href="{{ route('students.edit', $student->slug) }}" title="Edit Student"><button
                                    class="btn btn-primary btn-sm" style="margin-right: 5px;"><i class="fas fa-edit"
                                        aria-hidden="true"></i> Edit</button></a>

                                {{-- <a href="{{ url('/students/' . $item->id . '/edit') }}" title="Edit Student"><button class="btn btn-primary btn-sm"><i class="fas fa-edit" aria-hidden="true"></i> Edit</button></a> --}}

                                <form method="POST" action="{{ route('students.destroy', $student->id) }}"
                                    accept-charset="UTF-8" style="display:inline">
                                    {{ method_field('DELETE') }}
                                    {{ csrf_field() }}
                                    <button type="submit" class="btn btn-danger btn-sm" style="margin-right: 5px;"
                                        title="Delete Student" onclick="return confirm(&quot;Confirm delete?&quot;)"><i
                                            class="fas fa-trash-alt" aria-hidden="true"></i> Delete</button>


                                    {{-- <button type="submit" class="btn btn-danger btn-sm" title="Delete Student" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fas fa-trash-alt" aria-hidden="true"></i> Delete</button> --}}
                            {{-- <td> --}}
                                {{-- <input type="checkbox" class="select-item" data-id="{{ $item->id }}" name="ids[]"> --}}
                                {{-- <form method="POST" action="{{ url('/students' . '/' . $item->id) }}"
                                    accept-charset="UTF-8" style="display:inline">
                                    {{ method_field('DELETE') }}
                                    {{ csrf_field() }} --}}
                                    {{-- <button type="submit" style="margin-right: 5px;" title="Delete Student" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fas fa-trash-alt" aria-hidden="true"></i> Delete</button> --}}
                                    {{-- <input type="checkbox" class="select-item" data-id="{{ $item->id }}" name="ids[]" value="{{ $item->id }}"> --}}
                                    {{-- <input type="checkbox" name="ids" class="checkbox_ids" id="" value="{{ $$item->id }}"> --}}
                            {{-- </td> --}}

                            </form>
                            </td>
                        </tr>
                    @endforeach
                @else
                <tr>
                    <td colspan="3">Students record not found.</td>
                    {{-- <p>No students found.</p> --}}
                </tr>
                @endif
                </tbody>
                </table>

                {{-- div div div div div div div div div --}}
                </div>

                {{-- <form method="POST" action="{{ url('/students' . '/' . $item->id) }}" accept-charset="UTF-8"
                    style="display:inline">
                    {{ method_field('DELETE') }}
                    {{ csrf_field() }} --}}
                    {{-- <button id="delete-selected">Delete Selected</button> --}}


                    <!-- Add an ID to the form for easier selection in JavaScript -->
                    {{-- <form id="delete-multiple-form" method="POST" action="{{ url('/students') }}" accept-charset="UTF-8">
                    {{ method_field('DELETE') }} <!-- Use DELETE method for deleting multiple items -->
                    {{ csrf_field() }} --}}

                <script>
                    function confirmAndSubmit() {
                        // You can add your confirmation logic here
                        var confirmed = confirm("Confirm delete?");

                        if (confirmed) {
                            // Submit the form
                            document.getElementById('delete-multiple-form').submit();
                        }
                    }
                </script>
            </div>

        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const selectAllCheckbox = document.getElementById('select-all');
            const selectItemCheckboxes = document.querySelectorAll('.select-item');
            const deleteSelectedButton = document.getElementById('delete-selected');
            const deleteMultipleForm = document.getElementById('delete-multiple-form');

            selectAllCheckbox.addEventListener('change', function () {
                selectItemCheckboxes.forEach(function (checkbox) {
                    checkbox.checked = selectAllCheckbox.checked;
                });
            });

            deleteSelectedButton.addEventListener('click', function (event) {
                event.preventDefault();

                const selectedIds = Array.from(selectItemCheckboxes)
                    .filter(checkbox => checkbox.checked)
                    .map(checkbox => checkbox.value);

                if (selectedIds.length === 0) {
                    alert('Please select at least one item to delete.');
                } else {
                    const confirmed = confirm("Confirm delete?");
                    if (confirmed) {
                        const idsInput = document.getElementById('selected-ids');
                        idsInput.value = selectedIds.join(',');
                        deleteMultipleForm.submit();
                    }
                }
            });
        });
    </script>

@endsection

{{-- <script>
    $(function(e) {
        $('checkbox_ids').prop('checked', $(this), prop('checked'));
    });

    $('.#deleteAllSelectedRecord').click(function(e) {
        e.preventDefault();
        var all_ids = [];
        $('input:checkbox[name=ids]:checked').each(function()) {
            all_ids.push($(this).val());
        }
    });

    $.ajax({
            url: "",
            type: "DELETE",
            data: {
                ids: all_ids,
                _token: '{{ csrf_token() }}'
            }
        },
        success: function(response) {
            $.each(all_ids, function(key, val)) {
                $('#students_ids' + val).remove();
            }
        })
</script> --}}

<script defer>
    function confirmAndSubmit() {
        var confirmed = confirm("Confirm delete?");
        if (confirmed) {
            // Get selected IDs
            const selectedIds = Array.from(document.querySelectorAll('.select-item:checked'))
                .map(checkbox => checkbox.value);
            // Set the selected IDs in the hidden input
            document.getElementById('selected-ids').value = selectedIds.join(',');
            // Submit the form
            document.getElementById('delete-multiple-form').submit();
        }
    }
</script>
