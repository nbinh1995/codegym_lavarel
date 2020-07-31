@if (!empty($product))
<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Image</th>
            <th scope="col">Name</th>
            <th scope="col">Price</th>
            <th scope="col">Amount</th>
            <th scope="col">Total Detail</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($product['item'] as $key => $item)
        <tr>
            <th scope="row">{{ $key +1}}</th>
            <td><img src="{{ $item['product_img']}}" alt="{{ $item['product_name']}}" style="width: 100px"></td>
            <td>{{ $item['product_name']}}</td>
            <td>{{ number_format($item['product_price'])}} VND</td>
            <td><input type="number" min="1" value="{{ $item['product_amount']}}" data-id='{{ $item['product_id']}}'
                    onchange="getChange(this)" style="width:50px"></td>
            <td>{{ number_format($item['product_total']) }} VND</td>
            <td><span onclick="getRemove({{ $item['product_id']}})" class="btn btn-warning"><i
                        class="fas fa-trash-alt"></i> Remove</span>
            </td>
        </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr>
            <th colspan="6" style="text-align: center">Total: {{number_format($product['total']) }} VND</th>
        </tr>
    </tfoot>
    <caption>Products: {{ $product['count']}} </caption>
</table>
@else
<h1> EMPTY CART !</h1>
@endif