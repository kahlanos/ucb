<?php
session_start();
require("utils/conexion.php");

require("controller/userController.php");

require("model/User.php");
require("model/dbUser.php");


$userController = new userController;

//Ruta de la home
$home = "/ucb/dashboard/index.php/";
//Quito la home de la ruta de la barra de direcciones (ACCION)
$ruta = str_replace($home, "", $_SERVER["REQUEST_URI"]);

//Creo el array de ruta (filtrando los vacíos)
$array_ruta = array_filter(explode("/", $ruta));




//RUTAS
if (isset($array_ruta[0]) && $array_ruta[0] == "login" && empty($array_ruta[1])) {
    $userController->login();
} else if (isset($array_ruta[0]) && $array_ruta[0] == "login" && $array_ruta[1] == "process") {
    $userController->process();
} else if (isset($array_ruta[0]) && $array_ruta[0] == "home" && empty($array_ruta[1])) {
    $userController->home();
} else if (isset($array_ruta[0]) && $array_ruta[0] == "users" && empty($array_ruta[1])) {
    //echo $controller->usuarios();
    $userController->users();
} else if (isset($array_ruta[0]) && $array_ruta[0] == "loadUsers" && empty($array_ruta[1])) {
    //echo $controller->usuarios();
    echo $userController->loadUsers();
} else if (isset($array_ruta[0]) && $array_ruta[0] == "users" && is_numeric($array_ruta[1]) && !empty($array_ruta[2]) && $array_ruta[2] == "process") {
    $userController->editUser($array_ruta[1]);
}  else if (isset($array_ruta[0]) && $array_ruta[0] == "users" && is_numeric($array_ruta[1])) {
    $userController->fichaUsuario($array_ruta[1]);
} else if (isset($array_ruta[0]) && $array_ruta[0] == "userDelete" && is_numeric($array_ruta[1])) {
    $userController->deleteUser($array_ruta[1]);
} else if (isset($array_ruta[0]) && $array_ruta[0] == "users" && $array_ruta[1] == "add" && !empty($array_ruta[2]) && $array_ruta[2] == "loadUsers") {
    echo $userController->cargaEncargadosNombre();
}  else if (isset($array_ruta[0]) && $array_ruta[0] == "users" && $array_ruta[1] == "add" && !empty($array_ruta[2]) && $array_ruta[2] == "process") {   
    $userController->addUserProcess();
} else if (isset($array_ruta[0]) && $array_ruta[0] == "users" && $array_ruta[1] == "add") {
    $userController->addUser();
} 