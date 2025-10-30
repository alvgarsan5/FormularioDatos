<?php

// variables vacias
// Así evitanmos errores y puedes mostrar los valores al recargar el formulario.
$nombre = "";
$apellidos = "";
$password = "";
$email = "";
$confirmarPassword = "";
$pais = "";
$fecha = "";
$acepto = false;
$error = [];

if($_SERVER["REQUEST_METHOD"]== "POST"){
    $nombre = trim($_POST['nombre'] ?? "");
    $apellidos = trim($_POST['apellidos'] ?? "");
    $password = trim($_POST['password'] ?? "");
    $confirmarPassword = $_POST['confirmarPassword'] ?? "";
    $email = trim($_POST['email'] ?? "");
    $pais = trim($_POST['pais'] ?? "");
    $fecha = trim($_POST['fecha'] ?? "");
    $acepto = isset($_POST['acepto']) ? true : false;
    


    // Validación de campos
    if (empty($nombre)) {
       $error['nombre'] = "El nombre es obligatorio"; 
    }
    if (empty($apellidos)) {
       $error['apellidos'] = "Los apellidos son obligatorios";
    }
    // Contraseña requerida y longitud mínima
    if (empty($password)) {
         $error['password'] = "La contraseña no puede estar vacía!!!"; 
    }elseif(mb_strlen($password) < 8){
         $error['password'] = "La contraseña no puede tener menos de 8 carácteres!!!"; 
    }
     // Confirmación de contraseña requerida y debe coincidir con la anterior
     if ($confirmarPassword === ''){
        $error['confirmarPassword'] = "Confirma tu contraseña";
     } elseif ($password !== $confirmarPassword){
        $error['confirmarPassword'] = "Las contraseñas no coinciden";
     }
    if (empty($pais)) {
          $error['pais'] = "Selecciona el país porfa!!!"; 
    }
    if (empty($fecha)) {
      $error['fecha'] = "SLa fecha es obligatoria!!!"; 
    }
     // Email requerido y con formato correcto
    if(empty($email)){
        $error['email'] = "El email no puede estar vacía!!!";
    }elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        $error['email'] = "El correo no tiene el formato requerido!!!" ;
    }
    
    if (!($acepto)){
        $error['acepto'] = "Error debes aceptar las condiciones";
    }
    // Si no hay errores (el array está vacío), mostramos mensaje de éxito
    if(empty($error)){
         echo "<div>¡Registro completado con éxito!</div>";
          echo "<p>Bienvenido/a $nombre $apellidos</p>";

        exit(); // Detiene la ejecución para que no se muestre el formulario de nuevo
    }



}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Formulario</title>
</head>
<body>
       <header>
        <h1>Formulario de registro</h1>
    <nav> </nav>
    </header>
    <main>
        <section id="contenedor_frm" name="contenedor_frm">
           <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">

                 <fieldset>
                <legend>Datos usuarios</legend>
                <article>
                    <label for="nombre">Nombre</label>
                    <input type="text" name="nombre" id="nombre" placeholder="Nombre usuario" required>
                     <span style="color:red;"><?php echo $error['nombre'] ?? ''; ?></span><br><br>
                </article>

                  <article>
                    <label for="Apellidos">Apellidos</label>
                    <input type="text" name="apellidos" id="apellidos" placeholder="Apellidos usuario" required>
                     <span style="color:red;"><?php echo $error['apellidos'] ?? ''; ?></span><br><br>
                </article>

                

                <article>
                    <label for="email">Correo</label>
                    <input type="email" name="email" id="email" placeholder="Correo Electrónico Usuario" required >
                     <span style="color:red;"><?php echo $error['email'] ?? ''; ?></span><br><br>
                </article>

                <article>
                    <label for="password">Contraseña</label>
                    <input type="password" name="password" id="password" placeholder="Contraseña Usuario" required >
                    <span style="color:red;"><?php echo $error['password'] ?? ''; ?></span><br><br>
                     <label for="confirmarPassword">Confirmar Contraseña</label>
                    <input type="password" name="confirmarPassword" id="confirmarPassword" placeholder="Confirmar Contraseña" required >
                    <span style="color:red;"><?php echo $error['confirmarPassword'] ?? ''; ?></span><br><br>

                </article>

                  <article>
                    <label for="fecha">Fecha Nacimiento</label>
                    <input type="date" name="fecha" id="fecha"  required >
                    <span style="color:red;"><?php echo $error['fecha'] ?? ''; ?></span>
                </article>

                <article>
                    <label for="pais">País: </label>
                    <select name="pais" id="pais">
                          <option value="">Seleccione un país</option>
                            <option value="ES">España</option>
                            <option value="FR">Italia</option>
                            <option value="PT">Holanda</option>
                            <option value="IT">Inglaterra</option>
                    </select>
                    <span style="color:red;"><?php echo $error['pais'] ?? ''; ?></span><br><br>

                    <article>
                        <label for="acepto">Acepto los términos y condiciones:</label>
                        <input type="checkbox" id="acepto" name="acepto" required>
                         <span style="color:red;"><?php echo $error['acepto'] ?? ''; ?></span><br><br>
                    </article>
                </article>


                

                <article class="contendor_input">
                    <input type="submit" name="enviar" id="enviar" value="enviar">
                    <input type="reset" name="borrar" id="borrar" value="cancelar">
                    
                </article>
            </fieldset>
            </form>
           
        </section>
        
    </main>
    <footer>
        <p>Designed by Álvaro&copy;</p>
    </footer>   
</body>
</html>


 


