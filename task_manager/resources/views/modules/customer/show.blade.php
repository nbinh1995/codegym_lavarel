<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Title</title>
</head>
<body>
<h1>Danh sách khách hàng</h1>
<table border="1">
  <thead>
  <tr>
      <th>STT</th>
      <th>Họ và tên</th>
      <th>Số điện thoại</th>
      <th>Email</th>
      <th>Địa chỉ</th>
  </tr>
  </thead>
  <tbody>
    @foreach ($customer as $item)
    <tr>
        <td>{{ $item->id}}</td>
        <td>{{ $item->name}}</td>
        <td>{{ $item->phone}}</td>
        <td>{{ $item->email}}</td>
        <td>{{ $item->address}}</td>
    </tr>   
    @endforeach
  </tbody>
</table>
<a href="/customer/index">Quay Lại</a>
</body>
</html>