<?php
require 'db-con.php';
if(isset($_REQUEST['store_id']) && $_REQUEST['store_id']!='')
{
  $store_id=$_REQUEST['store_id'];
  $store_id = $encrypt->decode($store_id);
  $store_name=$_REQUEST['store_name'];
  $address=$_REQUEST['address'];
  $city=$_REQUEST['city'];
  $region=$_REQUEST['region'];
  $postalcode=$_REQUEST['postal_code'];
  $default=isset($_REQUEST['default'])?$_REQUEST['default']:'';
  $sql="SELECT * FROM user_settings WHERE store_id=$store_id";
  $rs=mysqli_query($mysqli, $sql);
  if(mysqli_num_rows($rs)>0)
  {
    echo json_encode(array('error'=>'Store Already Exists'));exit;
  }
  else
  {
    $query="INSERT INTO user_settings(user_id,store_id) VALUES(110011,$store_id)";
    
  }
  $result = mysqli_query($mysqli, $query);
  echo json_encode(array('success'=>'Store registered!'));
    if (! $result)
        die(mysqli_error($result));
}
