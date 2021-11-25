<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
@if(Session::has('Cart')!=null)
    <a class="ps-cart__toggle" href="{{route('ViewListCart')}}">
        <span><i id="total-quantity">{{Session::get('Cart')->totalQuantity}}</i></span>
        <i class="ps-icon-shopping-cart"></i>
    </a>
    <div class="ps-cart__listing">
        <div class="ps-cart__content">
            @foreach(Session::get('Cart')->products as $item)
                <div class="ps-cart-item">
                    <a class="ps-cart-item__close" data-id="{{$item['productInfo']->productId}}" href="#"></a>
                    <div class="ps-cart-item__thumbnail">
                        <a href="{{route('product_detail')}}?productId={{$item['productInfo']->productId}}"></a>
                        <img src="{{asset('resources/images/shoe/')}}/{{$item['productInfo']->image}}.jpg" alt="">
                    </div>
                    <div class="ps-cart-item__content">
                        <a class="ps-cart-item__title"
                           href="{{route('product_detail')}}?productId={{$item['productInfo']->productId}}">{{$item['productInfo']->name}}</a>
                        <p><span>Size:{{$item['size']}}</span><span>Quantity:{{$item['quantity']}}</span></p>
                    </div>
                </div>
            @endforeach
            <div class="ps-cart__total">
                <input hidden id="total-quantity-cart" value="{{(Session::get('Cart')->totalQuantity)}}">
                <p>Number of items:<span>{{(Session::get('Cart')->totalQuantity)}}</span></p>
                <p>Item Total:<span>${{(Session::get('Cart')->totalPrice)}}</span></p>
            </div>
            <div class="ps-cart__footer">
                <a class="ps-btn" href="{{route('ViewListCart')}}">Check out<i class="ps-icon-arrow-left"></i></a>
            </div>
        </div>
    </div>
@else
    <a class="ps-cart__toggle" href="#">
        <span><i id="total-quantity">0</i></span>
        <i class="ps-icon-shopping-cart"></i>
    </a>
    <div class="ps-cart__listing">
        <div class="ps-cart__content" id="change-item-cart">
            <p style="text-align: center;color: white">Your cart is empty !</p>
        </div>
    </div>
@endif
