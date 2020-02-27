
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";




CREATE TABLE `register` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `keyword` varchar(800) NOT NULL,
  `file_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `uploaded_on` datetime NOT NULL,
  `status` enum('1','0') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



INSERT INTO `register` (`id`, `title`, `keyword`, `file_name`, `uploaded_on`, `status`) VALUES
(49, 'Ashish kumar', 'nothing', 'ASHISH APPLICATION FORM.docx', '2020-02-13 17:28:46', '1'),
(50, 'Java applet program for calculator', 'ashsh,kunmar,sds', 'ASHISH APPLICATION FORM.docx', '2020-02-13 17:29:15', '1'),
(51, 'aswad', 'aswad, mansi, ashish, fahad', 'srs-template-ieee personel noter.docx', '2020-02-13 17:30:03', '1'),
(52, 'ow to report traffic violation pay vehicle fines E-Challan', 'bangalore traffic app, check vehicle e challan, check vehicle fine amount, e challans, kolkata traffic app, mumbai traffic app, mumtrafficapp, report traffic violation, report vehicle parking, traffic violation report', 'ASHISH APPLICATION FORM.docx', '2020-02-13 17:31:01', '1');



CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL DEFAULT '',
  `gender` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `phoneno` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


INSERT INTO `users` (`id`, `fullname`, `gender`, `email`, `username`, `password`, `phoneno`) VALUES
(355, 'Ashishkumar Vishwakarma', 'male', 'vishwakarmaneetesh1654@gmail.com', 'neetesh', '123456', '0824847449'),
(356, 'Neetesh Vishwakarma', 'male', 'vishwakarmaneetesh16@gmail.com', 'ashish', '123456', '0902189107'),
(357, 'fahad patel', 'male', 'fahadpatel1403@gmail.com', 'fahadpatel1403', '123', '9833978308');



ALTER TABLE `register`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=358;
COMMIT;
