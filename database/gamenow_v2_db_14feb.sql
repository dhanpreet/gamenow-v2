-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 14, 2022 at 11:11 AM
-- Server version: 8.0.28-0ubuntu0.20.04.3
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gamenow_v2_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ads`
--

CREATE TABLE `tbl_ads` (
  `id` int NOT NULL,
  `ad_text_main` varchar(255) DEFAULT NULL,
  `ad_text_mini` varchar(255) DEFAULT NULL,
  `ad_btn_text` varchar(255) DEFAULT NULL,
  `ad_link` text,
  `ad_action_text` varchar(255) DEFAULT NULL,
  `subscription_coins` int DEFAULT NULL,
  `status` tinyint NOT NULL DEFAULT '0' COMMENT '0=Inactive,1=Active',
  `added_on` timestamp NULL DEFAULT NULL,
  `updated_on` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_ads`
--

INSERT INTO `tbl_ads` (`id`, `ad_text_main`, `ad_text_mini`, `ad_btn_text`, `ad_link`, `ad_action_text`, `subscription_coins`, `status`, `added_on`, `updated_on`) VALUES
(1, 'Win Rs 50,000 Daraz Shopping Coupons ', 'Try 1 Day FREE & No Internet Charges ', 'Play Now ', 'https://business.igpl.pro/sandbox', 'GameNow Premier League (GPL) ', 500, 1, '2022-02-08 12:45:13', '0000-00-00 00:00:00'),
(2, 'Games Club', '1 day FREE trial', 'Play Now', 'https://business.igpl.pro/', NULL, 100, 1, '2022-02-08 12:45:13', '2022-02-08 12:45:13'),
(3, 'Game World  ', '1 day free trial  ', 'Play Now  ', 'https://business.igpl.pro/', '  ', 200, 1, '2022-02-08 12:45:13', '0000-00-00 00:00:00'),
(4, 'Lystn', 'Unlimited podcasts and radio', 'Try Now!', 'https://business.igpl.pro/', NULL, 100, 1, '2022-02-08 12:45:13', '2022-02-08 12:45:13'),
(5, 'Magical English', 'Powered By Disney', 'Try Now!', 'https://business.igpl.pro/', 'Free Trial', 100, 1, '2022-02-08 12:45:13', '2022-02-08 12:45:13'),
(6, 'JAZZ GAME ZONE', 'No ads, no in-app purchases, try 1 day free', 'Play Now', 'https://business.igpl.pro/', NULL, 100, 1, '2022-02-08 12:45:13', '2022-02-08 12:45:13');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ads_images`
--

CREATE TABLE `tbl_ads_images` (
  `id` int NOT NULL,
  `ad_id` int NOT NULL,
  `img_type` tinyint DEFAULT NULL COMMENT '1: Hero banner, 2: Vertical banner',
  `img_link` varchar(255) DEFAULT NULL,
  `img_gif` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_ads_images`
--

INSERT INTO `tbl_ads_images` (`id`, `ad_id`, `img_type`, `img_link`, `img_gif`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'ad1.webp', NULL, '2022-02-10 08:06:33', '2022-02-11 07:05:25'),
(2, 2, 1, 'ad2.webp', NULL, '2022-02-10 08:08:16', '2022-02-11 07:05:25'),
(3, 3, 1, 'ad3.webp', '4efa587bb6e45f759b89183801242e81.gif', '2022-02-10 08:08:30', '2022-02-11 07:06:14'),
(4, 4, 1, 'ad4.webp', NULL, '2022-02-10 08:08:54', '2022-02-11 07:05:25'),
(5, 5, 1, 'ad5.webp', NULL, '2022-02-10 08:08:54', '2022-02-11 07:05:25'),
(6, 6, 1, 'ad6.webp', NULL, '2022-02-10 08:08:54', '2022-02-11 07:05:25');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ci_sessions`
--

CREATE TABLE `tbl_ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(16) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int UNSIGNED NOT NULL DEFAULT '0',
  `user_data` text NOT NULL
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

CREATE TABLE `tbl_login` (
  `user_id` bigint NOT NULL,
  `name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(30) NOT NULL,
  `email` varchar(100) NOT NULL,
  `user_status` tinyint NOT NULL DEFAULT '1' COMMENT '1=active    2=inactive',
  `user_type` tinyint NOT NULL DEFAULT '1' COMMENT '1=Admin   2=User'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_login`
--

INSERT INTO `tbl_login` (`user_id`, `name`, `username`, `password`, `email`, `user_status`, `user_type`) VALUES
(1, 'Gamenow', 'admin', 'admin', 'admin@gmail.com', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_partners`
--

CREATE TABLE `tbl_partners` (
  `partner_id` bigint NOT NULL,
  `partner_name` varchar(255) NOT NULL,
  `partner_email` varchar(255) NOT NULL,
  `partner_username` varchar(255) NOT NULL,
  `partner_password` varchar(255) NOT NULL,
  `partner_website` text,
  `partner_status` tinyint NOT NULL DEFAULT '1' COMMENT '1=Active  2=Deleted',
  `partner_last_login` varchar(100) DEFAULT NULL,
  `partner_added_on` varchar(100) NOT NULL,
  `partner_updated_on` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_partners`
--

INSERT INTO `tbl_partners` (`partner_id`, `partner_name`, `partner_email`, `partner_username`, `partner_password`, `partner_website`, `partner_status`, `partner_last_login`, `partner_added_on`, `partner_updated_on`) VALUES
(1, 'Bemobi', 'test@gmail.com', 'bemobi_jazz', '$2y$10$4Xuyo9q9W5Pj.RMCk.Jyzerlw6iVYPWmvjvvYlKPJOM5QPrAKBrZ2', '', 1, NULL, '1630590269', '1630590269'),
(2, 'iGPL', 'vaish.nisha73@gmail.com', 'user_igpl', '$2y$10$GaOEgWrc0A6WAGe7R1Va2.Tir4JDPUhLfXY2SOKb6.BMglnL0qISa', '', 1, NULL, '1631348687', '1631348687'),
(3, 'Gameloft', 'test2@gmail.com', 'gameloft', '$2y$10$.5RnZiaJazULjV2ZzUnbK.ipCWEX4Tq9nAwSCtqaVLMcwMN6IgFhu', '', 1, NULL, '1633671109', '1633687987');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_partners_games`
--

CREATE TABLE `tbl_partners_games` (
  `game_id` bigint NOT NULL,
  `game_partner_id` bigint NOT NULL,
  `game_name` varchar(255) NOT NULL,
  `game_category` varchar(255) DEFAULT NULL,
  `game_genre` varchar(255) DEFAULT NULL,
  `game_desc` text,
  `game_tips` text,
  `game_how_to_play` text,
  `game_play_link` text NOT NULL,
  `game_apk_link` text,
  `game_thumbnail` text NOT NULL,
  `game_top_banner` tinyint NOT NULL DEFAULT '0',
  `game_page_banner` tinyint NOT NULL DEFAULT '0',
  `game_popular` tinyint NOT NULL DEFAULT '1',
  `game_mini_games` tinyint NOT NULL DEFAULT '0',
  `game_top_chart` tinyint NOT NULL DEFAULT '0',
  `game_tournament` tinyint NOT NULL DEFAULT '0',
  `game_most_played` tinyint NOT NULL DEFAULT '0',
  `game_free_to_play` tinyint NOT NULL DEFAULT '0',
  `game_status` tinyint NOT NULL DEFAULT '0' COMMENT '0=AddedOnly 1=Approved  2=Published  3=Reject  4=Inactive',
  `game_added_on` varchar(100) NOT NULL,
  `game_updated_on` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_partners_games`
--

INSERT INTO `tbl_partners_games` (`game_id`, `game_partner_id`, `game_name`, `game_category`, `game_genre`, `game_desc`, `game_tips`, `game_how_to_play`, `game_play_link`, `game_apk_link`, `game_thumbnail`, `game_top_banner`, `game_page_banner`, `game_popular`, `game_mini_games`, `game_top_chart`, `game_tournament`, `game_most_played`, `game_free_to_play`, `game_status`, `game_added_on`, `game_updated_on`) VALUES
(1, 1, 'Cut the Rope 2\n', 'Arcade', 'Arcade', '', '', '', 'http://apps.gamenow.com.pk/?utm_source=gamenow&utm_campaign=cut_the_rope2\n', '', '', 1, 1, 1, 1, 1, 1, 1, 1, 2, '1630590351', '1630590351'),
(2, 1, 'Subway Surfers', 'Arcade', 'Arcade', '', '', '', 'http://apps.gamenow.com.pk/?utm_source=gamenow&utm_campaign=subway_surfers', '', '', 0, 1, 1, 1, 1, 1, 1, 1, 2, '1630592303', '1630592303'),
(3, 1, 'Talking Tom Gold Run', 'Arcade', 'Arcade', '', '', '', 'http://apps.gamenow.com.pk/?utm_source=gamenow&utm_campaign=tom', '', '', 0, 1, 1, 1, 1, 1, 1, 1, 2, '1630657766', '1630657766'),
(4, 1, 'Hitman: Sniper', 'Arcade', 'Arcade', '', '', '', 'http://apps.gamenow.com.pk/?utm_source=gamenow&utm_campaign=hitman', '', '', 0, 1, 1, 1, 1, 1, 1, 1, 2, '1630657793', '1630657793'),
(5, 1, 'Dead Cellc', 'Arcade', 'Arcade', '', '', '', 'http://apps.gamenow.com.pk/?utm_source=gamenow&utm_campaign=dead_cellc', '', '', 1, 1, 1, 1, 1, 1, 1, 1, 2, '1630657823', '1630657823'),
(6, 2, 'Knife Ninja', 'Arcade', 'Arcade', '', '', '', 'https://business.igpl.pro/sandbox-d2c/knife-ninja/', '', '', 1, 1, 1, 1, 1, 1, 1, 1, 2, '1631348729', '1631348729'),
(7, 2, 'Color Switch', 'Arcade', 'Arcade', '', '', '', 'https://business.igpl.pro/sandbox-d2c/color-switch/', '', '', 0, 1, 1, 1, 1, 1, 1, 1, 2, '1632846787', '1632846787'),
(8, 2, 'Chase Racing Car', 'Arcade', 'Arcade', '', '', '', 'https://business.igpl.pro/sandbox-d2c/chase-racing-car/', '', '', 1, 1, 1, 1, 1, 1, 1, 1, 2, '1632847096', '1632847096'),
(9, 2, 'Leaves Boy', 'Arcade', 'Arcade', '', '', '', 'https://business.igpl.pro/sandbox-d2c/leaves-boy-v1/', '', '', 1, 1, 1, 1, 1, 1, 1, 1, 2, '1632847583', '1632847583'),
(14, 3, 'Asphalt Nitro 2', 'Action', 'Action', '', '', '', 'https://gameloft.gamenow.com.pk/product.php?adid=436222&product=4164', '', '', 1, 1, 1, 1, 1, 1, 1, 1, 2, '1633678697', '1633678697'),
(16, 3, 'Bridge Constructor: The Walking Dead', 'Puzzle', 'Puzzle', 'Join a group of survivors as they fight against hordes of undead walkers and a hostile human community. Build bridges and other constructions across bleak landscapes and ruined structures. Team up with fan-favorite characters like Daryl, Michonne and Eugene, and create safe passages for iconic vehicles from the series.\r\n', 'Prepare for the ultimate mashup experience!\r\n', 'Experience the fun of KILLING WALKERS using the POWER of your BRAIN!\r\n', 'https://gameloft.gamenow.com.pk/product.php?adid=436222&product=5497', '', '', 1, 1, 1, 1, 1, 1, 1, 1, 2, '1633684328', '1633684328'),
(17, 3, 'Sniper fury', 'Action', 'Action', 'STRIKE YOUR ENEMIES\r\nUse your sniping skills to strike against soldiers, vehicles & more! Diverse AI behavior makes each enemy unique and challenging to shoot & kill.\r\n\r\nGLOBAL HUNTER\r\nTravel to exotic locations around the world to take out high-profile targets. Shanghai, Washington, Dubai and more!\r\n\r\nSTUNNING 3D GRAPHICS\r\nBullet time and weather effects unlike those in any game will make your sniping action look good!\r\n\r\nUPGRADE YOUR FIREPOWER\r\nCollect sniper rifles, assault weapons and railguns. Unlock upgrades through missions and build the best arsenal!\r\n', 'Amazing 3D sniper FPS experience for fans of shooters and action games!\r\n', 'Unbelievable 3D graphics will bring you to the near future.\r\nDiverse AI behavior makes each enemy unique and challenging to shoot & kill.\r\nTravel around the globe to take out high-profile targets! \r\nCollect sniper rifles, assault rifles, railguns and top-secret weapons!\r\n', 'https://gameloft.gamenow.com.pk/product.php?adid=436222&product=4211', '', '', 1, 1, 1, 1, 1, 1, 1, 1, 2, '1633684393', '1633684393'),
(18, 3, 'Real Football 21', 'Sports', 'Sports', 'Join millions of Real Football fans and earn global football glory! Experience all the immersive action that makes the series a worldwide name!\r\nSKILLS\r\nImproved ball physics create the smoothest Real Football gameplay experience yet. Challenge the advanced AI, your perfect adaptive opponent!\r\nCOACHING\r\nBuild your dream team! Recruit star players or develop the potential of your rookies.\r\nLEGACY\r\nUpgrade your facilities to support your dream of becoming football\'s biggest franchise. \r\nHYPE\r\nImpressive 3D stadiums, polished textures and a life-like audience will make you feel like a star.\r\n', 'Master the greatest sport in the world: win matches, lead your team, dominate the season!\r\n', 'Make your move and take advantage of the improved gameplay to dominate the game!\r\nChallenge our advanced AI, the perfect adaptive opponent.\r\nBuild your dream team by recruiting star players or developing new talent!\r\nDominate the season by winning different events.\r\nUpgrade your team facilities and build your legacy!\r\nFeel the excitement of scoring the winning goal!\r\n', 'https://gameloft.gamenow.com.pk/product.php?adid=436222&product=4407', '', '', 1, 1, 1, 1, 1, 1, 1, 1, 2, '1633684471', '1633684471'),
(19, 3, 'MELBITS WORLD', 'Arcade ', 'Arcade ', 'Get ready for a cuteness overload! Melbits -- a bunch of happy and adorable creatures living behind your screen -- have encountered some dangers. Please come over and send them back home by overcoming the traps and the evil virus! You can customize them, too.\r\nMelbits World is a 3D puzzle-platformer video game developed by Melbot Studios -- with 6 different worlds, many challenging levels, crazy power-ups and several game modes! Collect all of the 6 rune stones and help get them back home!\r\n', 'Help the cutest pixies from the Internet find their way home!\r\n', 'Join the journey with Melbits World, a 3D puzzle-platformer game.\r\n', 'https://gameloft.gamenow.com.pk/product.php?adid=436222&product=5263', '', '', 1, 1, 1, 1, 1, 1, 1, 1, 2, '1633685847', '1633685847'),
(20, 3, 'TMNT Portal power', 'Action', 'Action', 'Help the Teenage Mutant Ninja Turtles travel through portals and fight evil in this action-packed street-fighting game. Play as all four Ninja Turtles at once as you punch, kick, power up and portal your way through outrageous dimensions to stop Shredder and the Kraang from unleashing another diabolical plot. Worlds collide with classic Kraang battles on the rooftops of New York and an ultimate Kraang Subprime showdown in the Technodrome.\r\n', 'Control each Ninja Turtle with a simple finger swipe to attack your opponents!\r\n', 'Official voices and animation from the people who bring you the Teenage Mutant Ninja Turtles TV show on Nick!\r\n', 'https://gameloft.gamenow.com.pk/product.php?adid=436222&product=4225', '', '', 1, 1, 1, 1, 1, 1, 1, 1, 2, '1633686268', '1633686268'),
(21, 3, 'Dead Cells', 'Action', 'Action', 'Death is not the end.\r\n\r\nPlay as a failed alchemy experiment and explore the sprawling, ever-changing castle to find out what happened on this gloomy island…! That is, assuming you’re able to fight your way past its keepers.\r\n\r\nDead Cells is a \"\"roguevania\"\" action-platformer from Motion Twin that will require you to master frantic 2D combat with a wide variety of weapons and skills against merciless minions and bosses.\r\n\r\nKill. Die. Learn. Repeat.\r\n', 'Play as a failed alchemy experiment and explore the sprawling, ever-changing castle\r\n', 'Master frantic 2D combat with a wide variety of weapons and skills against merciless minions and bosses\r\n', 'https://gameloft.gamenow.com.pk/product.php?adid=436222&product=4694', '', '', 1, 1, 1, 1, 1, 1, 1, 1, 2, '1633686330', '1633686330'),
(22, 3, 'Lara Croft Go', 'Puzzle', 'Puzzle', 'Lara Croft GO is a turn-based puzzle-adventure set in a long-forgotten world. Explore the ruins of an ancient civilization, discover well-kept secrets and face deadly challenges as you uncover the myth of the Queen of Venom.\r\nExperience lush visuals and a captivating soundtrack\r\nNavigate using simple swipe-to-move controls\r\nFight menacing enemies, overcome dangerous obstacles and escape deadly traps\r\nSolve more than 115 puzzles split into 7 chapters\r\nCollect ancient relics and unlock new outfits for Lara\r\n', 'Join Lara Croft in an amazing adventure: Explore a long-forgotten world and face deadly challenges.\r\n', 'Embark with Lara Croft on an epic, turn-based puzzle-adventure: Explore the ruins of an ancient civilization and face deadly challenges.\r\n', 'https://gameloft.gamenow.com.pk/product.php?adid=436222&product=4176', '', '', 1, 1, 1, 1, 1, 1, 1, 1, 2, '1633686388', '1633686388'),
(23, 3, 'Aces of the Luftwaffe - Squadron: Extended Edition', 'Arcade ', 'Arcade ', 'This game is an action-packed vertical scrolling shoot-’em-up with a fascinating and fully voiced narrative. Dodge bullets, collect massive power-ups and use special abilities wisely to defeat your enemies. Two campaigns with 50 levels in total, waves of various deadly enemies and a lot of epic boss fights. Are you up to the task?\r\nAction-packed shoot-’em-up with explosive special effects\r\nSkill trees with individual abilities for each wingman\r\nChallenging achievement system\r\nCaptivating storyline with fully voiced characters\r\n50 levels and exciting missions\r\n', 'The squadron has reached your mobile device! Face fearsome aerial war machines!\r\n', 'Lead your squadron to victory in two different campaigns, full of plot twists and legendary boss fights!\r\n', 'https://gameloft.gamenow.com.pk/product.php?adid=436222&product=5542', '', '', 1, 1, 1, 1, 1, 1, 1, 1, 2, '1633686582', '1633686582'),
(24, 3, 'The Lion Guard', 'Entertainment', 'Entertainment', 'Horizon Chase is a tribute to classic arcade racers from the 16-bit era. Race towards the horizon in an intense worldwide tour. With a visual style that mixes retro and modern elements, the game has easy-to-learn but difficult-to-master gameplay.\r\nCompete in 67 races in 7 cup competitions spread across 29 cities. Unlock 16 awesome cars as you perfect your driving skills. Push it to the max with a fast-paced soundtrack from Barry Leitch, the composer of Top Gear and the Lotus series.\r\n', 'Join Kion and the Lion Guard on an adventure to protect the Pride Lands!\r\n', 'Horizon Chase is a tribute to classic arcade racers from the 16-bit era, mixing retro and modern elements and fun and engaging gameplay\r\n', 'https://gameloft.gamenow.com.pk/product.php?adid=436222&product=4364', '', '', 1, 1, 1, 1, 1, 1, 1, 1, 2, '1633688528', '1633688528'),
(25, 3, 'Rest in Pieces', 'Arcade', 'Arcade', 'Help the drunken pirate Jack Parrot to vanquish the horrible sea monster Kraken. Save Father Lugosi from Count Dracula\'s bloodthirsty fangs. Rest in Pieces includes many souls to save, and several frightening nightmares to wake up from.\r\nKill bosses to wake yourself\r\nCollect Gems and unlock new figurines\r\nEach figurine has unique characteristics\r\nSave all 21 souls\r\nUnlock 7 deadly nightmares\r\n', 'Awaken little Georgina from her evil clown dream, woven with her worst fears.\r\n', 'Please save all the poor souls that have been trapped in the dream demon\'s porcelain nightmares.\r\n', 'https://gameloft.gamenow.com.pk/product.php?adid=436222&product=5261', '', '', 1, 1, 1, 1, 1, 1, 1, 1, 2, '1633688863', '1633688863'),
(26, 3, 'Spirit Roots', 'Action', 'Action', 'The inhabitants of all the planets decided that they would have to stop fighting in order to survive. So, they stitched together the remaining pieces of their worlds into one large planet with a single, absolute condition: No one could violate anyone else’s borders.\r\nFEATURES\r\n5 platformer worlds with completely different atmospheres, gameplay mechanics, and enemies\r\n50 levels of traditional action-platformer gameplay\r\nEpic boss battles\r\n', 'Encounter dangerous bosses, such as farmer robots shooting corn cannons at you!\r\n', 'Immerse yourself in a world populated by the many species of merciless flora and fauna.\r\n', 'https://gameloft.gamenow.com.pk/product.php?adid=436222&product=5194', '', '', 1, 1, 1, 1, 1, 1, 1, 1, 2, '1633688999', '1633688999'),
(27, 3, 'Bring Me Cakes', 'Puzzle & Logic, Adventure, Brain', 'Puzzle & Logic, Adventure, Brain', 'BRING ME CAKES is a brand-new puzzle game based on a famous fairy tale.\r\nYou are Little Red Riding Hood, carrying cakes to your sweet Granny, while swiping your way through the puzzling, maze-like woods, escaping funny wolves and meeting other weird creatures. The entire time, Granny is waiting and sending you funny text messages.\r\nDon’t make Granny upset! Bring her cakes!\r\n', 'Join Red Riding Hood on her journey through the puzzling woods!\r\n', 'Help Little Red Riding Hood along her fairy-tale journey.\r\nJoin a brand-new puzzler game!\r\n', 'https://gameloft.gamenow.com.pk/product.php?adid=436222&product=4442', '', '', 1, 1, 1, 1, 1, 1, 1, 1, 2, '1633689133', '1633689133'),
(28, 3, 'DuckTales: Remastered', 'Action', 'Action', 'Join Scrooge McDuck in an epic adventure across the world to discover the five Legendary Treasures! Embark on a journey to the Himalayas, Amazon, Transylvania, African mines, and Moon using Scrooge\'s secret map. But watch out for the evil sorceress Magica De Spell and the notorious Beagle Boys – they\'re on a quest to steal Scrooge\'s fortune and will stop at nothing. He may have to risk it all to save his nephews, Huey, Dewey and Louie, but not without epic boss fights along the way!\r\n', 'Join Scrooge McDuck in an adventure to discover the 5 Legendary Treasures!\r\n', 'One of the most cherished 8-bit titles of all time returns with the mobile release of DuckTales: Remastered!\r\n', 'https://gameloft.gamenow.com.pk/product.php?adid=436222&product=3928', '', '', 1, 1, 1, 1, 1, 1, 1, 1, 2, '1633689278', '1633689278'),
(29, 3, 'Tom and Jerry: Race & Chase', 'Puzzle', 'Puzzle', 'Help Jerry race through fun-packed levels collecting cheese while avoiding Tom in this classic game of cat and mouse. Use power-ups and everyday household objects to help Jerry stay one step ahead. Always keep an eye out for Tom and his friends, though, as they will be hot on your tail!\r\n', 'The lovable cartoon duo are at it again!\r\n', 'Jerry is hungry!\r\nEscape Tom and get the cheese while playing 3 entertaining game modes in multiple environments!\r\n', 'https://gameloft.gamenow.com.pk/product.php?adid=436222&product=5252', '', '', 1, 1, 1, 1, 1, 1, 1, 1, 2, '1633689972', '1633689972'),
(30, 3, 'Hitman GO', 'Puzzle', 'Puzzle', 'Hitman GO is a turn-based puzzle game with beautifully rendered diorama-style set pieces. You will strategically navigate fixed spaces on a grid to avoid enemies and take out your target or infiltrate well-guarded locations. You really have to think about each move; all the Hitman tools of the trade you would expect are included: disguises, distractions, sniper rifles and even 47’s iconic Silverballers.\r\n', 'Hitman GO is a turn-based puzzle game that puts your assassination skills to the test.\r\n', 'Hitman GO is a turn-based puzzle game with beautifully rendered diorama-style set pieces. Get your daily fix of Agent 47 with Hitman GO!\r\n', 'https://gameloft.gamenow.com.pk/product.php?adid=436222&product=4178', '', '', 1, 1, 1, 1, 1, 1, 1, 1, 2, '1633690090', '1633690090'),
(31, 3, 'Figment', 'Adventure', 'Adventure', 'Welcome to the world of Figment. A strange and surreal world; a place filled with our deepest thoughts, urges, and memories, populated by the many voices we hear in our heads.\r\n\r\nThis mind has been quiet and calm for many years. But something has changed. New thoughts have started to emerge, taking the shape of nightmarish creatures who spread fear wherever they go. The only hope is for grumpy Dusty, the mind\'s former voice of courage, to get back to his old self and help the mind to face its fears.\r\n', 'A musical action-adventure set in the recesses of the human mind...\r\n', 'Join Dusty and his ever-optimistic friend, Piper, on an adventure through the different parts of the mind to restore the courage that\'s been lost.\r\n', 'https://gameloft.gamenow.com.pk/product.php?adid=436222&product=5409', '', '', 1, 1, 1, 1, 1, 1, 1, 1, 2, '1633690195', '1633690195'),
(32, 3, 'N.O.V.A. Legacy', 'Games', 'Games', 'N.O.V.A. Legacy brings you the best sci-fi FPS experience from the epic first episode of the critically acclaimed N.O.V.A. saga  all in a compact 20 MB version.\r\nAn immersive shooter experience based on a renowned Gameloft FPS series in the same vein as Modern Combat:\r\nA CONSOLE-LIKE EXPERIENCE ON MOBILE\r\nDEFEAT ALIEN FORCES IN VARIOUS GAME MODES\r\nTEST YOUR SKILLS IN MULTIPLAYER ARENAS\r\n', 'N.O.V.A. Legacy brings you the best sci-fi FPS experience in a compact 20 MB version.\r\n', 'A console-like experience on mobile.\r\nDefeat alien forces in various game modes.\r\nTest your skills in multiplayer arenas.\r\nUpgrade weapons, from powerful assault rifles to devastating plasma guns.\r\nEnjoy the original N.O.V.A. shooter experience with enhanced graphics and gameplay.\r\nAll in a compact 20 MB version.\r\n', 'https://gameloft.gamenow.com.pk/product.php?adid=436222&product=2331', '', '', 1, 1, 1, 1, 1, 1, 1, 1, 2, '1633690317', '1633690317');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_partners_games_images`
--

CREATE TABLE `tbl_partners_games_images` (
  `img_id` bigint NOT NULL,
  `img_game_id` bigint NOT NULL,
  `img_type` tinyint NOT NULL DEFAULT '1' COMMENT '1=HeroBanner  2=PageBanner  3=LargThumb  4=MediumThumb  5=SmallThumb 6=HorizontalThumb  7=VerticleThumb   ',
  `img_link` text,
  `img_gif_link` text,
  `img_status` tinyint NOT NULL DEFAULT '0' COMMENT '0=UploadOnly   1=Approved  3=Rejected',
  `img_added_on` varchar(100) NOT NULL,
  `img_updated_on` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(63, 9, 7, '394b099c5fef0f0c29c82bfa32d045f9.jpg', 'ed77440613b8ae6ddcad36672f7c3dae.gif', 1, '1632847691', '1632847698'),
(64, 11, 1, '475453a383afb60199b47e5ebe8b7a4e.jpg', NULL, 1, '1633674026', '1633674026'),
(65, 11, 6, '29a206a6d4a7d6137b8f552327671990.jpg', NULL, 1, '1633674057', '1633674057'),
(66, 11, 5, 'dc9710631a45c499540d6c9be8eec362.jpg', NULL, 1, '1633674073', '1633674149'),
(67, 11, 7, '9ffb7a0c5e23d0d1d04afbdcb5eec65a.jpg', NULL, 1, '1633674176', '1633674176'),
(68, 11, 2, '1d1871a456eb1adf833774747ba7a2ab.jpg', NULL, 1, '1633674193', '1633674193'),
(69, 11, 3, '4b975b01beeba3c4fc5158e9c3ee9a50.jpg', NULL, 1, '1633674205', '1633674205'),
(70, 11, 4, '881a7eac52103c6f376db4b5345368d0.jpg', NULL, 1, '1633674214', '1633674214'),
(71, 12, 1, 'c18722325ad1c4283f3f618c5d067381.jpg', NULL, 1, '1633674865', '1633674865'),
(72, 12, 2, '35bb069b0e68dc99618481ba479f7a07.jpg', NULL, 1, '1633674871', '1633674871'),
(73, 12, 3, '52511915993347ef3e733c0e0ad98985.jpg', NULL, 1, '1633674876', '1633674876'),
(74, 12, 4, 'eb588918f1482d1973c0aa3bf107236b.jpg', NULL, 1, '1633674880', '1633674880'),
(75, 12, 5, '1644bfb9eb667eee297be09a80af9020.jpg', NULL, 1, '1633674885', '1633674885'),
(76, 12, 6, '06e2484dd4897cb8dee5783fe6de8864.jpg', NULL, 1, '1633674892', '1633674892'),
(77, 12, 7, '51262b1288f49613ca22d0ffa79edc03.jpg', NULL, 1, '1633674895', '1633674895'),
(78, 14, 1, '382976b5427d1ecbc7fad646becb205a.jpg', NULL, 1, '1633684093', '1633684093'),
(79, 14, 2, '0058eb1b6c380269ea40973e5fcbee94.jpg', NULL, 1, '1633684098', '1633684098'),
(80, 14, 3, '294cbdbcdfb31e794e6b1e68776cdca1.jpg', NULL, 1, '1633684102', '1633684102'),
(81, 14, 4, 'c3b345a289066f0b65badc7f460e8740.jpg', NULL, 1, '1633684106', '1633684106'),
(82, 14, 5, '2ac70e3bcfca8c58d66a412922490cd8.jpg', NULL, 1, '1633684110', '1633684110'),
(83, 14, 6, '0d61d20204ebf360cd436921cec2ce84.jpg', NULL, 1, '1633684114', '1633684114'),
(84, 14, 7, 'ce9d84c81a9362be59f263a4749097f2.jpg', NULL, 1, '1633684117', '1633684117'),
(85, 17, 1, 'beb08b8d7915f3556330334355055750.jpg', NULL, 1, '1633686654', '1633686654'),
(86, 17, 2, '05964fd3ed4ea251f8b707b3b67378ec.jpg', NULL, 1, '1633686666', '1633686666'),
(87, 17, 3, 'fabf52e7e989a9f8919a8cd44a23cd83.jpg', NULL, 1, '1633686672', '1633686672'),
(88, 17, 4, '03d4e884604dcdfc3f1111dcf31eb27f.jpg', NULL, 1, '1633686677', '1633686677'),
(89, 17, 5, '4b0f30c06a67aea69cab644a9e8a034c.jpg', NULL, 1, '1633686682', '1633686682'),
(90, 17, 6, 'ed0d37250f2ba9fcac347e9d2e7b7a5c.jpg', NULL, 1, '1633686691', '1633686691'),
(91, 17, 7, 'f9709db8e9b9f0a615efbb5463fa5250.jpg', NULL, 1, '1633686694', '1633686694'),
(92, 18, 1, 'ac10d751f81ea453218729ef34806d9c.jpg', NULL, 1, '1633686719', '1633686719'),
(93, 18, 2, 'a244ea9d0223a7a1a5d1c9b1e373fadb.jpg', NULL, 1, '1633686730', '1633686730'),
(94, 18, 3, '999fcc667c10e1b0398420eefc9d34c3.jpg', NULL, 1, '1633686735', '1633686735'),
(95, 18, 4, '7afddd51755b74c5f4cc01c73a992132.jpg', NULL, 1, '1633686742', '1633686742'),
(96, 18, 5, 'e443a8f9d7bf99c4fca11a89473fb0f3.jpg', NULL, 1, '1633686747', '1633686747'),
(97, 18, 6, '3e0e067db9c5e3c9a780b79c4b4b8654.jpg', NULL, 1, '1633686751', '1633686757'),
(98, 18, 7, '24fc604dae4ee81be2d99495ab793bcc.jpg', NULL, 1, '1633686759', '1633686759'),
(99, 19, 1, '1a00769b86de79d199534b26baf793c4.jpg', NULL, 1, '1633686778', '1633686778'),
(100, 19, 2, '9bc7c5e0bd8a021321f179edf4d7efbc.jpg', NULL, 1, '1633686789', '1633686789'),
(101, 19, 3, '80b6c5fc4fd727de5adc214112cd0eed.jpg', NULL, 1, '1633686797', '1633686797'),
(102, 19, 4, '5e2b73d3478ecc21586850dfbf8351ec.jpg', NULL, 1, '1633686802', '1633686802'),
(103, 19, 5, '42396b871e3faa25a46c21de5e635590.jpg', NULL, 1, '1633686807', '1633686807'),
(104, 19, 6, '13fc09cb792318950eb217b39b89ba4e.jpg', NULL, 1, '1633686810', '1633686810'),
(105, 19, 7, '914a46c89cb8ce45c761bc153276ddcc.jpg', NULL, 1, '1633686814', '1633686814'),
(106, 16, 1, '60be4a7675d34bb35f195c290f0b578a.jpg', NULL, 1, '1633686849', '1633686849'),
(107, 16, 2, '288e5a91c7bad71b4234f24304ecd8f7.jpg', NULL, 1, '1633686852', '1633686852'),
(108, 16, 3, 'aa926b4c4c241ea5d4c96f13125c7858.jpg', NULL, 1, '1633686860', '1633686860'),
(109, 16, 4, '4597d0ee807f18b826dd5da7f494c5ba.jpg', NULL, 1, '1633686863', '1633686863'),
(110, 16, 5, '1f7516b6c18fb22a6fa06e29c0f6ce72.jpg', NULL, 1, '1633686870', '1633686870'),
(111, 16, 6, '97328ae61b37db776ccb42e5cb4b1af0.jpg', NULL, 1, '1633686875', '1633686875'),
(112, 16, 7, '46ceb484985418589b7c3ac038cec56a.jpg', NULL, 1, '1633686879', '1633686879'),
(113, 20, 1, '9968ec6fce62e9f758a1fa18280f7c23.jpg', NULL, 1, '1633687576', '1633687576'),
(114, 20, 2, '2d17f579c34e5057d5864037fc5ede54.jpg', NULL, 1, '1633687588', '1633687588'),
(115, 20, 3, 'c59882466f0608e3e25cd25b49c96c26.jpg', NULL, 1, '1633687598', '1633687598'),
(116, 20, 4, '21438452e4445fcd4a409826fa440501.jpg', NULL, 1, '1633687607', '1633687607'),
(117, 20, 5, '9d4030d68dc5443b47f377eb30bf4504.jpg', NULL, 1, '1633687635', '1633687635'),
(118, 20, 6, 'be0b45356548bac2021d868df65350c4.jpg', NULL, 1, '1633687644', '1633687644'),
(119, 20, 7, 'c956b6d39851a5d12283e05eee480733.jpg', NULL, 1, '1633687657', '1633687666'),
(120, 21, 1, '7118fba9f388b0b558b6dbe5620f29b9.jpg', NULL, 1, '1633687684', '1633687684'),
(121, 21, 2, 'd628bd8cef7124761e1ba8818bd9cd1e.jpg', NULL, 1, '1633687688', '1633687688'),
(122, 21, 3, 'bae1df24b6ade99e0524e562cfbbda9e.jpg', NULL, 1, '1633687695', '1633687695'),
(123, 21, 4, '4e8737ca32e90f5f5a9259403d215163.jpg', NULL, 1, '1633687699', '1633687699'),
(124, 21, 5, 'e105c6034ef7a8083bed10a750b27ac9.jpg', NULL, 1, '1633687703', '1633687703'),
(125, 21, 6, 'aeb0743c550a24c676fbaf52c0dc6d32.jpg', NULL, 1, '1633687708', '1633687708'),
(126, 21, 7, '6b669c2a4fd9fbd088f7c509dd8862ff.jpg', NULL, 1, '1633687712', '1633687712'),
(127, 22, 1, '6e1c3360f09d3dfcb0ac3004be8da86d.jpg', NULL, 1, '1633687737', '1633687737'),
(128, 22, 2, '8346ed86cd627e342702bc2c1170db57.jpg', NULL, 1, '1633687745', '1633687745'),
(129, 22, 3, '7234ce502cc7a67b1f8f231ccdb01140.jpg', NULL, 1, '1633687757', '1633687757'),
(130, 22, 4, 'ef0acb00b7152fa1f70ca8d5c68598a3.jpg', NULL, 1, '1633687761', '1633687761'),
(131, 22, 5, '16dfcce2d57735f8bc7663bc45668084.jpg', NULL, 1, '1633687771', '1633687771'),
(132, 22, 6, 'dd1ef82c2950f58425e566b48a7fa1be.jpg', NULL, 1, '1633687782', '1633687782'),
(133, 22, 7, 'ecf814521f02f1dcc1a93b9c086c8ff3.jpg', NULL, 1, '1633687800', '1633687800'),
(134, 23, 1, 'e70041bcd28518a602d88116ba18d2c4.jpg', NULL, 1, '1633687829', '1633687829'),
(135, 23, 2, '76ba7c249ff256178397048040068478.jpg', NULL, 1, '1633687831', '1633687831'),
(136, 23, 3, '1c97a57ae80c46bf0ff6294032697500.jpg', NULL, 1, '1633687835', '1633687835'),
(137, 23, 4, 'd6e3c0fb59feaaef5a58b9c97936a73a.jpg', NULL, 1, '1633687838', '1633687838'),
(138, 23, 5, 'c5e3a7f60ee888c9dca491ad01810be4.jpg', NULL, 1, '1633687841', '1633687841'),
(139, 23, 6, '1981cb6abee96e153647d143aa31bb7b.jpg', NULL, 1, '1633687844', '1633687844'),
(140, 23, 7, 'd178e26ce03b00231441aa3d6738b327.jpg', NULL, 1, '1633687846', '1633687846'),
(141, 24, 1, '112511a2f49c21ddf210a71a67fbe36c.jpg', NULL, 1, '1633688673', '1633688673'),
(142, 24, 2, '55737dc76962ce7898b4c45b9a7e2da1.jpg', NULL, 1, '1633688684', '1633688684'),
(143, 24, 3, 'ebc66e7f4000049cb1b6113a357607b0.jpg', NULL, 1, '1633688690', '1633688690'),
(144, 24, 4, 'c16c27cd4506acc425d072526404ee18.jpg', NULL, 1, '1633688699', '1633688699'),
(145, 24, 5, 'a518382b2b3f3f6f8462c6c4d44fc16f.jpg', NULL, 1, '1633688707', '1633688707'),
(146, 24, 6, 'f63a82d292d22786bd8632bafe11b8a6.jpg', NULL, 1, '1633688752', '1633688752'),
(147, 24, 7, 'ac69476f2adf1ab3644124fbe276ae31.jpg', NULL, 1, '1633688765', '1633688765'),
(148, 25, 1, '8c487ea99a770927eef12b6243699a78.jpg', NULL, 1, '1633688883', '1633688883'),
(149, 25, 2, '246d7a7e302c8975ffdceeeb8439d493.jpg', NULL, 1, '1633688890', '1633688890'),
(150, 25, 3, 'c36e5994cc12e646382665950bf71aa0.jpg', NULL, 1, '1633688896', '1633688896'),
(151, 25, 4, '635561504780df15c187a0216d2d3a04.jpg', NULL, 1, '1633688903', '1633688903'),
(152, 25, 5, 'ab8312fdcdb3b7100212487220bec6b0.jpg', NULL, 1, '1633688908', '1633688908'),
(153, 25, 6, '5693b456712bfaec88cba862398ada3f.jpg', NULL, 1, '1633688917', '1633688917'),
(154, 25, 7, '4ae541f9aa7e31d77f1c661844df7741.jpg', NULL, 1, '1633688920', '1633688920'),
(155, 26, 1, '103d52570da52eaa7834c2ffe709d2a0.jpg', NULL, 1, '1633689026', '1633689026'),
(156, 26, 2, 'd32bc30002f6c4b50eeab9db355ad550.jpg', NULL, 1, '1633689031', '1633689031'),
(157, 26, 3, 'b89b68f67ea2e4b7884e1227b11c91c8.jpg', NULL, 1, '1633689037', '1633689037'),
(158, 26, 4, '195a7075d7506819736630ce83b9a97f.jpg', NULL, 1, '1633689045', '1633689045'),
(159, 26, 5, '27111bdd787ff41bbc3500c80a638d1f.jpg', NULL, 1, '1633689053', '1633689053'),
(160, 26, 6, 'fc0e524dc7e46d52fa3282bb34954621.jpg', NULL, 1, '1633689063', '1633689063'),
(161, 26, 7, 'c8d695d18b291bf7612e76793a7d4578.jpg', NULL, 1, '1633689069', '1633689069'),
(162, 27, 1, 'e96a0fcd69711f52175bdf9b85ba2161.jpg', NULL, 1, '1633689192', '1633689192'),
(163, 27, 2, '6f24d9c0fc35ddef426af7b5902d47e3.jpg', NULL, 1, '1633689196', '1633689196'),
(164, 27, 3, 'c3be1a66bdaa542477e0d312fc9ff83c.jpg', NULL, 1, '1633689200', '1633689200'),
(165, 27, 4, '86948cc4aed0eef6d081669962b3ea58.jpg', NULL, 1, '1633689206', '1633689206'),
(166, 27, 5, '3d61185e3c4954b43127fdb539548bd2.jpg', NULL, 1, '1633689209', '1633689209'),
(167, 27, 6, '2b496061c271cb4a48a4dc7c0fa7ec81.jpg', NULL, 1, '1633689212', '1633689212'),
(168, 27, 7, '186157187703544d4d99732acab838ae.jpg', NULL, 1, '1633689216', '1633689216'),
(169, 28, 1, '36a40b522e7c06dd71d0792529aed1ed.jpg', NULL, 1, '1633689340', '1633689340'),
(170, 28, 2, '6860e90820466144ee6f5a9ef14f7fa0.jpg', NULL, 1, '1633689345', '1633689345'),
(171, 28, 3, '511a27c338f079ea0e0abe1f7105d880.jpg', NULL, 1, '1633689357', '1633689357'),
(172, 28, 4, 'd278dd608c1f4d4156eedaafb41fc0e5.jpg', NULL, 1, '1633689361', '1633689361'),
(173, 28, 5, '44f73a3d562b6d38c7ec7f6b5af0de93.jpg', NULL, 1, '1633689366', '1633689366'),
(174, 28, 6, 'cb234268a498076f94fe297069d845c7.jpg', NULL, 1, '1633689371', '1633689371'),
(175, 28, 7, '3f92287979c24759b48c31d10c5e6f1a.jpg', NULL, 1, '1633689375', '1633689375'),
(176, 29, 1, '035ca6e96578ec070975829f1d6239b9.jpg', NULL, 1, '1633690000', '1633690000'),
(177, 29, 2, '383a310dc29429cf9529ed9ca632173d.jpg', NULL, 1, '1633690004', '1633690004'),
(178, 29, 3, '6c16090199da67382e93a26d30908ac8.jpg', NULL, 1, '1633690011', '1633690011'),
(179, 29, 4, 'd0a1d9940b3cdda0aa1d7c78c40cca4d.jpg', NULL, 1, '1633690015', '1633690015'),
(180, 29, 5, '3d8b932168f8ea33add52553f7b4d74e.jpg', NULL, 1, '1633690019', '1633690019'),
(181, 29, 6, '7198735c228c6f5633e30330db86b8ab.jpg', NULL, 1, '1633690023', '1633690023'),
(182, 29, 7, '796d8b3e6c90bc7455532ec41069df8a.jpg', NULL, 1, '1633690027', '1633690027'),
(183, 30, 1, 'bdb451b6db73149288b579c6c0a0fb86.jpg', NULL, 1, '1633690108', '1633690108'),
(184, 30, 2, '1d9fc8a82b1fd5eb441727bba635393c.jpg', NULL, 1, '1633690115', '1633690115'),
(185, 30, 3, '4c2e59311bfdbf43d7f13598ea75d91c.jpg', NULL, 1, '1633690126', '1633690126'),
(186, 30, 4, 'cdabbbaa19ce75e41febe3ba2772589e.jpg', NULL, 1, '1633690134', '1633690134'),
(187, 30, 5, 'a7f003ecea655113eacc94ef2eedcb69.jpg', NULL, 1, '1633690139', '1633690139'),
(188, 30, 6, 'f2926a5cf532353a6c2ae9ab1801a6e1.jpg', NULL, 1, '1633690144', '1633690144'),
(189, 30, 7, '7ecc95cc21985c19b6f50ec6ca5f17cf.jpg', NULL, 1, '1633690148', '1633690148'),
(190, 31, 1, '7f0bc0ca1d70f26bf41d08f0c9c5db11.jpg', NULL, 1, '1633690223', '1633690223'),
(191, 31, 2, '6ebf7b536b9a2056667ff042a3fdc632.jpg', NULL, 1, '1633690233', '1633690233'),
(192, 31, 3, 'd581f717b268eeb0924580441cce44e5.jpg', NULL, 1, '1633690240', '1633690240'),
(193, 31, 4, 'cbdfd4b2159cb2ee0b3d10e2b9010660.jpg', NULL, 1, '1633690246', '1633690246'),
(194, 31, 5, 'bc2d4f113fe1ad07226cc39ebf0bea0d.jpg', NULL, 1, '1633690253', '1633690253'),
(195, 31, 6, '14b0de297873e79edc9ff09a81bbac21.jpg', NULL, 1, '1633690256', '1633690256'),
(196, 31, 7, 'd35c2dc797ddd5fee2674f3c7b783b6e.jpg', NULL, 1, '1633690260', '1633690260'),
(197, 32, 1, 'a410a77284a8e84aef072ba9b2197b10.jpg', NULL, 1, '1633690345', '1633690345'),
(198, 32, 2, '6cc19607b0a1aa3624662f17f235e735.jpg', NULL, 1, '1633690352', '1633690352'),
(199, 32, 3, '73812786ada8e26d1d9fab2f84001df4.jpg', NULL, 1, '1633690359', '1633690359'),
(200, 32, 4, '1a47d15f57518fbebad8778715965039.jpg', NULL, 1, '1633690367', '1633690367'),
(201, 32, 5, '96272e3620047d7d51adae94c17062b4.jpg', NULL, 1, '1633690374', '1633690374'),
(202, 32, 6, '5609103c1ef48830bcac25f4944aa650.jpg', NULL, 1, '1633690385', '1633690385'),
(203, 32, 7, 'ae4089c7ea7a95aa1499a8e71339bc69.jpg', NULL, 1, '1633690390', '1633690390');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_partners_games_images_old`
--

CREATE TABLE `tbl_partners_games_images_old` (
  `img_id` bigint NOT NULL,
  `img_game_id` bigint NOT NULL,
  `img_type` tinyint NOT NULL DEFAULT '1' COMMENT '1=HeroBanner  2=HeroBannerGIF  3=PageBanner  4=PageBannerGIF  5=LargThumb  6=LargThumbGIF  7=MediumThumb  8=MediumThumbGIF  9=SmallThumb  10=SmallThumbGIF  11=VerticleThumb  12=VerticleThumbGIF   13=HorizontalThumb   14=HorizontalThumbGIF',
  `img_link` text NOT NULL,
  `img_status` tinyint NOT NULL DEFAULT '0' COMMENT '0=UploadOnly   1=Approved  3=Rejected',
  `img_added_on` varchar(100) NOT NULL,
  `img_updated_on` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
-- Table structure for table `tbl_partners_tournaments`
--

CREATE TABLE `tbl_partners_tournaments` (
  `tournament_id` bigint NOT NULL,
  `tournament_partner_id` bigint NOT NULL,
  `tournament_name` varchar(255) NOT NULL,
  `tournament_start_date` date NOT NULL,
  `tournament_end_date` date NOT NULL,
  `tournament_play_link` text NOT NULL,
  `tournament_status` tinyint NOT NULL DEFAULT '0' COMMENT '0=AddedOnly 1=Approved  2=Published  3=Reject  4=Inactive',
  `tournament_added_on` varchar(100) NOT NULL,
  `tournament_updated_on` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_partners_tournaments`
--

INSERT INTO `tbl_partners_tournaments` (`tournament_id`, `tournament_partner_id`, `tournament_name`, `tournament_start_date`, `tournament_end_date`, `tournament_play_link`, `tournament_status`, `tournament_added_on`, `tournament_updated_on`) VALUES
(1, 1, 'test1', '2022-02-10', '2022-02-10', 'http://localhost/Gamenow-V2/index.php/site/home', 2, '1644315048', '1644476115');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tournament_images`
--

CREATE TABLE `tbl_tournament_images` (
  `tour_img_id` int NOT NULL,
  `tour_img_tournament_id` varchar(255) NOT NULL,
  `tour_img_type` tinyint DEFAULT NULL COMMENT '1 = Hero banner 2 = Vertical banner',
  `tour_img_img_link` varchar(255) NOT NULL,
  `tour_img_img_gif` varchar(255) NOT NULL,
  `tour_img_created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_tournament_images`
--

INSERT INTO `tbl_tournament_images` (`tour_img_id`, `tour_img_tournament_id`, `tour_img_type`, `tour_img_img_link`, `tour_img_img_gif`, `tour_img_created_at`) VALUES
(1, '1', 1, '', '288069783101c8ec3b7ee85aca08dea6.gif', '2021-10-26 07:36:56'),
(2, '1', 2, 'c0d42dc4be9c1688aee2d0b47ba98a32.jpg', '', '2021-10-26 07:38:24');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `user_id` bigint NOT NULL,
  `user_name` varchar(255) DEFAULT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_phone` bigint DEFAULT NULL,
  `user_img` text,
  `user_otp` int DEFAULT NULL,
  `user_ip` text,
  `user_last_login` varchar(255) NOT NULL,
  `user_login_type` tinyint NOT NULL DEFAULT '1' COMMENT '1=manual,  2=FB  3=Google',
  `user_id_token` text COMMENT 'used for FB and Google login only',
  `user_status` tinyint NOT NULL DEFAULT '1' COMMENT '0=OTPSent  1=Active  2=Deleted',
  `coins` int DEFAULT NULL,
  `user_registered_on` varchar(50) NOT NULL,
  `user_last_updated` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`user_id`, `user_name`, `user_email`, `user_phone`, `user_img`, `user_otp`, `user_ip`, `user_last_login`, `user_login_type`, `user_id_token`, `user_status`, `coins`, `user_registered_on`, `user_last_updated`) VALUES
(1, NULL, '', 9729081679, 'http://localhost/Gamenow-V2/uploads/site_users/1.png', 766086, '::1', '2021-09-14 22:40:44', 1, NULL, 0, NULL, '1631598649', '1631639444'),
(2, NULL, '', 8729081679, 'http://localhost/Gamenow-V2/uploads/site_users/8.png', 157714, '::1', '2021-09-14 22:44:54', 1, NULL, 1, NULL, '1631639694', '1631639694'),
(3, NULL, '', 9876542347, 'http://localhost/Gamenow-V2/uploads/site_users/default.png', 706657, '::1', '2022-02-11 23:33:31', 1, NULL, 1, 100, '1644602611', '1644602611');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_avatar`
--

CREATE TABLE `tbl_user_avatar` (
  `id` int NOT NULL,
  `img` varchar(100) NOT NULL,
  `type` tinyint NOT NULL DEFAULT '1' COMMENT '1=Male   2=Female'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_ads`
--
ALTER TABLE `tbl_ads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_ads_images`
--
ALTER TABLE `tbl_ads_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_ci_sessions`
--
ALTER TABLE `tbl_ci_sessions`
  ADD PRIMARY KEY (`session_id`),
  ADD KEY `last_activity_idx` (`last_activity`);

--
-- Indexes for table `tbl_login`
--
ALTER TABLE `tbl_login`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `tbl_partners`
--
ALTER TABLE `tbl_partners`
  ADD PRIMARY KEY (`partner_id`);

--
-- Indexes for table `tbl_partners_games`
--
ALTER TABLE `tbl_partners_games`
  ADD PRIMARY KEY (`game_id`);

--
-- Indexes for table `tbl_partners_games_images`
--
ALTER TABLE `tbl_partners_games_images`
  ADD PRIMARY KEY (`img_id`);

--
-- Indexes for table `tbl_partners_games_images_old`
--
ALTER TABLE `tbl_partners_games_images_old`
  ADD PRIMARY KEY (`img_id`);

--
-- Indexes for table `tbl_partners_tournaments`
--
ALTER TABLE `tbl_partners_tournaments`
  ADD PRIMARY KEY (`tournament_id`);

--
-- Indexes for table `tbl_tournament_images`
--
ALTER TABLE `tbl_tournament_images`
  ADD PRIMARY KEY (`tour_img_id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `tbl_user_avatar`
--
ALTER TABLE `tbl_user_avatar`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_ads`
--
ALTER TABLE `tbl_ads`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_ads_images`
--
ALTER TABLE `tbl_ads_images`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_login`
--
ALTER TABLE `tbl_login`
  MODIFY `user_id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_partners`
--
ALTER TABLE `tbl_partners`
  MODIFY `partner_id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_partners_games`
--
ALTER TABLE `tbl_partners_games`
  MODIFY `game_id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `tbl_partners_games_images`
--
ALTER TABLE `tbl_partners_games_images`
  MODIFY `img_id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=204;

--
-- AUTO_INCREMENT for table `tbl_partners_games_images_old`
--
ALTER TABLE `tbl_partners_games_images_old`
  MODIFY `img_id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `tbl_partners_tournaments`
--
ALTER TABLE `tbl_partners_tournaments`
  MODIFY `tournament_id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_tournament_images`
--
ALTER TABLE `tbl_tournament_images`
  MODIFY `tour_img_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `user_id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_user_avatar`
--
ALTER TABLE `tbl_user_avatar`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
