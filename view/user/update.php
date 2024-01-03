<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Update user</title>
</head>

<body>
    <main class="container" >
        <h1>Actualizar usuario</h1>

        <form action="/users/<?php echo $data['user']->id ?>/update" method="POST">
            <label for="name">Nombre</label>
            <input id="name" name="name" type="text" class="form-control" value="<?php echo $data['user']->name ?>">
            <input type="hidden" name="_method" value="UPDATE">
            <input id="user" type="submit" class="btn btn-primary mt-2" value="Actualizar">
            <a class="btn btn-info mt-2" href="/users/<?php echo $data['user']->id ?>">volver</a>
        </form>
        <br>
    </main>
</body>

</html>