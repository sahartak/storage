<?php
if(!isset($active)) {
	$active = '';
}
?>
<!-- BEGIN SIDEBAR -->
<div class="page-sidebar-wrapper">
	<!-- BEGIN SIDEBAR -->
	<!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
	<!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
	<div class="page-sidebar navbar-collapse collapse">
		<!-- BEGIN SIDEBAR MENU -->
		<!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
		<!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
		<!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
		<!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
		<!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
		<!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
		<ul class="page-sidebar-menu   " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
			<li class="nav-item start <?php if(in_array($active, array('employees', 'employees_add'))) echo 'active open'?>">
				<a href="javascript:;" class="nav-link nav-toggle">
					<i class="fa fa-users"></i>
					<span class="title"><?=$this->lang->line('employees')?></span>
					<span class="selected"></span>
					<span class="arrow <?php if(in_array($active, array('employees', 'employees_add'))) echo 'open'?>"></span>
				</a>
				<ul class="sub-menu">
					<li class="nav-item start <?php if($active == 'employees') echo 'active'?>">
						<a href="<?=site_url('employees')?>" class="nav-link ">
							<span class="title"><?=$this->lang->line('all')?></span>
							<span class="selected"></span>
						</a>
					</li>
					<?php if($this->session->employee->role):?>
					<li class="nav-item start <?php if($active == 'employees_add') echo 'active'?>">
						<a href="<?=site_url('employees/add')?>" class="nav-link ">
							<span class="title"><?=$this->lang->line('add_new')?></span>
						</a>
					</li>
					<?php endif?>
				</ul>
			</li>

			<li class="nav-item start <?php if(in_array($active, array('ads', 'ads_add'))) echo 'active open'?>">
				<a href="javascript:;" class="nav-link nav-toggle">
					<i class="fa fa-buysellads"></i>
					<span class="title"><?=$this->lang->line('ads')?></span>
					<span class="selected"></span>
					<span class="arrow <?php if(in_array($active, array('ads', 'ads_add'))) echo 'open'?>"></span>
				</a>
				<ul class="sub-menu">
					<li class="nav-item start <?php if($active == 'ads') echo 'active'?>">
						<a href="<?=site_url('ads')?>" class="nav-link ">
							<span class="title"><?=$this->lang->line('all')?></span>
							<span class="selected"></span>
						</a>
					</li>
					<?php if($this->session->employee->role):?>
						<li class="nav-item start <?php if($active == 'ads_add') echo 'active'?>">
							<a href="<?=site_url('ads/add')?>" class="nav-link ">
								<span class="title"><?=$this->lang->line('add_new')?></span>
							</a>
						</li>
					<?php endif?>
				</ul>
			</li>

			<li class="nav-item start <?php if(in_array($active, array('transactions'))) echo 'active open'?>">
				<a href="javascript:;" class="nav-link nav-toggle">
					<i class="fa fa-exchange"></i>
					<span class="title"><?=$this->lang->line('transactions')?></span>
					<span class="selected"></span>
					<span class="arrow <?php if(in_array($active, array('transactions'))) echo 'open'?>"></span>
				</a>
				<ul class="sub-menu">
					<li class="nav-item start <?php if($active == 'transactions') echo 'active'?>">
						<a href="<?=site_url('transactions')?>" class="nav-link ">
							<span class="title"><?=$this->lang->line('all')?></span>
							<span class="selected"></span>
						</a>
					</li>
				</ul>
			</li>

			<li class="nav-item start <?php if(in_array($active, array('receive_packages_from_carrier', 'receive_package_from_customer', 'give_package_to_customer', 'give_package_to_carrier', 'delivery_requests_list', 'inventory'))) echo 'active open'?>">
				<a href="javascript:;" class="nav-link nav-toggle">
					<i class="fa fa-car"></i>
					<span class="title"><?=$this->lang->line('products')?></span>
					<span class="selected"></span>
					<span class="arrow <?php if(in_array($active, array('receive_packages_from_carrier', 'receive_package_from_customer', 'give_package_to_customer', 'give_package_to_carrier', 'delivery_requests_list', 'inventory'))) echo 'open'?>"></span>
				</a>
				<ul class="sub-menu">
					<li class="nav-item start <?php if($active == 'receive_packages_from_carrier') echo 'active'?>">
						<a href="<?=site_url('products/receive_packages_from_carrier')?>" class="nav-link ">
							<span class="title"><?=$this->lang->line('receive_packages_from_carrier')?></span>
							<span class="selected"></span>
						</a>
					</li>
					<li class="nav-item start <?php if($active == 'receive_package_from_customer') echo 'active'?>">
						<a href="<?=site_url('products/receive_package_from_customer')?>" class="nav-link ">
							<span class="title"><?=$this->lang->line('receive_package_from_customer')?></span>
							<span class="selected"></span>
						</a>
					</li>
					<li class="nav-item start <?php if($active == 'give_package_to_customer') echo 'active'?>">
						<a href="<?=site_url('products/give_package_to_customer')?>" class="nav-link ">
							<span class="title"><?=$this->lang->line('give_package_to_customer')?></span>
							<span class="selected"></span>
						</a>
					</li>
					<li class="nav-item start <?php if($active == 'give_package_to_carrier') echo 'active'?>">
						<a href="<?=site_url('products/give_package_to_carrier')?>" class="nav-link ">
							<span class="title"><?=$this->lang->line('give_package_to_carrier')?></span>
							<span class="selected"></span>
						</a>
					</li>
					<li class="nav-item start <?php if($active == 'delivery_requests_list') echo 'active'?>">
						<a href="<?=site_url('products/delivery_requests_list')?>" class="nav-link ">
							<span class="title"><?=$this->lang->line('delivery_requests_list')?></span>
							<span class="selected"></span>
						</a>
					</li>
					<li class="nav-item start <?php if($active == 'inventory') echo 'active'?>">
						<a href="<?=site_url('products/inventory')?>" class="nav-link ">
							<span class="title"><?=$this->lang->line('inventory')?></span>
							<span class="selected"></span>
						</a>
					</li>
				</ul>
			</li>

			<li class="<?php if($active == 'billings') echo 'active'?>"><a href="<?=site_url('billings')?>" >Billings</a></li>
			<li><a href="<?=site_url('payments/pay_form')?>"  >Pay Form</a></li>

		</ul>
		<!-- END SIDEBAR MENU -->
	</div>
	<!-- END SIDEBAR -->
</div>
<!-- END SIDEBAR -->

<!-- BEGIN CONTENT -->

<div class="page-content-wrapper">
	<!-- BEGIN CONTENT BODY -->
	<div class="page-content">