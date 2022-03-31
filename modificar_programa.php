<!DOCTYPE html>
<html>
  <head>
    <title>Modificación de Programas</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="estilo.css">

    <script src="js/bootstrap.js"></script>
  </head>
  <body>
    <div id="divconsulta" class="container">
       <br>
       <div id="div2">
          <div id="div4">
               <form name="formulario" role="form" method="post">
                 <div class="col-md-12">
                    <strong class="lgris">Ingrese criterio de busqueda</strong>
                    <br><br>
                    <div class="form-row">
                     <div class="form-group col-md-5">
                     <input class="form-control" style="text-transform:uppercase;" type="text" name="nombre" value="" placeholder="Nombre" />
                     </div>
                       <div class="form-group cold-md-3">
                       <input class="btn btn-primary" type="submit" value="consultar" >
                       <input style="width: 35%;" class="btn btn-primary" type="button" onclick="location.href ='menu.php'" value="Atras">
                       </div>
                    </div>
                    <br>
                 </div>
               </form>
               <br>
          </div>

          <div id="divconsulta2">
          <?php
          if ($_SERVER['REQUEST_METHOD']==='POST')
          {
              include('funciones.php');
              session_start();
              $vnombre=$_POST['nombre'];
              $miconexion=conectar_bd('', 'sena02_bd');
              $resultado=consulta($miconexion,"select * from programa where Progra_Nombre='{$vnombre}'");
              if($resultado->num_rows>0)
              {
                  $fila = $resultado->fetch_object();
                  $_SESSION['ide1']=$fila->progra_id;
                  ?>
                <form id="formulario2" role="form" method="post" action="actualizar_programa.php">
                    <div class="col-md-12">
                       <strong class="lgris">Datos del Programa</strong><br>

                       <label class="lgris">Id:</label>
                       <input class="form-control" type="text" name="ide1" disabled="disabled" value="<?php echo $fila->progra_id?>"/>

                       <label class="lgris">Nombres:</label>
                       <input class="form-control" style="text-transform:uppercase;" type="text" name="nombre" required value="<?php echo $fila->progra_nombre ?>"/>

                       <label class="lgris">Tipo Programa:</label>
                       <input class="form-control" style="text-transform:uppercase;" type="text" name="otipo" value="<?php echo $fila->progra_tipo ?>" required/>

                       <br>
                       <input class="btn btn-primary" type="submit" value="Actualizar">
                       <br>
                    </div>
                </form>
                <?php
              }
            else{
                echo "No existen registros";
                }
            $miconexion->close();
          }?>
          </div>
       </div>
    </div>
  </body>
</html>