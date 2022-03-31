<!DOCTYPE html>
<html>
  <head>
    <title>Consulta de Aprendices</title>
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
                 <div class="form-group col-md-3">
                 <input class="form-control" type="number" name="numid" min="9999" max="9999999999" value="" placeholder="IDENTIFICACIÓN" />
                 </div>
                 <div class="form-group cold-md-3">
                  <input class="form-control" style="text-transform:uppercase;" type="text" name="nombres" value="" placeholder="Nombres" />
                 </div>
                 <div class="form-group col-md-3">
                  <input class="form-control" style="text-transform: uppercase;" type="text" name="apellidos" value="" placeholder="Apellidos" />
                 </div>
                 <div class="form-group col-md-3">
                 <input class="btn btn-primary" type="submit" value="Consultar" >
                 <input style="width: 30%;" class="btn btn-primary" type="button" onclick="location.href ='menu.php'" value="Atras">
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
          $vnumid=$_POST['numid'];
          $vnombres=$_POST['nombres'];
          $vapellidos=$_POST['apellidos'];
          $miconexion=conectar_bd('', 'sena02_bd');
          $resultado=consulta($miconexion,"select * from aprendices where trim(Apre_Numid) like '%{$vnumid}%' and (trim(Apre_Nombres) like '%{$vnombres}%' and trim(Apre_Apellidos) like '%{$vapellidos}%')");
          if($resultado->num_rows>0)
            {
              while ($fila = $resultado->fetch_object())
                {
                  echo $fila->apre_id." ".$fila->apre_tipoid." ".$fila->apre_numid." ".$fila->apre_nombres." ".$fila->apre_apellidos." ".$fila->apre_direccion." ".$fila->apre_telefono." ".$fila->apre_ficha."<br>";
                }
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