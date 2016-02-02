<div class="page-head">
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



<div class="portlet light portlet-fit portlet-datatable bordered">
	<div class="portlet-title">
		<div class="caption">
			<i class="icon-settings font-dark"></i>
			<span class="caption-subject font-dark sbold uppercase"><h1><?=$this->lang->line('bill_shoppers')?></h1></span>
		</div>
	</div>
	<div class="portlet-body">
        <form method="post" id="do_billing_form" action="<?=site_url('billings/process_billing')?>">
		<div class="table-container">
			<table class="table table-striped table-bordered table-hover" id="datatable_ajax">
				<thead>
				<tr>
					<th>Customer id</th>
					<th>Customer Name</th>
					<th>Anniversary Date</th>
					<th>Transactions</th>
					<th>Not included transactions</th>
					<th>Shipments</th>
					<th>Not included shipments</th>
					<th>Items</th>
					<th>Not included items</th>
					<th>Total</th>
					<th>Not included total</th>
					<th>Actions</th>
				</tr>
				</thead>
				<tbody>
			<?php if(isset($billings['billings_list']))
				foreach($billings['billings_list'] as $billing):?>
				<tr>
					<td><?=$billing['customer_id'], '<input type="hidden" name="customers_billings[]" value="',$billing['customer_id'],'" />'?></td>
					<td><?=$billing['customer_name']?></td>
					<td><?=$billing['last_aniv_bill_date']?></td>
					<td><?=$billing['transactions_total']?></td>
					<td><?=$billing['transactions_minus']?></td>
					<td><?=count($billing['shipments'])?></td>
					<td><?=$billing['shipments_minus']?></td>
					<td><?=$billing['items_total']?></td>
					<td><?=$billing['line_items_minus']?></td>
					<td><?=$billing['total']?></td>
					<td><?=$billing['charge_minus']?></td>
					<td><a class=" btn purple btn-outline sbold to_modal" data-toggle="modal" href="#ajax_modal_<?=$billing['id']?>"> View </a></td>
				</tr>
			<?php endforeach?>
				</tbody>
			</table>
		</div>
	<br />
	<div class="row">
		<div class="col-md-12">
			<button id="process" type="submit" class="btn btn-danger">Process</button>
		</div>

	</div>
    </form>
</div>


<div id="modals_container">
	<?php if(isset($billings['billings_list']))
				foreach($billings['billings_list'] as $billing):?>
		<div class="modal fade bs-modal-lg" id="ajax_modal_<?=$billing['id']?>" tabindex="-1" role="dialog" aria-hidden="true">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
						<h4 class="modal-title"><?=$billing['customer_name']?> billing records</h4>
					</div>
					<div class="modal-body scroll-modal">
						<div class="table-responsive">
							<table class="table table-striped table-bordered table-hover table_checkboxes" id="shoper_table_<?=$billing['id']?>">
								<?php foreach($billing['shipments'] as &$shipment):?>
									<tr>
										<th colspan="9"><h3>Shipment <?=$shipment['shipment_id']?></h3></th>
									</tr>
									<?php foreach($shipment['line_items'] as $item):?>
										<tr>
											<th>item_id</th>
											<th>tracking_id</th>
											<th>carrier_name</th>
											<th>received_date</th>
											<th>delivered_date</th>
											<th>del_type</th>
											<th>Transactions</th>
											<th>Total</th>
										</tr>
										<tr>
											<td><?=$item['item_id']?></td>
											<td><?=$item['in_tracking_id']?></td>
											<td><?=$item['carrier_name']?></td>
											<td><?=$item['received_date']?></td>
											<td><?=$item['delivered_date']?></td>
											<td><?=$item['del_type']?></td>
											<td><?=$item['transactions']?></td>
											<td><?=$item['total']?></td>
										</tr>
										<?php if($item['services']):?>
											<tr class="small_tr">
												<th rowspan="<?=count($item['services'])+1?>"></th>
												<th>service_type</th>
												<th>Start Date</th>
												<th>End Date</th>
												<th>Charge</th>
												<th>Delivered at</th>
												<th>By</th>
												<th rowspan="<?=count($item['services'])+1?>"></th>
											</tr>
											<?php foreach($item['services'] as $service):?>
												<tr class="small_tr">
													<td><?=$service_types[$service['service_type']]?></td>
													<td><?=$service['start_date']?></td>
													<td><?=$service['end_date']?></td>
													<td><?=$service['charge']?></td>
													<td><?=$service['delivered_at']?></td>
													<td><?=$service['del_by']?></td>
												</tr>
											<?php endforeach?>
										<?php endif?>
									<?php endforeach?>
								<?php endforeach?>
							</table>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn purple btn-outline sbold" data-dismiss="modal">Close</button>
					</div>

				</div>
				<!-- /.modal-content -->
			</div>
			<!-- /.modal-dialog -->
		</div>
	<?php endforeach?>
</div>




<input type="hidden" id="ajax_url" value="<?=site_url('billings/ajax_billings')?>">
<input type="hidden" id="modal_url" value="<?=site_url('billings/ajax_modal')?>">
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