<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2021-11-19 11:59:10 --> Severity: Notice --> Undefined index: wdeleteaccess D:\xampp71\htdocs\pupr\l-app\libraries\Cifire_Role.php 62
ERROR - 2021-11-19 12:13:14 --> Severity: error --> Exception: Unable to locate the model you have specified: Csr_fasilitas_model D:\xampp71\htdocs\pupr\l-system\core\Loader.php 348
ERROR - 2021-11-19 12:44:52 --> Severity: Notice --> Undefined property: Booking_smr::$booking_kamar_model D:\xampp71\htdocs\pupr\l-app\controllers\l-admin\Booking_smr.php 136
ERROR - 2021-11-19 12:44:52 --> Severity: error --> Exception: Call to a member function insert() on null D:\xampp71\htdocs\pupr\l-app\controllers\l-admin\Booking_smr.php 136
ERROR - 2021-11-19 12:51:34 --> Severity: error --> Exception: Unable to locate the model you have specified: Smr_model D:\xampp71\htdocs\pupr\l-system\core\Loader.php 348
ERROR - 2021-11-19 12:53:58 --> Severity: error --> Exception: D:\xampp71\htdocs\pupr\l-app\models/mod/Smr_model.php exists, but doesn't declare class Smr_model D:\xampp71\htdocs\pupr\l-system\core\Loader.php 340
ERROR - 2021-11-19 12:54:09 --> Severity: error --> Exception: D:\xampp71\htdocs\pupr\l-app\models/mod/Smr_model.php exists, but doesn't declare class Smr_model D:\xampp71\htdocs\pupr\l-system\core\Loader.php 340
ERROR - 2021-11-19 07:08:09 --> 404 Page Not Found: l-admin/Booking_csr/index
ERROR - 2021-11-19 13:15:29 --> Query error: Unknown column 'bs_tanggal_in' in 'where clause' - Invalid query: SELECT * FROM t_booking_csr
                        WHERE csr_id="1" AND (bs_tanggal_in BETWEEN "2021-11-19" AND "2021-11-19")
ERROR - 2021-11-19 13:58:22 --> Query error: Duplicate entry '1234567098' for key 'peserta_nip' - Invalid query: INSERT INTO `t_peserta` (`peserta_nip`, `peserta_nama`, `created_at`) VALUES ('1234567098', 'Test SMR', '2021-11-19 13:58:22')
ERROR - 2021-11-19 08:26:25 --> 404 Page Not Found: l-admin/Riwayat_smr/index
ERROR - 2021-11-19 14:38:03 --> Query error: Column 'created_at' in where clause is ambiguous - Invalid query: SELECT *
FROM `t_booking_smr`
JOIN `t_peserta` ON `t_booking_smr`.`peserta_id` = `t_peserta`.`peserta_id`
JOIN `t_smr` ON `t_booking_smr`.`smr_id` = `t_smr`.`smr_id`
JOIN `t_unit_kerja` ON `t_booking_smr`.`unker_id` = `t_unit_kerja`.`unker_id`
WHERE `t_booking_smr`.`penyelenggara_id` = '4'
AND   (
`bs_id` LIKE '%d%' ESCAPE '!'
OR  `bs_tanggal_in` LIKE '%d%' ESCAPE '!'
OR  `bs_tanggal_out` LIKE '%d%' ESCAPE '!'
OR  `bs_jml_hari` LIKE '%d%' ESCAPE '!'
OR  `bs_dokumen` LIKE '%d%' ESCAPE '!'
OR  `created_at` LIKE '%d%' ESCAPE '!'
OR  `bs_id` LIKE '%d%' ESCAPE '!'
 )
ORDER BY `t_booking_smr`.`bs_status` ASC, `bs_tanggal_in` DESC
 LIMIT 10
ERROR - 2021-11-19 14:38:19 --> Query error: Column 'created_at' in where clause is ambiguous - Invalid query: SELECT *
FROM `t_booking_smr`
JOIN `t_peserta` ON `t_booking_smr`.`peserta_id` = `t_peserta`.`peserta_id`
JOIN `t_smr` ON `t_booking_smr`.`smr_id` = `t_smr`.`smr_id`
JOIN `t_unit_kerja` ON `t_booking_smr`.`unker_id` = `t_unit_kerja`.`unker_id`
WHERE `t_booking_smr`.`penyelenggara_id` = '4'
AND   (
`bs_id` LIKE '%d%' ESCAPE '!'
OR  `bs_tanggal_in` LIKE '%d%' ESCAPE '!'
OR  `bs_tanggal_out` LIKE '%d%' ESCAPE '!'
OR  `bs_jml_hari` LIKE '%d%' ESCAPE '!'
OR  `bs_dokumen` LIKE '%d%' ESCAPE '!'
OR  `created_at` LIKE '%d%' ESCAPE '!'
OR  `bs_id` LIKE '%d%' ESCAPE '!'
 )
ORDER BY `t_booking_smr`.`bs_status` ASC, `bs_id` DESC
 LIMIT 10
ERROR - 2021-11-19 14:41:10 --> Query error: Column 'created_at' in where clause is ambiguous - Invalid query: SELECT *
FROM `t_booking_smr`
JOIN `t_peserta` ON `t_booking_smr`.`peserta_id` = `t_peserta`.`peserta_id`
JOIN `t_smr` ON `t_booking_smr`.`smr_id` = `t_smr`.`smr_id`
JOIN `t_unit_kerja` ON `t_booking_smr`.`unker_id` = `t_unit_kerja`.`unker_id`
WHERE `t_booking_smr`.`penyelenggara_id` = '4'
AND   (
`bs_id` LIKE '%d%' ESCAPE '!'
OR  `bs_tanggal_in` LIKE '%d%' ESCAPE '!'
OR  `bs_tanggal_out` LIKE '%d%' ESCAPE '!'
OR  `bs_jml_hari` LIKE '%d%' ESCAPE '!'
OR  `bs_dokumen` LIKE '%d%' ESCAPE '!'
OR  `created_at` LIKE '%d%' ESCAPE '!'
OR  `bs_id` LIKE '%d%' ESCAPE '!'
 )
ORDER BY `t_booking_smr`.`bs_status` ASC, `bs_tanggal_in` ASC
 LIMIT 10
ERROR - 2021-11-19 14:45:34 --> Severity: Notice --> Undefined index: br_tanggal_in D:\xampp71\htdocs\pupr\l-app\views\mod\riwayat-smr\view_edit.php 42
ERROR - 2021-11-19 14:45:34 --> Severity: Notice --> Undefined index: br_dokumen D:\xampp71\htdocs\pupr\l-app\views\mod\riwayat-smr\view_edit.php 59
ERROR - 2021-11-19 14:45:34 --> Severity: Notice --> Undefined index: br_dokumen D:\xampp71\htdocs\pupr\l-app\views\mod\riwayat-smr\view_edit.php 61
ERROR - 2021-11-19 14:50:55 --> Severity: Notice --> Undefined index: bs_tanggal_in D:\xampp71\htdocs\pupr\l-app\views\mod\riwayat-csr\view_edit.php 42
ERROR - 2021-11-19 14:50:55 --> Severity: Notice --> Undefined index: bs_dokumen D:\xampp71\htdocs\pupr\l-app\views\mod\riwayat-csr\view_edit.php 59
ERROR - 2021-11-19 14:50:55 --> Severity: Notice --> Undefined index: bs_dokumen D:\xampp71\htdocs\pupr\l-app\views\mod\riwayat-csr\view_edit.php 61
ERROR - 2021-11-19 15:00:43 --> Query error: Unknown column 't_smr_kategori.unker_id' in 'on clause' - Invalid query: SELECT `t_smr`.*
FROM `t_smr`
JOIN `t_unit_kerja` ON `t_smr_kategori`.`unker_id` = `t_unit_kerja`.`unker_id`
JOIN `t_user` ON `t_unit_kerja`.`id_user` = `t_user`.`id`
WHERE `t_user`.`id` = '4'
ORDER BY `t_smr`.`smr_nama` ASC, `t_smr`.`smr_nomor` ASC
ERROR - 2021-11-19 15:01:13 --> Query error: Unknown column 'br_tanggal_in' in 'where clause' - Invalid query: SELECT *
FROM `t_booking_smr`
WHERE `smr_id` = '1'
AND `br_tanggal_in` = '2021-11-01'
ERROR - 2021-11-19 09:23:55 --> 404 Page Not Found: l-admin/Pesan_kamar/pesan_smr
ERROR - 2021-11-19 15:25:36 --> Severity: error --> Exception: Too few arguments to function Pesan_kamar::pesan_smr(), 0 passed in D:\xampp71\htdocs\pupr\l-system\core\CodeIgniter.php on line 532 and exactly 1 expected D:\xampp71\htdocs\pupr\l-app\controllers\l-admin\Pesan_kamar.php 174
ERROR - 2021-11-19 09:27:57 --> 404 Page Not Found: l-admin/Pesan_kamar/pesan_csr
ERROR - 2021-11-19 15:51:17 --> Severity: Notice --> Undefined index: wdeleteaccess D:\xampp71\htdocs\pupr\l-app\libraries\Cifire_Role.php 62
ERROR - 2021-11-19 15:52:05 --> Query error: Unknown column 'unker_id' in 'field list' - Invalid query: INSERT INTO `t_booking_room` (`unker_id`, `smr_id`, `peserta_id`, `bs_tanggal_in`, `bs_jml_hari`, `bs_dokumen`, `penyelenggara_id`, `created_at`) VALUES ('3', '4', '7', '2021-11-19', '1', 'dokumen/balaimedan/Suseno.pdf', '7', '2021-11-19 15:52:05')
ERROR - 2021-11-19 16:16:19 --> Severity: Notice --> Undefined variable: smr D:\xampp71\htdocs\pupr\l-app\views\mod\pesan-kamar\view_index_csr.php 66
ERROR - 2021-11-19 16:16:19 --> Severity: Warning --> Invalid argument supplied for foreach() D:\xampp71\htdocs\pupr\l-app\views\mod\pesan-kamar\view_index_csr.php 66
ERROR - 2021-11-19 10:18:51 --> 404 Page Not Found: l-admin/Pesan_kamar/addcsr
ERROR - 2021-11-19 10:47:10 --> 404 Page Not Found: l-admin/Riwayat_pesan_sr/index
ERROR - 2021-11-19 16:47:14 --> Severity: error --> Exception: D:\xampp71\htdocs\pupr\l-app\models/mod/Pesanan_smr_model.php exists, but doesn't declare class Pesanan_smr_model D:\xampp71\htdocs\pupr\l-system\core\Loader.php 340
ERROR - 2021-11-19 17:01:09 --> Severity: Notice --> Undefined index: wdeleteaccess D:\xampp71\htdocs\pupr\l-app\libraries\Cifire_Role.php 62
ERROR - 2021-11-19 17:19:45 --> Severity: error --> Exception: Too few arguments to function Pesan_kamar::pesan_smr(), 0 passed in D:\xampp71\htdocs\pupr\l-system\core\CodeIgniter.php on line 532 and exactly 1 expected D:\xampp71\htdocs\pupr\l-app\controllers\l-admin\Pesan_kamar.php 176
ERROR - 2021-11-19 11:25:44 --> 404 Page Not Found: l-admin/Riwayat_pesan_csr/index
ERROR - 2021-11-19 17:29:13 --> Query error: Unknown column 't_booking_csr.bs_status' in 'order clause' - Invalid query: SELECT *
FROM `t_booking_csr`
JOIN `t_peserta` ON `t_booking_csr`.`peserta_id` = `t_peserta`.`peserta_id`
JOIN `t_csr` ON `t_booking_csr`.`csr_id` = `t_csr`.`csr_id`
JOIN `t_unit_kerja` ON `t_booking_csr`.`unker_id` = `t_unit_kerja`.`unker_id`
WHERE `t_booking_csr`.`peserta_id` = '7'
ORDER BY `t_booking_csr`.`bs_status` ASC, `bs_id` DESC
 LIMIT 10
ERROR - 2021-11-19 17:29:26 --> Query error: Unknown column 't_booking_csr.bs_status' in 'order clause' - Invalid query: SELECT *
FROM `t_booking_csr`
JOIN `t_peserta` ON `t_booking_csr`.`peserta_id` = `t_peserta`.`peserta_id`
JOIN `t_csr` ON `t_booking_csr`.`csr_id` = `t_csr`.`csr_id`
JOIN `t_unit_kerja` ON `t_booking_csr`.`unker_id` = `t_unit_kerja`.`unker_id`
WHERE `t_booking_csr`.`peserta_id` = '7'
ORDER BY `t_booking_csr`.`bs_status` ASC, `bs_id` DESC
 LIMIT 10
