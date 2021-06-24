<?php
    require_once('../../Usuarios/Modelo/Usuarios.php');

    $ModeloUsuarios = new Usuarios();
    $ModeloUsuarios->authSession();
?>

<div class="modal" id="add_course">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <div class="container">
                    <h1 class="text-center fs-3">Registrar Materia</h1>
                </div>
                <button class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <form action="../Controladores/add.php" method="POST" id="formulario">

                        <label for="Nombre">Nombre Materia</label>
                        <div class="position-relative" id="grupo_nombre">
                            <input type="text" autocomplete="off" required placeholder="Nombre Materia" name="Nombre" class="form-control mb-2"><i class="bi position-absolute px-2" style="top: 4px; right: 0; "></i>
                            <p class="formulario_error alert alert-danger fw-light visually-hidden" style="font-size: 0.85rem;">El nombre de la materia tiene que ser de 1 a 40 caracteres y solo puede contener letras</p>
                        </div>
                    </form>
                    <button class="btn btn-success w-100" type="submit" form="formulario">Registrar</button>
                </div>
            </div>
        </div>
    </div>
</div>
