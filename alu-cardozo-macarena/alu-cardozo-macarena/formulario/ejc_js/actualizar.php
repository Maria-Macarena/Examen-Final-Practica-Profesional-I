<?php
//inluimos el archivo que nos permite llamar a una funci�n que se conecta a la  Bd y nos devuelve una conexi�n exitosa
require_once('lib/dbconect.inc.php');
$mysqli = Conectarse();

//esto print es para saber que es lo que viene del archivo anterior
//print_r($_REQUEST);

//la variable modificar es la que viene del icono y si se hizo click all� se podr� ingresar
if (isset($_REQUEST['modificar']) and $_REQUEST['modificar'] == 001) {

   if ($resultado = mysqli_query($mysqli, "SELECT * FROM alumno  WHERE  alu_dni = " . $_REQUEST['walu_dni'] . "")) {

      //observen que queda la llave del while abierta y la de del if anterior esto se atendera al finalizar la consulta que llenara los campos a actualizar
      while ($row = $resultado->fetch_assoc()) {
?>
         <html>

         <head>
            <title>ABM ALUMNOS BELGRANO</title>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link href="css/bootstrap.css" rel="stylesheet">
            <link href="css/bootstrap-responsive.css" rel="stylesheet">
            <link rel="STYLESHEET" type="text/css" href="estilo.css">
            <script src="ejemplos.js"></script>
         </head>

         <header>
            <table width="100%" border="0" cellpadding="2" cellspacing="2" aling=center class=border>
               <tr>
                  <td class=content style="background-color:#facfa4fa" id="linea_10_1" name="linea_9_1">
                     <div aling="center"><img src="img/headerr.png" width="1380" height="100"></div>
                  </td>
               </tr>
            </table>
         </header>

         <body>
            <br><br>
            <div align="center">
               <form name="form2" method="get" action="actualizar.php">
                  <input id="nrodoc" name="nrodoc" type="hidden" value=<?php echo $row['alu_dni'] ?>>
                  <table width="50%" border="2" cellpadding="2" cellspacing="2" class=border>
                     <tr>
                        <td class=td>
                           <font class=tit><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ACTUALIZACI&OacuteN DE ALUMNOS</b></font><BR>
                           <font class=tit>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>MODIFICACI&OacuteN DE DATOS</b></font>
                        </td>
                     </tr>
                  </table>
                  <table>
                     <tr>
                        <TD class=tit>Nombre:</TD>
                        <TD class=cuerpotit><INPUT TYPE="text" NAME="nombre" ID="nombre" value=<?php echo $row['alu_nombre'] ?> SIZE="20" MAXLENGTH="10"></TD>
                     </tr>
                     <tr>
                        <TD class=tit>Apellidos:</TD>
                        <TD class=cuerpotit><INPUT TYPE="text" NAME="apellidos" ID="apellidos" value=<?php echo $row['alu_apellido'] ?> SIZE="20" MAXLENGTH="30"></TD>
                     </tr>
                     <tr>
                        <TD class=tit>Carrera:</TD>
                        <TD class=cuerpotit><INPUT TYPE="text" NAME="car" ID="car" value=<?php echo $row['alu_carrera'] ?> SIZE="50" MAXLENGTH="50"></TD>
                     </tr>
                     <tr>
                        <TD class=tit>Nro Doc:</TD>
                        <TD class=cuerpotit><INPUT TYPE="text" NAME="nrodoc_dis" ID="nrodoc_dis" value=<?php echo $row['alu_dni'] ?> SIZE="50" MAXLENGTH="50" DISABLED /></TD>
                     </tr>
                     <tr>
                        <TD class=tit>Nro cel:</TD>
                        <TD class=cuerpotit><INPUT TYPE="text" NAME="nrocel" ID="nrocel" value=<?php echo $row['alu_cel'] ?> SIZE="50" MAXLENGTH="50" /></TD>
                     </tr>
                     <tr>
                        <TD class=tit>Nro Insc:</TD>
                        <TD class=cuerpotit><INPUT TYPE="text" NAME="nroinsc" ID="nroinsc" value=<?php echo $row['alu_insc'] ?> SIZE="50" MAXLENGTH="50"></TD>
                     </tr>
                     <tr>
                        <TD class=tit>Provincia:</TD>
                        <TD class=cuerpotit>
                           <select name="provincia" id="provincia">
                              <option value="">Seleccionar</option>
                              <option value="Mendoza" <?php if (!(strcmp("Mendoza", $row['alu_provincia']))) {
                                                         echo "selected=\"selected\"";
                                                      } ?>>Mendoza</option>
                              <option value="Cordoba" <?php if (!(strcmp("Cordoba", $row['alu_provincia']))) {
                                                         echo "selected=\"selected\"";
                                                      } ?>>Cordoba</option>
                              <option value="San Luis" <?php if (!(strcmp("San Luis", $row['alu_provincia']))) {
                                                            echo "selected=\"selected\"";
                                                         } ?>>San Luis</option>
                              <option value="Neuquen" <?php if (!(strcmp("Neuquen", $row['alu_provincia']))) {
                                                         echo "selected=\"selected\"";
                                                      } ?>>Neuquen</option>
                           </select>
                        </TD>
                     </tr>
                     <tr>
                        <TD class=tit>Comentarios:</TD>
                        <TD class=cuerpotit><textarea name="coment" id="coment" rows=10 cols=20><?php echo $row['alu_coment'] ?></textarea></TD>
                     </tr>
                     <tr>
                        <TD colspan="2">
                           <INPUT TYPE="submit" name="Actualizar_Alumno" value="Actualizar Alumno" onClick="return Validar_formulario(this.form)">
                           <INPUT TYPE="Reset" value="borrar">
                        </TD>
                     </tr>
                  </table>
               </form>
            </div>
         </body>
         <footer>

            <div aling="center" width="80%" border="0" cellpadding="2" cellspacing="2">
               <class="container"><img src="img/footerr.png" width="1380" height="160">
                  <a href="#"><i style="background-color: #facfa4fa"></i></a>
            </div>

         </footer>


         </html>
<?php
      } //aqui cerramos el while de la sql
   } else {
      echo "Alumnos inexistente";
      header("Location: ./ingreso.php");
   }
} else if (isset($_REQUEST['Actualizar_Alumno']) and $_REQUEST['Actualizar_Alumno'] == 'Actualizar Alumno') {
   //tomamos las variables que vienen desde este mismo archivo pero gracias a las varibles del boton la utilizamos para llegar
   //hasta aqui y no a otro lugar
   //print_r($_REQUEST);

   $stamp_now = time();
   $w_fec_mod = date('Y-m-d', $stamp_now);
   $wins_cod_car    = $_REQUEST['car'];
   $walu_nro_doc     = $_REQUEST['nrodoc'];
   $walu_nro_cel     = $_REQUEST['nrocel'];
   $walu_nombre    = $_REQUEST['nombre'];
   $walu_apellido    = $_REQUEST['apellidos'];
   $walu_nroinsc    = $_REQUEST['nroinsc'];
   $walu_provincia = $_REQUEST['provincia'];
   $walu_coment    = $_REQUEST['coment'];

   //insertamos estas variables en la bd
   $resultado = mysqli_query($mysqli, "UPDATE alumno SET alu_dni = $walu_nro_doc,
                                                      alu_nombre = '$walu_nombre',alu_apellido = '$walu_apellido',
                                                      alu_provincia ='$walu_provincia',alu_carrera='$wins_cod_car',
                                                      alu_coment ='$walu_coment', alu_insc ='$walu_nroinsc',
                                                      alu_cel='$walu_nro_cel'
                                    WHERE alu_dni = " . $_REQUEST['nrodoc'] . " ");


   //verificamos que la inserci�n haya sido exitosa - caso contrario le avisamos y lo reenviamos de vuelta
   if ($mysqli->affected_rows == 1) {
      echo "<script languaje=\"javascript\" type\"text/javascript\"> alert('Se ha actualizado exitosamente.'); document.location.href = \"ingreso.php\"; </script>";
   } else {
      echo "<script languaje=\"javascript\" type\"text/javascript\"> alert('Error en la actualizaci&oacuten de datos.'); document.location.href = \"actualizar.php?modificar=001&walu_dni=" . $_REQUEST['nrodoc'] . "\"; </script>";
   }
} else {
   echo "Archivo incorrecto";
   header("Location: ./ingreso.php");
}
?>