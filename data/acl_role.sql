/*
Navicat MySQL Data Transfer

Source Server         : Example
Source Server Version : 50532
Source Host           : localhost:3306
Source Database       : bs-dev

Target Server Type    : MYSQL
Target Server Version : 50532
File Encoding         : 65001

Date: 2014-05-07 16:37:01
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `acl_role`
-- ----------------------------
DROP TABLE IF EXISTS `acl_role`;
CREATE TABLE `acl_role` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `inheritance_order` int(10) DEFAULT NULL,
  `updatedon` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `postdate` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of acl_role
-- ----------------------------
