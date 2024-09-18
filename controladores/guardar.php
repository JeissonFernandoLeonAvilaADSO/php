<?php

require_once(__DIR__ . "/../libs/Database.php");
require_once(__DIR__ . "/../libs/modelo.php");

include('../class/Aprendiz.php');



$nombre = isset($_POST["first_name"]) ? ($_POST["first_name"] != "" ? $_POST["first_name"] : false) : false;

$apellido = isset($_POST["last_name"]) ? ($_POST["last_name"] != "" ? $_POST["last_name"] : false) : false;

$correo = isset($_POST["email"]) ? ($_POST["email"] != "" ? $_POST["email"] : false) : false;

$telefono = isset($_POST["phone"]) ? ($_POST["phone"] != "" ? $_POST["phone"] : false) : false;

$dni = isset($_POST["dni"]) ? ($_POST["dni"] != "" ? $_POST["dni"] : false) : false;


var_dump($nombre, $apellido, $correo, $telefono, $dni);

if($nombre && $apellido && $correo && $telefono && $dni){

        $database = new Database();
        $connection = $database->getConnection();
        $aprendiz = new Aprendiz($connection);
        echo "guardando datos";
        $id_aprendiz = $aprendiz->store([
            'first_name'    => $nombre,
            'last_name'     => $apellido,
            'email'         => $correo,
            'phone'         => $telefono,
            'dni'           => $dni,
            'user_account'  => isset($_POST["user_account"]) ? $_POST["user_account"] : "",
            'average'       => isset($_POST["average"]) ? $_POST["average"] : ""
        ]);
        echo "datos guardados";

        if ($id_aprendiz =! null){
            header("location: /adso/2696521/controladores/listar.php");
        } else {
            echo "fallo en el id";
        }

    } else {
        echo "No se pudo guardar los datos";
    }


var_dump($nombre);