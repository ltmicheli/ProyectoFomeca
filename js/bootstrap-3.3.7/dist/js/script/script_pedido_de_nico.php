<?php

//Conectando, seleccionando la base da datos
$link = mysql_connect('localhost', 'root', '')
    or die('No se pudo conectar:'.mysql_error());
echo 'Conexion satisfactoria';
mysql_select_db('afsca_registrounico') or die('No se pudo seleccionar la bada de datos');

//Realizar una consulta MysqlndUhConnection


$query = ("SELECT *
          FROM autorizado
          INTO OUTFILE 'C:/Users/lmicheli/Desktop/datos.txt'");
$result = mysql_query($query) or die('Consulta fallida: '.mysql_error());

//Imprimr datos en html
echo "<table>\n";
while($line = mysql_fetch_array($result,  MYSQL_ASSOC)){
  echo "\t<tr>\n";
  foreach ($line as $col_value) {
    echo "\t\t<td>$col_value</td>\n";
  }
  echo "\t</tr>\n";
}

//Liberar resultados
mysql_free_result($result);

//Cerrar la Conexion
mysql_close($link);

?>
