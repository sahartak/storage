<?php
require 'db-con.php';
$lati='';
/*if($bounds[0]<$bounds[2])
{
  $lati=" lat BETWEEN $bounds[0] AND $bounds[2] ";
}
else{
  $lati=" lat BETWEEN $bounds[2] AND $bounds[0] ";
}
if($bounds[1]<$bounds[3])
{
  $long=" lng BETWEEN $bounds[1] AND $bounds[3] ";
}
else{
  $long=" lng BETWEEN $bounds[3] AND $bounds[1] ";
}*/
$bounds=explode(",", $_GET['bounds']);
$lat = $bounds[0]-($bounds[0]-$bounds[2])/2;
$lng = $bounds[1]-($bounds[1]-$bounds[3])/2;
$interval=10;
$query = sprintf("SELECT *,
               ( 3959 * acos(
               cos(radians(%s)) * cosRadLat *
               cos(radLon - radians(%s)) +
               sin(radians(%s)) * sinRadLat
               ) ) AS distance,status
               FROM `data_mcdonalds2`
               HAVING distance < 500
               ORDER BY distance LIMIT 0,100 ",
    mysqli_real_escape_string($mysqli, $lat),
    mysqli_real_escape_string($mysqli, $lng),
    mysqli_real_escape_string($mysqli, $lat));

$result = mysqli_query($mysqli, $query);
if (! $result)
    die_with_error(mysqli_error($result));
$result_array = array();
$totalRows=mysqli_num_rows($result);
$totalPages=floor($totalRows/$interval);
$t=$totalRows/$interval;
if($totalPages!=$t)
{
  $totalPages=$totalPages+1;
}
$i=0;
while ($row = mysqli_fetch_assoc($result)) {
    array_push($result_array, array(
        "id" => $row['id'],
        "lat" => $row['lat'],
        "lng" => $row['lng'],
        /*"address" => $row['address'],*/
        "distance" => round($row['distance'], 2)
    ));
}
$paginatedArray=array();
for ($i=0; $i < $totalPages; $i++) { 
  $paginatedArray[]=array_slice($result_array,$i*$interval,$interval);
}
$ret = array(
    "status" => "OK",
    "data" => $result_array);
die(json_encode($ret));
