const formulario = document.getElementById('formulario');
const inputs = document.querySelectorAll('#formulario input');


const expresiones = {
    usuario: /^[a-zA-Z0-9\_\-]{4,16}$/, // Letras, numeros, guion y guion_bajo
    nombres: /^[a-zA-ZÀ-ÿ\s]{1,40}$/, // Letras y espacios, pueden llevar acentos.
    password: /^.{4,255}$/, // 4 a 255 digitos.
    correo: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
    nota: /^[0-9]{7,14}$/, // 7 a 14 numeros.
    promedio: /^[0-9]{2,3}$/ // 2 a 3 numeros.
}
const campos = {
    nombre: false,
    apellido: false,
    usuario: false,
    contrasena: false,
    promedio: false
}

const validarFormulario = (e) => {
    switch (e.target.name) {
        case "Nombre":
            validarCampo(expresiones.nombres, e.target, 'nombre');
            break;
        case "Apellido":
            validarCampo(expresiones.nombres, e.target, 'apellido');
            break;
        case "Usuario":
            validarCampo(expresiones.usuario, e.target, 'usuario');
            break;
        case "Contrasena":
            validarCampo(expresiones.password, e.target, 'contrasena');
            break;
        case "Documento":
            validarCampo(expresiones.nota, e.target, 'documento');
            break;
        case "Correo":
            validarCampo(expresiones.correo, e.target, 'correo');
            break;
        case "Promedio":
            if (e.target.value <= 10 && e.target.value >= 100) {
                campos.promedio = 'prom_out';
            } else {
                validarCampo(expresiones.promedio, e.target, 'promedio');
            }
            break;
    }
}
const validarCampo = (expresion, input, campo) => {
    if (expresion.test(input.value)) {
        document.querySelector(`#grupo_${campo} input`).classList.remove('border', 'border-danger', 'border-2');
        document.querySelector(`#grupo_${campo} input`).classList.add('border', 'border-success', 'border-2');
        document.querySelector(`#grupo_${campo} i`).classList.remove('bi-x-circle', 'text-danger', 'fs-5');
        document.querySelector(`#grupo_${campo} i`).classList.add('bi-check-circle', 'text-success', 'fs-5');
        document.querySelector(`#grupo_${campo} .formulario_error`).classList.add('visually-hidden');
        campos[campo] = true;
    } else {
        document.querySelector(`#grupo_${campo} input`).classList.remove('border', 'border-success', 'border-2');
        document.querySelector(`#grupo_${campo} input`).classList.add('border', 'border-danger', 'border-2');
        document.querySelector(`#grupo_${campo} i`).classList.remove('bi-check-circle', 'text-success', 'fs-5');
        document.querySelector(`#grupo_${campo} i`).classList.add('bi-x-circle', 'text-danger', 'fs-5');
        document.querySelector(`#grupo_${campo} .formulario_error`).classList.remove('visually-hidden');
        campos[campo] = false;
    }
}

// Por si se necesita validar 2 contraseñas

// const validarPassword2 = () => {
//     const inputPassword1 = document.getElementById('password')
//     const inputPassword2 = document.getElementById('password2')

//     if (inputPassword1.value !== inputPassword2.value) {
//         console.log('Las contraseñas no coinciden');
//         // Cambiar los valores de las clases para que muestre como error
//     } else {
//         console.log('Las contraseñas coinciden');
//         // Cambiar los valores de las clases para que muestre como valido
//     }
//     // Esta funcion se pone en ambos casos de las contraseñas del switch.
// }

inputs.forEach((input) => {
    input.addEventListener('keyup', validarFormulario);
    input.addEventListener('blur', validarFormulario);
});

formulario.addEventListener('submit', (e) => {
    if (campos.promedio === 'prom_out') {
        document.querySelector(`#grupo_promedio input`).classList.remove('border', 'border-success', 'border-2');
        document.querySelector(`#grupo_promedio input`).classList.add('border', 'border-danger', 'border-2');
        document.querySelector(`#grupo_promedio i`).classList.remove('bi-check-circle', 'text-success', 'fs-5');
        document.querySelector(`#grupo_promedio i`).classList.add('bi-x-circle', 'text-danger', 'fs-5');
        document.querySelector(`#grupo_promedio .formulario_error`).classList.remove('visually-hidden');
    }


});