<div class="row">
    <div class="col-md-12">
        <div class="portlet light portlet-fit bordered">
            <div class="portlet-title">
                <div class="caption">
                    <i class=" icon-layers font-green"></i>
                    <span class="caption-subject font-green bold uppercase">Bar Chart</span>
                </div>
            </div>
            <div class="portlet-body">
                <div id="views_chart" style="height:500px;"></div>
            </div>
        </div>
    </div>
</div>
<input type="hidden" id="views_url" value="<?=site_url('ads/get_charts_view/'.$ad['id'])?>"