<?php

class dbNews {

    public function getnews()
    {

        try {

            $newses = [];

            $con = new Conexion();
            $db = $con->getConexion();

            $sql = "SELECT * FROM news LIMIT 12";
            $res = $db->query($sql);

            foreach ($res as $u) {
                $news = new News($u['id'], $u['title'], $u['text'], $u['img'], $u['date']);

                $newses[] = $news;
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }

        $db = NULL;


        return json_encode($newses);
    }

    public function addNews($title, $text, $img, $date) {

        try {

            $con = new Conexion();
            $db = $con->getConexion();

            $sql = "INSERT into news (title, text, img, date) values('$title', '$text', '$img', '$date')";
            $db->query($sql);

            $id = $db->lastInsertId();

        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }

        $db = NULL;

        return $id;

    }

    public function getNewsById($id)
    {

        try {

            $con = new Conexion();
            $db = $con->getConexion();

            $sql = "SELECT * FROM news WHERE id = '$id'";
            $r = $db->query($sql);
            $u = $r->fetch();

            $news = new News($u['id'], $u['title'], $u['text'], $u['img'], $u['date']);

        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }

        return $news;
    }

    public function editNews($id, $title, $text, $img, $date)
    {

        try {

            $con = new Conexion();
            $db = $con->getConexion();

            $sql2 = "SELECT img FROM news WHERE id = '$id'";
            $r = $db->query($sql2);
            $imgCurrent = $r->fetch();

            if ($img == "") {
               $img = $imgCurrent['img']; 
            }
            

            $sql = "UPDATE news set title = '$title', text = '$text', img = '$img', date = '$date' WHERE id = '$id'";
            $db->query($sql);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        $db = NULL;
    }

    public function deleteNews($id) {

        try {

            $con = new Conexion();
            $db = $con->getConexion();

            $sql = "DELETE FROM news WHERE id = '$id'";
            $res = $db->query($sql);


        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }

        $db = NULL;
    }

}