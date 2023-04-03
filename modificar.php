<?php
    // recojer las variables
    $IdCliente = isset($_REQUEST['IdCliente'])? $_REQUEST['IdCliente']:null;
    $Nombres = isset($_REQUEST['Nombres'])? $_REQUEST['Nombres']:null;
    $Apellidos = isset($_REQUEST['Apellidos'])? $_REQUEST['Apellidos']:null;
    $Email = isset($_REQUEST['Email'])? $_REQUEST['Email']:null;
    $IdPais = isset($_REQUEST['IdPais'])? $_REQUEST['IdPais']:null;


    // conexion a la base de datos
    require_once('conexion.php');
    $pdo = new PDO($hostPDO, $usuarioDB, $contraseyaDB);
    // probar
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
            // Consulta UPDATE o Actualizar
            $miUpdate = $pdo -> prepare("UPDATE clientes SET Nombres='$Nombres', Apellidos='$Apellidos', Email='$Email', IdPais='$IdPais' WHERE IdCliente='$IdCliente';");
            // Ejecutar update
            $miUpdate-> execute();
        header ('Location: leer.php');

    }else {
        // Prepara SELECT
        $miConsulta=$pdo->prepare("SELECT * FROM  clientes WHERE IdCliente='$IdCliente';");
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
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <title>UPDATE NEW</title>
</head>
<body>
    <div class="container-fluid">
           <h1>UPDATE</h1>
    <form action="" method="POST">
        <p>
            <label for="IdCliente">IdCliente</label>
            <input type="text" name="IdCliente" id="IdCliente" value="<?= $clientes['IdCliente'] ?>"></p>
        <p>
            <label for="Nombres">Nombres</label>
            <input type="text" name="Nombres" id="Nombres" value="<?= $clientes['Nombres'] ?>"></p>
            
        <p>
            <label for="Apellidos">Apellidos</label>
            <input type="text" name="Apellidos" id="Apellidos" value="<?= $clientes['Apellidos'] ?>"></p>
        <p>
            <label for="Email">Email</label>
            <input type="text" name="Email" id="Email" value="<?= $clientes['Email'] ?>"></p>
           
        
       
        <div class="page-header">
            <label for="IdPais">Pais</label>
            <select  id="IdPais" name="IdPais">
                <option value="IdPais" type="selected" >Todos los paises</option>
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
                <br>
                <br>
                <input type="submit" value="Modificar">
            </p>
        </div>
    </form>
    </div>
 
</body>
</html>