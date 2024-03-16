-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 16, 2024 at 07:06 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_info`
--

CREATE TABLE `admin_info` (
  `indx` int(255) NOT NULL,
  `Admin_Name` varchar(255) NOT NULL,
  `admin_Email` varchar(255) NOT NULL,
  `admin_Password` varchar(255) NOT NULL,
  `admin_Id` varchar(255) NOT NULL,
  `Admin_Img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_info`
--

INSERT INTO `admin_info` (`indx`, `Admin_Name`, `admin_Email`, `admin_Password`, `admin_Id`, `Admin_Img`) VALUES
(1, 'Anjum Ali', 'Anjum@gmail.com', '33221144', 'jojojo', 'images/machine Learning.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `amazon selling  _chatbox`
--

CREATE TABLE `amazon selling  _chatbox` (
  `indx` int(11) NOT NULL,
  `Sname` varchar(255) DEFAULT NULL,
  `Sid` varchar(255) DEFAULT NULL,
  `MSg` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `amazon selling  _chatbox`
--

INSERT INTO `amazon selling  _chatbox` (`indx`, `Sname`, `Sid`, `MSg`) VALUES
(1, 'Muhammad Fahad', 'g03', 'Hi there ');

-- --------------------------------------------------------

--
-- Table structure for table `amazon selling_chatbox`
--

CREATE TABLE `amazon selling_chatbox` (
  `indx` int(11) NOT NULL,
  `Sname` varchar(255) DEFAULT NULL,
  `Sid` varchar(255) DEFAULT NULL,
  `MSg` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `amazon selling  _students`
--

CREATE TABLE `amazon selling  _students` (
  `indx` int(11) NOT NULL,
  `student_name` varchar(255) DEFAULT NULL,
  `student_id` varchar(255) DEFAULT NULL,
  `student_CNIC` varchar(255) DEFAULT NULL,
  `student_gmail` varchar(255) DEFAULT NULL,
  `student_phone` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `amazon selling_students`
--

CREATE TABLE `amazon selling_students` (
  `indx` int(11) NOT NULL,
  `student_name` varchar(255) DEFAULT NULL,
  `student_id` varchar(255) DEFAULT NULL,
  `student_CNIC` varchar(255) DEFAULT NULL,
  `student_gmail` varchar(255) DEFAULT NULL,
  `student_phone` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `course_descriptions`
--

CREATE TABLE `course_descriptions` (
  `indx` int(255) NOT NULL,
  `course_name` varchar(255) NOT NULL,
  `course_description` varchar(255) NOT NULL,
  `learning_outcomes` varchar(255) NOT NULL,
  `video_url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `course_descriptions`
--

INSERT INTO `course_descriptions` (`indx`, `course_name`, `course_description`, `learning_outcomes`, `video_url`) VALUES
(76, 'React', 'The React. JS Course Curriculum contains basic elements like introduction, JSX overview, Environmental setup, real-time applications, forms and UI, Component Lifecycle, Event Handling, and Styles along with advanced features such as router and navigations', 'The React. JS Course Curriculum contains basic elements like introduction, JSX overview, Environmental setup, real-time applications, forms and UI, Component Lifecycle, Event Handling, and Styles along with advanced features such as router and navigations', 'The React. JS Course Curriculum contains basic elements like introduction, JSX overview, Environmental setup, real-time applications, forms and UI, Component Lifecycle, Event Handling, and Styles along with advanced features such as router and navigations'),
(77, 'Express', 'The React. JS Course Curriculum contains basic elements like introduction, JSX overview, Environmental setup, real-time applications, forms and UI, Component Lifecycle, Event Handling, and Styles along with advanced features such as router and navigations', 'The React. JS Course Curriculum contains basic elements like introduction, JSX overview, Environmental setup, real-time applications, forms and UI, Component Lifecycle, Event Handling, and Styles along with advanced features such as router and navigations', 'The React. JS Course Curriculum contains basic elements like introduction, JSX overview, Environmental setup, real-time applications, forms and UI, Component Lifecycle, Event Handling, and Styles along with advanced features such as router and navigations'),
(78, 'Node', 'The React. JS Course Curriculum contains basic elements like introduction, JSX overview, Environmental setup, real-time applications, forms and UI, Component Lifecycle, Event Handling, and Styles along with advanced features such as router and navigations', 'The React. JS Course Curriculum contains basic elements like introduction, JSX overview, Environmental setup, real-time applications, forms and UI, Component Lifecycle, Event Handling, and Styles along with advanced features such as router and navigations', 'Node'),
(79, 'Mango Db', 'The React. JS Course Curriculum contains basic elements like introduction, JSX overview, Environmental setup, real-time applications, forms and UI, Component Lifecycle, Event Handling, and Styles along with advanced features such as router and navigations', 'The React. JS Course Curriculum contains basic elements like introduction, JSX overview, Environmental setup, real-time applications, forms and UI, Component Lifecycle, Event Handling, and Styles along with advanced features such as router and navigations', 'https://youtu.be/vNersYpKFOQ'),
(80, 'Mango Db', 'The React. JS Course Curriculum contains basic elements like introduction, JSX overview, Environmental setup, real-time applications, forms and UI, Component Lifecycle, Event Handling, and Styles along with advanced features such as router and navigations', 'The React. JS Course Curriculum contains basic elements like introduction, JSX overview, Environmental setup, real-time applications, forms and UI, Component Lifecycle, Event Handling, and Styles along with advanced features such as router and navigations', 'https://youtu.be/vNersYpKFOQ'),
(81, 'PhotoShop', 'It focuses on key design and illustration concepts through the study of subjects such as design,', 'It focuses on key design and illustration concepts through the study of subjects such as design,', 'https://youtu.be/flnx5vkIodc'),
(82, 'Illustrator', 'It focuses on key design and illustration concepts through the study of subjects such as design,', 'It focuses on key design and illustration concepts through the study of subjects such as design,', 'https://youtu.be/flnx5vkIodc'),
(83, 'Adobe Xd', 'It focuses on key design and illustration concepts through the study of subjects such as design,', 'It focuses on key design and illustration concepts through the study of subjects such as design,', 'https://youtu.be/flnx5vkIodc'),
(84, 'Basic Concepts and Setup', 'ntroduction to WordPress: Overview of what WordPress is, its history, and its popularity.', 'ntroduction to WordPress: Overview of what WordPress is, its history, and its popularity.', 'https://youtu.be/tk-OZnJ_ito'),
(85, 'Building and Customizing  Website:', 'ntroduction to WordPress: Overview of what WordPress is, its history, and its popularity.', 'ntroduction to WordPress: Overview of what WordPress is, its history, and its popularity.', 'https://youtu.be/tk-OZnJ_ito'),
(86, 'Advanced Features and Maintenance', 'ntroduction to WordPress: Overview of what WordPress is, its history, and its popularity.', 'ntroduction to WordPress: Overview of what WordPress is, its history, and its popularity.', 'https://youtu.be/tk-OZnJ_ito'),
(87, 'Amazon Basics', 'It focuses on key design and illustration concepts through the study of subjects such as design,', 'It focuses on key design and illustration concepts through the study of subjects such as design,', 'https://youtu.be/flnx5vkIodc'),
(88, 'Optimizing Sales', 'It focuses on key design and illustration concepts through the study of subjects such as design,', 'It focuses on key design and illustration concepts through the study of subjects such as design,', 'https://youtu.be/flnx5vkIodc'),
(89, 'Optimizing Sales', 'It focuses on key design and illustration concepts through the study of subjects such as design,', 'It focuses on key design and illustration concepts through the study of subjects such as design,', 'https://youtu.be/flnx5vkIodc');

-- --------------------------------------------------------

--
-- Table structure for table `express`
--

CREATE TABLE `express` (
  `indx` int(11) NOT NULL,
  `c_name` varchar(255) DEFAULT NULL,
  `lecture_no` int(11) DEFAULT NULL,
  `Lecture_topic` varchar(255) DEFAULT NULL,
  `Lecture_Description` varchar(255) DEFAULT NULL,
  `lecture_outcomes` varchar(255) DEFAULT NULL,
  `video_url` varchar(255) DEFAULT NULL,
  `lesson_pdf` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faculty_webinar`
--

CREATE TABLE `faculty_webinar` (
  `indx` int(255) NOT NULL,
  `EventNAme` varchar(255) NOT NULL,
  `Topic` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL,
  `Hosted_By` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `faculty_webinar`
--

INSERT INTO `faculty_webinar` (`indx`, `EventNAme`, `Topic`, `time`, `Hosted_By`) VALUES
(1, 'sdfsdf', 'dsfsdf', 'sdfsdf', 'sdfsdf'),
(2, 'Asad ', 'ASad', 'ASad', 'ASAd'),
(3, 'Ahad', 'Ahad', 'Ahad', 'Ahad');

-- --------------------------------------------------------

--
-- Table structure for table `graphic designing_chatbox`
--

CREATE TABLE `graphic designing_chatbox` (
  `indx` int(11) NOT NULL,
  `Sname` varchar(255) DEFAULT NULL,
  `Sid` varchar(255) DEFAULT NULL,
  `MSg` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `graphic designing_chatbox`
--

INSERT INTO `graphic designing_chatbox` (`indx`, `Sname`, `Sid`, `MSg`) VALUES
(1, 'Muhammad Fahad', 'g03', 'hello i am teacher want to confirm that class will not be held'),
(2, 'Random Name 1', 'Random ID 1', 'Random Message 1'),
(3, 'Random Name 2', 'Random ID 2', 'Random Message 2'),
(4, 'Random Name 3', 'Random ID 3', 'Random Message 3'),
(5, 'Random Name 4', 'Random ID 4', 'Random Message 4'),
(6, 'Random Name 5', 'Random ID 5', 'Random Message 5'),
(7, 'Random Name 6', 'Random ID 6', 'Random Message 6'),
(8, 'Random Name 7', 'Random ID 7', 'Random Message 7'),
(9, 'Random Name 8', 'Random ID 8', 'Random Message 8'),
(10, 'Random Name 9', 'Random ID 9', 'Random Message 9'),
(11, 'Muhammad Fahad', 'g03', 'hello i am teacher want to confirm that class will not be held'),
(12, 'Random Name 11', 'Random ID 11', 'Random Message 11'),
(13, 'Random Name 12', 'Random ID 12', 'Random Message 12'),
(14, 'Random Name 13', 'Random ID 13', 'Random Message 13'),
(15, 'Random Name 14', 'Random ID 14', 'Random Message 14'),
(16, 'Random Name 15', 'Random ID 15', 'Random Message 15'),
(17, 'Random Name 16', 'Random ID 16', 'Random Message 16'),
(18, 'Random Name 17', 'Random ID 17', 'Random Message 17'),
(19, 'Random Name 18', 'Random ID 18', 'Random Message 18'),
(20, 'Random Name 19', 'Random ID 19', 'Random Message 19'),
(21, 'Muhammad Fahad', 'g03', 'hello i am teacher want to confirm that class will not be held'),
(22, 'Muhammad Fahad', 'g03', 'Hello Fucker'),
(23, 'Muhammad Fahad', 'g03', 'hoi there '),
(24, 'Muhammad Fahad', 'g03', 'wtass  up'),
(25, 'Muhammad Fahad', 'g03', 'hi therer'),
(26, 'Muhammad Fahad', 'g03', 'just a test'),
(27, 'Muhammad Fahad', 'g03', 'hi hi hi '),
(28, 'Muhammad Fahad', 'g03', 'jop jo mascrainas '),
(29, 'Muhammad Fahad', 'g03', 'yo yoy o'),
(30, 'Muhammad Fahad', 'g03', 'yalla Habbibi'),
(31, 'Muhammad Fahad', 'g03', ''),
(32, 'Muhammad Fahad', 'g03', ''),
(33, 'Muhammad Fahad', 'g03', ''),
(34, 'Muhammad Fahad', 'g03', 'sdfsdf'),
(35, 'Muhammad Fahad', 'g03', 'hellooo wtf'),
(36, 'Muhammad Fahad', 'g03', 'dssdfsds'),
(37, 'Muhammad Fahad', 'g03', 'duckl '),
(38, 'Muhammad Fahad', 'g03', 'course NASme'),
(39, 'Muhammad Fahad', 'g03', ''),
(40, 'Muhammad Fahad', 'g03', ''),
(41, 'Muhammad Fahad', 'g03', ''),
(42, 'Muhammad Fahad', 'g03', 'hi fucker'),
(43, 'Muhammad Fahad', 'g03', 'duck is duck '),
(44, 'Muhammad Fahad', 'g03', 'ducky bahi uis great'),
(45, 'Muhammad Fahad', 'g03', 'duck is duck'),
(46, 'Asad rehman', 's01', 'duck is fuck'),
(47, 'Muhammad Fahad', 'g03', 'hello there');

-- --------------------------------------------------------

--
-- Table structure for table `graphic designing_students`
--

CREATE TABLE `graphic designing_students` (
  `indx` int(11) NOT NULL,
  `student_name` varchar(255) DEFAULT NULL,
  `student_id` varchar(255) DEFAULT NULL,
  `student_CNIC` varchar(255) DEFAULT NULL,
  `student_gmail` varchar(255) DEFAULT NULL,
  `student_phone` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `graphic designing_students`
--

INSERT INTO `graphic designing_students` (`indx`, `student_name`, `student_id`, `student_CNIC`, `student_gmail`, `student_phone`) VALUES
(2, 'Asad rehman', 's01', 'ASDASD232323', 'Asad@gmail.com', '03084844571');

-- --------------------------------------------------------

--
-- Table structure for table `guides_details`
--

CREATE TABLE `guides_details` (
  `indx` int(255) NOT NULL,
  `Guide_name` varchar(255) NOT NULL,
  `Guide_Id` varchar(255) NOT NULL,
  `Guide_email` varchar(255) NOT NULL,
  `Guide_phone` varchar(255) NOT NULL,
  `GuideAdress` varchar(255) NOT NULL,
  `Guide_Password` varchar(255) NOT NULL,
  `Guide_Course` varchar(255) NOT NULL,
  `guide_image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `guides_details`
--

INSERT INTO `guides_details` (`indx`, `Guide_name`, `Guide_Id`, `Guide_email`, `Guide_phone`, `GuideAdress`, `Guide_Password`, `Guide_Course`, `guide_image`) VALUES
(12, 'Muhammad Bin Ashiq', 'g01', 'Muhammad@gmail.com', '0308488888', 'Nowhere', '123456789', '', 'images/code1.JPG'),
(13, 'Muhammad Behlol', 'g02', 'Behlol@gmail.com', '03044950', 'Nowhere', '12345678', '', 'images/code1.JPG'),
(14, 'Muhammad Fahad', 'g03', 'Fahad@gmail.com', '03044950', 'Nowhere', '12345678', '', 'images/code1.JPG');

-- --------------------------------------------------------

--
-- Table structure for table `illustrator`
--

CREATE TABLE `illustrator` (
  `indx` int(11) NOT NULL,
  `c_name` varchar(255) DEFAULT NULL,
  `lecture_no` int(11) DEFAULT NULL,
  `Lecture_topic` varchar(255) DEFAULT NULL,
  `Lecture_Description` varchar(255) DEFAULT NULL,
  `lecture_outcomes` varchar(255) DEFAULT NULL,
  `video_url` varchar(255) DEFAULT NULL,
  `lesson_pdf` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `illustrator_topica`
--

CREATE TABLE `illustrator_topica` (
  `indx` int(11) NOT NULL,
  `Question` varchar(255) DEFAULT NULL,
  `Option_A` varchar(255) DEFAULT NULL,
  `Option_B` varchar(255) DEFAULT NULL,
  `Option_C` varchar(255) DEFAULT NULL,
  `Option_D` varchar(255) DEFAULT NULL,
  `Correct_Answer` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `illustrator_topica`
--

INSERT INTO `illustrator_topica` (`indx`, `Question`, `Option_A`, `Option_B`, `Option_C`, `Option_D`, `Correct_Answer`) VALUES
(1, 'What is the primary purpose of the Photoshop software?', 'Creating vector graphics', 'Editing and manipulating images', 'Writing code for web development', 'Creating 3D animations', 'Editing and manipulating images'),
(2, 'What file format supports transparency in Photoshop?', 'Creating vector graphics', 'Editing and manipulating images', 'Writing code for web development', 'Creating 3D animations', 'Editing and manipulating images'),
(3, 'What does the term \"RGB\" stand for in Photoshop?', 'Creating vector graphics', 'Editing and manipulating images', 'Writing code for web development', 'Creating 3D animations', 'Editing and manipulating images'),
(4, 'What file format supports transparency in Photoshop?', 'Creating vector graphics', 'Editing and manipulating images', 'Writing code for web development', 'Creating 3D animations', 'Editing and manipulating images'),
(5, 'What file format supports transparency in Photoshop?', 'Creating vector graphics', 'Editing and manipulating images', 'Writing code for web development', 'Creating 3D animations', 'Editing and manipulating images'),
(6, 'What file format supports transparency in Photoshop?', 'Creating vector graphics', 'Editing and manipulating images', 'Writing code for web development', 'Creating 3D animations', 'Editing and manipulating images'),
(7, 'What does the term \"RGB\" stand for in Photoshop?', 'Creating vector graphics', 'Editing and manipulating images', 'Writing code for web development', 'Creating 3D animations', 'Editing and manipulating images'),
(8, 'Which Photoshop feature is used to blend two or more images seamlessly?', 'Creating vector graphics', 'Editing and manipulating images', 'Writing code for web development', 'Creating 3D animations', 'Editing and manipulating images'),
(9, 'What does the term \"RGB\" stand for in Photoshop?', 'Creating vector graphics', 'Editing and manipulating images', 'Writing code for web development', 'Creating 3D animations', 'Editing and manipulating images'),
(10, 'What does the term \"RGB\" stand for in Photoshop?', 'Creating vector graphics', 'Editing and manipulating images', 'Clone Stamp Tool', 'Creating 3D animations', 'Editing and manipulating images');

-- --------------------------------------------------------

--
-- Table structure for table `mern stack_chatbox`
--

CREATE TABLE `mern stack_chatbox` (
  `indx` int(11) NOT NULL,
  `Sname` varchar(255) DEFAULT NULL,
  `Sid` varchar(255) DEFAULT NULL,
  `MSg` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mern stack_chatbox`
--

INSERT INTO `mern stack_chatbox` (`indx`, `Sname`, `Sid`, `MSg`) VALUES
(1, 'Asad rehman', 's01', 'Hi i am asad Rehman here');

-- --------------------------------------------------------

--
-- Table structure for table `mern stack_students`
--

CREATE TABLE `mern stack_students` (
  `indx` int(11) NOT NULL,
  `student_name` varchar(255) DEFAULT NULL,
  `student_id` varchar(255) DEFAULT NULL,
  `student_CNIC` varchar(255) DEFAULT NULL,
  `student_gmail` varchar(255) DEFAULT NULL,
  `student_phone` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mern stack_students`
--

INSERT INTO `mern stack_students` (`indx`, `student_name`, `student_id`, `student_CNIC`, `student_gmail`, `student_phone`) VALUES
(4, 'Asad rehman', 's01', '33102rfrf', 'Asad@gmail.com', '03084844571');

-- --------------------------------------------------------

--
-- Table structure for table `node`
--

CREATE TABLE `node` (
  `indx` int(11) NOT NULL,
  `c_name` varchar(255) DEFAULT NULL,
  `lecture_no` int(11) DEFAULT NULL,
  `Lecture_topic` varchar(255) DEFAULT NULL,
  `Lecture_Description` varchar(255) DEFAULT NULL,
  `lecture_outcomes` varchar(255) DEFAULT NULL,
  `video_url` varchar(255) DEFAULT NULL,
  `lesson_pdf` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `parent_courses`
--

CREATE TABLE `parent_courses` (
  `indx` int(255) NOT NULL,
  `C_Name` varchar(255) NOT NULL,
  `Course_Id` varchar(255) NOT NULL,
  `Description` varchar(255) NOT NULL,
  `Guide_name` varchar(255) NOT NULL,
  `Guide_Email` varchar(255) NOT NULL,
  `Guide_Key` varchar(255) NOT NULL,
  `ImgName` varchar(255) NOT NULL,
  `course_duration` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `parent_courses`
--

INSERT INTO `parent_courses` (`indx`, `C_Name`, `Course_Id`, `Description`, `Guide_name`, `Guide_Email`, `Guide_Key`, `ImgName`, `course_duration`) VALUES
(41, 'Pythion', 'c01', 'It focuses on key design and illustration concepts through the study of subjects such as design,', 'Muhammad Fahad', 'Fahad@gmail.com', 'g03', 'images/python-2.gif', '4 months'),
(42, 'Graphic Designing', 'c02', 'It focuses on key design and illustration concepts through the study of subjects such as design,', 'Muhammad Fahad', 'Fahad@gmail.com', 'g03', 'images/Graphic-Design.gif', '5 Months'),
(43, 'Mern Stack', 'c03', 'It focuses on key design and illustration concepts through the study of subjects such as design,', 'Muhammad Bin Ashiq', 'Muhammad@gmail.com', 'g01', 'images/mern1.gif', '5 onths'),
(44, 'Word Press', 'c04', 'A mastery of WordPress can lead to a career as a WordPress Developer, with potential roles ranging from website creation to content management', 'Muhammad Behlol', 'Behlol@gmail.com', 'g02', 'images/wep2.jpg', '5 Months'),
(45, 'Amazon Selling', 'c05', 'It focuses on key design and illustration concepts through the study of subjects such as design,', 'Muhammad Fahad', 'Fahad@gmail.com', 'g03', 'images/amzon1.gif', '5 Months');

-- --------------------------------------------------------

--
-- Table structure for table `photoshop`
--

CREATE TABLE `photoshop` (
  `indx` int(11) NOT NULL,
  `c_name` varchar(255) DEFAULT NULL,
  `lecture_no` int(11) DEFAULT NULL,
  `Lecture_topic` varchar(255) DEFAULT NULL,
  `Lecture_Description` varchar(255) DEFAULT NULL,
  `lecture_outcomes` varchar(255) DEFAULT NULL,
  `video_url` varchar(255) DEFAULT NULL,
  `lesson_pdf` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `photoshop`
--

INSERT INTO `photoshop` (`indx`, `c_name`, `lecture_no`, `Lecture_topic`, `Lecture_Description`, `lecture_outcomes`, `video_url`, `lesson_pdf`) VALUES
(1, NULL, 1, 'nothing', 'nothing', 'nothing', 'https://youtu.be/FYCZeitBGfU', 'images/Documentation.docx');

-- --------------------------------------------------------

--
-- Table structure for table `photoshop_quiz1`
--

CREATE TABLE `photoshop_quiz1` (
  `indx` int(11) NOT NULL,
  `Question` varchar(255) DEFAULT NULL,
  `Option_A` varchar(255) DEFAULT NULL,
  `Option_B` varchar(255) DEFAULT NULL,
  `Option_C` varchar(255) DEFAULT NULL,
  `Option_D` varchar(255) DEFAULT NULL,
  `Correct_Answer` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `photoshop_quiz1`
--

INSERT INTO `photoshop_quiz1` (`indx`, `Question`, `Option_A`, `Option_B`, `Option_C`, `Option_D`, `Correct_Answer`) VALUES
(1, 'What is the primary purpose of the Photoshop software?', 'Creating vector graphics', 'Editing and manipulating images', 'Writing code for web development', 'Creating 3D animations', 'Editing and manipulating images'),
(2, 'Which tool is commonly used to remove unwanted elements from an image in Photoshop?', 'Paint Bucket Tool', 'Pen Tool', 'Clone Stamp Tool', 'Crop Tool', 'Clone Stamp Tool '),
(3, 'What file format supports transparency in Photoshop?', 'JPEG', 'PNG', 'GIF', 'BMP', 'PNG'),
(4, 'Which adjustment layer is used to adjust the brightness and contrast of an image?', ' Hue/Saturation', ' Levels', 'Curves', ' Brightness/Contrast', 'Brightness/Contrast'),
(5, 'What does the term \"DPI\" stand for in Photoshop?', 'Digital Pixel Interface', 'Dots Per Inch', 'Design Pattern Integration', 'Dynamic Photo Index', 'Dots Per Inch '),
(6, 'Which tool is used to make precise selections based on color or tone in Photoshop?', 'Brush Tool', 'Magic Wand Tool', 'Pen Tool', 'Marquee Tool', 'Magic Wand Tool '),
(7, 'Which panel in Photoshop allows you to manage layers?', 'Navigator', 'Histogram', 'Layers', 'Channels', 'Layers '),
(8, 'What does the term \"RGB\" stand for in Photoshop?', 'Really Good Brightness', 'Red Green Blue', 'Random Gradient Blend', 'Reflective Gaussian Blur', 'Red Green Blue'),
(9, 'What keyboard shortcut is commonly used to undo the last action in Photoshop?', 'Ctrl + Z (Windows) / Command + Z (Mac)', 'Ctrl + X (Windows) / Command + X (Mac)', 'Ctrl + C (Windows) / Command + C (Mac)', 'Ctrl + V (Windows) / Command + V (Mac)', 'Ctrl + Z (Windows) / Command + Z (Mac)'),
(10, 'Which Photoshop feature is used to blend two or more images seamlessly?', 'Filter Gallery', 'Gradient Tool', ' Layer Mask', 'Merge Layers', 'Layer Mask');

-- --------------------------------------------------------

--
-- Table structure for table `photoshop_quiz2`
--

CREATE TABLE `photoshop_quiz2` (
  `indx` int(11) NOT NULL,
  `Question` varchar(255) DEFAULT NULL,
  `Option_A` varchar(255) DEFAULT NULL,
  `Option_B` varchar(255) DEFAULT NULL,
  `Option_C` varchar(255) DEFAULT NULL,
  `Option_D` varchar(255) DEFAULT NULL,
  `Correct_Answer` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `photoshop_quiz2`
--

INSERT INTO `photoshop_quiz2` (`indx`, `Question`, `Option_A`, `Option_B`, `Option_C`, `Option_D`, `Correct_Answer`) VALUES
(1, 'Which tool is commonly used for selecting and cropping areas in Photoshop?', ' Brush Tool', 'Eraser Tool', 'Crop Tool', 'Move Tool', 'Crop Tool '),
(2, 'Which blending mode in Photoshop is often used to enhance contrast and color intensity?', 'Overlay', 'Screen', ' Multiply', 'Difference', 'Overlay'),
(3, 'What does the term \"RGB\" stand for in Photoshop?', 'Really Good Brightness', 'Red Green Blue', 'Royal Golden Brown', 'Rich Gray Background', 'Red Green Blue '),
(4, 'Which adjustment layer in Photoshop is used to adjust the color balance of an image?', 'Levels', 'Hue/Saturation', 'Color Balance', ' Vibrance', 'Color Balance'),
(5, 'What keyboard shortcut is commonly used to undo the last action in Photoshop?', 'Ctrl + Z (Windows) / Command + Z (Mac)', 'Ctrl + X (Windows) / Command + X (Mac)', 'Ctrl + C (Windows) / Command + C (Mac)', 'Ctrl + V (Windows) / Command + V (Mac)', 'Ctrl + Z (Windows) / Command + Z (Mac)'),
(6, 'Which tool is used to clone or duplicate parts of an image in Photoshop?', 'Brush Tool', 'Pen Tool', 'Clone Stamp Tool', 'Gradient Tool', 'Clone Stamp Tool '),
(7, 'What file format supports transparency in Photoshop?', 'JPEG', 'PNG', 'GIF', 'TIFF', 'PNG'),
(8, 'Which panel in Photoshop allows you to manage and organize layers?', ' Navigator', 'Layers', 'Channels', 'History', 'Layers'),
(9, 'What does the term \"DPI\" stand for in Photoshop?', 'Digital Photo Interface', 'Dots Per Inch', 'Document Print Integration', ' Dynamic Pixel Interpretation', ' Dots Per Inch'),
(10, 'Which tool is used to make precise selections based on color in Photoshop?', 'Lasso Tool', 'Magic Wand Tool', 'Quick Selection Tool', 'Pen Tool', 'Magic Wand Tool');

-- --------------------------------------------------------

--
-- Table structure for table `pythion_chatbox`
--

CREATE TABLE `pythion_chatbox` (
  `indx` int(11) NOT NULL,
  `Sname` varchar(255) DEFAULT NULL,
  `Sid` varchar(255) DEFAULT NULL,
  `MSg` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pythion_chatbox`
--

INSERT INTO `pythion_chatbox` (`indx`, `Sname`, `Sid`, `MSg`) VALUES
(1, 'Muhammad Fahad', 'g03', 'hello i am teacher want to confirm that class will not be held'),
(2, 'Random Name 1', 'Random ID 1', 'Random Message 1'),
(3, 'Random Name 2', 'Random ID 2', 'Random Message 2'),
(4, 'Random Name 3', 'Random ID 3', 'Random Message 3'),
(5, 'Random Name 4', 'Random ID 4', 'Random Message 4'),
(6, 'Random Name 5', 'Random ID 5', 'Random Message 5'),
(7, 'Random Name 6', 'Random ID 6', 'Random Message 6'),
(8, 'Random Name 7', 'Random ID 7', 'Random Message 7'),
(9, 'Random Name 8', 'Random ID 8', 'Random Message 8'),
(10, 'Random Name 9', 'Random ID 9', 'Random Message 9'),
(11, 'Muhammad Fahad', 'g03', 'hello i am teacher want to confirm that class will not be held'),
(12, 'Random Name 11', 'Random ID 11', 'Random Message 11'),
(13, 'Random Name 12', 'Random ID 12', 'Random Message 12'),
(14, 'Random Name 13', 'Random ID 13', 'Random Message 13'),
(15, 'Random Name 14', 'Random ID 14', 'Random Message 14'),
(16, 'Random Name 15', 'Random ID 15', 'Random Message 15'),
(17, 'Random Name 16', 'Random ID 16', 'Random Message 16'),
(18, 'Random Name 17', 'Random ID 17', 'Random Message 17'),
(19, 'Random Name 18', 'Random ID 18', 'Random Message 18'),
(20, 'Random Name 19', 'Random ID 19', 'Random Message 19'),
(21, 'Muhammad Fahad', 'g03', 'pYTHON hello i am teacher want to confirm that class will not be held'),
(22, 'Muhammad Fahad', 'g03', 'Helloooooo thereee'),
(23, 'Muhammad Fahad', 'g03', 'hello mike testing one 2 three');

-- --------------------------------------------------------

--
-- Table structure for table `pythion_students`
--

CREATE TABLE `pythion_students` (
  `indx` int(11) NOT NULL,
  `student_name` varchar(255) DEFAULT NULL,
  `student_id` varchar(255) DEFAULT NULL,
  `student_CNIC` varchar(255) DEFAULT NULL,
  `student_gmail` varchar(255) DEFAULT NULL,
  `student_phone` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `quiz_list`
--

CREATE TABLE `quiz_list` (
  `indx` int(255) NOT NULL,
  `course_Name` varchar(255) NOT NULL,
  `quiz_title` varchar(255) NOT NULL,
  `total_marks` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `quiz_list`
--

INSERT INTO `quiz_list` (`indx`, `course_Name`, `quiz_title`, `total_marks`) VALUES
(14, 'PhotoShop', 'quiz1', '10'),
(15, 'PhotoShop', 'quiz2', '10'),
(16, 'Illustrator', 'tOPICa', '10');

-- --------------------------------------------------------

--
-- Table structure for table `quiz_marks`
--

CREATE TABLE `quiz_marks` (
  `indx` int(244) NOT NULL,
  `quiz_name` varchar(244) NOT NULL,
  `course_name` varchar(244) NOT NULL,
  `student_name` varchar(244) NOT NULL,
  `student_id` varchar(244) NOT NULL,
  `toatl_marks` int(244) NOT NULL,
  `obtained_marks` int(244) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `quiz_marks`
--

INSERT INTO `quiz_marks` (`indx`, `quiz_name`, `course_name`, `student_name`, `student_id`, `toatl_marks`, `obtained_marks`) VALUES
(1, 'quiz2', 'PhotoShop', 'Muhammad Fahad', 'g03', 10, 2),
(2, 'quiz2', 'PhotoShop', 'Muhammad Fahad', 'g03', 10, 3),
(3, 'quiz1', 'PhotoShop', 'Asad rehman', 's01', 10, 1),
(4, 'quiz2', 'PhotoShop', 'Asad rehman', 's01', 10, 3),
(5, 'tOPICa', 'Illustrator', 'Asad rehman', 's01', 10, 3);

-- --------------------------------------------------------

--
-- Table structure for table `react`
--

CREATE TABLE `react` (
  `indx` int(11) NOT NULL,
  `c_name` varchar(255) DEFAULT NULL,
  `lecture_no` int(11) DEFAULT NULL,
  `Lecture_topic` varchar(255) DEFAULT NULL,
  `Lecture_Description` varchar(255) DEFAULT NULL,
  `lecture_outcomes` varchar(255) DEFAULT NULL,
  `video_url` varchar(255) DEFAULT NULL,
  `lesson_pdf` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `students_webinar`
--

CREATE TABLE `students_webinar` (
  `indx` int(255) NOT NULL,
  `EventNAme` varchar(255) NOT NULL,
  `Topic` varchar(255) NOT NULL,
  `Time` varchar(255) NOT NULL,
  `Hosted_By` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students_webinar`
--

INSERT INTO `students_webinar` (`indx`, `EventNAme`, `Topic`, `Time`, `Hosted_By`) VALUES
(1, 'sdfsdf', 'sdfsdf', 'sdfsdf', 'sdfsdf'),
(2, 'Jpoojojo', 'Jpoojojo', 'Jpoojojo', 'Jpoojojo'),
(3, 'totototot', 'totototot', 'totototot', 'totototot');

-- --------------------------------------------------------

--
-- Table structure for table `student_details`
--

CREATE TABLE `student_details` (
  `indx` int(255) NOT NULL,
  `student_name` varchar(255) NOT NULL,
  `student_Id` varchar(255) NOT NULL,
  `student_email` varchar(255) NOT NULL,
  `student_phone` varchar(255) NOT NULL,
  `student_Adress` varchar(255) NOT NULL,
  `student_Password` varchar(255) NOT NULL,
  `student_img` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_details`
--

INSERT INTO `student_details` (`indx`, `student_name`, `student_Id`, `student_email`, `student_phone`, `student_Adress`, `student_Password`, `student_img`) VALUES
(21, 'Asad rehman', 's01', 'asad@gmail.com', '', '', '1234', 'images/smile.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `sub_courses`
--

CREATE TABLE `sub_courses` (
  `indx` int(255) NOT NULL,
  `C_Name` varchar(255) NOT NULL,
  `Parnt_C_Name` varchar(255) NOT NULL,
  `Description` varchar(255) NOT NULL,
  `ImgName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sub_courses`
--

INSERT INTO `sub_courses` (`indx`, `C_Name`, `Parnt_C_Name`, `Description`, `ImgName`) VALUES
(72, 'React', 'Mern Stack', 'The React. JS Course Curriculum contains basic elements like introduction, JSX overview, Environmental setup, real-time applications, forms and UI, Component Lifecycle, Event Handling, and Styles along with advanced features such as router and navigations', 'images/mern2.jpg'),
(73, 'Express', 'Mern Stack', 'The React. JS Course Curriculum contains basic elements like introduction, JSX overview, Environmental setup, real-time applications, forms and UI, Component Lifecycle, Event Handling, and Styles along with advanced features such as router and navigations', 'images/mern3.jpg'),
(74, 'Node', 'Mern Stack', 'The React. JS Course Curriculum contains basic elements like introduction, JSX overview, Environmental setup, real-time applications, forms and UI, Component Lifecycle, Event Handling, and Styles along with advanced features such as router and navigations', 'images/mern4.png'),
(75, 'Mango Db', 'Mern Stack', 'The React. JS Course Curriculum contains basic elements like introduction, JSX overview, Environmental setup, real-time applications, forms and UI, Component Lifecycle, Event Handling, and Styles along with advanced features such as router and navigations', 'images/MongoDB-2021.jpg'),
(76, 'PhotoShop', 'Graphic Designing', 'It focuses on key design and illustration concepts through the study of subjects such as design,', 'images/Graphic-Design2.jpg'),
(77, 'Illustrator', 'Graphic Designing', 'It focuses on key design and illustration concepts through the study of subjects such as design,', 'images/illustrtator.jpg'),
(78, 'Adobe Xd', 'Graphic Designing', 'It focuses on key design and illustration concepts through the study of subjects such as design,', 'images/xd.png'),
(79, 'Basic Concepts and Setup', 'Word Press', 'ntroduction to WordPress: Overview of what WordPress is, its history, and its popularity.', 'images/hqdefault.jpg'),
(80, 'Building and Customizing  Website:', 'Word Press', 'ntroduction to WordPress: Overview of what WordPress is, its history, and its popularity.', 'images/wep2.jpg'),
(81, 'Advanced Features and Maintenance', 'Word Press', 'ntroduction to WordPress: Overview of what WordPress is, its history, and its popularity.', 'images/wp3.png'),
(82, 'Amazon Basics', 'Amazon Selling  ', 'Overview of Amazon: Introduction to Amazon as an e-commerce platform, its history, and its significance in the online retail industry.', 'images/amzon2.png'),
(83, 'Optimizing Sales', 'Amazon Selling  ', 'Overview of Amazon: Introduction to Amazon as an e-commerce platform, its history, and its significance in the online retail industry.', 'images/amazon2.jpg'),
(84, 'Optimizing Sales', 'Amazon Selling  ', 'Overview of Amazon: Introduction to Amazon as an e-commerce platform, its history, and its significance in the online retail industry.', 'images/amaz3.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `upcoming_courses`
--

CREATE TABLE `upcoming_courses` (
  `indx` int(255) NOT NULL,
  `Course_name` varchar(255) NOT NULL,
  `Duration` varchar(255) NOT NULL,
  `launch_Date` varchar(255) NOT NULL,
  `Hosted_By` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `upcoming_courses`
--

INSERT INTO `upcoming_courses` (`indx`, `Course_name`, `Duration`, `launch_Date`, `Hosted_By`) VALUES
(1, 'jhule ljhule jhule', 'jhule ljhule jhule', 'jhule ljhule jhule', 'jhule ljhule jhule'),
(2, 'hajiii', 'hajiii', 'hajiii', 'hajiii'),
(3, 'opopopopo', 'opopopopo', 'opopopopo', 'opopopopo');

-- --------------------------------------------------------

--
-- Table structure for table `word press_chatbox`
--

CREATE TABLE `word press_chatbox` (
  `indx` int(11) NOT NULL,
  `Sname` varchar(255) DEFAULT NULL,
  `Sid` varchar(255) DEFAULT NULL,
  `MSg` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `word press_students`
--

CREATE TABLE `word press_students` (
  `indx` int(11) NOT NULL,
  `student_name` varchar(255) DEFAULT NULL,
  `student_id` varchar(255) DEFAULT NULL,
  `student_CNIC` varchar(255) DEFAULT NULL,
  `student_gmail` varchar(255) DEFAULT NULL,
  `student_phone` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_info`
--
ALTER TABLE `admin_info`
  ADD PRIMARY KEY (`indx`);

--
-- Indexes for table `amazon selling  _chatbox`
--
ALTER TABLE `amazon selling  _chatbox`
  ADD PRIMARY KEY (`indx`);

--
-- Indexes for table `amazon selling_chatbox`
--
ALTER TABLE `amazon selling_chatbox`
  ADD PRIMARY KEY (`indx`);

--
-- Indexes for table `amazon selling  _students`
--
ALTER TABLE `amazon selling  _students`
  ADD PRIMARY KEY (`indx`);

--
-- Indexes for table `amazon selling_students`
--
ALTER TABLE `amazon selling_students`
  ADD PRIMARY KEY (`indx`);

--
-- Indexes for table `course_descriptions`
--
ALTER TABLE `course_descriptions`
  ADD PRIMARY KEY (`indx`);

--
-- Indexes for table `express`
--
ALTER TABLE `express`
  ADD PRIMARY KEY (`indx`);

--
-- Indexes for table `faculty_webinar`
--
ALTER TABLE `faculty_webinar`
  ADD PRIMARY KEY (`indx`);

--
-- Indexes for table `graphic designing_chatbox`
--
ALTER TABLE `graphic designing_chatbox`
  ADD PRIMARY KEY (`indx`);

--
-- Indexes for table `graphic designing_students`
--
ALTER TABLE `graphic designing_students`
  ADD PRIMARY KEY (`indx`);

--
-- Indexes for table `guides_details`
--
ALTER TABLE `guides_details`
  ADD PRIMARY KEY (`indx`);

--
-- Indexes for table `illustrator`
--
ALTER TABLE `illustrator`
  ADD PRIMARY KEY (`indx`);

--
-- Indexes for table `illustrator_topica`
--
ALTER TABLE `illustrator_topica`
  ADD PRIMARY KEY (`indx`);

--
-- Indexes for table `mern stack_chatbox`
--
ALTER TABLE `mern stack_chatbox`
  ADD PRIMARY KEY (`indx`);

--
-- Indexes for table `mern stack_students`
--
ALTER TABLE `mern stack_students`
  ADD PRIMARY KEY (`indx`);

--
-- Indexes for table `node`
--
ALTER TABLE `node`
  ADD PRIMARY KEY (`indx`);

--
-- Indexes for table `parent_courses`
--
ALTER TABLE `parent_courses`
  ADD PRIMARY KEY (`indx`);

--
-- Indexes for table `photoshop`
--
ALTER TABLE `photoshop`
  ADD PRIMARY KEY (`indx`);

--
-- Indexes for table `photoshop_quiz1`
--
ALTER TABLE `photoshop_quiz1`
  ADD PRIMARY KEY (`indx`);

--
-- Indexes for table `photoshop_quiz2`
--
ALTER TABLE `photoshop_quiz2`
  ADD PRIMARY KEY (`indx`);

--
-- Indexes for table `pythion_chatbox`
--
ALTER TABLE `pythion_chatbox`
  ADD PRIMARY KEY (`indx`);

--
-- Indexes for table `pythion_students`
--
ALTER TABLE `pythion_students`
  ADD PRIMARY KEY (`indx`);

--
-- Indexes for table `quiz_list`
--
ALTER TABLE `quiz_list`
  ADD PRIMARY KEY (`indx`);

--
-- Indexes for table `quiz_marks`
--
ALTER TABLE `quiz_marks`
  ADD PRIMARY KEY (`indx`);

--
-- Indexes for table `react`
--
ALTER TABLE `react`
  ADD PRIMARY KEY (`indx`);

--
-- Indexes for table `students_webinar`
--
ALTER TABLE `students_webinar`
  ADD PRIMARY KEY (`indx`);

--
-- Indexes for table `student_details`
--
ALTER TABLE `student_details`
  ADD PRIMARY KEY (`indx`);

--
-- Indexes for table `sub_courses`
--
ALTER TABLE `sub_courses`
  ADD PRIMARY KEY (`indx`);

--
-- Indexes for table `upcoming_courses`
--
ALTER TABLE `upcoming_courses`
  ADD PRIMARY KEY (`indx`);

--
-- Indexes for table `word press_chatbox`
--
ALTER TABLE `word press_chatbox`
  ADD PRIMARY KEY (`indx`);

--
-- Indexes for table `word press_students`
--
ALTER TABLE `word press_students`
  ADD PRIMARY KEY (`indx`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_info`
--
ALTER TABLE `admin_info`
  MODIFY `indx` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `amazon selling  _chatbox`
--
ALTER TABLE `amazon selling  _chatbox`
  MODIFY `indx` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `amazon selling_chatbox`
--
ALTER TABLE `amazon selling_chatbox`
  MODIFY `indx` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `amazon selling  _students`
--
ALTER TABLE `amazon selling  _students`
  MODIFY `indx` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `amazon selling_students`
--
ALTER TABLE `amazon selling_students`
  MODIFY `indx` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `course_descriptions`
--
ALTER TABLE `course_descriptions`
  MODIFY `indx` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `express`
--
ALTER TABLE `express`
  MODIFY `indx` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faculty_webinar`
--
ALTER TABLE `faculty_webinar`
  MODIFY `indx` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `graphic designing_chatbox`
--
ALTER TABLE `graphic designing_chatbox`
  MODIFY `indx` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `graphic designing_students`
--
ALTER TABLE `graphic designing_students`
  MODIFY `indx` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `guides_details`
--
ALTER TABLE `guides_details`
  MODIFY `indx` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `illustrator`
--
ALTER TABLE `illustrator`
  MODIFY `indx` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `illustrator_topica`
--
ALTER TABLE `illustrator_topica`
  MODIFY `indx` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `mern stack_chatbox`
--
ALTER TABLE `mern stack_chatbox`
  MODIFY `indx` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `mern stack_students`
--
ALTER TABLE `mern stack_students`
  MODIFY `indx` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `node`
--
ALTER TABLE `node`
  MODIFY `indx` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `parent_courses`
--
ALTER TABLE `parent_courses`
  MODIFY `indx` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `photoshop`
--
ALTER TABLE `photoshop`
  MODIFY `indx` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `photoshop_quiz1`
--
ALTER TABLE `photoshop_quiz1`
  MODIFY `indx` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `photoshop_quiz2`
--
ALTER TABLE `photoshop_quiz2`
  MODIFY `indx` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `pythion_chatbox`
--
ALTER TABLE `pythion_chatbox`
  MODIFY `indx` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `pythion_students`
--
ALTER TABLE `pythion_students`
  MODIFY `indx` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `quiz_list`
--
ALTER TABLE `quiz_list`
  MODIFY `indx` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `quiz_marks`
--
ALTER TABLE `quiz_marks`
  MODIFY `indx` int(244) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `react`
--
ALTER TABLE `react`
  MODIFY `indx` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `students_webinar`
--
ALTER TABLE `students_webinar`
  MODIFY `indx` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `student_details`
--
ALTER TABLE `student_details`
  MODIFY `indx` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `sub_courses`
--
ALTER TABLE `sub_courses`
  MODIFY `indx` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `upcoming_courses`
--
ALTER TABLE `upcoming_courses`
  MODIFY `indx` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `word press_chatbox`
--
ALTER TABLE `word press_chatbox`
  MODIFY `indx` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `word press_students`
--
ALTER TABLE `word press_students`
  MODIFY `indx` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
