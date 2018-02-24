-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 14, 2018 at 10:40 AM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `krishdatabase`
--

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE `article` (
  `artid` int(20) NOT NULL,
  `title` varchar(200) NOT NULL,
  `podate` date NOT NULL,
  `categoryid` int(20) NOT NULL,
  `content` longtext NOT NULL,
  `author` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`artid`, `title`, `podate`, `categoryid`, `content`, `author`) VALUES
(15, 'The tree of life: Moringa Oleifera', '2017-11-29', 7, 'Yes, it is a tree highly spoken of as the Tree of Life or the Miracle Tree. The Nepali word for it is Sheetal Chini and Shobhaanjan or more commonly Sahijan in Hindi.\r\n\r\nCuriously, this plant seems to have won more acclaims in the recent years than any other species of green perennial plants. â€œItâ€™s like growing multi-vitamins at your door-stepsâ€™; â€œits leaves contain insane levels of nutrientsâ€; â€œthe moringa leaves prevent 300 diseasesâ€; â€œtheir tiny leaves have the potential to save the lives of millions of people on our planetâ€â€“ are some of the quotes that this tree has bagged.\r\n\r\nNative to Nepal, India and Pakistan, they are also known as horseradish-tree, ben oil tree, zogale or drumstick trees. Of the 13 different species, Moringa Oleifera is widely and commonly recognised. It is consumed both as a vegetable and a medicinal herb. Cultivated and eaten extensively in India, the moringa leaves are widely sold in the Philippines like any other common green leafy vegetables.\r\n\r\nDeciduous with sparse foliage, the moringa trees grow to medium heights of 25 to 30 ft and thrive in the mid-hills, the Siwalik and the Tarai of Nepal. The wispy trees with drooping branches bear drumsticks like fruits (pods are twenty to fifty centimetres long with seeds), small white flowers and rounded leaves, all consumableâ€”pods, seeds and the blooms.\r\n\r\nI was taken by complete surprise when a very close relative of mine wrote to me from West Palm Beach, Florida, USA that they have a moringa tree in their garden and they frequently eat its leaves and pods cooked as Nepali curry. She also revealed that it is very easy to growâ€“you donâ€™t need a seedling to plant. All you need is the pod or a branch to transplant it.\r\n\r\nMoringa oleifera is available in varied forms such as organic extracts, capsules, powder, tea, and oil. Extensive cultivation of moringa olefeira is done in Kunathari, Surkhet in the Bheri Zone of mid-western Nepal.\r\n\r\n ', 'Man singh ravi'),
(16, 'My life my story', '2016-02-17', 2, 'I had gone for long ride.\r\nI got an accident and i fall asleep for whole life.', 'prayash'),
(18, 'Two Indian captured for creating counterfeit Nepali money', '2018-01-12', 8, 'A group of Far-Western Provincial Examination Agency of Police on Thursday captured two Indian nationals while they were creating counterfeit Nepali cash at the dead zone at Belauri Region 6. \r\n\r\nThe captured are Balbir Singh, 22, and Krishna Singh, 19, of Pilibhit area, India. The group captured them when they were creating counterfeit Nepali money notes of the division of Rs 1,000, said Collaborator Sub-Assessor at Far-Western Local Examination Department, Keshav Joshi. \r\n\r\nThe group seized papers, different chemicals and machines used to create the phony money. Joshi said that the captured were dynamic in creating counterfeit Nepali money remaining in India since long time. \r\n\r\nZone Police Office, Belauri, has been doing further examination concerning the case. RSS', 'Kathmandu Post'),
(19, 'vevwrbdrbre', '2018-01-09', 9, 'bw4berbrte erg4g 4', 'ekantipur');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(20) NOT NULL,
  `name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'sports'),
(2, 'crime'),
(3, 'politics'),
(4, 'Economics'),
(7, 'lifestyle'),
(8, 'National'),
(9, 'Technology');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(20) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `fullname` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `contact` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `password`, `fullname`, `email`, `contact`) VALUES
(1, 'krishna80', '55655', 'krishna karki', 'carki.80.creeshna@gmail.com', '+9779813528099'),
(2, 'Raksha55', 'sathi ma timro', 'Raksha pokhrel', 'raksha.sharma.55@gmail.com', '+9779813528055'),
(3, 'sandhya1313', 'love nepal', 'Sandhya karki', 'sandhya.13@hotmail.com', '+977984245235');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`artid`),
  ADD KEY `categoryid` (`categoryid`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `article`
--
ALTER TABLE `article`
  MODIFY `artid` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `article_ibfk_1` FOREIGN KEY (`categoryid`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
