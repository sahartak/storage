<?php
require 'db-con.php';
$id=isset($_GET['id'])?$_GET['id']:'';
if($id!='')
{
  $query = "SELECT store_name,store_pic,operation_hours,concat(address,', ',city,', ',region) as address, city, region,status, postalcode, address as staddress,country
                 FROM `data_mcdonalds2`
                 WHERE id='$id' LIMIT 1 ";
  $result = mysqli_query($mysqli, $query);
  if (! $result)
      die_with_error(mysqli_error($result));
  $result_array='';
  while ($row = mysqli_fetch_assoc($result)) {
      $result_array=$row;
  }
  $ret = array(
      "status" => "OK",
      "data" => $result_array);
  die(json_encode($ret));
}
  
