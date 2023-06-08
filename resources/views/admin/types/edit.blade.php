@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{ route('admin.types.update', $type->slug) }}" method="POST">
            @method('PUT')
            @csrf

            <div class="text-center py-4">
                <button class="btn btn-info">
                    <a href="{{ route('admin.types.index') }}" class="text-decoration-none text-light">Ritorna alla
                        home</a>
                </button>
            </div>

            <h3>Modifica il tipo{{ $type->slug }}</h3>
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
                    id="title" placeholder="titolo" name="title" value="{{ old('title', $type->title) }}">
                @error('title')
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
