<div class="page-head">
	<?php if($message = $this->session->flashdata('success_message')):?>
		<div class="alert alert-success fade in">
			<a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
			<?=$message?>
		</div>
	<?php endif?>
	<!-- BEGIN PAGE TITLE -->
	<div class="page-title">
	</div>

	<!-- END PAGE BREADCRUMB -->
</div>


<div class="portlet light portlet-fit portlet-datatable bordered">
	<div class="portlet-title">
		<div class="caption">
			<i class="icon-settings font-dark"></i>
			<span class="caption-subject font-dark sbold uppercase"><h1><?=$this->lang->line('inventory')?></h1></span>
		</div>
	</div>
	<div class="portlet-body">
		<div class="table-container">
			<table class="table table-striped table-bordered table-hover table-checkable" id="datatable_ajax">
				<thead>
				<tr role="row" class="heading">
					<th>id</th>
					<th>is present</th>
					<th>shipment_id</th>
					<th>item_id</th>
					<th>tracking_id</th>
					<th>carrier_id</th>
					<th>customer_id</th>
					<th style="padding: 0 40px;">customer</th>
					<th>location</th>
					<th>created_on</th>
					<th>type</th>
					<th>status</th>
					<th>Actions</th>
				</tr>
				<tr role="row" class="filter">
					<td><input type="text" class="form-control form-filter" name="id" value="<?=$this->input->get('id')?>"></td>
					<td></td>
					<td><input type="text" class="form-control form-filter" name="shipment_id" value="<?=$this->input->get('shipment_id')?>"></td>
					<td><input type="text" class="form-control form-filter" name="item_id" value="<?=$this->input->get('item_id')?>"></td>
					<td><input type="text" class="form-control form-filter" name="tracking_id" value="<?=$this->input->get('tracking_id')?>"></td>
					<td>
                        <select name="carrier_id" class="form-control form-filter">
                            <option value="">ANY</option>
                            <?php foreach($carriers as $carrier):?>
                                <option value="<?=$carrier['name']?>" <?php if($carrier['name'] == $this->input->get('carrier_id')) echo 'selected'?>><?=$carrier['name']?></option>
                            <?php endforeach?>
                        </select>
                    </td>
					<td><input type="text" class="form-control form-filter" name="customer_id" value="<?=$this->input->get('customer_id')?>"></td>

					<td></td>
					<td>
						<select name="location" class="form-control form-filter">
							<option value="">ANY</option>
							<?php foreach($locations as $location):?>
								<option value="<?=$location['id']?>" <?php if($location['name'] == $this->input->get('location')) echo 'selected'?>><?=$location['name']?></option>
							<?php endforeach?>
						</select>
					</td>
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
						<select name="type" class="form-control form-filter">
							<option value="">ANY</option>
							<option value="1" <?php if($this->input->get('type') == 2) echo 'selected'?> >FROM CARRIER</option>
							<option value="2" <?php if($this->input->get('type') == 1) echo 'selected'?>>FROM CUSTOMER</option>
						</select>
					</td>
					<td>
						<select name="status" class="form-control form-filter">
							<option value="">ANY</option>
							<option value="1">PICK UP</option>
							<option value="2">DELIVERED</option>
							<option value="3">RECEIVED</option>
						</select>
					</td>
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
			<!-- split/merge shipments
			<button id="split" type="button" class="btn btn-warning">Split selected items</button>
			<button id="merge" type="button" class="btn btn-warning">Merge selected items</button>
			-->
			<a class="btn purple btn-outline sbold" data-toggle="modal" id="locations" href="#locations_modal">Change items locations</a>
		</div>
	</div>

	<div class="modal fade bs-modal-lg" id="locations_modal" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<form method="post">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
						<h4 class="modal-title">Change Items Locations</h4>
					</div>
					<div class="modal-body">
						<table class="table table-striped table-bordered table-hover">
							<thead>
								<tr>
									<th>Item #</th>
									<th>Current location</th>
									<th>Change to location</th>
								</tr>
							</thead>
							<tbody>

							</tbody>
						</table>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
						<button type="submit" class="btn green">Save changes</button>
					</div>
				</form>
			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>

</div>


<div id="modals_container">

</div>

<select class="hidden" id="locations_list">
	<option value="">Choose location</option>
	<?php foreach($locations as $location):?>
		<option value="<?=$location['id']?>"><?=$location['name']?></option>
	<?php endforeach?>
</select>

<input type="hidden" id="ajax_url" value="<?=site_url('products/ajax_get_list_packages')?>">
<input type="hidden" id="split_merge_url" value="<?=site_url('products/split_merge_url')?>">
<input type="hidden" id="change_present_url" value="<?=site_url('products/change_present_status')?>">
<style>
	tr.small_tr td, tr.small_tr th{
		font-size: 12px;
	}
	div.checker span.partial_status {
		background-color: #BDBDBD;
	}
	.input-group.date {
		width: 130px;
	}
    #datatable_ajax select.form-control{
        width: 100px;
    }
	#datatable_ajax th, #datatable_ajax td {
		text-align: center;
		vertical-align: middle;
	}
</style>