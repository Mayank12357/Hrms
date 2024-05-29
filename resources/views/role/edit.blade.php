@extends('layouts.app')

@section('content')

<div class="container">

    @if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Edit Role</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('roles.update',$role->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label>Name</label>
                                <input type="text" name="name" value="{{ $role->name }}" class="form-control" />
                            </div>
                            <div class="col-md-12 mb-3">
                                <label>Permission</label>
                                <br />
                                <div class="row">
                                    @foreach($permission as $value)
                                    <div class="col-md-3">
                                        <label>
                                            <input type="checkbox" name="permission[]" value="{{ $value->id }}"
                                                {{ in_array($value->id, $rolePermissions) ? 'checked' : '' }} >
                                            {{ $value->name }} 
                                        </label>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="col-md-12 text-end mt-3">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection