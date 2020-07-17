<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Title</title>
</head>
<body>
<h1>Danh sách khách hàng</h1>
<a href="/customer/create">Thêm</a>
<table border="1">
  <thead>
  <tr>
      <th>STT</th>
      <th>Họ và tên</th>
      <th>Số điện thoại</th>
      <th>Email</th>
      <th>Thao tác</th>
  </tr>
  </thead>
  <tbody>
    @foreach ($customer as $item)
    <tr>
        <td>{{ $item->id}}</td>
        <td>{{ $item->name}}</td>
        <td>{{ $item->phone}}</td>
        <td>{{ $item->email}}</td>
        <td>
        <a href="/customer/{{$item->id}}/show">Xem</a> | <a href="/customer/{{$item->id}}/edit">Sửa</a> | 
        <form action="/customer/{{$item->id}}" method="post">
        @csrf
        @method('DELETE')
        <input type="submit" value="Xóa">
        </form>
        </td>
    </tr>   
    @endforeach
  </tbody>
</table>
<script>
  function confirm($id){
    var result = confirm("Want to delete?");
  if (result) {
    window.location.href = "/customer/"+$id;
  }
  }
</script>
</body>
</html>