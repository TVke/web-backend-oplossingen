-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Dec 13, 2016 at 08:20 AM
-- Server version: 5.6.33
-- PHP Version: 7.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `opdracht-security-login`
--

-- --------------------------------------------------------

--
-- Table structure for table `artikels`
--

CREATE TABLE `artikels` (
  `id` int(11) NOT NULL,
  `titel` text NOT NULL,
  `artikel` text NOT NULL,
  `datum` date NOT NULL,
  `is_active` int(1) NOT NULL,
  `is_archived` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `kernwoorden`
--

CREATE TABLE `kernwoorden` (
  `id` int(11) NOT NULL,
  `kernwoorden` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `kernwoorden_linken`
--

CREATE TABLE `kernwoorden_linken` (
  `id` int(11) NOT NULL,
  `artikel_id` int(11) NOT NULL,
  `kernwoord_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `salt` varchar(255) NOT NULL,
  `hashed_password` varchar(255) NOT NULL,
  `last_login_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `artikels`
--
ALTER TABLE `artikels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kernwoorden`
--
ALTER TABLE `kernwoorden`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kernwoorden_linken`
--
ALTER TABLE `kernwoorden_linken`
  ADD PRIMARY KEY (`id`),
  ADD KEY `artikel_id` (`artikel_id`),
  ADD KEY `kernwoord_id` (`kernwoord_id`),
  ADD KEY `artikel_id_2` (`artikel_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `artikels`
--
ALTER TABLE `artikels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `kernwoorden`
--
ALTER TABLE `kernwoorden`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `kernwoorden_linken`
--
ALTER TABLE `kernwoorden_linken`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `kernwoorden_linken`
--
ALTER TABLE `kernwoorden_linken`
  ADD CONSTRAINT `kernwoorden_linken_ibfk_1` FOREIGN KEY (`artikel_id`) REFERENCES `artikels` (`id`),
  ADD CONSTRAINT `kernwoorden_linken_ibfk_2` FOREIGN KEY (`kernwoord_id`) REFERENCES `kernwoorden` (`id`);
