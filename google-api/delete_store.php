<?php

?>
<?php require 'db-con.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$records=array();
if(isset($_GET['id']))
{
    $id=$_GET['id'];
    $id=$encrypt->decode($id);
    $sql="DELETE FROM user_location WHERE store_id='$id'";
    $rs=mysqli_query($mysqli,$sql);
    @header('location: suggest-locations.php');
}
