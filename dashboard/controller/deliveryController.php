<?php

class deliveryController
{

    public function deliveries()
    {
        $db = new dbUser();
        $res = $db->getEncargadosNombre();

        $res = json_decode($res);

        require("view/list_deliveries.php");
    }


    public function generaEntregas()
    {

        $db = new dbDelivery();

        $res = "";

        $fecha = $db->getFecha();

        foreach ($fecha as $f) {
            if ($f['fecha'] == $_POST['mes']) {
                return "Ya existe";
            }
        }

        $users = $db->getAllUsers();
        //var_dump($users);

        foreach ($users as $u) {

            if ($u->getRol() == 2) {
                $encargado = $db->getEncargadoUser($u->getId());
                //var_dump($encargado);
                $res = $db->generateDeliveries($_POST['mes'], $u->getId(), $encargado['encargado']);
                //echo $res;
            }
        }

        return $res;
    }


    public function loadDeliveries()
    {

        $db = new dbDelivery();

        $res = $db->getDeliveries($_POST['mes'], $_POST['encargado']);

        return $res;
    }


    public function cambiaEstado()
    {

        $db = new dbDelivery();

        $db->cambiaEstado($_POST['id']);
    }


    public function deleteDelivery($id)
    {

        $db = new dbDelivery();
        $db->deleteDelivery($id);

        header("location: ../../index.php/deliveries");
    }
}
