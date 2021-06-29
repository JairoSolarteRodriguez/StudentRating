<?php
    require_once('../../Usuarios/Modelo/Usuarios.php');
    require_once('../../Metodos.php');

    $ModeloUsuarios = new Usuarios();
    $ModeloUsuarios->authSession();//Autentifica si tiene una session iniciada.

    $ModeloMetodos = new Metodos();
?>

<div class="modal" id="add_student">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <div class="container">
                    <h1 class="text-center fs-3">Registrar Estudiante</h1>
                </div>
                <button class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <form action="../Controladores/add.php" method="POST" id="formulario">
                        <label for="Nombre">Nombre</label><br>
                        <div class="position-relative" id="grupo_nombre">
                            <input type="text" autocomplete="off" required placeholder="Nombre" name="Nombre" class="form-control mb-2"><i class="bi position-absolute px-2" style="top: 4px; right: 0; "></i>
                            <p class="formulario_error alert alert-danger fw-light visually-hidden" style="font-size: 0.85rem;">El nombre tiene que ser de 1 a 40 caracteres y solo puede contener letras</p>
                        </div>

                        <label for="Apellido">Apellido</label><br>
                        <div class="position-relative" id="grupo_apellido">
                            <input type="text" autocomplete="off" required placeholder="Apellido"   name="Apellido" class="form-control mb-2"><i class="bi  position-absolute px-2" style="top: 4px; right: 0; "></i>
                            <p class="formulario_error alert alert-danger fw-light visually-hidden" style="font-size: 0.85rem;">El apellido tiene que ser de 1 a 40 caracteres y solo puede contener letras</p>
                        </div>

                        <label for="Documento">Documento</label><br>
                        <div class="position-relative" id="grupo_documento">
                            <input type="text" autocomplete="off" required placeholder="Documento" name="Documento" class="form-control mb-2"><i class="bi  position-absolute px-2" style="top: 4px; right: 0; "></i>
                            <p class="formulario_error alert alert-danger fw-light visually-hidden" style="font-size: 0.85rem;">El documento debe tener una longitud minima de 7 caracteres numéricos</p>
                        </div>

                        <label for="Correo">Correo</label><br>
                        <div class="position-relative" id="grupo_correo">
                            <input type="email" autocomplete="off" required placeholder="Correo" name="Correo" class="form-control mb-2"><i class="bi  position-absolute px-2" style="top: 4px; right: 0; "></i>
                            <p class="formulario_error alert alert-danger fw-light visually-hidden" style="font-size: 0.85rem;">Por favor ingresa un correo válido</p>
                        </div>


                        <label for="Materia">Materia</label><br>
                        <select name="Materia" required  class="form-select">
                            <option value="Seleccione" disabled selected>Seleccione</option>
                            <?php
                                $Materias = $ModeloMetodos->getMaterias();

                                if($Materias != null): //Valida que el array contenga informacion de la bbdd.
                                    foreach($Materias as $Materia):
                                    ?>
                                    <option value="<?= $Materia['MATERIA']; ?>"><?= $Materia['MATERIA']; ?></option>
                                    <?php
                                    endforeach;
                                endif;
                                ?>
                        </select>

                        <label for="Docente">Docente</label><br>

                        <select name="Docente" required  class="form-select">
                            <option value="Seleccione" disabled selected>Seleccione</option>
                            <?php
                                $Docentes = $ModeloMetodos->getDocentes();

                                if($Docentes != null){
                                    foreach($Docentes as $Docente){
                                        ?>
                                        <option value="<?= $Docente['NOMBRE'] . ' ' . $Docente['APELLIDO']; ?>"><?= $Docente['NOMBRE'] . ' ' . $Docente['APELLIDO']; ?></option>
                                        <?php
                                    }
                                }?>
                        </select>

                        <label for="Promedio">Promedio</label><br>
                        <div class="position-relative" id="grupo_promedio">
                            <input type="number" autocomplete="off" required placeholder="Promedio" name="Promedio" class="form-control mb-2"><i class="bi  position-absolute px-2" style="top: 4px; right: 0; "></i>
                            <p class="formulario_error alert alert-danger fw-light visually-hidden" style="font-size: 0.85rem;">El promedio deberá ser mayor a 10 y menor a 100</p>
                        </div>
                    </form>
                    <button class="btn btn-success w-100" type="submit" form="formulario">Registrar Estudiante</button>
                </div>
            </div>
        </div>
    </div>
</div>  