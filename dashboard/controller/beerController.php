<?php

class beerController
{


    public function beers()
    {
        require("view/list_beers.php");
    }

    public function loadBeers()
    {
        $db = new DbBeer();
        $res = $db->getBeers();

        return $res;
    }

    public function fichaBeer($id)
    {

        $db = new dbBeer();
        $res = $db->getBeerById($id);

        require("view/ficha_beer.php");
    }

    public function editBeer($id)
    {

        $db = new dbBeer();

        $db->editBeer($id, $_POST['nombre'], $_POST['estilo'], $_POST['descripcion'], $_POST['fecha_fabric'], $_POST['fecha_distrib'], $_POST['consumo_pref'], $_POST['alcohol'], $_POST['temp_guardado'], $_POST['ibus'], $_FILES['img_tapon']['name'], $_FILES['img_botella']['name'], $_FILES['detalles']['name']);

        var_dump($_FILES['img_tapon']);

        if (isset($_FILES['img_tapon'])) {
            $this->subeImg($_FILES['img_tapon'], $id, 'tapones');
        }

        if (isset($_FILES['img_botella'])) {
            $this->subeImg($_FILES['img_botella'], $id, 'botellas');
        }

        if (isset($_FILES['detalles'])) {
            $this->subePdf($_FILES['detalles'], $id);
        }


        header("location: ../../../index.php/beers");
    }

    public function deleteBeer($id)
    {
        $db = new dbBeer();
        $db->deleteBeer($id);

        header("location: ../../index.php/beers");
    }

    public function addBeer()
    {

        require("view/add_beers.php");
    }

    public function addBeerProcess()
    {

        $db = new DbBeer();

        $id = $db->addBeer($_POST['nombre'], $_POST['estilo'], $_POST['descripcion'], $_POST['fecha_fabric'], $_POST['fecha_distrib'], $_POST['consumo_pref'], $_POST['alcohol'], $_POST['temp_guardado'], $_POST['ibus'], $_FILES['img_tapon']['name'], $_FILES['img_botella']['name'], $_FILES['detalles']['name']);

        if (isset($_FILES['img_tapon'])) {
            $this->subeImg($_FILES['img_tapon'], $id, 'tapones');
        }

        if (isset($_FILES['img_botella'])) {
            $this->subeImg($_FILES['img_botella'], $id, 'botellas');
        }

        if (isset($_FILES['detalles'])) {
            $this->subePdf($_FILES['detalles'], $id);
        }

        header("location: ../../../index.php/beers");
    }

    public function subeImg($img_file, $id, $tipo)
    {
        $location = "view/assets/img/$tipo/$id/";

        # create directory if not exists in upload/ directory
        if (!is_dir($location)) {
            mkdir($location);
        }

        $target_file = $location . basename($img_file["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $uploadOk = 1;

        // Check if file already exists
        if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }

        // Check file size
        // if ($img_file["size"] > 500000) {
        //     echo "Sorry, your file is too large.";
        //     $uploadOk = 0;
        // }

        // Allow certain file formats
        if (
            $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif"
        ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }

        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
            // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($img_file["tmp_name"], $target_file)) {
                echo "";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    }

    public function subePdf($file, $id)
    {

        $location = "view/assets/pdf/$id/";
        $tempName = $file['tmp_name'];
        $target_file = $location . basename($file["name"]);
        $uploadOk = 1;

        if (!is_dir($location)) {
            mkdir($location);
        }

        if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }

        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
            // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($tempName, $target_file)) {
                echo "";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    }

    public function descargaPdf($id)
    {

        $db = new dbBeer();
        $beer = $db->getBeerById($id);
        $file = $beer->getDetalles();

        $path = $_SERVER["DOCUMENT_ROOT"]."/ucb/dashboard/view/assets/pdf/$id/$file";

        header("Content-Type: application/octet-stream");


        header("Content-Disposition: attachment; filename=" . urlencode($path));
        header("Content-Type: application/download");
        header("Content-Description: File Transfer");
        header("Content-Length: " . filesize($path));

        flush();

        $fp = fopen($path, "r");
        while (!feof($fp)) {
            echo fread($fp, 65536);
            flush(); // This is essential for large downloads
        }

        fclose($fp);

        // header("Content-type: application/pdf");

        // header("Content-Length: " . filesize($path));

        // // Send the file to the browser.
        // readfile($path);

        // // header("location: ../../../index.php/beers/$id");

    }
}
