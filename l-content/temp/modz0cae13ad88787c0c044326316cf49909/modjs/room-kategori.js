/**
 * - This file was created using CoGen
 * 
 * - Date created : 2021-10-28 | 11:32
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
			{targets: 'th-action', orderable: false, searchable: false, width: '15%'},
			{targets: [0], width: '5%', orderable: false, searchable: false},
			{targets: [1], width: '50%'},
			{targets: [2], width: '15%'},
			{targets: [3], width: '15%'}
		],
		lengthMenu: [
			[10, 25, 50, 100, -1],
			[10, 25, 50, 100, 'All']
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

	// DataTable
	$('#DataTableJoin').DataTable({
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
			{targets: 'th-action', orderable: false, searchable: false, width: '15%'},
			{targets: [0], width: '5%', orderable: false, searchable: false},
			{targets: [1], width: '50%'},
			{targets: [2], width: '15%',  orderable: false, searchable: false}
		],
		lengthMenu: [
			[10, 25, 50, 100, -1],
			[10, 25, 50, 100, 'All']
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
});

// filemanager callback
function responsive_filemanager_callback(field_id) {
    // console.log(field_id);
    var url = $('#' + field_id).val();
    $('#prv').val(url);
    parent.$.fancybox.close();
}
