{{-- <tr id="product{{$product->id}}"> --}}
<td>{{$product->category_id}}</td>
<td>{{$product->name}}</td>
<td><img src="{{$product->img}}" alt="{{$product->name}}" style="width:50px"></td>
<td>{{$product->price}}</td>
<td>{{$product->desc}}</td>
<td>
    <button data-id="{{$product->id}}" type="button" onclick="getEdit(this)" class="btn btn-info btn-sm mb-1"><i
            class="fa fa-edit"></i>
        Sửa</button>
    <button data-id="{{$product->id}}" type="button" onclick="getDestroy(this)" class="btn btn-danger btn-sm mb-1"><i
            class="fa fa-trash-o"></i>
        Xóa</button>
</td>
{{-- </tr> --}}