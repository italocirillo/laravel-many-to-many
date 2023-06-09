@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="text-center py-4">
            <button class="btn btn-info">
                <a href="{{ route('admin.technologies.index') }}" class="text-decoration-none text-light">Ritorna alle
                    tecnologie</a>
            </button>
        </div>

        @if ($errors->any())
            <ul class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        <form action="{{ route('admin.technologies.store') }}" method="POST">
            @csrf
            <h3>Crea una tecnologia</h3>
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
            <button type="submit" class="btn btn-success my-3">Invia</button>
        </form>
    </div>
@endsection
