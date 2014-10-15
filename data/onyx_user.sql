/*
 Navicat MySQL Data Transfer

 Source Server         : Business Sorter Local
 Source Server Type    : MySQL
 Source Server Version : 50537
 Source Host           : localhost
 Source Database       : bs-dev

 Target Server Type    : MySQL
 Target Server Version : 50537
 File Encoding         : utf-8

 Date: 08/05/2014 16:02:32 PM
*/

SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `onyx_user`
-- ----------------------------
DROP TABLE IF EXISTS `onyx_user`;
CREATE TABLE `onyx_user` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `passwordhint` text,
  `gender` varchar(255) DEFAULT NULL,
  `dateofbirth` date DEFAULT NULL,
  `facebookid` varchar(255) DEFAULT NULL,
  `phoneguid` varchar(255) DEFAULT NULL,
  `subscribe` int(1) DEFAULT '0',
  `mobilesubscribe` int(1) DEFAULT '0',
  `role` varchar(255) DEFAULT 'user',
  `terms` tinyint(1) DEFAULT '0',
  `facebookdata` text,
  `token` varchar(255) DEFAULT NULL,
  `tokenexpire` datetime DEFAULT NULL,
  `isactive` int(1) DEFAULT '0',
  `logindate` datetime DEFAULT NULL,
  `lastupdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `postdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`) USING BTREE,
  UNIQUE KEY `email` (`email`) USING BTREE,
  KEY `search` (`firstname`,`lastname`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
--  Records of `onyx_user`
-- ----------------------------
BEGIN;
INSERT INTO `onyx_user` VALUES ('1', null, 'bfec11b8ce6ddac7413bfa457d6de904c3f3220b', '3ef86b4f45392ed3f38ac6cc45b21c92', 'Paul', 'Headington', null, null, 'paul.headington@colensobbdo.co.nz', null, null, null, null, null, null, null, null, 'admin', '1', null, '5d8f2b0dc40c0325d46a1da634833d1c', '2014-10-16 12:06:31', '0', null, '2014-10-15 16:06:46', '2014-10-16 12:06:31');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
