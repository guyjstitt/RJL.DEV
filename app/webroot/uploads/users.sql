CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(40) NOT NULL,
  `username` varchar(40) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(40) NOT NULL,
  `role` enum('admin','regular') NOT NULL DEFAULT 'regular',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 ;

INSERT INTO `users` (`id`, `name`, `username`, `email`, `password`, `role`) VALUES
(1, 'John Doe', 'johndoe', 'johndoe@gmail.com', 'password', 'regular');
