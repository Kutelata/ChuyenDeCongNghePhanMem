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
                <h2>Change your password</h2>
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
                <form action="{{route('updateinfo')}}" method="POST">
                    @csrf
                    <input type="hidden" class="form-control" name="idUpdate" placeholder="Name" value="{{Session::get('user')->userId}}">
                   
                  
                  
                  
                    <div class="form-group">
                        <div class="fxt-transformY-50 fxt-transition-delay-3">
                            <input type="password" class="form-control" name="old_password" placeholder="Old Password"  >
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="fxt-transformY-50 fxt-transition-delay-3">
                            <input type="password" class="form-control" name="password" placeholder="Password"  >
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="fxt-transformY-50 fxt-transition-delay-3">
                            <input type="password" class="form-control" name="confirm_password" placeholder="Confirm Password" >
                        </div>
                    </div>
                  
                    <div class="form-group">
                        <div class="fxt-transformY-50 fxt-transition-delay-5">
                            <button type="submit" class="fxt-btn-fill">Update</button>
                        </div>
                    </div>
                </form>
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