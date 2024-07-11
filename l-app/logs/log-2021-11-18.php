<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2021-11-18 11:24:51 --> Severity: Notice --> Undefined index: wdeleteaccess D:\xampp71\htdocs\pupr\l-app\libraries\Cifire_Role.php 62
ERROR - 2021-11-18 12:05:54 --> Severity: Notice --> Undefined index: unker_image D:\xampp71\htdocs\pupr\l-app\views\themes\sovi\home.php 17
ERROR - 2021-11-18 12:05:54 --> Severity: Notice --> Undefined index: unker_image D:\xampp71\htdocs\pupr\l-app\views\themes\sovi\home.php 17
ERROR - 2021-11-18 12:05:54 --> Severity: Notice --> Undefined index: unker_image D:\xampp71\htdocs\pupr\l-app\views\themes\sovi\home.php 17
ERROR - 2021-11-18 06:27:31 --> 404 Page Not Found: Booking/smr
ERROR - 2021-11-18 12:39:42 --> Query error: Unknown column 'id' in 'where clause' - Invalid query: SELECT *
FROM `t_unit_kerja`
WHERE `id` = 1
ORDER BY `unker_id` DESC
ERROR - 2021-11-18 12:40:05 --> Severity: Notice --> Undefined index: id D:\xampp71\htdocs\pupr\l-app\views\themes\sovi\home.php 16
ERROR - 2021-11-18 12:40:05 --> Severity: Notice --> Undefined index: id D:\xampp71\htdocs\pupr\l-app\views\themes\sovi\home.php 41
ERROR - 2021-11-18 12:48:55 --> Severity: Notice --> Undefined index: id D:\xampp71\htdocs\pupr\l-app\views\themes\sovi\home.php 16
ERROR - 2021-11-18 12:48:55 --> Severity: Notice --> Undefined index: id D:\xampp71\htdocs\pupr\l-app\views\themes\sovi\home.php 41
ERROR - 2021-11-18 12:49:26 --> Severity: Notice --> Undefined index: id D:\xampp71\htdocs\pupr\l-app\views\themes\sovi\home.php 41
ERROR - 2021-11-18 12:50:33 --> Query error: Unknown column 't_room_kategori.created_at t_unit_kerja.unker_id' in 'field list' - Invalid query: SELECT `t_room_kategori`.`kategori_nama` AS `kategori_nama`, `t_room_kategori`.`kategori_id` AS `kategori_id`, `t_room_kategori`.`kategori_image`, `t_room_kategori`.`created_at t_unit_kerja`.`unker_id` AS `unker_id`, `t_unit_kerja`.`unker_nama` AS `nama`, `t_unit_kerja`.`unker_deskripsi` AS `deskripsi`
FROM `t_room_kategori`
JOIN `t_unit_kerja` ON `t_room_kategori`.`unker_id`=`t_unit_kerja`.`unker_id`
WHERE `t_unit_kerja`.`status` = 'Aktif'
AND `t_unit_kerja`.`unker_id` = '2'
ORDER BY `t_room_kategori`.`kategori_id` DESC
 LIMIT 1
ERROR - 2021-11-18 12:51:14 --> Query error: Unknown column 't_unit_kerja.status' in 'where clause' - Invalid query: SELECT `t_room_kategori`.`kategori_nama` AS `kategori_nama`, `t_room_kategori`.`kategori_id` AS `kategori_id`, `t_room_kategori`.`kategori_image`, `t_room_kategori`.`created_at`, `t_unit_kerja`.`unker_id` AS `unker_id`, `t_unit_kerja`.`unker_nama` AS `nama`, `t_unit_kerja`.`unker_deskripsi` AS `deskripsi`
FROM `t_room_kategori`
JOIN `t_unit_kerja` ON `t_room_kategori`.`unker_id`=`t_unit_kerja`.`unker_id`
WHERE `t_unit_kerja`.`status` = 'Aktif'
AND `t_unit_kerja`.`unker_id` = '2'
ORDER BY `t_room_kategori`.`kategori_id` DESC
 LIMIT 1
ERROR - 2021-11-18 12:51:30 --> Severity: Notice --> Undefined index: post_seotitle D:\xampp71\htdocs\pupr\l-app\views\themes\sovi\home.php 20
ERROR - 2021-11-18 12:51:30 --> Severity: Notice --> Undefined index: post_title D:\xampp71\htdocs\pupr\l-app\views\themes\sovi\home.php 20
ERROR - 2021-11-18 12:51:30 --> Severity: Notice --> Undefined index: post_title D:\xampp71\htdocs\pupr\l-app\views\themes\sovi\home.php 21
ERROR - 2021-11-18 12:51:30 --> Severity: Notice --> Undefined index: picture D:\xampp71\htdocs\pupr\l-app\views\themes\sovi\home.php 21
ERROR - 2021-11-18 12:51:30 --> Severity: Notice --> Undefined index: post_seotitle D:\xampp71\htdocs\pupr\l-app\views\themes\sovi\home.php 26
ERROR - 2021-11-18 12:51:30 --> Severity: Notice --> Undefined index: post_title D:\xampp71\htdocs\pupr\l-app\views\themes\sovi\home.php 26
ERROR - 2021-11-18 12:51:30 --> Severity: Notice --> Undefined index: post_title D:\xampp71\htdocs\pupr\l-app\views\themes\sovi\home.php 26
ERROR - 2021-11-18 12:51:30 --> Severity: Notice --> Undefined index: datepost D:\xampp71\htdocs\pupr\l-app\views\themes\sovi\home.php 31
ERROR - 2021-11-18 12:51:30 --> Severity: Notice --> Undefined index: timepost D:\xampp71\htdocs\pupr\l-app\views\themes\sovi\home.php 31
ERROR - 2021-11-18 12:51:30 --> Severity: Notice --> Undefined index: category_seotitle D:\xampp71\htdocs\pupr\l-app\views\themes\sovi\home.php 32
ERROR - 2021-11-18 12:51:30 --> Severity: Notice --> Undefined index: category_title D:\xampp71\htdocs\pupr\l-app\views\themes\sovi\home.php 32
ERROR - 2021-11-18 12:51:30 --> Severity: Notice --> Undefined index: content D:\xampp71\htdocs\pupr\l-app\views\themes\sovi\home.php 36
ERROR - 2021-11-18 12:51:51 --> Severity: Notice --> Undefined index: post_title D:\xampp71\htdocs\pupr\l-app\views\themes\sovi\home.php 20
ERROR - 2021-11-18 12:51:51 --> Severity: Notice --> Undefined index: post_title D:\xampp71\htdocs\pupr\l-app\views\themes\sovi\home.php 21
ERROR - 2021-11-18 12:51:51 --> Severity: Notice --> Undefined index: picture D:\xampp71\htdocs\pupr\l-app\views\themes\sovi\home.php 21
ERROR - 2021-11-18 12:51:51 --> Severity: Notice --> Undefined index: post_seotitle D:\xampp71\htdocs\pupr\l-app\views\themes\sovi\home.php 26
ERROR - 2021-11-18 12:51:51 --> Severity: Notice --> Undefined index: post_title D:\xampp71\htdocs\pupr\l-app\views\themes\sovi\home.php 26
ERROR - 2021-11-18 12:51:51 --> Severity: Notice --> Undefined index: post_title D:\xampp71\htdocs\pupr\l-app\views\themes\sovi\home.php 26
ERROR - 2021-11-18 12:51:51 --> Severity: Notice --> Undefined index: datepost D:\xampp71\htdocs\pupr\l-app\views\themes\sovi\home.php 31
ERROR - 2021-11-18 12:51:51 --> Severity: Notice --> Undefined index: timepost D:\xampp71\htdocs\pupr\l-app\views\themes\sovi\home.php 31
ERROR - 2021-11-18 12:51:51 --> Severity: Notice --> Undefined index: category_seotitle D:\xampp71\htdocs\pupr\l-app\views\themes\sovi\home.php 32
ERROR - 2021-11-18 12:51:51 --> Severity: Notice --> Undefined index: category_title D:\xampp71\htdocs\pupr\l-app\views\themes\sovi\home.php 32
ERROR - 2021-11-18 12:51:51 --> Severity: Notice --> Undefined index: content D:\xampp71\htdocs\pupr\l-app\views\themes\sovi\home.php 36
ERROR - 2021-11-18 12:52:17 --> Severity: Notice --> Undefined index: post_seotitle D:\xampp71\htdocs\pupr\l-app\views\themes\sovi\home.php 26
ERROR - 2021-11-18 12:52:17 --> Severity: Notice --> Undefined index: post_title D:\xampp71\htdocs\pupr\l-app\views\themes\sovi\home.php 26
ERROR - 2021-11-18 12:52:17 --> Severity: Notice --> Undefined index: post_title D:\xampp71\htdocs\pupr\l-app\views\themes\sovi\home.php 26
ERROR - 2021-11-18 12:52:17 --> Severity: Notice --> Undefined index: datepost D:\xampp71\htdocs\pupr\l-app\views\themes\sovi\home.php 31
ERROR - 2021-11-18 12:52:17 --> Severity: Notice --> Undefined index: timepost D:\xampp71\htdocs\pupr\l-app\views\themes\sovi\home.php 31
ERROR - 2021-11-18 12:52:17 --> Severity: Notice --> Undefined index: category_seotitle D:\xampp71\htdocs\pupr\l-app\views\themes\sovi\home.php 32
ERROR - 2021-11-18 12:52:17 --> Severity: Notice --> Undefined index: category_title D:\xampp71\htdocs\pupr\l-app\views\themes\sovi\home.php 32
ERROR - 2021-11-18 12:52:17 --> Severity: Notice --> Undefined index: content D:\xampp71\htdocs\pupr\l-app\views\themes\sovi\home.php 36
ERROR - 2021-11-18 12:53:40 --> Severity: Notice --> Undefined index: kategori_deskripsi D:\xampp71\htdocs\pupr\l-app\views\themes\sovi\home.php 36
ERROR - 2021-11-18 12:54:22 --> Severity: Notice --> Undefined index: kategori_deskripsi D:\xampp71\htdocs\pupr\l-app\views\themes\sovi\home.php 36
ERROR - 2021-11-18 12:54:22 --> Severity: Notice --> Undefined index: post_seotitle D:\xampp71\htdocs\pupr\l-app\views\themes\sovi\home.php 47
ERROR - 2021-11-18 12:54:22 --> Severity: Notice --> Undefined index: post_title D:\xampp71\htdocs\pupr\l-app\views\themes\sovi\home.php 47
ERROR - 2021-11-18 12:54:22 --> Severity: Notice --> Undefined index: post_title D:\xampp71\htdocs\pupr\l-app\views\themes\sovi\home.php 48
ERROR - 2021-11-18 12:54:22 --> Severity: Notice --> Undefined index: picture D:\xampp71\htdocs\pupr\l-app\views\themes\sovi\home.php 48
ERROR - 2021-11-18 12:54:22 --> Severity: Notice --> Undefined index: post_seotitle D:\xampp71\htdocs\pupr\l-app\views\themes\sovi\home.php 53
ERROR - 2021-11-18 12:54:22 --> Severity: Notice --> Undefined index: post_title D:\xampp71\htdocs\pupr\l-app\views\themes\sovi\home.php 53
ERROR - 2021-11-18 12:54:22 --> Severity: Notice --> Undefined index: post_title D:\xampp71\htdocs\pupr\l-app\views\themes\sovi\home.php 53
ERROR - 2021-11-18 12:54:22 --> Severity: Notice --> Undefined index: datepost D:\xampp71\htdocs\pupr\l-app\views\themes\sovi\home.php 57
ERROR - 2021-11-18 12:54:22 --> Severity: Notice --> Undefined index: timepost D:\xampp71\htdocs\pupr\l-app\views\themes\sovi\home.php 57
ERROR - 2021-11-18 12:54:22 --> Severity: Notice --> Undefined index: category_seotitle D:\xampp71\htdocs\pupr\l-app\views\themes\sovi\home.php 58
ERROR - 2021-11-18 12:54:22 --> Severity: Notice --> Undefined index: category_title D:\xampp71\htdocs\pupr\l-app\views\themes\sovi\home.php 58
ERROR - 2021-11-18 12:55:38 --> Severity: Notice --> Undefined index: kategori_deskripsi D:\xampp71\htdocs\pupr\l-app\views\themes\sovi\home.php 36
ERROR - 2021-11-18 06:56:52 --> 404 Page Not Found: Detailpost/Kamar%20Standar
ERROR - 2021-11-18 13:02:36 --> Severity: Notice --> Undefined variable: res_post1a D:\xampp71\htdocs\pupr\l-app\views\themes\sovi\home.php 28
ERROR - 2021-11-18 13:02:36 --> Severity: Notice --> Undefined variable: res_post1a D:\xampp71\htdocs\pupr\l-app\views\themes\sovi\home.php 29
ERROR - 2021-11-18 13:02:36 --> Severity: Notice --> Undefined variable: res_post1a D:\xampp71\htdocs\pupr\l-app\views\themes\sovi\home.php 33
ERROR - 2021-11-18 16:17:04 --> Severity: Notice --> Undefined index: wdeleteaccess D:\xampp71\htdocs\pupr\l-app\libraries\Cifire_Role.php 62
ERROR - 2021-11-18 17:07:54 --> Severity: Notice --> Undefined index: id_user D:\xampp71\htdocs\pupr\l-app\controllers\l-admin\Kelola_smart_meeting.php 74
ERROR - 2021-11-18 17:07:54 --> Severity: Notice --> Undefined property: Kelola_smart_meeting::$smr_gambar_model D:\xampp71\htdocs\pupr\l-app\controllers\l-admin\Kelola_smart_meeting.php 77
ERROR - 2021-11-18 17:07:54 --> Severity: error --> Exception: Call to a member function get_gallerys() on null D:\xampp71\htdocs\pupr\l-app\controllers\l-admin\Kelola_smart_meeting.php 77
ERROR - 2021-11-18 17:11:50 --> Severity: error --> Exception: Cannot use object of type stdClass as array D:\xampp71\htdocs\pupr\l-app\controllers\l-admin\Kelola_smart_meeting.php 77
ERROR - 2021-11-18 17:12:02 --> Severity: Notice --> Undefined property: Kelola_smart_meeting::$smr_gambar_model D:\xampp71\htdocs\pupr\l-app\controllers\l-admin\Kelola_smart_meeting.php 81
ERROR - 2021-11-18 17:12:02 --> Severity: error --> Exception: Call to a member function get_gallerys() on null D:\xampp71\htdocs\pupr\l-app\controllers\l-admin\Kelola_smart_meeting.php 81
ERROR - 2021-11-18 17:14:06 --> Severity: error --> Exception: Call to undefined method Smr_gambar_model::get_gallerys() D:\xampp71\htdocs\pupr\l-app\controllers\l-admin\Kelola_smart_meeting.php 84
ERROR - 2021-11-18 17:16:01 --> Query error: Unknown column 'room_nama' in 'order clause' - Invalid query: SELECT *
FROM `t_smr`
WHERE `unker_id` = '2'
ORDER BY `room_nama` ASC, `room_nomor` ASC
ERROR - 2021-11-18 17:19:05 --> Severity: Notice --> Undefined variable: kategori D:\xampp71\htdocs\pupr\l-app\views\mod\kelola-smart-meeting\view_kelola.php 16
ERROR - 2021-11-18 17:19:05 --> Severity: Notice --> Trying to get property of non-object D:\xampp71\htdocs\pupr\l-app\views\mod\kelola-smart-meeting\view_kelola.php 16
ERROR - 2021-11-18 17:19:05 --> Severity: Notice --> Undefined variable: kategori D:\xampp71\htdocs\pupr\l-app\views\mod\kelola-smart-meeting\view_kelola.php 113
ERROR - 2021-11-18 17:19:05 --> Severity: Notice --> Trying to get property of non-object D:\xampp71\htdocs\pupr\l-app\views\mod\kelola-smart-meeting\view_kelola.php 113
ERROR - 2021-11-18 17:19:05 --> Severity: Notice --> Undefined variable: kategori D:\xampp71\htdocs\pupr\l-app\views\mod\kelola-smart-meeting\view_kelola.php 123
ERROR - 2021-11-18 17:19:05 --> Severity: Notice --> Trying to get property of non-object D:\xampp71\htdocs\pupr\l-app\views\mod\kelola-smart-meeting\view_kelola.php 123
ERROR - 2021-11-18 17:19:05 --> Severity: Notice --> Undefined variable: kategori D:\xampp71\htdocs\pupr\l-app\views\mod\kelola-smart-meeting\view_kelola.php 175
ERROR - 2021-11-18 17:19:05 --> Severity: Notice --> Trying to get property of non-object D:\xampp71\htdocs\pupr\l-app\views\mod\kelola-smart-meeting\view_kelola.php 175
ERROR - 2021-11-18 17:19:05 --> Severity: Notice --> Undefined variable: kategori D:\xampp71\htdocs\pupr\l-app\views\mod\kelola-smart-meeting\view_kelola.php 185
ERROR - 2021-11-18 17:19:05 --> Severity: Notice --> Trying to get property of non-object D:\xampp71\htdocs\pupr\l-app\views\mod\kelola-smart-meeting\view_kelola.php 185
ERROR - 2021-11-18 17:19:05 --> Severity: Notice --> Undefined variable: kategori D:\xampp71\htdocs\pupr\l-app\views\mod\kelola-smart-meeting\view_kelola.php 215
ERROR - 2021-11-18 17:19:05 --> Severity: Notice --> Trying to get property of non-object D:\xampp71\htdocs\pupr\l-app\views\mod\kelola-smart-meeting\view_kelola.php 215
ERROR - 2021-11-18 17:19:05 --> Severity: Notice --> Undefined variable: kategori D:\xampp71\htdocs\pupr\l-app\views\mod\kelola-smart-meeting\view_kelola.php 249
ERROR - 2021-11-18 17:19:05 --> Severity: Notice --> Trying to get property of non-object D:\xampp71\htdocs\pupr\l-app\views\mod\kelola-smart-meeting\view_kelola.php 249
ERROR - 2021-11-18 17:19:05 --> Severity: Notice --> Undefined variable: kategori D:\xampp71\htdocs\pupr\l-app\views\mod\kelola-smart-meeting\view_kelola.php 267
ERROR - 2021-11-18 17:19:05 --> Severity: Notice --> Trying to get property of non-object D:\xampp71\htdocs\pupr\l-app\views\mod\kelola-smart-meeting\view_kelola.php 267
ERROR - 2021-11-18 17:19:05 --> Severity: Notice --> Undefined variable: kategori D:\xampp71\htdocs\pupr\l-app\views\mod\kelola-smart-meeting\view_kelola.php 309
ERROR - 2021-11-18 17:19:05 --> Severity: Notice --> Trying to get property of non-object D:\xampp71\htdocs\pupr\l-app\views\mod\kelola-smart-meeting\view_kelola.php 309
ERROR - 2021-11-18 17:19:05 --> Severity: Notice --> Undefined variable: kategori D:\xampp71\htdocs\pupr\l-app\views\mod\kelola-smart-meeting\view_kelola.php 319
ERROR - 2021-11-18 17:19:05 --> Severity: Notice --> Trying to get property of non-object D:\xampp71\htdocs\pupr\l-app\views\mod\kelola-smart-meeting\view_kelola.php 319
ERROR - 2021-11-18 17:20:14 --> Severity: Notice --> Undefined variable: kategori D:\xampp71\htdocs\pupr\l-app\views\mod\kelola-smart-meeting\view_kelola.php 113
ERROR - 2021-11-18 17:20:14 --> Severity: Notice --> Trying to get property of non-object D:\xampp71\htdocs\pupr\l-app\views\mod\kelola-smart-meeting\view_kelola.php 113
ERROR - 2021-11-18 17:20:14 --> Severity: Notice --> Undefined variable: kategori D:\xampp71\htdocs\pupr\l-app\views\mod\kelola-smart-meeting\view_kelola.php 123
ERROR - 2021-11-18 17:20:14 --> Severity: Notice --> Trying to get property of non-object D:\xampp71\htdocs\pupr\l-app\views\mod\kelola-smart-meeting\view_kelola.php 123
ERROR - 2021-11-18 17:20:14 --> Severity: Notice --> Undefined variable: kategori D:\xampp71\htdocs\pupr\l-app\views\mod\kelola-smart-meeting\view_kelola.php 175
ERROR - 2021-11-18 17:20:14 --> Severity: Notice --> Trying to get property of non-object D:\xampp71\htdocs\pupr\l-app\views\mod\kelola-smart-meeting\view_kelola.php 175
ERROR - 2021-11-18 17:20:14 --> Severity: Notice --> Undefined variable: kategori D:\xampp71\htdocs\pupr\l-app\views\mod\kelola-smart-meeting\view_kelola.php 185
ERROR - 2021-11-18 17:20:14 --> Severity: Notice --> Trying to get property of non-object D:\xampp71\htdocs\pupr\l-app\views\mod\kelola-smart-meeting\view_kelola.php 185
ERROR - 2021-11-18 17:20:14 --> Severity: Notice --> Undefined variable: kategori D:\xampp71\htdocs\pupr\l-app\views\mod\kelola-smart-meeting\view_kelola.php 215
ERROR - 2021-11-18 17:20:14 --> Severity: Notice --> Trying to get property of non-object D:\xampp71\htdocs\pupr\l-app\views\mod\kelola-smart-meeting\view_kelola.php 215
ERROR - 2021-11-18 17:20:14 --> Severity: Notice --> Undefined variable: kategori D:\xampp71\htdocs\pupr\l-app\views\mod\kelola-smart-meeting\view_kelola.php 249
ERROR - 2021-11-18 17:20:14 --> Severity: Notice --> Trying to get property of non-object D:\xampp71\htdocs\pupr\l-app\views\mod\kelola-smart-meeting\view_kelola.php 249
ERROR - 2021-11-18 17:20:14 --> Severity: Notice --> Undefined variable: kategori D:\xampp71\htdocs\pupr\l-app\views\mod\kelola-smart-meeting\view_kelola.php 267
ERROR - 2021-11-18 17:20:14 --> Severity: Notice --> Trying to get property of non-object D:\xampp71\htdocs\pupr\l-app\views\mod\kelola-smart-meeting\view_kelola.php 267
ERROR - 2021-11-18 17:20:14 --> Severity: Notice --> Undefined variable: kategori D:\xampp71\htdocs\pupr\l-app\views\mod\kelola-smart-meeting\view_kelola.php 309
ERROR - 2021-11-18 17:20:14 --> Severity: Notice --> Trying to get property of non-object D:\xampp71\htdocs\pupr\l-app\views\mod\kelola-smart-meeting\view_kelola.php 309
ERROR - 2021-11-18 17:20:14 --> Severity: Notice --> Undefined variable: kategori D:\xampp71\htdocs\pupr\l-app\views\mod\kelola-smart-meeting\view_kelola.php 319
ERROR - 2021-11-18 17:20:14 --> Severity: Notice --> Trying to get property of non-object D:\xampp71\htdocs\pupr\l-app\views\mod\kelola-smart-meeting\view_kelola.php 319
ERROR - 2021-11-18 17:22:43 --> Severity: Notice --> Undefined variable: kategori D:\xampp71\htdocs\pupr\l-app\views\mod\kelola-smart-meeting\view_kelola.php 113
ERROR - 2021-11-18 17:22:43 --> Severity: Notice --> Trying to get property of non-object D:\xampp71\htdocs\pupr\l-app\views\mod\kelola-smart-meeting\view_kelola.php 113
ERROR - 2021-11-18 17:22:43 --> Severity: Notice --> Undefined variable: kategori D:\xampp71\htdocs\pupr\l-app\views\mod\kelola-smart-meeting\view_kelola.php 123
ERROR - 2021-11-18 17:22:43 --> Severity: Notice --> Trying to get property of non-object D:\xampp71\htdocs\pupr\l-app\views\mod\kelola-smart-meeting\view_kelola.php 123
ERROR - 2021-11-18 17:22:43 --> Severity: Notice --> Undefined variable: kategori D:\xampp71\htdocs\pupr\l-app\views\mod\kelola-smart-meeting\view_kelola.php 175
ERROR - 2021-11-18 17:22:43 --> Severity: Notice --> Trying to get property of non-object D:\xampp71\htdocs\pupr\l-app\views\mod\kelola-smart-meeting\view_kelola.php 175
ERROR - 2021-11-18 17:22:43 --> Severity: Notice --> Undefined variable: kategori D:\xampp71\htdocs\pupr\l-app\views\mod\kelola-smart-meeting\view_kelola.php 185
ERROR - 2021-11-18 17:22:43 --> Severity: Notice --> Trying to get property of non-object D:\xampp71\htdocs\pupr\l-app\views\mod\kelola-smart-meeting\view_kelola.php 185
ERROR - 2021-11-18 17:22:43 --> Severity: Notice --> Undefined variable: kategori D:\xampp71\htdocs\pupr\l-app\views\mod\kelola-smart-meeting\view_kelola.php 215
ERROR - 2021-11-18 17:22:43 --> Severity: Notice --> Trying to get property of non-object D:\xampp71\htdocs\pupr\l-app\views\mod\kelola-smart-meeting\view_kelola.php 215
ERROR - 2021-11-18 17:22:43 --> Severity: Notice --> Undefined variable: kategori D:\xampp71\htdocs\pupr\l-app\views\mod\kelola-smart-meeting\view_kelola.php 249
ERROR - 2021-11-18 17:22:43 --> Severity: Notice --> Trying to get property of non-object D:\xampp71\htdocs\pupr\l-app\views\mod\kelola-smart-meeting\view_kelola.php 249
ERROR - 2021-11-18 17:22:43 --> Severity: Notice --> Undefined variable: kategori D:\xampp71\htdocs\pupr\l-app\views\mod\kelola-smart-meeting\view_kelola.php 267
ERROR - 2021-11-18 17:22:43 --> Severity: Notice --> Trying to get property of non-object D:\xampp71\htdocs\pupr\l-app\views\mod\kelola-smart-meeting\view_kelola.php 267
ERROR - 2021-11-18 17:22:43 --> Severity: Notice --> Undefined variable: kategori D:\xampp71\htdocs\pupr\l-app\views\mod\kelola-smart-meeting\view_kelola.php 309
ERROR - 2021-11-18 17:22:43 --> Severity: Notice --> Trying to get property of non-object D:\xampp71\htdocs\pupr\l-app\views\mod\kelola-smart-meeting\view_kelola.php 309
ERROR - 2021-11-18 17:22:43 --> Severity: Notice --> Undefined variable: kategori D:\xampp71\htdocs\pupr\l-app\views\mod\kelola-smart-meeting\view_kelola.php 319
ERROR - 2021-11-18 17:22:43 --> Severity: Notice --> Trying to get property of non-object D:\xampp71\htdocs\pupr\l-app\views\mod\kelola-smart-meeting\view_kelola.php 319
ERROR - 2021-11-18 17:22:55 --> Severity: Notice --> Undefined variable: kategori D:\xampp71\htdocs\pupr\l-app\views\mod\kelola-smart-meeting\view_kelola.php 113
ERROR - 2021-11-18 17:22:55 --> Severity: Notice --> Trying to get property of non-object D:\xampp71\htdocs\pupr\l-app\views\mod\kelola-smart-meeting\view_kelola.php 113
ERROR - 2021-11-18 17:22:55 --> Severity: Notice --> Undefined variable: kategori D:\xampp71\htdocs\pupr\l-app\views\mod\kelola-smart-meeting\view_kelola.php 123
ERROR - 2021-11-18 17:22:55 --> Severity: Notice --> Trying to get property of non-object D:\xampp71\htdocs\pupr\l-app\views\mod\kelola-smart-meeting\view_kelola.php 123
ERROR - 2021-11-18 17:22:55 --> Severity: Notice --> Undefined variable: kategori D:\xampp71\htdocs\pupr\l-app\views\mod\kelola-smart-meeting\view_kelola.php 175
ERROR - 2021-11-18 17:22:55 --> Severity: Notice --> Trying to get property of non-object D:\xampp71\htdocs\pupr\l-app\views\mod\kelola-smart-meeting\view_kelola.php 175
ERROR - 2021-11-18 17:22:55 --> Severity: Notice --> Undefined variable: kategori D:\xampp71\htdocs\pupr\l-app\views\mod\kelola-smart-meeting\view_kelola.php 185
ERROR - 2021-11-18 17:22:55 --> Severity: Notice --> Trying to get property of non-object D:\xampp71\htdocs\pupr\l-app\views\mod\kelola-smart-meeting\view_kelola.php 185
ERROR - 2021-11-18 17:22:55 --> Severity: Notice --> Undefined variable: kategori D:\xampp71\htdocs\pupr\l-app\views\mod\kelola-smart-meeting\view_kelola.php 215
ERROR - 2021-11-18 17:22:55 --> Severity: Notice --> Trying to get property of non-object D:\xampp71\htdocs\pupr\l-app\views\mod\kelola-smart-meeting\view_kelola.php 215
ERROR - 2021-11-18 17:22:55 --> Severity: Notice --> Undefined variable: kategori D:\xampp71\htdocs\pupr\l-app\views\mod\kelola-smart-meeting\view_kelola.php 249
ERROR - 2021-11-18 17:22:55 --> Severity: Notice --> Trying to get property of non-object D:\xampp71\htdocs\pupr\l-app\views\mod\kelola-smart-meeting\view_kelola.php 249
ERROR - 2021-11-18 17:22:55 --> Severity: Notice --> Undefined variable: kategori D:\xampp71\htdocs\pupr\l-app\views\mod\kelola-smart-meeting\view_kelola.php 267
ERROR - 2021-11-18 17:22:55 --> Severity: Notice --> Trying to get property of non-object D:\xampp71\htdocs\pupr\l-app\views\mod\kelola-smart-meeting\view_kelola.php 267
ERROR - 2021-11-18 17:22:55 --> Severity: Notice --> Undefined variable: kategori D:\xampp71\htdocs\pupr\l-app\views\mod\kelola-smart-meeting\view_kelola.php 309
ERROR - 2021-11-18 17:22:55 --> Severity: Notice --> Trying to get property of non-object D:\xampp71\htdocs\pupr\l-app\views\mod\kelola-smart-meeting\view_kelola.php 309
ERROR - 2021-11-18 17:22:55 --> Severity: Notice --> Undefined variable: kategori D:\xampp71\htdocs\pupr\l-app\views\mod\kelola-smart-meeting\view_kelola.php 319
ERROR - 2021-11-18 17:22:55 --> Severity: Notice --> Trying to get property of non-object D:\xampp71\htdocs\pupr\l-app\views\mod\kelola-smart-meeting\view_kelola.php 319
ERROR - 2021-11-18 17:23:32 --> Severity: Notice --> Undefined variable: kategori D:\xampp71\htdocs\pupr\l-app\views\mod\kelola-smart-meeting\view_kelola.php 113
ERROR - 2021-11-18 17:23:32 --> Severity: Notice --> Trying to get property of non-object D:\xampp71\htdocs\pupr\l-app\views\mod\kelola-smart-meeting\view_kelola.php 113
ERROR - 2021-11-18 17:23:32 --> Severity: Notice --> Undefined variable: kategori D:\xampp71\htdocs\pupr\l-app\views\mod\kelola-smart-meeting\view_kelola.php 123
ERROR - 2021-11-18 17:23:32 --> Severity: Notice --> Trying to get property of non-object D:\xampp71\htdocs\pupr\l-app\views\mod\kelola-smart-meeting\view_kelola.php 123
ERROR - 2021-11-18 17:23:32 --> Severity: Notice --> Undefined variable: kategori D:\xampp71\htdocs\pupr\l-app\views\mod\kelola-smart-meeting\view_kelola.php 175
ERROR - 2021-11-18 17:23:32 --> Severity: Notice --> Trying to get property of non-object D:\xampp71\htdocs\pupr\l-app\views\mod\kelola-smart-meeting\view_kelola.php 175
ERROR - 2021-11-18 17:23:32 --> Severity: Notice --> Undefined variable: kategori D:\xampp71\htdocs\pupr\l-app\views\mod\kelola-smart-meeting\view_kelola.php 185
ERROR - 2021-11-18 17:23:32 --> Severity: Notice --> Trying to get property of non-object D:\xampp71\htdocs\pupr\l-app\views\mod\kelola-smart-meeting\view_kelola.php 185
ERROR - 2021-11-18 17:23:32 --> Severity: Notice --> Undefined variable: kategori D:\xampp71\htdocs\pupr\l-app\views\mod\kelola-smart-meeting\view_kelola.php 215
ERROR - 2021-11-18 17:23:32 --> Severity: Notice --> Trying to get property of non-object D:\xampp71\htdocs\pupr\l-app\views\mod\kelola-smart-meeting\view_kelola.php 215
ERROR - 2021-11-18 17:23:32 --> Severity: Notice --> Undefined variable: kategori D:\xampp71\htdocs\pupr\l-app\views\mod\kelola-smart-meeting\view_kelola.php 249
ERROR - 2021-11-18 17:23:32 --> Severity: Notice --> Trying to get property of non-object D:\xampp71\htdocs\pupr\l-app\views\mod\kelola-smart-meeting\view_kelola.php 249
ERROR - 2021-11-18 17:23:32 --> Severity: Notice --> Undefined variable: kategori D:\xampp71\htdocs\pupr\l-app\views\mod\kelola-smart-meeting\view_kelola.php 267
ERROR - 2021-11-18 17:23:32 --> Severity: Notice --> Trying to get property of non-object D:\xampp71\htdocs\pupr\l-app\views\mod\kelola-smart-meeting\view_kelola.php 267
ERROR - 2021-11-18 17:23:32 --> Severity: Notice --> Undefined variable: kategori D:\xampp71\htdocs\pupr\l-app\views\mod\kelola-smart-meeting\view_kelola.php 309
ERROR - 2021-11-18 17:23:32 --> Severity: Notice --> Trying to get property of non-object D:\xampp71\htdocs\pupr\l-app\views\mod\kelola-smart-meeting\view_kelola.php 309
ERROR - 2021-11-18 17:23:32 --> Severity: Notice --> Undefined variable: kategori D:\xampp71\htdocs\pupr\l-app\views\mod\kelola-smart-meeting\view_kelola.php 319
ERROR - 2021-11-18 17:23:32 --> Severity: Notice --> Trying to get property of non-object D:\xampp71\htdocs\pupr\l-app\views\mod\kelola-smart-meeting\view_kelola.php 319
ERROR - 2021-11-18 17:24:02 --> Severity: Notice --> Undefined variable: kategori D:\xampp71\htdocs\pupr\l-app\views\mod\kelola-smart-meeting\view_kelola.php 113
ERROR - 2021-11-18 17:24:02 --> Severity: Notice --> Trying to get property of non-object D:\xampp71\htdocs\pupr\l-app\views\mod\kelola-smart-meeting\view_kelola.php 113
ERROR - 2021-11-18 17:24:02 --> Severity: Notice --> Undefined variable: kategori D:\xampp71\htdocs\pupr\l-app\views\mod\kelola-smart-meeting\view_kelola.php 123
ERROR - 2021-11-18 17:24:02 --> Severity: Notice --> Trying to get property of non-object D:\xampp71\htdocs\pupr\l-app\views\mod\kelola-smart-meeting\view_kelola.php 123
ERROR - 2021-11-18 17:24:02 --> Severity: Notice --> Undefined variable: kategori D:\xampp71\htdocs\pupr\l-app\views\mod\kelola-smart-meeting\view_kelola.php 175
ERROR - 2021-11-18 17:24:02 --> Severity: Notice --> Trying to get property of non-object D:\xampp71\htdocs\pupr\l-app\views\mod\kelola-smart-meeting\view_kelola.php 175
ERROR - 2021-11-18 17:24:02 --> Severity: Notice --> Undefined variable: kategori D:\xampp71\htdocs\pupr\l-app\views\mod\kelola-smart-meeting\view_kelola.php 185
ERROR - 2021-11-18 17:24:02 --> Severity: Notice --> Trying to get property of non-object D:\xampp71\htdocs\pupr\l-app\views\mod\kelola-smart-meeting\view_kelola.php 185
ERROR - 2021-11-18 17:24:02 --> Severity: Notice --> Undefined variable: kategori D:\xampp71\htdocs\pupr\l-app\views\mod\kelola-smart-meeting\view_kelola.php 215
ERROR - 2021-11-18 17:24:02 --> Severity: Notice --> Trying to get property of non-object D:\xampp71\htdocs\pupr\l-app\views\mod\kelola-smart-meeting\view_kelola.php 215
ERROR - 2021-11-18 17:24:02 --> Severity: Notice --> Undefined variable: kategori D:\xampp71\htdocs\pupr\l-app\views\mod\kelola-smart-meeting\view_kelola.php 249
ERROR - 2021-11-18 17:24:02 --> Severity: Notice --> Trying to get property of non-object D:\xampp71\htdocs\pupr\l-app\views\mod\kelola-smart-meeting\view_kelola.php 249
ERROR - 2021-11-18 17:24:02 --> Severity: Notice --> Undefined variable: kategori D:\xampp71\htdocs\pupr\l-app\views\mod\kelola-smart-meeting\view_kelola.php 267
ERROR - 2021-11-18 17:24:02 --> Severity: Notice --> Trying to get property of non-object D:\xampp71\htdocs\pupr\l-app\views\mod\kelola-smart-meeting\view_kelola.php 267
ERROR - 2021-11-18 17:24:02 --> Severity: Notice --> Undefined variable: kategori D:\xampp71\htdocs\pupr\l-app\views\mod\kelola-smart-meeting\view_kelola.php 309
ERROR - 2021-11-18 17:24:02 --> Severity: Notice --> Trying to get property of non-object D:\xampp71\htdocs\pupr\l-app\views\mod\kelola-smart-meeting\view_kelola.php 309
ERROR - 2021-11-18 17:24:02 --> Severity: Notice --> Undefined variable: kategori D:\xampp71\htdocs\pupr\l-app\views\mod\kelola-smart-meeting\view_kelola.php 319
ERROR - 2021-11-18 17:24:02 --> Severity: Notice --> Trying to get property of non-object D:\xampp71\htdocs\pupr\l-app\views\mod\kelola-smart-meeting\view_kelola.php 319
ERROR - 2021-11-18 17:26:08 --> Severity: Notice --> Undefined variable: kategori D:\xampp71\htdocs\pupr\l-app\views\mod\kelola-smart-meeting\view_kelola.php 113
ERROR - 2021-11-18 17:26:08 --> Severity: Notice --> Trying to get property of non-object D:\xampp71\htdocs\pupr\l-app\views\mod\kelola-smart-meeting\view_kelola.php 113
ERROR - 2021-11-18 17:26:08 --> Severity: Notice --> Undefined variable: kategori D:\xampp71\htdocs\pupr\l-app\views\mod\kelola-smart-meeting\view_kelola.php 123
ERROR - 2021-11-18 17:26:08 --> Severity: Notice --> Trying to get property of non-object D:\xampp71\htdocs\pupr\l-app\views\mod\kelola-smart-meeting\view_kelola.php 123
ERROR - 2021-11-18 17:26:08 --> Severity: Notice --> Undefined variable: kategori D:\xampp71\htdocs\pupr\l-app\views\mod\kelola-smart-meeting\view_kelola.php 175
ERROR - 2021-11-18 17:26:08 --> Severity: Notice --> Trying to get property of non-object D:\xampp71\htdocs\pupr\l-app\views\mod\kelola-smart-meeting\view_kelola.php 175
ERROR - 2021-11-18 17:26:08 --> Severity: Notice --> Undefined variable: kategori D:\xampp71\htdocs\pupr\l-app\views\mod\kelola-smart-meeting\view_kelola.php 185
ERROR - 2021-11-18 17:26:08 --> Severity: Notice --> Trying to get property of non-object D:\xampp71\htdocs\pupr\l-app\views\mod\kelola-smart-meeting\view_kelola.php 185
ERROR - 2021-11-18 17:26:08 --> Severity: Notice --> Undefined variable: kategori D:\xampp71\htdocs\pupr\l-app\views\mod\kelola-smart-meeting\view_kelola.php 215
ERROR - 2021-11-18 17:26:08 --> Severity: Notice --> Trying to get property of non-object D:\xampp71\htdocs\pupr\l-app\views\mod\kelola-smart-meeting\view_kelola.php 215
ERROR - 2021-11-18 17:26:08 --> Severity: Notice --> Undefined variable: kategori D:\xampp71\htdocs\pupr\l-app\views\mod\kelola-smart-meeting\view_kelola.php 249
ERROR - 2021-11-18 17:26:08 --> Severity: Notice --> Trying to get property of non-object D:\xampp71\htdocs\pupr\l-app\views\mod\kelola-smart-meeting\view_kelola.php 249
ERROR - 2021-11-18 17:26:08 --> Severity: Notice --> Undefined variable: kategori D:\xampp71\htdocs\pupr\l-app\views\mod\kelola-smart-meeting\view_kelola.php 267
ERROR - 2021-11-18 17:26:08 --> Severity: Notice --> Trying to get property of non-object D:\xampp71\htdocs\pupr\l-app\views\mod\kelola-smart-meeting\view_kelola.php 267
ERROR - 2021-11-18 17:26:08 --> Severity: Notice --> Undefined variable: kategori D:\xampp71\htdocs\pupr\l-app\views\mod\kelola-smart-meeting\view_kelola.php 309
ERROR - 2021-11-18 17:26:08 --> Severity: Notice --> Trying to get property of non-object D:\xampp71\htdocs\pupr\l-app\views\mod\kelola-smart-meeting\view_kelola.php 309
ERROR - 2021-11-18 17:26:08 --> Severity: Notice --> Undefined variable: kategori D:\xampp71\htdocs\pupr\l-app\views\mod\kelola-smart-meeting\view_kelola.php 319
ERROR - 2021-11-18 17:26:08 --> Severity: Notice --> Trying to get property of non-object D:\xampp71\htdocs\pupr\l-app\views\mod\kelola-smart-meeting\view_kelola.php 319
ERROR - 2021-11-18 17:26:27 --> Severity: Notice --> Undefined variable: kategori D:\xampp71\htdocs\pupr\l-app\views\mod\kelola-smart-meeting\view_kelola.php 113
ERROR - 2021-11-18 17:26:27 --> Severity: Notice --> Trying to get property of non-object D:\xampp71\htdocs\pupr\l-app\views\mod\kelola-smart-meeting\view_kelola.php 113
ERROR - 2021-11-18 17:26:27 --> Severity: Notice --> Undefined variable: kategori D:\xampp71\htdocs\pupr\l-app\views\mod\kelola-smart-meeting\view_kelola.php 123
ERROR - 2021-11-18 17:26:27 --> Severity: Notice --> Trying to get property of non-object D:\xampp71\htdocs\pupr\l-app\views\mod\kelola-smart-meeting\view_kelola.php 123
ERROR - 2021-11-18 17:26:27 --> Severity: Notice --> Undefined variable: kategori D:\xampp71\htdocs\pupr\l-app\views\mod\kelola-smart-meeting\view_kelola.php 175
ERROR - 2021-11-18 17:26:27 --> Severity: Notice --> Trying to get property of non-object D:\xampp71\htdocs\pupr\l-app\views\mod\kelola-smart-meeting\view_kelola.php 175
ERROR - 2021-11-18 17:26:27 --> Severity: Notice --> Undefined variable: kategori D:\xampp71\htdocs\pupr\l-app\views\mod\kelola-smart-meeting\view_kelola.php 185
ERROR - 2021-11-18 17:26:27 --> Severity: Notice --> Trying to get property of non-object D:\xampp71\htdocs\pupr\l-app\views\mod\kelola-smart-meeting\view_kelola.php 185
ERROR - 2021-11-18 17:26:27 --> Severity: Notice --> Undefined variable: kategori D:\xampp71\htdocs\pupr\l-app\views\mod\kelola-smart-meeting\view_kelola.php 215
ERROR - 2021-11-18 17:26:27 --> Severity: Notice --> Trying to get property of non-object D:\xampp71\htdocs\pupr\l-app\views\mod\kelola-smart-meeting\view_kelola.php 215
ERROR - 2021-11-18 17:26:27 --> Severity: Notice --> Undefined variable: kategori D:\xampp71\htdocs\pupr\l-app\views\mod\kelola-smart-meeting\view_kelola.php 249
ERROR - 2021-11-18 17:26:27 --> Severity: Notice --> Trying to get property of non-object D:\xampp71\htdocs\pupr\l-app\views\mod\kelola-smart-meeting\view_kelola.php 249
ERROR - 2021-11-18 17:26:27 --> Severity: Notice --> Undefined variable: kategori D:\xampp71\htdocs\pupr\l-app\views\mod\kelola-smart-meeting\view_kelola.php 267
ERROR - 2021-11-18 17:26:27 --> Severity: Notice --> Trying to get property of non-object D:\xampp71\htdocs\pupr\l-app\views\mod\kelola-smart-meeting\view_kelola.php 267
ERROR - 2021-11-18 17:26:27 --> Severity: Notice --> Undefined variable: kategori D:\xampp71\htdocs\pupr\l-app\views\mod\kelola-smart-meeting\view_kelola.php 309
ERROR - 2021-11-18 17:26:27 --> Severity: Notice --> Trying to get property of non-object D:\xampp71\htdocs\pupr\l-app\views\mod\kelola-smart-meeting\view_kelola.php 309
ERROR - 2021-11-18 17:26:27 --> Severity: Notice --> Undefined variable: kategori D:\xampp71\htdocs\pupr\l-app\views\mod\kelola-smart-meeting\view_kelola.php 319
ERROR - 2021-11-18 17:26:27 --> Severity: Notice --> Trying to get property of non-object D:\xampp71\htdocs\pupr\l-app\views\mod\kelola-smart-meeting\view_kelola.php 319
ERROR - 2021-11-18 17:26:50 --> Severity: Notice --> Undefined variable: kategori D:\xampp71\htdocs\pupr\l-app\views\mod\kelola-smart-meeting\view_kelola.php 123
ERROR - 2021-11-18 17:26:50 --> Severity: Notice --> Trying to get property of non-object D:\xampp71\htdocs\pupr\l-app\views\mod\kelola-smart-meeting\view_kelola.php 123
ERROR - 2021-11-18 17:26:50 --> Severity: Notice --> Undefined variable: kategori D:\xampp71\htdocs\pupr\l-app\views\mod\kelola-smart-meeting\view_kelola.php 185
ERROR - 2021-11-18 17:26:50 --> Severity: Notice --> Trying to get property of non-object D:\xampp71\htdocs\pupr\l-app\views\mod\kelola-smart-meeting\view_kelola.php 185
ERROR - 2021-11-18 17:26:50 --> Severity: Notice --> Undefined variable: kategori D:\xampp71\htdocs\pupr\l-app\views\mod\kelola-smart-meeting\view_kelola.php 267
ERROR - 2021-11-18 17:26:50 --> Severity: Notice --> Trying to get property of non-object D:\xampp71\htdocs\pupr\l-app\views\mod\kelola-smart-meeting\view_kelola.php 267
ERROR - 2021-11-18 17:26:50 --> Severity: Notice --> Undefined variable: kategori D:\xampp71\htdocs\pupr\l-app\views\mod\kelola-smart-meeting\view_kelola.php 319
ERROR - 2021-11-18 17:26:50 --> Severity: Notice --> Trying to get property of non-object D:\xampp71\htdocs\pupr\l-app\views\mod\kelola-smart-meeting\view_kelola.php 319
ERROR - 2021-11-18 17:34:49 --> Severity: Notice --> Undefined property: Kelola_smart_meeting::$room_model D:\xampp71\htdocs\pupr\l-app\controllers\l-admin\Kelola_smart_meeting.php 122
ERROR - 2021-11-18 17:34:49 --> Severity: error --> Exception: Call to a member function insert() on null D:\xampp71\htdocs\pupr\l-app\controllers\l-admin\Kelola_smart_meeting.php 122
ERROR - 2021-11-18 17:40:47 --> Severity: Notice --> Undefined property: Kelola_smart_meeting::$room_model D:\xampp71\htdocs\pupr\l-app\controllers\l-admin\Kelola_smart_meeting.php 122
ERROR - 2021-11-18 17:40:47 --> Severity: error --> Exception: Call to a member function insert() on null D:\xampp71\htdocs\pupr\l-app\controllers\l-admin\Kelola_smart_meeting.php 122
