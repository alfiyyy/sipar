<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2021-11-13 06:33:01 --> Severity: Notice --> Undefined index: wdeleteaccess D:\xampp71\htdocs\pupr\l-app\libraries\Cifire_Role.php 62
ERROR - 2021-11-13 06:37:20 --> Severity: Notice --> Undefined variable: id_user D:\xampp71\htdocs\pupr\l-app\controllers\l-admin\Booking_kamar.php 34
ERROR - 2021-11-13 06:37:20 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '' at line 4 - Invalid query: SELECT uk.id_user, rk.* FROM t_room_kategori rk
			LEFT JOIN t_unit_kerja uk ON rk.unker_id=uk.unker_id
			LEFT JOIN t_user u ON uk.id_user=u.id
			WHERE u.id=
ERROR - 2021-11-13 06:39:15 --> Severity: Notice --> Undefined variable: result D:\xampp71\htdocs\pupr\l-app\controllers\l-admin\Laporan_booking.php 35
ERROR - 2021-11-13 06:39:15 --> Severity: Notice --> Trying to get property of non-object D:\xampp71\htdocs\pupr\l-app\controllers\l-admin\Laporan_booking.php 52
ERROR - 2021-11-13 06:39:25 --> Severity: Notice --> Undefined variable: result D:\xampp71\htdocs\pupr\l-app\controllers\l-admin\Laporan_booking.php 35
ERROR - 2021-11-13 06:39:25 --> Severity: Notice --> Trying to get property of non-object D:\xampp71\htdocs\pupr\l-app\controllers\l-admin\Laporan_booking.php 52
ERROR - 2021-11-13 06:39:26 --> Severity: Notice --> Undefined variable: result D:\xampp71\htdocs\pupr\l-app\controllers\l-admin\Laporan_booking.php 35
ERROR - 2021-11-13 06:39:26 --> Severity: Notice --> Trying to get property of non-object D:\xampp71\htdocs\pupr\l-app\controllers\l-admin\Laporan_booking.php 52
ERROR - 2021-11-13 06:39:28 --> Severity: Notice --> Undefined variable: result D:\xampp71\htdocs\pupr\l-app\controllers\l-admin\Laporan_booking.php 35
ERROR - 2021-11-13 06:39:28 --> Severity: Notice --> Trying to get property of non-object D:\xampp71\htdocs\pupr\l-app\controllers\l-admin\Laporan_booking.php 52
ERROR - 2021-11-13 06:39:29 --> Severity: Notice --> Undefined variable: result D:\xampp71\htdocs\pupr\l-app\controllers\l-admin\Laporan_booking.php 35
ERROR - 2021-11-13 06:39:29 --> Severity: Notice --> Trying to get property of non-object D:\xampp71\htdocs\pupr\l-app\controllers\l-admin\Laporan_booking.php 52
ERROR - 2021-11-13 06:39:30 --> Severity: Notice --> Undefined variable: result D:\xampp71\htdocs\pupr\l-app\controllers\l-admin\Laporan_booking.php 35
ERROR - 2021-11-13 06:39:30 --> Severity: Notice --> Trying to get property of non-object D:\xampp71\htdocs\pupr\l-app\controllers\l-admin\Laporan_booking.php 52
ERROR - 2021-11-13 06:39:31 --> Severity: Notice --> Undefined variable: result D:\xampp71\htdocs\pupr\l-app\controllers\l-admin\Laporan_booking.php 35
ERROR - 2021-11-13 06:39:31 --> Severity: Notice --> Trying to get property of non-object D:\xampp71\htdocs\pupr\l-app\controllers\l-admin\Laporan_booking.php 52
ERROR - 2021-11-13 06:39:32 --> Severity: Notice --> Undefined variable: result D:\xampp71\htdocs\pupr\l-app\controllers\l-admin\Laporan_booking.php 35
ERROR - 2021-11-13 06:39:32 --> Severity: Notice --> Trying to get property of non-object D:\xampp71\htdocs\pupr\l-app\controllers\l-admin\Laporan_booking.php 52
ERROR - 2021-11-13 06:39:33 --> Severity: Notice --> Undefined variable: result D:\xampp71\htdocs\pupr\l-app\controllers\l-admin\Laporan_booking.php 35
ERROR - 2021-11-13 06:39:33 --> Severity: Notice --> Trying to get property of non-object D:\xampp71\htdocs\pupr\l-app\controllers\l-admin\Laporan_booking.php 52
ERROR - 2021-11-13 06:39:45 --> Severity: Notice --> Undefined variable: result D:\xampp71\htdocs\pupr\l-app\controllers\l-admin\Laporan_booking.php 35
ERROR - 2021-11-13 06:39:45 --> Severity: Notice --> Undefined index: unker_id D:\xampp71\htdocs\pupr\l-app\controllers\l-admin\Laporan_booking.php 52
ERROR - 2021-11-13 06:39:47 --> Severity: Notice --> Undefined variable: result D:\xampp71\htdocs\pupr\l-app\controllers\l-admin\Laporan_booking.php 35
ERROR - 2021-11-13 06:39:47 --> Severity: Notice --> Undefined index: unker_id D:\xampp71\htdocs\pupr\l-app\controllers\l-admin\Laporan_booking.php 52
ERROR - 2021-11-13 06:40:46 --> Query error: No tables used - Invalid query: SELECT *
ERROR - 2021-11-13 06:44:24 --> Query error: Unknown column 't_user.id_user' in 'where clause' - Invalid query: SELECT `t_room`.*, `t_room_kategori`.`kategori_nama`
FROM `t_room`
JOIN `t_room_kategori` ON `t_room`.`kategori_id` = `t_room_kategori`.`kategori_id`
JOIN `t_unit_kerja` ON `t_room_kategori`.`unker_id` = `t_unit_kerja`.`unker_id`
JOIN `t_user` ON `t_unit_kerja`.`id_user` = `t_user`.`id_user`
WHERE `t_user`.`id_user` = '4'
ORDER BY `t_room`.`kategori_id` ASC, `t_room`.`room_nama` ASC, `t_room`.`room_nomor` ASC
ERROR - 2021-11-13 06:44:26 --> Query error: Unknown column 't_user.id_user' in 'where clause' - Invalid query: SELECT `t_room`.*, `t_room_kategori`.`kategori_nama`
FROM `t_room`
JOIN `t_room_kategori` ON `t_room`.`kategori_id` = `t_room_kategori`.`kategori_id`
JOIN `t_unit_kerja` ON `t_room_kategori`.`unker_id` = `t_unit_kerja`.`unker_id`
JOIN `t_user` ON `t_unit_kerja`.`id_user` = `t_user`.`id_user`
WHERE `t_user`.`id_user` = '4'
ORDER BY `t_room`.`kategori_id` ASC, `t_room`.`room_nama` ASC, `t_room`.`room_nomor` ASC
ERROR - 2021-11-13 06:49:08 --> Query error: No tables used - Invalid query: SELECT *
ERROR - 2021-11-13 06:49:45 --> Severity: Notice --> Undefined variable: result D:\xampp71\htdocs\pupr\l-app\controllers\l-admin\Laporan_booking.php 35
ERROR - 2021-11-13 06:49:46 --> Severity: Warning --> Invalid argument supplied for foreach() D:\xampp71\htdocs\pupr\l-app\views\mod\laporan-booking\view_index.php 91
ERROR - 2021-11-13 07:09:40 --> Severity: Warning --> Invalid argument supplied for foreach() D:\xampp71\htdocs\pupr\l-app\views\mod\laporan-booking\view_index.php 87
ERROR - 2021-11-13 07:09:48 --> Severity: Warning --> Invalid argument supplied for foreach() D:\xampp71\htdocs\pupr\l-app\views\mod\laporan-booking\view_index.php 87
ERROR - 2021-11-13 07:10:18 --> Severity: Warning --> Invalid argument supplied for foreach() D:\xampp71\htdocs\pupr\l-app\views\mod\laporan-booking\view_index.php 87
ERROR - 2021-11-13 07:10:39 --> Severity: Warning --> Invalid argument supplied for foreach() D:\xampp71\htdocs\pupr\l-app\views\mod\laporan-booking\view_index.php 87
ERROR - 2021-11-13 07:10:40 --> Severity: Warning --> Invalid argument supplied for foreach() D:\xampp71\htdocs\pupr\l-app\views\mod\laporan-booking\view_index.php 87
ERROR - 2021-11-13 07:10:41 --> Severity: Warning --> Invalid argument supplied for foreach() D:\xampp71\htdocs\pupr\l-app\views\mod\laporan-booking\view_index.php 87
ERROR - 2021-11-13 07:10:42 --> Severity: Warning --> Invalid argument supplied for foreach() D:\xampp71\htdocs\pupr\l-app\views\mod\laporan-booking\view_index.php 87
ERROR - 2021-11-13 07:10:43 --> Severity: Warning --> Invalid argument supplied for foreach() D:\xampp71\htdocs\pupr\l-app\views\mod\laporan-booking\view_index.php 87
ERROR - 2021-11-13 07:10:44 --> Severity: Warning --> Invalid argument supplied for foreach() D:\xampp71\htdocs\pupr\l-app\views\mod\laporan-booking\view_index.php 87
ERROR - 2021-11-13 07:10:45 --> Severity: Warning --> Invalid argument supplied for foreach() D:\xampp71\htdocs\pupr\l-app\views\mod\laporan-booking\view_index.php 87
ERROR - 2021-11-13 07:11:27 --> Severity: Warning --> Invalid argument supplied for foreach() D:\xampp71\htdocs\pupr\l-app\views\mod\laporan-booking\view_index.php 87
ERROR - 2021-11-13 07:11:36 --> Severity: Warning --> Invalid argument supplied for foreach() D:\xampp71\htdocs\pupr\l-app\views\mod\laporan-booking\view_index.php 87
ERROR - 2021-11-13 07:11:46 --> Severity: Warning --> Invalid argument supplied for foreach() D:\xampp71\htdocs\pupr\l-app\views\mod\laporan-booking\view_index.php 87
ERROR - 2021-11-13 07:12:34 --> Severity: Warning --> Invalid argument supplied for foreach() D:\xampp71\htdocs\pupr\l-app\views\mod\laporan-booking\view_index.php 87
ERROR - 2021-11-13 07:15:01 --> Severity: Warning --> Invalid argument supplied for foreach() D:\xampp71\htdocs\pupr\l-app\views\mod\laporan-booking\view_index.php 87
ERROR - 2021-11-13 07:15:22 --> Severity: Warning --> Invalid argument supplied for foreach() D:\xampp71\htdocs\pupr\l-app\views\mod\laporan-booking\view_index.php 87
ERROR - 2021-11-13 07:15:25 --> Severity: Warning --> Invalid argument supplied for foreach() D:\xampp71\htdocs\pupr\l-app\views\mod\laporan-booking\view_index.php 87
ERROR - 2021-11-13 07:16:18 --> Severity: Warning --> Invalid argument supplied for foreach() D:\xampp71\htdocs\pupr\l-app\views\mod\laporan-booking\view_index.php 87
ERROR - 2021-11-13 07:16:23 --> Severity: Warning --> Invalid argument supplied for foreach() D:\xampp71\htdocs\pupr\l-app\views\mod\laporan-booking\view_index.php 87
ERROR - 2021-11-13 07:16:27 --> Severity: Warning --> Invalid argument supplied for foreach() D:\xampp71\htdocs\pupr\l-app\views\mod\laporan-booking\view_index.php 87
ERROR - 2021-11-13 14:27:37 --> Severity: Notice --> Undefined index: wdeleteaccess D:\xampp71\htdocs\pupr\l-app\libraries\Cifire_Role.php 62
