<?php
include('funciones.php');   
  $vnombre=$_POST['nombre'];
  $vtipo=$_POST['otipo'];
  
  
  $miconexion=conectar_bd('', 'sena02_bd');
  $resultado=consulta($miconexion,"insert into programa (Progra_Nombre,Progra_tipo) values ('{$vnombre}','{$vtipo}')");

  if ($resultado)
    {
        echo "Guardado exitoso";
    }
  ?>

<input style="width: 40%;" class="btn btn-primary" type="button" onclick="location.href ='menu.php'" value="volver al menu">

