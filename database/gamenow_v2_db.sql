-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 08, 2021 at 04:25 AM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `gamenow_v2_db`
--
CREATE DATABASE IF NOT EXISTS `gamenow_v2_db` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `gamenow_v2_db`;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ci_sessions`
--

CREATE TABLE IF NOT EXISTS `tbl_ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(16) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_ci_sessions`
--

INSERT INTO `tbl_ci_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('557557ebf2b2ae3298f1f7bd52d46fb5', '0.0.0.0', 'Mozilla/5.0 (Windows NT 6.2; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36', 1531463359, '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_login`
--

CREATE TABLE IF NOT EXISTS `tbl_login` (
  `user_id` bigint(8) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(30) NOT NULL,
  `email` varchar(100) NOT NULL,
  `user_status` tinyint(11) NOT NULL DEFAULT '1' COMMENT '1=active    2=inactive',
  `user_type` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1=Admin   2=User',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_login`
--

INSERT INTO `tbl_login` (`user_id`, `name`, `username`, `password`, `email`, `user_status`, `user_type`) VALUES
(1, 'Gamenow', 'admin', 'admin', 'admin@gmail.com', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_partners`
--

CREATE TABLE IF NOT EXISTS `tbl_partners` (
  `partner_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `partner_name` varchar(255) NOT NULL,
  `partner_email` varchar(255) NOT NULL,
  `partner_username` varchar(255) NOT NULL,
  `partner_password` varchar(255) NOT NULL,
  `partner_website` text,
  `partner_status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1=Active  2=Deleted',
  `partner_last_login` varchar(100) DEFAULT NULL,
  `partner_added_on` varchar(100) NOT NULL,
  `partner_updated_on` varchar(100) NOT NULL,
  PRIMARY KEY (`partner_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_partners`
--

INSERT INTO `tbl_partners` (`partner_id`, `partner_name`, `partner_email`, `partner_username`, `partner_password`, `partner_website`, `partner_status`, `partner_last_login`, `partner_added_on`, `partner_updated_on`) VALUES
(1, 'Bemobi', 'test@gmail.com', 'bemobi_jazz', '$2y$10$4Xuyo9q9W5Pj.RMCk.Jyzerlw6iVYPWmvjvvYlKPJOM5QPrAKBrZ2', '', 1, NULL, '1630590269', '1630590269'),
(2, 'iGPL', 'vaish.nisha73@gmail.com', 'user_igpl', '$2y$10$GaOEgWrc0A6WAGe7R1Va2.Tir4JDPUhLfXY2SOKb6.BMglnL0qISa', '', 1, NULL, '1631348687', '1631348687');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_partners_games`
--

CREATE TABLE IF NOT EXISTS `tbl_partners_games` (
  `game_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `game_partner_id` bigint(20) NOT NULL,
  `game_name` varchar(255) NOT NULL,
  `game_category` varchar(255) DEFAULT NULL,
  `game_genre` varchar(255) DEFAULT NULL,
  `game_desc` text,
  `game_tips` text,
  `game_how_to_play` text,
  `game_play_link` text NOT NULL,
  `game_apk_link` text,
  `game_thumbnail` text NOT NULL,
  `game_top_banner` tinyint(4) NOT NULL DEFAULT '0',
  `game_page_banner` tinyint(4) NOT NULL DEFAULT '0',
  `game_popular` tinyint(4) NOT NULL DEFAULT '1',
  `game_mini_games` tinyint(4) NOT NULL DEFAULT '0',
  `game_top_chart` tinyint(4) NOT NULL DEFAULT '0',
  `game_tournament` tinyint(4) NOT NULL DEFAULT '0',
  `game_most_played` tinyint(4) NOT NULL DEFAULT '0',
  `game_free_to_play` tinyint(4) NOT NULL DEFAULT '0',
  `game_status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0=AddedOnly 1=Approved  2=Published  3=Reject  4=Inactive',
  `game_added_on` varchar(100) NOT NULL,
  `game_updated_on` varchar(100) NOT NULL,
  PRIMARY KEY (`game_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `tbl_partners_games`
--

INSERT INTO `tbl_partners_games` (`game_id`, `game_partner_id`, `game_name`, `game_category`, `game_genre`, `game_desc`, `game_tips`, `game_how_to_play`, `game_play_link`, `game_apk_link`, `game_thumbnail`, `game_top_banner`, `game_page_banner`, `game_popular`, `game_mini_games`, `game_top_chart`, `game_tournament`, `game_most_played`, `game_free_to_play`, `game_status`, `game_added_on`, `game_updated_on`) VALUES
(1, 1, 'Cut the Rope 2\n', 'Arcade', 'Arcade', '', '', '', 'http://apps.gamenow.com.pk/?utm_source=gamenow&utm_campaign=cut_the_rope2\n', '', '', 1, 0, 1, 1, 1, 1, 1, 1, 2, '1630590351', '1630590351'),
(2, 1, 'Subway Surfers\n', 'Arcade', 'Arcade', '', '', '', 'http://apps.gamenow.com.pk/?utm_source=gamenow&utm_campaign=subway_surfers\n', '', '', 0, 1, 1, 1, 1, 1, 1, 1, 2, '1630592303', '1630592303'),
(3, 1, 'Talking Tom Gold Run', 'Arcade', 'Arcade', '', '', '', 'http://apps.gamenow.com.pk/?utm_source=gamenow&utm_campaign=tom', '', '', 0, 1, 1, 1, 1, 1, 1, 1, 2, '1630657766', '1630657766'),
(4, 1, 'Hitman: Sniper', 'Arcade', 'Arcade', '', '', '', 'http://apps.gamenow.com.pk/?utm_source=gamenow&utm_campaign=hitman', '', '', 0, 1, 1, 1, 1, 1, 1, 1, 2, '1630657793', '1630657793'),
(5, 1, 'Dead Cellc', 'Arcade', 'Arcade', '', '', '', 'http://apps.gamenow.com.pk/?utm_source=gamenow&utm_campaign=dead_cellc', '', '', 1, 0, 1, 1, 1, 1, 1, 1, 2, '1630657823', '1630657823'),
(6, 2, 'Knife Ninja', 'Arcade', 'Arcade', '', '', '', 'https://business.igpl.pro/sandbox-d2c/knife-ninja/', '', '', 1, 0, 1, 1, 1, 1, 1, 1, 2, '1631348729', '1631348729'),
(7, 2, 'Color Switch', 'Arcade', 'Arcade', '', '', '', 'https://business.igpl.pro/sandbox-d2c/color-switch/', '', '', 0, 1, 1, 1, 1, 1, 1, 1, 2, '1632846787', '1632846787'),
(8, 2, 'Chase Racing Car', 'Arcade', 'Arcade', '', '', '', 'https://business.igpl.pro/sandbox-d2c/chase-racing-car/', '', '', 1, 0, 1, 1, 1, 1, 1, 1, 2, '1632847096', '1632847096'),
(9, 2, 'Leaves Boy', 'Arcade', 'Arcade', '', '', '', 'https://business.igpl.pro/sandbox-d2c/leaves-boy-v1/', '', '', 1, 0, 1, 1, 1, 1, 1, 1, 2, '1632847583', '1632847583');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_partners_games_images`
--

CREATE TABLE IF NOT EXISTS `tbl_partners_games_images` (
  `img_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `img_game_id` bigint(20) NOT NULL,
  `img_type` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1=HeroBanner  2=PageBanner  3=LargThumb  4=MediumThumb  5=SmallThumb 6=HorizontalThumb  7=VerticleThumb   ',
  `img_link` text,
  `img_gif_link` text,
  `img_status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0=UploadOnly   1=Approved  3=Rejected',
  `img_added_on` varchar(100) NOT NULL,
  `img_updated_on` varchar(100) NOT NULL,
  PRIMARY KEY (`img_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=64 ;

--
-- Dumping data for table `tbl_partners_games_images`
--

INSERT INTO `tbl_partners_games_images` (`img_id`, `img_game_id`, `img_type`, `img_link`, `img_gif_link`, `img_status`, `img_added_on`, `img_updated_on`) VALUES
(1, 1, 1, 'd00a2301b517fc4fb8a393814881777f.jpg', 'd8b5c0f375b0c3e145e72beeb661d0ad.gif', 1, '1630672930', '1630672935'),
(2, 1, 2, 'c347fd308ab8e1086a994a527c3c6eb4.jpg', '41335ee26bfdc11784810bd12a6a35a0.gif', 1, '1630673001', '1630673004'),
(3, 1, 3, 'c556ab7debb8e050462391f82535f555.jpg', 'c708c58572e2af3020e60872352416fc.gif', 1, '1630673011', '1630673017'),
(4, 1, 4, 'b63036d84ce60d9679f0a37d5924a188.jpg', 'dcfd4f74e9f265c4ac1984af12e4e458.gif', 1, '1630673021', '1630673028'),
(5, 1, 5, '80d8330df6a8cab7bfd0863aee223789.jpg', '65c7e8c2d390891a776499855a0f9d5f.gif', 1, '1630673047', '1630673050'),
(6, 1, 6, 'e5f284fc52c4c9b1d7c412c1f546fa21.jpg', '81aaa9e51afd6b6b5adee4d108796c8b.gif', 1, '1630673059', '1630673062'),
(7, 1, 7, '267ceaa0b1162f0e89743fbb1005fb15.jpg', 'a1a9cda9750b9d7641efbcbe0f06e3a1.gif', 1, '1630673069', '1630673071'),
(8, 2, 1, '2e94638e6308fed373fe3c5ca9fb9656.jpg', 'ad0903e1de5de8afe249653d190ef971.gif', 1, '1630673099', '1630673103'),
(9, 2, 2, 'c3a4bfbc9b7947f54e7548019a3e8447.jpg', '82389233cdc32f943ba7302c3b4819a6.gif', 1, '1630673119', '1630673121'),
(10, 2, 3, 'ab297650550309f69d95fa618a88d12d.jpg', '5f4ddefb49931eca8558b74901b04e4b.gif', 1, '1630673124', '1630673131'),
(11, 2, 4, '9f3b4b42c32058d193fe1a1ecda5e4ba.jpg', '126158ade7f1c5dc014cca43319aabe0.gif', 1, '1630673135', '1630673150'),
(12, 2, 5, '96e46fb4a8ecdf059cc16594ec4bc532.jpg', 'a88aa7f929c61df7ec2d8101aa7e0abd.gif', 1, '1630673157', '1630673160'),
(13, 2, 6, 'e3d61e0120e8e49337bd17695c0a72de.jpg', 'a6b5de7efcf758b918d5571d3d53dd4c.gif', 1, '1630673168', '1630673172'),
(14, 2, 7, '8c6dfc80d39fa35e901424e20fa33bbc.jpg', '76e8f2774ae00945b8093563902aeee7.gif', 1, '1630673175', '1630673179'),
(15, 3, 1, '47b7ab38a5c07026bbe3fb32123ee3ec.jpg', 'd7997b1944340edbbee980c419fe3693.gif', 1, '1630673208', '1630673216'),
(16, 3, 2, '8e7ce5bb2019a54a9d2474ec0947fa09.jpg', '362666a5cda1f0fbc46e32a46ac37b27.gif', 1, '1630673223', '1630673225'),
(17, 3, 3, 'f6f4229d4bc4615ebb4da2ff37d84f9c.jpg', '99ac9a6ef7e130c496fc36edbfe4066d.gif', 1, '1630673258', '1630673261'),
(18, 3, 4, '9d7971482bf8b4df87e76770b13a226c.jpg', 'f720102ae7e48f9109a84852a944b1b9.gif', 1, '1630673268', '1630673271'),
(19, 3, 5, '8bbb011683619515818b9ff84d70450f.jpg', 'b3c45c4722298166d837e1bca72f1466.gif', 1, '1630673274', '1630673281'),
(20, 3, 6, '462a39c5757dab15b4f65f537bf2f63c.jpg', '44297b249d0d4c5145dbfd48c54efe7c.gif', 1, '1630673291', '1630673294'),
(21, 3, 7, '8466d5cef11163609906f5730cb3d05d.jpg', 'fa8bd56aec591a443032978408420264.gif', 1, '1630673297', '1630673301'),
(22, 4, 1, '8008c87cc484ea126f21ba9d7015708c.jpg', '2eda5f2e88b52e39ad9889adc82c65ad.gif', 1, '1630673358', '1630673364'),
(23, 4, 2, '9bb4b13bbc2c1724857bb98c360647db.jpg', 'edde58c20969517530a665caf7b93a5d.gif', 1, '1630673369', '1630673371'),
(24, 4, 3, '1b281de8f3fc173760ecb33f31b056df.jpg', 'cb453c2940807741823a2746f8e01003.gif', 1, '1630673377', '1630673379'),
(25, 4, 4, '86cb23d564e6a04cfec434cd430e129e.jpg', '83bb18779653a4e5e1c9b4b73a30a3f1.gif', 1, '1630673382', '1630673384'),
(26, 4, 5, '28f6ca06fb0a05e10532fd09d2516954.jpg', '96f067921fdb357b389b6b0f2ba2234d.gif', 1, '1630673388', '1630673391'),
(27, 4, 6, 'f69a95e3471209dd956b74286a7b6bde.jpg', 'c6db7fc8c68c645012ebf584b140426d.gif', 1, '1630673396', '1630673403'),
(28, 4, 7, '41d3a68b0f6518212595128acfdd4d99.jpg', 'ab367588f51ef582b10e5ab23f8b62f3.gif', 1, '1630673414', '1630673416'),
(29, 5, 1, '6c5ede477599cc6c5d3a4d1448f75447.jpg', 'ad7065522387429d04b511b0da6d8b5e.gif', 1, '1630673436', '1630673438'),
(30, 5, 2, '4e13fdceddae12e04c471bfbb6075703.jpg', '5dfae909ddbb597983ceda7f86498af6.gif', 1, '1630673458', '1630673461'),
(31, 5, 3, '060a77299a048da56ebe250bdcc549f8.jpg', '5d496885df29aab2dc31c040216b1ade.gif', 1, '1630673468', '1630673470'),
(32, 5, 4, '42d5112eba64eb0fdf40a853c953d706.jpg', '08caa9384ba94f8c2d2b44ed46bafd6f.gif', 1, '1630673474', '1630673476'),
(33, 5, 5, 'e4a8a1b526681b043ee73ab92a671e62.jpg', '239cd17e491636e3c3b2e224c535cd51.gif', 1, '1630673479', '1630673481'),
(34, 5, 6, '2e076bbcfc32160311da9990dd442832.jpg', '67d35d6e3b0ac9bc0e909370dc5ac9d2.gif', 1, '1630673487', '1630673490'),
(35, 5, 7, '689115b3bf9bb1209d1381a4e3892b26.jpg', 'd1c81246bb5dd02e2afb643699977a72.gif', 1, '1630673499', '1630673502'),
(36, 6, 1, 'e651d4bea812f627f2882f54755ba83b.jpg', '7f655566fb4ffb7ef41008740e5e2399.gif', 1, '1632846295', '1632846303'),
(37, 6, 2, 'a647a3b3cd317840e0e1e0a75628f17b.jpg', 'c66bae6566ce2032dbc80adea45fc0db.gif', 1, '1632846318', '1632846328'),
(38, 6, 3, 'f23bfeb20b9076fd4e79896ae9f34ff8.jpg', 'ed8f6ee0e68d3c2308b88f6feee66489.gif', 1, '1632846339', '1632846347'),
(39, 6, 4, 'de582d6e42124f68d7faaaec17647d6a.jpg', '685fad4bb131a513236e8f552c2c6b87.gif', 1, '1632846358', '1632846374'),
(40, 6, 5, 'f9222ad47ee1723c11a0aea6e2c56857.jpg', '6bb8edb51449e9ed5e62edb221291eac.gif', 1, '1632846382', '1632846387'),
(41, 6, 6, '61a40b7d2e3811f182a15e93330f94d7.jpg', '55b29c680f7936d0dc1b0931ee446012.gif', 1, '1632846394', '1632846402'),
(42, 6, 7, '0c474d32b77d079d88bafae00713c9cf.jpg', '769aba843097dbeecd196ec48411ec82.gif', 1, '1632846414', '1632846422'),
(43, 7, 7, 'a5ab3fd1261c2bbdd6c071499e49033d.jpg', '8de2be81aed4d7495972cc6cf759bebe.gif', 1, '1632846803', '1632846811'),
(44, 7, 6, '7b94af4e38c89e483b03489b5cab107b.jpg', '5607f3acd2461c1aa8f3eedcd5f84974.gif', 1, '1632846832', '1632846839'),
(45, 7, 5, '02c165605f3478704baf4dd19c5f894f.jpg', 'd663c3ea7e2131771c8beb8ee3879148.gif', 1, '1632846850', '1632846859'),
(46, 7, 4, 'fa7d5d0ad5b5055360d3f9e4e7bd597f.jpg', 'b13f79ce97780d19e821658e551eaf50.gif', 1, '1632846870', '1632846877'),
(47, 7, 3, '2d9640cbbab4e20e2d3a96bd305e58b3.jpg', 'f97d1e9cd8854ef53953e898bab8ae57.gif', 1, '1632846885', '1632846895'),
(48, 7, 2, 'a3af342642acc288216da46081df0ebc.jpg', '8823203e72d2cc399f266308df53fb11.gif', 1, '1632846904', '1632846913'),
(49, 7, 1, '1d62157f68cc10fc7fa5000594beedaf.jpg', '3d1911e16e2268310db2d0f046bfd2c5.gif', 1, '1632846921', '1632846930'),
(50, 8, 1, 'a4cdb8867c257e83df5a9d065aa024c1.jpg', '732df8d5eade9fa57ea7d080f75e2724.gif', 1, '1632847105', '1632847113'),
(51, 8, 2, '21cece151b746f021a934e356240c059.jpg', '59fde59c479eaafe0e54357f22893217.gif', 1, '1632847123', '1632847131'),
(52, 8, 3, 'f85df813e0fe7e661ade569e158d4c69.jpg', 'd80fb95eedfabd43f26fcedff5d99104.gif', 1, '1632847140', '1632847149'),
(53, 8, 4, '61a5445d962e2cfe78871a57f81dc1ba.jpg', 'd0102bbc38cdeda39619e10cfe7cecbb.gif', 1, '1632847159', '1632847164'),
(54, 8, 5, 'bca6bb13b30b6d94d5cf2700c5c6d8e2.jpg', '04baafafbdebfadfeab25f121670b3cf.gif', 1, '1632847171', '1632847178'),
(55, 8, 6, '3eb055d0956951f2c712d2d90685a001.jpg', '0db7eb8987b96c4433100d566b8c75ae.gif', 1, '1632847187', '1632847198'),
(56, 8, 7, '9bed2ca417c23f3d95ec6e9270d0028d.jpg', '6fcbc3544aa8270383844f4425bd3feb.gif', 1, '1632847208', '1632847215'),
(57, 9, 1, 'c0f1f70ab618c74aafc5de30c4d07395.jpg', 'fa82b1e24be20ed11f81cdff9ab0bb88.gif', 1, '1632847611', '1632847617'),
(58, 9, 2, 'eccd9b674669d3d123294cc931c8eaa4.jpg', '14c95ef49d2389a66bfd6016a6c9b954.gif', 1, '1632847625', '1632847631'),
(59, 9, 3, '0af0833b14524ddc7d42f69d0794efd2.jpg', '672a824439caae5ed197a61b662396cd.gif', 1, '1632847640', '1632847646'),
(60, 9, 4, 'd24b5aa06a51f8aa62c3c3e346f2bf10.jpg', 'e4b1ef51cd72f769db8d69bb6e5dcb81.gif', 1, '1632847654', '1632847659'),
(61, 9, 5, 'afd98d7ac250f6266cdd324832a9b88b.jpg', '94bc91321fd65457fa2d96be1ce26ae4.gif', 1, '1632847663', '1632847670'),
(62, 9, 6, 'c6399d2050ff6fad6ccfcf72ae83eb19.jpg', '7dc2759885471f6a5b9203e14a1b32dd.gif', 1, '1632847677', '1632847682'),
(63, 9, 7, '394b099c5fef0f0c29c82bfa32d045f9.jpg', 'ed77440613b8ae6ddcad36672f7c3dae.gif', 1, '1632847691', '1632847698');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_partners_games_images_old`
--

CREATE TABLE IF NOT EXISTS `tbl_partners_games_images_old` (
  `img_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `img_game_id` bigint(20) NOT NULL,
  `img_type` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1=HeroBanner  2=HeroBannerGIF  3=PageBanner  4=PageBannerGIF  5=LargThumb  6=LargThumbGIF  7=MediumThumb  8=MediumThumbGIF  9=SmallThumb  10=SmallThumbGIF  11=VerticleThumb  12=VerticleThumbGIF   13=HorizontalThumb   14=HorizontalThumbGIF',
  `img_link` text NOT NULL,
  `img_status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0=UploadOnly   1=Approved  3=Rejected',
  `img_added_on` varchar(100) NOT NULL,
  `img_updated_on` varchar(100) NOT NULL,
  PRIMARY KEY (`img_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

--
-- Dumping data for table `tbl_partners_games_images_old`
--

INSERT INTO `tbl_partners_games_images_old` (`img_id`, `img_game_id`, `img_type`, `img_link`, `img_status`, `img_added_on`, `img_updated_on`) VALUES
(6, 1, 1, 'e13ca97ce3a54cdfebf89b3f6da70741.jpg', 1, '1630590792', '1630590792'),
(7, 1, 3, 'c69d51641e8bf2d42ce409fe32a0b973.jpg', 1, '1630590876', '1630590876'),
(8, 1, 10, '1ec6846430b4b897915d3b3f414fcdc3.gif', 1, '1630591277', '1630591277'),
(9, 1, 4, '6d3cecf52417bf9c2f3e50f1b4322d4a.gif', 1, '1630591705', '1630591705'),
(10, 1, 2, 'ad7c44db77fc28794f6738e8350ed99d.gif', 1, '1630592005', '1630592005'),
(11, 1, 5, '58f86392040c99b90a5474a8e39f9c36.jpg', 1, '1630592092', '1630592092'),
(12, 1, 6, '68c34d4f4217a04c72324f8d63df515c.gif', 1, '1630592103', '1630592103'),
(13, 1, 7, 'f6c2cf5fcafa95ab2bbe230ea7cc1c61.jpg', 1, '1630592118', '1630592118'),
(14, 1, 8, 'f50440cbf5eff05c274d7343746b711a.gif', 1, '1630592132', '1630592132'),
(15, 1, 9, '50234ce2b682fb59fb529ac370cc6cf1.jpg', 1, '1630592141', '1630592141'),
(16, 1, 11, '0dc35f864562103a679f72cf45b06108.jpg', 1, '1630592151', '1630592151'),
(17, 1, 12, '040d29e5085592c6b9d938eeae712295.gif', 1, '1630592155', '1630592155'),
(18, 2, 1, 'e08131d028e0fe4c52e7d7f8f13b25a1.jpg', 1, '1630592355', '1630592355'),
(19, 2, 2, '6d1325d258e29a4bcee5bf68abc60628.gif', 1, '1630592359', '1630592359'),
(20, 2, 3, '655679a6e25dd050fc80d60fb7d537f3.jpg', 1, '1630592371', '1630592371'),
(21, 2, 4, 'a4d37ca01e051494b136d73cdc67664c.gif', 1, '1630592375', '1630592375'),
(22, 2, 5, '613f8c09363c25662e559ed6ab0bedfe.jpg', 1, '1630592395', '1630592395'),
(23, 2, 6, '829c6be1aab96a90e06c848a08de57fd.gif', 1, '1630592398', '1630592398'),
(24, 2, 7, '29f7f35c28ffa8c7014505fef5e10ad7.jpg', 1, '1630592402', '1630592402'),
(25, 2, 8, '006be9b268d727799e14039185603cb7.gif', 1, '1630592406', '1630592406'),
(26, 2, 9, 'f2f98e8e9ff384a67cd41bf7c532c3f0.jpg', 1, '1630592421', '1630592421'),
(27, 2, 10, 'ce4925d7847299fcb024ff73ca49deec.gif', 1, '1630592424', '1630592424'),
(28, 2, 11, 'b78836c415d9555ed11cbe813d954c0d.jpg', 1, '1630592428', '1630592428'),
(29, 2, 12, '0010025d25ec518957e2297d5b35c15e.gif', 1, '1630592440', '1630592440'),
(30, 2, 13, 'f44b780209f319307891b9fb3dde1291.jpg', 1, '1630592764', '1630592764'),
(31, 2, 14, '040ea52544e3b83ec8cc60bebc1727f5.gif', 1, '1630592772', '1630592772'),
(32, 1, 13, '5e286e2a0eb5a4bb8cbc79f7bc6fa738.jpg', 1, '1630592797', '1630592797'),
(33, 1, 14, '443def568c379209e1a62818687dc170.gif', 1, '1630592806', '1630592806');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE IF NOT EXISTS `tbl_users` (
  `user_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) DEFAULT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_phone` bigint(20) DEFAULT NULL,
  `user_img` text,
  `user_otp` int(11) DEFAULT NULL,
  `user_ip` text,
  `user_last_login` varchar(255) NOT NULL,
  `user_login_type` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1=manual,  2=FB  3=Google',
  `user_id_token` text COMMENT 'used for FB and Google login only',
  `user_status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '0=OTPSent  1=Active  2=Deleted',
  `user_registered_on` varchar(50) NOT NULL,
  `user_last_updated` varchar(50) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`user_id`, `user_name`, `user_email`, `user_phone`, `user_img`, `user_otp`, `user_ip`, `user_last_login`, `user_login_type`, `user_id_token`, `user_status`, `user_registered_on`, `user_last_updated`) VALUES
(1, NULL, '', 9729081679, 'http://localhost/Gamenow-V2/uploads/site_users/1.png', 766086, '::1', '2021-09-14 22:40:44', 1, NULL, 0, '1631598649', '1631639444'),
(2, NULL, '', 8729081679, 'http://localhost/Gamenow-V2/uploads/site_users/8.png', 157714, '::1', '2021-09-14 22:44:54', 1, NULL, 1, '1631639694', '1631639694');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_avatar`
--

CREATE TABLE IF NOT EXISTS `tbl_user_avatar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `img` varchar(100) NOT NULL,
  `type` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1=Male   2=Female',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `tbl_user_avatar`
--

INSERT INTO `tbl_user_avatar` (`id`, `img`, `type`) VALUES
(1, '1.png', 1),
(2, '2.png', 1),
(3, '3.png', 1),
(4, '4.png', 1),
(5, '5.png', 1),
(6, '6.png', 1),
(7, '7.png', 1),
(8, '8.png', 1),
(9, '9.png', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
