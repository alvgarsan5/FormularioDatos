<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="estilos.css">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo.css">
    <title>Document</title>
</head>
<body>
       <header>
        <h1>Formulario de registro</h1>
    <nav> </nav>
    </header>
    <main>
        <section id="contenedor_frm" name="contenedor_frm">
            <form id="frm_datos" action="datos.php">
                 <fieldset>
                <legend>Datos usarios</legend>
                <article>
                    <label for="nombre">Nombre</label>
                    <input type="text" name="nombre" id="nombre" placeholder="Nombre usuario" required>
                </article>

                  <article>
                    <label for="Apellidos">Apellidos</label>
                    <input type="text" name="Apellidos" id="Apellidos" placeholder="Apellidos usuario" required>
                </article>

                

                <article>
                    <label for="email">Correo</label>
                    <input type="email" name="email" id="email" placeholder="Correo Electrónico Usuario" required >
                </article>

                <article>
                    <label for="password">Contraseña</label>
                    <input type="password" name="password" id="password" placeholder="Contraseña Usuario" required >
                     <label for="password">Confirmar Contraseña</label>
                    <input type="password" name="confirmarPassword" id="password" placeholder="Confirmar Contraseña" required >
                </article>

                  <article>
                    <label for="fecha">Fecha Nacimiento</label>
                    <input type="date" name="fecha" id="fecha"  required >
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

                    <article>
                        <label for="acepto">Acepto los términos y condiciones:</label>
                        <input type="checkbox" id="acepto" name="acepto" required>
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

<?php

// variables vacias
$nombre = "";
$apellidos = "";
$password = "";
$email = "";
$confirmarPassword = "";
$error_nombre = "";
$error_password = "";
$error_email = "";
$pais = "";
$fechaN = "";
$error_apellidos = "";
$error_pais = "";
$error_fecha = "";

if($_SERVER["REQUEST_METHOD"]== "POST"){
    $nombre = trim($_POST['nombre']);
    $apellidos = trim($_POST['apellidos']);
    $password = trim($_POST['password']);
    $confirmarPassword = trim($_POST['confirmarPassword']);
    $pais = trim($_POST['pais']);
    $fechaN = trim($_POST['fecha']);
    


    // Validación de campos
    if (empty($nombre)) {
        $error_nombre = "El nombre está vacío";
    }
    if (empty($apellidos)) {
        $error_apellidos = "Los apellidos están vacíos";
    }
    if (empty($password)) {
        $error_password = "La contraseña está vacía";
    }elseif(mb_strlen($password) < 8){
        $error_password = "la contraseña no tiene 8 carácteres"
    }
    if (empty($pais)) {
        $error_pais = "Debe seleccionar un país";
    }
    if (empty($fechaN)) {
        $error_fecha = "Debe seleccionar la fecha de nacimiento";
    }
    if(empty($email)){
        $error_email = "el email no puede estar vacío";
    }elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        $error_email = "el codigo no tiene el formato que pedimos.";
    } 



}

 


