/*
Navicat MySQL Data Transfer

Source Server         : Example
Source Server Version : 50532
Source Host           : localhost:3306
Source Database       : bs-dev

Target Server Type    : MYSQL
Target Server Version : 50532
File Encoding         : 65001

Date: 2014-05-07 16:36:52
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `acl_resource`
-- ----------------------------
DROP TABLE IF EXISTS `acl_resource`;
CREATE TABLE `acl_resource` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `roleid` int(10) DEFAULT NULL,
  `route` varchar(255) DEFAULT NULL,
  `lastupdated` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `postdate` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `roleid` (`roleid`),
  CONSTRAINT `roleid` FOREIGN KEY (`roleid`) REFERENCES `acl_role` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of acl_resource
-- ----------------------------
