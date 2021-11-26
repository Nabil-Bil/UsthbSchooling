@extends('layouts.app')

@section('title')
    Mise à Jour Etudiant
@endsection

@section('body')
@include('partials.navbar')
    <body>
        <div class="container mt-5">
            <div class="row mt-5">
                <div class="col"><a class=" btn btn-success" href="{{ route('module.create') }}"> Ajouter Module</a></div>
                <div class="col"><a class=" btn btn-success " href="{{ route('module.edit') }}"> Modifier Module</a></div>
                <div class="col"><a class=" btn btn-success" href="{{ route('module.delete') }}"> Supprimer Module</a></div>
            </div>
        </div>
    </body>
@endsection









