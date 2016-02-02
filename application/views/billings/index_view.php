<div class="page-head">
	<?php if($messages = $this->session->flashdata('messages'))
		foreach($messages as $message):?>
			<div class="alert alert-<?=$message['success'] ? 'success' : 'danger'?> fade in">
				<a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
				<?=$message['message']?>
			</div>
		<?php endforeach?>
	<!-- BEGIN PAGE TITLE -->
	<div class="page-title">
	</div>

	<!-- END PAGE BREADCRUMB -->
</div>

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



<form method="post" id="do_billing_form" action="<?=site_url('billings/do_billing')?>">

<div class="portlet light portlet-fit portlet-datatable bordered">
	<div class="portlet-title">
		<div class="caption">
			<i class="icon-settings font-dark"></i>
			<span class="caption-subject font-dark sbold uppercase"><h1><?=$this->lang->line('bill_shoppers')?></h1></span>
		</div>
	</div>
	<div class="portlet-body">
		<div class="table-container">
			<table class="table table-striped table-bordered table-hover table-checkable" id="datatable_ajax">
				<thead>
				<tr role="row" class="heading">
					<th>Customer id</th>
					<th>Customer Name</th>
					<th>Anniversary Date</th>
					<th>Status</th>
					<th>Do Billing</th>
					<th>Transactions</th>
					<th>Shipments</th>
					<th>Items</th>
					<th>Total</th>
					<th>Actions</th>
				</tr>
				<tr role="row" class="filter">
					<td><input type="text" class="form-control form-filter" name="customer_id" value="<?=$this->input->get('customer_id')?>"></td>
					<td><input type="text" class="form-control form-filter" name="customer_name" value="<?=$this->input->get('customer_name')?>"></td>
					<td>
						<div class="input-group date date-picker margin-bottom-5">
							<input type="text" class="form-control form-filter input-sm" readonly name="date_from" placeholder="From">
															<span class="input-group-btn">
																<button class="btn btn-sm default" type="button">
																	<i class="fa fa-calendar"></i>
																</button>
															</span>
						</div>
						<div class="input-group date date-picker"">
							<input type="text" class="form-control form-filter input-sm" readonly name="date_to" placeholder="To">
															<span class="input-group-btn">
																<button class="btn btn-sm default" type="button">
																	<i class="fa fa-calendar"></i>
																</button>
															</span>
						</div>
					</td>
					<td>
						<select name="status" class="form-control form-filter">
							<option value="0">ANY</option>
							<option value="-1">UNBILLED</option>
							<option value="1">BILLED</option>
						</select>
					</td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td>
						<div class="margin-bottom-5">
							<button class="btn btn-sm green btn-outline filter-submit margin-bottom">
								<i class="fa fa-search"></i> Search</button>
							<button class="btn btn-sm red btn-outline filter-cancel">
								<i class="fa fa-times"></i> Reset</button>
						</div>
					</td>
				</tr>
				</thead>
				<tbody> </tbody>
			</table>
		</div>
	<br />
	<div class="row">
		<div class="col-md-12">
			<button id="do_billing" type="button" class="btn btn-success">Do Billing</button>
		</div>

	</div>

</div>


<div id="modals_container">

</div>

</form>


<input type="hidden" id="ajax_url" value="<?=site_url('billings/ajax_billings')?>">
<input type="hidden" id="modal_url" value="<?=site_url('billings/ajax_modal')?>">
<input type="hidden" id="parent_checkbox_ajax_url" value="<?=site_url('billings/update_parent_checkbox_status')?>">
<input type="hidden" id="service_checkbox_ajax_url" value="<?=site_url('billings/update_service_checkbox_status')?>">
<input type="hidden" id="do_billing_url" value="<?=site_url('billings/do_billing')?>">
<style>
	tr.small_tr td, tr.small_tr th{
		font-size: 12px;
	}
	.scroll-modal {
		max-height: 500px;
		overflow-y: auto;
	}
	div.checker span.partial_status {
		background-color: #BDBDBD;
	}
	.input-group.date {
		width: 150px;
	}
	#datatable_ajax th, #datatable_ajax td{
		text-align: center;
		vertical-align: middle;
	}
</style>