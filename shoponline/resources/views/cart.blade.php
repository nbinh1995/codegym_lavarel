@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header ">
                    <div style="text-align: center">
                        {{ __('CheckOut') }}
                    </div>
                    <div class="row justify-content-between">
                        <a href="{{ route('home')}}">Back</a>
                        <span onclick="getClear()" style="cursor: pointer; color:blue;">Clear </span>
                    </div>
                </div>
                <div class="card-body cart-table">

                    @include('partials.table')

                </div>
            </div>
        </div>
    </div>
</div>
{{-- <script>
    function getClear(){
       $.ajax({
        url: "{{ route('products.clearCart') }}",
method: "get",
data: {_token: '{{ csrf_token() }}',
},
success: function (data) {
$('.card-body').html(data)
toastr["success"]("Clear Success!")
}
});
}

function getRemove(id){

url = window.location.origin+'/removeCart/'+id;
console.log(url);
$.ajax({
url: url,
method: "get",
data: {_token: '{{ csrf_token() }}',
},
success: function (data) {
$('.card-body').html(data)
toastr["success"]("Remove Success!")
}
});
}

function getChange(ele){
product_amount = $(ele).val();
id = $(ele).data('id');
$.ajax({
url: "{{ route('products.updateCart') }}",
method: "post",
data: {_token: '{{ csrf_token() }}',
product_id: id,
product_amount: product_amount},
success: function (data) {
$('.card-body').html(data)
toastr["success"]("Update Success!")
}
});
}
</script> --}}
@endsection