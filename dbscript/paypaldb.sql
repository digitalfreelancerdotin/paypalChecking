-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 14, 2023 at 07:35 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `paypaldb`
--

-- --------------------------------------------------------

--
-- Table structure for table `indexpage`
--

CREATE TABLE `indexpage` (
  `title` varchar(20) NOT NULL,
  `sln` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `indexpage`
--

INSERT INTO `indexpage` (`title`, `sln`) VALUES
('PAYPAL CHECKOUT', 1);

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `payid` int(11) NOT NULL,
  `firstname` varchar(40) DEFAULT NULL,
  `lastname` varchar(40) DEFAULT NULL,
  `amount` varchar(20) DEFAULT NULL,
  `txnid` varchar(255) DEFAULT NULL,
  `pid` int(11) DEFAULT NULL,
  `payer_email` varchar(40) DEFAULT NULL,
  `currency` varchar(10) DEFAULT NULL,
  `mobile` varchar(15) NOT NULL,
  `address` varchar(455) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `payment_date` datetime DEFAULT NULL,
  `status` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`payid`, `firstname`, `lastname`, `amount`, `txnid`, `pid`, `payer_email`, `currency`, `mobile`, `address`, `note`, `payment_date`, `status`) VALUES
(16, 'santosh', 'patra', '5', 'pay_LmiRoSlJYlbKTd', 1, 'digitalfreelancerdotin@gmail.com', 'INR', '8971867061', 'bootstrap5', 'note5', '2023-05-07 14:31:25', 'success');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `pid` int(11) NOT NULL,
  `title` varchar(500) NOT NULL,
  `imagePath` varchar(255) DEFAULT NULL,
  `summary` varchar(50) DEFAULT NULL,
  `description1` varchar(1000) NOT NULL,
  `price` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`pid`, `title`, `imagePath`, `summary`, `description1`, `price`) VALUES
(1, 'Laptop1', 'https://drive.google.com/uc?export=view&id=1-09UO6YiEPlh8vqYU2Qlion8U6hLZeAm', 'Laptop1', '<p>This is an example paragraph.</p>\n    <div>\n      <h2>This is a div element</h2>\n      <p>This is some text inside the div element.</p>\n      <code>\n        function sayHello() {\n          console.log(\"Hello, World!\");\n        }\n        sayHello();\n      </code>\n    </div>', '5'),
(2, 'Laptop2', 'https://drive.google.com/uc?export=view&id=1MaXILM64uvl-s5PwHOTnKoa4Il6Pc-Df', 'Laptop2', '<p>Here is the code block:</p>\n    <pre>\n      function onOpen() {\n        DocumentApp.getUi()\n          .createMenu(\'Setup\')\n          .addItem(\'Setup Trigger\', \'myTrigger\')\n          .addToUi();\n      }\n\n      function myTrigger() {\n        var triggers = ScriptApp.getProjectTriggers();\n        if(triggers.length > 0){\n          for (var i=0;i<=triggers.length;i++) {\n            ScriptApp.deleteTrigger(triggers[i]);\n          }\n        }\n        ScriptApp.newTrigger(\"test\").timeBased().everyMinutes(1).create()\n      }\n\n      function test(){\n        Logger.log(\"test trigger\");\n\n        var doc = DocumentApp.getActiveDocument();\n        doc.getBody().setText(\"added from trigger\");\n      }\n    </pre>', '10'),
(10, 'Laptop3', 'https://drive.google.com/uc?export=view&id=1xlKttrpz02Bmq-9q2XHWdJFdJ9xBygsS', 'Laptop3', '<p>This is an example paragraph.</p>\n    <div>\n      <h2>This is a div element</h2>\n      <p>This is some text inside the div element.</p>\n      <code>\n        function sayHello() {\n          console.log(\"Hello, World!\");\n        }\n        sayHello();\n      </code>\n    </div>', '0'),
(11, 'Laptop4', 'https://drive.google.com/uc?export=view&id=1LVqqBQMeahYtUn7untO0Ww4RazbIDXoZ', 'Laptop4', '<p>This is an example paragraph.</p>\n    <div>\n      <h2>This is a div element</h2>\n      <p>This is some text inside the div element.</p>\n      <code>\n        function sayHello() {\n          console.log(\"Hello, World!\");\n        }\n        sayHello();\n      </code>\n    </div>', '0'),
(12, 'Laptop5', 'https://drive.google.com/uc?export=view&id=1DLR-E67RGdq34av09xNpHw5KsGzY0KJT', 'Laptop5', '<p>This is an example paragraph.</p>\n    <div>\n      <h2>This is a div element</h2>\n      <p>This is some text inside the div element.</p>\n      <code>\n        function sayHello() {\n          console.log(\"Hello, World!\");\n        }\n        sayHello();\n      </code>\n    </div>', '10'),
(13, 'Laptop6', 'https://drive.google.com/uc?export=view&id=1TkPH8HhQgQ4gcvqymCicol9Z7e29yEKK', 'Laptop6', '<p>This is an example paragraph.</p>\n    <div>\n      <h2>This is a div element</h2>\n      <p>This is some text inside the div element.</p>\n      <code>\n        function sayHello() {\n          console.log(\"Hello, World!\");\n        }\n        sayHello();\n      </code>\n    </div>', '5');

-- --------------------------------------------------------

--
-- Table structure for table `tbluser`
--

CREATE TABLE `tbluser` (
  `id` int(11) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbluser`
--

INSERT INTO `tbluser` (`id`, `email`, `password`) VALUES
(55, 'patra808@gmail.com', '$2y$10$F14uDVGobQt7pXBM7w4sLOruEKRY4FbiMgy5yz0gQk/QfCBqAiami');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `google_id` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile_image` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `indexpage`
--
ALTER TABLE `indexpage`
  ADD PRIMARY KEY (`sln`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payid`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `tbluser`
--
ALTER TABLE `tbluser`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `google_id` (`google_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `indexpage`
--
ALTER TABLE `indexpage`
  MODIFY `sln` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `payid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbluser`
--
ALTER TABLE `tbluser`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
