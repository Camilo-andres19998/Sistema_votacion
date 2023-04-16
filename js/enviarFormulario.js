function enviarFormulario() {
    // Obtener los valores de los campos del formulario
    var nombre = document.getElementById("txtNombre").value;
    var alias = document.getElementById("txtAlias").value;
    var rut = document.getElementById("rut").value;
    var email = document.getElementById("email").value;
    var region = document.getElementById("cbx_region").value;
    var comuna = document.getElementById("cbx_comuna").value;
    var candidato = document.getElementById("cbx_candidato").value;
    var comoSeEntero = [];
    var checkboxes = document.getElementsByName("como_se_entero[]");
    for (var i = 0; i < checkboxes.length; i++) {
        if (checkboxes[i].checked) {
            comoSeEntero.push(checkboxes[i].value);
        }
    }

    // Crear un objeto con los valores del formulario
    var datosFormulario = {
        nombre: nombre,
        alias: alias,
        rut: rut,
        email: email,
        region: region,
        comuna: comuna,
        candidato: candidato,
        comoSeEntero: comoSeEntero
    };

    // Enviar los datos al servidor utilizando AJAX
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            // El servidor ha respondido con éxito
            alert("Los datos han sido enviados correctamente.");
        } else if (this.readyState == 4) {
            // Ha ocurrido un error en la comunicación con el servidor
            alert("Ha ocurrido un error al enviar los datos.");
        }
    };
    
    xmlhttp.open("POST", "guardar_datos.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/json");
    xmlhttp.send(JSON.stringify(datosFormulario));
}
