@extends('layouts.app')

@section('title')
    Mise à Jour Etudiant
@endsection

@section('body')
@include('partials.navbar')
    <body class="">
        <div class="container mt-5">
            <div class="row mt-5">
                <div class="col"><a class=" btn btn-success" href="{{ route('etudiant.create') }}"> Ajouter Etudiant</a></div>
                <div class="col"><a class=" btn btn-success " href="{{ route('etudiant.edit') }}"> Modifier Etudiant</a></div>
                <div class="col"><a class=" btn btn-success" href="{{ route('etudiant.delete') }}"> Supprimer Etudiant</a></div>
            </div>
        </div>
    </body>
@endsection









