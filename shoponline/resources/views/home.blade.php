@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header">{{ __('SHOP') }}</div>
                <div class="card-body">
                    <div class="content">
                        @foreach ($products as $product)
                        <div class="thumbnail">
                            <img src="<?= $product->img?>" alt="">
                            <h1><?= $product->name?>
                                <h2><?= $product->price?> VND</h2>
                                <form action="{{ route('products.addCart') }}" style="text-align: center;"
                                    onsubmit="event.preventDefault();getSubmit(this);" method="post">
                                    @csrf
                                    <input type="number" style="width:30%; text-align: center;" name='product_amount'
                                        value="1" min='1'>
                                    <input type="hidden" name="product_id" value="<?= $product->id ?>">
                                    <input type="hidden" name="product_name" value="<?= $product->name ?>">
                                    <input type="hidden" name="product_img" value="<?= $product->img ?>">
                                    <input type="hidden" name="product_price" value="<?= $product->price ?>">
                                    <button class="btn-sing" style="width: 100%; border: none;" type="submit"><i
                                            class="fas fa-cart-arrow-down"></i> Them Vao
                                        Gio</button>
                                </form>
                                <div class="overlay">
                                    <a href="{{ route('products.show',['product'=>$product->id])}}" class="btns">Xem Chi
                                        Tiet</a>
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
<script>
    function getSubmit(ele){
    product_id = $(ele).find("input[name='product_id']").val();
    product_name = $(ele).find("input[name='product_name']").val();
    product_img = $(ele).find("input[name='product_img']").val();
    product_price = $(ele).find("input[name='product_price']").val();
    product_amount = $(ele).find("input[name='product_amount']").val();
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
</script>
@endsection