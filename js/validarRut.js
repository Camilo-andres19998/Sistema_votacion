const MAX_DIGITOS_RUT = 9;

function validarFormatoRut(rut) {
  const regexp = /^(\d{7,8}|\d{1,2}\.\d{3}\.\d{3})-(\d|k|K)$/;
  return regexp.test(rut);
}

function validarRut(rut) {
  const caracteres = Array.from(rut.replace(/\./g, "").toUpperCase());
  const digito_verificador = caracteres.pop();
  let suma = 0;
  let multiplicador = 2;
  for (let i = caracteres.length - 1; i >= 0; i--) {
    suma += multiplicador * parseInt(caracteres[i]);
    multiplicador++;
    if (multiplicador > 7) {
      multiplicador = 2;
    }
  }
  let resto = suma % 11;
  let dv = 11 - resto;
  if (dv === 11) {
    dv = "0";
  } else if (dv === 10) {
    dv = "K";
  } else {
    dv = dv.toString();
  }
  return dv === digito_verificador;
}

function mostrarError(elemento, mensaje) {
  elemento.innerHTML = mensaje;
  elemento.style.display = "block";
}

function ocultarError(elemento) {
  elemento.style.display = "none";
}

function guardarDatos() {
  const nombre = document.getElementById("nombre").value;
  const alias = document.getElementById("alias").value;
  const rut = document.getElementById("rut").value;
  const email = document.getElementById("email").value;
  const region_id = document.getElementById("cbx_region").value;
  const comuna_id = document.getElementById("cbx_comuna").value;
  const candidato_id = document.getElementById("cbx_candidato").value;
  const como_se_entero_str = document.getElementById("como_se_entero").value;

  if (rut.length !== MAX_DIGITOS_RUT) {
    mostrarError(document.getElementById("rutError"), "El RUT debe tener 9 dígitos");
    return;
  }

  if (!validarFormatoRut(rut)) {
    mostrarError(document.getElementById("rutError"), "El RUT ingresado no es válido");
    return;
  }
  // Verificar si el RUT del votante ya ha sido registrado
  var xhr = new XMLHttpRequest();
  xhr.open("POST", "guardar_datos.php", true);
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.onreadystatechange = function () {
    if (xhr.readyState === 4 && xhr.status === 200) {
      if (xhr.responseText === "duplicated") {
        // Mostrar el mensaje de error
        var rutError = document.getElementById("rutError");
        rutError.innerHTML = "Usted no puede votar por segunda vez.";
        rutError.style.display = "block";
      } else if (xhr.responseText === "success") {
        // Registrar el voto en la base de datos
        var xhr2 = new XMLHttpRequest();
        xhr2.open("POST", "guardar_datos.php", true);
        xhr2.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr2.onreadystatechange = function () {
          if (xhr2.readyState === 4 && xhr2.status === 200) {
            if (xhr2.responseText === "success") {
              alert("Voto registrado correctamente.");
              // Redirigir a la página de confirmación
              window.location.href = "confirmacion.php";
            } else {
              alert("Error al registrar el voto.");
            }
          }
        };
        xhr2.send(
          "nombre=" + nombre + "&alias=" + alias + "&rut=" + rut + "&email=" + email +
          "&region_id=" + region_id + "&comuna_id=" + comuna_id + "&candidato_id=" + candidato_id +
          "&como_se_entero_str=" + como_se_entero_str
        );
      } else {
        alert("Error al validar el RUT");
      }
    }
  };
  xhr.send("rut=" + rut + "&candidato_id=" + candidato_id);
}

