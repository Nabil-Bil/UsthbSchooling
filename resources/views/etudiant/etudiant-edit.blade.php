@extends('layouts.app')

@section('title')
    Modifier Etudiant
@endsection

@section('body')
    <body>
        @include('partials.navbar')
        <form action="{{ route('etudiant.update') }}" class="container mt-5" method="POST">
            @csrf
            @livewire('etudiant.etudiant-edit')
          </form>
    </body>
@endsection