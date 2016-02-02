<?php
if(!isset($active)) {
    $active = '';
}
?>
<div class="hor-menu  ">
	<ul class="nav navbar-nav">
		<li class="menu-dropdown classic-menu-dropdown <?php if(in_array($active, array('employees', 'employees_add'))) echo 'active'?>">
			<a href="javascript:;"> <?=$this->lang->line('employees')?>
			</a>
			<ul class="dropdown-menu pull-left">
                <li class="<?php if($active == 'employees') echo 'active'?>">
                    <a href="<?=site_url('employees')?>" class="nav-link ">
                        <span class="title"><?=$this->lang->line('all')?></span>
                        <span class="selected"></span>
                    </a>
                </li>
                <?php if($this->session->employee->role):?>
                    <li class="<?php if($active == 'employees_add') echo 'active'?>">
                        <a href="<?=site_url('employees/add')?>" class="nav-link ">
                            <span class="title"><?=$this->lang->line('add_new')?></span>
                        </a>
                    </li>
                <?php endif?>
			</ul>
		</li>

        <li class="menu-dropdown classic-menu-dropdown <?php if(in_array($active, array('ads', 'ads_add'))) echo 'active'?>">
            <a href="javascript:;"> <?=$this->lang->line('ads')?>
            </a>
            <ul class="dropdown-menu pull-left">
                <li class="<?php if($active == 'ads') echo 'active'?>">
                    <a href="<?=site_url('ads')?>" class="nav-link ">
                        <span class="title"><?=$this->lang->line('all')?></span>
                        <span class="selected"></span>
                    </a>
                </li>
                <li class="<?php if($active == 'ads_add') echo 'active'?>">
                    <a href="<?=site_url('ads/add')?>" class="nav-link ">
                        <span class="title"><?=$this->lang->line('add_new')?></span>
                    </a>
                </li>
            </ul>
        </li>

        <li class="menu-dropdown classic-menu-dropdown <?php if(in_array($active, array('transactions'))) echo 'active'?>">
            <a href="javascript:;"> <?=$this->lang->line('transactions')?>
            </a>
            <ul class="dropdown-menu pull-left">
                <li class="<?php if($active == 'transactions') echo 'active'?>">
                    <a href="<?=site_url('transactions')?>" class="nav-link ">
                        <span class="title"><?=$this->lang->line('all')?></span>
                        <span class="selected"></span>
                    </a>
                </li>
            </ul>
        </li>

        <li class="menu-dropdown classic-menu-dropdown <?php if(in_array($active, array('receive_packages_from_carrier', 'receive_package_from_customer', 'give_package_to_customer', 'give_package_to_carrier', 'delivery_requests_list', 'inventory'))) echo 'active'?>">
            <a href="javascript:;"> <?=$this->lang->line('products')?>
            </a>
            <ul class="dropdown-menu pull-left">
                <li class="<?php if($active == 'receive_packages_from_carrier') echo 'active'?>">
                    <a href="<?=site_url('products/receive_packages_from_carrier')?>" class="nav-link ">
                        <span class="title"><?=$this->lang->line('receive_packages_from_carrier')?></span>
                        <span class="selected"></span>
                    </a>
                </li>
                <li class="<?php if($active == 'receive_package_from_customer') echo 'active'?>">
                    <a href="<?=site_url('products/receive_package_from_customer')?>" class="nav-link ">
                        <span class="title"><?=$this->lang->line('receive_package_from_customer')?></span>
                        <span class="selected"></span>
                    </a>
                </li>
                <li class="<?php if($active == 'give_package_to_customer') echo 'active'?>">
                    <a href="<?=site_url('products/give_package_to_customer')?>" class="nav-link ">
                        <span class="title"><?=$this->lang->line('give_package_to_customer')?></span>
                        <span class="selected"></span>
                    </a>
                </li>
                <li class="<?php if($active == 'give_package_to_carrier') echo 'active'?>">
                    <a href="<?=site_url('products/give_package_to_carrier')?>" class="nav-link ">
                        <span class="title"><?=$this->lang->line('give_package_to_carrier')?></span>
                        <span class="selected"></span>
                    </a>
                </li>
                <li class="<?php if($active == 'delivery_requests_list') echo 'active'?>">
                    <a href="<?=site_url('products/delivery_requests_list')?>" class="nav-link ">
                        <span class="title"><?=$this->lang->line('delivery_requests_list')?></span>
                        <span class="selected"></span>
                    </a>
                </li>
                <li class="<?php if($active == 'inventory') echo 'active'?>">
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
</div>
<!-- END MEGA MENU -->
</div>
</div>
<!-- END HEADER MENU -->
</div>
<!-- END HEADER -->
<!-- BEGIN CONTAINER -->
<div class="page-container">
	<!-- BEGIN CONTENT -->
	<div class="page-content-wrapper" style="padding:10px">
		<!-- BEGIN CONTENT BODY -->
		<!-- BEGIN PAGE HEAD-->