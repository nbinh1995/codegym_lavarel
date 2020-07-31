<div class="shopping-cart">
    @if (session('cart'))
    <div class="shopping-cart-header">
        <a href="{{ route('checkout')}}"><i class="fa fa-shopping-cart cart-icon"></i></a><span
            class="badge">{{session('cart')['count']}}</span>
        <div class="shopping-cart-total">
            <span class="lighter-text">Total:</span>
            <span class="main-color-text">{{number_format(session('cart')['total'])}} VND</span>
        </div>
    </div>
    <!--end shopping-cart-header -->
    <ul class="shopping-cart-items">
        @foreach (session('cart')['item'] as $item)
        <li class="clearfix" title="Total Detail: {{ number_format($item['product_total']) }} VND">
            <img src="{{ $item['product_img']}}" alt="{{ $item['product_name']}}" width='50px' />
            <span class="item-name">{{ $item['product_name']}}</span>
            <span class="item-price">{{ number_format($item['product_price']) }}
                VND</span>
            <span class="item-quantity">Quantity: {{ $item['product_amount']}}</span>
            <span onclick="getRemove({{ $item['product_id']}})" style="cursor: pointer">
                <i class="fas fa-trash-alt"></i></i></span>
        </li>
        @endforeach
    </ul>
    <a href="" class="button">Checkout</a>
    @else
    <div class="shopping-cart-header">
        <i class="fa fa-shopping-cart cart-icon"></i><span class="badge">{{0}}</span>
        <div class="shopping-cart-total">
            <span class="lighter-text">Total:</span>
            <span class="main-color-text">{{'...'}} VND</span>
        </div>
    </div>
    <!--end shopping-cart-header -->
    <h3>EMPTY CART !</h3>
    <a href="" class="button">Checkout</a>
    @endif
</div>