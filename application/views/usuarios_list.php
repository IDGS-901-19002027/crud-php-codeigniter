<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
</head>
<style>
    #btnBack,
    #reactive,
    #delete {
        margin-left: 5px;
    }

    #update {
        background-color: #d49c04;
        color: white;
    }

    body {
        background-color: #659c6b;  
    }

    .card {
        padding: 2%;
    }
</style>

<body>
    <div class="body">
        <div class="container">
            <div class="row mt-5">
                <div class="col-12">
                    <div class="card shadow rounded mb-5">
                        <h4 class="text-center card-header">Módulo de Usuarios</h4>
                        <div class="row">
                            <div class="mt-2">
                                <div class="col">
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-success float-end" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        Agregar usuario <i class="fa fa-user-plus"></i>
                                    </button><br>
                                </div>

                                <div class="col mt-2">
                                    <label for="buscador" class="form-label">Búsqueda por correo</label>
                                    <div class="input-group">
                                        <input id="buscador" type="text" class="form-control" placeholder="Ingrese el correo, ej: correo@email.com"/>
                                        <button class="input-group-addon btn btn-secondary" id="search" type="reset">
                                            Buscar <i class="fa fa-search"></i>
                                        </button>
                                    </div>
                                </div>

                                <!-- Modal Insert -->
                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Agregar usuario</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="" method="post" id="form">
                                                    <div class="form-group">
                                                        <label class="form-label mt-2" for="nombre">Nombre</label>
                                                        <input class="form-control" type="text" name="nombre" id="nombre">
                                                        <label class="form-label mt-2" for="nombre">Correo</label>
                                                        <input class="form-control" type="email" name="correo" id="correo">
                                                        <label class="form-label mt-2" for="contrasenia">Contraseña</label>
                                                        <input class="form-control" type="password" name="contrasenia" id="contrasenia">
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <button id="add" type="reset" class="btn btn-success"><i class="fa fa-check"></i> Guardar cambios </button>
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar <i class="fa fa-close"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Modal update -->
                                <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Actualizar usuario</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="" method="post" id="edit_form">
                                                    <div class="form-group">
                                                        <input type="hidden" name="id" id="id_actualizado" value="">
                                                        <label class="form-label mt-2" for="nombre">Nombre</label>
                                                        <input class="form-control" type="text" name="nombre" id="nombre_actualizado">
                                                        <label class="form-label mt-2" for="nombre">Correo</label>
                                                        <input class="form-control" type="email" name="correo" id="correo_actualizado">
                                                        <label class="form-label mt-2" for="contrasenia">Contraseña</label>
                                                        <input class="form-control" type="password" name="contrasenia" id="contrasenia_actualizado">
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <button id="updateUser" type="reset" class="btn btn-success"><i class="fa fa-check"></i> Actualizar cambios</button>
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar <i class="fa fa-ban"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 mt-3">
                                <table id="usersTable" class="table table-hover table-striped text-center">
                                    <thead>
                                        <tr>
                                            <th style="background-color: #32a852 !important; color: white;">ID</th>
                                            <th style="background-color: #32a852 !important; color: white;">Nombre</th>
                                            <th style="background-color: #32a852 !important; color: white;">Correo</th>
                                            <th style="background-color: #32a852 !important; color: white;">Estatus</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tbody">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script>
        // Buscar
        $(document).on("click", "#search", function(event) {
            event.preventDefault();

            var correo = $("#buscador").val();

            $.ajax({
                url: "<?php base_url() ?> usuarios/getUserByEmail",
                type: "post",
                dataType: "json",
                data: {
                    correo: correo,
                },
                success: function(data) {
                    console.log(data);
                    if (data.total > 0) {
                        // Remover tabla
                        var filas = document.getElementsByTagName("tr");
                        $("filas").remove();
                        var tbody = '';

                        for (var user in data.data) {
                            tbody += "<tr>";
                            tbody += "<td>" + data.data[user]['id'] + "</td>";
                            tbody += "<td>" + data.data[user]['nombre'] + "</td>";
                            tbody += "<td>" + data.data[user]['correo'] + "</td>";
                            tbody += "<td>"

                            if (data.data[user]['estatus'] == 1) {
                                tbody += `<a class="btn" href="" id="update" value="${data.data[user]['id']}">Actualizar <i class="fa fa-pencil"></i></a>`;
                                tbody += `<a class="btn btn-danger" href="" id="delete" value="${data.data[user]['id']}">Eliminar <i class="fa fa-trash"></i></a>`;
                            } else {
                                tbody += `<a class="btn btn-dark" href="" id="reactive" value="${data.data[user]['id']}">Reactivar <i class="fa fa-user-plus"></i></a>`;
                            }
                            //<a class="btn btn-danger" href="" id="delete" value="${data.data[user]['id']}">Eliminar</a>
                            tbody += `<button class="btn btn-secondary" id="btnBack" >Regresar <i class="fa fa-undo"></i></button>
                                  </td>`;
                            tbody += "</tr>";

                        }

                        $("#tbody").html(tbody);
                    } else {
                        Swal.fire('Usuario no encontrado', 'El correo no se encuentra registrado en el sistema.', 'info')
                    }
                }
            });
        });

        $("#btnBack").click(function() {
            alert("Prueba");
        });

        $(document).on("click", "#btnBack", function(e) {
            e.preventDefault();

            window.location.reload();

        });

        // Agregar usuario
        $(document).on("click", "#add", function(e) {
            e.preventDefault();

            var nombre = $("#nombre").val();
            var correo = $("#correo").val();
            var contrasenia = $("#contrasenia").val();
            var estatus = 1;
            //alert(correo);

            $.ajax({
                url: "<?php base_url() ?> usuarios/insert",
                type: "post",
                dataType: "json",
                data: {
                    nombre: nombre,
                    correo: correo,
                    contrasenia: contrasenia,
                    estatus: estatus
                },
                success: function(data) {
                    //console.log(data);
                    $('#exampleModal').modal('hide');
                    if (data.response == "success") {
                        //alert(data.message);
                        Swal.fire('Usuario registrado', 'La información del usuario ha sido registrada con éxito.', 'success')
                        getAllUsers();
                    } else {
                        //alert(data.message)
                        Swal.fire('Usuario no registrado', 'La información del usuario no ha sido registrada', 'info')
                        index();
                    }
                }
            });

            $('#form')[0].reset();
        });

        // Obtener usuarios
        function getAllUsers() {
            $.ajax({
                url: "<?php base_url() ?> usuarios/getAll",
                type: "post",
                dataType: "json",
                success: function(data) {
                    //console.log(data);
                    var tbody = '';

                    for (var user in data.data) {
                        tbody += "<tr>";
                        tbody += "<td>" + data.data[user]['id'] + "</td>";
                        tbody += "<td>" + data.data[user]['nombre'] + "</td>";
                        tbody += "<td>" + data.data[user]['correo'] + "</td>";
                        tbody += "<td>"

                        if (data.data[user]['estatus'] == 1) {
                            tbody += `<a class="btn" href="" id="update" value="${data.data[user]['id']}">Actualizar <i class="fa fa-pencil"></i></a>`;
                            tbody += `<a class="btn btn-danger" href="" id="delete" value="${data.data[user]['id']}">Eliminar <i class="fa fa-trash"></i></a>`;
                        } else {
                            tbody += `<a class="btn btn-dark btn-block" href="" id="reactive" value="${data.data[user]['id']}">Reactivar <i class="fa fa-user-plus"></i></a>`;
                        }
                        tbody += `</td>`;
                        tbody += "</tr>";
                    }

                    $("#tbody").html(tbody);
                }
            });
        }

        getAllUsers();

        // Modificar usuario
        $(document).on("click", "#update", function(e) {
            e.preventDefault();

            var id = $(this).attr("value");

            $.ajax({
                url: "<?php base_url() ?> usuarios/update",
                type: "post",
                dataType: "json",
                data: {
                    id: id
                },
                success: function(data) {
                    $('#editModal').modal('show');
                    console.log(data);
                    // Enviar los datos actualizados al formulario
                    $('#id_actualizado').val(data.id);
                    $('#nombre_actualizado').val(data.nombre);
                    $('#correo_actualizado').val(data.correo);
                    $('#contrasenia_actualizado').val(data.contrasenia);
                    getAllUsers();
                }
            });
        });

        $(document).on("click", "#updateUser", function(e) {
            e.preventDefault(e);

            var id_actualizado = $("#id_actualizado").val();
            var nombre_actualizado = $("#nombre_actualizado").val();
            var correo_actualizado = $("#correo_actualizado").val();
            var contrasenia_actualizado = $("#contrasenia_actualizado").val();
            console.log(nombre_actualizado);
            if (nombre_actualizado == "" || correo_actualizado == "" || contrasenia_actualizado == "") {
                Swal.fire({
                    title: '¡Campos faltantes!',
                    text: 'No deje ningún campo vacío.',
                    icon: 'error',
                    confirmButtonColor: '#198754',
                    confirmButtonText: 'Aceptar',
                });
            } else {
                $.ajax({
                    url: "<?php base_url() ?> usuarios/updateUser",
                    type: "post",
                    dataType: "json",
                    data: {
                        id: id_actualizado,
                        nombre: nombre_actualizado,
                        correo: correo_actualizado,
                        contrasenia: contrasenia_actualizado
                    },
                    success: function(data) {
                        //console.log(data);
                        $('#editModal').modal('hide');
                        if (data.response == "success") {
                            Swal.fire('Usuario modificado', 'La información del usuario se actualizó con éxito', 'success')
                            getAllUsers();
                        } else {
                            Swal.fire('Usuario no modificado', 'La información del usuario no ha sido modificada', 'info')
                            getAllUsers();
                        }
                    }
                })
            }

        });

        // Eliminar usuario
        $(document).on("click", "#delete", function(e) {
            e.preventDefault();

            var id = $(this).attr("value");

            Swal.fire({
                title: '¿Quiere eliminar este usuario?',
                text: 'Esta acción no podrá revertirse.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#198754',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sí, eliminar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "<?php base_url() ?> usuarios/delete",
                        type: "post",
                        dataType: "json",
                        data: {
                            id: id
                        },
                        success: function(data) {
                            getAllUsers();
                        }
                    });

                    Swal.fire('Usuario eliminado', 'El usuario fue eliminado con éxito', 'success')
                } else {
                    Swal.fire('Cambios no guardados', 'La información del usuario no fue modificada.', 'info')
                }
            })


        });

        // Reactivar usuario
        $(document).on("click", "#reactive", function(e) {
            e.preventDefault();

            var id = $(this).attr("value");

            Swal.fire({
                title: '¿Quiere reactivar este usuario?',
                text: 'Esta acción reactivará al usuario en el sistema.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#198754',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sí, reactivar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "<?php base_url() ?> usuarios/reactive",
                        type: "post",
                        dataType: "json",
                        data: {
                            id: id
                        },
                        success: function(data) {
                            getAllUsers();
                        }
                    });

                    Swal.fire('Usuario reactivado', 'El usuario fue reactivado con éxito', 'success')
                } else {
                    Swal.fire('Cambios no guardados', 'La información del usuario no fue modificada.', 'info')
                }
            })


        });
    </script>
</body>

</html>