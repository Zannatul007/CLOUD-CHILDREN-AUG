-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 27, 2022 at 07:45 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `children-main`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking_info`
--

CREATE TABLE `booking_info` (
  `booking_id` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `demail` varchar(100) NOT NULL,
  `bemail` varchar(100) NOT NULL,
  `number` varchar(100) NOT NULL,
  `adress` varchar(100) NOT NULL,
  `category` varchar(100) NOT NULL,
  `specialneed` varchar(100) NOT NULL,
  `confirmed` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking_info`
--

INSERT INTO `booking_info` (`booking_id`, `firstname`, `lastname`, `demail`, `bemail`, `number`, `adress`, `category`, `specialneed`, `confirmed`) VALUES
(1, 'Nidita', '', 'p@gmail.com', 'anchal.nidita@gmail.com', '808080909', 'bscljbsclsc', '808080909', '', ''),
(2, 'Nidita', 'Roy', 'children@gmail.com', '', '01766456696', '178, 6A, SEL Panthanibash, Ashoktola, Professorpara, Cumilla', '01766456696', 'No Need.', 'Yes'),
(3, 'Nidita', 'Roy', 'children@gmail.com', '', '01766456696', '178, 6A, SEL Panthanibash, Ashoktola, Professorpara, Cumilla', '01766456696', '', 'No'),
(4, 'Nidita', 'Roy', 'children@gmail.com', '', '01766456696', '178, 6A, SEL Panthanibash, Ashoktola, Professorpara, Cumilla', '01766456696', '', 'No'),
(5, 'Nidita', 'Roy', 'nidita@gmail.com', '', '01766456696', '178, 6A, SEL Panthanibash, Ashoktola, Professorpara, Cumilla', '01766456696', 'Yes', 'No'),
(6, 'zannatul', '', 'nidita@gmail.com', 'nobody@gmail.com', '01766456696', '178, 6A, SEL Panthanibash, Ashoktola, Professorpara, Cumilla', '01766456696', 'nothing', 'No'),
(7, 'Nidita', 'Roy', 'zannatul@gmail.com', 'nobody@gmail.com', '90', '178, 6A, SEL Panthanibash, Ashoktola, Professorpara, Cumilla', '90', '', 'No'),
(8, 'Nidita', 'Roy', 'zanebabu@gmail.com', 'zannatul07@gmail.com', '01766456696', '178, 6A, SEL Panthanibash, Ashoktola, Professorpara, Cumilla', '01766456696', 'Baby cries a lot.', 'Yes'),
(9, 'Rowshon ', 'Akter', 'zanebabu@gmail.com', 'zannatul07@gmail.com', '01766456696', '178, 6A, SEL Panthanibash, Ashoktola, Professorpara, Cumilla', '01766456696', 'Baby is notorious.', 'Yes'),
(10, 'Nidita', '', 'zanebabu@gmail.com', 'nobody@gmail.com', '99', '178, 6A, SEL Panthanibash, Ashoktola, Professorpara, Cumilla', '99', '', 'Yes'),
(11, 'Nidita', '', 'zanebabu@gmail.com', 'zannatul07@gmail.com', '09', '178, 6A, SEL Panthanibash, Ashoktola, Professorpara, Cumilla', '09', '', 'Yes'),
(12, 'Nidita', '', 'zanebabu@gmail.com', 'zannatul07@gmail.com', '09', '178, 6A, SEL Panthanibash, Ashoktola, Professorpara, Cumilla', '09', '', 'Yes'),
(13, 'Nidita', '', 'children@gmail.com', 'jemy@student.cuet.ac.bd', '01766456696', '178, 6A, SEL Panthanibash, Ashoktola, Professorpara, Cumilla', '01766456696', '', 'No');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `demail` varchar(100) NOT NULL,
  `dcategory` varchar(100) NOT NULL,
  `payment` varchar(100) NOT NULL,
  `necessary_info` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`demail`, `dcategory`, `payment`, `necessary_info`) VALUES
('children@gmail.com', 'foreigner', '1300', 'special care'),
('children@gmail.com', 'preschool', '1500 BDT', 'Pre School Care'),
('children@gmail.com', 'toodler', '1300', 'care'),
('nidita@gmail.com', 'preschool', '1400', 'very caring'),
('nidita@gmail.com', 'schoolage', '1500', 'very caring'),
('nidita@gmail.com', 'special', '1600', 'very caring'),
('nidita@gmail.com', 'toodler', '1300', 'very caring'),
('p@gmail.com', 'special', '1500', 'good care'),
('p@gmail.com', 'toodler', '1300', 'nice care'),
('roshni@gmail.com', 'preschool', '1300', 'very caring'),
('roshni@gmail.com', 'schoolage', '1300', 'very caring'),
('zanebabu@gmail.com', 'schoolage', '200$', '24/7 home tutor.'),
('zanebabu@gmail.com', 'toodler', '200$', 'Special diaper changer. '),
('zannatul@gmail.com', 'foreigner', '1200', 'very caring'),
('zannatul@gmail.com', 'toodler', '2300', 'very caring');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `commentid` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `demail` varchar(100) NOT NULL,
  `comments` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`commentid`, `username`, `demail`, `comments`) VALUES
(1, 'Nidita', 'children@gmail.com', 'Good DayCare'),
(2, 'Nidita', 'children@gmail.com', 'Good DayCare'),
(3, 'Nidita', 'children@gmail.com', 'Good DayCare'),
(4, 'Nidita', 'children@gmail.com', 'Not Bad'),
(5, 'Nidita', 'nidita@gmail.com', 'BEST'),
(6, 'Nidita', 'nidita@gmail.com', 'BEST'),
(7, 'Nidita', 'nidita@gmail.com', 'Good DayCare'),
(8, 'Nidita', 'nidita@gmail.com', 'Not Bad'),
(9, 'Nidita', 'nidita@gmail.com', 'Not Bad'),
(10, 'Nidita', 'nidita@gmail.com', 'VERY Good'),
(11, 'Nidita', 'children@gmail.com', 'BEST'),
(12, 'Nidita', 'nidita@gmail.com', 'ooo'),
(13, 'Nidita', 'zannatul@gmail.com', 'BEST'),
(14, 'Nidita', 'zannatul@gmail.com', 'Not Bad'),
(15, 'Nidita', 'zanebabu@gmail.com', 'Good DayCare'),
(16, 'Nidita', 'zanebabu@gmail.com', 'ooo'),
(17, 'Zannatul', 'children@gmail.com', 'VERY Good'),
(18, 'Zannatul', 'children@gmail.com', 'VERY Good'),
(19, 'Zannatul', 'zanebabu@gmail.com', 'VERY Good'),
(20, 'Zannatul', 'zanebabu@gmail.com', ''),
(21, 'protha', 'children@gmail.com', 'ooo'),
(22, 'Zannatul', 'children@gmail.com', 'Not Bad');

-- --------------------------------------------------------

--
-- Table structure for table `daycare_info`
--

CREATE TABLE `daycare_info` (
  `demail` varchar(100) NOT NULL,
  `dname` varchar(100) NOT NULL,
  `dnumber` varchar(100) NOT NULL,
  `dadress` text NOT NULL,
  `district` varchar(100) NOT NULL,
  `zipcode` int(100) NOT NULL,
  `dpassword` varchar(100) NOT NULL,
  `starttime` varchar(100) NOT NULL,
  `endtime` varchar(100) NOT NULL,
  `food_nutrition` text NOT NULL,
  `medication_doctor` text NOT NULL,
  `sanitary_hygiene` text NOT NULL,
  `transportation` text NOT NULL,
  `entertainment` text NOT NULL,
  `rating` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `daycare_info`
--

INSERT INTO `daycare_info` (`demail`, `dname`, `dnumber`, `dadress`, `district`, `zipcode`, `dpassword`, `starttime`, `endtime`, `food_nutrition`, `medication_doctor`, `sanitary_hygiene`, `transportation`, `entertainment`, `rating`) VALUES
('children@gmail.com', 'Children-Cloud', '01766456696', '178, 6A, SEL Panthanibash, Ashoktola, Professorpara, Cumilla', 'Gazipur', 4500, '$2y$10$dJIVKZnrW/89icMl39ZLJeDs3kpcOu/DpsMShhD3vpHDjvBFhJM36', '10 AM', '9 PM', 'tasty food.', 'many doctors and nurses.', 'So much clean.', 'bus', 'ball', 1),
('nidita@gmail.com', 'Kidzone', '01766456696', '178, 6A Cumilla', 'Jamalpur', 4500, '123', '10 AM', '9 PM', 'very delicious', 'many doctors', 'good toilets', 'bus', 'playing games', 0),
('roshni@gmail.com', 'Children-Cloud', '01720869999', '178, 6A Chittagong', 'Chittagong', 4500, '123', '10 AM', '9 PM', 'very delicious', 'many nurses', 'good toilets', 'bus', 'playing games', 0),
('zanebabu@gmail.com', 'Zane\'s Baby Media', '1767617977', 'don;t now', 'Dhaka', 1250, '$2y$10$R449PYyaaEDxnd/QE38oqupeaXKMheen5QmfmY4HoPHAKywjRr/VG', '10 AM', '', 'We service very nutritious foods. Like oats, strawberry, mango etc.', 'nurses', 'We have special diaper changer and special sweeper.', 'We have mini bus , micro bus, school van.', 'We have nice playground on rooftop.', 0),
('zannatul@gmail.com', 'Babyzone', '01711371479', '148, Uttara Dhaka', 'Dhaka', 4500, '123', '10 AM', '9 PM', 'very delicious', 'many doctors', 'good toilets', 'truck', 'playing games', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_information`
--

CREATE TABLE `user_information` (
  `uemail` varchar(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `upassword` varchar(100) NOT NULL,
  `nationality` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_information`
--

INSERT INTO `user_information` (`uemail`, `firstname`, `lastname`, `upassword`, `nationality`) VALUES
('anchal.nidita@gmail.com', 'Nidita Roy', '', '123', 'barbadian'),
('jemy@student.cuet.ac.bd', 'Nidita', '', '$2y$10$hAPiUv6U50CnDwC6W2mPuehXgEafcveJZr9hkfWzefNPhHBzmO94i', 'barbadian'),
('kaf@gmail.com', 'Nidita', '', '$2y$10$zhc2bqeX3wERDA0H127EIumClOilEEID1M2fPs/D7FjIthA7X7fKS', 'batswana'),
('new@student.cuet.ac.bd', 'Nidita', 'Roy', '$2y$10$iNUN4wX0Rt/XYymVMiACHeEIiQ7W4tWKFntFD9z6TOX819Qnkeu2e', 'barbudans'),
('nidita@gmail.com', 'Nidita', 'Roy', '$2y$10$g3JvidYOutDVTJwoqyDW3uPVfyn6hyTDGoCNgd6pGIUxOtML9Mrd2', 'barbadian'),
('nobody@gmail.com', 'Nidita', 'Roy', '$2y$10$vcgnSmNJTtUOI0TXjl9mx.p2gdPctf8HNeqrlYBRbPoJydtMLCW5u', 'bahraini'),
('pavel@student.cuet.ac.bd', 'Nidita', '', '$2y$10$.ajNcUqhpLxBk71Pcm4e9OMguaSw4L2K2tDJ1S4dhBelQXL8uWXAm', 'barbudans'),
('pearl@student.cuet.ac.bd', 'Nidita', '', '$2y$10$j32f0ypsMgnuGoJ/C/NgU.vb4TdEUIO27O9ySVMpTo3wodcxcb06.', 'barbudans'),
('protha@gmail.com', 'protha', '', '$2y$10$LkxeF2HX60IVnfSsfpFgdOBQTyIKV.EX5L4RFZaOal8aTQHCCihaK', 'angolan'),
('roshni@gmail.com', 'roshni', '', '$2y$10$po2HX/SH13CAcN7V5s0WauZyMhcmCRV8XIZ0ihjtqjziZg3hv0kra', 'azerbaijani'),
('u1804014@student.cuet.ac.bd', 'Nidita Roy', '', '$2y$10$29hvs/LJNiehvqg5PxxpL.LjuWiJG8NVAWLC1SB4RAyPlGECtGn.6', 'barbudans'),
('u1804018@student.cuet.ac.bd', 'Nidita', '', '123', 'barbudans'),
('u1804020@student.cuet.ac.bd', 'Nidita', '', '$2y$10$vkLqRneHlpVEHDOBfRftleboJu2lE3bAcCAQa9X7TypooJuQ5ABry', 'barbadian'),
('zannatul07@gmail.com', 'Zannatul', 'Fadaush', '$2y$10$512.C/Qk2xs7eq/qeHLq8..HexXjlAMzuuAydwABJpzLIvP31udzO', 'batswana');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking_info`
--
ALTER TABLE `booking_info`
  ADD PRIMARY KEY (`booking_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`demail`,`dcategory`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`commentid`);

--
-- Indexes for table `daycare_info`
--
ALTER TABLE `daycare_info`
  ADD PRIMARY KEY (`demail`);

--
-- Indexes for table `user_information`
--
ALTER TABLE `user_information`
  ADD PRIMARY KEY (`uemail`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking_info`
--
ALTER TABLE `booking_info`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `commentid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
