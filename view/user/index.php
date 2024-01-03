<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Lista Usuarios</title>
</head>

<body>
    <main class="container-sm">
        <h1>Listado de Usuarios</h1>

        <?php if (isset($_SESSION['message'])) {?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?php echo $_SESSION['message']; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php unset($_SESSION['message']); } ?>
        <div class="container">
            <div class="row">
                <form class="container col" action="/users" method="GET">
                    <div class="row">
                        <input class="col form-control" type="text" name="q" value="">
                        <div class="col">
                            <input class="btn btn-primary" type="submit" value="buscar">
                            <a class="btn btn-success" href="/users">
                                actualizar
                            </a>
                            <span> </span>
                            <a class="btn btn-secondary" href="/users/create">
                                crear
                            </a>
                        </div>
                    </div>
                </form>
                <div class="col">
                </div>
            </div>
        </div>
        <ul class="list-group list-group-flush">
            <?php foreach ($data['users'] as $user) : ?>
                <li class="list-group-item">
                    <strong>ID:</strong> <?php echo $user->id; ?> -
                    <strong>Nombre:</strong> <?php echo $user->name; ?> -

                    <a href="/users/<?php echo $user->id; ?>"> ver </a>
                </li>
            <?php endforeach; ?>
        </ul>

    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>