$(document).ready(function() {

	var packages;
	$('#find_customer').click(function(){
		var customer_number = $('#customer_number').val();
		$('#tab1-1_allow').prop('checked', false);
		$('#tab1_allow').prop('checked', false);
		$('#tab2_allow').prop('checked', false);
		if(!customer_number) {
			$('.button-next').click();
			return false;
		}
		$.post( $('#customer_find_url').val(), { customer_number: customer_number}).done(function(jsondata) {
			var data = $.parseJSON(jsondata);
			if(data.success) {
				var customer = data.customer;
				var text = customer.name + ' ' + customer.last_name + '<br />' + customer.address;
				$('#customer_info').html(text);
				packages = data.customer.packages;
				if(!packages.length) {
					$('#customer_info').html(text + '<br /><b>Customer don\'t have packages</b>');
					$('#tab2 tbody').html('');
				} else {
					$('#tab1_allow').prop('checked', true);
					$('#tab2_msg').html('');
					var packages_table = '';
					var check_age = false;
					for(var i=0; i<packages.length; i++) {
						if(packages[i].age_restriction != '0') {
							check_age = true;
						}
						packages_table +=
							'<tr>'+
								'<td><input type="checkbox" name="checked_customer_packages[]" value="'+packages[i].id+'" data-tracking="'+packages[i].tracking_id+'"></td>'+
								'<td>'+(packages[i].age_restriction == '0' ? 'N' : packages[i].age_restriction_date)+'</td>' +
								'<td>'+packages[i].shipment_id+'</td>'+
								'<td>'+packages[i].item_id+'</td>'+
								'<td>'+(packages[i].tracking_id ? packages[i].tracking_id : 'None')+'</td>'+
							'</tr>';
					}
					if(check_age) {

						var dob_content = $('#dob_template').html();
						$('#tab1-1 .tab1-1-content').html(dob_content);
						$('.date-picker').datepicker({
							format : "yyyy-mm-dd",
							autoclose: true
						});

					} else {
						$('#tab1-1_allow').prop('checked', true);
						$('#tab1-1').html('<h2>Age verification don\'t required</h2>');
					}

					$('#tab2 tbody').html(packages_table);
					init_checkboxes();

				}

			} else if(data.message) {
				$('#tab1_allow').prop('checked', false);
				$('#customer_info').html(data.message);
			} else {
				$('#tab1_allow').prop('checked', false);
			}
		});
	});

	$('body').on('click', '.verify_age', function() {
		$('#tab2_allow').prop('checked', false);
		var form_group = $(this).closest('.form-group');
		var year = form_group.find('#b_year').val();
		var month = form_group.find('#b_month').val();
		var day = form_group.find('#b_day').val();

		if(!year || !month || !day) {
			$('.button-next').click();
			return false;
		}
		month = parseInt(month);
		if(month < 10) {
			month = '0'+month;
		}
		day = parseInt(day);
		if(day < 10) {
			day = '0'+day;
		}
		var bday = year + '-' + month + '-' + day;
		var age = parseInt(_calculateAge(bday));
		var not_alowed_count = 0;
		for(var i=0; i<packages.length; i++) {
			if(parseInt(packages[i].age_restriction) > age) {
				not_alowed_count++;
			}
		}
		$('#customer_bday').html('<b>Customer date of born: ' + bday + '</b>');
		$('#tab1-1_allow').prop('checked', true);
		if(not_alowed_count) {
			$('#tab1-1 .tab1-1-message').html('<b>some package age restriction greater than '+age+'</b>');
			/*$('#tab2 .table tbody tr').each(function() {
				var checking = $(this).find('td:eq(0) input');
				var age_r = parseInt($(this).find('td:eq(1)').text());
				if(age_r && age_r > age) {
					checking.prop('checked', false).prop('disabled', true);
				} else {
					checking.prop('disabled', false);
				}
			});*/
		} else {
			$('#tab1-1 .tab1-1-message').html('<b>Verified</b>');
			$('#tab2 .table tbody tr').find('td:eq(0) input').prop('disabled', false);
		}
	});

	$('body').on('change', 'input[name="checked_customer_packages[]"]', function() {
		if($('input[name="checked_customer_packages[]"]:checked').length) {
			$('#tab2_allow').prop('checked', true);
		} else {
			$('#tab2_allow').prop('checked', false);
		}
	});

	var items_trackings;
	var searched_trackings;
	var founded_trackings;

	$('.button-next').click(function() {

		if($('#tab2').hasClass('active') && $('#tab2_allow:checked').length) {
			items_trackings = [];
			searched_trackings = [];
			founded_trackings = [];
			items = $('input[name="checked_customer_packages[]"]:checked');
			$('#total_count').text(items.length);
			var no_tracking_count = 0;
			var tracking;
			items.each(function() {
				if((tracking = $(this).closest('tr').find('td:eq(4)').text()) == 'None') {
					no_tracking_count++;
					founded_trackings.push($(this).val());
				} else {
					items_trackings.push(tracking);
				}
			});
			$('#founded_count').text(no_tracking_count);
		}

		else if($('#tab3').hasClass('active')) {
            if(founded_trackings.length) {
                $('#tab_4_success').text('Please sign for ' + founded_trackings.length + ' item(s)');
                $('#tab_4_danger').text('');
            } else {
                $('#tab_4_danger').text('You didn\'t select items');
                $('#tab_4_success').text('');
            }
		}

	});

	$('body').on('click', '#find_tracking', function() {
		var tracking = $('#tracking_id').val();
		if(!tracking) {
			alert('empty tracking #');
			return false;
		}
		if(searched_trackings.indexOf(tracking) == -1) {
			searched_trackings.push(tracking);
			if(items_trackings.indexOf(tracking) != -1) {
				$('input[data-tracking="'+tracking+'"]').each(function() {
					founded_trackings.push($(this).val());
					$('#founded_count').text(parseInt($('#founded_count').text()) + 1);
				});
				$('#tab3_allow').prop('checked', true);
				$('#search_result_label').append(tracking + ' - found <br />');
			} else {
				$('#search_result_label').append(tracking + ' - wrong <br />');
			}
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

function _calculateAge(birthday_date) { // birthday is a string
	var birthday = new Date(birthday_date);
	var ageDifMs = Date.now() - birthday.getTime();
	var ageDate = new Date(ageDifMs); // miliseconds from epoch
	return Math.abs(ageDate.getUTCFullYear() - 1970);
}

function get_born_before_date(age) {
	age = parseInt(age);
	var cur_date = new Date();
	var year = parseInt(cur_date.getFullYear()) - age;
	return year + '-' + cur_date.getMonth() + '-' + cur_date.getDate();

}