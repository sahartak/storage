<input type="hidden" id="logout_url" value="<?=site_url('logout')?>" />
<div class="modal fade" id="idle-timeout-dialog" data-backdrop="static">
    <div class="modal-dialog modal-small">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Your session is about to expire.</h4>
            </div>
            <div class="modal-body">
                <p>
                    <i class="fa fa-warning font-red"></i> You session will be locked in
                    <span id="idle-timeout-counter"></span> seconds.</p>
                <p> Do you want to continue your session? </p>
            </div>
            <div class="modal-footer">
                <button id="idle-timeout-dialog-logout" type="button" class="btn dark btn-outline sbold uppercase">No, Logout</button>
                <button id="idle-timeout-dialog-keepalive" type="button" class="btn green btn-outline sbold uppercase" data-dismiss="modal">Yes, Keep Working</button>
            </div>
        </div>
    </div>
</div>
<!-- BEGIN FOOTER -->
        <div class="page-footer">
            <div class="page-footer-inner"> 2014 &copy; Metronic by keenthemes.
                <a href="http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes" title="Purchase Metronic just for 27$ and get lifetime updates for free" target="_blank">Purchase Metronic!</a>
            </div>
            <div class="scroll-to-top">
                <i class="icon-arrow-up"></i>
            </div>
        </div>
        <!-- END FOOTER -->
        <!--[if lt IE 9]>
<script src="<?php echo base_url()?>assets/global/plugins/respond.min.js"></script>
<script src="<?php echo base_url()?>assets/global/plugins/excanvas.min.js"></script> 
<![endif]-->
        <!-- BEGIN CORE PLUGINS -->
        <script src="<?php echo base_url()?>assets/global/plugins/jquery.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url()?>assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url()?>assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url()?>assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url()?>assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url()?>assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url()?>assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url()?>assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url()?>assets/global/plugins/jquery-idle-timeout/jquery.idletimeout.js" type="text/javascript"></script>
        <script src="<?php echo base_url()?>assets/global/plugins/jquery-idle-timeout/jquery.idletimer.js" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="<?php echo base_url()?>assets/global/scripts/app.min.js" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <script src="<?php echo base_url()?>assets/layouts/layout4/scripts/layout.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url()?>assets/layouts/layout4/scripts/demo.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url()?>assets/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url()?>assets/pages/scripts/ui-idletimeout.js" type="text/javascript"></script>
        <!-- END THEME LAYOUT SCRIPTS -->

<?php if(isset($scripts))
    foreach($scripts as $js):?>
        <script src="<?=$js?>" type="text/javascript"></script>
<?php endforeach?>
    </body>

</html>