@extends('layouts.admin')

@section('content')
    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    <div class="text-center py-4">
        <button class="btn btn-info">
            <a href="{{ route('admin.types.index') }}" class="text-decoration-none text-light">Ritorna alla lista dei tipi</a>
        </button>
    </div>
    <div class="card my-3 m-auto">
        <div class="card-body text-center">
            <h5 class="card-title">{{ $type->name }}</h5>
            <h3>Lista Progetti con questa tipologia</h3>
            <ul class="list-group">
                @forelse ($type->projects as $project)
                    <li class="list-group-item"><a
                            href="{{ route('admin.projects.show', $project->slug) }}">{{ $project->title }}</a></li>
                @empty
                    <p>Nessun progetto disponibile</p>
                @endforelse
            </ul>
        </div>
    </div>
@endsection
