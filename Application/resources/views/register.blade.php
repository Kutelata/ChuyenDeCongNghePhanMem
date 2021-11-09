@extends('layouts.master')
@section('title','Shoe - Register')

@section('css')
    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="{{asset('resources/auth/css/fontawesome-all.min.css')}}">
    <!-- Flaticon CSS -->
    <link rel="stylesheet" href="{{asset('resources/auth/font/flaticon.css')}}">
    <!-- Google Web Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&amp;display=swap" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{asset('resources/auth/style.css')}}">
@endsection

@section('main')
    <section class="fxt-template-animation fxt-template-layout6"
             data-bg-image="{{asset('resources/auth/img/figure/bg6-l.jpg')}}">
        <div class="fxt-content">
            <div class="fxt-form">
                <h2>Register for new account</h2>
                @if($errors->all())
                    <div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        @foreach($errors->all() as $error)
                            <p>{{$error}}</p>
                        @endforeach
                    </div>
                @endif
                @if(Session::has('success'))
                <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <p>{{Session::get('success')}}</p>
                    </div>
                @endif
                @if(Session::has('error'))
                <div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <p>{{Session::get('error')}}</p>
                    </div>
                @endif
                <form action="{{route('post_register')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <div class="fxt-transformY-50 fxt-transition-delay-3">
                            <input type="text" class="form-control" name="name" placeholder="Name" required="required" >
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="fxt-transformY-50 fxt-transition-delay-3">
                            <input type="text" class="form-control" name="phone" placeholder="Phone" >
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="fxt-transformY-50 fxt-transition-delay-4">
                            <input type="radio"  name="gender" value="1" checked> Male
                            <input type="radio"  name="gender" value="0"> Female
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="fxt-transformY-50 fxt-transition-delay-3">
                            <input type="email" class="form-control" name="email" placeholder="Email Address" required="required" >
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="fxt-transformY-50 fxt-transition-delay-3">
                            <input type="password" class="form-control" name="password" placeholder="Password" required="required" >
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="fxt-transformY-50 fxt-transition-delay-3">
                            <input type="password" class="form-control" name="confirm_password" placeholder="Confirm Password"  required="required">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="fxt-transformY-50 fxt-transition-delay-3">
                            <input type="date" class="form-control" name="birthday" placeholder="Birthday" >
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="fxt-transformY-50 fxt-transition-delay-5">
                            <button type="submit" class="fxt-btn-fill">Register</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="fxt-footer">
                <ul class="fxt-socials">
                    <li class="fxt-facebook fxt-transformY-50 fxt-transition-delay-6">
                        <a href="#" title="Facebook"><i class="fab fa-facebook-f"></i></a>
                    </li>
                    <li class="fxt-twitter fxt-transformY-50 fxt-transition-delay-7">
                        <a href="#" title="twitter"><i class="fab fa-twitter"></i></a>
                    </li>
                    <li class="fxt-google fxt-transformY-50 fxt-transition-delay-8">
                        <a href="#" title="google"><i class="fab fa-google-plus-g"></i></a>
                    </li>
                    <li class="fxt-linkedin fxt-transformY-50 fxt-transition-delay-9">
                        <a href="#" title="linkedin"><i class="fab fa-linkedin-in"></i></a>
                    </li>
                </ul>
                <div class="fxt-transformY-50 fxt-transition-delay-10">
                    <p>Already have an account?<a href="{{route('login')}}" class="switcher-text2 inline-text">Log in</a></p>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('js')
    <!-- jquery-->
    <script src="{{asset('resources/auth/js/jquery-3.5.0.min.js')}}"></script>
    <!-- Popper js -->
    <script src="{{asset('resources/auth/js/popper.min.js')}}"></script>
    <!-- Validator js -->
    <script src="{{asset('resources/auth/js/validator.min.js')}}"></script>
    <!-- Imagesloaded js -->
    <script src="{{asset('resources/auth/js/imagesloaded.pkgd.min.js')}}"></script>
    <!-- Custom Js -->
    <script src="{{asset('resources/auth/js/main.js')}}"></script>
@endsection
