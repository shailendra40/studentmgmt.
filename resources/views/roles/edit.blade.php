{{-- @extends('layout')
@section('content') --}}

@extends('layouts.app')
@section('content')

<div class="row justify-content-center">
    <div class="col-md-8">

        <div class="card">
            <div class="card-header">
                <div class="float-start">
                    Edit Role
                </div>
                <div class="float-end">
                    <a href="{{ route('roles.index') }}" class="btn btn-primary btn-sm">&larr; Back</a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('roles.update', $role->id) }}" method="post">


                    {{-- <form action="{{ route('roles.update', ['role' => $role->id]) }}" method="post"> --}}

                        <!-- Rest of the form inputs -->
                        {{-- <input type="submit" value="Update User">
                    </form> --}}

                    {{-- <form method="POST" action="{{ route('roles.update', ['role' => $role->id]) }}"> --}}
                        {{-- {{ dd($role) }} --}}
                        {{-- <form action="{{ route('roles.update', optional($role)->id) }}" method="post"> --}}

                        {{-- <form action="{{ route('roles.update', ['id' => $role->id]) }}" method="post"> --}}



                    @csrf
                    @method("PUT")

                    <div class="mb-3 row">
                        <label for="name" class="col-md-4 col-form-label text-md-end text-start">Name</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ $role->name }}">
                            @if ($errors->has('name'))
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="permissions" class="col-md-4 col-form-label text-md-end text-start">Permissions</label>
                        <div class="col-md-6">
                            <select class="form-select @error('permissions') is-invalid @enderror" multiple aria-label="Permissions" id="permissions" name="permissions[]" style="height: 210px;">
                                @forelse ($permissions as $permission)
                                    <option value="{{ $permission->id }}" {{ in_array($permission->id, $rolePermissions ?? []) ? 'selected' : '' }}>
                                        {{-- <input class="form-check-input" name="permissions[]" value="{{ $permission->id }}"> --}}

        {{-- <select name="permission_id" id="permission_id" class="form-control">
        <option selected disabled>Select a permission</option>
        @foreach($permissions as $permission)
        <option value="{{ $permission->id }}" {{ $permissions->permission_id == $permission->id ? 'selected' : '' }}>{{ $permission->name }}</option>
        @endforeach
        </select></br> --}}
                                        {{ $permission->name }}
                                    </option>
                                @empty

                                @endforelse
                            </select>
                            @if ($errors->has('permissions'))
                                <span class="text-danger">{{ $errors->first('permissions') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <input type="submit" class="col-md-3 offset-md-5 btn btn-primary" value="Update Role">
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

@endsection
