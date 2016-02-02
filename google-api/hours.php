<?php
require 'getData.php';
$days=array('1'=>'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun');
$operation_hours=isset($records['operation_hours'])?$records['operation_hours']:'';
$hrs=json_decode($operation_hours,true);
?>
<style type="text/css" media="screen">
  table input[type=text] {
    width: 45px;
}
</style>
<form action="#" method="post" id="form">
      <input type="hidden" value="<?php echo isset($records['id'])?$records['id']:''; ?>" name="id" id="id" data-name="id" />
      <div class="modal-body">
        <p>
          <table width="" border="0">
            <tbody>
              <tr align="center">
                <td nowrap="nowrap">&nbsp;</td>
                <td colspan="2" nowrap="nowrap">Open</td>
                <td nowrap="nowrap">&nbsp;</td>
                <td colspan="2" nowrap="nowrap">Brake From</td>
                <td nowrap="nowrap">&nbsp;</td>
                <td colspan="2" nowrap="nowrap">Brake Till</td>
                <td nowrap="nowrap"></td>
                <td colspan="2" nowrap="nowrap">Close</td>
              </tr>
              <tr align="center">
                <td nowrap="nowrap">&nbsp;</td>
                <td nowrap="nowrap">&nbsp;</td>
                <td nowrap="nowrap">AM  PM</td>
                <td nowrap="nowrap">&nbsp;</td>
                <td nowrap="nowrap">&nbsp;</td>
                <td nowrap="nowrap">AM  PM</td>
                <td nowrap="nowrap">&nbsp;</td>
                <td nowrap="nowrap">&nbsp;</td>
                <td nowrap="nowrap">AM  PM</td>
                <td nowrap="nowrap"></td>
                <td nowrap="nowrap">&nbsp;</td>
                <td nowrap="nowrap">AM  PM</td>
              </tr>
              <?php foreach($days as $key=>$day): ?>
              <?php 
                
                $status='';
                $open_hours='';
                $open_minute='';
                $open_time='';

                $close_hours='';
                $close_minute='';
                $close_time='';

                $break_start_hours='';
                $break_start_minute='';
                $break_start_time='';

                $break_end_hours='';
                $break_end_minute='';
                $break_end_time='';
                if(count($hrs)>0)
                {
                  $dayHours=$hrs[strtolower($day)];
                  if($dayHours['status']=='Opened')
                  {
                    $status='checked';
                    $open=explode(':',$dayHours['open']);
                    $open_hours=$open[0];
                    $open=explode(' ',$open[1]);
                    $open_minute=$open[0];
                    $open_time=$open[1];

                    $close=explode(':',$dayHours['close']);
                    $close_hours=$close[0];
                    $close=explode(' ',$close[1]);
                    $close_minute=$close[0];
                    $close_time=$close[1];

                    if($dayHours['break_start']!='')
                    {
                      $break_start=explode(':',$dayHours['break_start']);
                      $break_start_hours=$break_start[0];
                      $break_start=explode(' ',$break_start[1]);
                      $break_start_minute=$break_start[0];
                      $break_start_time=$break_start[1];
                    }
                      
                    if($dayHours['break_end']!='')
                    {
                      $break_end=explode(':',$dayHours['break_end']);
                      $break_end_hours=$break_end[0];
                      $break_end=explode(' ',$break_end[1]);
                      $break_end_minute=$break_end[0];
                      $break_end_time=$break_end[1];
                    }
                      
                  }
                  elseif($dayHours['status']=='Closed'){
                    $open_hours='';
                    $open_minute='';
                    $open_time='';

                    $close_hours='';
                    $close_minute='';
                    $close_time='';

                    $break_start_hours='';
                    $break_start_minute='';
                    $break_start_time='';

                    $break_end_hours='';
                    $break_end_minute='';
                    $break_end_time='';
                  }
                }elseif($day!='Sat' && $day!='Sun')
                  {
                    $status='checked';
                  }
              ?>
              <tr>
                <td nowrap="nowrap"><input class="operation_day" name="<?php echo strtolower($day); ?>" type="checkbox" id="day-<?php echo $key; ?>" value="1" <?php echo $status; ?> >
                <?php echo $day; ?>
                <label for="<?php echo strtolower($day); ?>"></label></td>
                <td nowrap="nowrap"><label for="select"></label>
                <label for="open_h_<?php echo strtolower($day); ?>"></label>
                <input class="operation_hours" name="open_h_<?php echo strtolower($day); ?>" type="text" id="open_h_<?php echo strtolower($day); ?>" size="4" value="<?php echo isset($open_hours)?$open_hours:''; ?>" maxlength="2" max=12 min=0>
                <strong>:
                <input class="operation_hours" max=59 min=0 name="open_m_<?php echo strtolower($day); ?>" type="text" value="<?php echo isset($open_minute)?$open_minute:''; ?>" id="open_m_<?php echo strtolower($day); ?>" size="4" maxlength="2">
              </strong></td>
              <td align="center" nowrap="nowrap"><strong>
                <input type="radio" name="open_<?php echo strtolower($day); ?>_ampm" <?php echo ($open_time==1)?'checked':''; ?> id="1" value="1">
                <input type="radio" name="open_<?php echo strtolower($day); ?>_ampm" <?php echo ($open_time==2)?'checked':''; ?> id="2" value="2">
              </strong></td>
              <td width="20" nowrap="nowrap">&nbsp;</td>
              <td nowrap="nowrap"><label for="select"></label>
              <label for="break_start_h_<?php echo strtolower($day); ?>"></label>
              <input class="operation_hours" max=12 min=0 name="break_start_h_<?php echo strtolower($day); ?>" type="text" value="<?php echo isset($break_start_hours)?$break_start_hours:''; ?>" id="break_start_h_<?php echo strtolower($day); ?>" size="4" maxlength="2">
              <strong>:
              <input class="operation_hours" max=59 min=0 name="break_start_m_<?php echo strtolower($day); ?>" type="text" value="<?php echo isset($break_start_minute)?$break_start_minute:''; ?>" id="break_start_m_<?php echo strtolower($day); ?>" size="4" maxlength="2">
            </strong></td>
            <td align="center" nowrap="nowrap"><strong>
              <input type="radio" <?php echo ($break_start_time==1)?'checked':''; ?> name="break_start_<?php echo strtolower($day); ?>_ampm" id="1" value="1">
              <input type="radio" <?php echo ($break_start_time==2)?'checked':''; ?> name="break_start_<?php echo strtolower($day); ?>_ampm" id="2" value="2">
            </strong></td>
            <td width="10" align="center" nowrap="nowrap">-</td>
            <td nowrap="nowrap"><label for="select"></label>
            <label for="break_end_h_<?php echo strtolower($day); ?>"></label>
            <input  class="operation_hours" max=12 min=0 name="break_end_h_<?php echo strtolower($day); ?>" type="text" value="<?php echo isset($break_end_hours)?$break_end_hours:''; ?>" id="break_end_h_<?php echo strtolower($day); ?>" size="4" maxlength="2">
            <strong>:
            <input class="operation_hours" max=59 min=0 name="break_end_m_<?php echo strtolower($day); ?>" type="text" value="<?php echo isset($break_end_minute)?$break_start_minute:''; ?>" id="break_end_m_<?php echo strtolower($day); ?>" size="4" maxlength="2">
          </strong></td>
          <td align="center" nowrap="nowrap"><strong>
            <input type="radio" <?php echo ($break_end_time==1)?'checked':''; ?> name="break_end_<?php echo strtolower($day); ?>_ampm" id="1" value="1">
            <input type="radio" <?php echo ($break_end_time==2)?'checked':''; ?> name="break_end_<?php echo strtolower($day); ?>_ampm" id="2" value="2">
          </strong></td>
          <td width="20" nowrap="nowrap"></td>
          <td nowrap="nowrap"><label for="select"></label>
          <label for="close_h_<?php echo strtolower($day); ?>"></label>
          <input class="operation_hours" max=12 min=0 name="close_h_<?php echo strtolower($day); ?>" type="text" value="<?php echo isset($close_hours)?$close_hours:''; ?>" id="close_h_<?php echo strtolower($day); ?>" size="4" maxlength="2">
          <strong>:
          <input class="operation_hours"  max=59 min=0 name="close_m_<?php echo strtolower($day); ?>" type="text" value="<?php echo isset($close_minute)?$close_minute:''; ?>" id="close_m_<?php echo strtolower($day); ?>" size="4" maxlength="2">
        </strong></td>
        <td align="center" nowrap="nowrap"><strong>
          <input type="radio" name="close_<?php echo strtolower($day); ?>_ampm" <?php echo ($close_time==1)?'checked':''; ?> id="1" value="1">
          <input type="radio" name="close_<?php echo strtolower($day); ?>_ampm" <?php echo ($close_time==2)?'checked':''; ?> id="2" value="2">
        </strong></td>
      </tr>
      <?php endforeach; ?>
</tbody></table>
<button type="submit" class="btn btn-primary">Save</button> 
<button type="button" class="btn btn-default closed" data-dismiss="modal">Close</button>
</p>
</div>
</form>
<script>
    $(document).ready(function(){
        $(document).on('click','.closed',function(){
            $('#business-hours .data-body p').show();
            $('#business-hours .data-body .edit-content').html('');
            ab=0;
        });
        $('#form').on('submit',function(e){
            e.preventDefault();
            var dta=$(this).serialize();
            var url='save-address.php';
            $.ajax({
                url:url,
                dataType:'json',
                data:dta,
                type:'post',
                success:function(data){
                    json_record=data;
                    var url=location.protocol + '//' + location.host + location.pathname;
                    var hrs=$.parseJSON(data.operation_hours);
                    var d=["mon","tue","wed","thu","fri","sat","sun"];
                    var h='<table class="table table-bordered"><thead><tr><th>Day</th><th>Open Time</th><th>Break Start</th><th>Break End</th><th>Close Time</th></tr></thead><tbody>';
                    $.each(d, function(i, v){
                      $.each(hrs, function(index, value){
                        if(v==index)
                        {
                          h +='<tr>';
                          if(value.status=='Opened')
                          {
                            h +='<td>'+index+'</td>';
                            var t=value.open.split(' ');
                            if(t[1]=='1')
                            {
                              value.open=t[0]+" AM";
                            }
                            else{
                              value.open=t[0]+" PM";
                            }
                            h +='<td>'+value.open+'</td>';

                            if(value.break_start!=null)
                            {
                              var t=value.break_start.split(' ');
                              if(t[1]=='1')
                              {
                                value.break_start=t[0]+" AM";
                              }
                              else{
                                value.break_start=t[0]+" PM";
                              }
                              h +='<td>'+value.break_start+'</td>';
                            }
                            else
                            {
                              h +='<td></td>';
                            }

                            if(value.break_end!=null)
                            {
                              var t=value.break_end.split(' ');
                              if(t[1]=='1')
                              {
                                value.break_end=t[0]+" AM";
                              }
                              else{
                                value.break_end=t[0]+" PM";
                              }
                              h +='<td>'+value.break_end+'</td>';
                            }
                            else
                            {
                              h +='<td></td>';
                            }
                            t=value.close.split(' ');
                            if(t[1]=='1')
                            {
                              value.close=t[0]+" AM";
                            }
                            else{
                              value.close=t[0]+" PM";
                            }
                            h +='<td>'+value.close+'</td>';
                          }
                          else
                          {
                            h +='<td>'+index+'</td>';
                            h +='<td colspan=4>Closed</td>';
                          }
                          h +='</tr>';
                        }
                      });
                    });
                    h +='</tbody></table>';
                    url=url+"?id="+json_record.id;
                    window.history.pushState('','',url);
                    $('#business-hours .data-body p').html(h);
                    $('#business-hours .data-body p').show();
                    $('#business-hours .data-body .edit-content').html('');
                    $('.closed').trigger('click');
                }
            });
            ab=0;
        });
        $(document).on('keyup','.operation_hours',function(){
          var max=this.getAttribute('max');
          var min=this.getAttribute('min');
          var val=this.value;
          var num = parseInt(this.value, 10);
          if (isNaN(num)) {
              this.value = "";
              return;
          }

          if(val.length==2){
            var tmp= Math.max(num, min);
            tmp = Math.min(num, max);
            if(tmp<10)
            {
              this.value = "0"+tmp;  
            }
            else{
              this.value = tmp;
            }
            
          }
          else{
            var tmp= Math.max(num, min);
            tmp = Math.min(num, max);
            this.value = tmp;
          }
          /*
          
          
          this.value = tmp;*/
          /*if(tmp<10)
          {
            this.value = "0"+tmp;
          }
          else{
            
          }*/
          
        });
        $(document).on('change','.operation_day',function(){
          if($(this).is(':checked'))
          {
            $(this).parent().parent().css('background-color','#fff').find('input[type=text], input[type=radio]').removeAttr('disabled').attr('required','required');
            $(this).parent().parent().find("input[name^='break']").removeAttr('required');

          }
          else
          {
            $(this).parent().parent().css('background-color','#c5c5c5').find('input[type=text], input[type=radio]').attr('disabled','disabled').removeAttr('required');
          }
        });
        $('.operation_day').trigger('change');
    });
</script>