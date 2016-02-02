<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include 'Encryption.php';
$encrypt = new Encryption;

/*ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);*/
function die_with_error($error) {
    $ret = array(
        "status" => "Failed",
        "error" => $error
    );
    die(json_encode($ret));
}


function isJson($string) {
 json_decode($string);
 return (json_last_error() == JSON_ERROR_NONE);
}

function getHours($hours,$format=true){
  global $d;
  $operation_hours=$hours;

  if(isJson($operation_hours))
  {
    $hrs=json_decode($operation_hours,true);
  }
  else{
    $hrs=$operation_hours;
  }
  $h='';
  if(count($hrs)>0 && is_array($hrs))
  {
      foreach($d as $i=>$v){
          foreach($hrs as $index=>$val){
          if($v==$index)
          {
            if($val['status']=='Opened')
            {
              $t=explode(' ',$val['open']);
              if($t[1]=='1')
              {
                $val['open']=$t[0]." AM ";
              }
              else{
                $val['open']=$t[0]." PM ";
              }
              $t=explode(' ',$val['close']);
              if($t[1]=='1')
              {
                $val['close']=$t[0]." AM ";
              }
              else{
                $val['close']=$t[0]." PM ";
              }
              $hrs[$index]=$val['open'].'-'.$val['close'];
            }
            else
            {
              $hrs[$index]='Closed';
            }
          }
        }
      }
      $time=array_unique(array_values($hrs));
      $hours=array();
      foreach ($time as $i => $j) {
        foreach ($hrs as $k => $l) {
          if($j==$l)
          {
            $hours[$j][]=$k;
          }
        }
        $hours[$j]=implode(', ',$hours[$j]);
      }
      $h='';
      if($format)
      {
          foreach ($hours as $m => $n) {
              $h .=$n.' '.$m;
          }
          $h=ucwords($h);
      }
      else{
          $h=$hours;
      }
      return $h;
  }
  else{
      $h=$h=ucwords($operation_hours);;
      return $h;
  }
}

$hostname = 'localhost';
$username = 'root';
$password = 'f#i-*7w5rWY';
$dbname = 'map2';
$mysqli = mysqli_connect($hostname, $username, $password, $dbname);
/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

mysqli_set_charset($mysqli, "utf8");