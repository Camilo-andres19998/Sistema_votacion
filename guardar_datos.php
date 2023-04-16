<?php
$mysqli = new mysqli("localhost", "root", "", "bdvotaciones");

// Verificar la conexión
if ($mysqli->connect_error) {
  die("Error de conexión: " . $mysqli->connect_error);
}

// Obtener el ID de la región seleccionada
$region_id = $_POST['region_id'];

// Consulta a la base de datos
$query = "SELECT * FROM comunas WHERE region_id = '$region_id'";
$result = mysqli_query($mysqli, $query);

// Creación del select de comunas
echo "<option value=''>Seleccione una comuna</option>";
while ($row = mysqli_fetch_assoc($result)) {
    echo "<option value='" . $row['id'] . "'>" . $row['nombre'] . "</option>";
}






//$como_se_entero = $_POST['como_se_entero'];

// Obtener los valores seleccionados del campo como_se_entero del formulario
//$como_se_entero = isset($_POST['como_se_entero']) ? $_POST['como_se_entero'] : '';

// Convertir los valores seleccionados en una cadena separada por comas
//$como_se_entero_str = is_array($como_se_entero) ? implode(',', $como_se_entero) : $como_se_entero;

// Validar que el campo no esté vacío
//if (empty($como_se_entero_str)) {
    // Si el campo está vacío, mostrar un mensaje de error
 //   die("Error: Debe seleccionar al menos una opción.");
//}

$query = "SELECT id FROM candidato WHERE candidato = ?";
$stmt = $mysqli->prepare($query);
$stmt->bind_param("s", $candidato);
$stmt->execute();
$resultado = $stmt->get_result();
$candidato_id = $resultado->fetch_assoc()['id'];

$query = "SELECT id FROM regiones WHERE region = ?";
$stmt = $mysqli->prepare($query);
$stmt->bind_param("s", $region);
$stmt->execute();
$resultado = $stmt->get_result();
$region_id = $resultado->fetch_assoc()['id'];


$query = "SELECT id FROM comunas WHERE nombre= ?";
$stmt = $mysqli->prepare($query);
$stmt->bind_param("s", $comuna);
$stmt->execute();
$resultado = $stmt->get_result();
$comuna_id = $resultado->fetch_assoc()['id'];



// Conectar a la base de datos
// ...

// Verificar si el RUT del votante ya ha sido registrado
$result = mysqli_query($mysqli, "SELECT * FROM votos WHERE rut = '$rut'");
if (mysqli_num_rows($resultado) > 0) {
  echo '<span style="color: red;">Usted no puede votar por segunda vez.</span>';
  return;
}



// Obtener el ID de la región seleccionada
$region_id = $_POST['region_id'];

// Consulta a la base de datos
$sql = "SELECT * FROM comunas WHERE region_id = '$region_id'";
$result = mysqli_query($conn, $sql);

// Creación del select de comunas
echo "<option value=''>Seleccione una comuna</option>";
while ($row = mysqli_fetch_assoc($result)) {
    echo "<option value='" . $row['id'] . "'>" . $row['nombre'] . "</option>";
}




// Registrar el voto en la base de datos
$query = "INSERT INTO votos (nombre_apellido, alias, rut, email, region, comuna, candidato, como_se_entero) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
$stmt = $mysqli->prepare($query);
$stmt->bind_param("ssssiiis", $nombre, $usuario, $rut, $email, $region_id, $comuna_id, $candidato_id, $como_se_entero_str);
$stmt->execute();

if ($stmt->affected_rows > 0) {
  echo "Voto registrado correctamente.";
} else {
  echo "Error al registrar el voto.";
}





//Comprobar si la inserción se realizó correctamente
if($query){
    header('refresh:0;url=votacion.php?registrado');
}else{
    header('refresh:0;url=votacion.php?error');
}

// Cerrar la conexión
$mysqli->close();