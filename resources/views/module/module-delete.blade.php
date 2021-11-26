@extends('layouts.app')

@section('title')
    Supprimer Etudiant
@endsection

@section('body')
    <body>
        @include('partials.navbar')
        <form action="{{ route('module.destroy') }}" class="container mt-5" method="POST">
            @csrf
          @livewire('module.module-delete')
          </form>
    </body>
@endsection