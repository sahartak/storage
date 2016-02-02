<?php if($result = $this->session->flashdata('result')):?>
    <div class="alert alert-<?=$result['success'] ? 'success' : 'danger'?> fade in">
        <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
        <?=$result['message']?>
    </div>
<?php endif?>
<div class="row">
	<div class="col-md-12">
		<!-- BEGIN EXAMPLE TABLE PORTLET-->
		<div class="portlet light bordered">
			<div class="portlet-body table-responsive">
				<h3>Payment Details</h3>
				<table class="table table-striped table-bordered table-hover">
					<thead>
						<tr>
							<th>Customer id</th>
							<th>Customer name</th>
							<th>Date</th>
							<th>Amount</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td><?=$payment['customer_id']?></td>
							<td><?=$payment['name']?></td>
							<td><?=$payment['created']?></td>
							<td><?=$payment['amount']?></td>
						</tr>
					</tbody>
				</table>

                <h3>Transactions</h3>
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th><?=$this->lang->line('id')?></th>
                            <th>Transaction id</th>
                            <th>Type</th>
                            <th><?=$this->lang->line('amount')?></th>
                            <th><?=$this->lang->line('currency')?></th>
                            <th><?=$this->lang->line('card_number')?></th>
                            <th><?=$this->lang->line('created_at')?></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach($payment['transactions'] as $transaction): ?>
                        <tr>
                            <td><?=$transaction->id?></td>
                            <td><?=$transaction->transaction_id?></td>
                            <td><?=$transaction->type?></td>
                            <td><?=$transaction->amount?></td>
                            <td><?=$transaction->currencyIsoCode?></td>
                            <td><?=$transaction->creditCardNumber?></td>
                            <td><?=$transaction->created_date?></td>
                        </tr>
                    <?php endforeach?>
                    </tbody>
                </table>

				<h3>Billed Services</h3>
				<table class="table table-striped table-bordered table-hover">
					<thead>
						<tr>
							<th>service_id</th>
							<th>shipment_id</th>
							<th>Service type</th>
							<th>item_id</th>
							<th>charge</th>
							<th>status</th>
							<th>Actions</th>
						</tr>
					</thead>

					<tbody>
					<?php foreach($payment['services'] as $service):?>
						<tr>
							<td><?=$service['service_id']?></td>
							<td><?=$service['shipment_id']?></td>
							<td><?=$service_types[$service['service_type']]?></td>
							<td><?=$service['item_id']?></td>
							<td><?=$service['charge']?></td>
							<td><?=$service['billed'] == 1 ? 'paid' : 'refunded'?></td>
							<td>
							<?php if($service['billed']==1):?>
								<a class="btn btn-warning" href="<?=site_url('transactions/service_refund/'.$service['service_id'])?>">
                                    Refund <?=$service['charge']?>
								</a>
							<?php endif?>
							</td>
						</tr>
					<?php endforeach?>
					</tbody>
				</table>

				</div>
			</div>
		</div>
	</div>
</div>