<?php require 'getData.php'; ?>
<form action="#" method="post" id="form">
<div class="modal-body">
    <div class="form-group">
        <input type="hidden" value="<?php echo isset($records['id'])?$records['id']:''; ?>" name="id" id="id" data-name="id" />
        <input  maxlength="100" type="text" required="required" data-name="store_name" value="<?php echo isset($records['store_name'])?$records['store_name']:''; ?>" class="form-control" id="store-name" name="store_name" placeholder="Enter Business Name"  />
    </div>
        <button type="submit" class="btn btn-primary done">Save</button>
    <button type="button" class="btn btn-default closed" data-dismiss="modal">Close</button>
</div>
</form>
<script>
    $(document).ready(function(){
        $(document).on('click','.closed',function(e){
            e.stopPropagation();
            
            $('#business-name .data-body p').show();
            $('#business-name .data-body .edit-content').html('');
            ab=0;
        });
        $('#form').on('submit',function(e){
            e.preventDefault();
            var param={
                id:$('#id').val(),
                store_name:$('#store-name').val()
            };
            var url='save-address.php';
            $.ajax({
                url:url,
                dataType:'json',
                data:param,
                type:'post',
                success:function(data){
                    json_record=data;
                    var url=location.protocol + '//' + location.host + location.pathname;
                    url=url+"?id="+json_record.id;
                    window.history.pushState('','',url);
                    $('#business-name .data-body p').html(param.store_name);
                    $('#business-name .data-body p').show();
                    $('#business-name .data-body .edit-content').html('');
                    $('.closed').trigger('click');
                }
            });
            ab=0;
        });
        $('.done').on('click',function(){
            
        })
    });
</script>