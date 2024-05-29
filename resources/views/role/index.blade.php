@extends('layouts.app')

@section('content')

<div class="container">

    @if (session('message'))
    <div class="alert alert-success">
        <p>{{ session('message') }}</p>
    </div>
    @endif

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Role Management
                        <a class="btn btn-success float-end" href="{{ route('roles.create') }}"> Create New Role</a>
                    </h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-md">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th width="230px">Action</th>
                                </tr>
                            <thead>
                            <tbody>
                                @php $i =1 @endphp
                                @foreach ($roles as $key => $role)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $role->name }}</td>
                                    <td>
                                        @can('role.edit')
                                        <a class="btn btn-primary" href="{{ route('roles.edit',$role->id) }}">Edit</a>
                                        @endcan
                                        @can('role.delete')
                                        <form action="{{ route('roles.destroy',$role->id) }}" method="POST"
                                            class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                        @endcan
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div>
                            {!! $roles->links() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
