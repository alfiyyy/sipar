<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2021-11-12 02:41:13 --> Severity: Notice --> Undefined index: wdeleteaccess D:\xampp71\htdocs\pupr\l-app\libraries\Cifire_Role.php 62
ERROR - 2021-11-12 10:48:13 --> Severity: Notice --> Undefined index: wdeleteaccess D:\xampp71\htdocs\pupr\l-app\libraries\Cifire_Role.php 62
ERROR - 2021-11-12 11:57:24 --> Severity: Notice --> Undefined variable: result D:\xampp71\htdocs\pupr\l-app\models\mod\Room_model.php 57
ERROR - 2021-11-12 11:57:30 --> Severity: Notice --> Undefined variable: result D:\xampp71\htdocs\pupr\l-app\models\mod\Room_model.php 57
ERROR - 2021-11-12 11:57:39 --> Severity: Notice --> Undefined variable: result D:\xampp71\htdocs\pupr\l-app\models\mod\Room_model.php 57
ERROR - 2021-11-12 12:13:58 --> Severity: Notice --> Use of undefined constant id - assumed 'id' D:\xampp71\htdocs\pupr\l-app\models\mod\Room_model.php 213
ERROR - 2021-11-12 12:13:58 --> Severity: error --> Exception: Call to undefined method CI_DB_pdo_result::get() D:\xampp71\htdocs\pupr\l-app\models\mod\Room_model.php 214
ERROR - 2021-11-12 12:14:11 --> Severity: Notice --> Use of undefined constant id - assumed 'id' D:\xampp71\htdocs\pupr\l-app\models\mod\Room_model.php 213
ERROR - 2021-11-12 12:14:11 --> Severity: error --> Exception: Call to undefined method CI_DB_pdo_result::get() D:\xampp71\htdocs\pupr\l-app\models\mod\Room_model.php 214
ERROR - 2021-11-12 12:14:31 --> Severity: error --> Exception: Call to undefined method CI_DB_pdo_result::get() D:\xampp71\htdocs\pupr\l-app\models\mod\Room_model.php 214
ERROR - 2021-11-12 14:35:44 --> Severity: Notice --> Undefined index: wdeleteaccess D:\xampp71\htdocs\pupr\l-app\libraries\Cifire_Role.php 62
ERROR - 2021-11-12 15:20:31 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'OUTER JOIN `t_booking_room` ON `t_booking_room`.`kategori_id` = `t_room`.`katego' at line 5 - Invalid query: SELECT `t_room`.*, `t_booking_room`.`br_tanggal_in`, count(t_booking_room.br_id) as total, `t_room_kategori`.`kategori_nama`, `t_unit_kerja`.`unker_id`
FROM `t_room`
JOIN `t_room_kategori` ON `t_room`.`kategori_id` = `t_room_kategori`.`kategori_id`
JOIN `t_unit_kerja` ON `t_room_kategori`.`unker_id` = `t_unit_kerja`.`unker_id`
OUTER JOIN `t_booking_room` ON `t_booking_room`.`kategori_id` = `t_room`.`kategori_id`
WHERE `t_unit_kerja`.`unker_id` = '2'
AND `t_booking_room`.`br_tanggal_in` = '2021-11-12'
GROUP BY `t_room`.`room_id`
ORDER BY `t_room`.`kategori_id` ASC, `t_room`.`room_nama` ASC, `t_room`.`room_nomor` ASC, `room_id` DESC
 LIMIT 100
ERROR - 2021-11-12 15:38:18 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 't_booking_room.br_id) as total, `t_room_kategori`.`kategori_nama`, `t_unit_kerja' at line 1 - Invalid query: SELECT `t_room`.*, `t_booking_room`.`br_tanggal_in`, count(distict t_booking_room.br_id) as total, `t_room_kategori`.`kategori_nama`, `t_unit_kerja`.`unker_id`
FROM `t_room`
JOIN `t_room_kategori` ON `t_room`.`kategori_id` = `t_room_kategori`.`kategori_id`
JOIN `t_unit_kerja` ON `t_room_kategori`.`unker_id` = `t_unit_kerja`.`unker_id`
LEFT JOIN `t_booking_room` ON `t_booking_room`.`room_id` = `t_room`.`room_id`
WHERE `t_unit_kerja`.`unker_id` = '2'
AND `t_booking_room`.`br_tanggal_in` = '2021-11-12'
GROUP BY `t_room`.`room_id`
ORDER BY `t_room`.`kategori_id` ASC, `t_room`.`room_nama` ASC, `t_room`.`room_nomor` ASC, `room_id` DESC
 LIMIT 100
ERROR - 2021-11-12 15:44:07 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 't_booking_room.br_id) as total, `t_room_kategori`.`kategori_nama`, `t_unit_kerja' at line 1 - Invalid query: SELECT `t_room`.*, `t_booking_room`.`br_tanggal_in`, count(distict t_booking_room.br_id) as total, `t_room_kategori`.`kategori_nama`, `t_unit_kerja`.`unker_id`
FROM `t_room`
JOIN `t_room_kategori` ON `t_room`.`kategori_id` = `t_room_kategori`.`kategori_id`
JOIN `t_unit_kerja` ON `t_room_kategori`.`unker_id` = `t_unit_kerja`.`unker_id`
LEFT JOIN `t_booking_room` ON `t_booking_room`.`room_id` = `t_room`.`room_id`
WHERE `t_unit_kerja`.`unker_id` = '2'
AND `t_booking_room`.`br_tanggal_in` = '2021-11-12'
GROUP BY `t_room`.`room_id`
ORDER BY `t_room`.`kategori_id` ASC, `t_room`.`room_nama` ASC, `t_room`.`room_nomor` ASC, `room_id` DESC
 LIMIT 100
ERROR - 2021-11-12 16:00:04 --> Severity: Notice --> Undefined index: br_tanggal_in D:\xampp71\htdocs\pupr\l-app\controllers\l-admin\Laporan_booking.php 45
ERROR - 2021-11-12 16:00:04 --> Severity: Notice --> Undefined index: total D:\xampp71\htdocs\pupr\l-app\controllers\l-admin\Laporan_booking.php 46
ERROR - 2021-11-12 16:00:04 --> Severity: Notice --> Undefined index: br_tanggal_in D:\xampp71\htdocs\pupr\l-app\controllers\l-admin\Laporan_booking.php 45
ERROR - 2021-11-12 16:00:04 --> Severity: Notice --> Undefined index: total D:\xampp71\htdocs\pupr\l-app\controllers\l-admin\Laporan_booking.php 46
ERROR - 2021-11-12 16:00:04 --> Severity: Notice --> Undefined index: br_tanggal_in D:\xampp71\htdocs\pupr\l-app\controllers\l-admin\Laporan_booking.php 45
ERROR - 2021-11-12 16:00:04 --> Severity: Notice --> Undefined index: total D:\xampp71\htdocs\pupr\l-app\controllers\l-admin\Laporan_booking.php 46
ERROR - 2021-11-12 16:00:04 --> Severity: Notice --> Undefined index: br_tanggal_in D:\xampp71\htdocs\pupr\l-app\controllers\l-admin\Laporan_booking.php 45
ERROR - 2021-11-12 16:00:04 --> Severity: Notice --> Undefined index: total D:\xampp71\htdocs\pupr\l-app\controllers\l-admin\Laporan_booking.php 46
ERROR - 2021-11-12 16:00:04 --> Severity: Notice --> Undefined index: br_tanggal_in D:\xampp71\htdocs\pupr\l-app\controllers\l-admin\Laporan_booking.php 45
ERROR - 2021-11-12 16:00:04 --> Severity: Notice --> Undefined index: total D:\xampp71\htdocs\pupr\l-app\controllers\l-admin\Laporan_booking.php 46
ERROR - 2021-11-12 16:00:04 --> Severity: Notice --> Undefined index: br_tanggal_in D:\xampp71\htdocs\pupr\l-app\controllers\l-admin\Laporan_booking.php 45
ERROR - 2021-11-12 16:00:04 --> Severity: Notice --> Undefined index: total D:\xampp71\htdocs\pupr\l-app\controllers\l-admin\Laporan_booking.php 46
ERROR - 2021-11-12 16:00:04 --> Severity: Notice --> Undefined index: br_tanggal_in D:\xampp71\htdocs\pupr\l-app\controllers\l-admin\Laporan_booking.php 45
ERROR - 2021-11-12 16:00:04 --> Severity: Notice --> Undefined index: total D:\xampp71\htdocs\pupr\l-app\controllers\l-admin\Laporan_booking.php 46
ERROR - 2021-11-12 16:00:04 --> Severity: Notice --> Undefined index: br_tanggal_in D:\xampp71\htdocs\pupr\l-app\controllers\l-admin\Laporan_booking.php 45
ERROR - 2021-11-12 16:00:04 --> Severity: Notice --> Undefined index: total D:\xampp71\htdocs\pupr\l-app\controllers\l-admin\Laporan_booking.php 46
ERROR - 2021-11-12 16:00:04 --> Severity: Notice --> Undefined index: br_tanggal_in D:\xampp71\htdocs\pupr\l-app\controllers\l-admin\Laporan_booking.php 45
ERROR - 2021-11-12 16:00:04 --> Severity: Notice --> Undefined index: total D:\xampp71\htdocs\pupr\l-app\controllers\l-admin\Laporan_booking.php 46
ERROR - 2021-11-12 16:00:04 --> Severity: Notice --> Undefined index: br_tanggal_in D:\xampp71\htdocs\pupr\l-app\controllers\l-admin\Laporan_booking.php 45
ERROR - 2021-11-12 16:00:04 --> Severity: Notice --> Undefined index: total D:\xampp71\htdocs\pupr\l-app\controllers\l-admin\Laporan_booking.php 46
ERROR - 2021-11-12 16:00:04 --> Severity: Notice --> Undefined index: br_tanggal_in D:\xampp71\htdocs\pupr\l-app\controllers\l-admin\Laporan_booking.php 45
ERROR - 2021-11-12 16:00:04 --> Severity: Notice --> Undefined index: total D:\xampp71\htdocs\pupr\l-app\controllers\l-admin\Laporan_booking.php 46
ERROR - 2021-11-12 16:00:04 --> Severity: Notice --> Undefined index: br_tanggal_in D:\xampp71\htdocs\pupr\l-app\controllers\l-admin\Laporan_booking.php 45
ERROR - 2021-11-12 16:00:04 --> Severity: Notice --> Undefined index: total D:\xampp71\htdocs\pupr\l-app\controllers\l-admin\Laporan_booking.php 46
ERROR - 2021-11-12 16:00:04 --> Severity: Notice --> Undefined index: br_tanggal_in D:\xampp71\htdocs\pupr\l-app\controllers\l-admin\Laporan_booking.php 45
ERROR - 2021-11-12 16:00:04 --> Severity: Notice --> Undefined index: total D:\xampp71\htdocs\pupr\l-app\controllers\l-admin\Laporan_booking.php 46
ERROR - 2021-11-12 16:00:04 --> Severity: Notice --> Undefined index: br_tanggal_in D:\xampp71\htdocs\pupr\l-app\controllers\l-admin\Laporan_booking.php 45
ERROR - 2021-11-12 16:00:04 --> Severity: Notice --> Undefined index: total D:\xampp71\htdocs\pupr\l-app\controllers\l-admin\Laporan_booking.php 46
ERROR - 2021-11-12 16:00:04 --> Severity: Notice --> Undefined index: br_tanggal_in D:\xampp71\htdocs\pupr\l-app\controllers\l-admin\Laporan_booking.php 45
ERROR - 2021-11-12 16:00:04 --> Severity: Notice --> Undefined index: total D:\xampp71\htdocs\pupr\l-app\controllers\l-admin\Laporan_booking.php 46
ERROR - 2021-11-12 16:00:04 --> Severity: Notice --> Undefined index: br_tanggal_in D:\xampp71\htdocs\pupr\l-app\controllers\l-admin\Laporan_booking.php 45
ERROR - 2021-11-12 16:00:04 --> Severity: Notice --> Undefined index: total D:\xampp71\htdocs\pupr\l-app\controllers\l-admin\Laporan_booking.php 46
ERROR - 2021-11-12 16:00:04 --> Severity: Notice --> Undefined index: br_tanggal_in D:\xampp71\htdocs\pupr\l-app\controllers\l-admin\Laporan_booking.php 45
ERROR - 2021-11-12 16:00:04 --> Severity: Notice --> Undefined index: total D:\xampp71\htdocs\pupr\l-app\controllers\l-admin\Laporan_booking.php 46
ERROR - 2021-11-12 16:00:04 --> Severity: Notice --> Undefined index: br_tanggal_in D:\xampp71\htdocs\pupr\l-app\controllers\l-admin\Laporan_booking.php 45
ERROR - 2021-11-12 16:00:04 --> Severity: Notice --> Undefined index: total D:\xampp71\htdocs\pupr\l-app\controllers\l-admin\Laporan_booking.php 46
ERROR - 2021-11-12 16:00:04 --> Severity: Notice --> Undefined index: br_tanggal_in D:\xampp71\htdocs\pupr\l-app\controllers\l-admin\Laporan_booking.php 45
ERROR - 2021-11-12 16:00:04 --> Severity: Notice --> Undefined index: total D:\xampp71\htdocs\pupr\l-app\controllers\l-admin\Laporan_booking.php 46
ERROR - 2021-11-12 16:00:04 --> Severity: Notice --> Undefined index: br_tanggal_in D:\xampp71\htdocs\pupr\l-app\controllers\l-admin\Laporan_booking.php 45
ERROR - 2021-11-12 16:00:04 --> Severity: Notice --> Undefined index: total D:\xampp71\htdocs\pupr\l-app\controllers\l-admin\Laporan_booking.php 46
ERROR - 2021-11-12 16:00:04 --> Severity: Notice --> Undefined index: br_tanggal_in D:\xampp71\htdocs\pupr\l-app\controllers\l-admin\Laporan_booking.php 45
ERROR - 2021-11-12 16:00:04 --> Severity: Notice --> Undefined index: total D:\xampp71\htdocs\pupr\l-app\controllers\l-admin\Laporan_booking.php 46
ERROR - 2021-11-12 16:00:04 --> Severity: Notice --> Undefined index: br_tanggal_in D:\xampp71\htdocs\pupr\l-app\controllers\l-admin\Laporan_booking.php 45
ERROR - 2021-11-12 16:00:04 --> Severity: Notice --> Undefined index: total D:\xampp71\htdocs\pupr\l-app\controllers\l-admin\Laporan_booking.php 46
ERROR - 2021-11-12 16:00:04 --> Severity: Notice --> Undefined index: br_tanggal_in D:\xampp71\htdocs\pupr\l-app\controllers\l-admin\Laporan_booking.php 45
ERROR - 2021-11-12 16:00:04 --> Severity: Notice --> Undefined index: total D:\xampp71\htdocs\pupr\l-app\controllers\l-admin\Laporan_booking.php 46
ERROR - 2021-11-12 16:00:04 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at D:\xampp71\htdocs\pupr\l-system\core\Exceptions.php:271) D:\xampp71\htdocs\pupr\l-system\core\Common.php 570
ERROR - 2021-11-12 16:00:24 --> Severity: Notice --> Undefined index: total D:\xampp71\htdocs\pupr\l-app\controllers\l-admin\Laporan_booking.php 46
ERROR - 2021-11-12 16:00:24 --> Severity: Notice --> Undefined index: total D:\xampp71\htdocs\pupr\l-app\controllers\l-admin\Laporan_booking.php 46
ERROR - 2021-11-12 16:00:24 --> Severity: Notice --> Undefined index: total D:\xampp71\htdocs\pupr\l-app\controllers\l-admin\Laporan_booking.php 46
ERROR - 2021-11-12 16:00:24 --> Severity: Notice --> Undefined index: total D:\xampp71\htdocs\pupr\l-app\controllers\l-admin\Laporan_booking.php 46
ERROR - 2021-11-12 16:00:24 --> Severity: Notice --> Undefined index: total D:\xampp71\htdocs\pupr\l-app\controllers\l-admin\Laporan_booking.php 46
ERROR - 2021-11-12 16:00:24 --> Severity: Notice --> Undefined index: total D:\xampp71\htdocs\pupr\l-app\controllers\l-admin\Laporan_booking.php 46
ERROR - 2021-11-12 16:00:24 --> Severity: Notice --> Undefined index: total D:\xampp71\htdocs\pupr\l-app\controllers\l-admin\Laporan_booking.php 46
ERROR - 2021-11-12 16:00:24 --> Severity: Notice --> Undefined index: total D:\xampp71\htdocs\pupr\l-app\controllers\l-admin\Laporan_booking.php 46
ERROR - 2021-11-12 16:00:24 --> Severity: Notice --> Undefined index: total D:\xampp71\htdocs\pupr\l-app\controllers\l-admin\Laporan_booking.php 46
ERROR - 2021-11-12 16:00:24 --> Severity: Notice --> Undefined index: total D:\xampp71\htdocs\pupr\l-app\controllers\l-admin\Laporan_booking.php 46
ERROR - 2021-11-12 16:00:24 --> Severity: Notice --> Undefined index: total D:\xampp71\htdocs\pupr\l-app\controllers\l-admin\Laporan_booking.php 46
ERROR - 2021-11-12 16:00:24 --> Severity: Notice --> Undefined index: total D:\xampp71\htdocs\pupr\l-app\controllers\l-admin\Laporan_booking.php 46
ERROR - 2021-11-12 16:00:24 --> Severity: Notice --> Undefined index: total D:\xampp71\htdocs\pupr\l-app\controllers\l-admin\Laporan_booking.php 46
ERROR - 2021-11-12 16:00:24 --> Severity: Notice --> Undefined index: total D:\xampp71\htdocs\pupr\l-app\controllers\l-admin\Laporan_booking.php 46
ERROR - 2021-11-12 16:00:24 --> Severity: Notice --> Undefined index: total D:\xampp71\htdocs\pupr\l-app\controllers\l-admin\Laporan_booking.php 46
ERROR - 2021-11-12 16:00:24 --> Severity: Notice --> Undefined index: total D:\xampp71\htdocs\pupr\l-app\controllers\l-admin\Laporan_booking.php 46
ERROR - 2021-11-12 16:00:24 --> Severity: Notice --> Undefined index: total D:\xampp71\htdocs\pupr\l-app\controllers\l-admin\Laporan_booking.php 46
ERROR - 2021-11-12 16:00:24 --> Severity: Notice --> Undefined index: total D:\xampp71\htdocs\pupr\l-app\controllers\l-admin\Laporan_booking.php 46
ERROR - 2021-11-12 16:00:24 --> Severity: Notice --> Undefined index: total D:\xampp71\htdocs\pupr\l-app\controllers\l-admin\Laporan_booking.php 46
ERROR - 2021-11-12 16:00:24 --> Severity: Notice --> Undefined index: total D:\xampp71\htdocs\pupr\l-app\controllers\l-admin\Laporan_booking.php 46
ERROR - 2021-11-12 16:00:24 --> Severity: Notice --> Undefined index: total D:\xampp71\htdocs\pupr\l-app\controllers\l-admin\Laporan_booking.php 46
ERROR - 2021-11-12 16:00:24 --> Severity: Notice --> Undefined index: total D:\xampp71\htdocs\pupr\l-app\controllers\l-admin\Laporan_booking.php 46
ERROR - 2021-11-12 16:00:24 --> Severity: Notice --> Undefined index: total D:\xampp71\htdocs\pupr\l-app\controllers\l-admin\Laporan_booking.php 46
ERROR - 2021-11-12 16:00:24 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at D:\xampp71\htdocs\pupr\l-system\core\Exceptions.php:271) D:\xampp71\htdocs\pupr\l-system\core\Common.php 570
ERROR - 2021-11-12 20:22:40 --> Severity: Notice --> Undefined index: wdeleteaccess D:\xampp71\htdocs\pupr\l-app\libraries\Cifire_Role.php 62
ERROR - 2021-11-12 21:11:58 --> Severity: Notice --> Undefined variable: data_room D:\xampp71\htdocs\pupr\l-app\views\mod\laporan-booking\view_index.php 39
ERROR - 2021-11-12 21:11:58 --> Severity: Warning --> Invalid argument supplied for foreach() D:\xampp71\htdocs\pupr\l-app\views\mod\laporan-booking\view_index.php 39
ERROR - 2021-11-12 21:23:21 --> Severity: error --> Exception: Call to undefined method CI_DB_pdo_mysql_driver::result_array() D:\xampp71\htdocs\pupr\l-app\controllers\l-admin\Laporan_booking.php 47
ERROR - 2021-11-12 21:23:36 --> Severity: error --> Exception: Call to undefined method CI_DB_pdo_mysql_driver::row_array() D:\xampp71\htdocs\pupr\l-app\controllers\l-admin\Laporan_booking.php 47
ERROR - 2021-11-12 21:23:47 --> Severity: error --> Exception: Call to undefined method CI_DB_pdo_mysql_driver::result() D:\xampp71\htdocs\pupr\l-app\controllers\l-admin\Laporan_booking.php 47
ERROR - 2021-11-12 23:04:51 --> Query error: Column 'created_at' in where clause is ambiguous - Invalid query: SELECT *
FROM `t_booking_room`
JOIN `t_peserta` ON `t_booking_room`.`peserta_id` = `t_peserta`.`peserta_id`
JOIN `t_room` ON `t_booking_room`.`room_id` = `t_room`.`room_id`
JOIN `t_room_kategori` ON `t_booking_room`.`kategori_id` = `t_room_kategori`.`kategori_id`
WHERE `t_booking_room`.`penyelenggara_id` = '4'
AND   (
`br_id` LIKE '%	Deni Caknan%' ESCAPE '!'
OR  `br_tanggal_in` LIKE '%	Deni Caknan%' ESCAPE '!'
OR  `br_tanggal_out` LIKE '%	Deni Caknan%' ESCAPE '!'
OR  `br_jml_hari` LIKE '%	Deni Caknan%' ESCAPE '!'
OR  `br_dokumen` LIKE '%	Deni Caknan%' ESCAPE '!'
OR  `created_at` LIKE '%	Deni Caknan%' ESCAPE '!'
OR  `br_id` LIKE '%	Deni Caknan%' ESCAPE '!'
 )
ORDER BY `br_id` DESC
 LIMIT 10
ERROR - 2021-11-12 23:04:56 --> Query error: Column 'created_at' in where clause is ambiguous - Invalid query: SELECT *
FROM `t_booking_room`
JOIN `t_peserta` ON `t_booking_room`.`peserta_id` = `t_peserta`.`peserta_id`
JOIN `t_room` ON `t_booking_room`.`room_id` = `t_room`.`room_id`
JOIN `t_room_kategori` ON `t_booking_room`.`kategori_id` = `t_room_kategori`.`kategori_id`
WHERE `t_booking_room`.`penyelenggara_id` = '4'
AND   (
`br_id` LIKE '%Deni Caknan%' ESCAPE '!'
OR  `br_tanggal_in` LIKE '%Deni Caknan%' ESCAPE '!'
OR  `br_tanggal_out` LIKE '%Deni Caknan%' ESCAPE '!'
OR  `br_jml_hari` LIKE '%Deni Caknan%' ESCAPE '!'
OR  `br_dokumen` LIKE '%Deni Caknan%' ESCAPE '!'
OR  `created_at` LIKE '%Deni Caknan%' ESCAPE '!'
OR  `br_id` LIKE '%Deni Caknan%' ESCAPE '!'
 )
ORDER BY `br_id` DESC
 LIMIT 10
ERROR - 2021-11-12 23:16:09 --> Severity: Error --> Allowed memory size of 134217728 bytes exhausted (tried to allocate 67125248 bytes) D:\xampp71\htdocs\pupr\l-app\views\mod\laporan-booking\view_index.php 41
ERROR - 2021-11-12 23:16:12 --> Severity: Error --> Allowed memory size of 134217728 bytes exhausted (tried to allocate 65028096 bytes) D:\xampp71\htdocs\pupr\l-app\views\mod\laporan-booking\view_index.php 41
