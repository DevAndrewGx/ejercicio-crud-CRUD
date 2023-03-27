<!DOCTYPE html>            
<html lang="en">
    <head>
        <title>UPDATED NEW</title>
    </head>
    <body>
        <h1>MODIFICAR</h1>
        <form action="modificar.php" method="post">
            <label for="nombres">Nombres</label>
            <input type="text" placeholder="Nombres" name="nombres"><br><br>
            <label for="apellidos">Apellidos</label>
            <input type="text" placeholder="Apellidos" name="apellidos"><br><br>
            <label for="Email">Email</label>
            <input type="text" placeholder="Email" name="email"><br><br>
            <label for="IdCliente">IdCliente</label>
            <input type="text" placeholder="Idcliente" name="IdCliente"><br><br>
            <label for="IdPais">IdPais</label>
            <input type="text" placeholder="IdPais" name="IdPais"><br><br>


            <input type="submit" value="Enviar">
        </form>
    
        
    </body>
</html>

<?php
    require_once('conexion.php');
    $pdo = new PDO($hostPDO, $usuarioDB ,$contraseyaDB);

    $cosulta = "UPDATE clientes SET Apellidos = ?, Email = ?,IdCliente = ?, IdPais = ?, Nomres = ?"
?>