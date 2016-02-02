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

				/*$.get( $('#modal_url').val()+'/'+id, function( data ) {
					$('#ajax_modal .modal-content').html(data);
					init_checkboxes();
				});*/
				var id_list = [];
				$('#datatable_ajax a.to_modal').each(function() {
					id_list.push($(this).attr('data-id'));
				});
				if(id_list) {


					$.post( $('#modal_url').val(), { id_list: id_list })
						.done(function( data ) {
							$('#modals_container').html(data);
							init_checkboxes();
							$('.partial_status_check').closest('span').addClass('partial_status');
						});
				}


			},
			loadingMessage: 'Loading...',
			dataTable: { // here you can define a typical datatable settings from http://datatables.net/usage/options

				// Uncomment below line("dom" parameter) to fix the dropdown overflow issue in the datatable cells. The default datatable layout
				// setup uses scrollable div(table-scrollable) with overflow:auto to enable vertical scroll(see: assets/global/scripts/datatable.js).
				// So when dropdowns used the scrollable div should be removed.
				//"dom": "<'row'<'col-md-8 col-sm-12'pli><'col-md-4 col-sm-12'<'table-group-actions pull-right'>>r>t<'row'<'col-md-8 col-sm-12'pli><'col-md-4 col-sm-12'>>",

				"bStateSave": true, // save datatable state(pagination, sort, etc) in cookie.

				"lengthMenu": [
					[5, 10, 25, -1],
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




$(document).ready(function() {

	$('body').on('change', '.child_checkbox', function() {
		var parent_id = $(this).attr('data-parent_id');
		var parent_check = $('#check_'+parent_id);
		service_checkbox_ajax($(this).attr('data-id'), $(this).prop('checked'));

		var checked_list_length = $('input[data-parent_id = '+parent_id+']:checked').length;
		var all_list_length = $('input[data-parent_id = '+parent_id+']').length;
		if(checked_list_length == all_list_length) {
			parent_check.prop('checked', true);
			parent_check.closest('span').addClass('checked').removeClass('partial_status');
			parent_checkbox_ajax(parent_id, 1);
		}
		else if(checked_list_length == 0) {
			parent_check.prop('checked', false);
			parent_check.closest('span').removeClass('checked').removeClass('partial_status');
			parent_checkbox_ajax(parent_id, false, 0);
		}
		else {
			parent_check.prop('checked', false);
			parent_check.closest('span').removeClass('checked').addClass('partial_status');
			parent_checkbox_ajax(parent_id, 2);
		}
	});

	$('body').on('change', '.parent_checkbox', function() {
		var parent_id = $(this).attr('data-id');
		var checkboxes = $('input[data-parent_id = '+parent_id+']');
		$(this).closest('span').removeClass('partial_status');
		if($(this).prop('checked')) {
			checkboxes.prop('checked', true);
			checkboxes.closest('span').addClass('checked');
			parent_checkbox_ajax(parent_id, 1);
		}
		else {
			checkboxes.prop('checked', false);
			checkboxes.closest('span').removeClass('checked');
			parent_checkbox_ajax(parent_id, 0);
		}
	});

	$('body').on('click', '#do_billing', function() {
		$('.shoper_check:checked').each(function() {
			 var shoper_id = $(this).val();
			$('.child_checkbox[data-shoper_id='+shoper_id+']').attr('name', 'services_to_bill[]');
		});
		if($('.shoper_check:checked').length) {
			$('#do_billing_form').submit();
		} else {
			alert('Select shopers');
		}
	});




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

function service_checkbox_ajax(id, status) {
	$.post( $('#service_checkbox_ajax_url').val(), { id: id,  status: status});
}

function parent_checkbox_ajax(id, status) {
	$.post( $('#parent_checkbox_ajax_url').val(), { id: id,  status: status});
}

