DROP DATABASE IF EXISTS base;
CREATE DATABASE base;

CREATE TABLE IF NOT EXISTS base.users (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `name` varchar(10) NOT NULL,
  `password` varchar(17) NOT NULL,
  `role` varchar(10) NOT NULL,
  `date_created` int(11) NOT NULL,
  `modification_time` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

INSERT INTO base.users (`id`, `name`, `password`, `role`) VALUES
(1, 'admin user', 'pw', 'admin');

CREATE TABLE IF NOT EXISTS base.users (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `title` varchar(40) NOT NULL,
  `body` TEXT NOT NULL,
  `date_created` int(11) NOT NULL,
  `modification_time` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `title` (`title`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;