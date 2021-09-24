/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : ncc

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2019-11-25 12:25:19
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `department`
-- ----------------------------
DROP TABLE IF EXISTS `department`;
CREATE TABLE `department` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `departmentname` varchar(255) DEFAULT NULL,
  `deptshortname` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `departmentname` (`departmentname`),
  KEY `deptshortname` (`deptshortname`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of department
-- ----------------------------
INSERT INTO `department` VALUES ('1', 'Board Division', 'BD');
INSERT INTO `department` VALUES ('2', 'Card Division', 'CD');
INSERT INTO `department` VALUES ('3', 'Human Resource Division', 'HRD');
INSERT INTO `department` VALUES ('4', 'IT Business Support and Software Development', 'IBSS');
INSERT INTO `department` VALUES ('5', 'Marketing', 'MRK');
INSERT INTO `department` VALUES ('6', 'IT Hardware & Infrastructure Division', 'IHID');

-- ----------------------------
-- Table structure for `details`
-- ----------------------------
DROP TABLE IF EXISTS `details`;
CREATE TABLE `details` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `subjectt` varchar(255) DEFAULT NULL,
  `fromdept` varchar(255) DEFAULT NULL,
  `todept` varchar(255) DEFAULT NULL,
  `body` varchar(255) DEFAULT NULL,
  `reffno` varchar(255) DEFAULT NULL,
  `lettertype` varchar(255) DEFAULT NULL,
  `sdate` date DEFAULT NULL,
  `lastserial` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_details_dept` (`fromdept`),
  KEY `fk_details_dept1` (`todept`),
  KEY `fk_1` (`lettertype`),
  CONSTRAINT `fk_1` FOREIGN KEY (`lettertype`) REFERENCES `doctype` (`doctype`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_details_dept` FOREIGN KEY (`fromdept`) REFERENCES `department` (`deptshortname`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_details_dept1` FOREIGN KEY (`todept`) REFERENCES `department` (`deptshortname`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of details
-- ----------------------------
INSERT INTO `details` VALUES ('1', 'Testing', 'BD', 'CD', 'Hello World', 'NCCBD/191121/1', null, '2019-11-21', '0');
INSERT INTO `details` VALUES ('2', 'asdf', 'MRK', 'MRK', 'asdfasdf', 'NCCMRK/191125/1', 'Office Note', '2019-11-25', '1');

-- ----------------------------
-- Table structure for `doctype`
-- ----------------------------
DROP TABLE IF EXISTS `doctype`;
CREATE TABLE `doctype` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `doctype` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `doctype` (`doctype`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of doctype
-- ----------------------------
INSERT INTO `doctype` VALUES ('2', 'Letter');
INSERT INTO `doctype` VALUES ('3', 'Office Note');
INSERT INTO `doctype` VALUES ('1', 'Office Order');

-- ----------------------------
-- Table structure for `employee`
-- ----------------------------
DROP TABLE IF EXISTS `employee`;
CREATE TABLE `employee` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `empname` varchar(255) DEFAULT NULL,
  `empusername` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `dept` varchar(255) DEFAULT NULL,
  `power` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_employee_dept` (`dept`),
  CONSTRAINT `fk_employee_dept` FOREIGN KEY (`dept`) REFERENCES `department` (`deptshortname`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of employee
-- ----------------------------
INSERT INTO `employee` VALUES ('1', 'admin', 'admin', 'admin1234!@#$', 'HRD', 'admin');
INSERT INTO `employee` VALUES ('2', 'Jahidul Islam', 'jahid', '123', 'BD', 'none');
INSERT INTO `employee` VALUES ('3', 'asdf', 'asdf', '1', 'MRK', 'none');
