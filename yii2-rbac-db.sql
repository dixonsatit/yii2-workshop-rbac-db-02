/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 50625
 Source Host           : localhost
 Source Database       : yii2-rbac-db

 Target Server Type    : MySQL
 Target Server Version : 50625
 File Encoding         : utf-8

 Date: 09/29/2015 10:19:28 AM
*/

SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `auth_assignment`
-- ----------------------------
DROP TABLE IF EXISTS `auth_assignment`;
CREATE TABLE `auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`item_name`,`user_id`),
  CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
--  Records of `auth_assignment`
-- ----------------------------
BEGIN;
INSERT INTO `auth_assignment` VALUES ('Author', '1', '1442115546'), ('Author', '3', '1442115546');
COMMIT;

-- ----------------------------
--  Table structure for `auth_item`
-- ----------------------------
DROP TABLE IF EXISTS `auth_item`;
CREATE TABLE `auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` int(11) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` text COLLATE utf8_unicode_ci,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`),
  KEY `rule_name` (`rule_name`),
  KEY `idx-auth_item-type` (`type`),
  CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
--  Records of `auth_item`
-- ----------------------------
BEGIN;
INSERT INTO `auth_item` VALUES ('/blog/*', '2', null, null, null, '1442115546', '1442115546'), ('/blog/create', '2', null, null, null, '1442115546', '1442115546'), ('/blog/delete', '2', null, 'isAuthor', null, '1442115546', '1442115546'), ('/blog/index', '2', null, null, null, '1442115546', '1442115546'), ('/blog/update', '2', null, 'isAuthor', null, '1442115546', '1442115546'), ('/blog/view', '2', null, null, null, '1442115546', '1442115546'), ('/survey/*', '2', null, null, null, '1442115546', '1442115546'), ('Admin', '1', 'ผู้ดูแลระบบ', null, null, '1442115546', '1442115546'), ('Author', '1', 'ผู้เขียนบทความ', null, null, '1442115546', '1442115546');
COMMIT;

-- ----------------------------
--  Table structure for `auth_item_child`
-- ----------------------------
DROP TABLE IF EXISTS `auth_item_child`;
CREATE TABLE `auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`),
  CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
--  Records of `auth_item_child`
-- ----------------------------
BEGIN;
INSERT INTO `auth_item_child` VALUES ('Author', '/blog/*'), ('Author', '/blog/delete'), ('Author', '/blog/update'), ('Author', '/survey/*'), ('Admin', 'Author');
COMMIT;

-- ----------------------------
--  Table structure for `auth_rule`
-- ----------------------------
DROP TABLE IF EXISTS `auth_rule`;
CREATE TABLE `auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` text COLLATE utf8_unicode_ci,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
--  Records of `auth_rule`
-- ----------------------------
BEGIN;
INSERT INTO `auth_rule` VALUES ('isAuthor', 'O:22:\"common\\rbac\\AuthorRule\":3:{s:4:\"name\";s:8:\"isAuthor\";s:9:\"createdAt\";i:1442115546;s:9:\"updatedAt\";i:1442115546;}', '1442115546', '1442115546');
COMMIT;

-- ----------------------------
--  Table structure for `blog`
-- ----------------------------
DROP TABLE IF EXISTS `blog`;
CREATE TABLE `blog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL COMMENT 'ชื่อเรื่อง',
  `content` text COMMENT 'เนื้อหา',
  `category` int(11) DEFAULT NULL COMMENT 'หมวดหมู่',
  `tag` varchar(255) DEFAULT NULL COMMENT 'คำค้น',
  `created_at` int(11) DEFAULT NULL COMMENT 'สร้างวันที่',
  `created_by` int(11) DEFAULT NULL COMMENT 'สร้างโดย',
  `updated_at` int(11) DEFAULT NULL COMMENT 'แก้ไขวันที่',
  `updated_by` int(11) DEFAULT NULL COMMENT 'แก้ไขโดย',
  PRIMARY KEY (`id`),
  KEY `title` (`title`),
  FULLTEXT KEY `content` (`content`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `blog`
-- ----------------------------
BEGIN;
INSERT INTO `blog` VALUES ('5', 'บทความ', 'บทความ', null, '', '1442028442', '1', '1442028442', '1'), ('6', 'sdf', 'sdf', null, '', '1442039169', '3', '1442039169', '3');
COMMIT;

-- ----------------------------
--  Table structure for `choice_answer`
-- ----------------------------
DROP TABLE IF EXISTS `choice_answer`;
CREATE TABLE `choice_answer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `choice_id` int(11) DEFAULT NULL,
  `value` varchar(255) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `choice_id` (`choice_id`,`created_by`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `choice_answer`
-- ----------------------------
BEGIN;
INSERT INTO `choice_answer` VALUES ('1', null, '1', null, null, null, null), ('2', null, '1', null, null, null, null), ('3', null, '1', null, null, null, null), ('4', '0', '1', null, null, null, null), ('5', '1', '1', null, null, null, null), ('6', '2', '1', null, null, null, null), ('7', '0', '1', null, null, null, null), ('8', '1', '2', null, null, null, null), ('9', '2', '2', null, null, null, null), ('10', '1', '2', null, null, null, null), ('11', '2', '2', null, null, null, null), ('12', '5', '2', null, null, null, null), ('20', '1', '1', '1', '1442130260', '1', '1442130260'), ('21', '2', '1', '1', '1442130260', '1', '1442130260'), ('22', '4', '1', '1', '1442130260', '1', '1442130260'), ('23', '5', '1', '1', '1442130260', '1', '1442130260');
COMMIT;

-- ----------------------------
--  Table structure for `choice_item`
-- ----------------------------
DROP TABLE IF EXISTS `choice_item`;
CREATE TABLE `choice_item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `value` varchar(100) DEFAULT NULL,
  `group_id` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `type` enum('input','checkboxlist','dropdownlist','radiolist','radio','checkbox') DEFAULT 'radiolist',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `choice_item`
-- ----------------------------
BEGIN;
INSERT INTO `choice_item` VALUES ('1', 'คุณได้รับความสะดวกสบายหรือไม่', '', null, '1', '1', '1442113935', '1', '1442114779', 'radiolist'), ('2', 'คุณมีแฟนกี่คน', '', null, '1', '1', '1442113961', '1', '1442114786', 'radiolist'), ('4', 'คุณมีความสุขหรือไม่', null, null, '1', '1', '1442128612', '1', '1442128612', 'radiolist'), ('5', 'คุณมีแฟนกี่คน', '', null, '1', '1', '1442113973', '1', '1442129013', 'radiolist');
COMMIT;

-- ----------------------------
--  Table structure for `department`
-- ----------------------------
DROP TABLE IF EXISTS `department`;
CREATE TABLE `department` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `department`
-- ----------------------------
BEGIN;
INSERT INTO `department` VALUES ('1', 'การเงิน', '1442131600', '1', '1442131600', '1'), ('2', 'ศูนย์เทคโนโลยีสารสนเทศ', '1442131620', '1', '1442131620', '1'), ('3', 'การบัญชี', '1442131643', '1', '1442131643', '1');
COMMIT;

-- ----------------------------
--  Table structure for `easy_upload`
-- ----------------------------
DROP TABLE IF EXISTS `easy_upload`;
CREATE TABLE `easy_upload` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `surname` varchar(100) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `photos` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `easy_upload`
-- ----------------------------
BEGIN;
INSERT INTO `easy_upload` VALUES ('1', 'sdf', 'sdf', '8c34f43e565625669d14389e99cb65cb.jpg', null), ('2', 'sdf', 'sdf', '0c51fc6c614545ca892d96b4d33a1fbb.jpg', null), ('3', 'หกด', 'หกด', '', '676b500099e8a13364d97652ee69f133.png,0c540f3d9f010cbceb7cb7e2ba73d45d.jpg'), ('4', 'sdf', 'sdf', '', ''), ('5', 's', 's', '831313b2d5290ee5e6837b73cec1d012.png', '7dd9b6bb7aab668a1547dfa37e4c7f5c.png,64137a076dfdf6be069dba372a548c5a.jpg'), ('6', 'sdf', 'sdf', '3986daf9ff7863dd8336516ada5ca0e9.jpg', '54c6cd5c40ed814c7359aaa674f252c2.jpg,b4aab0f9bf6990b8c9d0611e03c78f2b.jpg,b168dc4b16a19394ab343b9fd42ac55b.png,57f82786fe1a2845ddc55a373a0f748c.jpg');
COMMIT;

-- ----------------------------
--  Table structure for `employee`
-- ----------------------------
DROP TABLE IF EXISTS `employee`;
CREATE TABLE `employee` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) DEFAULT NULL COMMENT 'คำนำหน้า',
  `name` varchar(150) DEFAULT NULL COMMENT 'ชื่อ',
  `surname` varchar(150) DEFAULT NULL COMMENT 'นามสกุล',
  `gender` enum('m','w') DEFAULT 'm' COMMENT 'เพศ',
  `birthday` date DEFAULT NULL COMMENT 'วันเกิด',
  `height` int(11) DEFAULT NULL COMMENT 'ส่วนสูง',
  `weight` int(11) DEFAULT NULL COMMENT 'น้ำหนัก',
  `blood_type` varchar(10) DEFAULT NULL COMMENT 'กรุ๊ฟเลือด',
  `ceallphone` varchar(15) DEFAULT NULL COMMENT 'เบอร์โทร',
  `personal_id` varchar(17) DEFAULT NULL COMMENT 'หมายเลขบัตรประชาชน',
  `photo` varchar(120) DEFAULT NULL COMMENT 'ภาพถ่าย',
  `nationality` int(11) DEFAULT NULL COMMENT 'สัญชาติ',
  `race` int(11) DEFAULT NULL COMMENT 'เชื้อชาติ',
  `religion` int(11) DEFAULT NULL COMMENT 'ศาสนา',
  `skill` varchar(255) DEFAULT NULL COMMENT 'ทักษะ',
  `salary` float DEFAULT NULL COMMENT 'เงินเดือน',
  `department_id` int(11) DEFAULT NULL COMMENT 'แผนก',
  `user_id` int(11) DEFAULT NULL COMMENT 'รหัส account พนักงาน',
  `created_by` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `employee`
-- ----------------------------
BEGIN;
INSERT INTO `employee` VALUES ('1', 'sdf', 'k', 'k', 'm', '2015-09-10', '1', '1111', '1', '1', '1-1111-11111-11-1', '1', '1', '1', '1', 'css,html5,angularjs,yiiframework,node.js', null, '2', null, '1', '1442137088', '1', '1442137401'), ('2', '11', '1', '1', 'm', null, '1', '11', '1', '1', '1-____-_____-__-_', '43696F0814C4B42E.png', '1', '1', '11', 'css,html5', null, null, null, '1', '1442139937', '1', '1442139937'), ('3', '22', '2', '2', 'm', null, '2', '2', '2', '2', '2-____-_____-__-_', null, null, null, null, 'php,css', null, null, null, '1', '1442141675', '1', '1442141675'), ('4', '22', '2', '2', 'm', null, '2', '2', '2', '2', '2-____-_____-__-_', '43696F0814C4B42B.png,43696F0814C4B42E.png', null, null, null, 'php,css', null, null, null, '1', '1442141738', '1', '1442141738');
COMMIT;

-- ----------------------------
--  Table structure for `m_emp`
-- ----------------------------
DROP TABLE IF EXISTS `m_emp`;
CREATE TABLE `m_emp` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) DEFAULT NULL,
  `name` varchar(150) DEFAULT NULL,
  `surname` varchar(150) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `m_emp`
-- ----------------------------
BEGIN;
INSERT INTO `m_emp` VALUES ('1', 'นาย', 'ฤธิเนตร', 'ปิดวัง', '1'), ('2', 'นาย', 'ฉัตรชัย', 'สุดโต', '2'), ('3', 'นางสาว', 'สุกัญญา', 'ยัพราษฎร์', '3'), ('4', 'นาย', 'สาธิต', 'สีถาพล', '4');
COMMIT;

-- ----------------------------
--  Table structure for `m_user`
-- ----------------------------
DROP TABLE IF EXISTS `m_user`;
CREATE TABLE `m_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(150) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `m_user`
-- ----------------------------
BEGIN;
INSERT INTO `m_user` VALUES ('1', 'rittrinat', 'rittrinat@gmil.com'), ('2', 'ChatChai', 'ChatChai@gmail.com'), ('3', 'sukanya', 'sukanya@gmail.com'), ('4', 'sdf', 'sdf@gmail.com');
COMMIT;

-- ----------------------------
--  Table structure for `migration`
-- ----------------------------
DROP TABLE IF EXISTS `migration`;
CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `migration`
-- ----------------------------
BEGIN;
INSERT INTO `migration` VALUES ('m000000_000000_base', '1441947452'), ('m130524_201442_init', '1441947459'), ('m140506_102106_rbac_init', '1441961127');
COMMIT;

-- ----------------------------
--  Table structure for `user`
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `password_reset_token` (`password_reset_token`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
--  Records of `user`
-- ----------------------------
BEGIN;
INSERT INTO `user` VALUES ('1', 'user-a', '4pwKBC31rGXdjeRMbiKF6fRe4XNaBBq-', '$2y$13$4GDq0N4Ctn1MxQjplpc9fuEgla9.NYctuXikR40kcqaljScxudOju', null, 'user-a@gmail.com', '10', '1441948480', '1441948480'), ('2', 'user-b', 'jHy_6Z0xIDolT5tdFWFFxnUiaqy8WxYO', '$2y$13$cM9ZEGWtBRkBX8Wk8/2u1.bE4StLh1sX0chDF/YhJTzRHwvsCwnbW', null, 'user-b@gmail.com', '10', '1441948504', '1441948504'), ('3', 'user-c', 'QNBV6Fd5iA0Pks_wSbNFQecHguWxY3hd', '$2y$13$EAPfLNDxVVTmfnrJZi9bK.Dn4A5KJCT21TYsK75.HsWjRWoHuuDai', null, 'user-c@gmail.com', '10', '1441948525', '1441948525'), ('4', 'user-d', 'IoWtKJZ5iQmf1U0ruBvYwvVqq7eXiqFk', '$2y$13$4pxDtygW1.NaLfYaNp9UYeNEMZT662k/2UyKFqY9U5.kY3O3iNG2m', null, 'user-d@gmail.com', '10', '1442042636', '1442042636'), ('5', 'admin', '637atcGjlR6mDzjDEqoo-0Y1HE_8dVML', '$2y$13$wMxXQOsKIGoi16/VJoqGhumCDXDj2/YrdsKOMbWAm6C/Vi8wLyazi', null, '111111@gmail.com', '10', '1442046220', '1442047168'), ('6', 'sdfsdf', 'UjM3VTdZ7BfD5Tzjdyojc1UNjsi081YQ', '$2y$13$ozEttVHNet08pr3T34s7kOwNynJEXJh0ZEouliWQlFc0Pb6yuNxHq', null, 'dixonsdfsdf111@gmail.com', '10', '1442050108', '1442051712');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
