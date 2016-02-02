<?php
include 'Encryption.php';
$encrypt = new Encryption;
$d = array('1' => 'mon','tue','wed','thu','fri','sat','sun');
function getDatableParams($dt, $columns)
{
	$language = array(
		//'emptyTable' => '',
		'info' => '_START_ to _END_ of _TOTAL_ records',
		'infoEmpty' => '',
		'infoFiltered' => '',
		'infoPostFix' => '',
		'thousands' => ' ',
		'lengthMenu' => '_MENU_ ',
		'loadingRecords' => 'Chargement en cours...',
		/*'processing' => '<span style="color: #0072BC;">Loading...</span>',*/
		'processing' => 'Loading Data...',
		'zeroRecords' => 'No Matching Records Found',
		/*'paginate' => array(
            //'first'   =>'|<',
            'first'   =>'<i class="fa fa-angle-double-left"></i>',
            'last'    =>'<i class="fa fa-angle-double-right"></i>',
            'next'    =>'<i class="fa fa-angle-right"></i>',
            'previous'=>'<i class="fa fa-angle-left"></i>'
        )*//*,
			'aria' => array(
			    'sortAscending'  => ': activer pour trier la colonne par ordre croissant',
			    'sortDescending' => ': activer pour trier la colonne par ordre décroissant'
			)*/
	);
	$dt->setColumnAttributes($columns);
	$dt->setOrder(array(array(2,'desc')));
	$dt->setPage(10,"ellipses");
	//$dt->setPage(10,"full_numbers");
	//$dt->setExport(true,$columns);
	$dt->setPagingGroup(true,10,true);
	//$dt->setMultiFilters(true,null);
	$dt->JSParams["bLengthChange"]=true;
	$dt->JSParams["sDom"]='<"top"tlip<"clear">>rt<"bottom"ip<"clear">>';
	//$dt->JSParams["bFilter"]=false;
	$dt->JSParams["language"]=$language;
	return $dt;
}

function isJson($string) {
	json_decode($string);
	return (json_last_error() == JSON_ERROR_NONE);
}

function getHours($hours, $format=true){
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
					$index=ucwords($index);
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
?>