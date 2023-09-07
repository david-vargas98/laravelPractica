<!-- Título: Práctica de HTML5 y CSS - Alumno: Edgar David Vargas Fuentes - Sección: D13 - Asignatura: Programación para internet -->
<!DOCTYPE html>
<html lang="es"> <!-- Idioma español -->
<head>
    <meta charset="UTF-8"> <!-- Codificación UTF-8 -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario.html</title> <!-- Título para mostrar en pestaña/ventana de navegador -->
    <link rel="stylesheet" href="style.css"> <!-- Archivo de css a utilizar -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<body>
    <header> <!-- Encabezado principal-->
        <h1>Contacto</h1>
        <h3>
            <?php echo $tipo; ?> <!-- También se puede hacer así: {{$tipo}}-->
        </h3>
    </header>
    <main> <!-- Contenido principal-->
        <form action="validar-contacto" method="post"> <!-- action se puede dejar en blanco o pasar el nombre del mismo archivo-->
            @csrf <!-- Crea un input oculto con u token, para saber que viene de la aplicación es para el POST xdd-->
            <label for="nombrePersona">Nombre:</label> <!-- for debe coincidir con id del input-->
            <input type="text" name="nombrePersona" id="nombrePersona" placeholder="Nombre completo" required> <br>

            <label for="correo">Correo:</label> <!-- for debe coincidir con id del input-->
            <input type="email" name="correo" id="correo" placeholder="Correo electrónico" required @if($tipo == 'alumno') value = "@alumnos.udg.mx" @else value = "@gmail.com" @endif> <br> <!--Se pasó variables-->

            <label for="comentarios">Comentarios:</label> <br> <!-- for debe coincidir con id del input-->
            <textarea name="comentarios" id="comentarios" cols="30" rows="10" placeholder="Escribe un comentario..."></textarea> <br>

            <button type="submit">Enviar formulario</button>
        </form>
    </main>
    <div class="nav">
        <a href="index.php">Index.html</a>
        <a href="formulario.php">Formulario.html</a>
        <a href="clase.html">Clase BootStrap</a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>