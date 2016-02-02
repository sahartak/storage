<?php
require 'db-con.php';
if(isset($_REQUEST['store_id']) && $_REQUEST['store_id']!='')
{
  $store_id=$_REQUEST['store_id'];
  $store_name=$_REQUEST['store_name'];
  $address=$_REQUEST['address'];
  $city=$_REQUEST['city'];
  $region=$_REQUEST['region'];
  $postalcode=$_REQUEST['postal_code'];
  $default=isset($_REQUEST['default'])?$_REQUEST['default']:'';
  $sql="SELECT * FROM user_settings WHERE store_id=$store_id";
  $rs=mysqli_query($mysqli, $query);
  if(mysqli_num_rows($rs)>0)
  {
    if($default!='')
    {
      $query="UPDATE user_settings SET status=1 WHERE store_id=$store_id";
    }    
  }
  else
  {
    $query="INSERT INTO user_settings(user_id,store_id, store_name, address, city, region, postal_code) VALUES(110011,$store_id,'$store_name','$address','$city','$region','$postalcode')";
    
  }
  $result = mysqli_query($mysqli, $query);
    if (! $result)
        die(mysqli_error($result));
}
