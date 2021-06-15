/*
 Navicat Premium Data Transfer

 Source Server         : localhost_3306
 Source Server Type    : MySQL
 Source Server Version : 50721
 Source Host           : localhost:3306
 Source Schema         : myproject

 Target Server Type    : MySQL
 Target Server Version : 50721
 File Encoding         : 65001

 Date: 05/07/2019 11:23:06
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for pro_admin
-- ----------------------------
DROP TABLE IF EXISTS `pro_admin`;
CREATE TABLE `pro_admin`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `nickname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `age` int(11) NULL DEFAULT NULL,
  `sex` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `tel` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `roleid` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pro_admin
-- ----------------------------
INSERT INTO `pro_admin` VALUES (1, 'admin', 'admin', 26, 'm', '13210392321', 'd7c6c07a0a04ba4e65921e2f90726384', NULL);

-- ----------------------------
-- Table structure for pro_controller
-- ----------------------------
DROP TABLE IF EXISTS `pro_controller`;
CREATE TABLE `pro_controller`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT '分类英文名称',
  `sort` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT '排序',
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pro_controller
-- ----------------------------
INSERT INTO `pro_controller` VALUES (1, '主页', '1', '0');
INSERT INTO `pro_controller` VALUES (3, '系统管理', '2', '0');
INSERT INTO `pro_controller` VALUES (4, '设置', '3', '0');

-- ----------------------------
-- Table structure for pro_right
-- ----------------------------
DROP TABLE IF EXISTS `pro_right`;
CREATE TABLE `pro_right`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) NULL DEFAULT NULL,
  `level` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT '层次',
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT '权限名称',
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT '权限中文名称',
  `desc` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT '权限藐视',
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 17 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pro_right
-- ----------------------------
INSERT INTO `pro_right` VALUES (1, 1, '1', '/room', '后台首页', NULL, '0');
INSERT INTO `pro_right` VALUES (2, 1, '1', '/room/console', '控制台', NULL, '0');
INSERT INTO `pro_right` VALUES (10, 3, '1', '/room/systemSetting', '系统管理页面', NULL, '0');
INSERT INTO `pro_right` VALUES (11, 3, '1', '/room/user', '用户管理', NULL, '0');
INSERT INTO `pro_right` VALUES (12, 3, '1', '/room/role', '角色管理', NULL, '0');
INSERT INTO `pro_right` VALUES (13, 3, '1', '/room/right', '权限管理', NULL, '0');
INSERT INTO `pro_right` VALUES (14, 3, '1', '/room/Menu', '菜单管理', NULL, '0');
INSERT INTO `pro_right` VALUES (15, 4, '1', '/room/userSetting', '基本资料', NULL, '0');
INSERT INTO `pro_right` VALUES (16, 4, '1', '/room/changePassword', '修改密码', NULL, '0');

-- ----------------------------
-- Table structure for pro_rightaccess
-- ----------------------------
DROP TABLE IF EXISTS `pro_rightaccess`;
CREATE TABLE `pro_rightaccess`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `roleid` int(11) NULL DEFAULT NULL,
  `rightid` int(11) NULL DEFAULT NULL,
  `level` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `module` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 22 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pro_rightaccess
-- ----------------------------
INSERT INTO `pro_rightaccess` VALUES (6, 9, 2, NULL, NULL);
INSERT INTO `pro_rightaccess` VALUES (8, 8, 1, NULL, NULL);
INSERT INTO `pro_rightaccess` VALUES (9, 8, 2, NULL, NULL);
INSERT INTO `pro_rightaccess` VALUES (19, 7, 10, NULL, NULL);
INSERT INTO `pro_rightaccess` VALUES (18, 7, 2, NULL, NULL);
INSERT INTO `pro_rightaccess` VALUES (17, 7, 1, NULL, NULL);
INSERT INTO `pro_rightaccess` VALUES (14, 1, 1, NULL, NULL);
INSERT INTO `pro_rightaccess` VALUES (15, 1, 2, NULL, NULL);
INSERT INTO `pro_rightaccess` VALUES (20, 7, 13, NULL, NULL);
INSERT INTO `pro_rightaccess` VALUES (21, 7, 16, NULL, NULL);

-- ----------------------------
-- Table structure for pro_role
-- ----------------------------
DROP TABLE IF EXISTS `pro_role`;
CREATE TABLE `pro_role`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `pid` int(11) NULL DEFAULT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `remark` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 10 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pro_role
-- ----------------------------
INSERT INTO `pro_role` VALUES (1, '管理员', NULL, '0', NULL);
INSERT INTO `pro_role` VALUES (8, '11', NULL, '0', NULL);
INSERT INTO `pro_role` VALUES (7, '会员', NULL, '0', NULL);

-- ----------------------------
-- Table structure for pro_roleuser
-- ----------------------------
DROP TABLE IF EXISTS `pro_roleuser`;
CREATE TABLE `pro_roleuser`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NULL DEFAULT NULL,
  `roleid` int(255) NULL DEFAULT NULL,
  `remark` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 26 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pro_roleuser
-- ----------------------------
INSERT INTO `pro_roleuser` VALUES (1, 1, 7, NULL, NULL);
INSERT INTO `pro_roleuser` VALUES (21, 25, 8, NULL, NULL);
INSERT INTO `pro_roleuser` VALUES (16, 2, 9, NULL, NULL);
INSERT INTO `pro_roleuser` VALUES (23, 26, 9, NULL, NULL);
INSERT INTO `pro_roleuser` VALUES (15, 2, 8, NULL, NULL);
INSERT INTO `pro_roleuser` VALUES (17, 2, 7, NULL, NULL);
INSERT INTO `pro_roleuser` VALUES (25, 3, 7, NULL, NULL);
INSERT INTO `pro_roleuser` VALUES (19, 23, 9, NULL, NULL);
INSERT INTO `pro_roleuser` VALUES (20, 23, 7, NULL, NULL);
INSERT INTO `pro_roleuser` VALUES (22, 25, 7, NULL, NULL);
INSERT INTO `pro_roleuser` VALUES (24, 26, 7, NULL, NULL);

-- ----------------------------
-- Table structure for pro_settings
-- ----------------------------
DROP TABLE IF EXISTS `pro_settings`;
CREATE TABLE `pro_settings`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `systemName` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `author` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `describe` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `keywords` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `tel` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `qrcode` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `worker` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `logo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `showtips` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `companyDesc` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pro_settings
-- ----------------------------
INSERT INTO `pro_settings` VALUES (1, 'all for one ', NULL, 'all for one ', 'all for one ', '13210392321', '20190620/a0f093efce989c1e8b50e4a5369b3466.png', '历下区', '张某某', '20190620/d93c5807f35dd7f3966b4ed8d924d884.svg', '匠心制作.高端影像，用影像讲述故事，视频营销一站式解决方案', '多年来视觉灵动为众多500强企业以及国内中小企业竭诚服务\n\n大浪淘沙，我们在实战中砥砺成长；洗尽铅华，我们于纷纭中泰然自若\n\n竭心尽力，为服务而来；精良制作，为卓越而生');

-- ----------------------------
-- Table structure for pro_user
-- ----------------------------
DROP TABLE IF EXISTS `pro_user`;
CREATE TABLE `pro_user`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `nickname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `age` int(11) NULL DEFAULT NULL,
  `sex` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `tel` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `loginTime` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 27 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pro_user
-- ----------------------------
INSERT INTO `pro_user` VALUES (3, '222', '222', 222, 'm', '222', 'c93282d496cde098816f052c5e9a9735', '0', NULL);
INSERT INTO `pro_user` VALUES (1, 'admin', 'admin', 26, 'm', '13210392321', 'd7c6c07a0a04ba4e65921e2f90726384', '0', NULL);

SET FOREIGN_KEY_CHECKS = 1;
