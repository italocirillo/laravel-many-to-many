@extends('layouts.admin')

@section('content')
    <div class="container text-center py-3">

        @if (session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif

        <h1>Tipi</h1>
        <button class="btn btn-info">
            <a href="{{ route('admin.types.create') }}" class="text-decoration-none text-light "> Crea Tipo </a>
        </button>
        <table class="table table-hover m-3">
            <thead>
                <tr>
                    <th scope="col">ID°</th>
                    <th scope="col">NOME</th>
                    <th scope="col">SLUG</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($types as $type)
                    <tr>
                        <th scope="row">{{ $type->id }}</th>
                        <td>
                            <h5>{{ $type->title }}</h5>
                        </td>
                        <td>
                            <h5>{{ $type->slug }}</h5>
                        </td>
                        <td>
                            <ul class="scelta-icone">
                                <li class=" d-flex gap-1">
                                    <a href="{{ route('admin.types.show', $type->slug) }}">
                                        <button type="button" class="btn btn-light">
                                            <i class="fa-regular fa-eye"></i>
                                        </button>
                                    </a>
                                    <a href="{{ route('admin.types.edit', $type->slug) }}">
                                        <button type="button" class="btn btn-success">
                                            <i class="fa-solid fa-marker"></i>
                                        </button>
                                    </a>
                                    <form id="deleteForm" action="{{ route('admin.types.destroy', $type->slug) }}"
                                        method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-delete"
                                            data-project-title="{{ $type->title }}">
                                            <i class="fa-solid fa-trash-can"></i>
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        @include('admin.partials.modal')
    </div>
@endsection
