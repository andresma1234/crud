<?php
include('funciones.php');
session_start();
if (!isset($_SESSION['nusuario']))
{
    $_SESSION['nusuario']=$_POST['usuario'];
    $_SESSION['nclave']=$_POST['clave'];
}

$miconexion=conectar_bd('', 'sena02_bd');
$resultado=consulta($miconexion,"select * from usuarios where usua_nomuser='{$_SESSION['nusuario']}' and usua_contra='{$_SESSION['nclave']}'");
?>
<!doctype html>
<html>
    <head>
        <title>Menu principal</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1,shrink-to-fit=no">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="estilo.css">
        <script src="js/bootstrap.js"></script>
    </head>
    <body>
        <div id="div1" class="container">
            <br>
            <div id="div2">
                <?php if($resultado->num_rows>0) { ?> <img src="IMAGENES/plantilla2.png" width="500" height="100"> <?php } ?>
                <div id="div3">
                    <?php
                      if($resultado->num_rows>0)
                      {
                          $fila = $resultado->fetch_object();
                          $_SESSION['Tipo_usuario']=$fila->usua_tipo;
                        ?>
                        <label class="lgris">Bienvenido <?php echo $_SESSION['nusuario'] ?></label><br>

                        <input style="width: 40%;" class="btn btn-primary" type="button" onclick="location.href ='registro_aprendiz.php'" value="Registro de aprendices">
                        <input style="width: 40%;" class="btn btn-primary" type="button" onclick="location.href ='consulta_aprendiz.php'" value="Consulta de aprendices">
                        <br><br>
                        <input style="width: 40%;" class="btn btn-primary" type="button" onclick="location.href ='modificar_aprendiz.php'" value="Actualizacion de aprendices">
                        <input style="width: 40%;" class="btn btn-primary" type="button" onclick="location.href ='borrar_aprendiz.php'" value="Borar aprendices">
                        <br><br>
                        <input style="width: 40%;" class="btn btn-primary" type="button" onclick="location.href ='crear_programa.php'" value="Crear programa">
                        <input style="width: 40%;" class="btn btn-primary" type="button" onclick="location.href ='consultar_programa.php'" value="Consultar programa">
                        <br><br>
                        <input style="width: 40%;" class="btn btn-primary" type="button" onclick="location.href ='modificar_programa.php'" value="Modificar programa">
                        <input style="width: 40%;" class="btn btn-primary" type="button" onclick="location.href ='borrar_programa.php'" value="Eliminar programa">
                        <br><br>
                        <input style="width: 40%;" class="btn btn-primary" type="button" onclick="location.href ='crear_ficha.php'" value="Crear ficha">
                        <input style="width: 40%;" class="btn btn-primary" type="button" onclick="location.href ='consultar_ficha.php'" value="Consultar ficha">
                        <br><br>
                        <input style="width: 40%;" class="btn btn-primary" type="button" onclick="location.href ='modificar_ficha.php'" value="Modificar ficha">
                        <input style="width: 40%;" class="btn btn-primary" type="button" onclick="location.href ='borrar_ficha.php'" value="Eliminar ficha">
                        <br><br>
                        <input style="width: 30%;" class="btn btn-primary" type="button" onclick="location.href ='index.php'" value=" Volver al Inicio">
                    <?php
                      }
                      else
                      {
                          echo "Usuario o clave invalido";
                      }
                    $miconexion->close();
                     ?>
                    <br><br>
                    <h1></h1>
                </div>
            </div>
        </div>
    </body>
</html>