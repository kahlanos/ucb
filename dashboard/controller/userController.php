<?php

class userController {

    public function login() {
        require("view/login.php");
    }

    public function logout() {
        require("view/logout.php");
    }

    public function home() {
        require("view/home.php");
    }

    public function process() {
       
        $db = new DbUser();
        $res = $db->getUser($_POST["email"], $_POST["password"]);


        if ($res && $res['rol'] == 0) {
            $_SESSION["user"] = 'admin';
            $_SESSION["name"] = $res['nombre'];
            $_SESSION["userId"] = $res['id'];
            $_SESSION["rol"] = $res['rol'];
            
            header("location: ../../index.php/home");
            
        } else if ($res && $res['rol'] == 1) {
            $_SESSION["user"] = 'encargado';
            $_SESSION["name"] = $res['nombre'];
            $_SESSION["userId"] = $res['id'];
            $_SESSION["rol"] = $res['rol'];

            header("location: ../../index.php/home");

        } else if ($res && $res['rol'] == 2) {
            $_SESSION["user"] = 'socio';
            $_SESSION["name"] = $res['nombre'];
            $_SESSION["userId"] = $res['id'];
            $_SESSION["rol"] = $res['rol'];

            header("location: ../../index.php/cervezas");

        }else {
            //require("view/login.php");
            header("location: ../../index.php/login");
        }
        
    }

    public function users() { 
         require("view/list_users.php");
    }
 

    public function loadUsers() {
         $db = new DbUser();
         $res = $db->getUsers(strtolower($_POST['search']));
 
         return $res;
    }

    public function fichaUsuario($id) {

        $db = new DbUser();
        $res = $db->getUserById($id);
        
        require("view/ficha_user.php");
    }

    public function cargaEncargadosNombre() {
        $db = new DbUser();
        $res = $db->getEncargadosNombre();

        return $res;
    }

    public function editUser($id) {

        $db = new DbUser();

        if (isset($_POST['rol']) && $_POST['rol'] == 0) {
            $rol = 0;
        } else if (isset($_POST['rol']) && $_POST['rol'] == 1) {
            $rol = 1;
        } else if (isset($_POST['rol']) && $_POST['rol'] == 2) {
            $rol = 2;
        }

        if (isset($_POST['pagado']) && $_POST['pagado'] == 1) {
            $pago = 1;
        }



        $db->editUser($id,$_POST['nombre'],$_POST['email'],$_POST['password'],$_POST['phone'], $_POST['n_cuenta'], $rol, $_POST['encargado'], $_POST['fecha_alta'], $_POST['fecha_baja'], $pago);

        header("location: ../../../index.php/users");
    }

    public function addUser() {
        
        require("view/add_users.php");
    }

    public function addUserProcess() {

        $db = new DbUser();
       
        if (isset($_POST['rol']) && $_POST['rol'] == 0) {
            $rol = 0;
        } else if (isset($_POST['rol']) && $_POST['rol'] == 1) {
            $rol = 1;
        } else if (isset($_POST['rol']) && $_POST['rol'] == 2) {
            $rol = 2;
        }

        if (isset($_POST['pagado']) && $_POST['pagado'] == 1) {
            $pago = 1;
        }

        $db->addUser($_POST['nombre'],$_POST['email'],$_POST['password'],$_POST['phone'], $_POST['n_cuenta'], $rol, $_POST['encargado'], $_POST['fecha_alta'], $_POST['fecha_baja'], $pago);

        header("location: ../../../index.php/users");

    }

    public function deleteUser($id) {
        $db = new DbUser();
        $db->deleteUser($id);

        header("location: ../../index.php/users");
    }

}