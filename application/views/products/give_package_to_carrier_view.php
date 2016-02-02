<div class="row">
	<div class="col-md-12">
		<!-- BEGIN EXAMPLE TABLE PORTLET-->
		<div class="portlet light bordered">
			<div class="portlet-body form">
				<h2><?=$this->lang->line('give_package_to_carrier')?></h2>

				<?php if($this->session->flashdata('success_message')):?>
					<div class="alert alert-success fade in" >
						<a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
					   <?=$this->session->flashdata('success_message')?>
					</div>
				<?php endif?>

				<form class="form-horizontal" role="form" method="post" id="give_package_to_carrier_form">
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

                        <div class="form-group" id="carrier_packages">

                        </div>


					</div>
					<div class="form-actions">
						<div class="row">
							<div class="col-md-offset-3 col-md-9">
								<button type="submit" class="btn green hidden" id="give_carrier_submit">Give Package to Carrier</button>
							</div>
						</div>
					</div>
				</form>

			</div>
		</div>
	</div>
</div>
<input type="hidden" id="get_carrier_items_url" value="<?=site_url('products/get_carrier_items')?>">