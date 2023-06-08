@extends('layouts.admin')

@section('content')
    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    <div class="text-center py-4">
        <button class="btn btn-info">
            <a href="{{ url()->previous() }}" class="text-decoration-none text-light">Ritorna indietro</a>
        </button>
    </div>
    <div class="card my-3 m-auto">
        <div class="card-body text-center">
            <h5 class="card-title">{{ $project->title }}</h5>
            <p class="card-text">{{ $project->description }}</p>
            <div class="d-flex justify-content-between">
                @if ($project->type)
                    <span>Tipo: <a
                            href="{{ route('admin.types.show', $project->type->slug) }}">{{ $project->type->title }}</a></span>
                @else
                    <span>Nessun tipo</span>
                @endif
                <span>{{ $project->slug }}</span>
            </div>
            <div class="d-flex justify-content-between">
                <div class="border border-primary rounded p-1">
                    @forelse ($project->technologies as $technology)
                        <span>{{ $technology->title }}{{ $loop->last ? '' : ',' }}</span>
                    @empty
                        <p>Nessuna tecnologia usata</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
@endsection
