@extends('layouts.master')
@section('title','Shoe - Cart')

@section('main')
    <div class="ps-content pt-80 pb-80">
        <div class="ps-container">
            <div class="ps-cart-listing" id="list-cart">
                <table class="table ps-cart__table">
                    <thead>
                    <tr>
                        <th>All Products</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(Session::has('Cart')!=null)
                        @foreach(Session::get('Cart')->products as $item)
                            <tr>
                                <td><a class="ps-product__preview" href="product-detail.html"><img class="mr-15" style="width:100px !important;"
                                                                                                   src="{{asset('resources/images/shoe/')}}/{{$item['productInfo']->image}}.jpg"
                                                                                                   alt=""> {{$item['productInfo']->name}}
                                    </a></td>
                                <td>${{$item['productInfo']->price}}</td>
                                <td>
                                    <div class="form-group--number">
                                        {{--                                        <button class="minus"><span>-</span></button>--}}
                                        <input id="quantity-item-{{$item['productInfo']->productId}}"  onclick="SaveListItemCart({{$item['productInfo']->productId}})" class="form-control" type="number" value="{{$item['quantity']}}">
                                        {{--                                        <i style="margin-left: 5px"  class="fa fa-floppy-o" aria-hidden="true"></i>--}}
                                        {{--                                        <button class="plus"><span>+</span></button>--}}
                                    </div>
                                </td>
                                <td>${{$item['price']}}</td>
                                <td>
                                    <div class="ps-remove" onclick="DeleteListItemCart({{$item['productInfo']->productId}})"></div>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
                <div class="ps-cart__actions">
                    <div class="ps-cart__promotion">
                        <div class="form-group">
                            <div class="ps-form--icon"><i class="fa fa-angle-right"></i>
                                <input class="form-control" type="text" placeholder="Promo Code">
                            </div>
                        </div>
                        <div class="form-group">
                            <button class="ps-btn ps-btn--gray">Continue Shopping</button>
                        </div>
                    </div>
                    <div class="ps-cart__total">
                        <h3>Total Price: <span> ${{(Session::get('Cart')->totalPrice)}}</span></h3><a class="ps-btn" href="{{route('checkout')}}">Process to
                            checkout<i class="ps-icon-next"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Java Script -->
    <script>
        function DeleteListItemCart(id){
            $.ajax({
                url:'Delete-Item-List-Cart/'+id,
                type:'GET',

            }).done(function (response){
                RenderCart(response)
                alertify.success('Removed product from your cart');
            });
        }
        function RenderCart(response){
            $("#list-cart").empty();
            $("#list-cart").html(response);

        }
        function SaveListItemCart(id){
            $.ajax({
                url:'Save-Item-List-Cart/'+id+'/'+ $("#quantity-item-"+id).val(),
                type:'GET',

            }).done(function (response){
                RenderCart(response)
                alertify.success('Update success');
            });
        }
    </script>
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
@endsection
