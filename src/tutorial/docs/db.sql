
--
-- Database: `mvc`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'user',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `role`) VALUES
(1, 'user1@email.com', '1234', 'admin'),
(2, 'user2@email.com', '1234', 'user'),
(3, 'user3@email.com', '1234', 'user'),
(4, 'user4@email.com', '1234', 'user'),
(5, 'user4@email.com', '1234', 'user');

