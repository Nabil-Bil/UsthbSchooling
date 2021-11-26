@extends('layouts.app')

@section('title')
    Modifier Etudiant
@endsection

@section('body')
    <body>
        @include('partials.navbar')
        <form action="{{ route('module.update') }}" class="container mt-5" method="POST">
            @csrf
            @livewire('module.module-edit')
          </form>
    </body>
@endsection