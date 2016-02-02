/*jQuery(document).ready(function() {
	jQuery('#store-locator').on('click',function(e){
		e.preventDefault();
		var data = {};
		$(".form-horizontal").serializeArray().map(function(x){data[x.name] = x.value;}); 
		jQuery.ajax({
			url:'test.html',
			data:data,
			type:'post',
			dataType:'json',
			success:function(data){
				console.log(data);
				$('.modal-content').html(data);
			}
		});
	});
});*/
jQuery(document).ready(function() {
var $modal = jQuery('#ajax-modal');
 
jQuery('#store-locator').on('click', function(){
  setTimeout(function(){
     $modal.load('test.php', '', function(){
      $modal.modal();
    });
  }, 1000);
});
 
$modal.on('click', '.update', function(){
  $modal.modal('loading');
  setTimeout(function(){
    $modal
      .modal('loading')
      .find('.modal-body')
        .prepend('<div class="alert alert-info fade in">' +
          'Updated!<button type="button" class="close" data-dismiss="alert">&times;</button>' +
        '</div>');
  }, 1000);
});
});