<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/minus_and_plus.js') }}" defer></script>
    <!-- Fonts -->
    <link rel="stylesheet" href="//use.fontawesome.com/releases/v5.0.7/css/all.css">
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>


</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <form action="#" method="get" class="navbar-nav mr-auto">
                        <input type="text" name="search" class="search" placeholder="Search">
                        <button type="submit" class="icon-search"><i class="fas fa-search "></i></button>
                    </form>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <div class="dropdown nav-link">
                                <a class="dropdown-toggle" href="{{ route('checkout')}}" id="dropdownMenuLink1"
                                    data-toggle="" aria-haspopup="true" aria-expanded="false"><i
                                        class="fa fa-shopping-cart"></i> Cart
                                    <span class="badge">{{session('cart')['count'] ?? 0}}</span></a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    <div id="cart">
                                        @include('partials.hover_cart')
                                    </div>
                                    <!--end shopping-cart -->
                                </div>
                            </div>
                        </li>
                        <!-- Authentication Links -->
                        @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                        @endif
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <script>
        window.addEventListener('resize', reportWindowSize);
        function reportWindowSize(){
            console.log(window.innerWidth);
            if(window.innerWidth < '768'){     
                $('#dropdownMenuLink1').attr('data-toggle','dropdown');
            }else{
                $('#dropdownMenuLink1').attr('data-toggle','');
                $('#dropdownMenuLink1').attr('aria-expanded','false');
                $('#dropdownMenuLink1 ~div').removeClass('show');
            }
        }
        function getSubmit(ele) {
        product_id = $(ele).find("input[name='product_id']").val();
        product_name = $(ele).find("input[name='product_name']").val();
        product_img = $(ele).find("input[name='product_img']").val();
        product_price = $(ele).find("input[name='product_price']").val();
        amount = 'product_amount' + product_id;
        product_amount = $(ele).find("input[name=" + amount + "]").val();
        $.ajax({
        url: "{{ route('products.addCart') }}",
        method: "post",
        data: {
        _token: '{{ csrf_token() }}',
        product_id: product_id,
        product_name: product_name,
        product_img: product_img,
        product_price: product_price,
        product_amount: product_amount
        },
        success: function (data) {
        $(ele).find("input[name=" + amount + "]").val(1);    
        $('#cart').html(data['hover'])
        $('.badge').text(data['count'])
        toastr.options = {"positionClass": "toast-bottom-right"}
        toastr["success"]("Add Success!")
        }
        });
        }
        
        function getClear() {
        $.ajax({
        url: "{{ route('products.clearCart') }}",
        method: "get",
        data: {
        _token: '{{ csrf_token() }}',
        },
        success: function (data) {
        $('.cart-table').html(data['table'])
        $('#cart').html(data['hover'])
        $('.badge').text(data['count'])
        toastr.options = {"positionClass": "toast-bottom-right"}
        toastr["success"]("Clear Success!")
        }
        });
        }
        
        function getRemove(id) {
        
        url = window.location.origin + '/removeCart/' + id;
        $.ajax({
        url: url,
        method: "get",
        data: {
        _token: '{{ csrf_token() }}',
        },
        success: function (data) {
        $('.cart-table').html(data['table'])
        $('#cart').html(data['hover'])
        $('.badge').text(data['count'])
        toastr.options = {"positionClass": "toast-bottom-right"}
        toastr["success"]("Remove Success!")
        }
        });
        }
        
        function getChange(ele) {
        product_amount = $(ele).val();
        id = $(ele).data('id');
        // console.log("{{ route('products.updateCart',['id'=>"+id+"]) }}");
        $.ajax({
        url: "{{ route('products.updateCart') }}",
        method: "post",
        data: {
        _token: '{{ csrf_token() }}',
        product_id: id,
        product_amount: product_amount
        },
        success: function (data) {
        $('.cart-table').html(data['table'])
        $('#cart').html(data['hover'])
        $('.badge').text(data['count'])
        toastr.options = {"positionClass": "toast-bottom-right"}
        toastr["success"]("Update Success!")
        }
        });
        }
    </script>
</body>

</html>