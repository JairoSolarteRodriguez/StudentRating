var mode = document.getElementById("mode");

mode.addEventListener('click', () => {
    const nav = document.getElementById('nav');
    const drop = document.getElementById('drop');
    const user = document.getElementById('user');

    let a = document.querySelectorAll('a.nav-link');
    a.forEach(element => {
        element.classList.toggle('text-dark');
        element.classList.toggle('dark-hover');
    });

    nav.classList.toggle('bg-dark');
    drop.classList.toggle('bg-dark');
    user.classList.remove('dark-hover');

    // MODO OSCURO/CLARO DE LA TABLA
    const tabla = document.querySelector("table").classList.toggle("table-dark");
    // ===============================================================

    var icon = document.getElementById('icon');
    icon.classList.toggle('verify');

    if (nav.classList.contains('bg-dark') && drop.classList.contains('bg-dark')) {
        localStorage.setItem('dark', 'true');
        mode.innerHTML = '<i class="bi bi-sun verify" id="icon"> Claro</i>';
    } else {
        localStorage.setItem('dark', 'false');
        mode.innerHTML = '<i class="bi bi-moon-fill" id="icon"> Oscuro</i>';
    }
});

function dark() {
    let a = document.querySelectorAll('a.nav-link');
    a.forEach(element => {
        element.classList.remove('text-dark');
        element.classList.add('text-light');
        element.classList.add('dark-hover');
    });

    nav.classList.add('bg-dark')
    drop.classList.add('bg-dark');
    user.classList.add('dark-hover');

    // MODO OSCURO/CLARO DE LA TABLA
    document.querySelector("table").classList.add("table-dark");

    mode.innerHTML = '<i class="bi bi-sun verify" id="icon"> Claro</i>';

}

function light() {

    let a = document.querySelectorAll('a.nav-link');
    a.forEach(element => {
        element.classList.add('text-dark');
        element.classList.remove('dark-hover');
    });

    nav.classList.remove('bg-dark')
    drop.classList.remove('bg-dark');
    user.classList.remove('dark-hover');

    // MODO OSCURO/CLARO DE LA TABLA
    document.querySelector("table").classList.remove("table-dark");

    mode.innerHTML = '<i class="bi bi-moon-fill" id="icon"> Oscuro</i>';
}

if (localStorage.getItem('dark') === 'true') {
    dark();
} else {
    light();
}