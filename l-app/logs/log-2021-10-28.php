<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2021-10-28 13:32:34 --> Query error: Table 'db_pupr.t_setting' doesn't exist in engine - Invalid query: SELECT `value`
FROM `t_setting`
WHERE `options` = 'page_item'
ERROR - 2021-10-28 13:32:36 --> Query error: Table 'db_pupr.t_setting' doesn't exist in engine - Invalid query: SELECT `value`
FROM `t_setting`
WHERE `options` = 'page_item'
ERROR - 2021-10-28 13:32:37 --> Query error: Table 'db_pupr.t_setting' doesn't exist in engine - Invalid query: SELECT `value`
FROM `t_setting`
WHERE `options` = 'page_item'
ERROR - 2021-10-28 13:32:37 --> Query error: Table 'db_pupr.t_setting' doesn't exist in engine - Invalid query: SELECT `value`
FROM `t_setting`
WHERE `options` = 'page_item'
ERROR - 2021-10-28 13:32:38 --> Query error: Table 'db_pupr.t_setting' doesn't exist in engine - Invalid query: SELECT `value`
FROM `t_setting`
WHERE `options` = 'page_item'
ERROR - 2021-10-28 13:32:38 --> Query error: Table 'db_pupr.t_setting' doesn't exist in engine - Invalid query: SELECT `value`
FROM `t_setting`
WHERE `options` = 'page_item'
ERROR - 2021-10-28 13:32:38 --> Query error: Table 'db_pupr.t_setting' doesn't exist in engine - Invalid query: SELECT `value`
FROM `t_setting`
WHERE `options` = 'page_item'
ERROR - 2021-10-28 13:32:38 --> Query error: Table 'db_pupr.t_setting' doesn't exist in engine - Invalid query: SELECT `value`
FROM `t_setting`
WHERE `options` = 'page_item'
ERROR - 2021-10-28 13:32:39 --> Query error: Table 'db_pupr.t_setting' doesn't exist in engine - Invalid query: SELECT `value`
FROM `t_setting`
WHERE `options` = 'page_item'
ERROR - 2021-10-28 13:32:39 --> Query error: Table 'db_pupr.t_setting' doesn't exist in engine - Invalid query: SELECT `value`
FROM `t_setting`
WHERE `options` = 'page_item'
ERROR - 2021-10-28 13:32:39 --> Query error: Table 'db_pupr.t_setting' doesn't exist in engine - Invalid query: SELECT `value`
FROM `t_setting`
WHERE `options` = 'page_item'
ERROR - 2021-10-28 13:32:39 --> Query error: Table 'db_pupr.t_setting' doesn't exist in engine - Invalid query: SELECT `value`
FROM `t_setting`
WHERE `options` = 'page_item'
ERROR - 2021-10-28 13:32:40 --> Query error: Table 'db_pupr.t_setting' doesn't exist in engine - Invalid query: SELECT `value`
FROM `t_setting`
WHERE `options` = 'page_item'
ERROR - 2021-10-28 13:32:40 --> Query error: Table 'db_pupr.t_setting' doesn't exist in engine - Invalid query: SELECT `value`
FROM `t_setting`
WHERE `options` = 'page_item'
ERROR - 2021-10-28 13:32:40 --> Query error: Table 'db_pupr.t_setting' doesn't exist in engine - Invalid query: SELECT `value`
FROM `t_setting`
WHERE `options` = 'page_item'
ERROR - 2021-10-28 13:32:40 --> Query error: Table 'db_pupr.t_setting' doesn't exist in engine - Invalid query: SELECT `value`
FROM `t_setting`
WHERE `options` = 'page_item'
ERROR - 2021-10-28 13:32:40 --> Query error: Table 'db_pupr.t_setting' doesn't exist in engine - Invalid query: SELECT `value`
FROM `t_setting`
WHERE `options` = 'page_item'
ERROR - 2021-10-28 13:32:40 --> Query error: Table 'db_pupr.t_setting' doesn't exist in engine - Invalid query: SELECT `value`
FROM `t_setting`
WHERE `options` = 'page_item'
ERROR - 2021-10-28 13:32:41 --> Query error: Table 'db_pupr.t_setting' doesn't exist in engine - Invalid query: SELECT `value`
FROM `t_setting`
WHERE `options` = 'page_item'
ERROR - 2021-10-28 13:32:41 --> Query error: Table 'db_pupr.t_setting' doesn't exist in engine - Invalid query: SELECT `value`
FROM `t_setting`
WHERE `options` = 'page_item'
ERROR - 2021-10-28 13:32:41 --> Query error: Table 'db_pupr.t_setting' doesn't exist in engine - Invalid query: SELECT `value`
FROM `t_setting`
WHERE `options` = 'page_item'
ERROR - 2021-10-28 13:32:41 --> Query error: Table 'db_pupr.t_setting' doesn't exist in engine - Invalid query: SELECT `value`
FROM `t_setting`
WHERE `options` = 'page_item'
ERROR - 2021-10-28 13:36:06 --> 404 Page Not Found: Admin/index
ERROR - 2021-10-28 18:52:41 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'Aktif',''Tidak Aktif'') NOT NULL DEFAULT 'Tidak Aktif',
	`created_at` DATETIME N' at line 12 - Invalid query: CREATE TABLE IF NOT EXISTS `unit_kerja` (
	`unker_id` INT(50) UNSIGNED NOT NULL AUTO_INCREMENT,
	`unker_nama` VARCHAR(100) NULL DEFAULT '',
	`unker_kepala` VARCHAR(100) NULL DEFAULT '',
	`unker_alamat` TEXT NOT NULL,
	`unker_telp` VARCHAR(100) NULL DEFAULT '',
	`unker_fax` VARCHAR(100) NULL DEFAULT '',
	`unker_email` VARCHAR(100) NULL DEFAULT '',
	`unker_deskripsi` TEXT NOT NULL,
	`unker_lat` VARCHAR(100) NULL DEFAULT '',
	`unker_long` VARCHAR(100) NULL DEFAULT '',
	`unker_status` ENUM(''Aktif',''Tidak Aktif'') NOT NULL DEFAULT 'Tidak Aktif',
	`created_at` DATETIME NOT NULL,
	`updated_at` DATETIME NOT NULL,
	CONSTRAINT `pk_unit_kerja` PRIMARY KEY(`unker_id`)
) ENGINE = InnoDB DEFAULT CHARACTER SET = utf8 COLLATE = utf8_general_ci
ERROR - 2021-10-28 18:53:05 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'Aktif'',''Tidak Aktif'') NOT NULL DEFAULT 'Tidak Aktif',
	`created_at` DATETIME ' at line 12 - Invalid query: CREATE TABLE IF NOT EXISTS `unit_kerja` (
	`unker_id` INT(50) UNSIGNED NOT NULL AUTO_INCREMENT,
	`unker_nama` VARCHAR(100) NULL DEFAULT '',
	`unker_kepala` VARCHAR(100) NULL DEFAULT '',
	`unker_alamat` TEXT NOT NULL,
	`unker_telp` VARCHAR(100) NULL DEFAULT '',
	`unker_fax` VARCHAR(100) NULL DEFAULT '',
	`unker_email` VARCHAR(100) NULL DEFAULT '',
	`unker_deskripsi` TEXT NOT NULL,
	`unker_lat` VARCHAR(100) NULL DEFAULT '',
	`unker_long` VARCHAR(100) NULL DEFAULT '',
	`unker_status` ENUM(''Aktif'',''Tidak Aktif'') NOT NULL DEFAULT 'Tidak Aktif',
	`created_at` DATETIME NOT NULL,
	`updated_at` DATETIME NOT NULL,
	CONSTRAINT `pk_unit_kerja` PRIMARY KEY(`unker_id`)
) ENGINE = InnoDB DEFAULT CHARACTER SET = utf8 COLLATE = utf8_general_ci
ERROR - 2021-10-28 18:53:11 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'Aktif'',''Tidak Aktif'') NOT NULL DEFAULT 'Tidak Aktif',
	`created_at` DATETIME ' at line 12 - Invalid query: CREATE TABLE IF NOT EXISTS `unit_kerja` (
	`unker_id` INT(50) UNSIGNED NOT NULL AUTO_INCREMENT,
	`unker_nama` VARCHAR(100) NULL DEFAULT '',
	`unker_kepala` VARCHAR(100) NULL DEFAULT '',
	`unker_alamat` TEXT NOT NULL,
	`unker_telp` VARCHAR(100) NULL DEFAULT '',
	`unker_fax` VARCHAR(100) NULL DEFAULT '',
	`unker_email` VARCHAR(100) NULL DEFAULT '',
	`unker_deskripsi` TEXT NOT NULL,
	`unker_lat` VARCHAR(100) NULL DEFAULT '',
	`unker_long` VARCHAR(100) NULL DEFAULT '',
	`unker_status` ENUM(''Aktif'',''Tidak Aktif'') NOT NULL DEFAULT 'Tidak Aktif',
	`created_at` DATETIME NOT NULL,
	`updated_at` DATETIME NOT NULL,
	CONSTRAINT `pk_unit_kerja` PRIMARY KEY(`unker_id`)
) ENGINE = InnoDB DEFAULT CHARACTER SET = utf8 COLLATE = utf8_general_ci
ERROR - 2021-10-28 18:56:23 --> Query error: Table 'db_pupr.unit_kerja' doesn't exist - Invalid query: SELECT *
FROM `unit_kerja`
ORDER BY `unker_id` DESC
 LIMIT 10
ERROR - 2021-10-28 18:57:51 --> Severity: Notice --> Undefined index: updated_at D:\xampp71\htdocs\pupr\l-app\views\mod\unit-kerja\view_edit.php 136
ERROR - 2021-10-28 18:59:25 --> Severity: Notice --> Undefined index: updated_at D:\xampp71\htdocs\pupr\l-app\views\mod\unit-kerja\view_edit.php 136
ERROR - 2021-10-28 14:03:39 --> 404 Page Not Found: L_content/plugins
ERROR - 2021-10-28 23:54:17 --> Query error: Table 'db_pupr.room_kategori' doesn't exist - Invalid query: SELECT *
FROM `room_kategori`
ORDER BY `kategori_id` DESC
 LIMIT 10
ERROR - 2021-10-28 19:22:16 --> 404 Page Not Found: l-admin/Unit_kerja/kategori
ERROR - 2021-10-28 19:29:15 --> 404 Page Not Found: l-admin/Unit_kerja/kategori
ERROR - 2021-10-28 19:39:11 --> 404 Page Not Found: l-admin/Room_kategori/2
ERROR - 2021-10-28 19:39:24 --> 404 Page Not Found: l-admin/Room_kategori/2
ERROR - 2021-10-28 19:45:17 --> 404 Page Not Found: l-admin/Room_kategori/2
ERROR - 2021-10-28 19:45:30 --> 404 Page Not Found: l-admin/Room_kategori/2
ERROR - 2021-10-28 19:45:32 --> 404 Page Not Found: l-admin/Room_kategori/2
ERROR - 2021-10-28 19:46:16 --> 404 Page Not Found: l-admin/Room_kategori/2
ERROR - 2021-10-28 19:46:38 --> 404 Page Not Found: l-admin/Room_kategori/unker
