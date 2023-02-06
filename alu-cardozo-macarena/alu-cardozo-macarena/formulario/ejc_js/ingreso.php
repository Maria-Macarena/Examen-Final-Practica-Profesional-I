<?php
//inluimos el archivo que nos permite llamar a una funci�n que se conecta a la  Bd y nos devuelve una conexi�n exitosa
require_once('lib/dbconect.inc.php');
$mysqli=Conectarse();

//esto print es para saber que es lo que viene del archivo anterior
//print_r($_REQUEST);

if(isset($_REQUEST['insertar']) and $_REQUEST['insertar'] == 'Insertar Alumno'){

//tomamos las variables que vienen del archivo index.html
$stamp_now=time();
$w_fec_mod=date('Y-m-d',$stamp_now);
$wins_cod_car	= $_REQUEST['car'];
$walu_nro_doc 	= $_REQUEST['nrodoc'];
$walu_nombre	= $_REQUEST['nombre'];
$walu_apellido	= $_REQUEST['apellidos'];
$walu_nroinsc	= $_REQUEST['nroinsc'];
$walu_nrocel	= $_REQUEST['nrocel'];
$walu_provincia	= $_REQUEST['provincia'];
$walu_coment	= $_REQUEST['coment'];

//insertamos estas variables en la bd
$resultado = mysqli_query($mysqli, "INSERT into alumno (alu_dni, alu_nombre, alu_apellido, alu_carrera, alu_insc, alu_cel, alu_provincia, alu_coment)
				                values ($walu_nro_doc,'$walu_nombre','$walu_apellido','$wins_cod_car',$walu_nroinsc,$walu_nrocel,'$walu_provincia','$walu_coment')");


                //verificamos que la inserci�n haya sido exitosa - caso contrario le avisamos y lo reenviamos de vuelta
                if($mysqli->affected_rows==1){
			echo "<script languaje=\"javascript\" type\"text/javascript\"> alert('Se ha cargado exitosamente.'); </script>";
		} else {
                        echo "<script languaje=\"javascript\" type\"text/javascript\"> alert('Error en la insercion de datos.'); document.location.href = \"index.php\"; </script>";
		}

} else if(isset($_REQUEST['eliminar']) and $_REQUEST['eliminar'] == 001){
//tomamos las variables que vienen desde este mismo archivo pero gracias a las varibles del bot�n la utilizamos para llegar 
//hasta aqu� y no a otro lugar

//eliminamos este alumno de la bd
$resultado = mysqli_query($mysqli,"DELETE FROM alumno WHERE alu_dni = ".$_REQUEST['walu_dni']."");


                //verificamos que la inserci�n haya sido exitosa - caso contrario le avisamos y lo reenviamos de vuelta
                if($mysqli->affected_rows==1){
			echo "<script languaje=\"javascript\" type\"text/javascript\"> alert('Se ha eliminado exitosamente.'); document.location.href = \"ingreso.php\"; </script>";
		} else {
                        echo "<script languaje=\"javascript\" type\"text/javascript\"> alert('Error en la eliminaci&oacuten de datos.'); document.location.href = \"ingreso.php\"; </script>";
		}


}
?>
<html>
  
<head>
<title>ABM ALUMNOS BELGRANO</title>

<link rel="STYLESHEET" type="text/css" href="estilo.css">
<script src="ejemplos.js"></script>
</head>
<body>
<?php
      include('layouts/header.php');
      ?>
<br><br>
<div align ="center">
      <form  name="form1" method="get" action="ingreso.php">
       <table width="50%"  border="0" cellpadding="2" cellspacing="2" class=border>
        <tr>
         <td class=td><font class=tit><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ALUMNOS INSCRIPTOS POR CARRERA</b></font><BR></td>
        </tr>
       </table>
       <table width="100%" border="1" cellpadding="2" cellspacing="2" class=border style="background-color:#C5C5C5">
           <tr>
            <td width="25%" class=td><div><font class=tit>Carrera</font></div></td>
            <td class=td><div><font class=tit>Apellido</font></div></td>
            <td class=td><div><font class=tit>Nombre</font></div></td>
            <td class=td><div><font class=tit>Nro. Documento</font></div></td>
            <td class=td><div><font class=tit>Nro Insc.</font></div></td>
            <td class=td><div><font class=tit>Nro Cel.</font></div></td>
            <td class=td><div><font class=tit>Provincia</font></div></td>
            <td class=td><div><font class=tit>Comentarios</font></div></td>
            <td class=td><div><font class=tit>Actualizar</font></div></td>
            <td class=td><div><font class=tit>Eliminar</font></div></td>
           </tr>
      <?php
        if ($resultado = mysqli_query($mysqli, "SELECT * FROM alumno")) {
             //el siguiente while permite que se vayan imprimiendo en html de a uno por vez seg�n la tabla de la BD
            while ($row = $resultado->fetch_assoc()) {

            echo "<tr>
                    <td class=conten style=\"background-color:#f5f5f5\" id=\"linea_1_1\" name=\"linea_1_1\">".$row['alu_carrera']."</td>
                    <td class=conten style=\"background-color:#f5f5f5\" id=\"linea_2_1\" name=\"linea_2_1\">".$row['alu_apellido']."</td>
                    <td class=conten style=\"background-color:#f5f5f5\" id=\"linea_3_1\" name=\"linea_3_1\">".$row['alu_nombre']."</td>
                    <td class=conten style=\"background-color:#f5f5f5\" id=\"linea_4_1\" name=\"linea_4_1\">".$row['alu_dni']."</td>
                    <td class=conten style=\"background-color:#f5f5f5\" id=\"linea_5_1\" name=\"linea_5_1\">".$row['alu_insc']."</td>
                    <td class=conten style=\"background-color:#f5f5f5\" id=\"linea_6_1\" name=\"linea_6_1\">".$row['alu_cel']."</td>
                    <td class=conten style=\"background-color:#f5f5f5\" id=\"linea_7_1\" name=\"linea_7_1\">".$row['alu_provincia']."</td>
                    <td class=conten style=\"background-color:#f5f5f5\" id=\"linea_8_1\" name=\"linea_8_1\">".$row['alu_coment']."</td>
		    <td class=conten style=\"background-color:#f5f5f5\" id=\"linea_9_1\" name=\"linea_9_1\"><div align=\"center\"><a href=\"actualizar.php?modificar=001&walu_dni=".$row['alu_dni']."\"><img src=\"img/modificar.jpg\" width=\"20\" height=\"20\" /></a></div></td>
		    <td class=conten style=\"background-color:#f5f5f5\" id=\"linea_10_1\" name=\"linea_10_1\"><div align=\"center\"><a href=\"ingreso.php?eliminar=001&walu_dni=".$row['alu_dni']."\"><img src=\"img/deletee.png\" width=\"20\" height=\"20\" /></a></div></td>
                   </tr>";
            }

            /* liberar el proceso de RAM sobre el conjunto de resultados */
            $resultado->close();
        }
      
      ?>
       </table>
      </form>
       <br>
</div>
<?php
      include('layouts/footer.php');
      ?>
</body>
</html>