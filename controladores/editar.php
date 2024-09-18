<?php

$id = $_REQUEST["id"];

require_once(__DIR__ . "/../libs/Database.php");
require_once(__DIR__ . "/../libs/modelo.php");

include('../class/Aprendiz.php');

$database = new Database();
$connection = $database->getConnection();
$aprendiz = new Aprendiz($connection);

$usuario = $aprendiz->getById($id);

echo "<pre>";
var_dump($usuario);
echo "</pre>";