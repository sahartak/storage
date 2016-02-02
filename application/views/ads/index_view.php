<div class="page-head">
	<!-- BEGIN PAGE TITLE -->
	<div class="page-title">
		<h1><?=$this->lang->line('ads')?></h1>
	</div>

	<!-- END PAGE BREADCRUMB -->
</div>
<?php if($this->session->flashdata('added')):?>
	<div class="alert alert-success fade in">
		<a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
		<?=$this->lang->line('ad_has_added')?>
	</div>
<?php endif?>
<!-- END PAGE HEAD-->
<!-- BEGIN PAGE BREADCRUMB
<ul class="page-breadcrumb breadcrumb">
	<li>
		<a href="index.html">Home</a>
		<i class="fa fa-circle"></i>
	</li>
	<li>
		<a href="#">Tables</a>
		<i class="fa fa-circle"></i>
	</li>
	<li>
		<span class="active">Datatables</span>
	</li>
</ul>
-->
<div class="row">
	<div class="col-md-12">
	<!-- BEGIN EXAMPLE TABLE PORTLET-->
		<div class="portlet light bordered">
			<div class="portlet-title">
				<div class="caption font-dark">
					<a class="btn btn-success" href="<?=site_url('ads/add')?>"><?=$this->lang->line('add_new')?></a>
				</div>
			</div>
			<div class="portlet-body">
				<table class="table table-striped table-bordered table-hover" id="sample_1">
					<thead>
						<tr>
							<th><?=$this->lang->line('id')?></th>
							<th><?=$this->lang->line('image')?></th>
							<th><?=$this->lang->line('landing_page_url')?></th>
							<th><?=$this->lang->line('visible')?></th>
							<th><?=$this->lang->line('actions')?></th>
						</tr>
					</thead>
					<tbody>
					<?php foreach($ads as $ad):?>
						<tr>
							<td><?=$ad['id']?></td>
							<td><a href="<?=base_url('upload/ads/'.$ad['image'])?>" target="_blank"> <img src="<?=base_url('upload/ads/'.$ad['image'])?>" width="150" /></a></td>
							<td><?=$ad['url']?></td>
							<td><?=$ad['visible'] ? 'yes' : 'no'?></span>
							</td>
							<td>
                                <a class="btn btn-warning btn-xs" title="chart"  href="<?=site_url('ads/chart/'.$ad['id'])?>"><i class="icon-bar-chart"></i> </a>
								<a class="btn btn-primary btn-xs" href="<?=site_url('ads/edit/'.$ad['id'])?>"><i class="glyphicon glyphicon-pencil"></i> </a>
								<a class="btn btn-danger btn-xs" onclick="return confirm('delete ?')"  href="<?=site_url('ads/delete/'.$ad['id'])?>"><i class="glyphicon glyphicon-trash"></i> </a>
							</td>
						</tr>
					<?php endforeach?>
					</tbody>
				</table>
			</div>
		</div>
	<!-- END EXAMPLE TABLE PORTLET-->
	</div>
</div>
