@if(Session::has('Cart')!=null)
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
        @foreach(Session::get('Cart')->products as $item)
            <tr>
                <td>
                    <a class="ps-product__preview" href="product-detail.html">
                        <img class="mr-15"
                             style="width:100px !important;"
                             src="{{asset('resources/images/shoe/')}}/{{$item['productInfo']->image}}.jpg"
                             alt=""> {{$item['productInfo']->name}} {{$item['size']}}
                    </a>
                </td>
                <td>{{$item['productInfo']->price}}</td>
                <td>
                    <div class="form-group--number">
                        <input id="quantity-item-{{$item['productInfo']->productId}}"
                               onclick="SaveListItemCart({{$item['productInfo']->productId}})"
                               class="form-control"
                               type="number" value="{{$item['quantity']}}">
                    </div>
                </td>
                <td>{{$item['price']}}</td>
                <td>
                    <div class="ps-remove" onclick="DeleteListItemCart({{$item['productInfo']->productId}})"></div>
                </td>
            </tr>
        @endforeach
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
            <h3>Total Price: <span> ${{(Session::get('Cart')->totalPrice)}}</span></h3>
            <a class="ps-btn" href="{{route('checkout')}}">Process to checkout<i class="ps-icon-next"></i></a>
        </div>
    </div>
@else
    <div class="alert alert-danger" style="margin: 15px" role="alert">
        We can't find products matching the selection.
    </div>
@endif


