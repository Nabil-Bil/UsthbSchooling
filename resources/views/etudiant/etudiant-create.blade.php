@extends('layouts.app')

@section('title')
    Ajouter Etudiant
@endsection

@section('body')
    <body>
        @include('partials.navbar')
        <form action="{{ route('etudiant.store') }}" class="container mt-5" method="POST">
            @csrf
            @livewire('etudiant.etudiant-create')
        </form>
    </body>
@endsection