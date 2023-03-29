<?php
    //Varibles
    require_once('conexion.php');
    // $hostPDO = "mysql:host=$hostDB;dbname=$nombreDB;";
    $conexionPdo = new PDO($hostPDO, $usuarioDB, $contraseyaDB);
   

    //Obtienee codigo del libro a borrar
    $IdCliente = isset($_REQUEST['IdCliente']) ? $_REQUEST['IdCliente']: null;
    $IdPais = isset($_REQUEST['IdPais']) ? $_REQUEST['IdPais']: null;

    //Prepara la query de DELETE 
    $newConsulta = $conexionPdo->prepare("DELETE FROM clientes WHERE IdCliente = '$IdCliente';");
    //Ejercuta la sentencia SQL
    $newConsulta->execute();
    //Redireccionamos al php donde se encuentran todos los datos

    header('Location: leer.php');

?>