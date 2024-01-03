<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Crear usuario</title>
</head>
<body>
    <main class="container">
        <h1>Crear nuevo usuario</h1>

        <?php if(isset($data['message'])) {
            echo '<span>'. $data['message'] .'</span><br><br>';
         }?>

        <form action="/users" method="post" >
            <label for="name">Nombre</label>
            <input id="name" name="name" class="form-control" type="text">
            <input id="user" type="submit" class="btn btn-primary mt-2" value="Guardar" >
            <a class="btn btn-info mt-2" href="/users">volver</a>
        </form>
        
    </main>
</body>
</html>