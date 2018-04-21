-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 09, 2017 at 06:51 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kp_canceraid`
--

-- --------------------------------------------------------

--
-- Table structure for table `cancer_detail`
--

CREATE TABLE `cancer_detail` (
  `id` int(11) NOT NULL,
  `id_cancer_type` int(11) DEFAULT NULL COMMENT 'loại bệnh',
  `description` text,
  `causes` text COMMENT 'nguyên nhân',
  `symptoms` text COMMENT 'triệu chứng',
  `diagnosis` text COMMENT 'chuẩn đoán',
  `prognosis` text COMMENT 'dự báo',
  `treatment` text COMMENT 'hướng điều trị',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='chi tiêt từng loại bệnh';

-- --------------------------------------------------------

--
-- Table structure for table `cancer_list`
--

CREATE TABLE `cancer_list` (
  `id` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_cancer_type` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='danh sách bệnh của bệnh nhân';

-- --------------------------------------------------------

--
-- Table structure for table `cancer_type`
--

CREATE TABLE `cancer_type` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='loại bênh';

--
-- Dumping data for table `cancer_type`
--

INSERT INTO `cancer_type` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Ung thư bạch cầu', '2017-03-31 13:13:35', '2017-03-31 13:13:35'),
(2, 'Bệnh bạch cầu tủy cấp tính', '2017-03-31 13:13:35', '2017-03-31 13:13:35');

-- --------------------------------------------------------

--
-- Table structure for table `journal_catelogy`
--

CREATE TABLE `journal_catelogy` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='nhật kí';

-- --------------------------------------------------------

--
-- Table structure for table `journal_medication`
--

CREATE TABLE `journal_medication` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `effectiver` int(11) DEFAULT NULL COMMENT 'mức hài lòng',
  `content` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `journal_personal`
--

CREATE TABLE `journal_personal` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_catelogy` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `content` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `journal_symtom`
--

CREATE TABLE `journal_symtom` (
  `id` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `level` int(11) DEFAULT NULL,
  `id_symtom_catelogy` int(11) DEFAULT NULL,
  `id_medication` int(11) DEFAULT NULL,
  `content` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `journal_symtom_catelogy`
--

CREATE TABLE `journal_symtom_catelogy` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_type` int(11) DEFAULT NULL,
  `content` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `news_type`
--

CREATE TABLE `news_type` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `social_provider`
--

CREATE TABLE `social_provider` (
  `id` int(11) NOT NULL,
  `provider_id` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `provider` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `treatment_detail`
--

CREATE TABLE `treatment_detail` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `id_treatment_type` int(11) DEFAULT NULL,
  `description` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='chi tiết các loại lênh - các loại bệnh con';

-- --------------------------------------------------------

--
-- Table structure for table `treatment_list`
--

CREATE TABLE `treatment_list` (
  `id` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL COMMENT 'ID người bệnh',
  `id_treatment_type` int(11) DEFAULT NULL COMMENT 'id bệnh đang điều trị bảng treatment',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='ds các bệnh của bệnh nhân';

-- --------------------------------------------------------

--
-- Table structure for table `treatment_type`
--

CREATE TABLE `treatment_type` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='loại bệnh';

--
-- Dumping data for table `treatment_type`
--

INSERT INTO `treatment_type` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Phẫu thuật', '2017-03-20 13:49:45', '2017-03-20 13:49:45'),
(2, 'Xạ trị', '2017-03-20 13:49:45', '2017-03-20 13:49:45'),
(3, 'Hóa trị', '2017-03-20 13:50:41', '2017-03-20 13:50:41'),
(4, 'Thuốc không kê đơn', '2017-03-20 13:50:41', '2017-03-20 13:50:41'),
(5, 'Procedures', '2017-03-20 13:51:52', '2017-03-20 13:51:52'),
(6, 'Targeted agents', '2017-03-20 13:51:52', '2017-03-20 13:51:52'),
(7, 'Khác', '2017-03-20 13:51:52', '2017-03-20 13:51:52');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `passcode` varchar(100) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `remember_token` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `passcode`, `avatar`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Hương Nguyễn', 'huongnguyenak96@gmail.com', '1221211212121212', '111111', NULL, NULL, '2017-03-27 07:55:01', '2017-03-27 07:55:01');

-- --------------------------------------------------------

--
-- Table structure for table `your_cancer`
--

CREATE TABLE `your_cancer` (
  `id` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `image` text,
  `date_diagnosed` timestamp NULL DEFAULT NULL COMMENT 'ngày chuẩn đoán',
  `pathology` text COMMENT 'bệnh lý',
  `id_stage` int(11) DEFAULT NULL COMMENT 'giai đoạn - bảng stage',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='chi tiết bệnh của từng bệnh nhân cụ thể';

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cancer_detail`
--
ALTER TABLE `cancer_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_2` (`id_cancer_type`);

--
-- Indexes for table `cancer_list`
--
ALTER TABLE `cancer_list`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_1` (`id_cancer_type`),
  ADD KEY `FK_3` (`id_user`);

--
-- Indexes for table `cancer_type`
--
ALTER TABLE `cancer_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `journal_catelogy`
--
ALTER TABLE `journal_catelogy`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `journal_medication`
--
ALTER TABLE `journal_medication`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `journal_personal`
--
ALTER TABLE `journal_personal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_4` (`id_user`),
  ADD KEY `FK_5` (`id_catelogy`);

--
-- Indexes for table `journal_symtom`
--
ALTER TABLE `journal_symtom`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_6` (`id_user`),
  ADD KEY `FK_7` (`id_medication`),
  ADD KEY `FK_8` (`id_symtom_catelogy`);

--
-- Indexes for table `journal_symtom_catelogy`
--
ALTER TABLE `journal_symtom_catelogy`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_9` (`id_user`),
  ADD KEY `FK_10` (`id_type`);

--
-- Indexes for table `news_type`
--
ALTER TABLE `news_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `social_provider`
--
ALTER TABLE `social_provider`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `provider_id` (`provider_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `treatment_detail`
--
ALTER TABLE `treatment_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_11` (`id_treatment_type`);

--
-- Indexes for table `treatment_list`
--
ALTER TABLE `treatment_list`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_12` (`id_treatment_type`),
  ADD KEY `FK_13` (`id_user`);

--
-- Indexes for table `treatment_type`
--
ALTER TABLE `treatment_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `your_cancer`
--
ALTER TABLE `your_cancer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_14` (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cancer_detail`
--
ALTER TABLE `cancer_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `cancer_list`
--
ALTER TABLE `cancer_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `cancer_type`
--
ALTER TABLE `cancer_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `journal_catelogy`
--
ALTER TABLE `journal_catelogy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `journal_medication`
--
ALTER TABLE `journal_medication`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `journal_personal`
--
ALTER TABLE `journal_personal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `journal_symtom`
--
ALTER TABLE `journal_symtom`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `journal_symtom_catelogy`
--
ALTER TABLE `journal_symtom_catelogy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `news_type`
--
ALTER TABLE `news_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `social_provider`
--
ALTER TABLE `social_provider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `treatment_detail`
--
ALTER TABLE `treatment_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `treatment_list`
--
ALTER TABLE `treatment_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `treatment_type`
--
ALTER TABLE `treatment_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `your_cancer`
--
ALTER TABLE `your_cancer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `cancer_detail`
--
ALTER TABLE `cancer_detail`
  ADD CONSTRAINT `FK_2` FOREIGN KEY (`id_cancer_type`) REFERENCES `cancer_type` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cancer_list`
--
ALTER TABLE `cancer_list`
  ADD CONSTRAINT `FK_1` FOREIGN KEY (`id_cancer_type`) REFERENCES `cancer_type` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_3` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `journal_personal`
--
ALTER TABLE `journal_personal`
  ADD CONSTRAINT `FK_4` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_5` FOREIGN KEY (`id_catelogy`) REFERENCES `journal_catelogy` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `journal_symtom`
--
ALTER TABLE `journal_symtom`
  ADD CONSTRAINT `FK_6` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_7` FOREIGN KEY (`id_medication`) REFERENCES `journal_medication` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_8` FOREIGN KEY (`id_symtom_catelogy`) REFERENCES `journal_symtom_catelogy` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `FK_10` FOREIGN KEY (`id_type`) REFERENCES `news_type` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_9` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `treatment_detail`
--
ALTER TABLE `treatment_detail`
  ADD CONSTRAINT `FK_11` FOREIGN KEY (`id_treatment_type`) REFERENCES `treatment_type` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `treatment_list`
--
ALTER TABLE `treatment_list`
  ADD CONSTRAINT `FK_12` FOREIGN KEY (`id_treatment_type`) REFERENCES `treatment_type` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_13` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `your_cancer`
--
ALTER TABLE `your_cancer`
  ADD CONSTRAINT `FK_14` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
