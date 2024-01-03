<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title><?php echo $data['user']->name ?></title>
</head>

<body>
    <main class="container" >
        <h1><?php echo $data['user']->name ?></h1>
        <form action="/users/<?php echo $data['user']->id ?>" method="POST">
            <input type="hidden" name="_method" value="DELETE">
            <a class="btn btn-info" href="/users">regresar</a>
            <a class="btn btn-success" href="/users/<?php echo $data['user']->id ?>/edit">editar</a>
            <input class="btn btn-danger" type="submit" value="eliminar"/>
        </form>
    </main>
</body>

</html>