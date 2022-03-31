<!DOCTYPE html>
<html>
  <head>
    <title>Crear Ficha</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="estilo.css">
    <script src="js/bootstrap.js"></script>
  </head>
  <body>
    <div id="div1" class="container">
        <br>
        <div id="div2">
           <?php session_start(); if(! empty($_SESSION['Tipo_usuario'])) { ?> <img src="IMAGENES/plantilla3.png"> <?php } ?>
           <div id="div3">
           <?php
             if($_SESSION['Tipo_usuario']=='ADMINISTRADOR')
             {
             ?>
             <form id="formulario" role="form" method="post" action="guardado_ficha.php">
             <div class="cold-md-12">
               <strong class="lgris">Crear la ficha</strong>
               <br>
               <label class="lgris">Numero:</label>
                <input class="form-control" type="number" name="nombre" min="9999" max="9999999999" value="" placeholder="Numero" required/>
                <br>
               <label class="lgris">Nombre del programa:</label>
               <div class="form-group col-xs-2">
                <?php 
                                include('funciones.php');
                                $miconexion=conectar_bd('','sena02_bd');
                                $resultado=consulta($miconexion,"select * from programa");
                                ?>
                                <select name="programa">
                                  <?php
                                  while($fila=$resultado->fetch_object())
                                  {
                                    ?>
                                    <option value="<?php echo $fila->progra_id ?>"> <?php echo $fila->progra_nombre ?></option>
                                    <?php
                                  }
                                  ?>                 
                  </select>
               <br>
               <input class="btn btn-primary" type="submit" value="Guardar">
               <input style="width: 30%;" class="btn btn-primary" type="button" onclick="location.href ='menu.php'" value="Atras">
             </div>
             </form>
             <?php
             }
             else
             {
                 echo "No tiene permisos para realizar esta acción";
             }
            ?>
            <br>
           </div>
        </div>
    </div>
  </body>
</html>