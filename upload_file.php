<?php
session_start();
require "cnx.php";

?>
<?php

$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fichier"]["name"]);
$uploadOk = 1;
$imageFileType = $_FILES["fichier"]["type"];
// Check if image file is a actual image or fake image
/*if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fichier"]["tmp_name"]);
    if($check !== false) {
        echo '{"msg":"Le fichier est une image - " . $check["mime"] . "."}';
        $uploadOk = 1;
    } else {
        echo "Ce fichier n'est pas une image.";
        $uploadOk = 0;
    }
}*/
// Check if file already exists
if (file_exists($target_file)) {
    echo '{"msg":"Ce fichier exist déja, veuillez le renomé SVP.", "success":false}';
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fichier"]["size"] > 1000000) {
    //echo "Désolé, ce fichier est trop grand.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "image/jpg" && $imageFileType != "image/png" && $imageFileType != "image/jpeg") {
    echo '{"msg":"Désolé, seulement les images de format png, jpeg, jpg sont autorisées.", "success":false}';
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    //echo "Désolé, votre fichier n'était pas téléchargé.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fichier"]["tmp_name"], $target_file)) {
        $nvannonce=$_SESSION['annoce_pr'];

        //count(basename($_FILES["fichier"]["name"])
        //strlen(basename($_FILES["fichier"]["name"])
        for ($i=0 ; $i < count($_FILES) ; $i++) {

            $filename=basename($_FILES["fichier"]["name"]);
             $sql="insert into photos(id_annonce,photo) values($nvannonce,'$filename')";
            $result=mysqli_query($success,$sql)or die('erreur de sql'.$sql.'<br>'.mysqli_error($success));
        }


        echo '{"msg":"le fichier '. basename($_FILES["fichier"]["name"]).' était bien téléchargé.", "success":true}';
    } else {
        echo '{"msg":"Désolé, une erreur s\'est produite lors du téléchargement.", "success":false}';
    }
}

?>
