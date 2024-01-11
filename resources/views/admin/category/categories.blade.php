@extends('admin.template')

@section('title', 'Manage Categories')

@section('content-users')
    <h1>Manage Categories</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item">
                <a href="{{ route('dashboard') }}">Control panel</a>
            </li>
            <li class="breadcrumb-item active">Categories</li>
        </ol>
    </nav>

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Categories - {{ $categories->count() }}

            <a href="" class="btn btn-success float-right">
                New category
            </a>
        </div>
        <div class="card-body">
            <table class="table table-striped" id="datatablesSimple">
                <thead>
                    <tr>
                        <th scope="col">Title / Slug</th>
                        <th scope="col">Subtitle</th>
                        <th scope="col">Views</th>
                        <th scope="col" class="mx-auto">Photo</th>
                        <th scope="col">Meta Description / Key</th>

                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr class="text-center">
                            <td scope="row">{{ $category->title }}</td>
                            <td scope="row">{{ $category->subtitle }}</td>
                            <td scope="row">{{ $category->views }}</td>

                            <td>
                                <img class="user-avatar mx-auto" src="/images/categories/{{ $category->photo }}"
                                    alt="no photo">
                            </td>
                            <td>
                                {{ $category->meta_description }}<br>{{ $category->meta_keywords }}
                            </td>
                            <td scope="row">
                                <a href="" class="btn btn-success btn-circle btn-md" title="Edit data user">
                                    <i class="fas fa-2x fa-user-edit"></i>
                                </a>

                                <form id="form-delete-{{ $category->id }}" action="" method="POST"
                                    style="display:inline-block;">
                                    @csrf
                                    @method('delete')

                                </form>

                                <button class="btn btn-danger btn-circle btn-md" title="Delete user"
                                    onclick="if(confirm('Confirm delete user {{ $category->name }}?')){ document.getElementById('form-delete-{{ $category->id }}').submit(); } ">
                                    <i class="fas fa-2x fa-trash-alt"></i>
                                </button>
                            </td>
                        </tr>
                    @endforeach


                </tbody>
                <tfoot>
                    <tr>
                        <th scope="col">Title / Slug</th>
                        <th scope="col">Subtitle</th>
                        <th scope="col">Views</th>
                        <th scope="col" class="mx-auto">Photo</th>
                        <th scope="col">Meta Description / Key</th>

                        <th scope="col">Actions</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
@endsection
