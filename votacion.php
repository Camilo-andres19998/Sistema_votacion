<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Validación de Formulario con Javascript</title>
	<!--<link rel="stylesheet" href="https://necolas.github.io/normalize.css/8.0.1/normalize.css"> -->
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet"> 
  <script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>
  
	<link rel="stylesheet" href="style.css">
</head>
<body>
  
	<main>
		<form action="POST" action="guardar_datos.php" class="formulario" id="formulario">
			<!-- Grupo: Usuario -->
			<div class="formulario__grupo" id="grupo__usuario">
				<label for="usuario" class="formulario__label">Alias</label>
				<div class="formulario__grupo-input">
					<input type="text" class="formulario__input" name="usuario" id="usuario" placeholder="camilo23">
					<i class="formulario__validacion-estado fas fa-times-circle"></i>
				</div>
				<p class="formulario__input-error">El usuario tiene que ser de 4 a 16 dígitos y solo puede contener numeros, letras y guion bajo.</p>
			</div>

			<!-- Grupo: Nombre -->
			<div class="formulario__grupo" id="grupo__nombre">
				<label for="nombre" class="formulario__label">Nombre y Apellido</label>
				<div class="formulario__grupo-input">
					<input type="text" class="formulario__input" name="nombre" id="nombre" placeholder="John Doe">
					<i class="formulario__validacion-estado fas fa-times-circle"></i>
				</div>
				<p class="formulario__input-error">El usuario tiene que ser de 4 a 16 dígitos y solo puede contener numeros, letras y guion bajo.</p>
			</div>

	

			<!-- Grupo: Correo Electronico -->
			<div class="formulario__grupo" id="grupo__correo">
				<label for="correo" class="formulario__label">Correo Electrónico</label>
				<div class="formulario__grupo-input">
					<input type="email" class="formulario__input" name="correo" id="correo" placeholder="correo@correo.com">
					<i class="formulario__validacion-estado fas fa-times-circle"></i>
				</div>
				<p class="formulario__input-error">El correo solo puede contener letras, numeros, puntos, guiones y guion bajo.</p>
			</div>

		

			<!-- Grupo: Correo Rut -->
			<div class="formulario__grupo" id="grupo__rut">
				<label for="rut" class="formulario__label">Rut</label>
				<div class="formulario__grupo-input">
					<input type="rut" class="formulario__input" name="rut" id="rut" placeholder="11.899.788-9">
					<i class="formulario__validacion-estado fas fa-times-circle"></i>
				</div>
				<p class="formulario__input-error">El rut solo puede contener letras, numeros, puntos, guiones</p>
			</div>

		
      	<!-- Grupo: Regiones -->


        <div>
        <label for="region">Región:</label>
        <select name="region" id="region">
            <option value="">Seleccione una región</option>
            <?php
          
          // Conexión a la base de datos
          $mysqli = new mysqli("localhost", "root", "", "bdvotaciones");

            // Validar conexión a la base de datos
            if (!$mysqli) {
                die("Conexión fallida: " . mysqli_connect_error());
            }

            // Consulta a la base de datos
            $sql = "SELECT * FROM regiones";
            $result = mysqli_query($mysqli, $sql);

            // Creación del select de regiones
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<option value='" . $row['id'] . "'>" . $row['region'] . "</option>";
            }

            // Cerrar conexión a la base de datos
            mysqli_close($mysqli);
            ?>
        </select>


      <span id="error_region" style="color: red;"></span>

      <div>


<div class="formulario_grupo" id="grupo_comunas">
  <label for="comuna" class="formulario__label">Comuna:</label>
  <div class="formulario__grupo-input">

  <select name="comunas" id="comunas">
  <option value="">Seleccione una comuna</option>
</select>

  </div>
  <div class="formulario__grupo-error">
    <p class="formulario__input-error">Por favor, seleccione una región</p>
  </div>
</div>



<div class="formulario_grupo" id="grupo_candidato">
  <label for="candidato" class="formulario__label">Candidatos:</label>
  <div class="formulario__grupo-input">
    <select id="candidato" class="formulario__input" name="candidato" required>
      <option value="">Seleccione una comuna</option>
      <?php
        // Conexión a la base de datos
        $mysqli = new mysqli("localhost", "root", "", "bdvotaciones");

        // Consulta para obtener las regiones
        $query = "SELECT candidato FROM candidato ORDER BY candidato";
        $resultado = $mysqli->query($query);
        while($row_candidato = $resultado->fetch_assoc()){
      ?>
          <option value="<?php echo $row_candidato['candidato']; ?>"><?php echo $row_candidato['candidato']; ?></option>
      <?php
        }
      ?>
    </select>
  </div>
  <div class="formulario__grupo-error">
    <p class="formulario__input-error">Por favor, seleccione una región</p>
  </div>
</div>


        

			<!-- Grupo: Terminos y Condiciones -->
			<div class="formulario__grupo" id="grupo__terminos">
				<label class="formulario__label">
					<input class="formulario__checkbox" type="checkbox" name="terminos" id="terminos">
					Acepto los Terminos y Condiciones
				</label>
			</div>




			<div class="formulario__mensaje" id="formulario__mensaje">
				<p><i class="fas fa-exclamation-triangle"></i> <b>Error:</b> Por favor rellena el formulario correctamente. </p>
			</div>

			<div class="formulario__grupo formulario__grupo-btn-enviar">
      <button type="submit" onclick="enviarFormulario()">Votar</button>
				<p class="formulario__mensaje-exito" id="formulario__mensaje-exito">Formulario enviado exitosamente!</p>
			</div>
		</form>



    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function(){
            $('#region').change(function(){
                var region_id = $(this).val();
                $.ajax({
                    url:"guardar_datos.php",
                    method:"POST",
                    data:{region_id:region_id},
                    success:function(data){
                        $('#comunas').html(data);
                    }
                });
            });
        });
    </script>
  



	</main>

  </body>
</html>


	












