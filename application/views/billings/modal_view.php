<?php foreach($billings as $billing):?>
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
										<th>Bill</th>
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
										<td>
										<?php if(!$item['billed']):?>
											<input type="checkbox" <?php if($item['billed_checkbox'] == 1) echo 'checked'?> class="parent_checkbox <?php if($item['billed_checkbox'] == 2) echo 'partial_status_check'?>" id="check_<?=$item['record_id']?>" data-id="<?=$item['record_id']?>" data-shipment_id="<?=$shipment['shipment_id']?>" >
										<?php endif?>
										</td>
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
											<th>Bill</th>
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
												<td>
													<?php if(!$service['billed']):?>
														<input type="checkbox" <?php if($service['billed_checkbox']) echo 'checked'?> value="<?=$service['id']?>" class="child_checkbox" data-shoper_id="<?=$billing['id']?>" data-id="<?=$service['id']?>" data-parent_id="<?=$item['record_id']?>">
													<?php else:?>
                                                        <a href="<?=site_url('transactions/view_transaction/'.$service['last_payment_id'])?>" title="View payment transaction" class="btn btn-primary"><i class="fa fa-money"></i></a>
													<?php endif?>
												</td>
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