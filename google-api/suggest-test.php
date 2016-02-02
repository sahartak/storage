<?php
include 'Dt.php';
include 'functions.php';
$userid='110011';
$params=array('#sort1','oTable');
$dt=new DT($params);
$dt->setAjax($_SERVER["REQUEST_URI"]);
$columns = array(
  array( 
  'visible'=>true,
  'db' => 'store_info.id',
  "title"=>"ID",
    'formatter' => function($d, $row,$r){
      global $encrypt;
      $t=$encrypt->encode($d);
      return '<input type="hidden" id="'.$t.'" /><span class="arrow arrow-up1"><i class="fa fa-arrow-up"></i></span><span class="row-no">'.$d.'</span><span class="arrow arrow-down1"><i class="fa fa-arrow-down"></i></span>';
    }
  ),
  array('db'=>'store_info.store_name','visible'=>false),
  array('db'=>'user_location.order','visible'=>false),
  array('db'=>'store_info.street1','visible'=>false),
  array('db'=>'store_info.street2' ,'visible'=>false),
  array('db'=>'store_info.city','visible'=>false),
  array('db'=>'store_info.region' ,'visible'=>false),
  array('db'=>'store_info.country' ,'visible'=>false),
  array('db'=>'store_info.postalcode','visible'=>false),
  array('db'=>'store_info.address','title'=>'Address','visible'=>true,
    'formatter' => function( $d, $row ) {
        return '<h4>'.$row['store_name'].'</h4>'.$row['street1'].', '.$row['street2'].'<br> '.$row['city'].', '.$row['region'].'<br> '.$row['country'].'<br> '.$row['postalcode'];
    }
  ),
  array('db'=>'store_info.status','title'=>'Status','visible'=>true),
  array('db'=>'store_info.operation_hours','title'=>'Hours','visible'=>true,
    'formatter' => function( $d, $row ) {
        return getHours($d);
    }
  ),
  array('db'=>'store_info.id','title'=>'Action','visible'=>true,
    'formatter' => function( $d, $row ) {
      global $encrypt;
        return '<a href="add-store.php?id='.$encrypt->encode($d).'" class="edit" rel="'.$encrypt->encode($d).'">Edit</a> 
        <a href="#" class="delete" rel="'.$encrypt->encode($d).'">Delete</a>';
    }
  ),
);
if(isset($_REQUEST['draw'])) {
    /*$sql="SELECT store_info.*,user_location.`order` FROM user_location INNER JOIN store_info ON store_info.id=user_location.store_id ORDER BY user_location.`order`";*/
    $where="";
    $table = 'store_info';
    $primaryKey = 'store_info.id';
    $from="store_info";
    $join=" INNER JOIN user_location ON store_info.id=user_location.store_id";
    //$where="wi_individual_g.ind_deleted=0";
    $groupBy="";
    /*$table = 'store_info';
    $primaryKey = 'id';
    $from="store_info";
    $join="";
    $groupBy="";*/
    echo json_encode($dt->paginate( $_POST, $from, $primaryKey, $columns, $join, $where,$groupBy ),JSON_UNESCAPED_UNICODE);
    //echo $dt->paginate($columns,$dt,$_POST);
    exit;
}
$dt=getDatableParams($dt,$columns);
$javascript=$dt->putJS();
$extJavascript=$dt->putExternalJS();

$html=$dt->getHtml('class="table"');    
?>
<?php require_once 'inc/header.php'; ?>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDef4rRaE0L456ZEJGpTYHKAFKDSqjMEa8&signed_in=true&libraries=places"></script>
<div class="clearfix"> </div>
<div class="page-container">
    <div class="page-content-wrapper">
        <div class="page-head">
            <div class="container">
                <div class="page-title">
                    <h1>Dashboard
                        <small>dashboard &amp; statistics</small>
                    </h1>
                </div>
            </div>
        </div>
        <div class="page-content">
            <div class="container">
                <ul class="page-breadcrumb breadcrumb">
                    <li>
                        <a href="index.html">Home</a>
                        <i class="fa fa-circle"></i>
                    </li>
                    <li>
                        <span>Dashboard</span>
                    </li>
                </ul>
                <div class="page-content-inner">
                    <input type="hidden" id="user_id" value="<?php echo $userid; ?>" />
                    <div class="row">
                      <?php echo $html; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content"></div>
    </div>
</div>
<div class="modal lg" id="Popup">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Confirm Delete?</h4>
            </div>
            <div class="modal-body">
                <p>
                   Are you sure you want to delete location?
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn btn-primary" id="delete">Delete</button>
                <button type="button" data-dismiss="modal" class="btn">Cancel</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<?php require_once 'inc/footer.php'; ?>
<script>
$(document).ready(function() {
  <?php echo $javascript; ?>
 /* oTable.on( 'order.dt search.dt', function () {
        oTable.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            //cell.innerHTML = i+1;
            $(cell).find('.row-no').text(i+1);
        } );
    } ).draw();*/
});
<?php echo $extJavascript; ?>
</script>
<script src="script.js"></script>


