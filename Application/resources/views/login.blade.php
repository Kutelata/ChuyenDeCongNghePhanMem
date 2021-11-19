@extends('layouts.master')
@section('title','Shoe - Login')

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
            <h2>Log in to continue..</h2>
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
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group">
                    <div class="fxt-transformY-50 fxt-transition-delay-3">
                        <input type="email" id="email" class="form-control" name="email" placeholder="Email Address"
                            required autofocus>

                    </div>
                </div>
                <div class="form-group">
                    <div class="fxt-transformY-50 fxt-transition-delay-4">
                        <input type="password" id="password" class="form-control" name="password" placeholder="Password"
                            required="required">
                    </div>
                </div>
                <div class="form-group">
                    <div class="fxt-transformY-50 fxt-transition-delay-5">
                        <div class="fxt-content-between">
                            <button type="submit" class="fxt-btn-fill">Log in</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="fxt-footer">
            <div class="fxt-transformY-50 fxt-transition-delay-10">
                <p>Don't have an account?<a href="{{route('register')}}" class="switcher-text2 inline-text">Register</a></p>
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
