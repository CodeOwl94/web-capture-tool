<?php
$target_dir = "../../../../uploads/";
//$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);

$uploadOk = 1;
//$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) { //tmp_name is just the temporary name of the uploaded fioe for PHP
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>