<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Betogaizin</title>
    <link rel="stylesheet" href="//use.fontawesome.com/releases/v5.0.7/css/all.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>

<body>
    <div class="container">
        <div class="header">
           
        </div>

        <div class="content">
            @foreach ($products as $product)
            <div class="thumbnail">
                <img src="<?= $product->img?>" alt="">
                <h1><?= $product->name?>
                    <h2>¥<?= $product->price?></h2>
                    <div class="overlay">
                        <a href="{{ route('products.show',['product'=>$product->id])}}" class="btn">Xem Chi Tiet</a>
                    </div>
            </div>
            @endforeach
        </div>
        {{ $products->links() }}
        <div class="footer">

        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>

</html>