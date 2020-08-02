@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span>{{ __('SHOP') }}</span>
                    <span>{{ $products->links() }}</span>
                </div>
                <div class="card-body">
                    <div class="content">
                        @foreach ($products as $product)
                        <div class="col col-md-8 mb-3">
                            <div class="card h-100 thumbnail">
                                <img src="{{$product->img}}" class="card-img-top" alt="{{$product->name}}">
                                <div class="overlay">
                                    <a href="{{ route('products.show',['product'=>$product->id])}}" class="btns">Xem Chi
                                        Tiet</a>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">{{$product->name}}</h5>
                                    <div class="card-text">
                                        <div style="color:#f7347a"><span style="color: rgb(171, 176, 190);">Gia:</span>
                                            {{number_format($product->price)}} VND</div>
                                        <form action="{{ route('products.addCart') }}"
                                            onsubmit="event.preventDefault();getSubmit(this,);" method="post">
                                            @csrf
                                            <div class="input-group">
                                                <span class="input-group-btn">
                                                    <button type="button" class="btn btn-default btn-number"
                                                        disabled="disabled" data-type="minus"
                                                        data-field="product_amount{{$product->id }}">
                                                        <i class="fas fa-minus"></i>
                                                    </button>
                                                </span>
                                                <input type="number" name="product_amount{{$product->id }}"
                                                    class="form-control input-number" value="1" min="1" max="100">
                                                <span class="input-group-btn">
                                                    <button type="button" class="btn btn-default btn-number"
                                                        data-type="plus" data-field="product_amount{{$product->id }}">
                                                        <i class="fas fa-plus"></i>
                                                    </button>
                                                </span>
                                            </div>
                                            <input type="hidden" name="product_id" value="{{$product->id }}">
                                            <input type="hidden" name="product_name" value="{{$product->name }}">
                                            <input type="hidden" name="product_img" value="{{$product->img }}">
                                            <input type="hidden" name="product_price" value="{{$product->price }}">
                                            <button class="btn btn-outline-primary btn-sing" type="submit"><i
                                                    class="fas fa-cart-arrow-down"></i>
                                                Them Vao
                                                Gio</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            {{ $products->links() }}
        </div>
    </div>
</div>
{{-- <script>
    function getSubmit(ele){
    product_id = $(ele).find("input[name='product_id']").val();
    product_name = $(ele).find("input[name='product_name']").val();
    product_img = $(ele).find("input[name='product_img']").val();
    product_price = $(ele).find("input[name='product_price']").val();
    amount = 'product_amount'+product_id;
    product_amount = $(ele).find("input[name="+amount+"]").val();
    $.ajax({
    url: "{{ route('products.addCart') }}",
method: "post",
data: {_token: '{{ csrf_token() }}',
product_id: product_id,
product_name: product_name,
product_img: product_img,
product_price: product_price,
product_amount: product_amount},
success: function (data) {
toastr["success"]("Add Success!")
}
});
}
</script> --}}
@endsection