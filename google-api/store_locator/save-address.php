<?php
require 'db-con.php';
$days=array('sun'=>'Sunday','mon'=>'Monday','tue'=>'Tuesday','wed'=>'Wednesday','thu'=>'Thursday','fri'=>'Friday','sat'=>'Saturday');
$operating_time=array();
if(isset($_POST))
{
  $data=$_POST;
  foreach($days as $short=>$long)
  {
    $checkDay=0;
    foreach($data as $key=>$value)
    {
      if(strpos($key, $long)!==false)
      {
        
        if($checkDay==0)
        {
          $operating_time[$short]=array('start'=>$data[$long.'FromH'].$data[$long.'FromM'].' '.$data[$long.'FromAP'],
                                          'end'=>$data[$long.'ToH'].$data[$long.'ToM'].' '.$data[$long.'ToAP'],
                                          'status'=>'opened',
                                          'formatted_time'=>$data[$long.'FromH'].$data[$long.'FromM'].' '.$data[$long.'FromAP'].' - '.$data[$long.'ToH'].$data[$long.'ToM'].' '.$data[$long.'ToAP']);
          unset($data[$long.'FromH']);
          unset($data[$long.'FromM']);
          unset($data[$long.'FromAP']);
          unset($data[$long.'ToH']);
          unset($data[$long.'ToM']);
          unset($data[$long.'ToAP']);
        }
          
        $checkDay=1;
      }
    }
    if(!$checkDay)
    {
      $operating_time[$short]=array('status'=>'closed');
    }
  }
}

$formatted_days=array();
foreach ($operating_time as $key => $value) {
  if($value['status']=='opened')
  {
    $for=$value['formatted_time'];
    if(isset($formatted_days[$for]))
    {
      $formatted_days[$for][]=$key;
    }
    else
    {
      $formatted_days[$for]=array();
      $formatted_days[$for][]=$key;
    }
  }
  else
  {
    $formatted_days['closed'][]=$key;
  }
}
ksort($formatted_days);
$result=array();
foreach ($formatted_days as $key => $value) {
  $result[]=implode(', ',array_values($value)).' '.$key;
}
$result=implode(', ',$result);
$data['operation_time']=$result;
if(isset($data['closed']))
{
  unset($data['closed']);
}
$data['status']='Pending';
$fields=implode(',',array_keys($data));
$values=array_values($data);
foreach ($values as $key => $value) {
  if(!is_numeric($value))
  {
    $values[$key]="'".$value."'";
  }
}
$values=implode(',',$values);
$sql="INSERT INTO store_info($fields) VALUES($values) ";
$rs=mysqli_query($mysqli, $sql);
