
        <div class="page-prefooter">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-6 col-xs-12 footer-block">
                        <h2>About</h2>
                        <p> Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam dolore. </p>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs12 footer-block">
                        <h2>Subscribe Email</h2>
                        <div class="subscribe-form">
                            <form action="javascript:;">
                                <div class="input-group">
                                    <input type="text" placeholder="mail@email.com" class="form-control">
                                    <span class="input-group-btn">
                                        <button class="btn" type="submit">Submit</button>
                                    </span>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12 footer-block">
                        <h2>Follow Us On</h2>
                        <ul class="social-icons">
                            <li>
                                <a href="javascript:;" data-original-title="rss" class="rss"></a>
                            </li>
                            <li>
                                <a href="javascript:;" data-original-title="facebook" class="facebook"></a>
                            </li>
                            <li>
                                <a href="javascript:;" data-original-title="twitter" class="twitter"></a>
                            </li>
                            <li>
                                <a href="javascript:;" data-original-title="googleplus" class="googleplus"></a>
                            </li>
                            <li>
                                <a href="javascript:;" data-original-title="linkedin" class="linkedin"></a>
                            </li>
                            <li>
                                <a href="javascript:;" data-original-title="youtube" class="youtube"></a>
                            </li>
                            <li>
                                <a href="javascript:;" data-original-title="vimeo" class="vimeo"></a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12 footer-block">
                        <h2>Contacts</h2>
                        <address class="margin-bottom-40"> Phone: 800 123 3456
                            <br> Email:
                            <a href="mailto:info@metronic.com">info@metronic.com</a>
                        </address>
                    </div>
                </div>
            </div>
        </div>
        <!-- END PRE-FOOTER -->
        <!-- BEGIN INNER FOOTER -->
        <div class="page-footer">
            <div class="container"> 2015-2016 ©
            </div>
        </div>
        
        <!-- END INNER FOOTER -->
        <!-- END FOOTER -->
        <!--[if lt IE 9]>
<script src="assets/global/plugins/respond.min.js"></script>
<script src="assets/global/plugins/excanvas.min.js"></script> 
<![endif]-->
        <!-- BEGIN CORE PLUGINS -->

       <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDef4rRaE0L456ZEJGpTYHKAFKDSqjMEa8&signed_in=true&libraries=places"></script>

        <script src="assets/global/plugins/jquery.min.js" type="text/javascript"></script>
        <script src="assets/js/jquery-ui.min.js"></script>
        <script src="assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="assets/global/plugins/moment.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="assets/global/scripts/app.min.js" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="assets/pages/scripts/dashboard.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <script src="assets/layouts/layout3/scripts/layout.min.js" type="text/javascript"></script>
        <script src="assets/layouts/layout3/scripts/demo.min.js" type="text/javascript"></script>
        <script src="assets/js/jquery.dataTables.min.js" type="text/javascript" charset="utf-8"></script>
        <script src="assets/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>
        <!-- END THEME LAYOUT SCRIPTS -->
        
        <script>
        var ab=0;
        $('.list-group-item').click(function(e){
            if(ab!=0)
            {
                return;
            }
            $(this).children("input").toggle();                
            id=$(this).attr('id');
            realId='#'+id;
            var title=$("#"+id+" h5").text();
            //$('.modal-title').html(title);
            var url='';
            var store_id='';
            if(typeof json_record.id!='undefined')
            {
                store_id='?id='+json_record.id;
            }
            if(id=='business-name')
            {
                url= "business_name.php"+store_id;
            }
            else if(id=='business-address')
            {
                url= "address.php"+store_id;
            }
            else if(id=='business-contact')
            {
                url= "contact.php"+store_id;
            }
            else if(id=='business-hours')
            {
                url= "hours.php"+store_id;
            }
            else if(id=='business-description')
            {
                url= "description.php"+store_id;
            }
            var t=realId+' .data-body p';
            if(t=='#business-address .data-body p')
            {
                $('#business-address .data-body .address, #business-address .data-body .address-map').hide();
            }
            $(t).hide();
            $(realId).find('.edit-content').load(url);


            ab=1;
            /*$('.modal').load(url,function(result){
            $('#Popup').modal({show:true});
            });*/
        });
</script>

</body></html>