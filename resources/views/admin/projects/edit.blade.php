@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{ route('admin.projects.update', $project->slug) }}" method="POST">
            @method('PUT')
            @csrf

            <div class="text-center py-4">
                <button class="btn btn-info">
                    <a href="{{ route('admin.projects.index') }}" class="text-decoration-none text-light">Ritorna alla
                        home</a>
                </button>
            </div>

            <h3>Modifica il progetto{{ $project->slug }}</h3>
            @if ($errors->any())
                <ul class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
            <div class="mb-3">
                <label for="title" class="form-label">Titolo:</label>
                <input type="text" class="form-control @error('title') is-invalid @else is-valid @enderror "
                    id="title" placeholder="titolo" name="title" value="{{ old('title', $project->title) }}">
                @error('title')
                    <div class="invalid-feedback">
                        <p class="error-message">
                            {{ $message }}
                        </p>
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="type">Tipo</label>
                <select class="form-select @error('type_id') is-invalid @else is-valid @enderror " id="type"
                    name="type_id">
                    <option value=""></option>
                    @foreach ($types as $type)
                        <option @selected($type->id == old('type_id', $project->type?->id)) value="{{ $type->id }}">{{ $type->name }}</option>
                    @endforeach
                </select>
                @error('type_id')
                    <div class="invalid-feedback">
                        <p class="error-message">
                            {{ $message }}
                        </p>
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Descrizione:</label>
                <textarea class="form-control @error('description') is-invalid @else is-valid @enderror" id="description"
                    placeholder="....TEXT..." rows="3" name="description">{{ old('description', $project->description) }}</textarea>
            </div>
            <button type="submit" class="btn btn-success my-3">Invia</button>
        </form>
    </div>
@endsection
