<?php


    require_once('conexion.php');
    $pdo = new PDO($hostPDO, $usuarioDB ,$contraseyaDB);
    

    $consulta = $pdo -> prepare('SELECT * FROM clientes');

    $consulta->execute();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

    <title>READ</title>
    <title>Bootstrap Example</title>
</head>
<body>
    <p><a href="nuevo.php" button type="button" class="btn btn-outline-success">Crear 
        <i class="bi bi-plus-circle-dotted"></i>
    </a></p>
    <div class="container">
        <table class="table">
        <tr>
            <th>Identificacion</th>
            <th>Nombres</th>
            <th>Apellidos</th>
            <th>Email</th>
            <th>Pais</th>
            <th>Borrar</th>
            <th>Modificar</th>
        </tr>
        <?php foreach ($consulta as $clave=>$valor):?>

        <tr>
            
            <td><?= $valor['IdCliente'];?></td>
            <td><?= $valor['Nombres'];?></td>
            <td><?= $valor['Apellidos'];?></td>
            <td><?= $valor['Email'];?></td>
            <td><?= $valor['IdPais'];?></td>   
            
            <td><a  button type="button" class="btn btn-outline-danger" href="borrar.php? IdCliente=<?= $valor['IdCliente']?>">Borrar</button>
            <i class="bi bi-trash-fill"></i></a></td>

            <!-- <td><a  button type="button" class="btn btn-outline-warning" href="modificar.php? IdCliente=<?= $valor['IdCliente']?>">Modificar</button>
        <i class="bi bi-pencil-fill"></i></a></td> -->
       <td><a button type="button" class="btn btn-outline-warning" href="modificar.php?IdCliente=<?= $valor['IdCliente']?>">Modificar <i class="bi bi-pencil-fill"></i></a></td>

        <?php endforeach; ?>
        </tr>
        
        
    </table>
    </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
</body>
</html>