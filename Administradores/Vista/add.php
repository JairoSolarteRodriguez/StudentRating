<?php
    require_once('../../Usuarios/Modelo/Usuarios.php');

    $ModeloUsuarios = new Usuarios();
    $ModeloUsuarios->authSession();
?>

<div class="modal" id="add_admin">

    <div class="modal-dialog">

        <div class="modal-content">

            <div class="modal-header">
                <div class="container">
                    <h1 class="text-center fs-3">Registrar Administrador</h1>
                </div>
                <button class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">

                <div class="form-group">
                    <form action="../Controladores/add.php" method="POST" id="formulario">

                        <label for="Nombre">Nombre</label><br>
                        <div class="position-relative" id="grupo_nombre">
                            <input type="text" id="Nombre" autocomplete="off" required placeholder="Nombre" name="Nombre" class="form-control mb-2"><i class="bi position-absolute px-2" style="top: 4px; right: 0; "></i>
                            <p class="formulario_error alert alert-danger fw-light visually-hidden" style="font-size: 0.85rem;">El nombre tiene que ser de 1 a 40 caracteres y solo puede contener letras</p>
                        </div>

                        <label for="Apellido">Apellido</label><br>
                        <div class="position-relative" id="grupo_apellido">
                            <input type="text" id="Apellido" autocomplete="off" required placeholder="Apellido" name="Apellido" class="form-control mb-2"><i class="bi  position-absolute px-2" style="top: 4px; right: 0; "></i>
                            <p class="formulario_error alert alert-danger fw-light visually-hidden" style="font-size: 0.85rem;">El apellido tiene que ser de 1 a 40 caracteres y solo puede contener letras</p>
                        </div>

                        <label for="Usuario">Nombre Usuario</label><br>
                        <div class="position-relative" id="grupo_usuario">
                            <input type="text" id="Usuario" autocomplete="off" required placeholder="Nombre Usuario" name="Usuario" class="form-control mb-2"><i class="bi  position-absolute px-2" style="top: 4px; right: 0; "></i>
                            <p class="formulario_error alert alert-danger fw-light visually-hidden" style="font-size: 0.85rem;">El nombre tiene que ser de 4 a 16 caracteres y solo puede contener letras</p>
                        </div>

                        <label for="Contrasena">Contraseña</label><br>
                        <div class="position-relative" id="grupo_contrasena">
                            <input type="password" id="Contrasena" autocomplete="off" required placeholder="Contraseña" name="Contrasena" class="form-control mb-2"><i class="bi  position-absolute px-2" style="top: 4px; right: 0; "></i>
                            <p class="formulario_error alert alert-danger fw-light visually-hidden" style="font-size: 0.85rem;">La contraseña tiene que tener más de 4 caracteres</p>
                        </div>
                    </form>

                    <button class="btn btn-success w-100" type="submit" form="formulario">Registrar</button>
                </div>
            </div>
        </div>
    </div>
</div>