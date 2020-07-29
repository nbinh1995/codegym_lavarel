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
                                <h2>¥<?= $product->price?></h2>
                                <div class="overlay">
                                    <a href="{{ route('products.show',['product'=>$product->id])}}" class="btn">Xem Chi
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
@endsection