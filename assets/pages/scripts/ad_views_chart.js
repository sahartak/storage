jQuery(document).ready(function() {

	var views = [];

	var url = $('#views_url').val();
	$.ajax({
		method: "GET",
		url: url,
		dataType: "json",
		success: function(data) {
			for(i=0; i<data.length; i++) {
				views.push({
					y: data[i].date,
					views: data[i].count
				})
			}
			new Morris.Bar({
				element: 'views_chart',
				data: views,
				xkey: 'y',
				ykeys: ['views'],
				labels: ['Ad views']
			});
		}
	});


});