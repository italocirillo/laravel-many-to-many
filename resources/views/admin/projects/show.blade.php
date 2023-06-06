@extends('layouts.admin')

@section('content')
    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    <div class="text-center py-4">
        <button class="btn btn-info">
            <a href="{{ route('admin.projects.index') }}" class="text-decoration-none text-light">Ritorna alla home</a>
        </button>
    </div>
    <div class="card my-3 m-auto">
        <div class="card-body text-center">
            <h5 class="card-title">{{ $project->title }}</h5>
            <p class="card-text">{{ $project->description }}</p>
        </div>
    </div>
@endsection
