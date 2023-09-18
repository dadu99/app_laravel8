@extends('admin.template')

@section('title', 'Manage Users')

@section('content-users')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Control Panel</a></li>
            <li class="breadcrumb-item active">Users</li>
        </ol>
    </nav>

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Users - {{ $users->count() }}

            <a href="{{ route('users.new') }}" class="btn btn-success float-right">
                New User
            </a>
        </div>
        <div class="card-body">
            <table class="table table-striped" id="datatablesSimple">
                <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Address / Phone</th>
                        <th scope="col" class="mx-auto">Photo</th>
                        <th scope="col">Role</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr class="text-center">
                            <td scope="row">{{ $user->name }} <br> {{ $user->created_at->format('D j F - Y') }}</td>
                            <td scope="row">{{ $user->email }}</td>
                            <td scope="row">{{ $user->address }} <br> {{ $user->phone }}</td>
                            <td>
                                <img class="user-avatar mx-auto" src="/images/users/{{ $user->photo }}"
                                    alt="{{ $user->name }}">
                            </td>
                            <td>
                                {{ $user->role }}
                            </td>
                            <td scope="row">
                                <a href="{{ route('users.editForm', $user->id) }}"
                                    class="btn btn-success btn-circle btn-md" title="Edit data user">
                                    <i class="fas fa-2x fa-user-edit"></i>
                                </a>
                                <button class="btn btn-danger btn-circle btn-md" title="Delete user">
                                    <i class="fas fa-2x fa-trash-alt"></i>
                                </button>
                            </td>
                        </tr>
                    @endforeach


                </tbody>
                <tfoot>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Address / Phone</th>
                        <th scope="col" class="mx-auto">Photo</th>
                        <th scope="col">Role</th>
                        <th scope="col">Actions</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
@endsection
