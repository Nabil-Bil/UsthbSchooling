@extends('layouts.app')

@section('title')
    Supprimer Etudiant
@endsection

@section('body')
    <body>
        @include('partials.navbar')
        <form action="{{ route('etudiant.destory') }}" class="container mt-5" method="POST">
            @csrf
          @livewire('etudiant.etudiant-delete')
          </form>
    </body>
@endsection