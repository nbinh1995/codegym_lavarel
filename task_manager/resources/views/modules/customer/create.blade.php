<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        fieldset{
            display: inline-flex;
            flex-direction: column;
            text-align: left;
            border: 1px solid #d5d5d5;
            padding: 10px;
        }
        input{
            padding: 12px;
            margin-bottom: 8px
        }
        form{
            text-align: center
        }
    </style>
</head>
<body>
    <form action="/customer/store" method="post">
        @csrf
        <fieldset>
            <legend>THÊM KHÁCH HÀNG</legend>
        <label for="name">Họ Tên</label>
        <input type="text" name="name" id="name">
        <label for="phone">Phone</label>
        <input type="text" name="phone" id="phone">
        <label for="email">Email</label>
        <input type="text" name="email" id="email">
        <label for="address">Address</label>
        <input type="text" name="address" id="address">
        <input type="submit" value="SUBMIT">
        </fieldset>
    </form>
</body>
</html>