<?php
require 'db-con.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$days = array(
    '1' => 'mon',
    'tue',
    'wed',
    'thu',
    'fri',
    'sat',
    'sun'
);
$i    = 0;
if (isset($_POST)) {
    $data            = $_POST;
    $operation_hours = array();
    $status=0;
    foreach ($days as $key => $value) {
        foreach ($data as $keys => $values) {
            if (strpos($keys, $value) !== false && !isset($operation_hours[$value])) {
                $status=1;
                $operation_hours[$value] = '';

                $open_time               = $data['open_h_' . $value];
                $close_time              = $data['close_h_' . $value];                
                $a                       = $data['open_' . $value . '_ampm'];
                $b                       = $data['close_' . $value . '_ampm'];
                if(isset($data['break_start_' . $value . '_ampm']))
                {
                    $break_start_time        = $data['break_start_h_' . $value];
                    $break_end_time          = $data['break_end_h_' . $value];
                    $c                       = $data['break_start_' . $value . '_ampm'];
                    $d                       = $data['break_end_' . $value . '_ampm'];
                }
                else
                {
                    $break_start_time        = null;
                    $break_end_time          = null;
                    $c                       = 0;
                    $d                       = 0;
                }
                if ($a == 2) {
                    $open_time = $open + 12;
                    if ($open_time >= 24) {
                        $open_time = 23;
                    }
                }
                if ($b == 2) {
                    $close_time = $close_time + 12;
                    if ($close_time >= 24) {
                        $close_time = 23;
                    }
                }
                if($break_start_time!=null)
                {
                    if ($c == 2) {
                        $break_start_time = $break_start_time + 12;
                        $break_end_time   = $break_end_time + 12;
                        if ($break_start_time >= 24) {
                            $break_start_time = 23;
                        }
                        if ($break_end_time >= 24) {
                            $break_end_time = 23;
                        }
                    }
                }
                    
                for ($time = 0; $time < 24; $time++) {
                    if ($time < $open_time) {
                        $operation_hours[$value] .= '0';
                    } elseif ($time > $close_time) {
                        $operation_hours[$value] .= '0';
                    } elseif ($time >= $break_start_time && $time < $break_end_time) {
                        $operation_hours[$value] .= '0';
                    } else {
                        $operation_hours[$value] .= '1';
                    }
                }
                
                break;
                
                
            } else {
                $operation_hours[$value] = 'closed';
            }
        }
    }
} else {
    exit;
}
$jsonHours=array();
foreach($operation_hours as $index=>$value)
{
    $open_time=null;
    $close_time=null;
    $break_start=null;
    $break_end=null;
    foreach($data as $key=>$row)
    {
        if(strpos($key, $index)!==false)
        {
            if(isset($data['open_h_' . $index]) && isset($data['open_m_' . $index]) && isset($data['open_' . $index . '_ampm']))
            {
                $open_time               = $data['open_h_' . $index].":".$data['open_m_' . $index]." ".$data['open_' . $index . '_ampm'];
            }                
            
            if(isset($data['close_h_' . $index]) && isset($data['close_m_' . $index]) && isset($data['close_' . $index . '_ampm']))
            {
                $close_time               = $data['close_h_' . $index].":".$data['close_m_' . $index]." ".$data['close_' . $index . '_ampm'];
            }
            
            if(isset($data['break_start_' . $index . '_ampm']) && isset($data['break_end_' . $index . '_ampm']))
            {
                $break_start             = $data['break_start_h_' . $index].":".$data['break_start_m_' . $index]." ".$data['break_start_' . $index . '_ampm'];
                $break_end               = $data['break_end_h_' . $index].":".$data['break_end_m_' . $index]." ".$data['break_end_' . $index . '_ampm'];
            }    
            $jsonHours[$index]['open']=$open_time;
            $jsonHours[$index]['close']=$close_time;
            $jsonHours[$index]['break_start']=$break_start;
            $jsonHours[$index]['break_end']=$break_end;
            $jsonHours[$index]['status']='Opened';
        }
        else{
            if(!isset($jsonHours[$index]))
            {
                $jsonHours[$index]['status']='Closed';
            }
            
        }  
    }
}
foreach ($days as $key => $value) {
    foreach ($data as $keys => $values) {
        if (strpos($keys, $value) !== false) {
            unset($data[$keys]);
        }
    }
}
$jsonHours=json_encode($jsonHours);
$dt=array();
$dt['operation_hours']=$jsonHours;
$data = array_merge($data, $operation_hours);
$data = array_merge($data, $dt);

$data['status'] = 2;
$id             = '';
//$data['formatted_address']=$data['street1'].', '.$data['street2'].', '.$data['city'].', '.$data['state'].', '.$data['country'].', '.$data['postalcode'];
if (isset($data['id']) && $data['id'] != '') {
    $id = $data['id'];
    $id = $encrypt->decode($id);
    unset($data['id']);
    $user_id = '110011';
    //$data['user_id']='110011';
    $values  = array();
    foreach ($data as $key => $value) {
        if (!is_numeric($value)) {
            $values[$key] = $key . "='" . $value . "'";
        } else {
            $values[$key] = $key . "=" . $value . "";
        }
    }
    $values = implode(', ', $values);
    $sql2   = "UPDATE store_info SET $values WHERE id=$id";
    $rs     = mysqli_query($mysqli, $sql2);
} else {
    //$data['user_id']='110011';
    $user_id = '110011';
    unset($data['id']);
    $fields = implode(',', array_keys($data));
    $values = array_values($data);
    foreach ($values as $key => $value) {
        if (!is_numeric($value)) {
            $values[$key] = "'" . $value . "'";
        }
    }
    $values   = implode(',', $values);
    $sql2     = "INSERT INTO store_info($fields) VALUES($values) ";
    $rs       = mysqli_query($mysqli, $sql2);
    $id       = mysqli_insert_id($mysqli);
    $store_id = $id;
    
    $sql = "SELECT MAX(`order`)+1 as row FROM user_location WHERE user_id=$user_id";
    $rs  = mysqli_query($mysqli, $sql);
    if ($rs) {
        $row   = mysqli_fetch_assoc($rs);
        $order = $row['row'];
        $sql   = "INSERT INTO user_location(user_id,store_id,`order`) VALUES($user_id,$store_id,$order)";
        $rs    = mysqli_query($mysqli, $sql);
    }
    
}
$records = array();
if ($id != '') {
    
    
    $id = ' WHERE id=' . $id;
} else {
    $id = '';
}

$sql = "SELECT * FROM store_info $id ORDER BY id desc LIMIT 1";
$rs  = mysqli_query($mysqli, $sql);

if ($rs) {
    while ($row = mysqli_fetch_assoc($rs)) {
        foreach ($row as $key => $value) {
            if ($key == 'id') {
                $row[$key] = $encrypt->encode($value);
            }
        }
        $records[] = $row;
    }
}
if (count($records) > 0) {
    $records = $records[0];
}
$formatted                    = $records['street1'] . ', ' . $records['street2'] . ', ' . $records['city'] . ', ' . $records['region'] . ', ' . $records['country'] . ', ' . $records['postalcode'];
$records['formatted_address'] = $formatted;
echo json_encode($records);