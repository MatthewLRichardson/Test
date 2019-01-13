<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class fileupload extends Model
{
    

$target_dir = "images/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}

if (file_exists($target_file)) {
  echo "Sorry, file already exists.";
  $uploadOk = 0;
}

if ($_FILES["fileToUpload"]["size"] > 500000) {
  echo "Sorry, your file is too large.";
  $uploadOk = 0;
}

if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
$uploadOk = 0;
}

if ($uploadOk == 0) {
echo "Sorry, your file was not uploaded.";

} else {
if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    // echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    header('location:index.php');
} else {
    echo "Sorry, there was an error uploading your file.";
}
}


if(isset($_POST['submit']) )
{
  $xml = new DOMDocument("1.0", "UTF-8");
  $xml ->load("database.php");

  $rootTag = $xml->getElementsByTagName("programmeList")->item(0);

  $dataTag = $xml ->createElement("programme");

  $nameTag = $xml->createElement("name", $_POST['name']);
  $descriptionTag = $xml->createElement("description", $_POST['description']);
  $moodTag = $xml->createElement("mood", $_POST['mood']);

  $dataTag->appendChild($nameTag);
  $dataTag->appendChild($descriptionTag);
  $dataTag->appendChild($moodTag);

  $rootTag->appendChild($dataTag);

  $xml->save("database.php");

}
}
