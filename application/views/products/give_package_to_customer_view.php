<div class="row">
	<div class="col-md-12">
		<div class="portlet light bordered" id="form_wizard_1">
			<div class="portlet-title">
				<div class="caption">
					<i class=" icon-layers font-red"></i>
					<span class="caption-subject font-red bold uppercase"> Give Package to Customer -
						<span class="step-title"> Step 1 of 4 </span>
					</span>
				</div>
				<div class="actions">
					<a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
						<i class="icon-cloud-upload"></i>
					</a>
					<a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
						<i class="icon-wrench"></i>
					</a>
					<a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
						<i class="icon-trash"></i>
					</a>
				</div>
			</div>
			<div class="portlet-body form">
				<form action="#" class="form-horizontal" id="submit_form" method="POST">
					<div class="form-wizard">
						<div class="form-body">
							<ul class="nav nav-pills nav-justified steps">
								<li>
									<a href="#tab1" data-toggle="tab" class="step">
										<span class="number"> 1 </span>
										<span class="desc">
										<i class="fa fa-check"></i> Select Customer </span>
									</a>
								</li>
								<li>
									<a href="#tab1-1" data-toggle="tab" class="step">
										<span class="number">&nbsp;</span>
										<span class="desc">
										<i class="fa fa-check"></i> Age Verification </span>
									</a>
								</li>
								<li>
									<a href="#tab2" data-toggle="tab" class="step">
										<span class="number"> 2 </span>
										<span class="desc">
										<i class="fa fa-check"></i> Checkmark Packages </span>
									</a>
								</li>
								<li>
									<a href="#tab3" data-toggle="tab" class="step active">
										<span class="number"> 3 </span>
										<span class="desc">
											<i class="fa fa-check"></i> Scan Packages </span>
									</a>
								</li>
								<li>
									<a href="#tab4" data-toggle="tab" class="step">
										<span class="number"> 4 </span>
										<span class="desc">
											<i class="fa fa-check"></i> Confirm </span>
									</a>
								</li>

                                <li>
                                    <a href="#tab4" data-toggle="tab" class="step">
                                        <span class="number"> &nbsp; </span>
										<span class="desc">
											<i class="fa fa-check"></i> Finish </span>
                                    </a>
                                </li>
							</ul>
							<div id="bar" class="progress progress-striped" role="progressbar">
								<div class="progress-bar progress-bar-success"> </div>
							</div>
							<div class="tab-content">
								<div class="alert alert-danger display-none">
									<button class="close" data-dismiss="alert"></button> You have some form errors. Please check below. </div>
								<div class="alert alert-success display-none">
									<button class="close" data-dismiss="alert"></button> Your form validation is successful! </div>
								<div class="tab-pane active" id="tab1">
									<div class="form-group">
										<label class="control-label col-md-3">Account #:
											<span class="required"> * </span>
										</label>
										<div class="col-md-4">
											<input type="text" class="form-control" name="customer_number" id="customer_number" required="" />
											<span class="help-block"> Choose Customer </span> <br />
											<span class="help-block" id="customer_info"></span>
										</div>
										<div class="col-md-4">
											<button type="button" class="btn btn-primary" id="find_customer">Find</button>
										</div>
									</div>
									<div style="visibility: hidden">
											<input type="checkbox" id="tab1_allow" name="tab1_allow" value="1" required="">
									</div>

								</div>

								<div class="tab-pane active" id="tab1-1">
									<div style="visibility: hidden">
										<input type="checkbox" id="tab1-1_allow" name="tab1-1_allow" value="1" required="">
									</div>
									<div class="tab1-1-content"></div>
									<div class="tab1-1-message"></div>
								</div>

								<div class="tab-pane active" id="tab2">
									<div style="visibility: hidden">
										<input type="checkbox" id="tab2_allow" name="tab2_allow" value="1" required="">
									</div>
                                    <div id="customer_bday"></div>
                                    <br />
									<table class="table table-striped table-bordered table-hover table-checkable">
										<thead>
											<tr>
												<th>Check</th>
												<th>Born Before</th>
												<th>Shipment #</th>
												<th>Item #</th>
												<th>Tracking #</th>
											</tr>
										</thead>
										<tbody></tbody>
									</table>
									<div id="tab2_msg"></div>
								</div>

								<div class="tab-pane" id="tab3">
									<div class="form-group">
										<label class="control-label col-md-3">Scan package to confirm:
											<span class="required"> * </span>
										</label>
										<div class="col-md-4">
											<input type="text" class="form-control" name="tracking_id" id="tracking_id" />
											<span class="help-block"> tracking # </span> <br />
										</div>
										<div class="col-md-4">
											<button type="button" class="btn btn-primary" id="find_tracking">Scan</button>
										</div>
									</div>

									<div class="form-group">
										<label class="control-label col-md-3">&nbsp;</label>
										<div class="col-md-4">
											<p><b class="font-green-jungle"><span id="founded_count">0</span> of <span id="total_count">0</span> Item(s) found</b></p> <br />
											<p id="search_result_label"></p>
										</div>
									</div>
								</div>
								<div class="tab-pane" id="tab4">
                                    <div style="visibility: hidden">
                                        <input type="checkbox" id="tab4_allow" name="tab4_allow" value="1" required="">
                                    </div>
                                    <p class="font-green-jungle bold text-center" id="tab_4_success"></p>
                                    <p class="font-red-mint font-lg bold text-center" id="tab_4_danger"></p>
								</div>

                                <div class="tab-pane" id="tab5">
                                </div>
							</div>
						</div>
						<div class="form-actions">
							<div class="row">
								<div class="col-md-offset-3 col-md-9 buttons-actions">
									<a href="javascript:;" class="btn default button-previous">
										<i class="fa fa-angle-left"></i> Back </a>
									<a href="<?=site_url('products/give_package_to_customer')?>" class="btn btn-outline blue-hoki">Cancel</a>
									<a href="javascript:;" class="btn btn-outline green button-next"> Next
										<i class="fa fa-angle-right"></i>
									</a>
									<a href="javascript:;" class="btn green button-submit"> Submit
										<i class="fa fa-check"></i>
									</a>
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>


<div class="hidden" id="dob_template">
	<div class="form-group">
		<label class="control-label col-md-3">Enter DOB:
			<span class="required"> * </span>
		</label>
		<div class="col-md-4">

			<div class="col-md-4">
				<select class="form-control input-small input-inline" name="b_month" id="b_month" required="">
					<option value="">Choose month</option>
					<?php for($i=1; $i<=12; $i++):?>
						<option><?=$i?></option>
					<?php endfor?>
				</select>
			</div>

			<div class="col-md-4">
				<select class="form-control input-small input-inline" name="b_day" id="b_day" required="">
					<option value="">Choose day</option>
				<?php for($i=1; $i<=31; $i++):?>
					<option><?=$i?></option>
				<?php endfor?>
				</select>
			</div>

			<div class="col-md-4">
				<select class="form-control input-small input-inline" name="b_year" id="b_year" required="">
					<option value="">Choose year</option>
				<?php for($i=2000; $i>=1900; $i--):?>
					<option><?=$i?></option>
				<?php endfor?>
				</select>
			</div>

		</div>
		<div class="col-md-4">
			<button type="button" class="btn btn-primary verify_age">Verify</button>
		</div>
	</div>
</div>

<!-- END PAGE BASE CONTENT -->
<input type="hidden" id="customer_find_url" value="<?=site_url('products/get_customer_packages')?>">
<input type="hidden" id="form_step" value="1">
<style>

	.table td, .table th {
		text-align: center;
		vertical-align: middle;
	}
	div.buttons-actions a.btn {
		margin: 20px;
	}
	a.step {
		cursor: default;
	}
</style>