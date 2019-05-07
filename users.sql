/*
 Navicat Premium Data Transfer

 Source Server         : test
 Source Server Type    : MySQL
 Source Server Version : 50721
 Source Host           : localhost:3306
 Source Schema         : form_Ajax_bootstrap

 Target Server Type    : MySQL
 Target Server Version : 50721
 File Encoding         : 65001

 Date: 07/05/2019 14:57:31
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `login` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `image` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of users
-- ----------------------------
BEGIN;
INSERT INTO `users` VALUES (1, 'John Dou', 'JohnDou@gmail.com', '$2y$10$CO7Mb2ChbVS8d8BcthcyfOBaJ./T1pSbduZeMpFPRWSLJN4CgGmPy', '5cd16d72d4e06.jpg');
INSERT INTO `users` VALUES (2, 'Test user', 'test@gmail.com', '$2y$10$11pV29G7xWn6Spdi69rVweFbSByamWExMXf./mylw78fdhkFeXBbS', '5cd16dcfa3dfd.png');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
