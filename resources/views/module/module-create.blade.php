@extends('layouts.app')

@section('title')
    Ajouter Module
@endsection

@section('body')
    <body>
        @include('partials.navbar')
        <form action="{{ route('module.store') }}" class="container mt-5" method="POST">
            @csrf
            @livewire('module.module-create')
        </form>
    </body>
@endsection