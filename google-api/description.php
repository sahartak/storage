<?php require 'getData.php'; ?>
<form action="#" method="post" id="form">
        <div class="modal-body">
            <p>
                <div class="col-md-12">
                    <div class="form-group">
                    <input type="hidden" value="<?php echo isset($records['id'])?$records['id']:''; ?>" name="id" id="id" data-name="id" />
                        <label class="control-label">Description</label>
                    <textarea required class="form-control" name="description" id="description"> <?php echo isset($records['description'])?$records['description']:''; ?></textarea>
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
            $('#business-description .data-body p').show();
            $('#business-description .data-body .edit-content').html('');
            ab=0;
        });
        $('#form').on('submit',function(e){
            e.preventDefault();
            var param={
                id:$('#id').val(),
                description:$('#description').val()
            };
            var url='save-address.php';
            $.ajax({
                url:url,
                dataType:'json',
                data:param,
                type:'post',
                success:function(data){
                    json_record=data;
                    $('#business-description .data-body p').html(param.description);
                    $('#business-description .data-body p').show();
                    $('#business-description .data-body .edit-content').html('');
                    $('.closed').trigger('click');
                }
            });
            ab=0;
        });
        $('.done').on('click',function(){
            
        })
    });
</script>