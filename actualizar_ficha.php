<?php
  include('funciones.php');
  session_start();
  $vnombre=$_POST['nombre'];
  $vfp=$_POST['fp'];


  $miconexion=conectar_bd('', 'sena02_bd');
  $resulado=consulta($miconexion,"update fichas set ficha_numero='{$vnombre}',ficha_progra='{$vfp}'");

  if ($miconexion->affected_rows>0)
  {
      echo "Actualizacion exitosa";
  }
?>

<input style="width: 40%;" class="btn btn-primary" type="button" onclick="location.href ='menu.php'" value="Atras">
