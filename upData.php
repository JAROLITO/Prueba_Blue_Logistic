<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./CSS/editar.css">
    <title>editar</title>
</head>

<body>

    <?php
    require('./coneccion.php');
    if (isset($_POST['entrar'])) {
        //echo 'En trabajo!';//
        //grabamos los datos que recibamos al regitrar y validamos//
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $email = $_POST['email'];
        $contra = $_POST['contra'];
        $confi = $_POST['confi'];
        if (!empty($_POST['nombre'] && !empty($_POST['apellido']) && !empty($_POST['email']) && !empty($_POST['contra']))) {
            if ($contra == $confi) {
                $p = crud::conect()->prepare('UPDATE crudtabla SET nombre=:n, apellido=:a, email=:e, contra=:c');
                $p->bindValue(':n', $nombre);
                $p->bindValue(':a',  $apellido);
                $p->bindValue(':e',  $email);
                $p->bindValue(':c',  $contra);
                $p->execute();
                echo 'Correctamente';
            } else {
                echo 'No cambiaste';
            }
        }
    }
    ?>

    <div class="form">
        <div class="titulo">
            <p>Editar Empleado</p>
        </div>
        <form action="" method="post">
            <input type="text" name="nombre" placeholder="Nombre">
            <input type="text" name="apellido" placeholder="Apellido">
            <input type="email" name="email" placeholder="Email">
            <input type="password" name="contra" placeholder="Contraseña">
            <input type="password" name="confi" placeholder="confirmar">
            <input type="submit" value="upDate" name="entrar">
            <button><a href="user.php">Volver</a></button>
        </form>
    </div>
</body>

</html>