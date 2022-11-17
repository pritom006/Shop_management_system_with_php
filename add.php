<?php 
include 'db.php';

if(isset($_POST['send'])){
    $name = $_POST['employee'];
    $phone = $_POST['phone'];

    if($_FILES["image"]["error"] === 4) {
        echo
        "<script>alert('Image Does Not Exists');</script>";
    }
    else {
        $fileName = $_FILES["image"]["name"];
        $fileSize = $_FILES["image"]["size"];
        $tmpName = $_FILES["image"]["tmp_name"];
        $validImageExtension = ['jpg', 'jpeg', 'png'];
        $imageExtension = explode('.', $fileName);
        $imageExtension = strtolower(end($imageExtension));
        if(!in_array($imageExtension, $validImageExtension)) {
            echo
            "<script>alert('Invalid Image Extension');</script>";
        }
        else if($fileSize > 1000000) {
            echo
            "<script>alert('Image Size Is Too Large');</script>";
        }
        else {
            $newImageName = uniqid();
            $newImageName = '.' . $imageExtension;
            move_uploaded_file($tmpName, 'img/' . $newImageName);
            $sql = "insert into employees (name, image, phone) values ('$name', '$newImageName', '$phone')";   
            $val = $db->query($sql);
            if($val) {
                // echo "<h1>Successfully inserted</h1>";
                "<script>
                    alert('Succesfully Added');
                </script>";
                header('location: index.php');
             }
        }
    }   
}
?>