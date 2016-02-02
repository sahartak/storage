<?php
require 'db-con.php';
if(isset($_POST['delete_location']))
{
	$store_id=$_POST['store_id'];
	$sql="DELETE FROM user_settings WHERE user_id=110011 AND store_id=$store_id";
	$rs=mysqli_query($mysqli, $sql);
	@header('location: users.php');
}
elseif(isset($_POST['store_id']))
{
	$store_id=$_POST['store_id'];
	$sql="UPDATE user_settings SET status=0 WHERE user_id=110011";
	$rs=mysqli_query($mysqli, $sql);

	$sql="UPDATE user_settings SET status=1 WHERE user_id=110011 AND store_id=$store_id";
	$rs=mysqli_query($mysqli, $sql);
	@header('location: users.php');
}

$sql="SELECT * FROM user_settings WHERE user_id=110011 GROUP BY user_id,store_id ORDER BY status DESC, added_date DESC";
$rs=mysqli_query($mysqli, $sql);
$result_array=array();
while ($row = mysqli_fetch_assoc($rs)) {
    array_push($result_array, $row);
}