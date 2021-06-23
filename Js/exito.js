const mensaje = () => {
    var msj = document.getElementById('exito');

    const mensaje = `<div class="alert alert-danger alert-success fade show" role="alert">
        Registro eliminado exitosamente.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>`;

    setTimeout(function() {
        msj.innerHTML = '';
    }, 3000);
    msj.innerHTML = mensaje;
}