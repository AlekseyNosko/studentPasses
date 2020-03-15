/*
 Navicat Premium Data Transfer

 Source Server         : old_os_mySql
 Source Server Type    : MySQL
 Source Server Version : 50723
 Source Host           : localhost:3305
 Source Schema         : journals

 Target Server Type    : MySQL
 Target Server Version : 50723
 File Encoding         : 65001

 Date: 09/03/2020 09:26:38
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for days_omissions
-- ----------------------------
DROP TABLE IF EXISTS `days_omissions`;
CREATE TABLE `days_omissions`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `group_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `Grop_days`(`group_id`) USING BTREE,
  INDEX `User_days`(`user_id`) USING BTREE,
  CONSTRAINT `Grop_days` FOREIGN KEY (`group_id`) REFERENCES `group` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `User_days` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 49 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of days_omissions
-- ----------------------------
INSERT INTO `days_omissions` VALUES (10, 1, 1, '2019-12-11');
INSERT INTO `days_omissions` VALUES (11, 1, 8, '2019-12-11');
INSERT INTO `days_omissions` VALUES (12, 1, 1, '2019-12-10');
INSERT INTO `days_omissions` VALUES (13, 1, 3, '2019-12-10');
INSERT INTO `days_omissions` VALUES (14, 1, 1, '2019-12-02');
INSERT INTO `days_omissions` VALUES (15, 1, 3, '2019-12-02');
INSERT INTO `days_omissions` VALUES (16, 1, 7, '2019-12-02');
INSERT INTO `days_omissions` VALUES (17, 1, 8, '2019-12-02');
INSERT INTO `days_omissions` VALUES (18, 1, 1, '2019-12-01');
INSERT INTO `days_omissions` VALUES (19, 1, 7, '2019-12-01');
INSERT INTO `days_omissions` VALUES (20, 1, 3, '2019-12-23');
INSERT INTO `days_omissions` VALUES (21, 1, 7, '2019-12-23');
INSERT INTO `days_omissions` VALUES (22, 1, 1, '2019-12-02');
INSERT INTO `days_omissions` VALUES (23, 1, 7, '2019-12-02');
INSERT INTO `days_omissions` VALUES (24, 2, 2, '2019-12-01');
INSERT INTO `days_omissions` VALUES (25, 2, 6, '2019-12-01');
INSERT INTO `days_omissions` VALUES (26, 1, 1, '2019-12-25');
INSERT INTO `days_omissions` VALUES (27, 1, 3, '2019-12-25');
INSERT INTO `days_omissions` VALUES (28, 1, 7, '2019-12-25');
INSERT INTO `days_omissions` VALUES (29, 2, 2, '2019-12-29');
INSERT INTO `days_omissions` VALUES (30, 2, 5, '2019-12-29');
INSERT INTO `days_omissions` VALUES (31, 2, 6, '2019-12-29');
INSERT INTO `days_omissions` VALUES (32, 1, 1, '2019-12-22');
INSERT INTO `days_omissions` VALUES (33, 1, 3, '2019-12-22');
INSERT INTO `days_omissions` VALUES (34, 1, 7, '2019-12-22');
INSERT INTO `days_omissions` VALUES (35, 1, 1, '2020-01-15');
INSERT INTO `days_omissions` VALUES (36, 1, 3, '2020-01-15');
INSERT INTO `days_omissions` VALUES (37, 1, 7, '2020-01-15');
INSERT INTO `days_omissions` VALUES (38, 1, 1, '2019-12-22');
INSERT INTO `days_omissions` VALUES (39, 1, 3, '2019-12-22');
INSERT INTO `days_omissions` VALUES (40, 1, 7, '2019-12-22');
INSERT INTO `days_omissions` VALUES (41, 1, 1, '2018-05-03');
INSERT INTO `days_omissions` VALUES (42, 1, 7, '2018-05-03');
INSERT INTO `days_omissions` VALUES (43, 1, 8, '2018-05-03');
INSERT INTO `days_omissions` VALUES (44, 1, 1, '2020-01-26');
INSERT INTO `days_omissions` VALUES (45, 1, 7, '2020-01-26');
INSERT INTO `days_omissions` VALUES (46, 2, 2, '2020-01-26');
INSERT INTO `days_omissions` VALUES (47, 2, 6, '2020-01-26');
INSERT INTO `days_omissions` VALUES (48, 2, 10, '2020-01-26');

-- ----------------------------
-- Table structure for group
-- ----------------------------
DROP TABLE IF EXISTS `group`;
CREATE TABLE `group`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  CONSTRAINT `users` FOREIGN KEY (`id`) REFERENCES `user` (`group_id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of group
-- ----------------------------
INSERT INTO `group` VALUES (1, 'ИТ-672');
INSERT INTO `group` VALUES (2, 'ДТ-385');

-- ----------------------------
-- Table structure for role
-- ----------------------------
DROP TABLE IF EXISTS `role`;
CREATE TABLE `role`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `desc` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of role
-- ----------------------------
INSERT INTO `role` VALUES (1, 'Student', 'Студент');
INSERT INTO `role` VALUES (2, 'Director', 'Директор');
INSERT INTO `role` VALUES (3, 'Starosta', 'Староста');
INSERT INTO `role` VALUES (4, 'Admin', 'Админ');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `group_id` int(10) UNSIGNED NULL DEFAULT NULL,
  `role_id` int(10) UNSIGNED NULL DEFAULT NULL,
  `fio` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `login` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `pass` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `Group`(`group_id`) USING BTREE,
  INDEX `Role`(`role_id`) USING BTREE,
  INDEX `id`(`id`) USING BTREE,
  CONSTRAINT `Group` FOREIGN KEY (`group_id`) REFERENCES `group` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `Role` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES (1, 1, 1, 'Вульфсмег Анот Валерьевич', 'log111', '123123');
INSERT INTO `user` VALUES (2, 2, 1, 'Накатило Альберт Иванович', 'log211', '123123');
INSERT INTO `user` VALUES (3, 1, 3, 'Петров Александр Петрович', 'log132', '123123');
INSERT INTO `user` VALUES (4, NULL, 2, 'Бабий Петро Иванович', 'log021', '123123');
INSERT INTO `user` VALUES (5, 2, 3, 'Сычев Иван Васильевич', 'log232', '123123');
INSERT INTO `user` VALUES (6, 2, 1, 'ФИО', 'log213', '123123');
INSERT INTO `user` VALUES (7, 1, 1, 'Носко Алексей', 'log113', '123123');
INSERT INTO `user` VALUES (8, 1, 1, 'Жиган Лимон Пантелемон', 'log1234', '123123');
INSERT INTO `user` VALUES (9, NULL, 4, 'Администрато Вася Петрович', 'admin', '123123');
INSERT INTO `user` VALUES (10, 2, 1, 'Лионова Мария Викторовна', 'log241', '4221');

SET FOREIGN_KEY_CHECKS = 1;
