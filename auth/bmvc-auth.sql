/*
 Navicat Premium Data Transfer

 Source Server         : local
 Source Server Type    : MySQL
 Source Server Version : 50736
 Source Host           : localhost:3306
 Source Schema         : bmvc-auth

 Target Server Type    : MySQL
 Target Server Version : 50736
 File Encoding         : 65001

 Date: 04/09/2022 01:41:27
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `email` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `name` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `role` enum('admin','user') CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT 'user',
  `status` enum('0','1') CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '1',
  `time` int(20) NULL DEFAULT NULL,
  `edit_time` int(20) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 12 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'admin', 'admin@admin.com', '$2y$12$nzx8eYAPRO3HBdjMQuLFw.CR539hzBqGWUoxeEGavkYcPSkFS0Uky', '5', 'admin', '1', NULL, 1661280844);
INSERT INTO `users` VALUES (2, 'user', 'user@user1.com', '$2y$12$nXMwrIagHmGMerSts/Jdm.CCsi4ZWEZ6Du70YpV672sJnTL9D6u3G', '2', 'user', '1', NULL, 1656867167);
INSERT INTO `users` VALUES (5, 'user1', 'user1@user.com', '$2y$12$8nWheL3Mb2ss.gpr00okAuViHSA6XQXRVhyVSPqL0qydRpRv7EC82', NULL, 'user', '1', 1653240623, NULL);
INSERT INTO `users` VALUES (6, 'user2', 'user2@user.com', '$2y$12$5CYSATJWqA3J4DLVdMhoT.YJJoQYQ5qQpe4JOQCfIht5Hp1kaDmPG', NULL, 'user', '1', 1653242149, NULL);
INSERT INTO `users` VALUES (8, 'adminz', 'aliguclutr@gmail.comx', '$2y$12$ze/.APyU4MAOHLoiIcrfQ.d5X7dyzbxWE1WajVrQtlwCnJXs7sHBq', NULL, 'user', '1', 1656859631, NULL);
INSERT INTO `users` VALUES (9, 'adminzx', 'aliguclutr@gmail.comxx', '$2y$12$R466uxq4sQ5misXN1fKKlOo38xD2xMNHo4zhMdbR2dz8aMpacvHm6', NULL, 'user', '1', 1656859659, NULL);
INSERT INTO `users` VALUES (10, '12', '12@a.ss2', '$2y$12$f.JkrsVjL1dZBuo55661F.A9Qbd7PpSiE0slU0WcxEoJ0KRPl7HRa', NULL, 'user', '1', 1657974114, 1657974145);
INSERT INTO `users` VALUES (11, 'adminxx', 'aliguclutr@gmail.comss', '$2y$12$PRYFKLXLzozr8ijCs7lz5e0iayooHnugEIDOf6nJxdx9FDiHd/tSe', NULL, 'user', '1', 1659990170, NULL);

SET FOREIGN_KEY_CHECKS = 1;
