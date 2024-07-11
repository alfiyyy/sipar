<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2021-11-22 02:49:18 --> Query error: Unknown column 'peserta_instansi' in 'field list' - Invalid query: INSERT INTO `t_peserta` (`peserta_nip`, `peserta_nama`, `peserta_instansi`, `created_at`) VALUES ('', '', '', '2021-11-22 02:49:18')
ERROR - 2021-11-22 03:02:24 --> Query error: Unknown column 'created_at' in 'field list' - Invalid query: INSERT INTO `t_user` (`nip`, `username`, `email`, `name`, `address`, `tlpn`, `password`, `created_at`) VALUES ('1111111', '1111111', 'suseno.personal@gmail.com', 'Suseno', 'Semarang', '085772613643', 'f2f8697754aad41079a35184736b5d510b568e0d58b2b5b5a5130d6bb3f4a1a5a4ee3041d464672da4d39182b7e4a8113fd780213a21b8665870afe756808092CP4oWjzbyeYw3zuwqsWr1bEfuGoTIEeAKWgHfsDspsQ=', '2021-11-22 03:02:24')
ERROR - 2021-11-22 03:05:32 --> Query error: Duplicate entry '3201130109880005' for key 'peserta_nip' - Invalid query: INSERT INTO `t_peserta` (`peserta_nip`, `peserta_nama`, `peserta_instansi`, `created_at`) VALUES ('3201130109880005', 'Sseno', 'Dinas Peserta', '2021-11-22 03:05:31')
ERROR - 2021-11-22 03:58:44 --> Severity: Notice --> Undefined index: wdeleteaccess D:\xampp71\htdocs\pupr\l-app\libraries\Cifire_Role.php 62
ERROR - 2021-11-22 04:16:22 --> Severity: Notice --> Undefined property: Profile::$room_kategori_model D:\xampp71\htdocs\pupr\l-app\controllers\l-admin\Profile.php 40
ERROR - 2021-11-22 04:16:22 --> Severity: error --> Exception: Call to a member function get_all_unker() on null D:\xampp71\htdocs\pupr\l-app\controllers\l-admin\Profile.php 40
ERROR - 2021-11-22 04:30:46 --> Severity: Notice --> Undefined variable: result D:\xampp71\htdocs\pupr\l-app\controllers\l-admin\Unit_kerja.php 584
ERROR - 2021-11-22 04:30:46 --> Severity: Notice --> Trying to get property of non-object D:\xampp71\htdocs\pupr\l-app\controllers\l-admin\Unit_kerja.php 584
ERROR - 2021-11-22 04:31:06 --> Severity: Notice --> Undefined variable: result D:\xampp71\htdocs\pupr\l-app\controllers\l-admin\Unit_kerja.php 585
ERROR - 2021-11-22 04:31:06 --> Severity: Notice --> Trying to get property of non-object D:\xampp71\htdocs\pupr\l-app\controllers\l-admin\Unit_kerja.php 585
ERROR - 2021-11-22 04:31:08 --> Severity: Notice --> Undefined variable: result D:\xampp71\htdocs\pupr\l-app\controllers\l-admin\Unit_kerja.php 585
ERROR - 2021-11-22 04:31:08 --> Severity: Notice --> Trying to get property of non-object D:\xampp71\htdocs\pupr\l-app\controllers\l-admin\Unit_kerja.php 585
ERROR - 2021-11-22 04:31:09 --> Severity: Notice --> Undefined variable: result D:\xampp71\htdocs\pupr\l-app\controllers\l-admin\Unit_kerja.php 585
ERROR - 2021-11-22 04:31:09 --> Severity: Notice --> Trying to get property of non-object D:\xampp71\htdocs\pupr\l-app\controllers\l-admin\Unit_kerja.php 585
ERROR - 2021-11-22 04:52:42 --> Query error: Unknown column 't_booking_room.unker_id' in 'on clause' - Invalid query: SELECT *
FROM `t_booking_room`
JOIN `t_peserta` ON `t_booking_room`.`peserta_id` = `t_peserta`.`peserta_id`
JOIN `t_room` ON `t_booking_room`.`room_id` = `t_room`.`room_id`
JOIN `t_unit_kerja` ON `t_booking_room`.`unker_id` = `t_unit_kerja`.`unker_id`
JOIN `t_room_kategori` ON `t_booking_room`.`kategori_id` = `t_room_kategori`.`kategori_id`
WHERE `t_booking_room`.`peserta_id` = '1'
ORDER BY `t_booking_room`.`br_status` ASC, `br_id` DESC
 LIMIT 10
ERROR - 2021-11-22 04:53:00 --> Query error: Unknown column 't_booking_room.unker_id' in 'on clause' - Invalid query: SELECT *
FROM `t_booking_room`
JOIN `t_peserta` ON `t_booking_room`.`peserta_id` = `t_peserta`.`peserta_id`
JOIN `t_room` ON `t_booking_room`.`room_id` = `t_room`.`room_id`
JOIN `t_unit_kerja` ON `t_booking_room`.`unker_id` = `t_unit_kerja`.`unker_id`
JOIN `t_room_kategori` ON `t_booking_room`.`kategori_id` = `t_room_kategori`.`kategori_id`
WHERE `t_booking_room`.`peserta_id` = '1'
ORDER BY `t_booking_room`.`br_status` ASC, `br_id` DESC
 LIMIT 10
ERROR - 2021-11-22 05:25:25 --> Severity: Notice --> Undefined index: aksi D:\xampp71\htdocs\pupr\l-app\controllers\l-admin\Laporan_booking.php 37
ERROR - 2021-11-22 05:32:21 --> Severity: error --> Exception: Call to undefined method Laporan_booking::view() D:\xampp71\htdocs\pupr\l-app\controllers\l-admin\Laporan_booking.php 58
ERROR - 2021-11-22 05:33:56 --> Severity: error --> Exception: Call to undefined method Laporan_booking::load_view() D:\xampp71\htdocs\pupr\l-app\controllers\l-admin\Laporan_booking.php 58
ERROR - 2021-11-22 05:33:57 --> Severity: error --> Exception: Call to undefined method Laporan_booking::load_view() D:\xampp71\htdocs\pupr\l-app\controllers\l-admin\Laporan_booking.php 58
ERROR - 2021-11-22 05:33:57 --> Severity: error --> Exception: Call to undefined method Laporan_booking::load_view() D:\xampp71\htdocs\pupr\l-app\controllers\l-admin\Laporan_booking.php 58
ERROR - 2021-11-22 05:33:57 --> Severity: error --> Exception: Call to undefined method Laporan_booking::load_view() D:\xampp71\htdocs\pupr\l-app\controllers\l-admin\Laporan_booking.php 58
ERROR - 2021-11-22 05:33:57 --> Severity: error --> Exception: Call to undefined method Laporan_booking::load_view() D:\xampp71\htdocs\pupr\l-app\controllers\l-admin\Laporan_booking.php 58
ERROR - 2021-11-22 05:40:58 --> Severity: Error --> Class 'Dompdf\Dompdf' not found D:\xampp71\htdocs\pupr\l-app\libraries\Pdf.php 15
ERROR - 2021-11-22 05:42:58 --> Severity: Error --> Class 'Dompdf\Dompdf' not found D:\xampp71\htdocs\pupr\l-app\libraries\Pdf.php 15
ERROR - 2021-11-22 05:49:01 --> Severity: Error --> Class 'Dompdf\Dompdf' not found D:\xampp71\htdocs\pupr\l-app\libraries\Pdf.php 15
ERROR - 2021-11-22 05:16:18 --> 404 Page Not Found: Kamar/standar
ERROR - 2021-11-22 11:30:37 --> Severity: Notice --> Undefined index: wdeleteaccess E:\xampp\htdocs\sipar\l-app\libraries\Cifire_Role.php 62
ERROR - 2021-11-22 11:41:09 --> Severity: Notice --> Undefined index: wdeleteaccess E:\xampp\htdocs\sipar\l-app\libraries\Cifire_Role.php 62
ERROR - 2021-11-22 17:02:17 --> Severity: Notice --> Undefined index: wdeleteaccess E:\xampp\htdocs\sipar\l-app\libraries\Cifire_Role.php 62
