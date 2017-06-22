/*
 Navicat Premium Data Transfer

 Source Server         : localMySql
 Source Server Type    : MySQL
 Source Server Version : 50717
 Source Host           : localhost
 Source Database       : lzcms

 Target Server Type    : MySQL
 Target Server Version : 50717
 File Encoding         : utf-8

 Date: 06/22/2017 16:02:05 PM
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `lz_admin`
-- ----------------------------
DROP TABLE IF EXISTS `lz_admin`;
CREATE TABLE `lz_admin` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `password` varchar(32) NOT NULL,
  `create_time` varchar(10) DEFAULT NULL,
  `update_time` varchar(10) DEFAULT NULL,
  `token` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `lz_admin`
-- ----------------------------
BEGIN;
INSERT INTO `lz_admin` VALUES ('7', 'admin', 'e10adc3949ba59abbe56e057f20f883e', '1498117806', '1498117942', '912a11bd57820a278af8331cff8c2257');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
