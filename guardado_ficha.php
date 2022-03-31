<?php
include('funciones.php');   
  $vnombre=$_POST['nombre'];
  $vprograma=$_POST['programa'];
  
  
  $miconexion=conectar_bd('', 'sena02_bd');
  $resultado=consulta($miconexion,"insert into fichas (ficha_numero,ficha_progra) values ('{$vnombre}','{$vprograma}')");

  if ($resultado)
    {
        echo "Guardado exitoso";
    }
  ?>