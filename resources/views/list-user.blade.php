<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>Hello Everyone</h1>
    <?php foreach ($abc as $value):?>
    <tr>
        <td>{{$value['id']}}</td>
        <td>{{$value['name']}}</td>
    </tr>
    <?php endforeach; ?>
</body>

</html>