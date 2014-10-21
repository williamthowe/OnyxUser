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
INSERT INTO `onyx_user` VALUES ('1', null, '79f550ac59295c078750f00d4a8e96b59ea37913', 'e0483cf8bf1e7756213339b853d1d24c', 'Paul', 'Headington', null, null, 'paul.headington@colensobbdo.co.nz', null, null, null, null, null, null, null, null, 'admin', '1', null, '68616f53a3d2b4001f9e3f750dae658a', '2014-10-16 15:54:19', '1', '2014-10-16 15:54:54', '2014-10-15 19:54:54', '2014-10-16 15:54:19');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
