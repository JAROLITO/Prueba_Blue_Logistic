<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./CSS/user.css">
    <title>Usuario</title>
</head>
<body>
    <h1>Blue Logistic <button><a href="./comienzo.php">Volver</a></button></h1>
    <hr>
    <h2>Tabla de Empleados ingresados</h2>
    <table>
        <thead>
            <tr>
                <th>Nomnre</th>
                <th>Apellido</th>
                <th>EMAIL</th>
                <th>CONTRA</th>
                <th>Borrar</th>
                <th>Editar</th>

            </tr>
        </thead>
        <tbody>
        <?php
    require('./coneccion.php');
    $p=crud::Selectdata();
    if (isset($_GET['id'])) {
        $id=$_GET['id'];
        $e=crud::delete($id);
    }
    if (count ($p)>0) {
       for ($i=0; $i < count ($p); $i++) { 
     echo '<tr>';
     foreach ($p[$i] as $key => $value) {
        if ($key!='id') {
           echo '<td>'.$value.'</td>';
        }
       }
       ?>
       <td><a href="user.php?id=<?php echo $p [$i]['id']?>">Borrar</a></td>
       <td><a href="upData.php">Editar</a></td>
       <?php
      echo '</tr>';
       }
    }
    ?>
        </tbody>
    </table>
</body>
</html>