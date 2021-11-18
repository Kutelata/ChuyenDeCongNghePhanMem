<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
@if(Session::has('Cart')!=null)
    <div class="ps-cart__content" id="change-item-cart">
        @foreach(Session::get('Cart')->products as $item)
            <div class="ps-cart-item">
                <a class="ps-cart-item__close" data-id="{{$item['productInfo']->productId}}" href="#"></a>
                {{--        <a class="ps-cart-item__close"  onclick="DeleteItem({{$item['productInfo']->productId}})" href="javascript:"></a>--}}
                {{--        <i class="ps-cart-item__close" data-id="{{$item['productInfo']->productId}}"></i>--}}
                <div class="ps-cart-item__thumbnail">
                    <a href="product-detail.html"></a><img
                        src="{{asset('resources/images/shoe/')}}/{{$item['productInfo']->image}}.jpg" alt="">
                </div>
                <div class="ps-cart-item__content"><a class="ps-cart-item__title"
                                                      href="product-detail.html">{{$item['productInfo']->name}}</a>
                    <p><span>Quantity:{{$item['quantity']}}</span><span>Total:<i>${{$item['price']}}</i></span></p>
                </div>
            </div>
        @endforeach
        {{--                            <div class="ps-cart-item">--}}
        {{--                                <a class="ps-cart-item__close" href="#"></a>--}}
        {{--                                <div class="ps-cart-item__thumbnail">--}}
        {{--                                    <a href="product-detail.html"></a><img--}}
        {{--                                        src="{{asset('resources/images/cart-preview/2.jpg')}}" alt="">--}}
        {{--                                </div>--}}
        {{--                                <div class="ps-cart-item__content"><a class="ps-cart-item__title"--}}
        {{--                                                                      href="product-detail.html">The Crusty Croissant</a>--}}
        {{--                                    <p><span>Quantity:<i>12</i></span><span>Total:<i>£176</i></span></p>--}}
        {{--                                </div>--}}
        {{--                            </div>--}}
        {{--                            <div class="ps-cart-item">--}}
        {{--                                <a class="ps-cart-item__close" href="#"></a>--}}
        {{--                                <div class="ps-cart-item__thumbnail">--}}
        {{--                                    <a href="product-detail.html"></a><img--}}
        {{--                                        src="{{asset('resources/images/cart-preview/3.jpg')}}" alt="">--}}
        {{--                                </div>--}}
        {{--                                <div class="ps-cart-item__content"><a class="ps-cart-item__title"--}}
        {{--                                                                      href="product-detail.html">The Rolling Pin</a>--}}
        {{--                                    <p><span>Quantity:<i>12</i></span><span>Total:<i>£176</i></span></p>--}}
        {{--                                </div>--}}
        {{--                            </div>--}}
        <div class="ps-cart__total">
            <input hidden id="total-quantity-cart" value="{{(Session::get('Cart')->totalQuantity)}}">
            <p>Number of items:<span >{{(Session::get('Cart')->totalQuantity)}}</span></p>
            <p>Item Total:<span>${{(Session::get('Cart')->totalPrice)}}</span></p>
        </div>
        @if(Session::has('Cart')!=null)
            <div class="ps-cart__footer"><a class="ps-btn" href="{{route('ViewListCart')}}">Check out<i
                        class="ps-icon-arrow-left"></i></a></div>
        @endif
    </div>
    </div>

@endif
