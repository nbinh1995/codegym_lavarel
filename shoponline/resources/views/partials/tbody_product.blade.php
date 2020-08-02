@foreach ($products as $key => $item)
<tr>
    <td>{{$key+1}}</td>
    <td>{{$item->category_id}}</td>
    <td>{{$item->name}}</td>
    <td><img src="{{$item->img}}" alt="{{$item->name}}" style="width:50px"></td>
    <td>{{$item->price}}</td>
    <td>{{$item->desc}}</td>
    <td>
        {{-- <button type="button" onclick="images(this)"
                                                                        class="btn btn-success btn-sm mb-1"><i class="fas fa-images"></i>
                                                                        Images</button> --}}
        <button data-id="{{$item->id}}" type="button" onclick="getEdit(this)" class="btn btn-info btn-sm mb-1"><i
                class="fa fa-edit"></i>
            Sửa</button>
        <button data-id="{{$item->id}}" type="button" onclick="getDestroy(this)" class="btn btn-danger btn-sm mb-1"><i
                class="fa fa-trash-o"></i>
            Xóa</button>
    </td>
</tr>
@endforeach