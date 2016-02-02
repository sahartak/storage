<?php require 'db-con.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$records=array();
if(isset($_GET['id']))
{
    $id=$_GET['id'];
    $id=$encrypt->decode($id);
    $sql="SELECT * FROM store_info WHERE id='$id'";
    $rs=mysqli_query($mysqli,$sql);

    if($rs)
    {
        while($row=mysqli_fetch_assoc($rs))
        {
            foreach($row as $key=>$value)
            {
                if($key=='id')
                {
                    $row[$key]=$encrypt->encode($value);
                }
            }
            $records[]=$row;
        }
    }
    else
    {
        $msg='Error';
    }
    if(count($records)>0)
    {
        $records=$records[0];
    }
    if(isset($records['street1']))
    {
        $formatted=$records['street1'].', '.$records['street2'].', '.$records['city'].', '.$records['region'].', '.$records['country'].', '.$records['postalcode'];
        $records['formatted_address']=$formatted;
        
    }
    
}
echo '<script> var json_record='.json_encode($records).';</script>';
