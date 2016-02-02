<?php require 'getData.php'; ?>
<form action="#" method="post" id="form">
    <div class="modal-body">
        <p>
            <div class="col-md-12">
                <div class="form-group">
                    <label class="control-label">Work Contact</label>
                    <input type="hidden" value="<?php echo isset($records['id'])?$records['id']:''; ?>" name="id" id="id" data-name="id" />
                    <input  maxlength="100" type="text" class="form-control" value="<?php echo isset($records['work_contact'])?$records['work_contact']:''; ?>" name="work_contact" id="work_contact" placeholder="Enter Work Contact"  />
                </div>
                <div class="form-group">
                    <label class="control-label">Home Contact</label>
                    <input  maxlength="100" type="text" class="form-control" id="home_contact" name="home_contact" value="<?php echo isset($records['home_contact'])?$records['home_contact']:''; ?>" placeholder="Enter Home Contact"  />
                </div>
                <div class="form-group">
                    <label class="control-label">Mobile</label>
                    <input  maxlength="100" type="text" class="form-control" id="mobile" name="mobile" value="<?php echo isset($records['mobile'])?$records['mobile']:''; ?>" placeholder="Enter Mobile"  />
                </div>
                <div class="form-group">
                    <label class="control-label">Fax No</label>
                    <input  maxlength="100" type="text" class="form-control" id="fax_no" name="fax_no" value="<?php echo isset($records['fax_no'])?$records['fax_no']:''; ?>" placeholder="Enter Fax No"  />
                </div>
                <div class="form-group">
                    <label class="control-label">Website URL</label>
                    <input  maxlength="100" type="text" class="form-control" id="website" name="website" value="<?php echo isset($records['website'])?$records['website']:''; ?>" placeholder="Enter Website URL"  />
                </div>
                <button type="submit" class="btn btn-primary">Save</button> 
                <button type="button" class="btn btn-default closed" data-dismiss="modal">Close</button>
            </div>
                
        </p>
    </div>
    </form>
<script>
    $(document).ready(function(){
        $(document).on('click','.closed',function(){
            $('#business-contact .data-body p').show();
            $('#business-contact .data-body .edit-content').html('');
            ab=0;
        });
        $('#form').on('submit',function(e){
            e.preventDefault();
            var param={
                id:$('#id').val(),
                work_contact:$('#work_contact').val(),
                home_contact:$('#home_contact').val(),
                fax_no:$('#fax_no').val(),
                mobile:$('#mobile').val(),
                website:$('#website').val()

            };
            var url='save-address.php';
            $.ajax({
                url:url,
                dataType:'json',
                data:param,
                type:'post',
                success:function(data){
                    json_record=data;
                    var t="<tr><td>Work Contact</td><td>"+param['work_contact']+"</td></tr><tr><td>Home Contact</td><td>"+param['home_contact']+"</td></tr><tr><td>Mobile</td><td>"+param['fax_no']+"</td></tr><tr><td>Fax No</td><td>"+param['mobile']+"</td></tr><tr><td>Website</td><td>"+param['website']+"</td></tr>";
                    var url=location.protocol + '//' + location.host + location.pathname;
                    url=url+"?id="+json_record.id;
                    window.history.pushState('','',url);
                    $('#business-contact .data-body table tbody').html(t);
                    $('#business-contact .data-body p').show();
                    $('#business-contact .data-body .edit-content').html('');
                    $('.closed').trigger('click');
                }
            });
        ab=0;
        });
        $('.done').on('click',function(){
            
        })
    });
</script>