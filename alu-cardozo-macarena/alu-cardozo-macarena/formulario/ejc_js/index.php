
   <!DOCTYPE html>
   <html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Validación de Formulario</title>
      <link rel="STYLESHEET" type="text/css" href="estilo.css">
<script src="ejemplos.js"></script>
   </head>
   <body>
      <?php
      include('layouts/header.php');
      ?>
<br><br>
<div align="center">
      <form  name="form1" method="get" action="ingreso.php">
       <table width="50%"  border="0" cellpadding="2" cellspacing="2" class=border>
        <tr><td class=td><font class=tit><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;REQUISITOS DE ASPIRANTES</b></font><BR></td></tr>
       </table>
       <table>
            <tr>
               <TD class=tit>Nombre:</TD>
               <TD class=cuerpotit><INPUT TYPE="text" NAME="nombre" ID="nombre" SIZE="50" MAXLENGTH="10"></TD>
            </tr>
            <tr>
               <TD class=tit>Apellidos:</TD>
               <TD class=cuerpotit><INPUT TYPE="text" NAME="apellidos" ID="apellidos" SIZE="50" MAXLENGTH="30"></TD>
            </tr>
            <tr>
               <TD class=tit>Carrera:</TD>
               <TD class=cuerpotit><INPUT TYPE="text" NAME="car" ID="car" SIZE="50" MAXLENGTH="50"></TD>
            </tr>
            <tr>
               <TD class=tit>Nro Doc:</TD>
               <TD class=cuerpotit><INPUT TYPE="text" NAME="nrodoc" ID="nrodoc" SIZE="50" MAXLENGTH="50"></TD>
            </tr>
            <tr>
               <TD class=tit>Nro Insc:</TD>
               <TD class=cuerpotit><INPUT TYPE="text" NAME="nroinsc" ID="nroinsc" SIZE="50" MAXLENGTH="50"></TD>
            </tr>
            <tr>
               <TD class=tit>Nro Cel:</TD>
               <TD class=cuerpotit><INPUT TYPE="text" NAME="nrocel" ID="nrocel" SIZE="50" MAXLENGTH="50"></TD>
            </tr>
            <tr>
               <TD class=tit>Provincia:</TD>
               <TD class=cuerpotit><select name="provincia" id="provincia">
                                         <option value="">Seleccionar</option>
                                         <option value="Mendoza" selected>Mendoza</option>
                                         <option value="Cordoba">Cordoba</option>
                                         <option value="San Luis">San Luis</option>
                                         <option value="Neuquen">Neuquen</option>
                                   </select>
               
               </TD>
            </tr>
            <tr>
               <TD class=tit>Comentarios:</TD>
               <TD class=cuerpotit><textarea name="coment" id="coment" rows=10 cols=50></textarea></TD>
            </tr>
            <tr>
               <TD colspan="2">
                   <INPUT TYPE="submit" name="insertar" value="Insertar Alumno" onClick="return Validar_formulario(this.form)">
                   <INPUT TYPE="Reset" value="borrar">
               </TD>
            </tr>
        </table>
       </form>
       <br>
       <br>
       
</div>
<?php
      include('layouts/footer.php');
      ?>
</body>
</html>