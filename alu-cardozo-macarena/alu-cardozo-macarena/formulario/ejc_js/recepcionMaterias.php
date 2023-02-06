<?php
//inluimos el archivo que nos permite llamar a una funci�n que se conecta a la  Bd y nos devuelve una conexi�n exitosa
require_once('lib/dbconect.inc.php');
$mysqli = Conectarse();

//esto print es para saber que es lo que viene del archivo anterior
//print_r($_REQUEST);

if (isset($_REQUEST['insertar']) and $_REQUEST['insertar'] == 'Insertar Materia') {

  //tomamos las variables que vienen del archivo materia.php
  $stamp_now = time();
  $w_fec_mod = date('Y-m-d', $stamp_now);

  $wmat_nombre   = $_REQUEST['materia'];
  

  
  //insertamos estas variables en la bd
  $resultado = mysqli_query($mysqli, "INSERT into materia (mat_nombre)
				                values ('$wmat_nombre')");


  //verificamos que la inserci�n haya sido exitosa - caso contrario le avisamos y lo reenviamos de vuelta
  if ($mysqli->affected_rows == 1) {
    echo "<script languaje=\"javascript\" type\"text/javascript\"> alert('Se ha cargado exitosamente.'); </script>";
  } else {
    echo "<script languaje=\"javascript\" type\"text/javascript\"> alert('Error en la insercion de datos.'); document.location.href = \"materia.php\"; </script>";
  }
} else if (isset($_REQUEST['eliminar']) and $_REQUEST['eliminar'] == 001) {
  //tomamos las variables que vienen desde este mismo archivo pero gracias a las varibles del boton la utilizamos para llegar 
  //hasta aqui y no a otro lugar

  //eliminamos este materia de la bd
  $resultado = mysqli_query($mysqli, "DELETE FROM materia WHERE mat_codigo = " . $_REQUEST['wmat_codigo'] . "");


  //verificamos que la inserci�n haya sido exitosa - caso contrario le avisamos y lo reenviamos de vuelta
  if ($mysqli->affected_rows == 1) {
    echo "<script languaje=\"javascript\" type\"text/javascript\"> alert('Se ha eliminado exitosamente.'); document.location.href = \"recepcionMaterias.php\"; </script>";
  } else {
    echo "<script languaje=\"javascript\" type\"text/javascript\"> alert('Error en la eliminaci&oacuten de datos.'); document.location.href = \"recepcionMaterias.php\"; </script>";
  }
}
?>


<html lang="en">

<head>
  <title>ABM  MATERIAS BELGRANO</title>

  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Validacion de Formulario Materia</title>
  <link rel="STYLESHEET" type="text/css" href="estilo.css">
  <script src="ejemplos.js"></script>
  <link rel="STYLESHEET" type="text/css" href="estilo.css">
  <script src="ejemplos.js"></script>
</head>

<body>
<?php include('layouts/header.php'); ?>
  <br><br>
  <div align="center">
    <form name="form1" method="get" action="ingreso.php">
      <table width="50%" border="0" cellpadding="2" cellspacing="2" class=border>
        <tr>
          <td class=td>
            <font class=tit><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;LISTADO DE MATERIAS</b></font><BR>
          </td>
        </tr>
      </table>
      <table width="50%" border="1" cellpadding="2" cellspacing="2" class=border style="background-color:#C5C5C5">
        <tr>
          <td width="75%" class=td>
            <div>
              <font class=tit>Materia</font>
            </div>
          </td>
          
                  
          <td class=td>
            <div>
              <font class=tit>Eliminar</font>
            </div>
          </td>
        </tr>
        <?php
        if ($resultado = mysqli_query($mysqli, "SELECT * FROM materia")) {
          //el siguiente while permite que se vayan imprimiendo en html de a uno por vez seg�n la tabla de la BD
          while ($row = $resultado->fetch_assoc()) {

            echo "<tr>
                    <td class=conten style=\"background-color:#f5f5f5\" id=\"linea_1_1\" name=\"linea_1_1\">" . $row['mat_nombre'] . "</td>
           

      
	  

		  <td class=conten style=\"background-color:#f5f5f5\" id=\"linea_1_1\" name=\"linea_1_1\"><div align=\"center\"><a href=\"recepcionMaterias.php?eliminar=001&wmat_codigo=" . $row['mat_codigo'] . "\"><img src=\"img/deletee.png\" width=\"20\" height=\"20\" /></a></div></td> 
                   </tr>";
          }

          /* liberar el proceso de RAM sobre el conjunto de resultados */
          $resultado->close();
        }

        ?>
      </table>
    </form>
  </div>
  <br><br>
<td class=td><?php include('layouts/footer.php'); ?></td> 
</body>

</html>



