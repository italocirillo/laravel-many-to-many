@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="fs-2 text-center pt-3 text-info">404 NOT FOUND NON TROVATO PERSONALIZZATO</h1>
        <div class="mt-4 text-center">
            <a class="btn btn-primary" href="{{ route('admin.dashboard') }}">Ritorna nella pagina home</a>
            <a class="btn btn-success" href="{{ url()->previous() }}">Ritorna</a>
        </div>
    </div>
@endsection
