const formulario = document.getElementById('formulario');
const inputs = document.querySelectorAll('#formulario input');
const cbx_region = document.getElementById('region');
const cbx_comuna = document.getElementById('comunas');
const cbx_candidato = document.getElementById('candidato');

const expresiones = {
    usuario: /^[a-zA-Z0-9\_\-]{5,16}$/, // Letras, números, guion y guion_bajo
    nombre: /^[a-zA-ZÀ-ÿ\s]{3,40}$/, // Letras y espacios, pueden llevar acentos.
    correo: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
    rut: /^[0-9]{1,2}\.[0-9]{3}\.[0-9]{3}\-[0-9kK]{1}$/, // Formato 11.111.111-K o 11.111.111-k
};

const campos = {
    usuario: false,
    nombre: false,
    correo: false,
    rut: false,
    region: false,
    comuna: false,
    candidato: false,
};



const validarFormulario = (e) => {
    switch (e.target.name) {
        case "usuario":
            validarCampo(expresiones.usuario, e.target, 'usuario');
            break;
        case "nombre":
            validarCampo(expresiones.nombre, e.target, 'nombre');
            break;
        case "correo":
            validarCampo(expresiones.correo, e.target, 'correo');
            break;
        case "rut":
            validarCampo(expresiones.rut, e.target, 'rut');
            break;
    }
}


const validarCampo = (expresion, input, campo) => {
    if(expresion.test(input.value)){
        document.getElementById(`grupo__${campo}`).classList.remove('formulario__grupo-incorrecto');
        document.getElementById(`grupo__${campo}`).classList.add('formulario__grupo-correcto');
        document.querySelector(`#grupo__${campo} i`).classList.add('fa-check-circle');
        document.querySelector(`#grupo__${campo} i`).classList.remove('fa-times-circle');
        document.querySelector(`#grupo__${campo} .formulario__input-error`).classList.remove('formulario__input-error-activo');
        campos[campo] = true;
    } else {
        document.getElementById(`grupo__${campo}`).classList.add('formulario__grupo-incorrecto');
        document.getElementById(`grupo__${campo}`).classList.remove('formulario__grupo-correcto');
        document.querySelector(`#grupo__${campo} i`).classList.add('fa-times-circle');
        document.querySelector(`#grupo__${campo} i`).classList.remove('fa-check-circle');
        document.querySelector(`#grupo__${campo} .formulario__input-error`).classList.add('formulario__input-error-activo');
        campos[campo] = false;
    }
};


inputs.forEach((input) => {
    if(input.id === 'rut'){
        input.addEventListener('keyup', () => {
            validarCampo(expresiones.rut, input, 'rut');
        });
        input.addEventListener('blur', () => {
            validarCampo(expresiones.rut, input, 'rut');
        });
    } else {
        input.addEventListener('keyup', validarFormulario);
        input.addEventListener('blur', validarFormulario);
    }
});



formulario.addEventListener('submit', (e) => {
    e.preventDefault();

    if(campos.usuario && campos.nombre && campos.correo && campos.rut && campos.region && campos.comuna && campos.candidato){
        formulario.reset();

        document.getElementById('formulario__mensaje-exito').classList.add('formulario__mensaje-exito-activo');
        setTimeout(() => {
            document.getElementById('formulario__mensaje-exito').classList.remove('formulario__mensaje-exito-activo');
        }, 5000);

        document.querySelectorAll('.formulario__grupo-correcto').forEach((icono) => {
            icono.classList.remove('formulario__grupo-correcto');
        });
    } else {
        document.getElementById('formulario__mensaje').classList.add('formulario__mensaje-activo');
    }
});
  