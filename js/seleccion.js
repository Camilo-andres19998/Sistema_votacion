function cargarComunas() {
    let region_id = document.getElementById("regiones").value;

    let xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            let comunas = JSON.parse(this.responseText);
            let html = "<option value=''>--Seleccione--</option>";
            comunas.forEach(function(comuna) {
                html += "<option value='" + comuna.id + "'>" + comuna.nombre + "</option>";
            });
            document.getElementById("comunas").innerHTML = html;
        }
    };
    xmlhttp.open("POST", "guardar_datos.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("region_id=" + region_id);
}