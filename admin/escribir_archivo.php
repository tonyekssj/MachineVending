<?php
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
  // Obtener los datos enviados por el Arduino
  $data = $_GET['data'];

  // Escribir los datos en un archivo de texto
  $archivo = fopen("status.txt", "a"); // Abre el archivo en modo 'append'
  fwrite($archivo, $data . "\n"); // Escribe los datos en una nueva línea
  fclose($archivo); // Cierra el archivo

  // Enviar una respuesta de éxito al Arduino
  echo "Datos recibidos y escritos correctamente";
} else {
  // Enviar una respuesta de error al Arduino
  echo "Error al procesar la solicitud";
}
?>
