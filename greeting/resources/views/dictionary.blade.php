<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        fieldset {
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
    <form action="/dictionary" method="post">
        @csrf
        <fieldset>
            <legend>DICTIONARY</legend>
            <label for="input">
                <input type="text" name="key" id="input" value={{ $input ?? '' }}>
            </label>
            <h3>{{ $output ?? ''}}</h3>
            <input type="submit" value="Translate">
        </fieldset>
    </form>
</body>

</html>