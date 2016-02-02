<div class="page-head">
	<!-- BEGIN PAGE TITLE -->
	<div class="page-title">
		<h1><?=$this->lang->line('transactions')?></h1>
	</div>

	<!-- END PAGE BREADCRUMB -->
</div>
<?php if($this->session->flashdata('refund_success')):?>
	<div class="alert alert-success fade in">
		<a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
		<?=$this->lang->line('refund_completed')?>
	</div>
<?php endif?>

<?php if($this->session->flashdata('error_msg')):?>
	<div class="alert alert-danger fade in">
		<a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
		<?=$this->session->flashdata('error_msg')?>
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
			<div class="portlet-body table-responsive">
				<table class="table table-striped table-bordered table-hover" id="" style="text-align: center">
					<thead>
                    <tr class="search_fields">
                        <form>
                            <th><input type="text"  class="form-control" name="id" value="<?=$this->input->get('id')?>"></th>
                            <th><input type="text"  class="form-control" name="transaction_id" value="<?=$this->input->get('transaction_id')?>"></th>
                            <th><input type="text"  class="form-control" name="customer_id" value="<?=$this->input->get('customer_id')?>"></th>
                            <th><input type="text"  class="form-control" name="order_id" value="<?=$this->input->get('order_id')?>"></th>
                            <th>
                                <select name="type" class="form-control">
                                    <option value="">ANY</option>
                                    <option <?php if($this->input->get('type') == 'sale') echo 'selected'?>>sale</option>
                                    <option <?php if($this->input->get('type') == 'credit') echo 'selected'?>>credit</option>
                                </select>
                            </th>
                            <th><input type="text"  class="form-control" name="amount" value="<?=$this->input->get('amount')?>"></th>
                            <th>
                                <select name="currencyIsoCode" class="form-control">
                                    <option value="">ANY</option>
                                    <option <?php if($this->input->get('currencyIsoCode') == 'USD') echo 'selected'?>>USD</option>
                                    <option <?php if($this->input->get('currencyIsoCode') == 'GBP') echo 'selected'?>>GBP</option>
                                    <option <?php if($this->input->get('currencyIsoCode') == 'EUR') echo 'selected'?>>EUR</option>
                                </select>
                            </th>
                            <th><input type="text"  class="form-control" name="creditCardNumber" value="<?=$this->input->get('creditCardNumber')?>"></th>
                            <th><div class="input-group date date-picker margin-bottom-5" data-date-format="dd/mm/yyyy">
                                    <input type="text" class="form-control form-filter input-sm" readonly name="date_from" placeholder="From" value="<?=$this->input->get('date_from')?>">
                                                                <span class="input-group-btn">
                                                                    <button class="btn btn-sm default" type="button">
                                                                        <i class="fa fa-calendar"></i>
                                                                    </button>
                                                                </span>
                                </div>
                                <div class="input-group date date-picker" data-date-format="dd/mm/yyyy">
                                    <input type="text" class="form-control form-filter input-sm" readonly name="date_to" placeholder="To" value="<?=$this->input->get('date_to')?>">
                                                                <span class="input-group-btn">
                                                                    <button class="btn btn-sm default" type="button">
                                                                        <i class="fa fa-calendar"></i>
                                                                    </button>
                                                                </span>
                                </div></th>
                            <th><input type="submit" class="btn btn-success" value="Search"></th>
                        </form>
                    </tr>
					<tr>
						<th><?=$this->lang->line('id')?></th>
						<th>Transaction id</th>
						<th>Customer id</th>
                        <th><?=$this->lang->line('order_id')?></th>
                        <th>Type</th>
                        <th><?=$this->lang->line('amount')?></th>
						<th><?=$this->lang->line('currency')?></th>
                        <th><?=$this->lang->line('card_number')?></th>
						<th><?=$this->lang->line('created_at')?></th>
						<th><?=$this->lang->line('actions')?></th>
					</tr>
					</thead>

					<tbody>
					<?php foreach($transactions as $transaction): ?>
					<tr>
						<td><?=$transaction->id?></td>
                        <td><?=$transaction->transaction_id?></td>
                        <td><?=$transaction->customer_id?></td>
                        <td><?=$transaction->order_id?></td>
                        <td><?=$transaction->type?></td>
                        <td><?=$transaction->amount?></td>
                        <td><?=$transaction->currencyIsoCode?></td>
                        <td><?=$transaction->creditCardNumber?></td>
                        <td><?=$transaction->created_date?></td>
						<td>
							<?php if($transaction->type == 'sale'):?>
								<a href="<?=site_url('transactions/refund/'.$transaction->transaction_id)?>" class="btn btn-xs btn-success"><?=$this->lang->line('full_refund')?></a>
								<a href="<?=site_url('transactions/refund/'.$transaction->transaction_id)?>" class="btn btn-xs btn-warning partial_refund"><?=$this->lang->line('partial_refund')?></a>
							<?php endif?>
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
<style>
    tr.search_fields th input, tr.search_fields th select {
        width: 100px;
    }
</style>