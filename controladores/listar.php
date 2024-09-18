<?php
require_once(__DIR__ . "/../libs/Database.php");
require_once(__DIR__ . "/../libs/modelo.php");

include('../class/Aprendiz.php');

$database = new Database();
$connection = $database->getConnection();
$aprendiz = new Aprendiz($connection);

$lista = $aprendiz->getAll();

?>
<table border = "1">
    <thead>
        <th>ID</th>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Correo</th>
        <th>Telefono</th>
        <th>DNI</th>
    </thead>
    <tbody>
        <?php 
        for ($i = 0; $i < count($lista); $i++){ 
        ?>
        <tr>
            <td><?php print_r($lista[$i]["id"]) ?></td>
            <td><?php print_r($lista[$i]["first_name"]) ?></td>
            <td><?php print_r($lista[$i]["last_name"]) ?></td>
            <td><?php print_r($lista[$i]["birthdate"]) ?></td>
            <td><?php print_r($lista[$i]["email"]) ?></td>
            <td><?php print_r($lista[$i]["phone"]) ?></td>
            <td><?php print_r($lista[$i]["dni"]) ?></td>
            <td><?php print_r($lista[$i]["user_account"]) ?></td>
            <td><?php print_r($lista[$i]["average"]) ?></td>
            <td>
                <div>
                    <a href="editar.php?id=<?= $lista[$i]["id"] ?>">Editar</a>
                </div>
            </td>
        </tr>
        
        <?php } ?>

    </tbody>
    
</table>
