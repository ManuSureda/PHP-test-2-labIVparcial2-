
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Manuel Sureda</title>
  </head>
  <body>

<label>Bienvenido <?=$userLoged->getNombre()?></label>
        <table> Tus Vehiculos
            <thead>
                <tr>
                    <th>Patente</th>
                    <th>Marca</th>
                    <th>Año</th>
                    <th>Titular</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($vehiculoList as $vehiculo) { ?>
                    <tr>
                        <td> <?= $vehiculo->getPatente(); ?> </td>
                        <td> <?= $vehiculo->getMarca(); ?> </td>
                        <td> <?= $vehiculo->getAnio(); ?> </td>
                        <td> <?= $vehiculo->getTitular(); ?> </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
  </body>
  <form action="<?= FRONT_ROOT . '/vehiculoC/delete'?>" method="post">
  
        <label>Patente a eliminar</label>
        <input type="text" name="Patente">
  
        <button type="submit">Enviar</button>
  </form>

</html>