<?php
require 'getData.php';
$days=array('1'=>'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun');
?>
<div class="modal-dialog modal-sm" style="min-width:600px;">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <h4 class="modal-title">Business Hours</h4>
    </div>
    <form action="hours_sve.php" method="post" id="form">
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
              <tr>
                <td nowrap="nowrap"><input class="operation_day" name="<?php echo strtolower($day); ?>" type="checkbox" id="day-<?php echo $key; ?>" value="1" <?php echo ($day!='Sat' && $day!='Sun')?'checked':''; ?> >
                <?php echo $day; ?>
                <label for="<?php echo strtolower($day); ?>"></label></td>
                <td nowrap="nowrap"><label for="select"></label>
                <label for="open_h_<?php echo strtolower($day); ?>"></label>
                <input class="operation_hours" name="open_h_<?php echo strtolower($day); ?>" type="text" id="open_h_<?php echo strtolower($day); ?>" size="4" maxlength="2" max=12 min=0>
                <strong>:
                <input class="operation_hours" max=60 min=0 name="open_m_<?php echo strtolower($day); ?>" type="text" id="open_m_<?php echo strtolower($day); ?>" size="4" maxlength="2">
              </strong></td>
              <td align="center" nowrap="nowrap"><strong>
                <input type="radio" name="open_<?php echo strtolower($day); ?>_ampm" id="1" value="1">
                <input type="radio" name="open_<?php echo strtolower($day); ?>_ampm" id="2" value="2">
              </strong></td>
              <td width="20" nowrap="nowrap">&nbsp;</td>
              <td nowrap="nowrap"><label for="select"></label>
              <label for="break_start_h_<?php echo strtolower($day); ?>"></label>
              <input class="operation_hours" max=12 min=0 name="break_start_h_<?php echo strtolower($day); ?>" type="text" id="break_start_h_<?php echo strtolower($day); ?>" size="4" maxlength="2">
              <strong>:
              <input class="operation_hours" max=60 min=0 name="break_start_m_<?php echo strtolower($day); ?>" type="text" id="break_start_m_<?php echo strtolower($day); ?>" size="4" maxlength="2">
            </strong></td>
            <td align="center" nowrap="nowrap"><strong>
              <input type="radio" name="break_start_<?php echo strtolower($day); ?>_ampm" id="1" value="1">
              <input type="radio" name="break_start_<?php echo strtolower($day); ?>_ampm" id="2" value="2">
            </strong></td>
            <td width="10" align="center" nowrap="nowrap">-</td>
            <td nowrap="nowrap"><label for="select"></label>
            <label for="break_end_h_<?php echo strtolower($day); ?>"></label>
            <input  class="operation_hours" max=12 min=0 name="break_end_h_<?php echo strtolower($day); ?>" type="text" id="break_end_h_<?php echo strtolower($day); ?>" size="4" maxlength="2">
            <strong>:
            <input class="operation_hours" max=60 min=0 name="break_end_m_<?php echo strtolower($day); ?>" type="text" id="break_end_m_<?php echo strtolower($day); ?>" size="4" maxlength="2">
          </strong></td>
          <td align="center" nowrap="nowrap"><strong>
            <input type="radio" name="break_end_<?php echo strtolower($day); ?>_ampm" id="1" value="1">
            <input type="radio" name="break_end_<?php echo strtolower($day); ?>_ampm" id="2" value="2">
          </strong></td>
          <td width="20" nowrap="nowrap"></td>
          <td nowrap="nowrap"><label for="select"></label>
          <label for="close_h_<?php echo strtolower($day); ?>"></label>
          <input class="operation_hours" max=12 min=0 name="close_h_<?php echo strtolower($day); ?>" type="text" id="close_h_<?php echo strtolower($day); ?>" size="4" maxlength="2">
          <strong>:
          <input class="operation_hours"  max=60 min=0 name="close_m_<?php echo strtolower($day); ?>" type="text" id="close_m_<?php echo strtolower($day); ?>" size="4" maxlength="2">
        </strong></td>
        <td align="center" nowrap="nowrap"><strong>
          <input type="radio" name="close_<?php echo strtolower($day); ?>_ampm" id="1" value="1">
          <input type="radio" name="close_<?php echo strtolower($day); ?>_ampm" id="2" value="2">
        </strong></td>
      </tr>
      <?php endforeach; ?>
</tbody></table>
<input type="submit" value="Submit">
</p>
</div>
</form>
<div class="modal-footer">

</div>
</div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
<script src="jquery.min.js"></script>
<script>
  $(document).ready(function() {
    
    $(document).on('keyup','.operation_hours',function(){
      var max=this.getAttribute('max');
      var min=this.getAttribute('min');
      var num = parseInt(this.value, 10);

      if (isNaN(num)) {
          this.value = "";
          return;
      }

      this.value = Math.max(num, min);
      this.value = Math.min(num, max);
    });
    $(document).on('change','.operation_day',function(){
      if($(this).is(':checked'))
      {
        $(this).parent().parent().css('background-color','#fff').find('input[type=text], input[type=radio]').removeAttr('disabled').attr('required','required');
      }
      else
      {
        $(this).parent().parent().css('background-color','#c5c5c5').find('input[type=text], input[type=radio]').attr('disabled','disabled').removeAttr('required');
      }
    });
    $('.operation_day').trigger('change');
  });
</script>