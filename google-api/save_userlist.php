<?php require 'db-con.php';

	if(isset($_POST['data']))
	{

		$data=$_POST['data'];
		$user_id='';
		foreach($data as $key=>$value)
		{
			if(isset($value['user_id']))
			{
				$user_id=$value['user_id'];				
			}
			if(isset($value['store_id']))
			{
				$store_id=$value['store_id'];
				if($value['order'])
				{
					$order=$value['order'];
					$store_id=$encrypt->decode($store_id);
					$sql="UPDATE user_location SET `order`=$order WHERE store_id=$store_id AND user_id=$user_id;";					

					$rs=mysqli_query($mysqli,$sql) or die(mysqli_error($mysqli));
                    if($rs)
                    {
                        echo mysqli_affected_rows($mysqli).'<br>';
                    }
				}
					
					
			}
		}
	}
	elseif(isset($_POST['add_list']))
	{
		$user_id=$_POST['add_list'][0]['user_id'];

		$store_id=$_POST['add_list'][0]['store_id'];
		$store_id=$encrypt->decode($store_id);
		$sql="SELECT COUNT(*) as row FROM user_location WHERE store_id=$store_id AND user_id=$user_id";
		$rs=mysqli_query($mysqli,$sql);
		$row=mysqli_fetch_assoc($rs);
		if($row['row']==0)
		{
			$sql="SELECT MAX(`order`)+1 as row FROM user_location WHERE user_id=$user_id";
			$rs=mysqli_query($mysqli,$sql);
			$row=mysqli_fetch_assoc($rs);
			$order=$row['row'];
			if(!$order)
				$order=1;
			$sql="INSERT INTO user_location(user_id,store_id,`order`) VALUES($user_id,$store_id,$order)";
			$rs=mysqli_query($mysqli,$sql);
			$id=mysqli_insert_id($mysqli);
			$sql="SELECT * FROM  data_mcdonalds2 WHERE id=$store_id";
			$rs=mysqli_query($mysqli,$sql);
			$row=mysqli_fetch_assoc($rs);
			foreach($row as $key=>$value)
	        {
	            if($key=='id')
	            {
	                $row[$key]=$encrypt->encode($value);
	            }
	        }
	        $row['address']=$row['street1'].', '.$row['street2'].', '.$row['city'].', '.$row['region'].', '.$row['country'].', '.$row['postalcode'];	        
			echo json_encode(array('success'=>'Store added in User','user_data'=>$row));
		}
		else{
			echo json_encode(array('error'=>'ID already Exists'));
		}
	}
	else{
		echo json_encode(array('error'=>'Store ID is not passed'));
	}
	


?>