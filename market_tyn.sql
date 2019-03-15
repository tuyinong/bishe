/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : market_tyn

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2019-03-15 17:16:57
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for tyn_admins
-- ----------------------------
DROP TABLE IF EXISTS `tyn_admins`;
CREATE TABLE `tyn_admins` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `a_account` varchar(30) NOT NULL COMMENT '管理员账号',
  `a_pwd` varchar(30) NOT NULL COMMENT '管理员密码',
  `a_time` datetime DEFAULT NULL COMMENT '管理员创建时间',
  `a_nickname` varchar(30) DEFAULT NULL COMMENT '管理员昵称',
  `a_uptime` datetime DEFAULT NULL COMMENT '管理员上一次登陆时间',
  `a_state` int(2) DEFAULT '0' COMMENT '在线状态 0为不在线 1为在线',
  `a_phone` int(11) DEFAULT NULL COMMENT '联系方式',
  `a_level` int(2) DEFAULT '2' COMMENT '管理员等级 1为总管理员 2为分管理员',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tyn_admins
-- ----------------------------
INSERT INTO `tyn_admins` VALUES ('1', 'xiaokeai', '123456', '2019-01-17 09:04:47', 'xiaokeai', null, '0', null, '1');

-- ----------------------------
-- Table structure for tyn_collects
-- ----------------------------
DROP TABLE IF EXISTS `tyn_collects`;
CREATE TABLE `tyn_collects` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `uid` int(10) NOT NULL COMMENT '用户id',
  `gid` int(10) NOT NULL COMMENT '商品id',
  `c_time` datetime DEFAULT NULL COMMENT '收藏时间',
  PRIMARY KEY (`id`),
  KEY `uid` (`uid`),
  KEY `gid` (`gid`),
  CONSTRAINT `tyn_collects_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `tyn_users` (`id`),
  CONSTRAINT `tyn_collects_ibfk_2` FOREIGN KEY (`gid`) REFERENCES `tyn_goods` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tyn_collects
-- ----------------------------

-- ----------------------------
-- Table structure for tyn_evaluations
-- ----------------------------
DROP TABLE IF EXISTS `tyn_evaluations`;
CREATE TABLE `tyn_evaluations` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `e_info` varchar(500) NOT NULL COMMENT '评价内容',
  `e_time` datetime DEFAULT NULL COMMENT '评价时间',
  `e_level` int(2) NOT NULL COMMENT '评价等级',
  `e_userid` int(10) DEFAULT NULL COMMENT '写评价的用户',
  `e_rid` int(10) DEFAULT NULL COMMENT '评价的交易',
  PRIMARY KEY (`id`),
  KEY `e_rid` (`e_rid`),
  CONSTRAINT `tyn_evaluations_ibfk_1` FOREIGN KEY (`e_rid`) REFERENCES `tyn_records` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tyn_evaluations
-- ----------------------------

-- ----------------------------
-- Table structure for tyn_goods
-- ----------------------------
DROP TABLE IF EXISTS `tyn_goods`;
CREATE TABLE `tyn_goods` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `g_name` varchar(100) NOT NULL COMMENT '商品名称',
  `from_id` int(10) NOT NULL COMMENT '发布的商家',
  `g_price` double(10,2) NOT NULL COMMENT '商品的价格',
  `g_num` int(10) DEFAULT '1' COMMENT '商品的数量，wei0商品已卖完，商品不存在',
  `g_time` datetime DEFAULT NULL COMMENT ' 审核时间 -> 发布的时间',
  `g_state` int(2) DEFAULT '0' COMMENT '商品的状态 0 未审核 1审核通过，发布中 2审核未通过',
  `g_hot` int(10) DEFAULT '0' COMMENT '商品热度',
  `g_like` int(10) DEFAULT '0' COMMENT '喜爱人数',
  `g_img` varchar(100) DEFAULT NULL COMMENT '商品图片',
  PRIMARY KEY (`id`),
  KEY `from_id` (`from_id`),
  CONSTRAINT `tyn_goods_ibfk_1` FOREIGN KEY (`from_id`) REFERENCES `tyn_users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tyn_goods
-- ----------------------------
INSERT INTO `tyn_goods` VALUES ('1', '鸭鸭冬装男士棉服韩版潮流青少年棉袄中长款加厚棉衣青年羽绒棉服', '1', '20.00', '1', '2019-02-12 17:22:17', '0', '0', '0', null);
INSERT INTO `tyn_goods` VALUES ('2', '优惠劵', '1', '15.15', '1', '2019-02-12 17:21:59', '0', '0', '0', null);
INSERT INTO `tyn_goods` VALUES ('3', '优惠劵', '1', '15.15', '1', '2019-02-12 17:22:10', '0', '0', '0', null);
INSERT INTO `tyn_goods` VALUES ('4', '优惠劵', '1', '15.15', '1', '2019-02-12 17:22:10', '0', '0', '0', null);
INSERT INTO `tyn_goods` VALUES ('5', '优惠劵', '1', '15.15', '1', '2019-02-12 17:22:10', '0', '0', '0', null);
INSERT INTO `tyn_goods` VALUES ('6', '优惠劵', '1', '15.15', '1', '2019-02-12 17:22:11', '0', '0', '0', null);
INSERT INTO `tyn_goods` VALUES ('7', '优惠劵', '1', '15.15', '1', '2019-02-12 17:22:16', '0', '0', '0', null);
INSERT INTO `tyn_goods` VALUES ('8', '优惠劵', '1', '15.15', '1', '2019-02-12 17:22:16', '0', '0', '0', null);
INSERT INTO `tyn_goods` VALUES ('9', '优惠劵', '1', '15.15', '1', '2019-02-12 17:22:17', '0', '0', '0', null);
INSERT INTO `tyn_goods` VALUES ('10', '优惠劵', '1', '15.15', '1', '2019-02-12 17:21:58', '0', '0', '0', null);
INSERT INTO `tyn_goods` VALUES ('11', '优惠劵', '1', '15.15', '1', '2019-02-12 17:21:58', '0', '0', '0', null);
INSERT INTO `tyn_goods` VALUES ('12', '优惠劵', '1', '15.15', '1', '2019-02-12 17:21:55', '0', '0', '0', null);
INSERT INTO `tyn_goods` VALUES ('13', '优惠劵', '1', '15.15', '1', '2019-02-12 17:21:46', '0', '0', '0', null);
INSERT INTO `tyn_goods` VALUES ('14', '优惠劵', '1', '15.15', '1', '2019-02-12 17:25:42', '1', '0', '0', null);
INSERT INTO `tyn_goods` VALUES ('15', '优惠劵', '1', '15.15', '1', '2019-02-12 17:25:50', '2', '0', '0', null);

-- ----------------------------
-- Table structure for tyn_notices
-- ----------------------------
DROP TABLE IF EXISTS `tyn_notices`;
CREATE TABLE `tyn_notices` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `n_title` varchar(100) NOT NULL COMMENT '通知主题',
  `n_content` varchar(500) NOT NULL COMMENT '通知内容',
  `n_time` datetime DEFAULT NULL COMMENT '通知创建时间',
  `n_type` int(2) NOT NULL DEFAULT '0' COMMENT '通知类型 0全体 1个体',
  `n_userid` int(10) DEFAULT NULL COMMENT '通知对象',
  `n_sendtime` datetime DEFAULT NULL COMMENT '消息发送时间',
  `n_state` int(2) NOT NULL DEFAULT '0' COMMENT '通知状态 0 未发送状态 1 发送成功状态 2 取消发送',
  PRIMARY KEY (`id`,`n_type`),
  KEY `n_userid` (`n_userid`),
  CONSTRAINT `tyn_notices_ibfk_1` FOREIGN KEY (`n_userid`) REFERENCES `tyn_users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tyn_notices
-- ----------------------------
INSERT INTO `tyn_notices` VALUES ('1', '验证', '小可爱来验证一下这样可不可以', '2019-01-23 13:46:43', '0', null, '2019-01-23 14:49:50', '0');

-- ----------------------------
-- Table structure for tyn_records
-- ----------------------------
DROP TABLE IF EXISTS `tyn_records`;
CREATE TABLE `tyn_records` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `r_gid` int(10) NOT NULL COMMENT '商品id',
  `r_time` datetime DEFAULT NULL COMMENT '交易时间',
  `r_price` double(10,2) NOT NULL COMMENT '最终交易价格',
  `r_userid` int(10) NOT NULL COMMENT '买家id',
  `r_state` int(2) DEFAULT '0' COMMENT '商品的状态 0交易中 1交易成功',
  PRIMARY KEY (`id`),
  KEY `r_userid` (`r_userid`),
  KEY `r_gid` (`r_gid`),
  CONSTRAINT `tyn_records_ibfk_1` FOREIGN KEY (`r_userid`) REFERENCES `tyn_users` (`id`),
  CONSTRAINT `tyn_records_ibfk_2` FOREIGN KEY (`r_gid`) REFERENCES `tyn_goods` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tyn_records
-- ----------------------------
INSERT INTO `tyn_records` VALUES ('1', '1', '2019-03-15 16:51:48', '15.00', '2', '1');

-- ----------------------------
-- Table structure for tyn_users
-- ----------------------------
DROP TABLE IF EXISTS `tyn_users`;
CREATE TABLE `tyn_users` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `u_account` varchar(30) NOT NULL COMMENT '用户账号',
  `u_pwd` varchar(30) NOT NULL COMMENT '用户密码',
  `u_time` datetime DEFAULT NULL COMMENT '用户创建时间',
  `u_state` int(2) DEFAULT '1' COMMENT '用户账号状态 1 为正常状态 0 为异常状态',
  `u_nickname` varchar(30) DEFAULT NULL COMMENT '用户昵称',
  `u_uptime` datetime DEFAULT NULL COMMENT '用户上一次登陆时间',
  `u_phone` varchar(11) DEFAULT NULL COMMENT '联系方式',
  `u_provice` varchar(30) DEFAULT NULL COMMENT '省',
  `u_city` varchar(30) DEFAULT NULL COMMENT '市',
  `u_area` varchar(30) DEFAULT NULL COMMENT ' 区',
  `u_street` varchar(30) DEFAULT NULL COMMENT '街道',
  `u_arr` varchar(30) DEFAULT NULL COMMENT '具体地址',
  `u_credit` int(3) DEFAULT '100' COMMENT '信用值',
  `u_gid` varchar(100) DEFAULT NULL COMMENT '关注商品id 用，分割',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tyn_users
-- ----------------------------
INSERT INTO `tyn_users` VALUES ('1', 'xixi', '123456', '2019-01-22 17:39:58', '1', '小可爱', '2019-03-15 11:32:10', '12345679845', '福建省', '福州市', '马尾区', '马尾', '蓝波湾', '100', null);
INSERT INTO `tyn_users` VALUES ('2', 'xiaoxiao', '123456', '2019-02-12 11:29:44', '0', '小小', '2019-03-04 17:20:32', '13246798784', '\r\n福建省', '福州市', '马尾区', '马尾', null, '100', null);
INSERT INTO `tyn_users` VALUES ('3', 'haha', '123456', '2019-02-12 11:30:27', '1', '哈哈', '2019-02-12 13:45:45', '12345678912', '福建省', null, null, null, null, '100', null);

-- ----------------------------
-- Table structure for tyn_words
-- ----------------------------
DROP TABLE IF EXISTS `tyn_words`;
CREATE TABLE `tyn_words` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `w_info` varchar(500) NOT NULL COMMENT '留言内容',
  `w_time` datetime DEFAULT NULL COMMENT '留言的',
  `w_userid` int(10) DEFAULT NULL COMMENT '发布留言的用户',
  `w_gid` int(10) DEFAULT NULL COMMENT '留言的商品',
  PRIMARY KEY (`id`),
  KEY `w_gid` (`w_gid`),
  CONSTRAINT `tyn_words_ibfk_1` FOREIGN KEY (`w_gid`) REFERENCES `tyn_goods` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tyn_words
-- ----------------------------
