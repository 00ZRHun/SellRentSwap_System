CREATE TABLE IF NOT EXISTS `tblpostitem` (
  `id` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Overview` longtext,
  `UsedYear` int(4) NOT NULL,
  `PricePerDay` int(12) NOT NULL,
  `TotalPrice` int(12) NOT NULL,
  `PayPalBusinessAccount` varchar(100) NOT NULL,
  `ContactNo` int(15) NOT NULL,
  `Image` varchar(120) NOT NULL,
  `updationDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Delmode` varchar(100) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;