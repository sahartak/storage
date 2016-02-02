$(document).ready(function() {
	$('#best_submit').click(function() {
		var tracking_number = $('#tracking_id').val();
		if(tracking_number) {
			$.post( $('#best_submit_url').val(), { tracking_number: tracking_number}).done(function(jsondata) {
				var data = $.parseJSON(jsondata);
				if(data.success) {
					$('#customer_id').val(data.product.customer_id);
                    $('#carrier_id option[value='+data.product.carrier_id+']').prop('selected', true);
					var output = 'Customer: <br />' +data.product.name+ '<br />'+ data.product.address + '<br />';
					$('#label_info').html(output);
					$('#shipment_id').val(data.product.shipment_id)
				} else if(data.message) {
					$('#label_info').html(data.message);
				}
			});
		} else {
			alert('empty tracking number');
		}
	});

	$('#good_submit').click(function() {
		var customer_number = $('#customer_id').val();
		var tracking_number = $('#tracking_id').val();
		if(customer_number) {
			$.post( $('#good_submit_url').val(), { customer_number: customer_number}).done(function(jsondata) {
				var data = $.parseJSON(jsondata);
				if(data.success) {
					var output = 'Customer: <br />' +data.product.name+ '<br />'+ data.product.address + '<br />';
					$('#label_info').html(output);
				} else if(data.message) {
					$('#label_info').html(data.message);
				}
			});
		} else {
			alert('empty customer or tracking number');
		}
	});

	$('.store_attr input').change(function() {
		var weight = parseInt($('#store_weight').val());
		var size1 = parseInt($('#store_size1').val());
		var size2 = parseInt($('#store_size2').val());
		var size3 = parseInt($('#store_size3').val());
		if(weight && size1 && size2 && size3) {
			$.post( $('#get_price_url').val(), { weight: weight, size1: size1, size2: size2, size3: size3}).done(function(data) {
				data = parseFloat(data);
				$('#price').text('$'+data);
			});
		}
	});

	$('#split').click(function(){
		var shipment_id = $('.items_check:checked').attr('data-shipment');
		if(!shipment_id) {
			alert('not selected items');
			return false;
		}

		if($('.items_check:checked').length < 2) {
			alert('only one item selected!');
			return false;
		}

		var items = [];

		var break_function = false;
		$('.items_check:checked').each(function(){
			if(shipment_id != $(this).attr('data-shipment')) {
				alert('there is a items with different shipment #');
				break_function = true;
				return false;
			}
			items.push($(this).val());
		});
		if(break_function) {
			return false;
		}
		split_merge_shipments('split', items, shipment_id);

	});

	$('#merge').click(function() {

		if(!$('.items_check:checked').length) {
			alert('not selected items');
			return false;
		}

		if($('.items_check:checked').length < 2) {
			alert('only one item selected!');
			return false;
		}

		var items = [];
		$('.items_check:checked').each(function(){
			items.push($(this).val());
		});
		split_merge_shipments('merge', items);
	});

	function split_merge_shipments(action, items, shipment_id) {
		$.post( $('#split_merge_url').val()+'/'+action, {shipment_id: shipment_id, items: items, action: action}).done(function(jsondata) {
			var data = $.parseJSON(jsondata);
			console.log(data);
			if(data.success) {
				window.location.reload();
			} else if(data.message) {
				alert(data.message);
			}
		});
	}

	$('#locations').click(function(){
		var items = $('.items_check:checked');
		var locations = $('#locations_list').html();
		if(!items.length) {
			alert('not selected items');
			return false;
		}
		var modal = $($(this).attr('href'));
		var inner_html = '';
		items.each(function(){
			var tr = $(this).closest('tr');
			var item_line = '<tr><td>'
								+tr.find('td:eq(2)').text()+
							'</td><td>'+tr.find('td:eq(8)').text() +
							'</td><td>'+
								'<input type="hidden" name="items_id[]" value="'+$(this).val()+'" />'+
								'<select name="next_locations[]" class="form-control next_locations" > '+ locations +
								'</select></td>';
			inner_html += item_line;
		});
		modal.find('tbody').html(inner_html);
	});

	$('body').on('change', '.present_checkboxes', function() {
		var id = $(this).val();
		var is_present = $(this).prop('checked') ? 1 : 0;
		$.post( $('#change_present_url').val(), {id: id, is_present: is_present});
	});

	$('#give_package_to_carrier_form #carrier_id').change(function(){
		var carrier_id = $(this).val();
		if(!carrier_id) {
			$('#carrier_packages').html('');
			return false;
		}
		$.post( $('#get_carrier_items_url').val(), {carrier_id: carrier_id}).done(function(data) {
			if(data) {
				$('#carrier_packages').html(data);
				init_checkboxes();
				$('#give_carrier_submit').removeClass('hidden');
			} else {
				$('#carrier_packages').html('');
				alert('not found packages');
				$('#give_carrier_submit').addClass('hidden');
			}
		});
	});

    $('#give_package_to_carrier_form').submit(function(){
        if(!$('.carrier_items_check:checked').length) {
            alert('you didn\'t select packages');
            return false;
        }
    });

});

var TableDatatablesAjax = function () {

	var initPickers = function () {
		//init date pickers
		$('.date-picker').datepicker({
			format : "yyyy-mm-dd",
			autoclose: true
		});
	}

	var handleRecords = function () {

		var grid = new Datatable();

		grid.init({
			src: $("#datatable_ajax"),
			onSuccess: function (grid, response) {

				// grid:        grid object
				// response:    json object of server side ajax response
				// execute some code after table records loaded
			},
			onError: function (grid) {
				// execute some code on network or other general error
			},
			onDataLoad: function(grid) {
				// execute some code on ajax data load
				$('tr.heading th').removeClass('sorting_asc').removeClass('sorting').addClass('sorting_disabled');
			},
			loadingMessage: 'Loading...',
			dataTable: { // here you can define a typical datatable settings from http://datatables.net/usage/options

				// Uncomment below line("dom" parameter) to fix the dropdown overflow issue in the datatable cells. The default datatable layout
				// setup uses scrollable div(table-scrollable) with overflow:auto to enable vertical scroll(see: assets/global/scripts/datatable.js).
				// So when dropdowns used the scrollable div should be removed.
				//"dom": "<'row'<'col-md-8 col-sm-12'pli><'col-md-4 col-sm-12'<'table-group-actions pull-right'>>r>t<'row'<'col-md-8 col-sm-12'pli><'col-md-4 col-sm-12'>>",

				"bStateSave": true, // save datatable state(pagination, sort, etc) in cookie.

				"lengthMenu": [
					[5, 10, 25],
					[5, 10, 25] // change per page values here
				],
				"pageLength": 5, // default record count per page
				"ajax": {
					"url": $('#ajax_url').val() // ajax source
				},
				/*  "order": [
				 [1, "asc"]
				 ]// set first column as a default sort by asc*/
			}
		});

		// handle group actionsubmit button click
		grid.getTableWrapper().on('click', '.table-group-action-submit', function (e) {
			e.preventDefault();
			var action = $(".table-group-action-input", grid.getTableWrapper());
			if (action.val() != "" && grid.getSelectedRowsCount() > 0) {
				grid.setAjaxParam("customActionType", "group_action");
				grid.setAjaxParam("customActionName", action.val());
				grid.setAjaxParam("id", grid.getSelectedRows());
				grid.getDataTable().ajax.reload();
				grid.clearAjaxParams();
			} else if (action.val() == "") {
				App.alert({
					type: 'danger',
					icon: 'warning',
					message: 'Please select an action',
					container: grid.getTableWrapper(),
					place: 'prepend'
				});
			} else if (grid.getSelectedRowsCount() === 0) {
				App.alert({
					type: 'danger',
					icon: 'warning',
					message: 'No record selected',
					container: grid.getTableWrapper(),
					place: 'prepend'
				});
			}
		});

		//grid.setAjaxParam("customActionType", "group_action");
		grid.getDataTable().ajax.reload();
		grid.clearAjaxParams();
	}

	return {

		//main function to initiate the module
		init: function () {

			initPickers();
			handleRecords();

		}

	};

}();

jQuery(document).ready(function() {
	TableDatatablesAjax.init();
});

function init_checkboxes() {
	if (!$().uniform) {
		return;
	}
	var test = $("input[type=checkbox]:not(.toggle, .md-check, .md-radiobtn, .make-switch, .icheck), input[type=radio]:not(.toggle, .md-check, .md-radiobtn, .star, .make-switch, .icheck)");
	if (test.size() > 0) {
		test.each(function() {
			if ($(this).parents(".checker").size() === 0) {
				$(this).show();
				$(this).uniform();
			}
		});
	}
}
