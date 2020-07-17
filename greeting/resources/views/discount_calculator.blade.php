<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PRODUCT</title>
    <style>
    .box {
            display: inline-flex;
            flex-direction: column;
            text-align: left;
        }

        form {
            text-align: center;
        }
    </style>
</head>

<body>
    <form action="/display" method="post">
    @csrf
        <!-- <fieldset> -->
        <div class="box">
           
            <legend>PRODUCT</legend>
            <label for="">Product Description</label>
            <input type="text" name="productDescription">
            <label for="">List Price</label>
            <input type="text" name="price">
            <label for="">Discount Percent</label>
            <input type="text" name="discountPercent">
            <input type="submit" value="SUBMIT">
        </div>

        <!-- </fieldset> -->
    </form>
</body>

</html>