var mode = document.getElementById("mode").onclick = oscuro;
var m = document.getElementById("icon");

function oscuro() {

    let a = document.querySelectorAll('a.nav-link');
    a.forEach(element => {
        element.classList.toggle('text-dark');
        element.classList.toggle('dark-hover');
    });
    document.getElementById('nav').classList.toggle('bg-dark');
    document.getElementById('drop').classList.toggle('bg-dark');
    document.getElementById('user').classList.remove('dark-hover');

    var icon = document.getElementById('icon');
    var act = icon.classList.toggle('bi-sun');

    if (act == true) {
        var light = ' Claro';
        m.innerText = light;
    } else {
        var dark = ' Oscuro';
        m.innerText = dark;
    }

    // MODO OSCURO/CLARO DE LA TABLA
    const tabla = document.querySelector("table").classList.toggle("table-dark");
}