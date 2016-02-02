<?php
require 'db-con.php';
$d = array('1' => 'mon','tue','wed','thu','fri','sat','sun');
if(isset($_GET['store_id']))
{
	$store_id=$_GET['store_id'];
	$store_id=$encrypt->decode($store_id);
	$sql="DELETE FROM user_settings WHERE user_id=110011 AND store_id=$store_id";
	$rs=mysqli_query($mysqli, $sql);
	@header('location: store-locations.php');
}
elseif(isset($_POST['store_id']))
{
	$store_id=$_POST['store_id'];
	$store_id=$encrypt->decode($store_id);
	$sql="UPDATE user_settings SET is_primary=0 WHERE user_id=110011";
	$rs=mysqli_query($mysqli, $sql);

	$sql="UPDATE user_settings SET is_primary=1 WHERE user_id=110011 AND store_id=$store_id";
	$rs=mysqli_query($mysqli, $sql);
	@header('location: store-locations.php');
}
$sql="SELECT data_mcdonalds2.*,user_settings.`order`,user_settings.`store_id`,user_settings.`is_primary` FROM user_settings INNER JOIN data_mcdonalds2 ON data_mcdonalds2.id=user_settings.store_id ORDER BY user_settings.is_primary DESC, user_settings.`order`";
//echo $sql;exit;
$rs=mysqli_query($mysqli,$sql);
$result_array=array();
if($rs)
{
    while($row=mysqli_fetch_assoc($rs))
    {
        foreach($row as $key=>$value)
        {
            if($key=='store_id')
            {
                $row[$key]=$encrypt->encode($value);
            }
        }
        $operation_hours=isset($row['operation_hours'])?$row['operation_hours']:'';
	    $h=getHours($operation_hours);
	    $row['hours']=$h;
        $row['address']=$row['street1'].', '.$row['street2'].'<br> '.$row['city'].', '.$row['region'].'<br> '.$row['country'].'<br> '.$row['postalcode'];
        $result_array[]=$row;
    }
}