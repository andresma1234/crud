<?php
  include('funciones.php');
  session_start();
  $vide=$_SESSION['ide1'];
  $vnombres=$_POST['nombres'];
  $vapellidos=$_POST['apellidos'];
  $vdireccion=$_POST['direccion'];
  $vtelefono=$_POST['telefono'];

  $miconexion=conectar_bd('', 'sena02_bd');
  $resulado=consulta($miconexion,"update aprendices set apre_nombres='{$vnombres}',apre_apellidos='{$vapellidos}',apre_direccion='{$vdireccion}',apre_telefono='{$vtelefono}' where Apre_id='{$vide}'");

  if ($miconexion->affected_rows>0)
  {
      echo "Actualizacion exitosa";
  }
?>

<input style="width: 40%;" class="btn btn-primary" type="button" onclick="location.href ='menu.php'" value="Atras">
