<?php
    ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once 'db-con.php';
$userid='110011';

$active='my_deliveries';
?>
<?php require_once 'inc/header.php'; ?>
<style>

</style>


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
                    <h1>My Deliveries</h1>
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

                                <input type="hidden" id="user_id" value="<?php echo $userid; ?>" />



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
