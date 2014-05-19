DROP DATABASE IF EXISTS dirks;
CREATE DATABASE dirks;

CREATE TABLE IF NOT EXISTS dirks.users (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `name` varchar(10) NOT NULL,
  `password` varchar(17) NOT NULL,
  `role` varchar(10) NOT NULL,
  `date_created` int(11) NOT NULL,
  `modification_time` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

INSERT INTO dirks.users (`id`, `name`, `password`, `role`) VALUES
(1, 'admin', 'pw', 'admin');

CREATE TABLE IF NOT EXISTS dirks.sites (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `title` varchar(150) NOT NULL,
  `user_id` int(255) NOT NULL,
  `description` text NOT NULL,
  `body` text NOT NULL,
  `published` BOOLEAN DEFAULT false,
  `date_created` int(11) NOT NULL,
  `modification_time` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;


CREATE TABLE IF NOT EXISTS dirks.articles (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `title` varchar(150) NOT NULL,
  `description` text NOT NULL,
  `body` text NOT NULL,
  `published` BOOLEAN DEFAULT false,
  `user_id` int(255) NOT NULL,
  `date_created` int(11) NOT NULL,
  `modification_time` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

CREATE TABLE IF NOT EXISTS dirks.tags (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `user_id` int(255) NOT NULL,
  `description` text NOT NULL,
  `published` BOOLEAN DEFAULT false,
  `date_created` int(11) NOT NULL,
  `modification_time` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

CREATE TABLE IF NOT EXISTS dirks.home (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `title` varchar(150) NOT NULL,
  `body` text NOT NULL,
  `adress_name` varchar(150) NOT NULL,
  `street` varchar(150) NOT NULL,
  `city` varchar(150) NOT NULL,
  `mail` varchar(150) NOT NULL,
  `telephone` varchar(150) NOT NULL,
  `date_created` int(11) NOT NULL,
  `modification_time` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

INSERT INTO dirks.home (`id`, `title`, `body`, `adress_name`, `street`, `city`, `mail`, `telephone`) VALUES
(1,
'Willkommen in meiner Praxis',
' <p>
   Hier ein Beispieltext. Erzähle über deine Praxis und reisse schon mal grob dein Angebot an.
   Evtl. auch dich selber vorstellen. Content ist wichtig, aber ehrlich gesagt nicht meine Domäne.
   Darum...
 </p>
 <p>
   Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
   tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
   quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
   consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
   cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
   proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
 </p>
',
'Tierarztpraxis Dirks',
'Große Straße 76',
'26721 Emden',
'info@drdirks.com',
'+49 4921 993834'
)

-- CREATE TABLE IF NOT EXISTS dirks.modules (
--   `id` int(255) NOT NULL AUTO_INCREMENT,
--   `name` varchar(150) NOT NULL,
--   `user_id` int(255) NOT NULL,
--   `description` text NOT NuLL,
--   `date_created` int(11) NOT NULL,
--   PRIMARY KEY (`id`)
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- INSERT INTO dirks.modules (`id`, `name`, `description`, `date_created`) VALUES
-- (1, 'test1', 'eine Beschreibung', UNIX_TIMESTAMP()),
-- (2, 'test2', 'noch eine Beschreibung', UNIX_TIMESTAMP());

-- CREATE TABLE IF NOT EXISTS dirks.questions (
--   `id` int(255) NOT NULL AUTO_INCREMENT,
--   `user_id` int(255) NOT NULL,
--   `module_id` int(255) NOT NULL,
--   `question` text NOT NULL,
--   `hint` text NOT NULL,
--   `date_created` int(11) NOT NULL,
--   PRIMARY KEY (`id`)
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

-- INSERT INTO dirks.questions (id, user_id, module_id, question, hint, date_created) VALUES
-- (1,1,1,'huh?', 'ugfu', UNIX_TIMESTAMP());

