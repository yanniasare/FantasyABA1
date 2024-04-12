-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 12, 2024 at 07:27 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fantasy`
--

-- --------------------------------------------------------

--
-- Table structure for table `aba_team`
--

CREATE TABLE `aba_team` (
  `team_id` int(11) NOT NULL,
  `team_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `aba_team`
--

INSERT INTO `aba_team` (`team_id`, `team_name`) VALUES
(1, 'Ash Knights'),
(2, 'Longshots'),
(3, 'Hillblazers'),
(4, 'Berekuso Warriors'),
(5, 'Los Ashtros');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `course_id` int(11) NOT NULL,
  `course_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_id`, `course_name`) VALUES
(1, 'Business Administration'),
(2, 'MIS'),
(3, 'Computer Science'),
(4, 'Engineer'),
(5, 'Economics');

-- --------------------------------------------------------

--
-- Table structure for table `game`
--

CREATE TABLE `game` (
  `game_id` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `home_team_id` int(11) DEFAULT NULL,
  `away_team_id` int(11) DEFAULT NULL,
  `home_team_score` int(11) DEFAULT NULL,
  `away_team_score` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `league`
--

CREATE TABLE `league` (
  `league_id` int(11) NOT NULL,
  `league_name` varchar(255) DEFAULT NULL,
  `league_type` varchar(50) DEFAULT NULL,
  `creator_user_id` int(11) DEFAULT NULL,
  `max_teams` int(11) DEFAULT NULL,
  `join_code` varchar(10) DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL,
  `aba_team_id` int(11) DEFAULT NULL,
  `start_gameweek` int(11) DEFAULT NULL,
  `scoring_system` varchar(50) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `league_participant`
--

CREATE TABLE `league_participant` (
  `league_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `league_standings`
--

CREATE TABLE `league_standings` (
  `league_id` int(11) DEFAULT NULL,
  `team_id` int(11) DEFAULT NULL,
  `position` int(11) DEFAULT NULL,
  `total_points` int(11) DEFAULT NULL,
  `total_rebounds` int(11) DEFAULT NULL,
  `total_assists` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `league_team`
--

CREATE TABLE `league_team` (
  `league_id` int(11) NOT NULL,
  `team_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `player`
--

CREATE TABLE `player` (
  `player_id` int(11) NOT NULL,
  `player_name` varchar(255) DEFAULT NULL,
  `team_name` varchar(255) DEFAULT NULL,
  `position` varchar(50) DEFAULT NULL,
  `statistics` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`statistics`)),
  `bench_priority` int(11) DEFAULT NULL,
  `purchase_salary` decimal(10,2) DEFAULT NULL,
  `selling_salary` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `player`
--

INSERT INTO `player` (`player_id`, `player_name`, `team_name`, `position`, `statistics`, `bench_priority`, `purchase_salary`, `selling_salary`) VALUES
(1, 'Sean', 'Ash Knights', 'Front Court', '{\"points\": 10, \"rebounds\": 5, \"assists\": 3}', NULL, 6.00, NULL),
(2, 'Sugri', 'Longshots', 'Back Court', '{\"points\": 15, \"rebounds\": 3, \"assists\": 8}', NULL, 11.00, NULL),
(3, 'Player 3', 'HillBlazers', 'Front Court', '{\"points\": 20, \"rebounds\": 10, \"assists\": 2}', NULL, 10.00, NULL),
(4, 'Player 4', 'Berekuso Warriors', 'Back Court', '{\"points\": 12, \"rebounds\": 2, \"assists\": 7}', NULL, 6.00, NULL),
(5, 'Player 5', 'Los Ashtros', 'Front Court', '{\"points\": 8, \"rebounds\": 7, \"assists\": 4}', NULL, 7.00, NULL),
(6, 'Boss Baeta', 'Ash Knights', 'Back Court', '{\"points\": 18, \"rebounds\": 4, \"assists\": 6}', NULL, 9.00, NULL),
(7, 'Ayo', 'Longshots', 'Front Court', '{\"points\": 14, \"rebounds\": 8, \"assists\": 5}', NULL, 11.00, NULL),
(8, 'Player 8', 'HillBlazers', 'Back Court', '{\"points\": 9, \"rebounds\": 3, \"assists\": 9}', NULL, 11.00, NULL),
(9, 'Player 9', 'Berekuso Warriors', 'Front Court', '{\"points\": 21, \"rebounds\": 10, \"assists\": 1}', NULL, 10.00, NULL),
(10, 'Player 10', 'Los Ashtros', 'Back Court', '{\"points\": 15, \"rebounds\": 2, \"assists\": 10}', NULL, 7.00, NULL),
(11, 'Elton', 'Ash Knights', 'Front Court', '{\"points\": 12, \"rebounds\": 6, \"assists\": 7}', NULL, 5.00, NULL),
(12, 'Asare', 'Longshots', 'Back Court', '{\"points\": 17, \"rebounds\": 3, \"assists\": 4}', NULL, 7.00, NULL),
(13, 'Player 13', 'HillBlazers', 'Front Court', '{\"points\": 19, \"rebounds\": 10, \"assists\": 2}', NULL, 7.00, NULL),
(14, 'Player 14', 'Berekuso Warriors', 'Back Court', '{\"points\": 13, \"rebounds\": 2, \"assists\": 8}', NULL, 10.00, NULL),
(15, 'Player 15', 'Los Ashtros', 'Front Court', '{\"points\": 11, \"rebounds\": 7, \"assists\": 5}', NULL, 5.00, NULL),
(16, 'Charles', 'Ash Knights', 'Back Court', '{\"points\": 20, \"rebounds\": 4, \"assists\": 6}', NULL, 10.00, NULL),
(17, 'Sewe', 'Longshots', 'Front Court', '{\"points\": 16, \"rebounds\": 8, \"assists\": 3}', NULL, 11.00, NULL),
(18, 'Player 18', 'HillBlazers', 'Back Court', '{\"points\": 10, \"rebounds\": 3, \"assists\": 9}', NULL, 7.00, NULL),
(19, 'Player 19', 'Berekuso Warriors', 'Front Court', '{\"points\": 18, \"rebounds\": 10, \"assists\": 1}', NULL, 10.00, NULL),
(20, 'Player 20', 'Los Ashtros', 'Back Court', '{\"points\": 16, \"rebounds\": 2, \"assists\": 11}', NULL, 11.00, NULL),
(21, 'Benson', 'Ash Knights', 'Front Court', '{\"points\": 13, \"rebounds\": 7, \"assists\": 5}', NULL, 8.00, NULL),
(22, 'Player 22', 'Longshots', 'Back Court', '{\"points\": 19, \"rebounds\": 4, \"assists\": 3}', NULL, 7.00, NULL),
(23, 'Player 23', 'HillBlazers', 'Front Court', '{\"points\": 11, \"rebounds\": 10, \"assists\": 1}', NULL, 9.00, NULL),
(24, 'Player 24', 'Berekuso Warriors', 'Back Court', '{\"points\": 14, \"rebounds\": 2, \"assists\": 9}', NULL, 5.00, NULL),
(25, 'Player 25', 'Los Ashtros', 'Front Court', '{\"points\": 17, \"rebounds\": 7, \"assists\": 4}', NULL, 9.00, NULL),
(26, 'Pascal', 'Ash Knights', 'Back Court', '{\"points\": 15, \"rebounds\": 4, \"assists\": 6}', NULL, 10.00, NULL),
(27, 'Player 27', 'Longshots', 'Front Court', '{\"points\": 18, \"rebounds\": 8, \"assists\": 3}', NULL, 5.00, NULL),
(28, 'Player 28', 'HillBlazers', 'Back Court', '{\"points\": 12, \"rebounds\": 3, \"assists\": 8}', NULL, 6.00, NULL),
(29, 'Player 29', 'Berekuso Warriors', 'Front Court', '{\"points\": 19, \"rebounds\": 10, \"assists\": 1}', NULL, 8.00, NULL),
(30, 'Player 30', 'Los Ashtros', 'Back Court', '{\"points\": 17, \"rebounds\": 2, \"assists\": 10}', NULL, 6.00, NULL),
(31, 'Kwamena', 'Ash Knights', 'Front Court', '{\"points\": 13, \"rebounds\": 7, \"assists\": 5}', NULL, 6.00, NULL),
(32, 'Player 32', 'Longshots', 'Back Court', '{\"points\": 20, \"rebounds\": 4, \"assists\": 6}', NULL, 9.00, NULL),
(33, 'Player 33', 'HillBlazers', 'Front Court', '{\"points\": 16, \"rebounds\": 8, \"assists\": 3}', NULL, 8.00, NULL),
(34, 'Player 34', 'Berekuso Warriors', 'Back Court', '{\"points\": 11, \"rebounds\": 3, \"assists\": 8}', NULL, 7.00, NULL),
(35, 'Player 35', 'Los Ashtros', 'Front Court', '{\"points\": 19, \"rebounds\": 10, \"assists\": 1}', NULL, 8.00, NULL),
(36, 'Leslie', 'Ash Knights', 'Back Court', '{\"points\": 15, \"rebounds\": 4, \"assists\": 7}', NULL, 7.00, NULL),
(37, 'Player 37', 'Longshots', 'Front Court', '{\"points\": 18, \"rebounds\": 8, \"assists\": 3}', NULL, 7.00, NULL),
(38, 'Player 38', 'HillBlazers', 'Back Court', '{\"points\": 13, \"rebounds\": 3, \"assists\": 9}', NULL, 9.00, NULL),
(39, 'Player 39', 'Berekuso Warriors', 'Front Court', '{\"points\": 17, \"rebounds\": 10, \"assists\": 1}', NULL, 11.00, NULL),
(40, 'Player 40', 'Los Ashtros', 'Back Court', '{\"points\": 14, \"rebounds\": 2, \"assists\": 11}', NULL, 9.00, NULL),
(41, 'Bernard', 'Ash Knights', 'Front Court', '{\"points\": 12, \"rebounds\": 7, \"assists\": 5}', NULL, 10.00, NULL),
(42, 'Player 42', 'Longshots', 'Back Court', '{\"points\": 19, \"rebounds\": 4, \"assists\": 4}', NULL, 11.00, NULL),
(43, 'Player 43', 'HillBlazers', 'Front Court', '{\"points\": 11, \"rebounds\": 10, \"assists\": 1}', NULL, 11.00, NULL),
(44, 'Player 44', 'Berekuso Warriors', 'Back Court', '{\"points\": 16, \"rebounds\": 2, \"assists\": 9}', NULL, 7.00, NULL),
(45, 'Player 45', 'Los Ashtros', 'Front Court', '{\"points\": 18, \"rebounds\": 7, \"assists\": 4}', NULL, 8.00, NULL),
(46, 'Ato', 'Ash Knights', 'Back Court', '{\"points\": 14, \"rebounds\": 4, \"assists\": 6}', NULL, 9.00, NULL),
(47, 'Player 47', 'Longshots', 'Front Court', '{\"points\": 19, \"rebounds\": 8, \"assists\": 3}', NULL, 11.00, NULL),
(48, 'Player 48', 'HillBlazers', 'Back Court', '{\"points\": 12, \"rebounds\": 3, \"assists\": 8}', NULL, 11.00, NULL),
(49, 'Player 49', 'Berekuso Warriors', 'Front Court', '{\"points\": 17, \"rebounds\": 10, \"assists\": 1}', NULL, 7.00, NULL),
(50, 'Player 50', 'Los Ashtros', 'Back Court', '{\"points\": 16, \"rebounds\": 2, \"assists\": 10}', NULL, 5.00, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `position`
--

CREATE TABLE `position` (
  `position_id` int(11) NOT NULL,
  `position` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `position`
--

INSERT INTO `position` (`position_id`, `position`) VALUES
(1, 'Front Court'),
(2, 'Back Court');

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE `team` (
  `team_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `team_name` varchar(255) DEFAULT NULL,
  `favorite_team` varchar(255) DEFAULT NULL,
  `total_points` int(11) DEFAULT NULL,
  `total_rebounds` int(11) DEFAULT NULL,
  `total_assists` int(11) DEFAULT NULL,
  `lineup_selection` tinyint(1) DEFAULT 0,
  `captain_id` int(11) DEFAULT NULL,
  `vice_captain_id` int(11) DEFAULT NULL,
  `free_transfers` int(11) DEFAULT 2,
  `saved_transfer` tinyint(1) DEFAULT 0,
  `wildcard` tinyint(1) DEFAULT 0,
  `go_big_chip` tinyint(1) DEFAULT 0,
  `go_small_chip` tinyint(1) DEFAULT 0,
  `wildcard_chip_count` int(11) DEFAULT 3
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `team`
--

INSERT INTO `team` (`team_id`, `user_id`, `team_name`, `favorite_team`, `total_points`, `total_rebounds`, `total_assists`, `lineup_selection`, `captain_id`, `vice_captain_id`, `free_transfers`, `saved_transfer`, `wildcard`, `go_big_chip`, `go_small_chip`, `wildcard_chip_count`) VALUES
(1, 22, 'Project', 'AshKnights', NULL, NULL, NULL, 0, NULL, NULL, 2, 0, 0, 0, 0, 3),
(2, 23, 'Weezy', 'Longshots', NULL, NULL, NULL, 0, NULL, NULL, 2, 0, 0, 0, 0, 3);

-- --------------------------------------------------------

--
-- Table structure for table `team_player`
--

CREATE TABLE `team_player` (
  `team_id` int(11) NOT NULL,
  `player_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `registration_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `favorite_team` varchar(255) DEFAULT NULL,
  `course_offered` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `email`, `password`, `registration_date`, `favorite_team`, `course_offered`) VALUES
(22, 'Yanni Asare', 'yanni.asare@gmail.com', '$2y$10$o7BFD4rNo1jqaX.UfuqyK.gE60A5ip8e4o8nwnD4/8MIb6Dffjvwa', '2024-04-11 09:24:07', 'Longshots', 'compsci'),
(23, 'Paa Kwesi Atobrah', 'pkatobrah1@gmail.com', '$2y$10$Zdn2bMS8nUyZnX2Qy/29LOVjabKP8ZK0YILi9TjukToAhXSGfv9hG', '2024-04-11 18:47:08', 'AshKnights', 'mis');

-- --------------------------------------------------------

--
-- Table structure for table `user_selections`
--

CREATE TABLE `user_selections` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `player_name` varchar(255) DEFAULT NULL,
  `position` varchar(50) DEFAULT NULL,
  `purchase_salary` decimal(10,2) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_selections`
--

INSERT INTO `user_selections` (`id`, `user_id`, `player_name`, `position`, `purchase_salary`, `created_at`) VALUES
(1, 22, 'Sean', 'Front Court', 6.00, '2024-04-11 22:30:38'),
(2, 22, 'Sugri', 'Back Court', 11.00, '2024-04-11 22:30:38'),
(3, 22, 'Player 3', 'Front Court', 10.00, '2024-04-11 22:30:38'),
(4, 22, 'Player 4', 'Back Court', 6.00, '2024-04-11 22:30:38'),
(5, 22, 'Player 5', 'Front Court', 7.00, '2024-04-11 22:30:38'),
(6, 22, 'Boss Baeta', 'Back Court', 9.00, '2024-04-11 22:30:38'),
(7, 22, 'Ayo', 'Front Court', 11.00, '2024-04-11 22:30:38'),
(8, 22, 'Player 8', 'Back Court', 11.00, '2024-04-11 22:30:38'),
(9, 22, 'Player 9', 'Front Court', 10.00, '2024-04-11 22:30:38'),
(10, 22, 'Player 10', 'Back Court', 7.00, '2024-04-11 22:30:38');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aba_team`
--
ALTER TABLE `aba_team`
  ADD PRIMARY KEY (`team_id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `game`
--
ALTER TABLE `game`
  ADD PRIMARY KEY (`game_id`),
  ADD KEY `home_team_id` (`home_team_id`),
  ADD KEY `away_team_id` (`away_team_id`);

--
-- Indexes for table `league`
--
ALTER TABLE `league`
  ADD PRIMARY KEY (`league_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `league_participant`
--
ALTER TABLE `league_participant`
  ADD PRIMARY KEY (`league_id`,`user_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `league_standings`
--
ALTER TABLE `league_standings`
  ADD KEY `league_id` (`league_id`),
  ADD KEY `team_id` (`team_id`);

--
-- Indexes for table `league_team`
--
ALTER TABLE `league_team`
  ADD PRIMARY KEY (`league_id`,`team_id`),
  ADD KEY `team_id` (`team_id`);

--
-- Indexes for table `player`
--
ALTER TABLE `player`
  ADD PRIMARY KEY (`player_id`);

--
-- Indexes for table `position`
--
ALTER TABLE `position`
  ADD PRIMARY KEY (`position_id`);

--
-- Indexes for table `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`team_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `team_player`
--
ALTER TABLE `team_player`
  ADD PRIMARY KEY (`team_id`,`player_id`),
  ADD KEY `player_id` (`player_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_selections`
--
ALTER TABLE `user_selections`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `team`
--
ALTER TABLE `team`
  MODIFY `team_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `user_selections`
--
ALTER TABLE `user_selections`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `game`
--
ALTER TABLE `game`
  ADD CONSTRAINT `game_ibfk_1` FOREIGN KEY (`home_team_id`) REFERENCES `team` (`team_id`),
  ADD CONSTRAINT `game_ibfk_2` FOREIGN KEY (`away_team_id`) REFERENCES `team` (`team_id`);

--
-- Constraints for table `league`
--
ALTER TABLE `league`
  ADD CONSTRAINT `league_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `league_participant`
--
ALTER TABLE `league_participant`
  ADD CONSTRAINT `league_participant_ibfk_1` FOREIGN KEY (`league_id`) REFERENCES `league` (`league_id`),
  ADD CONSTRAINT `league_participant_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `league_standings`
--
ALTER TABLE `league_standings`
  ADD CONSTRAINT `league_standings_ibfk_1` FOREIGN KEY (`league_id`) REFERENCES `league` (`league_id`),
  ADD CONSTRAINT `league_standings_ibfk_2` FOREIGN KEY (`team_id`) REFERENCES `team` (`team_id`);

--
-- Constraints for table `league_team`
--
ALTER TABLE `league_team`
  ADD CONSTRAINT `league_team_ibfk_1` FOREIGN KEY (`league_id`) REFERENCES `league` (`league_id`),
  ADD CONSTRAINT `league_team_ibfk_2` FOREIGN KEY (`team_id`) REFERENCES `team` (`team_id`);

--
-- Constraints for table `team`
--
ALTER TABLE `team`
  ADD CONSTRAINT `team_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `team_player`
--
ALTER TABLE `team_player`
  ADD CONSTRAINT `team_player_ibfk_1` FOREIGN KEY (`team_id`) REFERENCES `team` (`team_id`),
  ADD CONSTRAINT `team_player_ibfk_2` FOREIGN KEY (`player_id`) REFERENCES `player` (`player_id`);

--
-- Constraints for table `user_selections`
--
ALTER TABLE `user_selections`
  ADD CONSTRAINT `user_selections_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
