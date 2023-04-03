<?php
//comprobar datos en post
if ($_SERVER['REQUEST_METHOD']=='POST'){
    //RECOGER LAS VARIABLES
    $IdCliente=isset($_REQUEST['IdCliente']) ? $_REQUEST['IdCliente']:null;
    $Nombres=isset($_REQUEST['Nombres']) ? $_REQUEST['Nombres']:null;
    $Apellidos=isset($_REQUEST['Apellidos']) ? $_REQUEST['Apellidos']:null;
    $Email=isset($_REQUEST['Email']) ? $_REQUEST['Email']:null;
    $IdPais=isset($_REQUEST['IdPais']) ? $_REQUEST['IdPais']:null;
    //conexion a la BD
    require_once('conexion.php');

    $miPDO = new PDO($hostPDO,$usuarioDB,$contrasenaDB);
    $hostPDO="mysql:host=$hostDB;dbname=nombreDB;";
    //insertar
    $miInsert = $miPDO->prepare("INSERT INTO clientes (IdCliente,Nombres,Apellidos,Email,IdPais)VALUES('$IdCliente',' $Nombres','$Apellidos','$Email','$IdPais')");
     //ejecutar insert
     $miInsert->execute();
     //Redireccionar a leer
     header('location: leer.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <title>Registro clientes</title>
</head>
<body>
    <div class="container-fluid">
        <h1>Registro Nuevo Cliente</h1>
    <form action="" method="POST">
       <p>
       <label for="IdCliente">IdCliente</label>
       <input id="IdCliente" type="text" name="IdCliente">
      </p>
      <label for="Nombres">Nombres</label>
      <input id="Nombres" type="text" name="Nombres">
      <p>
      </p>
      <label for="Apellidos">Apellidos</label>
      <input id="Apellidos" type="text" name="Apellidos">
      <p>
      </p>
      <label for="Email">Email</label>
      <input id="Email" type="text" name="Email">
      <p>

      </p>
        <div class="page-header">
            <label for="IdPais">pais</label>
            <select id="IdPais" type="selected" name=IdPais>
            <option value="IdPais" selected="selected">Todos los paises</option>
        <?php  
             //conexion a la DB 
             require_once('conexion.php');
             $miPDO = new PDO($hostPDO,$usuarioDB,$contrasenaDB);
             $ConsultaCbo = $miPDO->prepare('SELECT  * FROM paises;');
             $ConsultaCbo->execute();
             while ($row=$ConsultaCbo->fetch(PDO::FETCH_ASSOC))
             {
                extract($row);
                ?>
                <option value="<?php echo $IdPais;?>"><?php echo $pais; ?></option>
                <?php
             }
             ?>
            </select>
            
            <p>
                <br>
            <input type="submit" value="Guardar" >
             </p>

        </div>           
    </form>
    </div>
    
</body>
</html>