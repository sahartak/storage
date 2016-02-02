<?php 
require('DataTable.php');

/**
* 
*/
class DT extends DataTable
{
	//public $dt;
	function __construct($params)
	{
		$tableIdentifier= isset($params[0])?$params[0]:null;
		$tableName= isset($params[1])?$params[1]:null;
		parent::__construct($tableIdentifier,$tableName);
	}
}