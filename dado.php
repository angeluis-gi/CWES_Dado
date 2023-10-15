<!DOCTYPE html>
  <html lang="es-ES">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DADOS</title>
  </head>

  <body>

    <?php
      define ('DADO', array("&#9856;", "&#9857;", "&#9858;", "&#9859;", "&#9860;", "&#9861;"));
      $jugador1 = [];
      $jugador2 = [];

      for ($i=0; $i < 5; $i++) {
        $jugador1[$i] = random_int(0, 5);
        $jugador2[$i] = random_int(0, 5);
        // genera num aleatorios y guarda sus valores en los 2 jugadores
      }

      function Ganador($jugador1, $jugador2) {
        $msg = ["Empate", "Gana Jugador 1", "Gana Jugador 2"];
        asort($jugador1);
        asort($jugador2);
        $j1_suma = array_sum(array_slice($jugador1, 1, 3));
        $j2_suma = array_sum(array_slice($jugador2, 1, 3));
        // reordenamos el array de menor a mayor valor
        // eliminamos los extremos (max y min valores) quedando 3 numeros
        // sumamos los contenidos

        if ($j1_suma == $j2_suma) {
          return $msg[0];
        } else if ($j1_suma > $j2_suma) {
          return $msg[1];
        } else {
          return $msg[2];
        }
        // comparamos y quien tenga más puntuación gana
      }

      function MostrarTirada($jugador_muestra) {
        $array_dados = [];
        for ($i=0; $i < 5; $i++) { 
          $array_dados[$i] = DADO[$jugador_muestra[$i]];
        }
        return implode($array_dados);
        // mostramos la tirada original en su orden original (transformar valores del array jugador a caracteres de dados)
      }

      echo '<table style="text-align: center">';
        echo '<tr>';
          echo '<td>Jugador 1</td>';
          echo '<td style="font-size: 5em">'.MostrarTirada($jugador1).'</td>';
        echo '</tr>';
        echo '<tr>';
          echo '<td>Jugador 2</td>';
          echo '<td style="font-size: 5em">'.MostrarTirada($jugador2).'</td>';
        echo '</tr>';
        echo '<tr>';
          echo '<td colspan="2">'.Ganador($jugador1, $jugador2).'</td>';
        echo '</tr>';
      echo '</table>';
    ?>
  </body>
</html>
