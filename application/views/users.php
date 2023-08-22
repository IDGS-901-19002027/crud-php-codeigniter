<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<style>
</style>
<body>
    <div class="body">

        <div class="container">
            <div class="row mt-5">
                <div class="col-12 col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <p class="text-center"><b>Formulario de registro</b></p>
                        </div>
                        <div class="card-body">
                            <form action="<?php base_url()?>addUser" method="post">
                                <label class="form-label mt-2" for="nombre">Nombre</label>
                                <input class="form-control" type="text" name="nombre" id="nombre">
                                <label class="form-label mt-2" for="nombre">Correo</label>
                                <input class="form-control" type="email" name="correo" id="correo">
                                <label class="form-label mt-2" for="contrasenia">Contraseña</label>
                                <input class="form-control" type="password" name="contrasenia" id="contrasenia">
                                <button class="btn btn-success form-control mt-4" type="submit" name="submit">Enviar</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-8">
                    <table class="table table-bordered table-hover text-center">
                        <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Correo</th>
                                <th scope="col">Contraseña</th>
                                <th scope="col">Estatus</th>
                                <th scope="col">Observaciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            //print_r($total);
                            if ($total > 0) {
                                foreach ($data as $user) {
                                    echo '<tr>';
                                    foreach ($user as $registro) {
                                        echo '<td>' . $registro . '</td>';
                                    }
                                    echo '<td>';
                                    echo '<a class="btn btn-primary btn-sm" href="' . base_url() . 'welcome/updateUser?id=' . $user['id'] . '">Actualizar</a>';
                                    echo '<a class="btn btn-danger btn-sm" style="margin-left: 2px;"  href="' . base_url() . 'welcome/deleteUser?id=' . $user['id'] . '">Eliminar</a>';
                                    echo '</td>';
                                    echo '</tr>';
                                }
                            ?>

                            <?php
                            } else
                                echo '<tr><td colspan="6">No hay registros en la tabla de usuarios</td></tr>';
                            ?>
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

</html>