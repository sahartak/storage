<div class="page-head">
	<!-- BEGIN PAGE TITLE -->
	<div class="page-title">
		<h1><?=$this->lang->line('employees')?></h1>
	</div>

	<!-- END PAGE BREADCRUMB -->
</div>
<?php if($this->session->flashdata('added')):?>
	<div class="alert alert-success fade in">
		<a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
		<?=$this->lang->line('employer_has_added')?>
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
			<?php if($this->session->employee->role):?>
			<div class="portlet-title">
				<div class="caption font-dark">
					<a class="btn btn-success" href="<?=site_url('employees/add')?>"><?=$this->lang->line('add_new')?></a>
				</div>
			</div>
			<?php endif?>
			<div class="portlet-body">
				<table class="table table-striped table-bordered table-hover" id="sample_1">
					<thead>
						<tr>
							<th><?=$this->lang->line('id')?></th>
							<th><?=$this->lang->line('login')?></th>
							<th><?=$this->lang->line('first_name')?></th>
							<th><?=$this->lang->line('last_name')?></th>
							<th><?=$this->lang->line('email')?></th>
							<th><?=$this->lang->line('phone')?></th>
							<th><?=$this->lang->line('address')?></th>
							<th><?=$this->lang->line('created')?></th>
							<th><?=$this->lang->line('updated')?></th>
							<th><?=$this->lang->line('role')?></th>
						<?php if($this->session->employee->role):?>
							<th><?=$this->lang->line('actions')?></th>
						<?php endif?>
						</tr>
					</thead>
					<tbody>
					<?php foreach($employees as $employee):?>
						<tr>
							<td><?=$employee['id']?></td>
							<td><?=$employee['login']?></td>
							<td><?=$employee['first_name']?></td>
							<td><?=$employee['last_name']?></td>
							<td><?=$employee['email']?></td>
							<td><?=$employee['phone']?></td>
							<td><?=$employee['address']?></td>
							<td><?=$employee['created']?></td>
							<td><?=$employee['updated']?></td>
							<td>
								<span class="label label-sm label-<?=$employee['role'] ? 'success' : 'default'?>">
									<?=$employee['role'] ? 'Store Admin' : 'Store Clerk'?>
								</span>
							</td>
						<?php if($this->session->employee->role):?>
							<td>
								<a class="btn btn-primary btn-xs" href="<?=site_url('employees/edit/'.$employee['id'])?>"><i class="glyphicon glyphicon-pencil"></i> </a>
								<a class="btn btn-danger btn-xs" onclick="return confirm('delete ?')"  href="<?=site_url('employees/delete/'.$employee['id'])?>"><i class="glyphicon glyphicon-trash"></i> </a>
							</td>
						<?php endif?>
						</tr>
					<?php endforeach?>
					</tbody>
				</table>
			</div>
		</div>
	<!-- END EXAMPLE TABLE PORTLET-->
	</div>
</div>
