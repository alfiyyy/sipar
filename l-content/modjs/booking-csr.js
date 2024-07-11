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
			{targets: [1], width: '10%'},
			{targets: [2], width: '25%'},
			{targets: [3], width: '15%', orderable: false},
			{targets: [4], width: '15%', orderable: false},
			{targets: [5], width: '15%', orderable: false},
			{targets: [6], width: '10%', orderable: false}
		],
		lengthMenu: [
			[10, 30, 50, 100, -1],
			[10, 30, 50, 100, 'All']
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

function onModalBook(id) {
	//$.fn.modal.Constructor.prototype._enforceFocus = function() {};
	$(document).ready(function() {
		$("#select2peserta").select2({
		  dropdownParent: $('.modal-body', '#modal_booking')
		});
	});
	var idDet = id;
	console.log(idDet);
	$('#modal_booking').modal('show');
	$('#cdet').html('<div class="text-center pd-30"><i class="fa fa-spin fa-spinner text-muted"></i></div>');
	$.ajax({
		type: 'POST',
		url: admin_url + 'csr' + '/pilih/' + idDet,
		data:{
			'id': idDet,
			'csrf_name': csrfToken
		},
		success: function(data){
			if (data==false) {
				$('#cdet').html('<div class="text-center text-danger tx-16">Access denied !</div>');
			} else {
				$('#formhidden').html(data.formhidden);
				$('#tomboltambahpeserta').html(data.tomboltambahpeserta);
				$('#cdet').html(data.data_kamar);
				$('#footerbook').html(data.link);
			};
		}
	});
}

function onModalTambahPeserta(kategori_id) {
	var kid = kategori_id;
	$('#modal_peserta').modal('show');
	$('#kategori_show').html('<input type="hidden" name="kategori_id" id="kategori_id" value="'+kid+'" class="form-control" require />  <input type="hidden" name="aksi" value="csr" />');
}

// filemanager callback
function responsive_filemanager_callback(field_id) {
    // console.log(field_id);
    var url = $('#' + field_id).val();
    $('#prv').val(url);
    parent.$.fancybox.close();
}
