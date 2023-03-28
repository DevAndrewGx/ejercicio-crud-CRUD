<?php
    // recojer las variables
    $idCliente = issent($_REQUEST['IdCliente'])? $_REQUEST['IdCliente']:null;
    $nombres = issent($_REQUEST['Nombres'])? $_REQUEST['Nombres']:null;
    $apelldios = issent($_REQUEST['Apellidos'])? $_REQUEST['Apellidos']:null;
    $email = issent($_REQUEST['Email'])? $_REQUEST['Email']:null;
    $idPais = issent($_REQUEST['IdPais'])? $_REQUEST['IdPais']:null;


    // conexion a la base de datos
    requeri_once('conexion.php');
    $pdo = new PDO($hostPDO, $usuarioDB, $contraseyaDB);
    // probar
    if($_SERVER['REQUEST_METHOD'] == "POST"){
            // Consulta UPDATE o Actualizar
            $miUpdate = $miPDO -> prepare("UPDATE clientes SET Nombres='$nombres', Apellidos='$apellidos', Email='$email', IdPais='$idPais' WHERE IdCliente='$idCliente';");
            // Ejecutar update
            $miUpdate-> execute();
        header ('Location: leer.php');

    }else {
        // Prepara SELECT
        $miConsulta=$miPDO->prepare("SELECT * FROM  clientes WHERE idCliente='$idCliente';");
        // Ejecutar SELECT
        $miConsulta->execute();
    }

    // Obtener resultado
    $clientes = $miConsulta->fetch();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UPDATE NEW/title>
</head>
<body>
    <h1>UPDATE</h1>
    <form action="" methond="POST">
        <p>
            <label for="IdCliente">IdCliente</label>
            <input type="text" name="IdCliente" id="IdCliente" value="<?= $clientes['IdCliente'] ?>">
        </p>
        <p>
        <label for="IdCliente">Nombres</label>
            <input type="text" name="Nombres" id="Nombres" value="<?= $clientes['Nombres'] ?>">
        </p>
        <p>
        <label for="IdCliente">Apellidos</label>
            <input type="text" name="Apellidos" id="Apellidos" value="<?= $clientes['Apellidos'] ?>">
        </p>
        <p>
        <label for="IdCliente">Email</label>
            <input type="text" name="Email" id="Email" value="<?= $clientes['Email'] ?>">
        </p>
        <div class="page-header">
            <label for="IdPais">Pais</label>
            <select type="selected" id="IdPais" name="IdPais">
                <option value="IdPais" type="selected" name="IdPais">Todos los paises</option>
                <?php
                    // conexion a la base de DB
                    require_once('conexion.php');
                    $pdo = new PDO($hostPDO, $usuarioDB, $contraseyaDB);
                    $consultaCBO = $pdo -> prepare('SELECT * FROM paises;');
                    $consultaCBO->execute();
                    while($row=$consultaCBO->fetch(PDO::FETCH_ASSOC)) {
                        extract($row);
                ?>      
                        <option value="<?php echo $IdPais; ?>"><?php echo $pais;?></option>
                        <?php
                    }
                ?>
            </select>
        <p>
            <input type="submit" value="Modificar">
        </p>
        </div>
    </form>
</body>
</html>