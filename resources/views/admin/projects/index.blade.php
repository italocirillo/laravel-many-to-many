@extends('layouts.admin')

@section('content')
    <div class="container text-center py-3">
        <h1>Fumetti</h1>
        <button class="btn btn-info">
            <a href="{{ route('admin.projects.create') }}" class="text-decoration-none text-light ">Crea fumetto</a>
        </button>
        <table class="table table-hover m-3">
            <thead>
                <tr>
                    <th scope="col">ID°</th>
                    <th scope="col">TITOLO</th>
                    <th scope="col">SLUG</th>
                    <th scope="col">DESCRIZIONE</th>
                    <th scope="col">AZIONI</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($projects as $project)
                    <tr>
                        <th scope="row">{{ $project->id }}</th>
                        <td>
                            <h5>{{ $project->title }}</h5>
                        </td>
                        <td>
                            <h5>{{ $project->slug }}</h5>
                        </td>
                        <td>
                            <p>{{ $project->description }}</p>
                        </td>
                        <td>
                            <ul class="scelta-icone">
                                <li class=" d-flex gap-1">
                                    <a href="{{ route('admin.projects.show', $project->slug) }}">
                                        <button type="button" class="btn btn-light">
                                            <i class="fa-regular fa-eye"></i>
                                        </button>
                                    </a>
                                    <a href="{{ route('admin.projects.edit', $project->slug) }}">
                                        <button type="button" class="btn btn-success">
                                            <i class="fa-solid fa-marker"></i>
                                        </button>
                                    </a>
                                    <form id="deleteForm" action="{{ route('admin.projects.destroy', $project->slug) }}"
                                        method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-danger"
                                            onclick="return confirm('Sei sicuro?')">
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
    </div>
@endsection
