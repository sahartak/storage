<?php
include 'Dt.php';
include 'functions.php';
$params=array('#organizationList','oTable');
$dt=new DT($params);
$dt->setAjax($_SERVER["REQUEST_URI"]);
$columns = array(
  array(
    'db'=>'first_name',
    'title'=>'First Name',
    'sFilter' => array(
      'type' => 'text'
    )
  ),
  array(
    'db'=>'last_name',
    'title'=>'Last Name'
  ),
  array(
    'db'=>'email',
    'title'=>'Email',
    'orderable' => false,
    'searchable'=>false
  ),
  array(
    'db'=>'office',
    'title'=>'Office'
  ),
  array(
    'db'=>'age',
    'title'=>'Age',
    'className'=>'right'
  ),
  array(
    'db'=>'salary',
    'title'=>'Salary',
    'className'=>'right',
    'formatter'=>null,
    'sql_name' => 'salary'
  )
);
if(isset($_REQUEST['draw'])) {
    $where="";
    $table = 'datatables_demo';
    $primaryKey = 'id';
    $from="datatables_demo";
    $join="";
    $groupBy="";
    echo json_encode($dt->paginate( $_POST, $from, $primaryKey, $columns, $join, $where,$groupBy ),JSON_UNESCAPED_UNICODE);
    //echo $dt->paginate($columns,$dt,$_POST);
    exit;
}
$dt=getDatableParams($dt,$columns);
$javascript=$dt->putJS();
$extJavascript=$dt->putExternalJS();

$html=$dt->getHtml('class="table"');    
?>
<html>
  <head>
    <title>Server-Side</title>
    <script src="http://code.jquery.com/jquery-2.1.1.min.js"></script>
    <link href="//cdn.datatables.net/1.10.3/css/jquery.dataTables.css" rel="stylesheet">
    <script src="//cdn.datatables.net/1.10.3/js/jquery.dataTables.js"></script>
    <script>
    $(document).ready(function() {
      <?php echo $javascript; ?>
    });
    <?php echo $extJavascript; ?>
    </script>
  </head>
  <body>

<?php echo $html;
