<?php

date_default_timezone_set("Europe/Bratislava");
$target_dir = "../files/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);

$fileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
$fileName = $target_dir .basename($_FILES["fileToUpload"]['name'],".".$fileType). time();

//rename
$rename = $_POST['renameFile'];

//rename file from input and add time_stamp
$newFileName = $target_dir . $_POST['renameFile']."-".time(). ".".$fileType;

if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"],  $newFileName )) {
    echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
} else {
    echo "Sorry, there was an error uploading your file.";
}


header("Location: index.php");


