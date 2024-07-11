/**
 * - This file was created using CoGen
 * 
 * - Date created : 2021-11-05 | 08:29
 * - Author       : CiFireCMS
 * - License      : MIT License
*/

$(function() {
	'use strict'

	// DataTable
	$('#DataTable').DataTable({
		language: {
			url: datatable_lang,
		},
		autoWidth: false,
		responsive: true,
		processing: true,
		serverSide: true,
		order: [],
		columnDefs: [
			{targets: 'no-sort', orderable: false, searchable: false},
			{targets: 'th-action', orderable: false, searchable: false, width: '7%'},
			{targets: [0], width: '3%'},
			{targets: [1], width: '15%'},
            {targets: [2], width: '15%'},
            {targets: [3], width: '5%'},
            {targets: [4], width: '1%'},
            {targets: [5], width: '1%'},
            {targets: [6], width: '1%'},
            {targets: [7], width: '1%'},
            {targets: [8], width: '1%'},
            {targets: [9], width: '1%'},
            {targets: [10], width: '1%'},
            {targets: [11], width: '1%'},
            {targets: [12], width: '1%'},
            {targets: [13], width: '1%'},
            {targets: [14], width: '1%'},
            {targets: [15], width: '1%'},
            {targets: [16], width: '1%'},
            {targets: [17], width: '1%'},
            {targets: [18], width: '1%'},
            {targets: [19], width: '1%'},
            {targets: [20], width: '1%'},
            {targets: [21], width: '1%'},
            {targets: [22], width: '1%'},
            {targets: [23], width: '1%'},
            {targets: [24], width: '1%'},
            {targets: [25], width: '1%'},
            {targets: [26], width: '1%'},
            {targets: [27], width: '1%'},
            {targets: [28], width: '1%'},
            {targets: [29], width: '1%'},
            {targets: [30], width: '1%'},
            {targets: [31], width: '1%'},
            {targets: [32], width: '1%'},
            {targets: [33], width: '1%'},
		],
		lengthMenu: [
			[100, -1],
			[100, 'All']
		],
		ajax: {
			type : 'POST',
			data : csrfData
		},
		drawCallback: function(settings) {
			var apiTable = this.api();
			dataTableDrawCallback(apiTable);
		}
	});


	// datetime-picker  
	$('#datetime-picker').datetimepicker({
		format    : 'YYYY-MM-DD HH:mm:ss',
		showClear : true,
		showTodayButton : true,
		icons : {
			previous: 'icon-arrow-left8',
			next  : 'icon-arrow-right8',
			today : 'fa fa-calendar-check-o',
			clear : 'icon-bin',
		},
	});


	// datepicker
	$('#date-picker').datetimepicker({
		format : 'YYYY-MM-DD',
		showClear : true,
		showTodayButton : true,
		icons : {
			previous : 'icon-arrow-left8',
			next     : 'icon-arrow-right8',
			today    : 'fa fa-calendar-check-o',
			clear    : 'icon-bin',
		},
	});

	$('#date-picker1').datetimepicker({
		format : 'YYYY-MM-DD',
		showClear : true,
		showTodayButton : true,
		icons : {
			previous : 'icon-arrow-left8',
			next     : 'icon-arrow-right8',
			today    : 'fa fa-calendar-check-o',
			clear    : 'icon-bin',
		},
	});

	$('#date-picker2').datetimepicker({
		format : 'YYYY-MM-DD',
		showClear : true,
		showTodayButton : true,
		icons : {
			previous : 'icon-arrow-left8',
			next     : 'icon-arrow-right8',
			today    : 'fa fa-calendar-check-o',
			clear    : 'icon-bin',
		},
	});


	// clockpicker
	$('#time-picker').datetimepicker({
		format : 'HH:mm:ss',
		showClear : true,
		showTodayButton : true,
		icons : {
			up    : 'icon-arrow-up7',
			down  : 'icon-arrow-down7',
			today : 'fa fa-clock-o',
			clear : 'icon-bin',
		},
	});


	// textarea-tinymce
	cfTnyMCE('#textarea-tinymce', 300);


	// filemanager
	$('#browse-filemanager').fancybox({ 
	    width     : 1000, 
	    height    : 1000, 
	    type      : 'iframe', 
	    autoScale : false,
	});

	// $('.modal_booking').on('click',function() {
	// 	$('#modal_booking').modal('show');
	// });

	


	

	

});