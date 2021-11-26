@extends('layouts.app')

@section('title')
    Home
@endsection

@section('body')

<body>
    @include('partials.navbar')
    <div class="container mt-5">
            <h1>Menu Principale</h1>      
            <div class="container mt-5">
                <div class="row">
                    <div class="col">
                        <a class="btn btn-success" href="{{ route('etudiant.index') }}">Mise à Jour Etudiant</a>
                    </div>
                    <div class="col">
                        <a  class="btn btn-success" href="{{ route('module.index') }}">Mise à Jour Module</a>
                    </div>
                </div>
                
            </div>
    </div>
    
</body>
    
@endsection