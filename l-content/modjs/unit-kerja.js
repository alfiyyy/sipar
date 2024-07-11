/**
 * - This file was created using CoGen
 * 
 * - Date created : 2021-10-28 | 06:53
 * - Author       : CiFireCMS
 * - License      : MIT License
*/

$(function() {
	'use strict'

	var url = window.location.href;
    var activeTab = url.substring(url.indexOf("#") + 1);
    if($.trim(activeTab) == 'Tab-Kamar') // check hash tag name for prevent error
    {
        $(".tab-pane").removeClass("active in");
        $("#" + activeTab).addClass("active in");
        $('a[href="#'+ activeTab +'"]').tab('show');
    } 
	else if($.trim(activeTab) == 'Tab-Fasilitas') // check hash tag name for prevent error
    {
        $(".tab-pane").removeClass("active in");
        $("#" + activeTab).addClass("active in");
        $('a[href="#'+ activeTab +'"]').tab('show');
    }
	else if($.trim(activeTab) == 'Tab-Gambar') // check hash tag name for prevent error
    {
        $(".tab-pane").removeClass("active in");
        $("#" + activeTab).addClass("active in");
        $('a[href="#'+ activeTab +'"]').tab('show');
    }
	else if($.trim(activeTab) == 'Tab-Layanan') // check hash tag name for prevent error
    {
        $(".tab-pane").removeClass("active in");
        $("#" + activeTab).addClass("active in");
        $('a[href="#'+ activeTab +'"]').tab('show');
    }

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
			{targets: [1], width: '35%'},
			{targets: [2], width: '20%'},
			{targets: [3], width: '10%'},
			{targets: [4], width: '10%', orderable: false, searchable: false}
		],
		lengthMenu: [
			[10, 25, 50, 10, -1],
			[10, 25, 50, 10, 'All']
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
	cfTnyMCE('#textarea-tinymce-alamat', 200);
	cfTnyMCE('#textarea-tinymce-deskripsi', 200);
	cfTnyMCE('#textarea-tinymce-katdes', 100);


	// filemanager
	$('#browse-filemanager').fancybox({ 
	    width     : 1000, 
	    height    : 1000, 
	    type      : 'iframe', 
	    autoScale : false,
	});

	$('.delete_gallery_image').on('click',function(e) {
		e.preventDefault();
		var dataPk = [$(this).attr('data-id')];
		var dataUrl = admin_url + a_mod + '/delete_gambar_kamar/image';
		_deleteGallery(dataPk,dataUrl)
	});

	function _deleteGallery(pk,uri){
		var dataPk = pk;
		var dataUrl = uri;
		getLangJSON().done(function(lang){
			swal({
				title               : '<span class="mg-t-30">'+lang.modal['delete_title']+'</span>',
				text                : lang.modal['delete_content'],

				showConfirmButton   : true,
				confirmButtonClass  : 'btn btn-lg btn-danger',
				confirmButtonText   : lang.button['delete'],

				showCancelButton    : true,
				cancelButtonClass   : 'btn btn-lg btn-secondary',
				cancelButtonText    : lang.button['cancel'],

				animation           : false,
				buttonsStyling      : false,
				showCloseButton     : false,
				showLoaderOnConfirm : true,
				allowOutsideClick   : false,

				preConfirm: function() {
					return new Promise(function(resolve, reject) {
						$.ajax({
							type: 'POST',
							url: dataUrl,
							dataType: 'json',
							data: {
								'data': dataPk,
								'csrf_name': csrfToken
							},
							cache: false,
							success:function(response) {
								if (response['success']==true) {
									$('#gallery-item'+response['dataDelete']).remove();
									resolve();					
								}
								else {
									Swal({
										type     : 'error',
										title    : '<span class="mg-b-0">ERROR</span>',
										animation         : false,
									allowOutsideClick : false,
									showConfirmButton : false,
									showCloseButton   : true
									});
								};
							}
						});
					});
				},
			});
		});
	}

	$('.delete_gallery_kamar').on('click',function(e) {
		e.preventDefault();
		var dataPk = [$(this).attr('data-id')];
		var dataUrl = admin_url + a_mod + '/delete_gallery_kamar/kamar';
		_deleteGalleryKamar(dataPk,dataUrl)
	});

	function _deleteGalleryKamar(pk,uri){
		var dataPk = pk;
		var dataUrl = uri;
		getLangJSON().done(function(lang){
			swal({
				title               : '<span class="mg-t-30">'+lang.modal['delete_title']+'</span>',
				text                : lang.modal['delete_content'],

				showConfirmButton   : true,
				confirmButtonClass  : 'btn btn-lg btn-danger',
				confirmButtonText   : lang.button['delete'],

				showCancelButton    : true,
				cancelButtonClass   : 'btn btn-lg btn-secondary',
				cancelButtonText    : lang.button['cancel'],

				animation           : false,
				buttonsStyling      : false,
				showCloseButton     : false,
				showLoaderOnConfirm : true,
				allowOutsideClick   : false,

				preConfirm: function() {
					return new Promise(function(resolve, reject) {
						$.ajax({
							type: 'POST',
							url: dataUrl,
							dataType: 'json',
							data: {
								'data': dataPk,
								'csrf_name': csrfToken
							},
							cache: false,
							success:function(response) {
								if (response['success']==true) {
									$('#kamar-item'+response['dataDelete']).remove();
									resolve();					
								}
								else {
									Swal({
										type     : 'error',
										title    : '<span class="mg-b-0">ERROR</span>',
										animation         : false,
									allowOutsideClick : false,
									showConfirmButton : false,
									showCloseButton   : true
									});
								};
							}
						});
					});
				},
			});
		});
	}

	$('.delete_fasilitas_kamar').on('click',function(e) {
		e.preventDefault();
		var dataPk = [$(this).attr('data-id')];
		var dataUrl = admin_url + a_mod + '/delete_fasilitas_kamar/fasilitas_kamar';
		_deleteFasilitasKamar(dataPk,dataUrl)
	});

	function _deleteFasilitasKamar(pk,uri){
		var dataPk = pk;
		var dataUrl = uri;
		getLangJSON().done(function(lang){
			swal({
				title               : '<span class="mg-t-30">'+lang.modal['delete_title']+'</span>',
				text                : lang.modal['delete_content'],

				showConfirmButton   : true,
				confirmButtonClass  : 'btn btn-lg btn-danger',
				confirmButtonText   : lang.button['delete'],

				showCancelButton    : true,
				cancelButtonClass   : 'btn btn-lg btn-secondary',
				cancelButtonText    : lang.button['cancel'],

				animation           : false,
				buttonsStyling      : false,
				showCloseButton     : false,
				showLoaderOnConfirm : true,
				allowOutsideClick   : false,

				preConfirm: function() {
					return new Promise(function(resolve, reject) {
						$.ajax({
							type: 'POST',
							url: dataUrl,
							dataType: 'json',
							data: {
								'data': dataPk,
								'csrf_name': csrfToken
							},
							cache: false,
							success:function(response) {
								if (response['success']==true) {
									$('#fasilitas-item'+response['dataDelete']).remove();
									resolve();					
								}
								else {
									Swal({
										type     : 'error',
										title    : '<span class="mg-b-0">ERROR</span>',
										animation         : false,
									allowOutsideClick : false,
									showConfirmButton : false,
									showCloseButton   : true
									});
								};
							}
						});
					});
				},
			});
		});
	}

	$('.delete_layanan_kamar').on('click',function(e) {
		e.preventDefault();
		var dataPk = [$(this).attr('data-id')];
		var dataUrl = admin_url + a_mod + '/delete_layanan_kamar/layanan_kamar';
		_deleteLayananKamar(dataPk,dataUrl)
	});

	function _deleteLayananKamar(pk,uri){
		var dataPk = pk;
		var dataUrl = uri;
		getLangJSON().done(function(lang){
			swal({
				title               : '<span class="mg-t-30">'+lang.modal['delete_title']+'</span>',
				text                : lang.modal['delete_content'],

				showConfirmButton   : true,
				confirmButtonClass  : 'btn btn-lg btn-danger',
				confirmButtonText   : lang.button['delete'],

				showCancelButton    : true,
				cancelButtonClass   : 'btn btn-lg btn-secondary',
				cancelButtonText    : lang.button['cancel'],

				animation           : false,
				buttonsStyling      : false,
				showCloseButton     : false,
				showLoaderOnConfirm : true,
				allowOutsideClick   : false,

				preConfirm: function() {
					return new Promise(function(resolve, reject) {
						$.ajax({
							type: 'POST',
							url: dataUrl,
							dataType: 'json',
							data: {
								'data': dataPk,
								'csrf_name': csrfToken
							},
							cache: false,
							success:function(response) {
								if (response['success']==true) {
									$('#layanan-item'+response['dataDelete']).remove();
									resolve();					
								}
								else {
									Swal({
										type     : 'error',
										title    : '<span class="mg-b-0">ERROR</span>',
										animation         : false,
									allowOutsideClick : false,
									showConfirmButton : false,
									showCloseButton   : true
									});
								};
							}
						});
					});
				},
			});
		});
	}
});

// filemanager callback
function responsive_filemanager_callback(field_id) {
    // console.log(field_id);
    var url = $('#' + field_id).val();
    $('#prv').val(url);
    parent.$.fancybox.close();
}

function onModalTambahKategori(kategori_id) {
	var kid = kategori_id;
	$('#modal_kategori').modal('show');
	$('#kategori_show').html('<input type="hidden" name="kategori_id" id="kategori_id" value="'+kid+'" class="form-control" require />');
}
