@extends('layouts.admin')

@section('title', 'Products Page')

@section('content')
<div class="col-md-12 col-sm-12 ">
    <div class="x_panel">
        <div class="x_title">
            <h2>Data Table <small>Products</small></h2>
            <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i
                            class="fa fa-wrench"></i></a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="#">Settings 1</a>
                        <a class="dropdown-item" href="#">Settings 2</a>
                    </div>
                </li>
                <li><a class="close-link"><i class="fa fa-close"></i></a>
                </li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card-box table-responsive">
                        <p class="text-muted font-13 m-b-30">
                            Xuất ra file theo các định dạng.
                        </p>
                        <table id="datatable-buttons" class="table table-striped table-bordered" style="width:100%">
                            <button type="button" class="btn btn-primary btn-sm mb-1" data-toggle="modal"
                                data-target="#modal-add"><i class="fa fa-save"></i>
                                Thêm sản phẩm</button>
                            <thead>
                                <tr>
                                    <th>Thể Loại</th>
                                    <th>Tên Sản Phẩm</th>
                                    <th>Ảnh Sản Phẩm</th>
                                    <th>Giá</th>
                                    <th>Mô tả</th>
                                    <th>Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- @include('partials.tbody_product') --}}

                                @foreach ($products as $key => $item)
                                <tr id="product{{$item->id}}">
                                    <td>{{$item->category_id}}</td>
                                    <td>{{$item->name}}</td>
                                    <td><img src="{{$item->img}}" alt="{{$item->name}}" style="width:50px"></td>
                                    <td>{{$item->price}}</td>
                                    <td>{{$item->desc}}</td>
                                    <td>
                                        <button data-id="{{$item->id}}" type="button" onclick="getEdit(this)"
                                            class="btn btn-info btn-sm mb-1"><i class="fa fa-edit"></i>
                                            Sửa</button>
                                        <button data-id="{{$item->id}}" type="button" onclick="getDestroy(this)"
                                            class="btn btn-danger btn-sm mb-1"><i class="fa fa-trash-o"></i>
                                            Xóa</button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- Modal Edit Product --}}
<div class="modal fade" id="modal-edit">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Modal</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" method="POST" onsubmit="event.preventDefault();getUpdate(this)"
                enctype="multipart/form-data">
                @include('partials.form_edit')
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

{{-- Modal Add Product --}}
<div class=" modal fade" id="modal-add">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Modal</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" method="POST" onsubmit="event.preventDefault();getStore(this)"
                enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="add-name" class="col-sm-2 col-form-label">Tên Sản Phẩm<span
                                class="required">*</span></label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" name="name" id="add-name"
                                placeholder="Tên sản phẩm ..." required>
                            {{-- <div class="valid-feedback">
                            </div> --}}
                        </div>
                    </div>
                    <div class="form-row row">
                        <div class="col-md-6 mb-3">
                            <label for="add-price">Giá Tiền<span class="required">*</span></label>
                            <input type="number" class="form-control" min="0" id="add-price" name="price" value=""
                                required>
                            {{-- <div class="valid-feedback">
                                Looks good!
                            </div> --}}
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="add-type">Thể Loại<span class="required">*</span></label>
                            <select class="custom-select" id="add-type" name="category_id" required>
                                <option selected disabled value="">Choose...</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                            </select>
                            {{-- <div class="invalid-feedback">
                                Please select a valid state.
                            </div> --}}
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label for="add-desc">Mô tả sản phẩm</label>
                        <textarea class="form-control " name='desc' id="add-desc" placeholder="Mô tả sản phẩm ..."
                            required></textarea>
                        {{-- <div class="invalid-feedback">
                            Please enter a message in the textarea.
                        </div> --}}
                    </div>
                    <div class="custom-file row mb-3">
                        <label class="custom-file-label" for="add-img">Chọn ảnh...</label>
                        <input type="file" class="custom-file-input" name='img' id="add-img" required>
                        {{-- <div class="invalid-feedback">Example invalid custom file feedback</div> --}}
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add Product</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<script>
    function getStore(ele){
    let data = new FormData(ele);
    bootbox.confirm({
    title: "Xac nhan",
    message: "Ban co muon them khong?",
    buttons: {
    cancel: {
    label: '<i class="fa fa-times"></i> Cancel'
    },
    confirm: {
    label: '<i class="fa fa-check"></i> Confirm'
    }
    },
    callback: function (result) {
    if(result){
    $.ajax({
    url: "{{ route('api.products.store')}}",
    method: "post",
    data:data,
    contentType: false,
    cache: false,
    processData: false,
    success: function (data) {
    if(data['code'] == 200){
        console.log(data['data']);
        let btn= "<button data-id='"+data['data'].id+"' type='button' onclick='getEdit(this)' class='btn btn-info btn-sm mb-1'><i class='fa fa-edit'></i>Sửa</button>"+
        "<button data-id='"+data['data'].id+"' type='button' onclick='getDestroy(this)' class='btn btn-danger btn-sm mb-1'><i class='fa fa-trash-o'></i>Xóa</button>";
        
        let img = "<img src='"+data['data'].img+"' alt='' style='width:50px'>";
        
        table = $('#datatable-buttons').DataTable();
        
        let row = table.row.add([
            data['data'].category_id,
            data['data'].name,
            img,
            data['data'].price,
            data['data'].desc,
            btn
            ]).draw().nodes().to$().attr('id', 'product'+data['data'].id);
      
        $('#modal-add').modal('hide')
        new PNotify({
        title: 'Success',
        text: 'Add Success',
        type: 'success',
        styling: 'bootstrap3',
        delay: 1000,
        });
    }
    }
    });
    } else{
    console.log('noajax');}
    }});
    }

    function getEdit(ele) {
    let id = $(ele).data('id');
    let url = window.location.origin + '/api/dashboard/products/' + id + '/show';
    $.ajax({
    url: url ,
    method: "get",
    data: {
    _token: '{{ csrf_token() }}',
    },
    success: function (data) {
    $('#modal-edit').find("form").html(data['data']);
    $('#modal-edit').modal('show')
    }
    });
    }

    function getUpdate(ele){
        console.log('aloalo');
    let id = $(ele).find("input[name='id']").val();
    let category_id = $(ele).find("select[name='category_id']").val();
    let name = $(ele).find("input[name='name']").val();
    let desc = $(ele).find("textarea[name='desc']").val();
    let price = $(ele).find("input[name='price']").val();
    let url = window.location.origin + '/api/dashboard/products/' + id;

    bootbox.confirm({
    title: "Xac nhan",
    message: "Ban co muon sua khong?",
    buttons: {
    cancel: {
    label: '<i class="fa fa-times"></i> Cancel'
    },
    confirm: {
    label: '<i class="fa fa-check"></i> Confirm'
    }
    },
    callback: function (result) {
    if(result){
    console.log('alo2')
    $.ajax({
    url: url,
    method: "patch",
    data: {
    _token: '{{ csrf_token() }}',
    id: id,
    name: name,
    desc: desc,
    price: price,
    category_id: category_id
    },
    success: function (data) {
        console.log(data);
    if(data['code'] == 200){
        $('#product'+id).html(data['data']);
        $('#modal-edit').modal('hide')
        new PNotify({
        title: 'Success',
        text: 'Update Success',
        type: 'success',
        styling: 'bootstrap3',
        delay: 1000,
        });
    }
    }
    });
    } else{
    console.log('noajax');}
    }});
    }

    function getDestroy(ele){
    let id = $(ele).data('id');
    let url = window.location.origin + '/api/dashboard/products/' + id;
    bootbox.confirm({
    title: "Xac nhan",
    message: "Ban co muon xoa khong?",
    buttons: {
    cancel: {
    label: '<i class="fa fa-times"></i> Cancel'
    },
    confirm: {
    label: '<i class="fa fa-check"></i> Confirm'
    }
    },
    callback: function (result) {
    if(result){
    $.ajax({
    url: url,
    method: "delete",
    data: {
    _token: '{{ csrf_token() }}',
    },
    success: function (data) {
    console.log(data);
    if(data['code'] == 200){
        table = $('#datatable-buttons').DataTable();
        table.row( $('#product'+id)).remove().draw();
        new PNotify({
        title: 'Success',
        text: 'Delete Success',
        type: 'success',
        styling: 'bootstrap3',
        delay: 1000,
        });
    }
    }
    });
    } else{
    console.log('noajax');}
    }});
    }
</script>
@endsection