<div class="row">
	<div class="col-md-12">
		<!-- BEGIN VALIDATION STATES-->
		<div class="portlet light portlet-fit portlet-form bordered">
			<div class="portlet-title">
				<div class="caption">
					<!-- <i class="icon-settings font-red"></i>-->
					<span class="caption-subject font-red sbold uppercase">Add Ad</span>
				</div>
			</div>
			<div class="portlet-body">
				<!-- BEGIN FORM-->
				<?php echo form_open_multipart('', array('id'=>'add_employee', 'class' => 'form-horizontal'));?>
					<div class="form-body">


						<?=validation_errors()?>
						<?php if(isset($upload_error)) echo '<p>',$upload_error,'</p>'?>
						<div class="form-group">
							<label class="control-label col-md-3"><?=$this->lang->line('image')?>
								<span class="required"> * </span>
							</label>
							<div class="col-md-4">
								<input type="file" name="userfile" size="20" />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3">Image Size
								<span class="required"> * </span>
							</label>
							<div class="col-md-4">
								<select name="size" class="form-control">
								<?php foreach($sizes as $key => $size):?>
									<option value="<?=$key?>"><?=$size['width'],'x',$size['height']?></option>
								<?php endforeach?>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3"><?=$this->lang->line('landing_page_url')?>
								<span class="required"> * </span>
							</label>
							<div class="col-md-4">
								<input type="url" name="url" required=""  class="form-control" />
							</div>
						</div>

						<div class="form-group">
							<label class="control-label col-md-3"><?=$this->lang->line('visible')?>
								<span class="required"> * </span>
							</label>
							<div class="col-md-4">
								<select name="visible" class="form-control">
									<option value="1"><?=$this->lang->line('visible')?></option>
									<option value="0"><?=$this->lang->line('not_visible')?></option>
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