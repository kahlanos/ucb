<?php

class newsController {

    public function news()
    {
        require("view/list_news.php");
    }

    public function loadNews()
    {
        $db = new DbNews();
        $res = $db->getNews();

        return $res;
    }

    public function addNews()
    {

        require("view/add_news.php");
    }

    public function addNewsProcess()
    {

        $db = new dbNews();

        $id = $db->addNews($_POST['title'], $_POST['text'], $_FILES['img']['name'], $_POST['date']);

        if (isset($_FILES['img'])) {
            $this->subeImg($_FILES['img'], $id);
        }

        header("location: ../../../index.php/news");
    }

    public function fichaNews($id)
    {

        $db = new dbNews();
        $res = $db->getNewsById($id);

        require("view/ficha_news.php");
    }

    public function editNews($id)
    {

        $db = new dbNews();

        $db->editNews($id, $_POST['title'], $_POST['text'], $_FILES['img']['name'], $_POST['date']);


        if (isset($_FILES['img'])) {
            $this->subeImg($_FILES['img'], $id);
        }


        header("location: ../../../index.php/news");
    }

    public function deleteNews($id)
    {
        $db = new dbNews();
        $db->deleteNews($id);

        header("location: ../../index.php/news");
    }



    public function subeImg($img_file, $id)
    {
        $location = "view/assets/img/news/$id/";

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

}