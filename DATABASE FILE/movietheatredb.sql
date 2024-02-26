-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 24, 2023 at 02:55 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `movietheatredb`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bookings`
--

CREATE TABLE `tbl_bookings` (
  `book_id` int(11) NOT NULL,
  `ticket_id` varchar(30) NOT NULL,
  `t_id` int(11) NOT NULL COMMENT 'theater id',
  `user_id` int(11) NOT NULL,
  `show_id` int(11) NOT NULL,
  `screen_id` int(11) NOT NULL,
  `no_seats` int(3) NOT NULL COMMENT 'number of seats',
  `amount` int(5) NOT NULL,
  `ticket_date` date NOT NULL,
  `date` date NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_bookings`
--

INSERT INTO `tbl_bookings` (`book_id`, `ticket_id`, `t_id`, `user_id`, `show_id`, `screen_id`, `no_seats`, `amount`, `ticket_date`, `date`, `status`) VALUES
(31, 'BKID2077933', 10, 14, 31, 11, 1, 400, '2023-03-28', '2023-03-07', 1),
(33, 'BKID9288759', 10, 5, 32, 11, 1, 400, '2023-05-19', '2023-03-09', 1),
(34, 'BKID5709117', 10, 19, 34, 12, 1, 500, '2023-03-28', '2023-03-17', 1),
(35, 'BKID5452313', 10, 14, 33, 12, 1, 500, '2023-03-28', '2023-01-26', 1),
(37, 'BKID3633278', 10, 14, 33, 11, 1, 400, '2023-04-12', '2023-04-04', 0),
(38, 'BKID1856927', 10, 5, 31, 11, 1, 400, '2023-04-12', '2023-04-08', 0),
(39, 'BKID6986560', 10, 19, 32, 12, 1, 500, '2023-05-19', '2023-04-14', 0),
(40, 'BKID1592805', 10, 23, 35, 12, 1, 500, '2023-06-02', '2023-04-23', 0),
(41, 'BKID5385248', 10, 23, 36, 12, 2, 1000, '2023-08-04', '2023-04-23', 0),
(42, 'BKID2129789', 10, 24, 32, 11, 3, 1200, '2023-05-19', '2023-04-01', 1),
(43, 'BKID4626735', 10, 24, 36, 12, 3, 1500, '2023-08-04', '2023-04-24', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contact`
--

CREATE TABLE `tbl_contact` (
  `contact_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` int(11) NOT NULL,
  `subject` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_login`
--

CREATE TABLE `tbl_login` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL COMMENT 'email',
  `password` varchar(50) NOT NULL,
  `user_type` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_login`
--

INSERT INTO `tbl_login` (`id`, `user_id`, `username`, `password`, `user_type`) VALUES
(1, 0, 'admin', 'D00F5D5217896FB7FD601412CB890830', 0),
(19, 5, 'james@gmail.com', 'b58d74dfdee0b9d05112eb6562817c01', 2),
(34, 14, 'peter@gmail.com', '5e1aecf150c31ae292b4b324ad2654ba', 2),
(39, 10, 'AMCTHR', 'd32e7d52d463a34444c848bafca49f89', 1),
(40, 19, 'harriet@gmail.com', '0451af8922ff9c71141e0bc7387530ad', 2),
(43, 22, 'jenny@gmail.com', '705cfb5cf4570011d0900792a095c26e', 2),
(44, 23, 'lainaspetey@gmail.com', 'd3d6edf1263e2e76905d2c19cd4fb461', 2),
(45, 24, 'sharon@gmail.com', '25e119ece8463780ebc2a57bd69d6287', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_movie`
--

CREATE TABLE `tbl_movie` (
  `movie_id` int(11) NOT NULL,
  `t_id` int(11) NOT NULL COMMENT 'theatre id',
  `movie_name` varchar(255) NOT NULL,
  `cast` varchar(500) NOT NULL,
  `desc` varchar(1000) NOT NULL,
  `release_date` date NOT NULL,
  `image` varchar(200) NOT NULL,
  `video_url` varchar(200) NOT NULL,
  `status` int(1) NOT NULL COMMENT '0 means active '
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_movie`
--

INSERT INTO `tbl_movie` (`movie_id`, `t_id`, `movie_name`, `cast`, `desc`, `release_date`, `image`, `video_url`, `status`) VALUES
(19, 10, 'Fast X', 'Vin Diesel, Jason Momoa, Tyrese Gibson, Cris LudaChris, John Cena, Mitchelle Rodriguez.', 'Over many missions and against impossible odds, Dom Toretto and his family have outsmarted and outdriven every foe in their path. Now, they must confront the most lethal opponent they\'ve ever faced. Fueled by revenge, a terrifying threat emerges from the shadows of the past to shatter Dom\'s world and destroy everything -- and everyone -- he loves.', '2023-05-19', 'images/fast-x-3840x3200-12499.jpg', 'https://www.youtube.com/watch?v=aOb15GVFZxU', 0),
(20, 10, 'Teen Wolf The Movie', 'Tyler Posey,Tyler Hoechlin,Crystal Reed, Holland Roden,etc.', 'A terrifying evil has emerged,The wolves howl again,but only a werewolf like Scott McCall,can gather both new allies and reunite trusted friends to fight back against what could be the most powerful and deadliest enemy.', '2021-03-31', 'images/images.jpeg', 'https://www.youtube.com/watch?v=1y3rflTTjeI\r\n', 0),
(21, 10, 'Shazam Fury of the Gods', 'Grace Fulton,Zachary Levi,Asher Angel,Rachel Zegler,Michelle Borth.', 'shazam and his siblings are forced to get back into action and fight the daughters of Atlas,they must stop them from using a weapon that could destroy the whole world.', '2023-03-17', 'images/shazam.jpeg', 'https://m.youtube.com/watch?v=ZwFOa3qV5Sk&t=29s', 0),
(22, 10, 'Black Adam', 'Dwayne Johnson,Sarah Shahi,Henry Cavill,Aldis Hodgge and many more.', 'After being bestowed with godly powers and imprisoned for it,Black Adam is liberated from his earthly binds to unleash his fury to the modern world', '2023-03-17', 'images/Black_Adam_(film)_poster.jpg', 'https://www.youtube.com/watch?v=X0tOpBuYasI', 0),
(23, 10, 'Meg 2: The Trench', 'Jason Statham,Shuya Sophia Cai, Sienna Guillory, Cliff Curtis, Page Kenedy, Wu Jing, Skyler Samuels and many more.', 'Meg 2: The Trench is an upcoming science fiction film directed by Ben Wheatley, and written by Dean Georgaris, and Jon and Erich Hoeber, based on the 1999 book The Trench by Steve Alten. Serving as a sequel to the 2018 film The Meg, the film stars Jason Statham, Wu Jing, Sienna Guillory, Cliff Curtis, Skyler Samuels, Page Kennedy, Shuya Sophia Cai and Sergio Peris-Mencheta', '2023-08-04', 'images/meg.jpeg\r\n\r\n', 'https://m.youtube.com/watch?v=Bpz8apWAhyw', 0),
(24, 10, 'Spiderman Across Spider Verse', 'Hailee Steinfield, Shameik Moore, Oscar Isaac, Daniel Kaluya, Brian Tyree Henry Jake Johnson and many more', 'After reuniting with Gwen Stacy, spiderman is catapulted across the multiveerse, where he encounters a team of spider-people charged with protecting its very existence.  He must soon redefine what it means to be a hero and save the people he love the most.', '2023-06-02', 'images/spiderman.jpeg', 'https://m.youtube.com/watch?v=shW9i6k8cB0', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_news`
--

CREATE TABLE `tbl_news` (
  `news_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `cast` varchar(100) NOT NULL,
  `news_date` date NOT NULL,
  `description` varchar(200) NOT NULL,
  `attachment` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_news`
--

INSERT INTO `tbl_news` (`news_id`, `name`, `cast`, `news_date`, `description`, `attachment`) VALUES
(12, 'Aquaman 2', 'Amber Heard,Jason Momoa,Nicole Kidman,Ben Affleck,Patrick Wilson.', '2023-12-25', 'The movie takes place after shortly after Justice League and sees Arthur struggling to acccept his responsibilities to both Atlantis, and the terrestrial people of earth', 'news_images/images (3).jpeg'),
(25, 'Deadpool3', 'Ryan Reynolds,Leslie Uggams,Hugh Jackman,T.J.Miller.', '2024-11-08', 'Wolverine joins the \"merc with a mouth\" in the third installment of the Deadpool film franchise.', 'news_images/peakpx.jpg'),
(29, 'Avatar way of water', 'sam worthington many others', '2024-12-19', 'action', 'news_images/avatar.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_registration`
--

CREATE TABLE `tbl_registration` (
  `user_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `age` int(2) NOT NULL,
  `gender` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_registration`
--

INSERT INTO `tbl_registration` (`user_id`, `name`, `email`, `phone`, `age`, `gender`) VALUES
(5, 'James', 'james@gmail.com', '7124445696', 25, 'Male'),
(14, 'peter', 'peter@gmail.com', '0111823379', 22, 'Male'),
(19, 'Harriet', 'harriet@gmail.com', '0117876543', 26, 'Female'),
(22, 'Jenny', 'jenny@gmail.com', '0711100085', 23, 'Female'),
(23, 'Lainas', 'lainaspetey@gmail.com', '0741995475', 23, 'Male'),
(24, 'Sharon', 'sharon@gmail.com', '0721354765', 33, 'Female');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_screens`
--

CREATE TABLE `tbl_screens` (
  `screen_id` int(11) NOT NULL,
  `t_id` int(11) NOT NULL COMMENT 'theatre id',
  `screen_name` varchar(110) NOT NULL,
  `seats` int(11) NOT NULL COMMENT 'number of seats',
  `charge` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_screens`
--

INSERT INTO `tbl_screens` (`screen_id`, `t_id`, `screen_name`, `seats`, `charge`) VALUES
(11, 10, 'Amc screen', 300, 400),
(12, 10, 'IMAX', 300, 500);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_shows`
--

CREATE TABLE `tbl_shows` (
  `s_id` int(11) NOT NULL,
  `st_id` int(11) NOT NULL COMMENT 'show time id',
  `theatre_id` int(11) NOT NULL,
  `movie_id` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `status` int(11) NOT NULL COMMENT '1 means show available',
  `r_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_shows`
--

INSERT INTO `tbl_shows` (`s_id`, `st_id`, `theatre_id`, `movie_id`, `start_date`, `status`, `r_status`) VALUES
(31, 31, 10, 22, '2023-03-27', 1, 1),
(32, 32, 10, 19, '2023-05-19', 1, 0),
(33, 34, 10, 20, '2023-01-26', 1, 0),
(34, 36, 10, 21, '2023-03-17', 1, 0),
(35, 36, 10, 24, '2023-06-02', 1, 0),
(36, 38, 10, 23, '2023-08-04', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_show_time`
--

CREATE TABLE `tbl_show_time` (
  `st_id` int(11) NOT NULL,
  `screen_id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL COMMENT 'noon,second,etc',
  `start_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_show_time`
--

INSERT INTO `tbl_show_time` (`st_id`, `screen_id`, `name`, `start_time`) VALUES
(31, 11, 'Noon', '12:00:00'),
(32, 11, 'Matinee', '14:00:00'),
(33, 11, 'First', '11:00:00'),
(34, 12, 'Second', '16:00:00'),
(35, 12, 'Others', '19:00:00'),
(36, 12, 'Second', '21:30:00'),
(37, 11, 'Second', '23:00:00'),
(38, 12, 'Matinee', '13:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_theatre`
--

CREATE TABLE `tbl_theatre` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `place` varchar(100) NOT NULL,
  `state` varchar(50) NOT NULL,
  `pin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_theatre`
--

INSERT INTO `tbl_theatre` (`id`, `name`, `address`, `place`, `state`, `pin`) VALUES
(10, 'Amc Theatre', '00232', 'Nairobi', 'Kenya', 587456);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_bookings`
--
ALTER TABLE `tbl_bookings`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `tbl_login`
--
ALTER TABLE `tbl_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_movie`
--
ALTER TABLE `tbl_movie`
  ADD PRIMARY KEY (`movie_id`);

--
-- Indexes for table `tbl_news`
--
ALTER TABLE `tbl_news`
  ADD PRIMARY KEY (`news_id`);

--
-- Indexes for table `tbl_registration`
--
ALTER TABLE `tbl_registration`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `tbl_screens`
--
ALTER TABLE `tbl_screens`
  ADD PRIMARY KEY (`screen_id`);

--
-- Indexes for table `tbl_shows`
--
ALTER TABLE `tbl_shows`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `tbl_show_time`
--
ALTER TABLE `tbl_show_time`
  ADD PRIMARY KEY (`st_id`);

--
-- Indexes for table `tbl_theatre`
--
ALTER TABLE `tbl_theatre`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_bookings`
--
ALTER TABLE `tbl_bookings`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_login`
--
ALTER TABLE `tbl_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `tbl_movie`
--
ALTER TABLE `tbl_movie`
  MODIFY `movie_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tbl_news`
--
ALTER TABLE `tbl_news`
  MODIFY `news_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `tbl_registration`
--
ALTER TABLE `tbl_registration`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tbl_screens`
--
ALTER TABLE `tbl_screens`
  MODIFY `screen_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_shows`
--
ALTER TABLE `tbl_shows`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `tbl_show_time`
--
ALTER TABLE `tbl_show_time`
  MODIFY `st_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `tbl_theatre`
--
ALTER TABLE `tbl_theatre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
