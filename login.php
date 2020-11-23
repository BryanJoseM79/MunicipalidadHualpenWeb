<?php
include("registro/connect_db.php");

//llamamos variables
$email = $_POST["email"];
$pass = $_POST["pass"];
//$rol_id = $_POST["rol_id"];
//iniciamos sesion
session_start();

$_SESSION['email'] = $email;

if(isset($_POST['submit'])){
//verificamos que usuario y pass sean el mismo
$consulta = "SELECT*FROM usuario 
                    where email='$email' and pass = '$pass'";

$resultado=mysqli_query($conexion,$consulta);

$filas = mysqli_fetch_array($resultado);

if($filas['roles_id']==1){
    header("location:administracion/admin.php");
}else
if($filas['roles_id']==2){
    header("location:organizacion/indexlogeado.html");
}
else{
    echo "Error en la autentificacion";

}

}
session_destroy();
mysqli_close($conexion);
?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="css/bootstrap.css">
  <!-- Estilos perzonalizados-->
  <link rel="stylesheet" href="css/stylos.css">

  
  <title>Municipalidad de Hualpén</title>
</head>

<body class="body">
<div class="modal-dialog text-center"> 
    <div class="col-12 main-section">
        <div class="modal-content">
          <div class="col-12 user-img">
            <img class="img-fluid" src="img/unnamed (1).png" alt="">
          </div>

          <form class="col-12" action="POST">
            <div class="form-group" id="user-group">
              <input class="form-control" type="text" placeholder="Correo electronico" name="email">

            </div>
            <div class="form-group" id="contraseña-group">
              <input class="form-control" type="password" placeholder="Contraseña" name="pass">
            </div>
                
                <!-- BOTON PARA INGRESAR A LA PAGINA -->
            <input class="btn btn-primary" type="submit" value="Ingresar" name="submit">
             
             <a href="registro/registro.php" class="btn btn-primary">Registrarse</a>
          </form>
          <div class="col-12 forgot">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <a href="">¿Recordar Contraseña?</a>
          </div>

        </div>
    </div>
</div>



<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) 
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
-->
<!-- Option 2: jQuery, Popper.js, and Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
  integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
  integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="js/bootstrap.js"></script>

<!-- menu -->
<script src="js/scrollPosStyler.min.js"></script>

</body>

</html>

