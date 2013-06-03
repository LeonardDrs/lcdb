$(function() {
	console.log('ok')
	var array = $('#calendar_admin').data('array'),
		year = $('#calendar_admin').find('table').data('year'),
		month = $('#calendar_admin').find('table').data('month');
		month = month > 9 ? "" + month: "0" + month;

	$('tr>td').click(function(event) {
		var $this=$(this);
		$this.parents('table').find('.desc').hide();
		$this.find('.desc').toggle();
	})
	$('td .check').click(function(event) {
		event.stopPropagation();
		var $this=$(this);
		$this.parents('td').toggleClass('open');
	})
	$('td .okk').click(function(event) {
		event.stopPropagation();
		var $this=$(this),
			day = $this.parents('td').data('day'),
			val = $this.siblings('.text').val();
		if ($this.parents('td').hasClass('open')) {
			if ( typeof array != "array") {
				array = {};
			}
			if (!array[year]) {
				array[year] = {};
			};
			if ( typeof array[year][month] == "undefined") {
				array[year][month] = {};
			};
			array[year][month][day] = val;
		} else {
			array[year][month][day] = null;
		}
		$('#calendar').val(JSON.stringify(array))
		$this.parents('.desc').hide();
	})
})