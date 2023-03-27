<!DOCTYPE html>            
<html lang="en">
    <head>
        <title>CREATE NEW</title>
    </head>
    <body>
        <h1>CREAR NUEVO</h1>
        <form action="nuevo.php" method="post">
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
                 $pdo = new PDO($hostPDO, $usuarioDB, $contraseyaDB);

                 if (isset($_POST['nombres'])) {
                    $nombres = $_POST['nombres'];
                } else {
                    $nombres = "";
                }

                if (isset($_POST['apellidos'])) {
                    $apellidos = $_POST['apellidos'];
                } else {
                     $apellidos = "";
                }

                if (isset($_POST['email'])) {
                    $email = $_POST['email'];
                } else {
                     $email = "";
                }

                if (isset($_POST['IdCliente'])) {
                    $idCliente = $_POST['IdCliente'];
                } else {
                     $idCliente = "";
                }

                if (isset($_POST['IdPais'])) {
                    $idPais = $_POST['IdPais'];
                } else {
                    $idPais = "";
                }


                

                $consulta = "INSERT INTO clientes (Apellidos, Email, IdCliente, IdPais,  Nombres) VALUES (?, ?, ?, ?, ?)";
                $sentencia = $pdo->prepare($consulta);

                $sentencia->execute([$apellidos, $email, $idCliente, $idPais, $nombres]);

                               
?>
