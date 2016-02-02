<?php 
	$days=array('1'=>'mon', 'tue', 'wed', 'thu', 'fri', 'sat', 'sun');
	if(isset($_POST))
	{
		$data=$_POST;
		$operation_hours=array();
		foreach($days as $key=>$value)
		{
			$operation_hours=array();
			foreach($data as $keys=>$values)
			{
				if(strpos($keys, $value)!==false)
      			{
      				$operation_hours[$value]='';
      				$open_time=$data['open_h_'.$value];
      				$close_time=$data['close_h_'.$value];
      				$break_start_time=$data['break_start_h_'.$value];
      				$break_end_time=$data['break_end_h_'.$value];
      				$a=$data['open_'.$value.'_ampm'];
      				$b=$data['close_'.$value.'_ampm'];
      				$c=$data['break_start_'.$value.'_ampm'];
      				$d=$data['break_end_'.$value.'_ampm'];
      				if($a==2)
      				{
      					$open_time=$open+12;
      					if($open_time>=24)
      					{
      						$open_time=23;
      					}
      				}
      				if($b==2)
      				{
      					$close_time=$close_time+12;
      					if($close_time>=24)
      					{
      						$close_time=23;
      					}
      				}

      				if($c==2)
      				{
      					$break_start_time=$break_start_time+12;
      					$break_end_time=$break_end_time+12;
      					if($break_start_time>=24)
      					{
      						$break_start_time=23;
      					}
      					if($break_end_time>=24)
      					{
      						$break_end_time=23;
      					}
      				}
      				for($time=0;$time<24;$time++)    				
      				{      					
      					if($time<$open_time)
      					{
      						$operation_hours[$value] .='0';
      					}
      					elseif($time>$close_time)
      					{
      						$operation_hours[$value] .='0';
      					}
      					elseif($time>=$break_start_time && $time<$break_end_time)
      					{
      						$operation_hours[$value] .='0';
      					}
      					else{
      						$operation_hours[$value] .='1';
      					}
      				}
      				break;
      			}
      			else{
      				$operation_hours[$value]='closed';
      			}
			}
		}
	}
?>