<!DOCTYPE html>
<html>
  <head>
    <title>Crear Programa</title>
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
           <?php session_start(); if(! empty($_SESSION['Tipo_usuario'])) { ?> <img src="IMAGENES/plantilla1.png"  width="700" height="250"> <?php } ?>
           <div id="div3">
           <?php
             if($_SESSION['Tipo_usuario']=='ADMINISTRADOR')
             {
             ?>
             <form id="formulario" role="form" method="post" action="guardado_programa.php">
             <div class="cold-md-12">
               <strong class="lgris">Cree el programa</strong>
               <br>
               <label class="lgris">Nombre:</label>
               <input class="form-control" style="text-transform:uppercase;" type="text" name="nombre" value="" placeholder="Nombre" required/>

               <label class="lgris">Tipo Programa: 

               </label>
                <div class="form-group col-xs-2" placeholder="Tipo Programa" required >
                <?php 
                                include('funciones.php');
                                $miconexion=conectar_bd('','sena02_bd');
                                $consulta = "SELECT * FROM tiposprograma";
                                $resultado = mysqli_query ($miconexion, $consulta) or die (mysqli_error($miconexion));
                                
                                ?>
                  <select class="form-control" name="otipo">
                    <option value="" selected></option>
                    <?php while ($opcion = $resultado -> fetch_object()) { ?>
                    <option value="<?php echo $opcion->tiposp_id;?>"><?php echo $opcion->tiposp_tipo;?></option>
                                    <?php } ?>
                  </select>
                </div>              
                  <br>
               <input class="btn btn-primary" type="submit" value="Guardar">
               <input style="width: 30%;" class="btn btn-primary" type="button" onclick="location.href ='menu.php'" value="Atras" >
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