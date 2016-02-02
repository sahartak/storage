<?php
require 'db-con.php';
$d = array('1' => 'mon','tue','wed','thu','fri','sat','sun');
$id=isset($_GET['id'])?$_GET['id']:'';
if($id!='')
{
  $id=$encrypt->decode($id);
  $query = "SELECT store_name,store_pic,operation_hours,concat(address,', ',city,', ',region) as address, city,status, region, postalcode, address as staddress,country
                 FROM `data_mcdonalds2`
                 WHERE id='$id' LIMIT 1 ";
  //echo $query;
  $result = mysqli_query($mysqli, $query);
  if (! $result)
      die_with_error(mysqli_error($result));
  $result_array='';
  while ($row = mysqli_fetch_assoc($result)) {
      foreach($row as $key=>$value)
      {
          if($key=='id')
          {
              $row[$key]=$encrypt->encode($value);
          }
      }
      $operation_hours=$row['operation_hours'];
      
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
                    $val['open']=$t[0]." AM";
                  }
                  else{
                    $val['open']=$t[0]." PM";
                  }
                  $t=explode(' ',$val['close']);
                  if($t[1]=='1')
                  {
                    $val['close']=$t[0]." AM";
                  }
                  else{
                    $val['close']=$t[0]." PM";
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
          foreach ($hours as $m => $n) {
            $h .=$n.' '.$m;
          }
          $row['operation_hours']=$h;

          
      }

      $result_array=$row;
  }
  $ret = array(
      "status" => "OK",
      "data" => $result_array);
  die(json_encode($ret));
}
  
