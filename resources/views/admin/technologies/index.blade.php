@extends('layouts.admin')

@section('content')
    <div class="container text-center py-3">

        @if (session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif

        <h1>Tecnologie</h1>
        <button class="btn btn-info">
            <a href="{{ route('admin.technologies.create') }}" class="text-decoration-none text-light "> Crea Technology </a>
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
                @foreach ($technologies as $technology)
                    <tr>
                        <th scope="row">{{ $technology->id }}</th>
                        <td>
                            <h5>{{ $technology->title }}</h5>
                        </td>
                        <td>
                            <h5>{{ $technology->slug }}</h5>
                        </td>
                        <td>
                            <ul class="scelta-icone">
                                <li class=" d-flex gap-1">
                                    <a href="{{ route('admin.technologies.show', $technology->slug) }}">
                                        <button technology="button" class="btn btn-light">
                                            <i class="fa-regular fa-eye"></i>
                                        </button>
                                    </a>
                                    <a href="{{ route('admin.technologies.edit', $technology->slug) }}">
                                        <button technology="button" class="btn btn-success">
                                            <i class="fa-solid fa-marker"></i>
                                        </button>
                                    </a>
                                    <form id="deleteForm"
                                        action="{{ route('admin.technologies.destroy', $technology->slug) }}"
                                        method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button technology="submit" class="btn btn-danger btn-delete"
                                            data-project-title="{{ $technology->title }}">
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
