<?php
    ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once 'db-con.php';
$userid='110011';
$d = array('1' => 'mon','tue','wed','thu','fri','sat','sun');
$sql="SELECT store_info.*,user_location.`order`, region.region as rg FROM user_location INNER JOIN store_info ON store_info.id=user_location.store_id LEFT JOIN region ON region.id=store_info.region ORDER BY user_location.`order`";
//echo $sql;exit;
$rs=mysqli_query($mysqli,$sql);
$records=array();
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
        if($row['street1']!='') $row['street1']=$row['street1'].'<br>';
        if($row['street2']!='') $row['street2']=$row['street2'].'<br>';
        if($row['city']!='') $row['city']=$row['city'].'<br>';
        if($row['rg']=='') $row['region']=$row['region'].'<br>';
        else $row['region']=$row['rg'].'<br>';
        if($row['country']!='') $row['country']=$row['country'].'<br>';
        if($row['postalcode']!='') $row['postalcode']=$row['postalcode'].'<br>';
        $row['address']=$row['street1'].$row['street2'].$row['city'].$row['region'].$row['postalcode'].$row['country'];
        $records[]=$row;
    }
}
$active='suggest';
?>
<?php require_once 'inc/header.php'; ?>
<style>

</style>
<!--cript src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDef4rRaE0L456ZEJGpTYHKAFKDSqjMEa8&signed_in=true&libraries=places"></script-->

        <div class="clearfix"> </div>
        <!-- END HEADER -->
        <!-- BEGIN CONTAINER -->
        <div class="page-container">
            <!-- BEGIN CONTENT -->
            <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <!-- BEGIN PAGE HEAD-->
                <div class="page-head">
                    <div class="container">
                        <!-- BEGIN PAGE TITLE -->
                        <div class="page-title">
                            <h1>Dashboard
                                <small>dashboard &amp; statistics</small>
                            </h1>
                        </div>
                        <!-- END PAGE TITLE -->
                    </div>
                </div>
                <!-- END PAGE HEAD-->
                <!-- BEGIN PAGE CONTENT BODY -->
                <div class="page-content">
                    <div class="container">
                        <!-- BEGIN PAGE CONTENT INNER -->
                        <div class="page-content-inner">


                            <div class="row">
                                <div class="row">
                        <div class="container">
<a style="margin-bottom:5px;" data-toggle="modal" class="btn btn-primary" href="store-locator.php" data-target="#myModal">Suggest Store</a>
<!-- <button style="margin-bottom:5px;background-color: #F0F0F0;box-shadow: 1px 1px 4px rgba(0,0,0,0.4);" disabled class="btn btn-default update-order">Update Order</button> -->
<input type="hidden" id="user_id" value="<?php echo $userid; ?>" />
<table id="sort1" class="grid table table-bordered store-list">
    <thead>

        <tr><th>SN</th><th>Address</th><th>Status</th><th>Hours</th><th>Action</th></tr>
    </thead>
    <tbody>
        <?php
            foreach ($records as $key => $value) {
                $operation_hours=isset($value['operation_hours'])?$value['operation_hours']:'';
                $h=getHours($operation_hours);
                if($value['status']=="2")
                {
                    $value['status']="Pending";
                }
                elseif($value['status']=="1")
                {
                    $value['status']="Live";
                }
                echo '<tr class="store-row">
                    <td style="width: 100px;">
                        <input type="hidden" id="'.$value['id'].'" />
                        <span class="arrow arrow-up1"><i class="fa fa-arrow-up"></i></span>
                        <span class="row-no">'.($key+1).'</span>
                        <span class="arrow arrow-down1"><i class="fa fa-arrow-down"></i></span>
                    </td>
                    <td><h4>'.$value['store_name'].'</h4>'.$value['address'].'</td>
                    <td>'.$value['status'].'</td>
                    <td>'.$h.'</td>
                    <td><a href="add-store.php?id='.$value['id'].'" class="edit" rel="'.$value['id'].'">Edit</a> <a href="#" class="delete" rel="'.$value['id'].'">Delete</a></td>
                    </tr>';
            }

        ?>
    </tbody>
</table>


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
</div>
                    </div>
                </div>

                            </div>
                        </div>
                        <!-- END PAGE CONTENT INNER -->
                    </div>
                </div>
                <!-- END PAGE CONTENT BODY -->
                <!-- END CONTENT BODY -->
            </div>
            <!-- END CONTENT -->
            <!-- BEGIN QUICK SIDEBAR -->


            <!-- END QUICK SIDEBAR -->
        </div>
        <!-- END CONTAINER -->
        <?php require_once 'inc/footer.php'; ?>
</div>
<script src="script.js"></script>
