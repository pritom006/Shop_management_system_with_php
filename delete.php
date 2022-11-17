<?php 
include 'db.php'; 
$id = $_GET['id'];

$sql = "delete from employees where id='$id'";

$del_val = $db->query($sql);

if($del_val){
    header('location: index.php');
};


?>