<div class="row">
    <div class="col-md-12">
        <!-- BEGIN VALIDATION STATES-->
        <div class="portlet light portlet-fit portlet-form bordered">
            <div class="portlet-title">
                <div class="caption">
                    <!-- <i class="icon-settings font-red"></i>-->
                    <span class="caption-subject font-red sbold uppercase"><?=$this->lang->line('edit_employee')?></span>
                </div>
            </div>
            <div class="portlet-body">
                <!-- BEGIN FORM-->
                <form id="add_employee" class="form-horizontal" method="post">
                    <div class="form-body">

                        <?=validation_errors()?>
                        <div class="form-group">
                            <label class="control-label col-md-3"><?=$this->lang->line('login')?>
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-4">
                                <input type="text" name="login" required=""  class="form-control" value="<?=$employee['login']?>" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3"><?=$this->lang->line('password')?>
                                <span class="required"></span>
                            </label>
                            <div class="col-md-4">
                                <input type="password" id="password" name="password"   class="form-control" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3"><?=$this->lang->line('password_confirm')?>
                                <span class="required"></span>
                            </label>
                            <div class="col-md-4">
                                <input type="password" name="password_confirm"  class="form-control" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3"><?=$this->lang->line('first_name')?>
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-4">
                                <input type="text" name="first_name" required=""  class="form-control" value="<?=$employee['first_name']?>"  />
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3"><?=$this->lang->line('last_name')?>
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-4">
                                <input type="text" name="last_name" required=""  class="form-control" value="<?=$employee['last_name']?>"  />
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3"><?=$this->lang->line('email')?>
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-4">
                                <input type="email" name="email" required="" class="form-control" value="<?=$employee['email']?>" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3"><?=$this->lang->line('phone')?>
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-4">
                                <input type="text" name="phone" required="" class="form-control" value="<?=$employee['phone']?>" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3"><?=$this->lang->line('address')?>
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-4">
                                <input type="text" name="address" required="" class="form-control" value="<?=$employee['address']?>" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3"><?=$this->lang->line('role')?>
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-4">
                                <select name="role" class="form-control" required="required">
                                    <option value="0">Employee</option>
                                    <option value="1" <?php if($employee['role']) echo 'selected'?>>Admin</option>
                                </select>
                            </div>
                        </div>

                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-offset-3 col-md-9">
                                <button type="submit" class="btn green">Submit</button>
                            </div>
                        </div>
                    </div>
                </form>
                <!-- END FORM-->
            </div>
        </div>
        <!-- END VALIDATION STATES-->
    </div>
</div>