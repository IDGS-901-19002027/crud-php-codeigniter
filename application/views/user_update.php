<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row mt-5">
            <div class="col-12 col-md-4">
                <div class="card">
                    <div class="card-header">
                        <p class="text-center"><b>Formulario de registro</b></p>
                    </div>
                    <div class="card-body">
                        <form action="<?php base_url()?>formUpdate" method="post">
                            <input type="hidden" name="id" value="<?= $user->id ?>">
                            <label class="form-label mt-2" for="nombre">Nombre</label>
                            <input class="form-control" type="text" name="nombre" id="nombre" value="<?= $user->nombre ?>">
                            <label class="form-label mt-2" for="nombre">Correo</label>
                            <input class="form-control" type="email" name="correo" id="correo" value="<?= $user->correo ?>">
                            <label class="form-label mt-2" for="contrasenia">Contraseña</label>
                            <input class="form-control" type="password" name="contrasenia" id="contrasenia" value="<?= $user->contrasenia ?>">
                            <button class="btn btn-success form-control mt-4" type="submit" name="submit">Enviar</button>
                        </form>
                        <button class="btn btn-secondary form-control mt-2" href="' . redirect('welcome', 'refresh') .'">Volver</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

</html>