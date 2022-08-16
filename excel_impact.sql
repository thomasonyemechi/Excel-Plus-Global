-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 16, 2022 at 09:08 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `excel_impact`
--

-- --------------------------------------------------------

--
-- Table structure for table `agent`
--

CREATE TABLE `agent` (
  `sn` bigint(20) UNSIGNED NOT NULL,
  `agent` varchar(32) DEFAULT NULL,
  `freq` int(8) NOT NULL DEFAULT 1,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(1) NOT NULL DEFAULT 1,
  `id` varchar(16) DEFAULT NULL,
  `ctime` int(10) NOT NULL DEFAULT 0,
  `title` varchar(55) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `award`
--

CREATE TABLE `award` (
  `sn` int(12) NOT NULL,
  `id` varchar(32) DEFAULT NULL,
  `stg` int(2) DEFAULT NULL,
  `level` int(2) DEFAULT NULL,
  `amount` varchar(8) NOT NULL DEFAULT '0',
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `remark` varchar(55) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `clientsupport`
--

CREATE TABLE `clientsupport` (
  `id` int(11) NOT NULL,
  `trno` varchar(16) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `amount` float NOT NULL,
  `rechargeid` varchar(55) NOT NULL,
  `requestdate` varchar(15) NOT NULL,
  `mssg` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `compensation`
--

CREATE TABLE `compensation` (
  `sn` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(30) NOT NULL,
  `No` varchar(5) NOT NULL,
  `starter` varchar(20) NOT NULL,
  `basic` varchar(20) NOT NULL,
  `standard` varchar(20) NOT NULL,
  `premium` varchar(20) NOT NULL,
  `professional` varchar(20) NOT NULL,
  `elite` varchar(20) NOT NULL,
  `executive` varchar(20) NOT NULL,
  `director` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `incentive`
--

CREATE TABLE `incentive` (
  `sn` bigint(20) UNSIGNED NOT NULL,
  `id` varchar(16) DEFAULT NULL,
  `incentive` varchar(255) DEFAULT NULL,
  `stage` int(6) DEFAULT NULL,
  `level` int(6) DEFAULT NULL,
  `status` int(2) NOT NULL DEFAULT 0,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `trno` varchar(16) DEFAULT NULL,
  `ctime` int(10) NOT NULL DEFAULT 0,
  `remark` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `levelbonus`
--

CREATE TABLE `levelbonus` (
  `sn` bigint(20) UNSIGNED NOT NULL,
  `level` int(11) NOT NULL,
  `stage` int(2) NOT NULL DEFAULT 0,
  `stagelevel` int(2) NOT NULL DEFAULT 0,
  `amount` int(11) NOT NULL,
  `matrix` int(6) NOT NULL DEFAULT 0,
  `incentive` int(6) NOT NULL DEFAULT 0,
  `stepout` int(6) NOT NULL DEFAULT 0,
  `item` varchar(255) NOT NULL,
  `title` varchar(225) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `logatt`
--

CREATE TABLE `logatt` (
  `sn` bigint(20) UNSIGNED NOT NULL,
  `id` varchar(16) DEFAULT NULL,
  `bal` float DEFAULT NULL,
  `amount` int(8) DEFAULT NULL,
  `item` varchar(55) DEFAULT NULL,
  `ctime` varchar(12) DEFAULT NULL,
  `agent` varchar(24) DEFAULT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `logdraw`
--

CREATE TABLE `logdraw` (
  `sn` int(16) NOT NULL,
  `id` varchar(12) DEFAULT NULL,
  `id2` varchar(55) DEFAULT NULL,
  `inibalance` varchar(12) DEFAULT NULL,
  `amount` varchar(12) DEFAULT NULL,
  `finalbalance` varchar(12) DEFAULT NULL,
  `ymd` varchar(8) DEFAULT NULL,
  `ww` varchar(6) DEFAULT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `tno` varchar(16) DEFAULT NULL,
  `status` varchar(55) DEFAULT NULL,
  `type` varchar(16) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `logpay`
--

CREATE TABLE `logpay` (
  `sn` bigint(20) NOT NULL,
  `id` varchar(16) DEFAULT NULL,
  `ref` varchar(12) DEFAULT NULL,
  `amount` float NOT NULL DEFAULT 0,
  `status` varchar(2) NOT NULL DEFAULT '1',
  `type` varchar(10) DEFAULT NULL,
  `ctime` int(10) DEFAULT 0,
  `created` timestamp NULL DEFAULT current_timestamp(),
  `event` varchar(5000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `msg`
--

CREATE TABLE `msg` (
  `sn` int(12) NOT NULL,
  `msg` varchar(5000) NOT NULL,
  `senderid` varchar(16) DEFAULT '1',
  `receiverid` varchar(16) DEFAULT NULL,
  `reply` bigint(16) DEFAULT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `ctime` int(10) NOT NULL DEFAULT 0,
  `active` int(2) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `sn` int(12) NOT NULL,
  `qty` int(4) DEFAULT NULL,
  `buy` varchar(4) DEFAULT NULL,
  `details` varchar(255) DEFAULT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` int(2) NOT NULL DEFAULT 0,
  `type` varchar(55) DEFAULT NULL,
  `id` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `payoutorder`
--

CREATE TABLE `payoutorder` (
  `sn` bigint(20) UNSIGNED NOT NULL,
  `id` varchar(55) NOT NULL,
  `name` varchar(150) NOT NULL,
  `totalpt` int(11) DEFAULT 0,
  `remark` varchar(150) NOT NULL,
  `paidstatus` int(2) NOT NULL DEFAULT 0,
  `ctime` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pin`
--

CREATE TABLE `pin` (
  `sn` bigint(20) UNSIGNED NOT NULL,
  `pin` varchar(16) DEFAULT NULL,
  `created` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `rep` varchar(55) DEFAULT NULL,
  `id` varchar(25) NOT NULL DEFAULT '0',
  `used` varchar(12) DEFAULT '0',
  `status` varchar(2) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `replymsg`
--

CREATE TABLE `replymsg` (
  `sn` bigint(20) UNSIGNED NOT NULL,
  `mid` int(9) DEFAULT NULL,
  `reply` varchar(1500) DEFAULT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `setup`
--

CREATE TABLE `setup` (
  `sn` bigint(20) UNSIGNED NOT NULL,
  `regfee` int(10) DEFAULT NULL,
  `refbonus` int(10) DEFAULT NULL,
  `stage1` int(10) DEFAULT NULL,
  `stage2` int(10) DEFAULT NULL,
  `stage3` int(10) DEFAULT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `rep` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `temporary_user`
--

CREATE TABLE `temporary_user` (
  `sn` bigint(20) UNSIGNED NOT NULL,
  `id` varchar(64) DEFAULT '0',
  `firstname` varchar(55) DEFAULT NULL,
  `lastname` varchar(55) DEFAULT NULL,
  `sponsor` int(8) NOT NULL DEFAULT 0,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `email` varchar(55) DEFAULT NULL,
  `sex` varchar(8) DEFAULT NULL,
  `user` varchar(55) DEFAULT NULL,
  `pass` varchar(86) DEFAULT NULL,
  `phone` varchar(25) DEFAULT NULL,
  `status` int(2) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `sn` bigint(20) UNSIGNED NOT NULL,
  `id` varchar(64) DEFAULT '0',
  `firstname` varchar(55) DEFAULT NULL,
  `lastname` varchar(55) DEFAULT NULL,
  `sponsor` int(8) NOT NULL DEFAULT 0,
  `a1` int(8) NOT NULL DEFAULT 0,
  `a2` int(8) NOT NULL DEFAULT 0,
  `a3` int(8) NOT NULL DEFAULT 0,
  `a4` int(8) NOT NULL DEFAULT 0,
  `a5` int(8) NOT NULL DEFAULT 0,
  `a6` int(8) NOT NULL DEFAULT 0,
  `a7` int(8) NOT NULL DEFAULT 0,
  `a8` int(8) NOT NULL DEFAULT 0,
  `a9` int(8) NOT NULL DEFAULT 0,
  `a10` int(8) NOT NULL DEFAULT 0,
  `a11` int(8) NOT NULL DEFAULT 0,
  `a12` int(8) NOT NULL DEFAULT 0,
  `a13` int(8) NOT NULL DEFAULT 0,
  `a14` int(8) NOT NULL DEFAULT 0,
  `a15` int(8) NOT NULL DEFAULT 0,
  `a16` int(8) NOT NULL DEFAULT 0,
  `a17` int(8) NOT NULL DEFAULT 0,
  `a18` int(8) NOT NULL DEFAULT 0,
  `g` int(6) NOT NULL DEFAULT 0,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `mm` int(6) NOT NULL DEFAULT 0,
  `active` int(2) NOT NULL DEFAULT 0,
  `sp` int(6) NOT NULL DEFAULT 0,
  `level` int(2) DEFAULT 0,
  `stage` int(1) NOT NULL DEFAULT 1,
  `email` varchar(55) DEFAULT NULL,
  `sex` varchar(8) DEFAULT NULL,
  `country` varchar(55) DEFAULT NULL,
  `state` varchar(22) DEFAULT NULL,
  `city` varchar(22) DEFAULT NULL,
  `address` varchar(225) DEFAULT NULL,
  `dob` varchar(55) DEFAULT NULL,
  `accname` varchar(55) DEFAULT NULL,
  `bank` varchar(55) DEFAULT NULL,
  `accountno` varchar(10) DEFAULT NULL,
  `user` varchar(55) DEFAULT NULL,
  `pass` varchar(86) DEFAULT NULL,
  `phone` varchar(25) DEFAULT NULL,
  `status` int(2) NOT NULL DEFAULT 1,
  `photo` varchar(55) DEFAULT NULL,
  `code` varchar(80) DEFAULT NULL,
  `pin` varchar(16) DEFAULT NULL,
  `a` int(8) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `wallet`
--

CREATE TABLE `wallet` (
  `sn` bigint(20) UNSIGNED NOT NULL,
  `trno` bigint(14) DEFAULT NULL,
  `id` varchar(12) DEFAULT NULL,
  `sin` float NOT NULL DEFAULT 0,
  `cos` float NOT NULL DEFAULT 0,
  `tan` float NOT NULL DEFAULT 0,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `ctime` int(10) DEFAULT 0,
  `status` int(2) NOT NULL DEFAULT 2,
  `type` int(2) NOT NULL DEFAULT 0,
  `level` int(2) NOT NULL DEFAULT 0,
  `stage` int(2) NOT NULL DEFAULT 0,
  `remark` varchar(255) DEFAULT NULL,
  `rep` varchar(12) DEFAULT NULL,
  `opt` varchar(255) DEFAULT NULL,
  `bonus` int(11) NOT NULL,
  `agent` varchar(32) NOT NULL DEFAULT '0',
  `incentive` bigint(20) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `walletorder`
--

CREATE TABLE `walletorder` (
  `sn` bigint(20) UNSIGNED NOT NULL,
  `trno` varchar(14) DEFAULT NULL,
  `id` varchar(12) DEFAULT NULL,
  `amount` varchar(25) DEFAULT NULL,
  `amount2` float DEFAULT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `ctime` int(10) DEFAULT 0,
  `status` int(2) NOT NULL DEFAULT 0,
  `date` varchar(10) DEFAULT '',
  `ref` varchar(36) DEFAULT NULL,
  `approvedate` int(10) NOT NULL DEFAULT 0,
  `photo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `webhook`
--

CREATE TABLE `webhook` (
  `sn` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(225) DEFAULT NULL,
  `id` varchar(255) DEFAULT NULL,
  `data` longtext DEFAULT NULL,
  `type` varchar(225) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `withdraw`
--

CREATE TABLE `withdraw` (
  `sn` int(16) NOT NULL,
  `id` varchar(32) DEFAULT NULL,
  `id2` varchar(55) DEFAULT NULL,
  `inibalance` varchar(12) DEFAULT NULL,
  `amount` varchar(12) DEFAULT NULL,
  `finalbalance` varchar(12) DEFAULT NULL,
  `ymd` varchar(8) DEFAULT NULL,
  `ww` varchar(6) DEFAULT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `tno` varchar(16) DEFAULT NULL,
  `status` varchar(55) DEFAULT NULL,
  `type` varchar(55) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `withdrawal`
--

CREATE TABLE `withdrawal` (
  `sn` bigint(20) UNSIGNED NOT NULL,
  `trno` varchar(14) NOT NULL,
  `id` varchar(12) NOT NULL,
  `amount` float NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `ctime` int(10) NOT NULL,
  `status` int(2) NOT NULL DEFAULT 0,
  `dates` int(10) DEFAULT 0,
  `otpcode` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agent`
--
ALTER TABLE `agent`
  ADD UNIQUE KEY `sn` (`sn`);

--
-- Indexes for table `award`
--
ALTER TABLE `award`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `clientsupport`
--
ALTER TABLE `clientsupport`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `compensation`
--
ALTER TABLE `compensation`
  ADD UNIQUE KEY `sn` (`sn`);

--
-- Indexes for table `incentive`
--
ALTER TABLE `incentive`
  ADD PRIMARY KEY (`sn`),
  ADD UNIQUE KEY `sn` (`sn`);

--
-- Indexes for table `levelbonus`
--
ALTER TABLE `levelbonus`
  ADD UNIQUE KEY `sn` (`sn`);

--
-- Indexes for table `logatt`
--
ALTER TABLE `logatt`
  ADD UNIQUE KEY `sn` (`sn`);

--
-- Indexes for table `logdraw`
--
ALTER TABLE `logdraw`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `logpay`
--
ALTER TABLE `logpay`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `msg`
--
ALTER TABLE `msg`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `payoutorder`
--
ALTER TABLE `payoutorder`
  ADD UNIQUE KEY `sn` (`sn`);

--
-- Indexes for table `pin`
--
ALTER TABLE `pin`
  ADD PRIMARY KEY (`sn`),
  ADD UNIQUE KEY `sn` (`sn`);

--
-- Indexes for table `replymsg`
--
ALTER TABLE `replymsg`
  ADD UNIQUE KEY `sn` (`sn`);

--
-- Indexes for table `setup`
--
ALTER TABLE `setup`
  ADD UNIQUE KEY `sn` (`sn`);

--
-- Indexes for table `temporary_user`
--
ALTER TABLE `temporary_user`
  ADD UNIQUE KEY `sn` (`sn`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`sn`),
  ADD UNIQUE KEY `sn` (`sn`);

--
-- Indexes for table `wallet`
--
ALTER TABLE `wallet`
  ADD UNIQUE KEY `sn` (`sn`);

--
-- Indexes for table `walletorder`
--
ALTER TABLE `walletorder`
  ADD UNIQUE KEY `sn` (`sn`);

--
-- Indexes for table `webhook`
--
ALTER TABLE `webhook`
  ADD UNIQUE KEY `sn` (`sn`);

--
-- Indexes for table `withdraw`
--
ALTER TABLE `withdraw`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `withdrawal`
--
ALTER TABLE `withdrawal`
  ADD UNIQUE KEY `sn` (`sn`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agent`
--
ALTER TABLE `agent`
  MODIFY `sn` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `award`
--
ALTER TABLE `award`
  MODIFY `sn` int(12) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `clientsupport`
--
ALTER TABLE `clientsupport`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `compensation`
--
ALTER TABLE `compensation`
  MODIFY `sn` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `incentive`
--
ALTER TABLE `incentive`
  MODIFY `sn` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `levelbonus`
--
ALTER TABLE `levelbonus`
  MODIFY `sn` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `logatt`
--
ALTER TABLE `logatt`
  MODIFY `sn` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `logdraw`
--
ALTER TABLE `logdraw`
  MODIFY `sn` int(16) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `logpay`
--
ALTER TABLE `logpay`
  MODIFY `sn` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `msg`
--
ALTER TABLE `msg`
  MODIFY `sn` int(12) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `sn` int(12) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payoutorder`
--
ALTER TABLE `payoutorder`
  MODIFY `sn` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pin`
--
ALTER TABLE `pin`
  MODIFY `sn` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `replymsg`
--
ALTER TABLE `replymsg`
  MODIFY `sn` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `setup`
--
ALTER TABLE `setup`
  MODIFY `sn` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `temporary_user`
--
ALTER TABLE `temporary_user`
  MODIFY `sn` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `sn` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `wallet`
--
ALTER TABLE `wallet`
  MODIFY `sn` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `walletorder`
--
ALTER TABLE `walletorder`
  MODIFY `sn` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `webhook`
--
ALTER TABLE `webhook`
  MODIFY `sn` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `withdraw`
--
ALTER TABLE `withdraw`
  MODIFY `sn` int(16) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `withdrawal`
--
ALTER TABLE `withdrawal`
  MODIFY `sn` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
