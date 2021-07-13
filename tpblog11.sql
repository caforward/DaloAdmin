/*
 Navicat MySQL Data Transfer

 Source Server         : 127.0.0.1
 Source Server Type    : MySQL
 Source Server Version : 50553
 Source Host           : localhost:3306
 Source Schema         : tpblog

 Target Server Type    : MySQL
 Target Server Version : 50553
 File Encoding         : 65001

 Date: 14/07/2021 01:45:56
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for tp_admin
-- ----------------------------
DROP TABLE IF EXISTS `tp_admin`;
CREATE TABLE `tp_admin`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '管理员名称',
  `password` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '管理员密码',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 9 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tp_admin
-- ----------------------------
INSERT INTO `tp_admin` VALUES (1, 'admin', 'e10adc3949ba59abbe56e057f20f883e');
INSERT INTO `tp_admin` VALUES (8, 'cao', '18452d47d97eb0f306c59ae38087fcb0');
INSERT INTO `tp_admin` VALUES (7, 'yang', '57cb5a26334a6c1d5e27c49def4a0f0d');
INSERT INTO `tp_admin` VALUES (6, 'wang', '0c5911f3a90cb9985f39949098c2a975');

-- ----------------------------
-- Table structure for tp_article
-- ----------------------------
DROP TABLE IF EXISTS `tp_article`;
CREATE TABLE `tp_article`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(60) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '文章标题',
  `author` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '编辑作者',
  `desc` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '文章简介',
  `keywords` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '文章关键词',
  `content` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT '内容',
  `pic` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT '缩略图',
  `click` int(11) NULL DEFAULT 0 COMMENT '点击量',
  `state` tinyint(1) NULL DEFAULT 0 COMMENT '0为推荐 1为不推荐',
  `time` int(11) NULL DEFAULT NULL COMMENT '发布时间',
  `cateid` mediumint(9) NULL DEFAULT NULL,
  `stime` date NULL DEFAULT '2030-08-14' COMMENT '定时发布时间',
  `sstate` int(255) NULL DEFAULT NULL COMMENT '定时发布状态',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 14 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tp_article
-- ----------------------------
INSERT INTO `tp_article` VALUES (7, '【高一学年】7月15日假期作业答案', 'admin', '', '【高一学年】', '<p style=\"line-height: 16px;\">【高一学年】7月15日假期作业答案：</p><p style=\"line-height: 16px;\">语文作业：</p><p style=\"line-height: 16px;\"><img style=\"vertical-align: middle; margin-right: 2px;\" src=\"http://www.tp5.com/static/admin/ueditor/dialogs/attachment/fileTypeImages/icon_rar.gif\"/><a style=\"font-size:12px; color:#0066cc;\" href=\"/ueditor/php/upload/file/20210701/1625069187.zip\" title=\"人物走动.zip\">人物走动.zip</a></p><p><img src=\"/ueditor/php/upload/image/20210701/1625075015.png\" title=\"1625075015.png\" alt=\"WeChat Screenshot_20210621014111.png\" width=\"545\" height=\"305\" style=\"width: 545px; height: 305px;\"/></p>', NULL, 0, 1, 1625069189, 7, '0000-00-00', NULL);
INSERT INTO `tp_article` VALUES (12, '7.13应该成功定时发布', 'admin', '123', '132', '<p>1231231</p>', NULL, 0, 1, 1626196671, 7, '2021-07-13', NULL);
INSERT INTO `tp_article` VALUES (13, '7.15应该还没有发布', 'admin', '1231', '123', '<p>123123</p>', NULL, 0, 1, 1626196697, 7, '2021-07-14', NULL);

-- ----------------------------
-- Table structure for tp_cate
-- ----------------------------
DROP TABLE IF EXISTS `tp_cate`;
CREATE TABLE `tp_cate`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `catename` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '栏目名称',
  `state` int(255) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 11 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tp_cate
-- ----------------------------
INSERT INTO `tp_cate` VALUES (8, '高二学年', 1);
INSERT INTO `tp_cate` VALUES (7, '高一学年', 1);
INSERT INTO `tp_cate` VALUES (9, '高三学年', 0);
INSERT INTO `tp_cate` VALUES (10, '平台公告', 0);

-- ----------------------------
-- Table structure for tp_links
-- ----------------------------
DROP TABLE IF EXISTS `tp_links`;
CREATE TABLE `tp_links`  (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '链接id',
  `title` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '链接标题',
  `url` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '链接URL',
  `desc` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '链接备注',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tp_links
-- ----------------------------
INSERT INTO `tp_links` VALUES (1, '超凡博客网', 'http://www.cf0w.com', '超凡旗下第一QQ技术博客娱乐网');
INSERT INTO `tp_links` VALUES (3, '哈尔滨市德强学校', 'http:///www.dqxx.com', '德强学校官网');

-- ----------------------------
-- Table structure for tp_tags
-- ----------------------------
DROP TABLE IF EXISTS `tp_tags`;
CREATE TABLE `tp_tags`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tagname` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tp_tags
-- ----------------------------

SET FOREIGN_KEY_CHECKS = 1;
