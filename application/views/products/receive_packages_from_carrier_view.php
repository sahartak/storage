<div class="row">
	<div class="col-md-12">
		<!-- BEGIN EXAMPLE TABLE PORTLET-->
		<div class="portlet light bordered">
			<div class="portlet-body form">
				<h2><?=$this->lang->line('receive_packages_from_carrier')?></h2>

				<?php if($this->session->flashdata('success_message')):?>
					<div class="alert alert-success fade in" style="margin-top:18px;">
						<a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
					   <?=$this->session->flashdata('success_message')?>
					</div>
				<?php endif?>

				<form class="form-horizontal" role="form" method="post">
					<div class="form-body">

						<?php if(isset($result['message'])) echo '<p>', $result['message'], '</p>'?>
						<?php echo validation_errors(); ?>

						<div class="form-group">
							<label class="col-md-3 control-label">Carrier</label>
							<div class="col-md-9">
								<select name="carrier_id" id="carrier_id" class="form-control input-inline input-large" required="">
									<option value="">Select Carrier</option>
									<?php foreach($carriers as $carrier):?>
										<option value="<?=$carrier['name']?>" <?php if(set_value('carrier_id', $this->session->flashdata('carrier_id')) == $carrier['name']) echo 'selected'?>><?=$carrier['name']?></option>
									<?php endforeach?>
								</select>
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-3 control-label">Best</label>
							<div class="col-md-9">
								<input type="text" value="<?=set_value('tracking_id', $this->session->flashdata('tracking_id'))?>" id="tracking_id" name="tracking_id" class="form-control input-inline input-large" placeholder="Enter tracking #">
								<button type="button" class="btn btn-primary" id="best_submit">Update</button>
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-3 control-label">Good</label>
							<div class="col-md-9">
								<input type="text" value="<?=set_value('customer_id', $this->session->flashdata('customer_id'))?>" required="" id="customer_id" name="customer_id" class="form-control input-inline input-large" placeholder="Enter customer #">
								<button type="button" class="btn btn-primary" id="good_submit">Update</button>
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-3 control-label">Last resort: Take photo of label</label>
							<div class="col-md-9">
								<input type="file"  name="">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-3 control-label">Stock location</label>
							<div class="col-md-9">
								<select name="current_stock_loc_id" id="current_stock_loc_id" class="form-control input-inline input-large" required="">
									<option value="">Select location</option>
									<?php foreach($locations as $location):?>
										<option value="<?=$location['id']?>" <?php if(set_value('current_stock_loc_id') == $location['id']) echo 'selected'?>><?=$location['name']?></option>
									<?php endforeach?>
								</select>
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-3 control-label">Age restriction</label>
							<div class="col-md-9">
								<select name="age_restriction" id="age_restriction" class="form-control input-inline input-large" required="">
									<option value="0">None</option>
									<option value="18">18</option>
									<option value="19">19</option>
									<option value="20">20</option>
									<option value="21">21</option>
								</select>
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-9 col-md-offset-2 store_attr">
								<input type="number" value="<?=set_value('store_weight')?>" id="store_weight" name="store_weight"  required="" class="form-control input-inline input-small" placeholder="Weight">
								<input type="number" value="<?=set_value('store_size1')?>" id="store_size1" name="store_size1"  required="" class="form-control input-inline input-small" placeholder="Size1">
								<input type="number" value="<?=set_value('store_size2')?>" id="store_size2" name="store_size2"  required="" class="form-control input-inline input-small" placeholder="Size2">
								<input type="number" value="<?=set_value('store_size3')?>" id="store_size3" name="store_size3"  required="" class="form-control input-inline input-small" placeholder="Size3">
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-9 col-md-offset-2">
								Price: <b><span id="price">-</span></b> <br />
							<?php
								if($this->session->flashdata('shipment_id')) {
									$shipment_id = $this->session->flashdata('shipment_id');
								} elseif($this->input->post('shipment_id')) {
									$shipment_id = $this->input->post('shipment_id');
								} else {
									$shipment_id = '';
								}
							?>
								Shipment # <b><span id="price"><?=$shipment_id?></span></b>
							</div>
							<div class="col-md-9 col-md-offset-2" id="label_info">

							</div>
						</div>

					</div>
					<div class="form-actions">
						<div class="row">
							<div class="col-md-offset-3 col-md-9">

								<input type="hidden" name="shipment_id" id="shipment_id" value="<?=set_value('shipment_id', $this->session->flashdata('shipment_id'))?>">

								<!--<button type="submit" class="btn green" name="next_shipment" value="1">Same shipment</button>-->
								<button type="submit" class="btn green" name="next_shipment" value="0">New shipment</button>
							</div>
						</div>
					</div>
				</form>

			</div>
		</div>
	</div>
</div>
<input type="hidden" id="best_submit_url" value="<?=site_url('products/check_tracking_number')?>">
<input type="hidden" id="good_submit_url" value="<?=site_url('products/check_customer_number')?>">
<input type="hidden" id="get_price_url" value="<?=site_url('products/get_price')?>">