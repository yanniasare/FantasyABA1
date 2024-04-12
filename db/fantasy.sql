-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 09, 2024 at 11:07 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

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

-- User Table
CREATE TABLE User (
    user_id INT PRIMARY KEY, -- Define user_id as the primary key
    username VARCHAR(50),
    email VARCHAR(255),
    password VARCHAR(255),
    registration_date TIMESTAMP NOT NULL DEFAULT current_timestamp(),
    favorite_team VARCHAR(255),
    course_offered VARCHAR(255)
);

ALTER TABLE `User`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;

-- Player Table
CREATE TABLE `Player` (
    `player_id` INT PRIMARY KEY,
    `player_name` VARCHAR(255),
    `team_name` VARCHAR(255),
    `position` VARCHAR(50),
    statistics JSON
);

-- Team Table
CREATE TABLE `Team` (
    `team_id` INT PRIMARY KEY,
    `user_id` INT,
    `team_name` VARCHAR(255),
    `favorite_team` VARCHAR(255), -- New column for favorite team
    `total_points` INT,
    `total_rebounds` INT,
    `total_assists` INT,
    FOREIGN KEY (user_id) REFERENCES User(user_id)
);

-- Team_Player Table (Many-to-Many Relationship)
CREATE TABLE Team_Player (
    team_id INT,
    player_id INT,
    FOREIGN KEY (team_id) REFERENCES Team(team_id),
    FOREIGN KEY (player_id) REFERENCES Player(player_id),
    PRIMARY KEY (team_id, player_id)
);

-- Game Table
CREATE TABLE Game (
    game_id INT PRIMARY KEY,
    date DATE,
    home_team_id INT,
    away_team_id INT,
    home_team_score INT,
    away_team_score INT,
    FOREIGN KEY (home_team_id) REFERENCES Team(team_id),
    FOREIGN KEY (away_team_id) REFERENCES Team(team_id)
);




-- League Table
CREATE TABLE League (
    league_id INT PRIMARY KEY,
    league_name VARCHAR(255),
    league_type VARCHAR(50), -- Private, Public, Global
    creator_user_id INT, -- User ID of the league creator
    max_teams INT, -- Maximum number of teams allowed in the league
    join_code VARCHAR(10), -- Unique code for joining private leagues
    course_id INT, -- Foreign key referencing the course table for global leagues
    aba_team_id INT, -- Foreign key referencing the ABA team table for global leagues
    start_gameweek INT, -- Starting gameweek for global leagues
    scoring_system VARCHAR(50), -- Classic scoring or other scoring systems
    user_id INT, -- Owner of the league
    `start_date` DATE,
    end_date DATE,
    FOREIGN KEY (user_id) REFERENCES User(user_id)
);

-- Course Table
CREATE TABLE Course (
    course_id INT PRIMARY KEY,
    course_name VARCHAR(255)
);

INSERT INTO `course` (`course_id`, `course_name`) VALUES
(1, 'Business Administration'),
(2, 'MIS'),
(3, 'Computer Science'),
(4, 'Engineer'),
(5, 'Economics');

-- ABA_Team Table
CREATE TABLE ABA_Team (
    team_id INT PRIMARY KEY,
    team_name VARCHAR(255)
);

INSERT INTO `ABA_team` (`team_id`, `team_name`) VALUES
(1, 'Ash Knights'),
(2, 'Longshots'),
(3, 'Hillblazers'),
(4, 'Berekuso Warriors'),
(5, 'Los Ashtros');

-- League_Participant Table (Many-to-Many Relationship)
CREATE TABLE League_Participant (
    league_id INT,
    user_id INT,
    PRIMARY KEY (league_id, user_id),
    FOREIGN KEY (league_id) REFERENCES League(league_id),
    FOREIGN KEY (user_id) REFERENCES User(user_id)
);

-- League_Team Table (Many-to-Many Relationship)
CREATE TABLE League_Team (
    league_id INT,
    team_id INT,
    PRIMARY KEY (league_id, team_id),
    FOREIGN KEY (league_id) REFERENCES League(league_id),
    FOREIGN KEY (team_id) REFERENCES Team(team_id)
);

-- League_Standings Table
CREATE TABLE League_Standings (
    league_id INT,
    team_id INT,
    position INT,
    total_points INT,
    total_rebounds INT,
    total_assists INT,
    FOREIGN KEY (league_id) REFERENCES League(league_id),
    FOREIGN KEY (team_id) REFERENCES Team(team_id)
);

-- Update Team Table
ALTER TABLE Team 
ADD COLUMN lineup_selection BOOLEAN DEFAULT FALSE, -- Indicates whether the lineup has been selected for the Gameday
ADD COLUMN captain_id INT, -- Foreign key referencing the player_id of the captain
ADD COLUMN vice_captain_id INT, -- Foreign key referencing the player_id of the vice-captain
ADD COLUMN free_transfers INT DEFAULT 2, -- Number of free transfers available for the team
ADD COLUMN saved_transfer BOOLEAN DEFAULT FALSE, -- Indicates whether the team has a saved transfer
ADD COLUMN wildcard BOOLEAN DEFAULT FALSE, -- Indicates whether the team has played a wildcard
ADD COLUMN go_big_chip BOOLEAN DEFAULT FALSE, -- Indicates whether the team has played the Go Big chip
ADD COLUMN go_small_chip BOOLEAN DEFAULT FALSE, -- Indicates whether the team has played the Go Small chip
ADD COLUMN wildcard_chip_count INT DEFAULT 3;

-- Update Player Table
ALTER TABLE Player 
ADD COLUMN bench_priority INT, -- Priority assigned to the player for bench substitutions
ADD COLUMN purchase_salary DECIMAL(10, 2), -- Salary at which the player was purchased
ADD COLUMN selling_salary DECIMAL(10, 2); -- Selling salary of the player


