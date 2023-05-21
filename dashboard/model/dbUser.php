<?php

class dbUser
{


    public function getUser($email, $passw)
    {

        try {

            $con = new Conexion();
            $db = $con->getConexion();

            $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$passw'";
            $res = $db->query($sql);

            $data = $res->fetch();

            if ($data != false) {
                return $data;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function getUserById($id)
    {

        try {

            $con = new Conexion();
            $db = $con->getConexion();

            $sql = "SELECT * FROM users WHERE id = '$id'";
            $r = $db->query($sql);
            $u = $r->fetch();

            $user = new User($u['id'], $u['nombre'], $u['email'], $u['password'], $u['phone'], $u['n_cuenta'], $u['rol'], $u['fecha_alta'], $u['pagado']);

            $enc = $u['encargado'];
            $sql2 = "SELECT nombre FROM users WHERE id ='".$enc."'";
            $res = $db->query($sql2);
            $e = $res->fetch();

            if (isset($e) && $e!= FALSE) {
                $user->setEncargado($e['nombre']);
            } else {
                $user->setEncargado("N/A");
            }


        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }



        return $user;
    }


    public function getUsers()
    {

        try {

            $users = [];

            $con = new Conexion();
            $db = $con->getConexion();

            $sql = "SELECT * FROM users LIMIT 12";
            $res = $db->query($sql);

            foreach ($res as $u) {
                $user = new User($u['id'], $u['nombre'], $u['email'], $u['password'], $u['phone'], $u['n_cuenta'], $u['rol'], $u['fecha_alta'], $u['pagado']);
                $enc = $u['encargado'];
                $sql2 = "SELECT nombre FROM users WHERE id ='".$enc."'";
                $res2 = $db->query($sql2);
                $e = $res2->fetch();

                if (isset($e) && $e!= FALSE) {
                    $user->setEncargado($e['nombre']);
                } else {
                    $user->setEncargado("N/A");
                }

                $users[] = $user;
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }

        $db = NULL;


        return json_encode($users);
    }

    public function editUser($id, $nombre, $email, $password, $phone, $n_cuenta, $rol, $encargado, $fecha_alta, $fecha_baja, $pagado)
    {

        try {

            $con = new Conexion();
            $db = $con->getConexion();

            $sql2 = "SELECT id FROM users WHERE nombre = '$encargado'";
            $res2 = $db->query($sql2);
            $e = $res2->fetch();

            if (isset($e) && $e != FALSE) {
                $idEnc = $e['id'];
            } else {
                $idEnc = 'NULL';
            }

            $sql = "UPDATE users set nombre = '$nombre', email = '$email', password = '$password', phone = '$phone', n_cuenta = '$n_cuenta', rol = '$rol', encargado = '$idEnc', fecha_alta = '$fecha_alta', fecha_baja = '$fecha_baja', pagado = '$pagado'
             WHERE id = '$id'";
            $db->query($sql);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function addUser($nombre, $email, $password, $phone, $n_cuenta,  $rol, $encargado, $fecha_alta, $fecha_baja, $pagado) {

        try {

            $con = new Conexion();
            $db = $con->getConexion();

            $sql2 = "SELECT id FROM users WHERE nombre = '$encargado'";
            $res2 = $db->query($sql2);
            $e = $res2->fetch();

            if (isset($e) && $e != FALSE) {
                $idEnc = $e['id'];
            } else {
                $idEnc = 'NULL';
            }

            $sql = "INSERT into users (nombre, email, password, phone, n_cuenta, rol, encargado, fecha_alta, fecha_baja, pagado) values('$nombre', '$email', '$password', '$phone', '$n_cuenta', '$rol', '$idEnc', '$fecha_alta', '$fecha_baja', '$pagado')";
            $db->query($sql);

        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }

    }

    public function deleteUser($id) {

        try {

            $con = new Conexion();
            $db = $con->getConexion();

            $sql = "DELETE FROM users WHERE id = '$id'";
            $res = $db->query($sql);


        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function getEncargadosNombre() {
        try {

           $enc = [];

           $con = new Conexion();
           $db = $con->getConexion();

           $sql = "SELECT nombre FROM users WHERE rol = 0 || rol = 1";
           $res = $db->query($sql);
           

           foreach( $res as $c) {
               $enc[] = $c['nombre'];
           }


        } catch (PDOException $e) {
           echo "Error: " . $e->getMessage();
       }

       $db = NULL;

       return json_encode($enc);
   }
}