-- phpMyAdmin SQL Dump
-- version phpStudy 2014
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2019 �?07 �?05 �?09:07
-- 服务器版本: 5.5.53
-- PHP 版本: 7.2.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `fang`
--

-- --------------------------------------------------------

--
-- 表的结构 `cha`
--

CREATE TABLE IF NOT EXISTS `cha` (
  `chid` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '角色自增id',
  `ch_nsme` varchar(10) NOT NULL COMMENT '角色名称',
  `ch_text` varchar(200) DEFAULT NULL COMMENT '角色描述',
  `ch_per` varchar(200) NOT NULL COMMENT '角色的权限',
  `cstatus` tinyint(3) unsigned NOT NULL DEFAULT '1' COMMENT '内部成员状态1=可用，2=禁用',
  `created_at` int(10) unsigned NOT NULL COMMENT '创建的UNIX时间戳',
  PRIMARY KEY (`chid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COMMENT='角色信息表' AUTO_INCREMENT=5 ;

--
-- 转存表中的数据 `cha`
--

INSERT INTO `cha` (`chid`, `ch_nsme`, `ch_text`, `ch_per`, `cstatus`, `created_at`) VALUES
(2, '网站管理员', '管理后台网站', '6,7,8', 1, 1562204773),
(3, '系统管理员', '管理后台系统', '2,3,4', 1, 1562206331),
(4, '整个系统管理', '整个系统的管理员', '6,7,8,9,2,3,4,5', 1, 1562212004);

-- --------------------------------------------------------

--
-- 表的结构 `cnews`
--

CREATE TABLE IF NOT EXISTS `cnews` (
  `cnid` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '自增id',
  `tnid` int(11) NOT NULL COMMENT '新闻标题id',
  `content` text COMMENT '新闻内容',
  PRIMARY KEY (`cnid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=11 ;

--
-- 转存表中的数据 `cnews`
--

INSERT INTO `cnews` (`cnid`, `tnid`, `content`) VALUES
(5, 5, '<p><span style="color: rgb(51, 51, 51); font-family: arial, 宋体, sans-serif; text-indent: 28px;">&nbsp; &nbsp; &nbsp; &nbsp; 万科荣华·金域名城</span><span class="sup--normal" data-sup="1" data-ctrmap=":1," style="font-size: 12px; line-height: 0; position: relative; vertical-align: baseline; top: -0.5em; margin-left: 2px; color: rgb(51, 102, 204); cursor: pointer; padding: 0px 2px; font-family: arial, 宋体, sans-serif; text-indent: 28px;">&nbsp;[1]</span><a class="sup-anchor" name="ref_[1]_20635855" style="color: rgb(19, 110, 194); text-decoration: none; position: relative; top: -50px; font-size: 0px; line-height: 0; font-family: arial, 宋体, sans-serif; font-weight: 400; text-indent: 28px; background-color: rgb(255, 255, 255);">&nbsp;</a><span style="color: rgb(51, 51, 51); font-family: arial, 宋体, sans-serif; text-indent: 28px;">&nbsp;是万科携手荣华倾力打造的自由、便捷、简约的美式风范都会，作为西安为数不多的美式街区，项目巧妙地将人居、商业、生活休闲配套紧密联系起来，最大限度地使居住功能便捷化，将悠闲、诗意、活力和友善最大化，开创城北前所未有的居住方式，让生活变成一种悠然自得的体验和享受。</span></p><p><img src="/fang/public/uploads/20190705/20190704164054.png" style="width: 100%;"><span style="color: rgb(51, 51, 51); font-family: arial, 宋体, sans-serif; text-indent: 28px;"><br></span></p><p><span style="color: rgb(51, 51, 51); font-family: arial, 宋体, sans-serif; text-indent: 28px;">&nbsp; &nbsp; &nbsp; &nbsp;万科荣华·金域名城</span><span class="sup--normal" data-sup="1" data-ctrmap=":1," style="font-size: 12px; line-height: 0; position: relative; vertical-align: baseline; top: -0.5em; margin-left: 2px; color: rgb(51, 102, 204); cursor: pointer; padding: 0px 2px; font-family: arial, 宋体, sans-serif; text-indent: 28px;">&nbsp;[1]</span><a class="sup-anchor" name="ref_[1]_20635855" style="color: rgb(19, 110, 194); text-decoration: none; position: relative; top: -50px; font-size: 0px; line-height: 0; font-family: arial, 宋体, sans-serif; font-weight: 400; text-indent: 28px; background-color: rgb(255, 255, 255);">&nbsp;</a><span style="color: rgb(51, 51, 51); font-family: arial, 宋体, sans-serif; text-indent: 28px;">&nbsp;作为美式风范都会，项目南接凤城二路，西临西安市南北黄金中轴线太华路，北临市政新区，地铁4、8号线及多条公交线直达，交通便捷，配套齐全。</span></p><p><span style="color: rgb(51, 51, 51); font-family: arial, 宋体, sans-serif; text-indent: 28px;"><br></span></p><p><span style="color: rgb(51, 51, 51); font-family: arial, 宋体, sans-serif; text-indent: 28px;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;万科荣华·金域名城</span><span class="sup--normal" data-sup="1" data-ctrmap=":1," style="font-size: 12px; line-height: 0; position: relative; vertical-align: baseline; top: -0.5em; margin-left: 2px; color: rgb(51, 102, 204); cursor: pointer; padding: 0px 2px; font-family: arial, 宋体, sans-serif; text-indent: 28px;">&nbsp;[1]</span><a class="sup-anchor" name="ref_[1]_20635855" style="color: rgb(19, 110, 194); text-decoration: none; position: relative; top: -50px; font-size: 0px; line-height: 0; font-family: arial, 宋体, sans-serif; font-weight: 400; text-indent: 28px; background-color: rgb(255, 255, 255);">&nbsp;</a><span style="color: rgb(51, 51, 51); font-family: arial, 宋体, sans-serif; text-indent: 28px;">&nbsp;共分为住宅和商业两大产品，街区商业均为两层（局部三层）的情景式街区商业，住宅总户约660户，由4栋高层和2栋小高层组成。</span><span class="sup--normal" data-sup="1" data-ctrmap=":1," style="font-size: 12px; line-height: 0; position: relative; vertical-align: baseline; top: -0.5em; margin-left: 2px; color: rgb(51, 102, 204); cursor: pointer; padding: 0px 2px; font-family: arial, 宋体, sans-serif; text-indent: 28px;">&nbsp;[1]</span><a class="sup-anchor" name="ref_[1]_20635855" style="color: rgb(19, 110, 194); text-decoration: none; position: relative; top: -50px; font-size: 0px; line-height: 0; font-family: arial, 宋体, sans-serif; font-weight: 400; text-indent: 28px; background-color: rgb(255, 255, 255);">&nbsp;</a><span style="color: rgb(51, 51, 51); font-family: arial, 宋体, sans-serif; text-indent: 28px;">&nbsp;项目复刻了美式街区风格，红色的砖墙与街区独特的铁艺灯影、山花坡顶、八角飘窗、咖啡街角、被艺术化的景观小品，组合而成一幅文艺和奢雅的生活画卷，从而传递着一种不经意的浪漫情怀，给予人们的是内心最放松的惬意与自在。</span><span style="color: rgb(51, 51, 51); font-family: arial, 宋体, sans-serif; text-indent: 28px;"><br></span><span style="color: rgb(51, 51, 51); font-family: arial, 宋体, sans-serif; text-indent: 28px;"><br></span><br></p>'),
(8, 8, '<p><span style="color: rgb(51, 51, 51); font-family: arial, 宋体, sans-serif; text-indent: 28px;">&nbsp; &nbsp; &nbsp; &nbsp; 中小学：陕西师范大学锦园国际学校附中、附小、大明宫小学等。</span><br style="color: rgb(51, 51, 51); font-family: arial, 宋体, sans-serif; text-indent: 28px;"><span style="color: rgb(51, 51, 51); font-family: arial, 宋体, sans-serif; text-indent: 28px;">　　综合商场：万达、</span><a target="_blank" href="https://baike.baidu.com/item/%E5%A4%A7%E6%98%8E%E5%AE%AB%E4%B8%AD%E5%A4%AE%E5%B9%BF%E5%9C%BA" style="color: rgb(19, 110, 194); text-decoration: none; font-family: arial, 宋体, sans-serif; font-weight: 400; text-indent: 28px; background-color: rgb(255, 255, 255);">大明宫中央广场</a><span style="color: rgb(51, 51, 51); font-family: arial, 宋体, sans-serif; text-indent: 28px;">、四海唐人街、崇尚百货；</span><br style="color: rgb(51, 51, 51); font-family: arial, 宋体, sans-serif; text-indent: 28px;"><span style="color: rgb(51, 51, 51); font-family: arial, 宋体, sans-serif; text-indent: 28px;">　　医院：西京医院、唐城医院、凤城医院、长安医院等。</span><br style="color: rgb(51, 51, 51); font-family: arial, 宋体, sans-serif; text-indent: 28px;"><span style="color: rgb(51, 51, 51); font-family: arial, 宋体, sans-serif; text-indent: 28px;">　　小区内部配套：1.4万平美式商业街区。</span><br></p>'),
(9, 9, '<p>fdsafdsafdsafdsafdsa<img src="/fang/public/uploads/20190705/未标题-1.png" style=""></p>'),
(10, 10, '<p>fdsafsdafdsfdsafdas</p>');

-- --------------------------------------------------------

--
-- 表的结构 `memberinfo`
--

CREATE TABLE IF NOT EXISTS `memberinfo` (
  `memberid` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '内部管理成员ID 唯一',
  `account` char(10) NOT NULL COMMENT '内部成员数字帐号，唯一',
  `username` char(20) NOT NULL COMMENT '内部成员帐号，唯一',
  `email` char(100) NOT NULL COMMENT '内部成员邮箱地址',
  `password` char(255) NOT NULL COMMENT 'password_hash方式生成的密码(password_hash("123456", PASSWORD_BCRYPT, $options)',
  `sex` tinyint(3) unsigned NOT NULL COMMENT '内部成员性别，1=男，0=女',
  `mobile` char(11) NOT NULL COMMENT '内部成员的联系电话',
  `avatars` varchar(255) DEFAULT NULL COMMENT '用户头像的路径',
  `created_at` int(10) unsigned NOT NULL COMMENT '创建的UNIX时间戳',
  `status` tinyint(3) unsigned NOT NULL DEFAULT '1' COMMENT '内部成员状态1=可用，0=禁用',
  `character` varchar(255) NOT NULL COMMENT '角色id',
  PRIMARY KEY (`memberid`),
  UNIQUE KEY `account` (`account`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `mobile` (`mobile`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COMMENT='权限信息表' AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `memberinfo`
--

INSERT INTO `memberinfo` (`memberid`, `account`, `username`, `email`, `password`, `sex`, `mobile`, `avatars`, `created_at`, `status`, `character`) VALUES
(1, 'admin', '李定涛', '743678969@qq.com', '$2y$10$.xJZJxRVtcc0dj4/tqVPdOoJjALzAf9Z25XvkbGzlv0y2kep.Damq', 1, '18709106737', NULL, 0, 1, '0'),
(2, '01001', '炳千丹', '743678969@qq.com', '$2y$10$TCggsZ8iZTfIXjbLd3Kz4eFh3T2YmC9q20Ju0wqa.6yjqbzR9NSfG', 2, '15619548291', NULL, 1562038710, 1, '2'),
(3, '01003', '赵庆', '79846@qq.com', '$2y$10$2vqH9rMVeHV8UpfAWEh1Tes3.whEp3DSfLQsRtYj3lsHJtJgaGCw2', 1, '15649268841', NULL, 1562212038, 1, '4');

-- --------------------------------------------------------

--
-- 表的结构 `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=9 ;

--
-- 转存表中的数据 `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_07_01_070220_create_memberinfo_table', 1),
(2, '2019_07_02_072959_create_perm_table', 2),
(3, '2019_07_02_081801_create_perm_table', 3),
(4, '2019_07_03_015023_create_cha_table', 4),
(5, '2019_07_03_021501_create_perm_table', 5),
(6, '2019_07_04_064519_create_tnews_table', 6),
(7, '2019_07_04_070527_create_cnews_table', 7),
(8, '2019_07_04_071202_create_tnews_table', 8);

-- --------------------------------------------------------

--
-- 表的结构 `perm`
--

CREATE TABLE IF NOT EXISTS `perm` (
  `perid` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '权限自增id',
  `pername` char(15) NOT NULL COMMENT '权限名称',
  `perurl` char(30) NOT NULL COMMENT '权限路径',
  `created_at` int(10) unsigned NOT NULL COMMENT '创建的UNIX时间戳',
  `status` tinyint(3) unsigned NOT NULL DEFAULT '1' COMMENT '内部成员状态1=可用，0=禁用',
  `p_icon` varchar(30) DEFAULT NULL COMMENT '菜单图标',
  `p_superior` varchar(30) DEFAULT NULL COMMENT '上级菜单id',
  PRIMARY KEY (`perid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=15 ;

--
-- 转存表中的数据 `perm`
--

INSERT INTO `perm` (`perid`, `pername`, `perurl`, `created_at`, `status`, `p_icon`, `p_superior`) VALUES
(2, '系统设置', '#', 1562123188, 1, 'fa fa-tv', '顶级菜单'),
(3, '用户管理', 'memberinfo', 1562123588, 1, 'fa fa-user', '2'),
(4, '菜单管理', 'permission', 1562123610, 1, 'fa fa-diamond', '2'),
(5, '角色管理', 'character', 1562126660, 1, 'fa fa-link', '2'),
(6, '网站管理', '#', 1562314602, 1, 'fa fa-windows', '顶级菜单'),
(7, '项目简介', 'project', 1562140600, 1, 'fa fa-sun-o', '6'),
(8, '区域配套', 'package', 1562291478, 1, 'fa fa-life-buoy', '6'),
(9, '户型介绍', 'Introduction', 1562297269, 1, 'fa fa-link', '6');

-- --------------------------------------------------------

--
-- 表的结构 `tnews`
--

CREATE TABLE IF NOT EXISTS `tnews` (
  `nid` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '自增id',
  `n_title` varchar(50) NOT NULL COMMENT '标题',
  `n_img` varchar(150) DEFAULT NULL COMMENT '缩略图',
  `created_up` int(10) unsigned DEFAULT NULL COMMENT '修改时间',
  `created_at` int(10) unsigned NOT NULL COMMENT '添加时间',
  `n_admin_at` varchar(20) NOT NULL COMMENT '添加人账号',
  `n_column` int(11) DEFAULT NULL COMMENT '类型id',
  `n_type` int(11) NOT NULL COMMENT '类型id',
  PRIMARY KEY (`nid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COMMENT='新闻标题表' AUTO_INCREMENT=11 ;

--
-- 转存表中的数据 `tnews`
--

INSERT INTO `tnews` (`nid`, `n_title`, `n_img`, `created_up`, `created_at`, `n_admin_at`, `n_column`, `n_type`) VALUES
(5, '金域名城项目简介', '/fang/public/uploads/20190705/jin.jpg', 1562310572, 1562291213, 'admin', NULL, 1),
(8, '金域名城区域配套', '/fang/public/uploads/20190705/jin.jpg', 1562310333, 1562295798, 'admin', NULL, 2),
(9, 'fdsafdsafdsa', '/fang/public/uploads/20190705/未标题-1.png', NULL, 1562314863, 'admin', NULL, 1),
(10, 'ffffffff', '/fang/public/uploads/20190705/1.png', NULL, 1562314894, 'admin', NULL, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
