@extends('layouts.app')

@section('title')
Login
@endsection

@section('body')

<body class="gradient-custom">
    <section class="vh-100">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card bg-dark text-white" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">

                            <form class="mb-md-5 mt-md-4 pb-5" method="POST" action="{{ route('login') }}">
                                @csrf
                                <h2 class="fw-bold mb-2 text-uppercase">Login</h2>
                                <p class="text-white-50 mb-5">Please enter your login and password!</p>
                                @if($errors->any())
                                @foreach ( $errors->all() as $error )
                                    <p class="text-danger">{{ $error }}</p>
                                @endforeach
                                @endif
                                
                                <div class="form-outline form-white mb-4">
                                    <input type="text" id="typenameX" class="form-control form-control-lg" name="name" />
                                    <label class="form-label" for="typenameX">Name</label>
                                </div>

                                <div class="form-outline form-white mb-4">
                                    <input type="password" id="typePasswordX" class="form-control form-control-lg" name="password"/>
                                    <label class="form-label" for="typePasswordX">Password</label>
                                </div>

                                <div class="mb-4">
                                    <input type="checkbox" id="showPassword" class="form-check-input"/>
                                    <label class="form-check-label" for="showPassword" > Show Password</label>
                                </div>

                                <button class="btn btn-outline-light btn-lg px-5" type="submit">Login</button>
                            </form>
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
<style>
    .gradient-custom {
        /* fallback for old browsers */
        background: #6a11cb;

        /* Chrome 10-25, Safari 5.1-6 */
        background: -webkit-linear-gradient(to right, rgba(106, 17, 203, 1), rgba(37, 117, 252, 1));

        /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
        background: linear-gradient(to right, rgba(106, 17, 203, 1), rgba(37, 117, 252, 1))
    }
</style>

<script>
checkbox=document.getElementById('showPassword');
password_field=document.getElementById('typePasswordX');

checkbox.addEventListener('click',()=>{
    if(password_field.type=="password"){
        password_field.type='text';
    }
    else{
        password_field.type='password';
    }
})
</script>

@endsection