@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="text-center py-4">
            <button class="btn btn-info">
                <a href="{{ route('admin.projects.index') }}" class="text-decoration-none text-light">Ritorna alla home</a>
            </button>
        </div>

        @if ($errors->any())
            <ul class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        <form action="{{ route('admin.projects.store') }}" method="POST">
            @csrf
            <h3>Crea un progetto</h3>
            <div class="mb-3">
                <label for="title" class="form-label">Titolo:</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror " id="title"
                    placeholder="titolo" name="title" value="@error('title') @else{{ old('title') }} @enderror">
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
                <select class="form-select @error('type_id') is-invalid @enderror" id="type" name="type_id">
                    <option value=""></option>
                    @foreach ($types as $type)
                        <option @selected(old('type_id') == $type->id) value="{{ $type->id }}">{{ $type->title }}</option>
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
                <textarea class="form-control @error('description') is-invalid @enderror" id="description" placeholder="....TEXT..."
                    rows="3" name="description">{{ old('description') }}</textarea>
                @error('description')
                    <div class="invalid-feedback">
                        <p class="error-message">
                            {{ $message }}
                        </p>
                    </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-success my-3">Invia</button>
        </form>
    </div>
@endsection
