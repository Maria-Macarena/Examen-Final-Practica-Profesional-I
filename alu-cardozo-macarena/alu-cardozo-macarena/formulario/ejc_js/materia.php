<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="utf-8">
<title>Materia</title>
<link rel="STYLESHEET" type="text/css" href="estilo.css">
<script src="validarmateria.js"></script>
</head>
<body>
   <?php include('layouts/header.php');?>
     <br><br><br><br><br><br>
      
<div align="center">
    <form  name="form1" method="get" action="recepcionMaterias.php">
        <table width="50%"  border="0" cellpadding="2" cellspacing="2" class=border>
         <tr>
          <td class=td><font class=tit><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;INGRESE LA MATERIA</b></font><BR><font class=tit>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>A VALIDAR</b></font></td>
         </tr>
        </table>
        <table>
             <tr>
            
                <TD class=tit>Nombre de la Materia:</TD>
                <TD class=cuerpotit><INPUT TYPE="text" NAME="materia" ID="materia" SIZE="50"MAXLENGTH="50"></TD>
             </tr>
             <tr>
                <TD colspan="2">
                    <INPUT TYPE="submit" name="insertar" value="Insertar Materia" onClick="return Validar_materia(this.form)">
                    <INPUT TYPE="Reset" value="borrar">
                </TD>
             </tr>
             
        </table>
<br><br><br><br><br><br>
        <?php
   include('layouts/footer.php');
      ?>
             
</body>
</html>