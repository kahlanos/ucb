<?php

class dbDelivery
{

    public function generateDeliveries($mes, $socio, $encargado)
    {

        try {

            $con = new Conexion();
            $db = $con->getConexion();


            $sql = "INSERT into deliveries (id_socio, id_encargado, estado, fecha) values('$socio', '$encargado', 0, '$mes')";
            $db->query($sql);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }

        $db = NULL;

        return "Creada";
    }

    public function getFecha()
    {

        $con = new Conexion();
        $db = $con->getConexion();

        $sq = "SELECT fecha FROM deliveries";
        $fecha = $db->query($sq);

        return $fecha;
    }

    public function getAllUsers()
    {

        try {

            $con = new Conexion();
            $db = $con->getConexion();

            $users = [];
            $sql = "SELECT * FROM users WHERE fecha_baja = '000-00-00' AND rol = 2";
            $res = $db->query($sql);

            foreach ($res as $u) {
                $user = new User($u['id'], $u['nombre'], $u['email'], $u['password'], $u['phone'], $u['n_cuenta'], $u['rol'], $u['fecha_alta'], $u['pagado']);
                $users[] = $user;
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }

        $db = NULL;

        return $users;
    }

    public function getEncargadoUser($id)
    {

        try {

            $con = new Conexion();
            $db = $con->getConexion();

            $sql = "SELECT encargado FROM users WHERE id = '$id'";
            $res = $db->query($sql);
            $e = $res->fetch();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }

        $db = NULL;

        return $e;
    }

    public function getDeliveries($mes, $encargado)
    {

        try {

            $con = new Conexion();
            $db = $con->getConexion();

            $delivs = [];

            if ($mes != "") {
                $sqlMes = "WHERE fecha = '$mes'";
            } else {
                $m = date("Y-m");
                $sqlMes = "WHERE fecha = '$m'";
            }


            if ($encargado != "") {
                $sql = "SELECT id FROM users WHERE nombre = '$encargado'";
                $res = $db->query($sql);
                $enc = $res->fetch();
                $e = $enc['id'];
                $sqlEnc = "AND id_encargado = '$e'";
            } else {
                $sqlEnc = "";
            }

            $sql2 = "SELECT d.id AS id_deliv, u.nombre, d.id_encargado, d.estado, d.fecha FROM deliveries d JOIN users u on d.id_socio = u.id " . $sqlMes . " " . $sqlEnc;
            $res2 = $db->query($sql2);

            foreach ($res2 as $d) {
                $idEnc = $d['id_encargado'];
                $sql3 = "SELECT nombre FROM users WHERE id = '$idEnc'";
                $res3 = $db->query($sql3);
                $nombreEnc = $res3->fetch();
                $deliv = new Delivery($d['id_deliv'], $d['nombre'], $nombreEnc['nombre'], $d['estado'], $d['fecha']);
                $delivs[] = $deliv;
            }

        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        $db = NULL;

        return json_encode($delivs);
    }

    public function cambiaEstado($id) {

        try {

            $con = new Conexion();
            $db = $con->getConexion();

            $sql = "SELECT estado FROM deliveries WHERE id = '$id'";
            $res = $db->query($sql);
            $i = $res->fetch();

            if ($i['estado'] == 0) {
                $newEstado = 1;
            } else {
                $newEstado = 0;
            }

            $sql2 = "UPDATE deliveries set estado = '$newEstado' WHERE id = '$id'";
            $db->query($sql2);

        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        } 
        $db = NULL;

   
    }

    public function deleteDelivery($id) {

        try {

            $con = new Conexion();
            $db = $con->getConexion();

            $sql = "DELETE FROM deliveries WHERE id = '$id'";
            $res = $db->query($sql);


        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }

        $db = NULL;
    }
};
