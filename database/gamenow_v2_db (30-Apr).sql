

CREATE TABLE `tbl_ads` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ad_text_main` varchar(255) DEFAULT NULL,
  `ad_text_mini` varchar(255) DEFAULT NULL,
  `ad_btn_text` varchar(255) DEFAULT NULL,
  `ad_link` text,
  `ad_action_text` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0=Inactive,1=Active',
  `added_on` timestamp NULL DEFAULT NULL,
  `updated_on` timestamp NULL DEFAULT NULL,
  `subscription_coins` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;


INSERT INTO tbl_ads VALUES
("1","Win Rs 50,000 Daraz Shopping Coupons ","Try 1 Day FREE & No Internet Charges ","Play Now ","https://business.igpl.pro/","GameNow Premier League (GPL) ","1","2022-02-08 18:15:13","0000-00-00 00:00:00","20"),
("2","Games Club ","1 day FREE trial ","Play Now ","https://business.igpl.pro/"," ","1","2022-02-08 18:15:13","0000-00-00 00:00:00","20"),
("3","Game World  ","1 day free trial  ","Play Now  ","https://business.igpl.pro/","  ","1","2022-02-08 18:15:13","0000-00-00 00:00:00","10"),
("4","Lystn ","Unlimited podcasts and radio ","Try Now! ","https://business.igpl.pro/"," ","1","2022-02-08 18:15:13","0000-00-00 00:00:00","100"),
("5","Magical English ","Powered By Disney ","Try Now! ","https://business.igpl.pro/","Free Trial ","1","2022-02-08 18:15:13","0000-00-00 00:00:00","100"),
("6","JAZZ GAME ZONE ","No ads, no in-app purchases, try 1 day free ","Play Now ","https://business.igpl.pro/"," ","1","2022-02-08 18:15:13","0000-00-00 00:00:00","20");




CREATE TABLE `tbl_ads_images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ad_id` int(11) NOT NULL,
  `img_type` tinyint(4) DEFAULT NULL COMMENT '1: Hero banner, 2: Vertical banner',
  `img_link` varchar(255) DEFAULT NULL,
  `img_gif` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;


INSERT INTO tbl_ads_images VALUES
("1","1","1","ad1.webp","","2022-02-10 13:36:33","2022-02-11 12:35:25"),
("2","2","1","ad2.webp","","2022-02-10 13:38:16","2022-02-11 12:35:25"),
("3","3","1","ad3.webp","f66cb94e45215a2a35c7cca61ac4d486.gif","2022-02-10 13:38:30","2022-02-12 12:06:53"),
("4","4","1","ad4.webp","","2022-02-10 13:38:54","2022-02-11 12:35:25"),
("5","5","1","ad5.webp","","2022-02-10 13:38:54","2022-02-11 12:35:25"),
("6","6","1","ad6.webp","","2022-02-10 13:38:54","2022-02-11 12:35:25");




CREATE TABLE `tbl_ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(16) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


INSERT INTO tbl_ci_sessions VALUES
("557557ebf2b2ae3298f1f7bd52d46fb5","0.0.0.0","Mozilla/5.0 (Windows NT 6.2; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36","1531463359","");




CREATE TABLE `tbl_live_feed_data` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `feed_count` bigint(20) NOT NULL,
  `last_updated` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;


INSERT INTO tbl_live_feed_data VALUES
("1","11838","2022-03-28 11:25:42");




CREATE TABLE `tbl_login` (
  `user_id` bigint(8) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(30) NOT NULL,
  `email` varchar(100) NOT NULL,
  `user_status` tinyint(11) NOT NULL DEFAULT '1' COMMENT '1=active    2=inactive',
  `user_type` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1=Admin   2=User',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;


INSERT INTO tbl_login VALUES
("1","Gamenow","admin","admin","admin@gmail.com","1","1");




CREATE TABLE `tbl_partners` (
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;


INSERT INTO tbl_partners VALUES
("1","Bemobi","test@gmail.com","bemobi_jazz","$2y$10$4Xuyo9q9W5Pj.RMCk.Jyzerlw6iVYPWmvjvvYlKPJOM5QPrAKBrZ2","","1","","1630590269","1630590269"),
("2","iGPL","vaish.nisha73@gmail.com","user_igpl","$2y$10$GaOEgWrc0A6WAGe7R1Va2.Tir4JDPUhLfXY2SOKb6.BMglnL0qISa","","1","","1631348687","1631348687"),
("3","Gameloft","test2@gmail.com","gameloft","$2y$10$.5RnZiaJazULjV2ZzUnbK.ipCWEX4Tq9nAwSCtqaVLMcwMN6IgFhu","","1","","1633671109","1633687987");




CREATE TABLE `tbl_partners_games` (
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
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;


INSERT INTO tbl_partners_games VALUES
("1","1","Cut the Rope 2","Arcade","Arcade","","","","http://apps.gamenow.com.pk/?utm_source=gamenow&utm_campaign=cut_the_rope2","","","0","1","0","1","1","1","1","1","2","1630590351","1637841879"),
("2","1","Subway Surfers","Arcade","Arcade","","","","http://apps.gamenow.com.pk/?utm_source=gamenow&utm_campaign=subway_surfers","","","0","0","1","1","1","1","1","1","2","1630592303","1637839597"),
("3","1","Talking Tom Gold Run","Arcade","Arcade","","","","http://apps.gamenow.com.pk/?utm_source=gamenow&utm_campaign=tom","","","0","0","1","1","1","1","1","1","2","1630657766","1637840351"),
("4","1","Hitman: Sniper","Arcade","Arcade","","","","http://apps.gamenow.com.pk/?utm_source=gamenow&utm_campaign=hitman","","","0","0","0","1","1","0","0","1","2","1630657793","1635496469"),
("5","1","Dead Cellc","Arcade","Arcade","","","","http://apps.gamenow.com.pk/?utm_source=gamenow&utm_campaign=dead_cellc","","","0","0","0","1","1","0","1","1","2","1630657823","1637840564"),
("6","2","Knife Ninja","Arcade","Arcade","","","","https://business.igpl.pro/sandbox-d2c/knife-ninja/","","","0","0","1","1","1","1","1","1","2","1631348729","1637841893"),
("7","2","Color Switch","Arcade","Arcade","","","","https://business.igpl.pro/sandbox-d2c/color-switch/","","","0","0","0","1","1","1","1","1","2","1632846787","1637839651"),
("8","2","Chase Racing Car","Arcade","Arcade","","","","https://business.igpl.pro/sandbox-d2c/chase-racing-car/","","","0","0","0","1","1","1","1","1","2","1632847096","1637839658"),
("9","2","Leaves Boy","Arcade","Arcade","","","","https://business.igpl.pro/sandbox-d2c/leaves-boy-v1/","","","0","0","0","1","1","1","1","1","2","1632847583","1637840072"),
("14","3","Asphalt Nitro 2","Action","Action","","","","https://gameloft.gamenow.com.pk/product.php?adid=436222&product=4164","","","1","0","0","1","1","0","0","1","2","1633678697","1637839047"),
("16","3","Bridge Constructor: The Walking Dead","Puzzle","Puzzle","","","","https://gameloft.gamenow.com.pk/product.php?adid=436222&product=5497","","","0","0","0","1","1","0","0","1","2","1633684328","1637841864"),
("17","3","Sniper fury","Action","Action","","","","https://gameloft.gamenow.com.pk/product.php?adid=436222&product=4211","","","0","0","0","1","1","0","0","1","2","1633684393","1636355072"),
("18","3","Real Football 21","Sports","Sports","","","","https://gameloft.gamenow.com.pk/product.php?adid=436222&product=4407","","","0","0","0","1","1","0","0","1","2","1633684471","1636355077"),
("19","3","MELBITS WORLD","Arcade ","Arcade ","","","","https://gameloft.gamenow.com.pk/product.php?adid=436222&product=5263","","","0","0","0","1","1","0","0","1","2","1633685847","1636355081"),
("20","3","TMNT Portal power","Action","Action","","","","https://gameloft.gamenow.com.pk/product.php?adid=436222&product=4225","","","0","0","0","1","1","0","0","1","2","1633686268","1636355086"),
("21","3","Dead Cells","Action","Action","","","","https://gameloft.gamenow.com.pk/product.php?adid=436222&product=4694","","","0","0","0","1","1","0","0","1","2","1633686330","1636355093"),
("22","3","Lara Croft Go","Puzzle","Puzzle","","","","https://gameloft.gamenow.com.pk/product.php?adid=436222&product=4176","","","0","0","0","1","1","0","0","1","2","1633686388","1636355097"),
("23","3","Aces of the Luftwaffe - Squadron: Extended Edition","Arcade ","Arcade ","","","","https://gameloft.gamenow.com.pk/product.php?adid=436222&product=5542","","","0","0","0","1","1","0","0","1","2","1633686582","1636355103"),
("24","3","The Lion Guard","Entertainment","Entertainment","","","","https://gameloft.gamenow.com.pk/product.php?adid=436222&product=4364","","","0","0","0","1","1","0","0","1","2","1633688528","1636355109"),
("25","3","Rest in Pieces","Arcade","Arcade","","","","https://gameloft.gamenow.com.pk/product.php?adid=436222&product=5261","","","0","0","0","1","1","0","0","1","2","1633688863","1636355113"),
("26","3","Spirit Roots","Action","Action","","","","https://gameloft.gamenow.com.pk/product.php?adid=436222&product=5194","","","0","0","0","1","1","0","0","1","2","1633688999","1636355124"),
("27","3","Bring Me Cakes","Puzzle & Logic, Adventure, Brain","Puzzle & Logic, Adventure, Brain","","","","https://gameloft.gamenow.com.pk/product.php?adid=436222&product=4442","","","0","0","0","1","1","0","0","1","2","1633689133","1636355130"),
("28","3","DuckTales: Remastered","Action","Action","","","","https://gameloft.gamenow.com.pk/product.php?adid=436222&product=3928","","","0","0","0","1","1","0","0","1","2","1633689278","1636355135"),
("29","3","Tom and Jerry: Race & Chase","Puzzle","Puzzle","","","","https://gameloft.gamenow.com.pk/product.php?adid=436222&product=5252","","","0","0","0","1","1","0","0","1","2","1633689972","1636355140"),
("30","3","Hitman GO","Puzzle","Puzzle","","","","https://gameloft.gamenow.com.pk/product.php?adid=436222&product=4178","","","0","0","0","1","1","0","0","1","2","1633690090","1636355145"),
("31","3","Figment","Adventure","Adventure","","","","https://gameloft.gamenow.com.pk/product.php?adid=436222&product=5409","","","0","0","0","1","1","0","0","1","2","1633690195","1636355151"),
("32","3","N.O.V.A. Legacy","Games","Games","","","","https://gameloft.gamenow.com.pk/product.php?adid=436222&product=2331","","","0","0","0","1","1","0","0","1","2","1633690317","1636355160"),
("33","3","Horizon Chase - World Tour","Racing game","Arcade","","","","https://gameloft.gamenow.com.pk/product.php?adid=436222&product=4770","","","0","0","0","1","1","0","0","1","2","1634994795","1636355155");




CREATE TABLE `tbl_partners_games_images` (
  `img_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `img_game_id` bigint(20) NOT NULL,
  `img_type` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1=HeroBanner  2=PageBanner  3=LargThumb  4=MediumThumb  5=SmallThumb 6=HorizontalThumb  7=VerticleThumb   ',
  `img_link` text,
  `img_gif_link` text,
  `img_status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0=UploadOnly   1=Approved  3=Rejected',
  `img_added_on` varchar(100) NOT NULL,
  `img_updated_on` varchar(100) NOT NULL,
  PRIMARY KEY (`img_id`)
) ENGINE=InnoDB AUTO_INCREMENT=211 DEFAULT CHARSET=latin1;


INSERT INTO tbl_partners_games_images VALUES
("1","1","1","d00a2301b517fc4fb8a393814881777f.jpg","d8b5c0f375b0c3e145e72beeb661d0ad.gif","1","1630672930","1630672935"),
("2","1","2","c347fd308ab8e1086a994a527c3c6eb4.jpg","41335ee26bfdc11784810bd12a6a35a0.gif","1","1630673001","1630673004"),
("3","1","3","c556ab7debb8e050462391f82535f555.jpg","c708c58572e2af3020e60872352416fc.gif","1","1630673011","1630673017"),
("4","1","4","b63036d84ce60d9679f0a37d5924a188.jpg","dcfd4f74e9f265c4ac1984af12e4e458.gif","1","1630673021","1630673028"),
("5","1","5","80d8330df6a8cab7bfd0863aee223789.jpg","65c7e8c2d390891a776499855a0f9d5f.gif","1","1630673047","1630673050"),
("6","1","6","e5f284fc52c4c9b1d7c412c1f546fa21.jpg","81aaa9e51afd6b6b5adee4d108796c8b.gif","1","1630673059","1630673062"),
("7","1","7","267ceaa0b1162f0e89743fbb1005fb15.jpg","a1a9cda9750b9d7641efbcbe0f06e3a1.gif","1","1630673069","1630673071"),
("8","2","1","2e94638e6308fed373fe3c5ca9fb9656.jpg","ad0903e1de5de8afe249653d190ef971.gif","1","1630673099","1630673103"),
("9","2","2","c3a4bfbc9b7947f54e7548019a3e8447.jpg","82389233cdc32f943ba7302c3b4819a6.gif","1","1630673119","1630673121"),
("10","2","3","ab297650550309f69d95fa618a88d12d.jpg","5f4ddefb49931eca8558b74901b04e4b.gif","1","1630673124","1630673131"),
("11","2","4","9f3b4b42c32058d193fe1a1ecda5e4ba.jpg","126158ade7f1c5dc014cca43319aabe0.gif","1","1630673135","1630673150"),
("12","2","5","96e46fb4a8ecdf059cc16594ec4bc532.jpg","a88aa7f929c61df7ec2d8101aa7e0abd.gif","1","1630673157","1630673160"),
("13","2","6","e3d61e0120e8e49337bd17695c0a72de.jpg","a6b5de7efcf758b918d5571d3d53dd4c.gif","1","1630673168","1630673172"),
("14","2","7","8c6dfc80d39fa35e901424e20fa33bbc.jpg","76e8f2774ae00945b8093563902aeee7.gif","1","1630673175","1630673179"),
("15","3","1","47b7ab38a5c07026bbe3fb32123ee3ec.jpg","d7997b1944340edbbee980c419fe3693.gif","1","1630673208","1630673216"),
("16","3","2","8e7ce5bb2019a54a9d2474ec0947fa09.jpg","362666a5cda1f0fbc46e32a46ac37b27.gif","1","1630673223","1630673225"),
("17","3","3","f6f4229d4bc4615ebb4da2ff37d84f9c.jpg","99ac9a6ef7e130c496fc36edbfe4066d.gif","1","1630673258","1630673261"),
("18","3","4","9d7971482bf8b4df87e76770b13a226c.jpg","f720102ae7e48f9109a84852a944b1b9.gif","1","1630673268","1630673271"),
("19","3","5","8bbb011683619515818b9ff84d70450f.jpg","b3c45c4722298166d837e1bca72f1466.gif","1","1630673274","1630673281"),
("20","3","6","462a39c5757dab15b4f65f537bf2f63c.jpg","44297b249d0d4c5145dbfd48c54efe7c.gif","1","1630673291","1630673294"),
("21","3","7","8466d5cef11163609906f5730cb3d05d.jpg","fa8bd56aec591a443032978408420264.gif","1","1630673297","1630673301"),
("22","4","1","8008c87cc484ea126f21ba9d7015708c.jpg","2eda5f2e88b52e39ad9889adc82c65ad.gif","1","1630673358","1630673364"),
("23","4","2","9bb4b13bbc2c1724857bb98c360647db.jpg","edde58c20969517530a665caf7b93a5d.gif","1","1630673369","1630673371"),
("24","4","3","1b281de8f3fc173760ecb33f31b056df.jpg","cb453c2940807741823a2746f8e01003.gif","1","1630673377","1630673379"),
("25","4","4","86cb23d564e6a04cfec434cd430e129e.jpg","83bb18779653a4e5e1c9b4b73a30a3f1.gif","1","1630673382","1630673384"),
("26","4","5","28f6ca06fb0a05e10532fd09d2516954.jpg","96f067921fdb357b389b6b0f2ba2234d.gif","1","1630673388","1630673391"),
("27","4","6","f69a95e3471209dd956b74286a7b6bde.jpg","c6db7fc8c68c645012ebf584b140426d.gif","1","1630673396","1630673403"),
("28","4","7","41d3a68b0f6518212595128acfdd4d99.jpg","ab367588f51ef582b10e5ab23f8b62f3.gif","1","1630673414","1630673416"),
("29","5","1","6c5ede477599cc6c5d3a4d1448f75447.jpg","ad7065522387429d04b511b0da6d8b5e.gif","1","1630673436","1630673438"),
("30","5","2","4e13fdceddae12e04c471bfbb6075703.jpg","5dfae909ddbb597983ceda7f86498af6.gif","1","1630673458","1630673461"),
("31","5","3","060a77299a048da56ebe250bdcc549f8.jpg","5d496885df29aab2dc31c040216b1ade.gif","1","1630673468","1630673470"),
("32","5","4","42d5112eba64eb0fdf40a853c953d706.jpg","08caa9384ba94f8c2d2b44ed46bafd6f.gif","1","1630673474","1630673476"),
("33","5","5","e4a8a1b526681b043ee73ab92a671e62.jpg","239cd17e491636e3c3b2e224c535cd51.gif","1","1630673479","1630673481"),
("34","5","6","2e076bbcfc32160311da9990dd442832.jpg","67d35d6e3b0ac9bc0e909370dc5ac9d2.gif","1","1630673487","1630673490"),
("35","5","7","689115b3bf9bb1209d1381a4e3892b26.jpg","d1c81246bb5dd02e2afb643699977a72.gif","1","1630673499","1630673502"),
("36","6","1","e651d4bea812f627f2882f54755ba83b.jpg","7f655566fb4ffb7ef41008740e5e2399.gif","1","1632846295","1632846303"),
("37","6","2","a647a3b3cd317840e0e1e0a75628f17b.jpg","c66bae6566ce2032dbc80adea45fc0db.gif","1","1632846318","1632846328"),
("38","6","3","f23bfeb20b9076fd4e79896ae9f34ff8.jpg","ed8f6ee0e68d3c2308b88f6feee66489.gif","1","1632846339","1632846347"),
("39","6","4","de582d6e42124f68d7faaaec17647d6a.jpg","685fad4bb131a513236e8f552c2c6b87.gif","1","1632846358","1632846374"),
("40","6","5","f9222ad47ee1723c11a0aea6e2c56857.jpg","6bb8edb51449e9ed5e62edb221291eac.gif","1","1632846382","1632846387"),
("41","6","6","61a40b7d2e3811f182a15e93330f94d7.jpg","55b29c680f7936d0dc1b0931ee446012.gif","1","1632846394","1632846402"),
("42","6","7","0c474d32b77d079d88bafae00713c9cf.jpg","769aba843097dbeecd196ec48411ec82.gif","1","1632846414","1632846422"),
("43","7","7","a5ab3fd1261c2bbdd6c071499e49033d.jpg","8de2be81aed4d7495972cc6cf759bebe.gif","1","1632846803","1632846811"),
("44","7","6","7b94af4e38c89e483b03489b5cab107b.jpg","5607f3acd2461c1aa8f3eedcd5f84974.gif","1","1632846832","1632846839"),
("45","7","5","02c165605f3478704baf4dd19c5f894f.jpg","d663c3ea7e2131771c8beb8ee3879148.gif","1","1632846850","1632846859"),
("46","7","4","fa7d5d0ad5b5055360d3f9e4e7bd597f.jpg","b13f79ce97780d19e821658e551eaf50.gif","1","1632846870","1632846877"),
("47","7","3","2d9640cbbab4e20e2d3a96bd305e58b3.jpg","f97d1e9cd8854ef53953e898bab8ae57.gif","1","1632846885","1632846895"),
("48","7","2","a3af342642acc288216da46081df0ebc.jpg","8823203e72d2cc399f266308df53fb11.gif","1","1632846904","1632846913"),
("49","7","1","1d62157f68cc10fc7fa5000594beedaf.jpg","3d1911e16e2268310db2d0f046bfd2c5.gif","1","1632846921","1632846930"),
("50","8","1","a4cdb8867c257e83df5a9d065aa024c1.jpg","732df8d5eade9fa57ea7d080f75e2724.gif","1","1632847105","1632847113"),
("51","8","2","21cece151b746f021a934e356240c059.jpg","59fde59c479eaafe0e54357f22893217.gif","1","1632847123","1632847131"),
("52","8","3","f85df813e0fe7e661ade569e158d4c69.jpg","d80fb95eedfabd43f26fcedff5d99104.gif","1","1632847140","1632847149"),
("53","8","4","61a5445d962e2cfe78871a57f81dc1ba.jpg","d0102bbc38cdeda39619e10cfe7cecbb.gif","1","1632847159","1632847164"),
("54","8","5","bca6bb13b30b6d94d5cf2700c5c6d8e2.jpg","04baafafbdebfadfeab25f121670b3cf.gif","1","1632847171","1632847178"),
("55","8","6","3eb055d0956951f2c712d2d90685a001.jpg","0db7eb8987b96c4433100d566b8c75ae.gif","1","1632847187","1632847198"),
("56","8","7","9bed2ca417c23f3d95ec6e9270d0028d.jpg","6fcbc3544aa8270383844f4425bd3feb.gif","1","1632847208","1632847215"),
("57","9","1","c0f1f70ab618c74aafc5de30c4d07395.jpg","fa82b1e24be20ed11f81cdff9ab0bb88.gif","1","1632847611","1632847617"),
("58","9","2","eccd9b674669d3d123294cc931c8eaa4.jpg","14c95ef49d2389a66bfd6016a6c9b954.gif","1","1632847625","1632847631"),
("59","9","3","0af0833b14524ddc7d42f69d0794efd2.jpg","672a824439caae5ed197a61b662396cd.gif","1","1632847640","1632847646"),
("60","9","4","d24b5aa06a51f8aa62c3c3e346f2bf10.jpg","e4b1ef51cd72f769db8d69bb6e5dcb81.gif","1","1632847654","1632847659"),
("61","9","5","afd98d7ac250f6266cdd324832a9b88b.jpg","94bc91321fd65457fa2d96be1ce26ae4.gif","1","1632847663","1632847670"),
("62","9","6","c6399d2050ff6fad6ccfcf72ae83eb19.jpg","7dc2759885471f6a5b9203e14a1b32dd.gif","1","1632847677","1632847682"),
("63","9","7","394b099c5fef0f0c29c82bfa32d045f9.jpg","ed77440613b8ae6ddcad36672f7c3dae.gif","1","1632847691","1632847698"),
("64","11","1","475453a383afb60199b47e5ebe8b7a4e.jpg","","1","1633674026","1633674026"),
("65","11","6","29a206a6d4a7d6137b8f552327671990.jpg","","1","1633674057","1633674057"),
("66","11","5","dc9710631a45c499540d6c9be8eec362.jpg","","1","1633674073","1633674149"),
("67","11","7","9ffb7a0c5e23d0d1d04afbdcb5eec65a.jpg","","1","1633674176","1633674176"),
("68","11","2","1d1871a456eb1adf833774747ba7a2ab.jpg","","1","1633674193","1633674193"),
("69","11","3","4b975b01beeba3c4fc5158e9c3ee9a50.jpg","","1","1633674205","1633674205"),
("70","11","4","881a7eac52103c6f376db4b5345368d0.jpg","","1","1633674214","1633674214"),
("71","12","1","c18722325ad1c4283f3f618c5d067381.jpg","","1","1633674865","1633674865"),
("72","12","2","35bb069b0e68dc99618481ba479f7a07.jpg","","1","1633674871","1633674871"),
("73","12","3","52511915993347ef3e733c0e0ad98985.jpg","","1","1633674876","1633674876"),
("74","12","4","eb588918f1482d1973c0aa3bf107236b.jpg","","1","1633674880","1633674880"),
("75","12","5","1644bfb9eb667eee297be09a80af9020.jpg","","1","1633674885","1633674885"),
("76","12","6","06e2484dd4897cb8dee5783fe6de8864.jpg","","1","1633674892","1633674892"),
("77","12","7","51262b1288f49613ca22d0ffa79edc03.jpg","","1","1633674895","1633674895"),
("78","14","1","8daa8ec39fb2b1753557b3b3b298c9c8.jpg","","1","1633684093","1636352913"),
("79","14","2","a2c57f2379bc52a34d77a8e0984126db.jpg","","1","1633684098","1636352982"),
("80","14","3","39ccfb54e908f3035129a6f5b615f9ee.jpg","","1","1633684102","1636352992"),
("81","14","4","572d43d5fdca8b3bb2a27499c58ede90.jpg","","1","1633684106","1636352999"),
("82","14","5","2b8e9b254050a98fb6f54acd10499a11.jpg","","1","1633684110","1636353007"),
("83","14","6","f6c15dfebe27c1d3812e3de56fc7b932.jpg","","1","1633684114","1636353014"),
("84","14","7","8037e752aea2443ca0f427d99d69cd4b.jpg","","1","1633684117","1636353021"),
("85","17","1","70a25b15c7ccae5030875ce3ca79c68a.jpg","","1","1633686654","1636353335"),
("86","17","2","2068168ea9123e668ce6f6e3be3c24f2.jpg","","1","1633686666","1636353277"),
("87","17","3","874e4eed87a4424f9b45951441ea9542.jpg","","1","1633686672","1636353284"),
("88","17","4","751a40ca9d56c9fe0e27c45013cf67b3.jpg","","1","1633686677","1636353295"),
("89","17","5","cebcd025c9407c05f48e09bd4713eeae.jpg","","1","1633686682","1636353298"),
("90","17","6","95965a127edeb2f46ec750c653eeb3de.jpg","","1","1633686691","1636353306"),
("91","17","7","abbfd1cf2e41e76e0eae570782256283.jpg","","1","1633686694","1636353313"),
("92","18","1","bb494bce430b60ba11f2693a7dc6d46f.jpg","","1","1633686719","1636353364"),
("93","18","2","b5e169d9a306cc7d2ec20ee8336b7829.jpg","","1","1633686730","1636353374"),
("94","18","3","41e44c2706bbc1c36e8a882dca3fd075.jpg","","1","1633686735","1636353380"),
("95","18","4","9fd5472a2837f32eb1537b720084f4e1.jpg","","1","1633686742","1636353386"),
("96","18","5","c33141a39a27f0bec8f3ab84330cfaa8.jpg","","1","1633686747","1636353392"),
("97","18","6","deb4f4b4823961609df95a5a98f877c1.jpg","","1","1633686751","1636353397"),
("98","18","7","350bf9fa089fba06a429130b94cbb34f.jpg","","1","1633686759","1636353405"),
("99","19","1","63c17b347c8142834e24778dc9b525a8.jpg","","1","1633686778","1636353435"),
("100","19","2","1c393c11ffe74d4832ad9a4490a714a1.jpg","","1","1633686789","1636353440");
INSERT INTO tbl_partners_games_images VALUES
("101","19","3","390107508a872681630add1f91096e93.jpg","","1","1633686797","1636353458"),
("102","19","4","03fa05ce7ae90c7afc69207f3e4a3ca8.jpg","","1","1633686802","1636353464"),
("103","19","5","004d5e5a410af486d6ff1bf2502af78b.jpg","","1","1633686807","1636353469"),
("104","19","6","2a47b0545c2c2e9a1f7cd0b7a368a5c0.jpg","","1","1633686810","1636353474"),
("105","19","7","a286af5e9ca15aa1221eb24b2404aee3.jpg","","1","1633686814","1636353481"),
("106","16","1","5a3e75eae97ddbd9936a299c903ceb98.jpg","","1","1633686849","1636353076"),
("107","16","2","2debd8b97e56850c4418d6e1f53efe9b.jpg","","1","1633686852","1636353085"),
("108","16","3","3b0e9eba89a0e8d8d420ff8e97a31967.jpg","","1","1633686860","1636353159"),
("109","16","4","728b9b96e71c0cd11b7dc0bd62a67971.jpg","","1","1633686863","1636353165"),
("110","16","5","acbac5c94a36b38788feb2d463228744.jpg","","1","1633686870","1636353178"),
("111","16","6","794a6bca4f9930dcbe49f43a7bba44ca.jpg","","1","1633686875","1636353184"),
("112","16","7","280037c7062c13751c7f4034da42737f.jpg","","1","1633686879","1636353190"),
("113","20","1","5b736057e8327d4985e37d90cec8294c.jpg","","1","1633687576","1636353549"),
("114","20","2","5846d29f4a3e0ac2c808d079c4404e80.jpg","","1","1633687588","1636353561"),
("115","20","3","cb28f7136bb432cc89b6438193ef118d.jpg","","1","1633687598","1636353565"),
("116","20","4","c340ab645526b3d120b1e58318838d89.jpg","","1","1633687607","1636353570"),
("117","20","5","abc93c0adc445ae3af29f3b782550a2d.jpg","","1","1633687635","1636353574"),
("118","20","6","dbc3dd18a707a53055db6d95b64b123f.jpg","","1","1633687644","1636353580"),
("119","20","7","0002529aead966b4f2afc276b0a52127.jpg","","1","1633687657","1636353585"),
("120","21","1","06d8cb03e3235ff8df1b8de0f714c66f.jpg","","1","1633687684","1636353629"),
("121","21","2","969c83b1eb575d02af23dba8f97a2e02.jpg","","1","1633687688","1636353646"),
("122","21","3","398cfa04aa3e390817b2727ded50b1f5.jpg","","1","1633687695","1636353652"),
("123","21","4","231143743c21db25ec2f3842f7537240.jpg","","1","1633687699","1636353658"),
("124","21","5","ad6b09914a3c79250897771015098291.jpg","","1","1633687703","1636353663"),
("125","21","6","116cc0684baad098313da3a66a421dc5.jpg","","1","1633687708","1636353670"),
("126","21","7","78f8b62158277e987ab0b3efa6d32eda.jpg","","1","1633687712","1636353687"),
("127","22","1","6126449ef8aee8d3240fb16a214bf200.jpg","","1","1633687737","1636353735"),
("128","22","2","9e17f4d305cc802800eabc1abfc84147.jpg","","1","1633687745","1636353742"),
("129","22","3","87b99a109c5777380a0c6d9e91bf1235.jpg","","1","1633687757","1636353747"),
("130","22","4","27cf0ff1bac5a4ab9c2c10cca381fae8.jpg","","1","1633687761","1636353752"),
("131","22","5","7c0dd4a5de54491cb893e65c45759fe8.jpg","","1","1633687771","1636353756"),
("132","22","6","baebc43fed946d44c296f80ee8ffe8f5.jpg","","1","1633687782","1636353761"),
("133","22","7","22610a74b1105c6c77f7e16a9d3cdd6b.jpg","","1","1633687800","1636353767"),
("134","23","1","bc7b80e89c634c1f6d51a82e72ae730c.jpg","","1","1633687829","1636353811"),
("135","23","2","030fb22dc3d73c828e46bdbb22a7a0f0.jpg","","1","1633687831","1636353816"),
("136","23","3","4ae5d0b666c41c57cb863b0555642ecd.jpg","","1","1633687835","1636353821"),
("137","23","4","3587bc8d336942c3702770044e380821.jpg","","1","1633687838","1636353827"),
("138","23","5","41c1f7972327c23992fa0248f26dabbf.jpg","","1","1633687841","1636353832"),
("139","23","6","de4641543bbf1666e26418884086988d.jpg","","1","1633687844","1636353839"),
("140","23","7","e3286def614191fd959906762721e00c.jpg","","1","1633687846","1636353845"),
("141","24","1","105b61f9744e8b18594a11610d681a89.jpg","","1","1633688673","1636353902"),
("142","24","2","83cf4f63c10d75f5994797f1bbb45020.jpg","","1","1633688684","1636353907"),
("143","24","3","0c1b87a7bdc5f1a79b68ab7e85411b18.jpg","","1","1633688690","1636353912"),
("144","24","4","d4f862f8830ca21b5461651b91a7cc8f.jpg","","1","1633688699","1636353917"),
("145","24","5","296763d3a523de4faf2743f7ebbb9abf.jpg","","1","1633688707","1636353923"),
("146","24","6","9e307848e3fd619caf167a9f011ce203.jpg","","1","1633688752","1636353929"),
("147","24","7","27b872ce0fb3f0bdc0d4373731b58910.jpg","","1","1633688765","1636353933"),
("148","25","1","0791711da1e36e32b109d06685ec7756.jpg","","1","1633688883","1636353981"),
("149","25","2","468fcdbfe7d78b54b983e2c938c2eeea.jpg","","1","1633688890","1636353997"),
("150","25","3","3b8d17ae7ba87985bc5e37b1aa190278.jpg","","1","1633688896","1636354002"),
("151","25","4","67c80ef84a855295c446a87d3170efe3.jpg","","1","1633688903","1636354007"),
("152","25","5","02d13ddb1683f55db9fe81e2f6db10ec.jpg","","1","1633688908","1636354013"),
("153","25","6","c6e5ee8025a7ef086da6e9d067b5874b.jpg","","1","1633688917","1636354019"),
("154","25","7","1d13d0410f20bf2392f6ff98ac68c27d.jpg","","1","1633688920","1636354024"),
("155","26","1","362e19890c76d260c894b013a3c256ec.jpg","","1","1633689026","1636354060"),
("156","26","2","4d781a22df068e0449fa2b270f7c991c.jpg","","1","1633689031","1636354066"),
("157","26","3","56ecb57ea5bede313ef8ac84e5075717.jpg","","1","1633689037","1636354071"),
("158","26","4","d96b35f580700586129bf59095612851.jpg","","1","1633689045","1636354075"),
("159","26","5","3b3edbb93f961ef19667aa47a8de8902.jpg","","1","1633689053","1636354085"),
("160","26","6","be616a7acf3de962687cd461db66a887.jpg","","1","1633689063","1636354091"),
("161","26","7","357d62279962e8e78ebbae7d6edf47b5.jpg","","1","1633689069","1636354096"),
("162","27","1","5e5819d1fc91d5c8db6c91c647ac17cb.jpg","","1","1633689192","1636354126"),
("163","27","2","c894b6412ad52182d611d2d8314bc68b.jpg","","1","1633689196","1636354131"),
("164","27","3","e446c0ef826f5c4f814824593a90a21a.jpg","","1","1633689200","1636354136"),
("165","27","4","a01f787d80cfdf45e032bca298ec20fd.jpg","","1","1633689206","1636354141"),
("166","27","5","a2c11f1eacf4d0bb54570857716afc37.jpg","","1","1633689209","1636354147"),
("167","27","6","a68143ff159a006fd17b7fcf3f205da8.jpg","","1","1633689212","1636354152"),
("168","27","7","30dce0a900bf29721d96eac0faed515f.jpg","","1","1633689216","1636354158"),
("169","28","1","84b10228d045dd2624e6c239e3dc752a.jpg","","1","1633689340","1636354204"),
("170","28","2","d935510245c47a8eef2d56795f2ae24c.jpg","","1","1633689345","1636354214"),
("171","28","3","5e9f2d81ee4438fb64c4aa3859c2b534.jpg","","1","1633689357","1636354219"),
("172","28","4","15db7785c145d9420fa4b20758676a66.jpg","","1","1633689361","1636354224"),
("173","28","5","859fbbdad4e71eadb75bd0ac892647ea.jpg","","1","1633689366","1636354230"),
("174","28","6","dc02698615bb0a9b9f172f0803654f17.jpg","","1","1633689371","1636354237"),
("175","28","7","946b07fa680339f856437b97c26bd976.jpg","","1","1633689375","1636354242"),
("176","29","1","85e871b0c7e8ab616809660b0bbaf7d9.jpg","","1","1633690000","1636354387"),
("177","29","2","98a1f565e92bfcc89ca44d7d15389e7b.jpg","","1","1633690004","1636354300"),
("178","29","3","c02a97edf62b601611913e837533d136.jpg","","1","1633690011","1636354305"),
("179","29","4","785bebd365ad2f2491472e44e847d35b.jpg","","1","1633690015","1636354311"),
("180","29","5","48255ba531f70178377ec04380091ef2.jpg","","1","1633690019","1636354319"),
("181","29","6","36c5da169c079f2fb4e0204b2a1cca0f.jpg","","1","1633690023","1636354325"),
("182","29","7","39d3c495708530dd113ce323c3105519.jpg","","1","1633690027","1636354331"),
("183","30","1","8ceb487c3f6c8c116d1a3762b2694a12.jpg","","1","1633690108","1636354506"),
("184","30","2","0295103a8d27c3b7ad6789de164e8fa0.jpg","","1","1633690115","1636354457"),
("185","30","3","fad799d914fc8e38afcc2e2b81f1cde5.jpg","","1","1633690126","1636354463"),
("186","30","4","ee13ea7dee629b69ff31f06a07c33be1.jpg","","1","1633690134","1636354469"),
("187","30","5","a04899a1528eb7380bc42b9bf84f1923.jpg","","1","1633690139","1636354473"),
("188","30","6","8244c3a81c78d2167462b37c79569e63.jpg","","1","1633690144","1636354480"),
("189","30","7","8c95e1fc950378e3851c53e3dbc915e6.jpg","","1","1633690148","1636354485"),
("190","31","1","c056d73a5f2480eb18c204e11dcf1ef4.jpg","","1","1633690223","1636354538"),
("191","31","2","02cd856395736f837b6cdaf68dc58386.jpg","","1","1633690233","1636354551"),
("192","31","3","02ec3441cf5a235e68db7506f5ddeb46.jpg","","1","1633690240","1636354563"),
("193","31","4","f48ce9174971f663705b82491d529348.jpg","","1","1633690246","1636354570"),
("194","31","5","c76ae62bb3ecb1eb7370beedb196f889.jpg","","1","1633690253","1636354575"),
("195","31","6","3b0466dbb6a7bb06ab53b4d77610d916.jpg","","1","1633690256","1636354582"),
("196","31","7","6d7c46179d11be827a1e2f0cf93008ca.jpg","","1","1633690260","1636354587"),
("197","32","1","608ae19e1d710cd11885ce6e1c7e8bee.jpg","","1","1633690345","1636354631"),
("198","32","2","8f66a745958bdf31decdcbd2671d6780.jpg","","1","1633690352","1636354636"),
("199","32","3","b22a2129ffe6667bf5d1ec74b0186194.jpg","","1","1633690359","1636354641"),
("200","32","4","f41218415352947f8b4a0ccbd199231f.jpg","","1","1633690367","1636354645");
INSERT INTO tbl_partners_games_images VALUES
("201","32","5","f3c0bef20ebe5cb8d9afab7a1c02d68b.jpg","","1","1633690374","1636354651"),
("202","32","6","419939e842f4e713b527790d2112e9a6.jpg","","1","1633690385","1636354656"),
("203","32","7","2ed11a66c21b4bf595ee42f7ed389819.jpg","","1","1633690390","1636354663"),
("204","33","1","d4f03aff8d2e0206d11f994bdd6bdd26.jpg","","1","1634994862","1636354707"),
("205","33","2","e5bf0be727a51bf011365e0502ac28fb.jpg","","1","1634994875","1636354715"),
("206","33","3","f83fa2bcd6b4f8d47e1467c213c8cddb.jpg","","1","1634994886","1636354720"),
("207","33","4","74588282900031ea9ac1400c0fbef8c1.jpg","","1","1634994892","1636354725"),
("208","33","5","c06360f8c211595234a7540367aa20d0.jpg","","1","1634994901","1636354729"),
("209","33","6","e159aaeb0329ff831cb944606ce8c314.jpg","","1","1634994909","1636354735"),
("210","33","7","ca752d34a0b40934c24f9211a3c2a0c5.jpg","","1","1634994915","1636354740");




CREATE TABLE `tbl_partners_games_images_old` (
  `img_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `img_game_id` bigint(20) NOT NULL,
  `img_type` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1=HeroBanner  2=HeroBannerGIF  3=PageBanner  4=PageBannerGIF  5=LargThumb  6=LargThumbGIF  7=MediumThumb  8=MediumThumbGIF  9=SmallThumb  10=SmallThumbGIF  11=VerticleThumb  12=VerticleThumbGIF   13=HorizontalThumb   14=HorizontalThumbGIF',
  `img_link` text NOT NULL,
  `img_status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0=UploadOnly   1=Approved  3=Rejected',
  `img_added_on` varchar(100) NOT NULL,
  `img_updated_on` varchar(100) NOT NULL,
  PRIMARY KEY (`img_id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;


INSERT INTO tbl_partners_games_images_old VALUES
("6","1","1","e13ca97ce3a54cdfebf89b3f6da70741.jpg","1","1630590792","1630590792"),
("7","1","3","c69d51641e8bf2d42ce409fe32a0b973.jpg","1","1630590876","1630590876"),
("8","1","10","1ec6846430b4b897915d3b3f414fcdc3.gif","1","1630591277","1630591277"),
("9","1","4","6d3cecf52417bf9c2f3e50f1b4322d4a.gif","1","1630591705","1630591705"),
("10","1","2","ad7c44db77fc28794f6738e8350ed99d.gif","1","1630592005","1630592005"),
("11","1","5","58f86392040c99b90a5474a8e39f9c36.jpg","1","1630592092","1630592092"),
("12","1","6","68c34d4f4217a04c72324f8d63df515c.gif","1","1630592103","1630592103"),
("13","1","7","f6c2cf5fcafa95ab2bbe230ea7cc1c61.jpg","1","1630592118","1630592118"),
("14","1","8","f50440cbf5eff05c274d7343746b711a.gif","1","1630592132","1630592132"),
("15","1","9","50234ce2b682fb59fb529ac370cc6cf1.jpg","1","1630592141","1630592141"),
("16","1","11","0dc35f864562103a679f72cf45b06108.jpg","1","1630592151","1630592151"),
("17","1","12","040d29e5085592c6b9d938eeae712295.gif","1","1630592155","1630592155"),
("18","2","1","e08131d028e0fe4c52e7d7f8f13b25a1.jpg","1","1630592355","1630592355"),
("19","2","2","6d1325d258e29a4bcee5bf68abc60628.gif","1","1630592359","1630592359"),
("20","2","3","655679a6e25dd050fc80d60fb7d537f3.jpg","1","1630592371","1630592371"),
("21","2","4","a4d37ca01e051494b136d73cdc67664c.gif","1","1630592375","1630592375"),
("22","2","5","613f8c09363c25662e559ed6ab0bedfe.jpg","1","1630592395","1630592395"),
("23","2","6","829c6be1aab96a90e06c848a08de57fd.gif","1","1630592398","1630592398"),
("24","2","7","29f7f35c28ffa8c7014505fef5e10ad7.jpg","1","1630592402","1630592402"),
("25","2","8","006be9b268d727799e14039185603cb7.gif","1","1630592406","1630592406"),
("26","2","9","f2f98e8e9ff384a67cd41bf7c532c3f0.jpg","1","1630592421","1630592421"),
("27","2","10","ce4925d7847299fcb024ff73ca49deec.gif","1","1630592424","1630592424"),
("28","2","11","b78836c415d9555ed11cbe813d954c0d.jpg","1","1630592428","1630592428"),
("29","2","12","0010025d25ec518957e2297d5b35c15e.gif","1","1630592440","1630592440"),
("30","2","13","f44b780209f319307891b9fb3dde1291.jpg","1","1630592764","1630592764"),
("31","2","14","040ea52544e3b83ec8cc60bebc1727f5.gif","1","1630592772","1630592772"),
("32","1","13","5e286e2a0eb5a4bb8cbc79f7bc6fa738.jpg","1","1630592797","1630592797"),
("33","1","14","443def568c379209e1a62818687dc170.gif","1","1630592806","1630592806");




CREATE TABLE `tbl_partners_tournaments` (
  `tournament_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `tournament_partner_id` bigint(20) NOT NULL,
  `tournament_name` varchar(255) NOT NULL,
  `tournament_start_date` date NOT NULL,
  `tournament_end_date` date NOT NULL,
  `tournament_play_link` text NOT NULL,
  `tournament_status` tinyint(4) NOT NULL DEFAULT '2' COMMENT '0=AddedOnly 1=Approved  2=Published  3=Reject  4=Inactive',
  `tournament_added_on` varchar(100) NOT NULL,
  `tournament_updated_on` varchar(100) NOT NULL,
  `tournament_type` tinyint(4) DEFAULT '2',
  PRIMARY KEY (`tournament_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;


INSERT INTO tbl_partners_tournaments VALUES
("1","2","Cars ","2021-10-17","2021-10-31","http://gpl.gamenow.com.pk/Account/loginwithmsisdn?number=923226791152&tname=jazz&oper=jazz","2","1635231130","1635533261","2"),
("2","2","The Pirate Kid","2021-10-26","2021-11-01","http://gpl.gamenow.com.pk/User/Account/checkSubscription?tid=6886&t_type=CONTEST&page=Home","2","1635531760","1635531760","2"),
("3","2","Airplane Battle","2021-10-26","2021-11-02","https://gpl.gamenow.com.pk/User/Account/checkSubscription?tid=6870&t_type=PAID&page=Home","2","1635531861","1635531861","2"),
("4","2","Cars (New)","2021-10-17","2021-10-31","http://gpl.gamenow.com.pk/User/Account/checkSubscription?tid=6886&t_type=CONTEST&page=Home","2","1635532016","1635532016","2"),
("5","2","Fuit Master","2021-10-26","2021-11-02","https://gpl.gamenow.com.pk/User/Account/checkSubscription?tid=6871&t_type=PAID&page=Home","2","1635532075","1635532075","2"),
("6","2","5 Fruit ","2022-01-01","2022-01-27","http://gpl.gamenow.com.pk/User/Tournament/Details?tid=9642&t_type=CONTEST","2","1641542425","1642411571","2"),
("7","2","Friends Cricket","2022-01-27","2022-02-28","http://gpl.gamenow.com.pk/User/Tournament/Details?tid=9876&t_type=CONTEST","2","1643632547","1643632547","2"),
("8","2","Knife Ninja","2022-02-15","2022-03-31","http://test.gamenow.com.pk/Account/loginwithmsisdn?number=923215309749&tname=jazz&oper=jazz","2","1645093958","1645093958","1");




CREATE TABLE `tbl_tournament_images` (
  `tour_img_id` int(11) NOT NULL AUTO_INCREMENT,
  `tour_img_tournament_id` varchar(255) NOT NULL,
  `tour_img_type` tinyint(4) DEFAULT NULL COMMENT '1 = Hero banner 2 = Vertical banner',
  `tour_img_img_link` varchar(255) NOT NULL,
  `tour_img_img_gif` varchar(255) NOT NULL,
  `tour_img_created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`tour_img_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;


INSERT INTO tbl_tournament_images VALUES
("1","1","1","","07dd7e94ade9d6a811733b01165f8297.gif","2021-10-26 13:06:56"),
("2","1","2","c0d42dc4be9c1688aee2d0b47ba98a32.jpg","","2021-10-26 13:08:24"),
("3","2","1","84fed73c8c2f496d98d0b55a62a9deb3.jpg","","2021-10-29 23:53:05"),
("4","2","2","e6832b4a9cda3ad2c441320cef35726f.jpg","","2021-10-29 23:53:11"),
("5","3","1","e8f611572cf53d7100ebb69df74f09f6.jpg","","2021-10-29 23:54:57"),
("6","3","2","aaaeb229796d07fff413781e1bc6eba4.jpg","","2021-10-29 23:55:07"),
("7","4","1","96c1bb91ce9348f71f81b6b0d2a1f8f8.jpg","","2021-10-29 23:57:11"),
("8","4","2","89c1ed4e236b142656f25b921e720af2.jpg","","2021-10-29 23:57:18"),
("9","5","2","91a7c5e415df8c8a24049509b60c69b4.jpg","","2021-10-29 23:58:12"),
("10","5","1","b403adff23c4c3a8b25a34e8ed2a087c.jpg","","2021-10-29 23:58:18"),
("11","6","1","8ab7920751eff6085b98dab5645ea14a.jpg","","2022-01-07 13:31:11"),
("12","6","2","9139fd2f68ea2dd943e477e82656a71c.jpg","","2022-01-07 13:31:18"),
("13","7","1","","ae97000d5111b0632b8356792e83302c.gif","2022-01-31 18:06:17"),
("14","7","2","b4097ac0883be7de58ba7b277ac9d1eb.jpg","","2022-01-31 18:06:21"),
("15","8","1","d0dc7f88a31cee7ae3a93a66f5df107f.jpeg","","2022-02-17 16:03:27");




CREATE TABLE `tbl_user_avatar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `img` varchar(100) NOT NULL,
  `type` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1=Male   2=Female',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;


INSERT INTO tbl_user_avatar VALUES
("1","1.png","1"),
("2","2.png","1"),
("3","3.png","1"),
("4","4.png","1"),
("5","5.png","1"),
("6","6.png","1"),
("7","7.png","1"),
("8","8.png","1"),
("9","9.png","1");




CREATE TABLE `tbl_users` (
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
  `coins` int(11) DEFAULT '0',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=138 DEFAULT CHARSET=latin1;


INSERT INTO tbl_users VALUES
("1","","","9729081679","https://gamenow.com.pk/ads-demo/uploads/site_users/default.png","766086","::1","2021-09-14 22:40:44","1","","0","1631598649","1631639444","950"),
("2","","","8729081679","http://localhost/Gamenow-V2/uploads/site_users/8.png","157714","::1","2021-09-14 22:44:54","1","","1","1631639694","1631639694","0"),
("3","","","3019743401","https://gamenow.com.pk/uploads/site_users/default.png","599039","119.160.96.197","2021-10-18 15:38:22","1","","0","1634551702","1634551702","0"),
("4","","","1075120339","https://gamenow.com.pk/uploads/site_users/default.png","716362","58.121.20.133","2021-10-20 01:37:54","1","","0","1634674074","1634674074","0"),
("5","","","3060537306","https://gamenow.com.pk/uploads/site_users/default.png","130913","119.160.58.210","2021-10-20 08:32:17","1","","0","1634698937","1634698937","0"),
("6","","","","https://gamenow.com.pk/uploads/site_users/.png","375054","165.231.103.133","2021-10-21 22:12:37","1","","0","1634834557","1634834557","0"),
("7","","","","https://gamenow.com.pk/uploads/site_users/.png","812120","170.83.176.223","2021-10-26 09:14:23","1","","0","1635219863","1635219863","0"),
("8","","","3004832016","https://gamenow.com.pk/uploads/site_users/default.png","257920","119.160.97.100","2021-10-27 16:06:32","1","","0","1635330992","1635330992","0"),
("9","","","3000526711","https://gamenow.com.pk/uploads/site_users/default.png","926296","61.5.153.191","2021-10-29 17:57:12","1","","0","1635510432","1635510432","0"),
("10","","","3023129247","https://gamenow.com.pk/uploads/site_users/default.png","333116","119.160.3.215","2021-10-30 15:18:47","1","","0","1635587327","1635587327","0"),
("11","","","3093496817","https://gamenow.com.pk/uploads/site_users/default.png","917046","103.255.5.78","2021-10-30 21:21:09","1","","0","1635609069","1635609069","0"),
("12","","","1041556898","https://gamenow.com.pk/uploads/site_users/default.png","268825","118.235.24.8","2021-11-05 07:47:50","1","","0","1636078670","1636078670","0"),
("13","","","","https://gamenow.com.pk/uploads/site_users/.png","342285","151.80.195.102","2021-11-10 17:29:16","1","","0","1636545556","1636545556","0"),
("14","","","3043872454","https://gamenow.com.pk/uploads/site_users/default.png","287895","119.160.3.117","2021-11-11 17:53:02","1","","0","1636633382","1636633382","0"),
("15","","","3024660140","https://gamenow.com.pk/uploads/site_users/default.png","178331","37.111.141.117","2021-11-11 20:44:50","1","","0","1636643690","1636643690","0"),
("16","","","3077285734","https://gamenow.com.pk/uploads/site_users/default.png","396701","103.255.5.51","2021-11-12 12:13:56","1","","0","1636699436","1636699436","0"),
("17","","","","https://gamenow.com.pk/uploads/site_users/.png","174831","66.249.93.51","2021-11-12 12:13:57","1","","0","1636699437","1636699437","0"),
("18","","","3080664862","https://gamenow.com.pk/uploads/site_users/default.png","662190","182.187.163.191","2021-11-16 21:05:44","1","","0","1637076944","1637076944","0"),
("19","","","3088372395","https://gamenow.com.pk/uploads/site_users/default.png","297905","119.160.71.68","2021-11-17 11:06:25","1","","0","1637127385","1637127385","0"),
("20","","","3088009871","https://gamenow.com.pk/uploads/site_users/default.png","813096","61.5.153.245","2021-11-19 12:27:30","1","","0","1637305050","1637305050","0"),
("21","","","3088009872","https://gamenow.com.pk/uploads/site_users/default.png","361165","61.5.153.245","2021-11-19 12:30:06","1","","0","1637305206","1637305206","0"),
("22","","","","https://gamenow.com.pk/uploads/site_users/.png","417724","104.144.206.102","2021-11-19 23:26:49","1","","0","1637344609","1637344609","0"),
("23","","","3060635076","https://gamenow.com.pk/uploads/site_users/default.png","358045","119.160.65.62","2021-11-22 14:44:14","1","","0","1637572454","1637572454","0"),
("24","","","3076420381","https://gamenow.com.pk/uploads/site_users/default.png","436984","119.160.65.62","2021-11-22 14:44:39","1","","0","1637572479","1637572479","0"),
("25","","","","https://gamenow.com.pk/uploads/site_users/.png","884819","107.173.92.72","2021-11-22 20:47:42","1","","0","1637594262","1637594262","0"),
("26","","","3220309156","https://gamenow.com.pk/uploads/site_users/default.png","170111","119.160.120.5","2021-11-22 21:19:43","1","","0","1637596183","1637596183","0"),
("27","","","3009818220","https://gamenow.com.pk/uploads/site_users/default.png","601264","119.155.231.123","2021-11-25 18:35:40","1","","0","1637845540","1637845540","0"),
("28","","","3098751341","https://gamenow.com.pk/uploads/site_users/default.png","928656","119.160.68.246","2021-11-28 09:39:49","1","","0","1638072589","1638072589","0"),
("29","","","3052803040","https://gamenow.com.pk/uploads/site_users/default.png","741075","111.119.187.24","2021-11-28 21:47:09","1","","0","1638116229","1638116229","0"),
("30","","","3040976193","https://gamenow.com.pk/uploads/site_users/default.png","249972","119.160.118.215","2021-11-30 11:43:49","1","","0","1638252829","1638252829","0"),
("31","","","1075409926","https://gamenow.com.pk/uploads/site_users/default.png","123752","106.101.65.234","2021-12-02 13:41:55","1","","0","1638432715","1638432715","0"),
("32","","","1073190913","https://gamenow.com.pk/uploads/site_users/7.png","391303","49.163.139.83","2021-12-04 15:26:11","1","","0","1638611771","1638611771","0"),
("33","","","8273190913","https://gamenow.com.pk/uploads/site_users/default.png","373507","49.163.139.83","2021-12-04 15:26:54","1","","0","1638611814","1638611814","0"),
("34","","","9613365157","https://gamenow.com.pk/uploads/site_users/default.png","699842","120.29.68.98","2021-12-04 21:41:10","1","","0","1638634270","1638634270","0"),
("35","","","3060058534","https://gamenow.com.pk/uploads/site_users/default.png","622938","111.119.177.15","2021-12-06 20:05:05","1","","0","1638801305","1638801305","0"),
("36","","","1045238606","https://gamenow.com.pk/uploads/site_users/default.png","560546","223.38.33.151","2021-12-14 11:46:01","1","","0","1639462561","1639462561","0"),
("37","","","3027544688","https://gamenow.com.pk/uploads/site_users/default.png","760796","119.160.58.187","2021-12-16 09:59:54","1","","0","1639628994","1639628994","0"),
("38","","","3037263400","https://gamenow.com.pk/uploads/site_users/default.png","238471","119.160.57.37","2021-12-17 20:58:10","1","","0","1639754890","1639754890","0"),
("39","","","3062971486","https://gamenow.com.pk/uploads/site_users/default.png","316189","119.160.120.195","2021-12-19 18:23:36","1","","0","1639918416","1639918416","0"),
("40","","","3186116067","https://gamenow.com.pk/uploads/site_users/4.png","727077","119.160.59.3","2021-12-20 18:21:00","1","","0","1640004660","1640004660","0"),
("41","","","3243626497","https://gamenow.com.pk/uploads/site_users/default.png","227620","119.160.3.96","2021-12-21 17:00:51","1","","0","1640086251","1640086251","0"),
("42","","","1020416225","https://gamenow.com.pk/uploads/site_users/default.png","885986","112.145.240.165","2021-12-23 10:38:59","1","","0","1640236139","1640236139","0"),
("43","","","","https://gamenow.com.pk/uploads/site_users/.png","955702","156.146.36.69","2021-12-25 15:29:34","1","","0","1640426374","1640426374","0"),
("44","","","3054705255","https://gamenow.com.pk/uploads/site_users/default.png","344048","223.29.229.10","2021-12-26 13:20:31","1","","0","1640505031","1640505031","0"),
("45","","","3235734580","https://gamenow.com.pk/uploads/site_users/default.png","918999","119.160.59.159","2021-12-26 17:33:03","1","","0","1640520183","1640520183","0"),
("46","","","3035878264","https://gamenow.com.pk/uploads/site_users/default.png","386094","119.160.68.239","2021-12-28 14:43:59","1","","0","1640682839","1640682839","0"),
("47","","","3051053162","https://gamenow.com.pk/uploads/site_users/default.png","948947","119.160.58.97","2021-12-31 03:34:00","1","","0","1640901840","1640901840","0"),
("48","","","3070958367","https://gamenow.com.pk/uploads/site_users/default.png","966389","119.160.59.38","2022-01-02 13:58:52","1","","0","1641112132","1641112132","0"),
("49","","","3012860436","https://gamenow.com.pk/uploads/site_users/default.png","701877","175.107.212.23","2022-01-05 11:22:30","1","","0","1641361950","1641361950","0"),
("50","","","3082861821","https://gamenow.com.pk/uploads/site_users/default.png","695339","175.107.212.23","2022-01-05 11:23:31","1","","0","1641362011","1641362011","0"),
("51","","","","https://gamenow.com.pk/uploads/site_users/.png","836615","181.215.204.233","2022-01-06 19:57:53","1","","0","1641479273","1641479273","0"),
("52","","","3000742743","https://gamenow.com.pk/uploads/site_users/default.png","745252","119.160.57.180","2022-01-08 12:27:19","1","","0","1641625039","1641625039","0"),
("53","","","1234234580","https://gamenow.com.pk/uploads/site_users/default.png","967990","1.229.144.113","2022-01-10 11:12:04","1","","0","1641793324","1641793324","0"),
("54","","","3243584144","https://gamenow.com.pk/uploads/site_users/default.png","808810","119.160.58.193","2022-01-10 16:17:43","1","","0","1641811663","1641811663","0"),
("55","","","3203849302","https://gamenow.com.pk/uploads/site_users/default.png","289225","119.160.58.193","2022-01-10 16:20:31","1","","0","1641811831","1641811831","0"),
("56","","","","https://gamenow.com.pk/uploads/site_users/.png","554714","104.144.112.58","2022-01-12 02:33:56","1","","0","1641935036","1641935036","0"),
("57","","","3452080622","https://gamenow.com.pk/uploads/site_users/default.png","480550","37.111.136.115","2022-01-12 18:51:45","1","","0","1641993705","1641993705","0"),
("58","","","3235644647","https://gamenow.com.pk/uploads/site_users/default.png","331515","119.160.59.121","2022-01-17 01:01:26","1","","0","1642361486","1642361486","0"),
("59","","","3027290195","https://gamenow.com.pk/uploads/site_users/default.png","288140","119.160.59.95","2022-01-18 01:15:47","1","","0","1642448747","1642448747","0"),
("60","","","3092584655","https://gamenow.com.pk/uploads/site_users/default.png","804199","119.160.2.52","2022-01-19 02:43:43","1","","0","1642540423","1642540423","0"),
("61","","","","https://gamenow.com.pk/uploads/site_users/.png","383219","5.157.43.188","2022-01-19 03:02:50","1","","0","1642541570","1642541570","0"),
("62","","","3356105927","https://gamenow.com.pk/uploads/site_users/default.png","946316","182.176.119.63","2022-01-20 00:00:04","1","","0","1642617004","1642617004","0"),
("63","","","3033401718","https://gamenow.com.pk/uploads/site_users/default.png","393554","119.160.116.153","2022-01-20 02:02:58","1","","0","1642624378","1642624378","0"),
("64","","","3085557777","https://gamenow.com.pk/uploads/site_users/default.png","631239","119.160.64.40","2022-01-20 17:13:13","1","","0","1642678993","1642678993","0"),
("65","","","3065631633","https://gamenow.com.pk/uploads/site_users/default.png","986355","119.160.57.114","2022-01-21 01:44:24","1","","0","1642709664","1642709664","0"),
("66","","","1026447969","https://gamenow.com.pk/uploads/site_users/default.png","971950","180.65.118.252","2022-01-21 18:50:57","1","","0","1642771257","1642771257","0"),
("67","","","3018258674","https://gamenow.com.pk/uploads/site_users/default.png","660997","119.160.3.36","2022-01-23 04:37:08","1","","0","1642892828","1642892828","0"),
("68","","","3072806357","https://gamenow.com.pk/uploads/site_users/default.png","458523","119.160.3.36","2022-01-23 04:40:03","1","","0","1642893003","1642893003","0"),
("69","","","3055910367","https://gamenow.com.pk/uploads/site_users/default.png","620008","182.189.81.36","2022-01-23 18:05:13","1","","0","1642941313","1642941313","0"),
("70","","","","https://gamenow.com.pk/uploads/site_users/.png","688774","165.231.130.126","2022-01-23 18:34:02","1","","0","1642943042","1642943042","0"),
("71","","","3439286708","https://gamenow.com.pk/uploads/site_users/default.png","739935","119.160.67.33","2022-01-26 09:34:23","1","","0","1643169863","1643169863","0"),
("72","","","3067578311","https://gamenow.com.pk/uploads/site_users/default.png","387071","103.255.4.35","2022-01-27 09:39:13","1","","0","1643256553","1643256553","0"),
("73","","","3234740716","https://gamenow.com.pk/uploads/site_users/default.png","828396","119.160.99.187","2022-01-27 14:02:22","1","","0","1643272342","1643272342","0"),
("74","","","3076140192","https://gamenow.com.pk/uploads/site_users/default.png","204833","111.119.187.4","2022-01-29 21:09:01","1","","0","1643470741","1643470741","0"),
("75","","","3089070473","https://gamenow.com.pk/uploads/site_users/default.png","772949","169.197.141.111","2022-01-31 10:46:55","1","","0","1643606215","1643606215","0"),
("76","","","","https://gamenow.com.pk/uploads/site_users/.png","749294","173.234.151.156","2022-02-01 18:43:49","1","","0","1643721229","1643721229","0"),
("77","","","3017406276","https://gamenow.com.pk/uploads/site_users/default.png","757405","119.160.58.172","2022-02-02 16:26:53","1","","0","1643799413","1643799413","0"),
("78","","","3000501652","https://gamenow.com.pk/uploads/site_users/default.png","716227","119.160.116.22","2022-02-03 04:05:46","1","","0","1643841346","1643841346","0"),
("79","","","3022758243","https://gamenow.com.pk/uploads/site_users/default.png","188774","119.160.120.64","2022-02-03 18:58:54","1","","0","1643894934","1643894934","0"),
("80","","","3007435900","https://gamenow.com.pk/uploads/site_users/default.png","510606","37.159.104.176","2022-02-04 11:19:27","1","","0","1643953767","1643953767","0"),
("81","","","3041721237","https://gamenow.com.pk/uploads/site_users/default.png","565755","119.160.57.50","2022-02-05 16:53:31","1","","0","1644060211","1644060211","0"),
("82","","","152809865","https://gamenow.com.pk/uploads/site_users/default.png","155707","114.202.144.172","2022-02-06 00:38:42","1","","0","1644088122","1644088122","0"),
("83","","","833376739","https://gamenow.com.pk/uploads/site_users/default.png","143988","222.253.223.115","2022-02-07 16:39:25","1","","0","1644232165","1644232165","0"),
("84","","","","https://gamenow.com.pk/uploads/site_users/.png","373589","170.83.176.92","2022-02-07 17:53:47","1","","0","1644236627","1644236627","0"),
("85","","","3214988883","https://gamenow.com.pk/uploads/site_users/5.png","425591","203.81.211.208","2022-02-08 08:53:43","1","","0","1644290623","1644290623","0"),
("86","","","3051655481","https://gamenow.com.pk/uploads/site_users/default.png","456434","119.160.81.56","2022-02-09 11:25:42","1","","0","1644386142","1644386142","0"),
("87","","","3322413386","https://gamenow.com.pk/uploads/site_users/default.png","640923","39.62.59.122","2022-02-11 13:53:23","1","","0","1644567803","1644567803","0"),
("88","","","3070813757","https://gamenow.com.pk/uploads/site_users/default.png","149251","182.183.139.62","2022-02-12 13:20:01","1","","0","1644652201","1644652201","0"),
("89","","","","https://gamenow.com.pk/uploads/site_users/.png","547363","185.229.243.46","2022-02-13 20:12:17","1","","0","1644763337","1644763337","0"),
("90","","","3058665045","https://gamenow.com.pk/uploads/site_users/default.png","458496","119.160.81.47","2022-02-15 18:04:14","1","","0","1644928454","1644928454","0"),
("91","Guest","","9900000078","http://localhost/Gamenow-V2/uploads/site_users/default.png","0","::1","","1","","1","1644602611","1644602611","1010"),
("92","","","3208166552","https://gamenow.com.pk/uploads/site_users/default.png","523681","119.160.96.186","2022-02-18 11:11:28","1","","0","1645162888","1645162888","0"),
("93","","","3000461555","https://gamenow.com.pk/uploads/site_users/default.png","660807","119.160.56.85","2022-02-19 08:38:09","1","","0","1645240089","1645240089","0"),
("94","","","","https://gamenow.com.pk/uploads/site_users/.png","279893","185.122.170.194","2022-02-20 06:40:49","1","","0","1645319449","1645319449","0"),
("95","","","3097004340","https://gamenow.com.pk/uploads/site_users/default.png","123860","119.160.96.254","2022-02-21 13:27:18","1","","0","1645430238","1645430238","0"),
("96","","","3054999111","https://gamenow.com.pk/uploads/site_users/default.png","284830","182.186.170.214","2022-02-22 16:18:27","1","","0","1645526907","1645526907","0"),
("97","","","1111111111","https://gamenow.com.pk/uploads/site_users/default.png","113443","80.90.228.240","2022-02-23 17:14:37","1","","0","1645616677","1645616677","0"),
("98","","","3089230161","https://gamenow.com.pk/uploads/site_users/5.png","744737","39.45.152.79","2022-02-28 19:48:48","1","","0","1646057928","1646057928","0"),
("99","","","3040800879","https://gamenow.com.pk/uploads/site_users/default.png","416693","119.160.58.121","2022-03-03 08:36:20","1","","0","1646276780","1646276780","0"),
("100","","","3095734087","https://gamenow.com.pk/uploads/site_users/default.png","815890","119.160.58.121","2022-03-03 08:36:54","1","","0","1646276814","1646276814","0");
INSERT INTO tbl_users VALUES
("101","","","3056046487","https://gamenow.com.pk/uploads/site_users/default.png","380533","119.160.58.121","2022-03-03 08:39:20","1","","0","1646276960","1646276960","0"),
("102","","","3130075543","https://gamenow.com.pk/uploads/site_users/default.png","157823","119.160.59.71","2022-03-03 19:41:17","1","","0","1646316677","1646316677","0"),
("103","","","","https://gamenow.com.pk/uploads/site_users/.png","217556","119.160.59.71","2022-03-03 19:50:24","1","","0","1646317224","1646317224","0"),
("104","","","","https://gamenow.com.pk/uploads/site_users/.png","743218","119.160.59.71","2022-03-03 19:54:57","1","","0","1646317497","1646317497","0"),
("105","","","","https://gamenow.com.pk/uploads/site_users/.png","211751","119.160.59.71","2022-03-03 19:55:23","1","","0","1646317523","1646317523","0"),
("106","","","","https://gamenow.com.pk/uploads/site_users/.png","135335","119.160.59.71","2022-03-03 19:56:20","1","","0","1646317580","1646317580","0"),
("107","","","","https://gamenow.com.pk/uploads/site_users/.png","374810","119.160.59.71","2022-03-03 19:58:03","1","","0","1646317683","1646317683","0"),
("108","","","923107014781","https://gamenow.com.pk/uploads/site_users/default.png","854573","119.160.59.71","2022-03-03 20:00:04","1","","0","1646317804","1646317804","0"),
("109","","","","https://gamenow.com.pk/uploads/site_users/.png","578965","119.160.59.71","2022-03-03 20:01:52","1","","0","1646317912","1646317912","0"),
("110","","","","https://gamenow.com.pk/uploads/site_users/.png","973280","119.160.59.71","2022-03-03 20:02:15","1","","0","1646317935","1646317935","0"),
("111","","","","https://gamenow.com.pk/uploads/site_users/.png","356662","119.160.59.71","2022-03-03 20:03:07","1","","0","1646317987","1646317987","0"),
("112","","","","https://gamenow.com.pk/uploads/site_users/.png","479193","119.160.58.35","2022-03-03 20:04:28","1","","0","1646318068","1646318068","0"),
("113","","","","https://gamenow.com.pk/uploads/site_users/.png","489230","119.160.59.71","2022-03-03 20:06:09","1","","0","1646318169","1646318169","0"),
("114","","","","https://gamenow.com.pk/uploads/site_users/.png","850124","119.160.59.71","2022-03-03 20:06:24","1","","0","1646318184","1646318184","0"),
("115","","","","https://gamenow.com.pk/uploads/site_users/.png","689371","119.160.59.71","2022-03-03 20:06:46","1","","0","1646318206","1646318206","0"),
("116","","","","https://gamenow.com.pk/uploads/site_users/.png","565266","119.160.59.100","2022-03-03 20:14:56","1","","0","1646318696","1646318696","0"),
("117","","","","https://gamenow.com.pk/uploads/site_users/.png","278944","119.160.59.100","2022-03-03 20:15:24","1","","0","1646318724","1646318724","0"),
("118","","","3088237569","https://gamenow.com.pk/uploads/site_users/default.png","177517","119.160.120.55","2022-03-05 22:47:25","1","","0","1646500645","1646500645","0"),
("119","","","1088416458","https://gamenow.com.pk/uploads/site_users/default.png","752577","183.108.230.161","2022-03-07 12:55:50","1","","0","1646637950","1646637950","0"),
("120","","","3034046120","https://gamenow.com.pk/uploads/site_users/5.png","366319","39.48.98.5","2022-03-08 02:56:23","1","","0","1646688383","1646688383","0"),
("121","","","","https://gamenow.com.pk/uploads/site_users/.png","289713","138.128.11.236","2022-03-09 14:16:28","1","","0","1646815588","1646815588","0"),
("122","","","3004594061","https://gamenow.com.pk/uploads/site_users/default.png","828586","110.39.163.146","2022-03-14 14:02:25","1","","0","1647246745","1647246745","0"),
("123","","","","https://gamenow.com.pk/uploads/site_users/.png","319715","20.25.252.10","2022-03-16 09:31:34","1","","0","1647403294","1647403294","0"),
("124","","","9282062214","https://gamenow.com.pk/uploads/site_users/default.png","543646","39.7.28.5","2022-03-19 23:22:31","1","","0","1647712351","1647712351","0"),
("125","","","3033331300","https://gamenow.com.pk/uploads/site_users/default.png","541259","103.125.177.194","2022-03-21 09:13:25","1","","0","1647834205","1647834205","0"),
("126","","","3073000488","https://gamenow.com.pk/uploads/site_users/default.png","520697","119.160.56.110","2022-03-27 12:07:41","1","","0","1648363061","1648363061","0"),
("127","","","1234657890","https://gamenow.com.pk/uploads/site_users/default.png","397433","119.160.116.197","2022-03-27 13:44:01","1","","0","1648368841","1648368841","0"),
("128","","","3048810080","https://gamenow.com.pk/uploads/site_users/default.png","582112","119.160.56.221","2022-03-27 16:06:36","1","","0","1648377396","1648377396","0"),
("129","","","307552684","https://gamenow.com.pk/uploads/site_users/default.png","746961","119.160.58.107","2022-03-27 21:37:00","1","","0","1648397220","1648397220","0"),
("130","","","3075526845","https://gamenow.com.pk/uploads/site_users/default.png","384629","119.160.58.107","2022-03-27 21:41:11","1","","0","1648397471","1648397471","0"),
("131","","","3244664199","https://gamenow.com.pk/uploads/site_users/default.png","776231","182.185.189.182","2022-03-27 22:49:20","1","","0","1648401560","1648401560","0"),
("132","","","3003034261","https://gamenow.com.pk/uploads/site_users/default.png","756646","119.160.116.66","2022-03-28 00:28:13","1","","0","1648407493","1648407493","0"),
("133","","","1234567890","https://gamenow.com.pk/uploads/site_users/default.png","804660","119.160.58.133","2022-03-28 08:59:44","1","","0","1648438184","1648438184","0"),
("134","","","3032218455","https://gamenow.com.pk/uploads/site_users/default.png","113145","119.160.3.61","2022-03-28 10:11:00","1","","0","1648442460","1648442460","0"),
("135","","","3243180259","https://gamenow.com.pk/uploads/site_users/default.png","793294","119.160.3.216","2022-03-28 15:38:04","1","","0","1648462084","1648462084","0"),
("136","","","348816853","https://gamenow.com.pk/uploads/site_users/default.png","906060","119.160.116.213","2022-03-28 16:24:13","1","","0","1648464853","1648464853","0"),
("137","","","1172279961","https://gamenow.com.pk/uploads/site_users/default.png","344862","119.160.98.122","2022-03-28 16:33:23","1","","0","1648465403","1648465403","0");


