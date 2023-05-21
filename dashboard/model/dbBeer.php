<?php

class dbBeer {


    public function getBeers()
    {

        try {

            $beers = [];

            $con = new Conexion();
            $db = $con->getConexion();

            $sql = "SELECT * FROM beers LIMIT 12";
            $res = $db->query($sql);

            foreach ($res as $u) {
                $beer = new Beer($u['id'], $u['nombre'], $u['estilo'], $u['descripcion'], $u['fecha_fabric'], $u['fecha_distrib'], $u['consumo_pref'], $u['alcohol'], $u['temp_guardado'], $u['ibus'], $u['img_tapon'], $u['img_botella'], $u['detalles']);

                $beers[] = $beer;
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }

        $db = NULL;


        return json_encode($beers);
    }

    public function getBeerById($id)
    {

        try {

            $con = new Conexion();
            $db = $con->getConexion();

            $sql = "SELECT * FROM beers WHERE id = '$id'";
            $r = $db->query($sql);
            $u = $r->fetch();

            $beer = new Beer($u['id'], $u['nombre'], $u['estilo'], $u['descripcion'], $u['fecha_fabric'], $u['fecha_distrib'], $u['consumo_pref'], $u['alcohol'], $u['temp_guardado'], $u['ibus'], $u['img_tapon'], $u['img_botella'], $u['detalles']);

        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }

        return $beer;
    }

    public function editBeer($id, $nombre, $estilo, $descripcion, $fecha_fabric, $fecha_distrib, $consumo_pref, $alcohol, $temp_guardado, $ibus, $img_tapon, $img_botella, $detalles)
    {

        try {

            $con = new Conexion();
            $db = $con->getConexion();

            $sql2 = "SELECT img_tapon, img_botella, detalles FROM beers WHERE id = '$id'";
            $r = $db->query($sql2);
            $img = $r->fetch();

            if ($img_tapon == "") {
               $img_tapon = $img['img_tapon']; 
            }
            if ($img_botella == "") {
                $img_botella = $img['img_botella']; 
             }
             if ($detalles == "") {
                $detalles = $img['detalles']; 
             }


            $sql = "UPDATE beers set nombre = '$nombre', estilo = '$estilo', descripcion = '$descripcion', fecha_fabric = '$fecha_fabric', fecha_distrib = '$fecha_distrib', consumo_pref = '$consumo_pref', alcohol = '$alcohol', temp_guardado = '$temp_guardado', ibus = '$ibus', img_tapon = '$img_tapon', img_botella = '$img_botella', detalles = '$detalles'
             WHERE id = '$id'";
            $db->query($sql);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        $db = NULL;
    }

    public function deleteBeer($id) {

        try {

            $con = new Conexion();
            $db = $con->getConexion();

            $sql = "DELETE FROM beers WHERE id = '$id'";
            $res = $db->query($sql);


        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }

        $db = NULL;
    }

    public function addBeer($nombre, $estilo, $descripcion, $fecha_fabric, $fecha_distrib, $consumo_pref, $alcohol, $temp_guardado, $ibus, $img_tapon, $img_botella, $detalles) {

        try {

            $con = new Conexion();
            $db = $con->getConexion();

            $sql = "INSERT into beers (nombre, estilo, descripcion, fecha_fabric, fecha_distrib, consumo_pref, alcohol, temp_guardado, ibus, img_tapon, img_botella, detalles) values('$nombre', '$estilo', '$descripcion', '$fecha_fabric', '$fecha_distrib', '$consumo_pref', '$alcohol', '$temp_guardado', '$ibus', '$img_tapon', '$img_botella', '$detalles')";
            $db->query($sql);

            $id = $db->lastInsertId();

        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }

        $db = NULL;

        return $id;

    }

    public function getBeersByName() {

        try {

            $beers = [];
 
            $con = new Conexion();
            $db = $con->getConexion();
 
            $sql = "SELECT nombre FROM beers";
            $res = $db->query($sql);
            
 
            foreach( $res as $c) {
                $beers[] = $c['nombre'];
            }
 
 
         } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
 
        $db = NULL;
 
        return $beers;
    }



}