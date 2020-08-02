@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><a href="{{ route('home')}}">Back</a></div>
                <div class="card-body">
                    <div class="media">
                        <img src="{{ $product->img }}" class="mr-3" alt="{{ $product->name }}">
                        <div class="media-body">
                            <h5 class="mt-0">{{ $product->name }}</h5>
                            <h3>Price: </h3>
                            <h3>{{ number_format($product->price) }} vnđ</h3>
                            <form action="{{ route('products.addCart') }}"
                                onsubmit="event.preventDefault();getSubmit(this);" method="post">
                                @csrf
                                <label for="amount">Amount:
                                    <div class="input-group">
                                        <span class="input-group-btn">
                                            <button type="button" class="btn btn-default btn-number" disabled="disabled"
                                                data-type="minus" data-field="product_amount{{ $product->id }}">
                                                <i class="fas fa-minus"></i>
                                            </button>
                                        </span>
                                        <input type="number" name="product_amount{{ $product->id }}"
                                            class="form-control input-number" value="1" min="1" max="100">
                                        <span class="input-group-btn">
                                            <button type="button" class="btn btn-default btn-number" data-type="plus"
                                                data-field="product_amount{{ $product->id }}">
                                                <i class="fas fa-plus"></i>
                                            </button>
                                        </span>
                                    </div>
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                    <input type="hidden" name="product_name" value="{{ $product->name }}">
                                    <input type="hidden" name="product_img" value="{{ $product->img }}">
                                    <input type="hidden" name="product_price" value="{{ $product->price }}">
                                    <button class="btn btn-primary" type="submit">Add To Cart</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
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
{{-- @if (session('create-success'))
{!! session('create-success')!!}
@endif --}}

@endsection