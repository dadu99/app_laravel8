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
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>On site</th>
                        <th>Actions</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->created_at }}</td>
                            <td>
                                <button class="btn btn-success btn-circle btn-md" title="Edit data user">
                                    <i class="fas fa-2x fa-user-edit"></i>
                                </button>
                                <button class="btn btn-danger btn-circle btn-md" title="Delete user">
                                    <i class="fas fa-2x fa-trash-alt"></i>
                                </button>
                            </td>
                        </tr>
                    @endforeach


                </tbody>
                <tfoot>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>On site</th>
                        <th>Actions</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
@endsection
