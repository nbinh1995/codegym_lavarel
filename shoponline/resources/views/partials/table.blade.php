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
        @php
        $total = 0;
        @endphp
        @foreach ($product as $item)
        @php
        $total += $item['product_total'];
        @endphp
        <tr>
            <th scope="row">{{ $item['product_id']}}</th>
            <td><img src="{{ $item['product_img']}}" alt="" width="100px"></td>
            <td>{{ $item['product_name']}}</td>
            <td>{{ number_format($item['product_price'])}} VND</td>
            <td><input type="number" min="1" value="{{ $item['product_amount']}}" data-id='{{ $item['product_id']}}'
                    onchange="getChange(this)"></td>
            <td>{{ number_format($item['product_total']) }} VND</td>
            <td><a href="" onclick="getRemove({{ $item['product_id']}})">Remove</a></td>
        </tr>

        @endforeach
    </tbody>
    <tfoot>
        <tr>
            <th colspan="6" style="text-align: center">Total: {{number_format($total) }} VND</th>
        </tr>
    </tfoot>
</table>
@else
<h1> EMPTY CART !</h1>
@endif