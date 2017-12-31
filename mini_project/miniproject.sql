-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 21, 2017 at 08:05 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `miniproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE `notes` (
  `noteID` int(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `noteTitle` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `day` text NOT NULL,
  `month` text NOT NULL,
  `year` text NOT NULL,
  `tags` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notes`
--

INSERT INTO `notes` (`noteID`, `email`, `noteTitle`, `description`, `day`, `month`, `year`, `tags`) VALUES
(1, 'j.smith@mail.com', 'Getting started', 'First note  ', '15', '02', '2014', 'test'),
(4, 'mamun@mamun.com', 'life of mamun', 'dfgvbxcvbcv  dfbhdfbdcb dfgbbdx\n\nfgbncvbc ghcbc bhcvbc fgjhcgbc\ncfgbcv bc\n sgxgv', '12', '03', '2017', 'mm, gm'),
(5, 'sohel@boss.com', 'Time for Bangladesh to win outside home', 'The Tigers clinched a four-wicket victory over the islanders on an eventful final day to square the two-Test series 1-1 at the P Sara Oval in Colombo on Sunday.\r\n\r\nShakib set up the win with his first century against the Lankan lions, 116, in the first innings and six wickets in the match as Bangladesh signalled their coming of age in the gameâ€™s illustrious format.\r\n\r\nIt was a great comeback for Bangladesh after they lost the opening test at Galle by 259 runs to a side that blanked Australia 3-0 at home last year.\r\n\r\n"It is a great feeling, winning a Test in Sri Lanka. This was a very important win. It wasn''t easy. We had to come back strongly after the first Test," Shakib said after the game.\r\n\r\n"100th Test, nothing better than that. The way we are improving, we will win some games in the future. \r\n\r\n"We are having a very good time at home. Now we need to win outside [of Bangladesh]. It''s a very good sign for our cricket that we are improving as a team."\r\n\r\nExperienced opening batsman Tamim Iqbal anchored the chase with a stroke-filled 82.\r\n\r\n"I think this win started when we lost the match in Galle," Tamim said. "We had a long chat with the coach, and the players stepped up."\r\n\r\nTamim was awarded the Man-of-the-Match award but the opener passed it on to Shakib.\r\n\r\nSkipper Mushfiqur Rahim carried Bangladesh over the finishing line to seal the historic win.', '20', '03', '2017', 'cricket, bangladesh'),
(6, 'sohel@boss.com', 'South Africa clinch eight-wicket victory in second Test', 'Hashim Amla and JP Duminy guided the tourists to victory in an additional 30 minutes of play at the Basin Reserve, the latter firing the boundary that saw the Proteas ease past the 81-run victory target to 83-2.\r\n\r\nAmla finished on 38 not out and the winning four gave Duminy an unbeaten 15 but it was a victory set up by their disciplined bowling unit, who had dismissed New Zealand for 171 in their second innings after tea.\r\n\r\nWhile Mahraj took the spoils and the man-of-the-match award, it was, however, a first innings partnership between Temba Bavuma and Quinton de Kock that was the match-turning moment.\r\n\r\nDe Kock and Bavuma combined for 160 runs to rescue the Proteas on the second day, when the hosts had reduced them to 94 for six after they had scrapped to 268 in their own first innings.\r\n\r\nThe South African wicketkeeper counter-attacked to score 91 and was ably supported by Bavuma''s 89.\r\n\r\nTheir partnership tired the New Zealand attack out to the point where Morne Morkel and Vernon Philander were able to produce a 57-run final wicket partnership that only ended on Saturday with the Proteas reaching 359 for a lead of 91.\r\n\r\nFast bowler Morkel then tore the top off New Zealand''s batting line-up with the first three wickets.\r\n\r\nVernon Philander''s nagging line and length and Kagiso Rabada''s pace put the hosts under immense pressure that allowed Maharaj to attack on a wicket that was assisting turn but deliveries were not exploding off it.', '18', '03', '2017', 'cricket'),
(10, 'sohel@boss.com', 'fgxfg', 'fdghcfbc', '31', '02', '2016', 'tfghghn'),
(11, 'sohel@boss.com', 'sdgvxbxcvbcvbc bcb', 'hcvbncv b fhbcvbcvbcvbcb ', '31', '02', '2014', 'ghjnvbnv');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `email` varchar(50) NOT NULL,
  `name` varchar(40) NOT NULL,
  `password` varchar(30) NOT NULL,
  `gender` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`email`, `name`, `password`, `gender`) VALUES
('j.smith@mail.com', 'John Smith', '123Asd@ffg', 'male'),
('mamun@mamun.com', 'Mamun', '1234asd@', 'male'),
('sohel@boss.com', 'Sohel Boss', 'asd123@', 'male');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`noteID`),
  ADD UNIQUE KEY `noteID` (`noteID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`email`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `noteID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
