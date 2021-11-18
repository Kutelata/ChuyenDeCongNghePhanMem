@extends('layouts.master')
@section('title','Shoe - Checkout')
{{--    </script>--}}
<!-- JavaScript -->
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

<!-- CSS -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
<!-- Default theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
<!-- Semantic UI theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css"/>
<!-- Bootstrap theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>
@section('main')
    <div class="ps-checkout pt-80 pb-80">
        <div class="ps-container">
            <form class="ps-checkout__form" action="{{route('checkout_success')}}" method="post">
                @csrf
                <div class="row">
                    <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 ">
                        <div class="ps-checkout__billing">
                            <h3>Billing Detail</h3>
                            <input  hidden class="form-control" name="userId" value="{{Session::get('user')->userId}}">
                            <div class="form-group form-group--inline">
                                <label>First Name<span>*</span>
                                </label>
                                <input class="form-control" type="text">
                            </div>
                            <div class="form-group form-group--inline">
                                <label>Last Name<span>*</span>
                                </label>
                                <input class="form-control" type="text">
                            </div>
                            <div class="form-group form-group--inline">
                                <label>Company Name<span>*</span>
                                </label>
                                <input class="form-control" type="text">
                            </div>
                            <div class="form-group form-group--inline">
                                <label>Email Address<span>*</span>
                                </label>
                                <input class="form-control" type="email">
                            </div>
                            <div class="form-group form-group--inline">
                                <label>Company Name<span>*</span>
                                </label>
                                <input class="form-control" type="text">
                            </div>
                            <div class="form-group form-group--inline">
                                <label>Phone<span>*</span>
                                </label>
                                <input class="form-control" type="text">
                            </div>
                            <div class="form-group form-group--inline">
                                <label>Address<span>*</span>
                                </label>
                                <input class="form-control" type="text">
                            </div>
                            <div class="form-group">
                                <div class="ps-checkbox">
                                    <input class="form-control" type="checkbox" id="cb01">
                                    <label for="cb01">Create an account?</label>
                                </div>
                            </div>
                            <h3 class="mt-40"> Addition information</h3>
                            <div class="form-group form-group--inline textarea">
                                <label>Order Notes</label>
                                <textarea class="form-control" rows="5"
                                          placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 ">
                        <div class="ps-checkout__order">
                            <header>
                                <h3>Your Order</h3>
                            </header>
                            <div class="content">
                                <table class="table ps-checkout__products">
                                    <thead>
                                    <tr>
                                        <th class="text-uppercase">Product</th>
                                        <th class="text-uppercase">Total</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if(Session::has('Cart')!=null)
                                        @foreach(Session::get('Cart')->products as $item)
                                            <input  hidden class="form-control" name="productId" value="{{$item['productInfo']->productId}}">
                                            <input  hidden class="form-control" name="productName" value="{{$item['productInfo']->name}}">
                                            <input  hidden class="form-control" name="quantity" value="{{$item['quantity']}}">
                                            <input  hidden class="form-control" name="productPrice" value=" {{$item['price']}}">


                                            <tr>
                                                <td>{{$item['productInfo']->name}} x{{$item['quantity']}}</td>
                                                <td name="">${{$item['price']}}</td>
                                            </tr>
                                        @endforeach
                                        {{--                                    <tr>--}}
                                        {{--                                        <td>Card Subtitle</td>--}}
                                        {{--                                        <td>$300.00</td>--}}
                                        {{--                                    </tr>--}}
                                        <tr>
                                            <td>Order Total</td>
                                            <td >${{(Session::get('Cart')->totalPrice)}}</td>
                                        </tr>
                                        <input  hidden class="form-control" name="total" value="{{(Session::get('Cart')->totalPrice)}}">
                                    </tbody>
                                    @endif
                                </table>
                            </div>
                            <footer>
                                <h3>Payment Method</h3>
                                <div class="form-group cheque">
                                    <div class="ps-radio">
                                        <input class="form-control" type="radio" id="rdo01" name="payment" checked>
                                        <label for="rdo01">Cheque Payment</label>
                                        <p>Please send your cheque to Store Name, Store Street, Store Town, Store State
                                            / County, Store Postcode.</p>
                                    </div>
                                </div>
                                <div class="form-group paypal">
                                    <div class="ps-radio ps-radio--inline">
                                        <input class="form-control" type="radio" name="payment" id="rdo02">
                                        <label for="rdo02">Paypal</label>
                                    </div>
                                    <ul class="ps-payment-method">
                                        <li><a href="#"><img src="{{asset('resources/images/payment/1.png')}}" alt=""></a></li>
                                        <li><a href="#"><img src="{{asset('resources/images/payment/2.png')}}" alt=""></a></li>
                                        <li><a href="#"><img src="{{asset('resources/images/payment/1.png')}}" alt=""></a></li>
                                    </ul>
                                    <button type="submit" onclick="popup()" class="ps-btn ps-btn--fullwidth">
                                        <a href="{{route('checkout_success')}}">Place Order</a><i class="ps-icon-next"></i>
                                    </button>

                                </div>
                            </footer>
                        </div>
                        <div class="ps-shipping">
                            <h3>FREE SHIPPING</h3>
                            <p>YOUR ORDER QUALIFIES FOR FREE SHIPPING.<br> <a href="#"> Singup </a> for free shipping on
                                every order, every time.</p>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script>
        function popup(){
                @if(Session::has('Cart')==null){
                alertify
                    .alert("This is an alert dialog.", function(){
                        alertify.message('Order succeed!Thank you for shopping with us');
                    });
            }
            @endif
        }
    </script>
@endsection
