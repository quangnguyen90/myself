-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 07, 2015 at 09:21 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `myself`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog_brief`
--

CREATE TABLE IF NOT EXISTS `blog_brief` (
`blog_id` int(11) NOT NULL,
  `blog_avatar_name` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `blog_title` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `blog_brief` text COLLATE utf8_unicode_ci NOT NULL,
  `blog_description` text COLLATE utf8_unicode_ci NOT NULL,
  `blog_date` datetime NOT NULL,
  `category_id` int(11) NOT NULL,
  `blog_status` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `blog_brief`
--

INSERT INTO `blog_brief` (`blog_id`, `blog_avatar_name`, `blog_title`, `blog_brief`, `blog_description`, `blog_date`, `category_id`, `blog_status`) VALUES
(5, 'blog_DHujkyIXw3mZ.jpg', 'Hello world', 'For sharing, for increasing', '<p><span>Hello everyone,</span></p>\n\n<p><img alt="" height="241" src="/myself/userfiles/other/images/Tui 14 - Copy.png" width="500" /></p>\n\n<p>This is my official website</p>\n\n<p>The 1st personal website, the 1st spirit child (^__^)</p>\n\n<p>Will talk more about&#160;<ins><strong>my projects</strong></ins></p>\n\n<p>Will share&#160;<ins><strong>technical blog in IT, Guitar, Ukulele, Cajon, Harmonica, Flute (6 holes)</strong></ins></p>\n', '2015-11-07 15:09:28', 11, 1);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
`category_id` int(11) NOT NULL,
  `category_title` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `category_type` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `category_description` text COLLATE utf8_unicode_ci NOT NULL,
  `category_status` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_title`, `category_type`, `category_description`, `category_status`) VALUES
(1, 'Myself', 'p', 'A Category for All of the project which is developed by myself', 1),
(2, 'With Friend', 'p', 'Some project I work with my firends', 1),
(3, 'Company', 'p', 'Some projects I joined at my companies', 1),
(4, 'Career path', 'b', 'Somethings I want to share about my career path', 1),
(5, 'I and IT', 'b', 'Some blogs I will share about my passion about IT', 1),
(6, 'University', 'p', 'Me & Projects from my University as a team work', 1),
(11, 'My dream', 'b', 'Somethings about my dream to become an IT master', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `session_id` varchar(40) COLLATE utf8_bin NOT NULL DEFAULT '0',
  `ip_address` varchar(16) COLLATE utf8_bin NOT NULL DEFAULT '0',
  `user_agent` varchar(150) COLLATE utf8_bin NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('04f3f87bc2bf1e4440a13916ca0d3fb4', '::1', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.80 Safari/537.36', 1446884423, ''),
('909ef95fd83b175b0f1be5b0923a0597', '::1', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.80 Safari/537.36', 1446883317, '');

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE IF NOT EXISTS `login_attempts` (
`id` int(11) NOT NULL,
  `ip_address` varchar(40) COLLATE utf8_bin NOT NULL,
  `login` varchar(50) COLLATE utf8_bin NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `project_brief`
--

CREATE TABLE IF NOT EXISTS `project_brief` (
`id` int(11) NOT NULL,
  `title` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `brief` text COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `date` datetime NOT NULL,
  `category_id` int(11) NOT NULL,
  `avatar_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `project_brief`
--

INSERT INTO `project_brief` (`id`, `title`, `brief`, `description`, `date`, `category_id`, `avatar_name`, `status`) VALUES
(1, 'Projects in Softfoundry VN (SFVN)', 'This post will provide some information about projects that I have joined when I worked at SFVN. Some projects are "delay" or "transferred" to other teams,  the other projects are still "on going" progress. Each project also brings me different experiences.  Will no source code for sharing because those are SFVN''s assets, but links to demo the projects is provided. For more information, you can follow on on my linkedin: http://vn.linkedin.com/pub/quang-nguyen-phu/8a/7a', '<p><span>______________________________________________________________________________________________________________________________________________</span>&#160;</p>\n\n<table>\n <tbody>\n  <tr>\n   <td>\n   <p><strong><strong>DOING&#160;PROJECT &#8220;E-LEARNING&#8221;</strong></strong></p>\n\n   <p><strong><strong>Softfoundry VN - 9/2015 &#8211; present</strong></strong></p>\n   </td>\n  </tr>\n  <tr>\n   <td>\n   <p><strong>Description</strong>: &#160;&#160;Develop E-learning project for online education</p>\n\n   <p><strong>Skills</strong>: XAMPP, PHP MVC, MySQL, Javascript, Boostrap, HTML, CSS, Ajax</p>\n\n   <p><strong>Number of team member: </strong>5 members</p>\n\n   <p><strong>Role</strong>: web developer (research, implement, test)</p>\n\n   <p><strong>Result</strong>: --- Ongoing ---</p>\n\n   <p><strong>Link</strong><strong>:</strong> <a href="http://cms.world-telephone.com:8082/efront">http://cms.world-telephone.com:8082/efront</a></p>\n\n   <p>______________________________________________________________________________________________________________________________________________</p>\n   </td>\n  </tr>\n  <tr>\n   <td>\n   <p><strong><strong>DOING PROJECT &#8220;VMEET+&#8221;</strong></strong></p>\n\n   <p><strong><strong>Softfoundry VN - 9/2014 &#8211; present</strong></strong></p>\n   </td>\n  </tr>\n  <tr>\n   <td>\n   <p><strong>Description</strong>: A website that allows users can create online video conference. The chairman will setup & control the video meeting through internet, invite/kick participants, also turn on/off camera/micro/volume, set authorization, full screen, end call & share document file to co-drawing in whiteboard. The participant can join/ accept the invitation to video meeting. They have their authorization base on chairman&#39;s decision (moderator/audience/presenter), they can listen/full screen/turn on/off volume, leave call & chat with group & use whiteboard.</p>\n\n   <p><strong>Skills</strong>: PHP (CI framework), XAMPP 1.8.2, MySQL, Bootstrap (for UI), SipML5 ( Client web use javascript to request to sip API to make video call, control camera, using SIP server, etc), Strophe.js (Chat group, using XMPP server to develop Chat feature), Smarty Engine, Ajax, Jquery, Javascript, HTML, CSS, SVN, MVC, canvas</p>\n\n   <p><strong>Number of team member: </strong>6 members</p>\n\n   <p><strong>Role</strong>: web developer (research, implement, test)</p>\n\n   <p><strong>Result</strong>: --- Ongoing ---</p>\n\n   <p><strong>Link</strong>: <a href="https://vmeetplus.world-telephone.com/">https://vmeetplus.world-telephone.com/</a></p>\n\n   <p><span>______________________________________________________________________________________________________________________________________________</span></p>\n   </td>\n  </tr>\n  <tr>\n   <td>\n   <p><strong>DID PROJECT &#8220;IPTV&#8221; </strong></p>\n\n   <p><strong>Softfoundry VN - 7/2014 &#8211; 9/2014</strong></p>\n   </td>\n  </tr>\n  <tr>\n   <td>\n   <p><strong>Description</strong>: IPTV is a web application - that is used to view television on the internet with many features: Profile management, Channel, Video as well as Manage adverting information of many products (They are gotten from B2C Ecommerce project that use magento rest api) with different channels of any TV station, Country & Language, also with audio is an attachment. IPTV can also run on mobile device with other version for more supporting client. So that, when clients uses their mobile to record any audio (their mobile must have Audio Matching app), they will receive product information website that is correspond with the recorded audio in order to research or buy.</p>\n\n   <p><strong>Skills</strong>: PHP 5.5 (CI framework), XAMPP 1.8.2, MySQL, Bootstrap (for UI) , Ajax, Jquery, Javascript, HTML, CSS, SVN, MVC, WinCSP</p>\n\n   <p><strong>Number of team member: </strong>5 members</p>\n\n   <p><strong>Role</strong>:&#160; web developer (implement, test)</p>\n\n   <p><strong>Result</strong>: --- Project is transferred to other team ---</p>\n\n   <p><span>______________________________________________________________________________________________________________________________________________</span></p>\n   </td>\n  </tr>\n  <tr>\n   <td>\n   <p><strong>DID PROJECT &#8220;CITY WIFI&#8221;</strong></p>\n\n   <p><strong>Softfoundry VN - 10/2013 &#8211;&#160; 2/2014</strong></p>\n   </td>\n  </tr>\n  <tr>\n   <td>\n   <p><strong>Description</strong>: A website with a large designed system that can be used to broadcast wifi network with large traffic and bandwidth for user through access to access point (AP) by TR-069 protocol. AP is managed by gateway that is also install &#8220;openVPN client&#8221;. Server use &#8220;openVPN server&#8221; to create & manage internal network. The system will manage the user account, user billing, status report, devices info.</p>\n\n   <p><strong>Skills</strong>: PHP (Yii framework), XAMPP 1.8.2, MySQL, Android (v4.0, JSON), JDK7, Bootstrap (For UI), Git Hub, Git Bash, Terminal cmd, Ubuntu, Restful API (PHP, JSON), open source Daloradius, Ajax, Jquery, Javascript, HTML, CSS, MVC</p>\n\n   <p><strong>Number of team member</strong>: 10 members</p>\n\n   <p><strong>Role</strong>: web developer (implement, test)</p>\n\n   <p><strong>Result</strong>: --- Project is transferred to other team with new technology---</p>\n\n   <p><span>______________________________________________________________________________________________________________________________________________</span></p>\n   </td>\n  </tr>\n  <tr>\n   <td>\n   <p><strong>DID PROJECT &#8220;MOBILE OFFICE&#8221;</strong></p>\n\n   <p><strong>Softfoundry VN - 7/2013 &#8211;&#160; 10/2013</strong></p>\n   </td>\n  </tr>\n  <tr>\n   <td>\n   <p><strong>Description</strong>:&#160; Mobile office (MO) is a features of VMeet (Win app)/Momeet (Android app) /iMomeet (iOS app) that allows users join into an online meeting and they can upload their documents (MS word, excel, powerpoint) to sever (using Google drive API) & share them for other members, so that, they can view/co-edit/download it. These documents will be removed after the online meeting is end.</p>\n\n   <p><strong>Skills</strong>: PHP (Yii framework), XAMPP 1.8.2, MySQL, Google Drive API, Restful API (PHP, JSON), Bootstrap (For UI), Git Hub, Git Bash, Sublime text 2,&#160; Ajax, Jquery, Javascript, HTML, CSS, MVC</p>\n\n   <p><strong>Number of team member: </strong>2 members</p>\n\n   <p><strong>Role</strong>: web/web service developer (requirement, implement, test)</p>\n\n   <p><strong>Result</strong>: --- Done ---</p>\n\n   <p><span>______________________________________________________________________________________________________________________________________________</span></p>\n   </td>\n  </tr>\n </tbody>\n</table>\n\n<p><span>Thanks for your reading&#160;</span>&#160;</p>\n', '2015-11-07 15:12:47', 3, 'project_7xGQ3YCVUuGE.png', 1),
(2, 'My Side Projects On Free Time', 'This post will provide some information about my side projects that I developed  when I have free time. All of them are completed with the initial versions with the most necessary & basic features. Each project also brings me different & interesting experiences.  Will show source code for sharing on my github for each project. For more information, you can follow on on my github: https://github.com/quangnguyen90', '<p><span>______________________________________________________________________________________________________________________________________________</span>&#160;</p>\n\n<table>\n <tbody>\n  <tr>\n   <td>\n   <p><strong>DID SIDE PROJECT &#8220;STRUST 2 MVC SEED&#8221;</strong></p>\n\n   <p><strong>Home - 10/2015 &#8211; 11/2015</strong></p>\n   </td>\n  </tr>\n  <tr>\n   <td>\n   <p><strong>Description</strong>:&#160;&#160; Develop a seed project based on struts 2 mvc then use it to develop other websites. The project is also an example website that is completed with 2 main basic parts: Back-end: Authentication (Register/login/logout/forgot-pass/change-pass/Reset-pass/Enable/Disable/Remove), News Management to manage blogs or news (CRUD) & Front end: Homepage to view news content also.</p>\n\n   <p><strong>Skills</strong>: XAMPP, Java Strust 2 MVC, Mybatis, Ant, Tiles 3, Tomcat, MySQL, Javascript, Boostrap, HTML, CSS, Ajax, CKEditor</p>\n\n   <p><strong>Number of team member: </strong>1 member</p>\n\n   <p><strong>Role</strong>: Project owner &#8211; full stack developer (back end & Front end)</p>\n\n   <p><strong>Result</strong>: --- Version 0.0.1 done ---</p>\n\n   <p><strong>Github</strong><strong>:</strong> <a href="https://github.com/quangnguyen90/struts-2-mvc-seed">https://github.com/quangnguyen90/struts-2-mvc-seed</a></p>\n\n   <p><span>______________________________________________________________________________________________________________________________________________</span></p>\n   </td>\n  </tr>\n  <tr>\n   <td>\n   <p><strong>DID SIDE PROJECT &#8220;MYSELF&#8221;</strong></p>\n\n   <p><strong>Home - 12/2014 &#8211; 3/2015</strong></p>\n   </td>\n  </tr>\n  <tr>\n   <td>\n   <p><strong>Description</strong>: &#160;&#160;A personal project to talk about myself --- my resume --- my blog</p>\n\n   <p><strong>Skills</strong>: XAMPP, PHP (CI Framework), Bootstrap, Tank-auth, CKEditor, CKFinder, Smarty Engine, MySQL, MVC, HTML, CSS, Javascript, Ajax</p>\n\n   <p><strong>Number of team member: </strong>1 member</p>\n\n   <p><strong>Role</strong>: Project owner &#8211; full stack developer (back end & Front end)</p>\n\n   <p><strong>Result</strong>: --- Version 0.1 Done ---</p>\n\n   <p><strong>Link</strong>: <a href="http://quangnguyenphu.esy.es/">http://quangnguyenphu.esy.es</a> ,</p>\n\n   <p><strong>Github: </strong><a href="https://github.com/quangnguyen90/myself">https://github.com/quangnguyen90/myself</a></p>\n\n   <p><span>______________________________________________________________________________________________________________________________________________</span></p>\n   </td>\n  </tr>\n  <tr>\n   <td>\n   <p><strong>DID SIDE PROJECT &#8220;MY PHP MVC&#8221;</strong></p>\n\n   <p><strong>Home - 4/2014 &#8211; 5/2014</strong></p>\n   </td>\n  </tr>\n  <tr>\n   <td>\n   <p><strong>Description</strong>: &#160;&#160;&#160;Develop a seed project based on PHP MVC, no using framework</p>\n\n   <p><strong>Skills</strong>: XAMPP, PHP MVC, Bootstrap, MySQL, HTML, CSS, OOP Javascript, Ajax</p>\n\n   <p><strong>Number of team member: </strong>1 member</p>\n\n   <p><strong>Role</strong>: Project owner &#8211; full stack developer</p>\n\n   <p><strong>Result</strong>: --- Version 0.1 Done ---</p>\n\n   <p><strong>Github: </strong>&#160;<a href="https://github.com/quangnguyen90/myPhpMVC">https://github.com/quangnguyen90/myPhpMVC</a> &#160;</p>\n\n   <p><span>______________________________________________________________________________________________________________________________________________</span></p>\n   </td>\n  </tr>\n  <tr>\n   <td>\n   <p><strong>DID SIDE PROJECT &#8220;MY TOUR&#8221;</strong></p>\n\n   <p><strong>Home - 4/2014 &#8211; 5/2014</strong></p>\n   </td>\n  </tr>\n  <tr>\n   <td>\n   <p><strong>Description</strong>: &#160;&#160;Develop an basic project for tour/travel management website, alo a combination between 2 projects: My ecommerce & My album (Show & order tour, search & view places on google map)</p>\n\n   <p><strong>Skills</strong>: XAMPP, PHP CI Framework, Google API, MySQL, HTML, CSS, OOP Javascript, Ajax</p>\n\n   <p><strong>Number of team member: </strong>1 member</p>\n\n   <p><strong>Role</strong>: Project owner &#8211; full stack developer</p>\n\n   <p><strong>Result</strong>: --- Version 0.1 Done ---</p>\n\n   <p><strong>Github: </strong>&#160;<a href="https://github.com/quangnguyen90/mytour">https://github.com/quangnguyen90/mytour</a></p>\n\n   <p><span>______________________________________________________________________________________________________________________________________________</span></p>\n   </td>\n  </tr>\n  <tr>\n   <td>\n   <p><strong>DID SIDE PROJECT &#8220;MY ECOMMERCE&#8221;</strong></p>\n\n   <p><strong>Home - 4/2014 &#8211; 5/2014</strong></p>\n   </td>\n  </tr>\n  <tr>\n   <td>\n   <p><strong>Description</strong>: &#160;&#160;Develop an basic project for ecommerce website (show & buy products)</p>\n\n   <p><strong>Skills</strong>: XAMPP, PHP CI Framework, MySQL, HTML, CSS, OOP Javascript, Ajax</p>\n\n   <p><strong>Number of team member: </strong>1 member</p>\n\n   <p><strong>Role</strong>: Project owner &#8211; full stack developer</p>\n\n   <p><strong>Result</strong>: --- Version 0.1 Done ---</p>\n\n   <p><strong>Github: </strong>&#160;&#160;<a href="https://github.com/quangnguyen90/myecommerce">https://github.com/quangnguyen90/myecommerce</a></p>\n\n   <p><span>______________________________________________________________________________________________________________________________________________</span></p>\n   </td>\n  </tr>\n  <tr>\n   <td>\n   <p><strong>DID SIDE PROJECT &#8220;MY HOTEL&#8221;</strong></p>\n\n   <p><strong>Home - 4/2014 &#8211; 5/2014</strong></p>\n   </td>\n  </tr>\n  <tr>\n   <td>\n   <p><strong>Description</strong>: &#160;&#160;Develop a basic project for hotel management website (Order & Checkout room management)</p>\n\n   <p><strong>Skills</strong>: XAMPP, PHP CI Framework, MySQL, HTML, CSS, OOP Javascript, Ajax</p>\n\n   <p><strong>Number of team member: </strong>1 member</p>\n\n   <p><strong>Role</strong>: Project owner &#8211; full stack developer</p>\n\n   <p><strong>Result</strong>: --- Version 0.1 Done ---</p>\n\n   <p><strong>Github: </strong>&#160;<a href="https://github.com/quangnguyen90/myhotel">https://github.com/quangnguyen90/myhotel</a></p>\n\n   <p><span>______________________________________________________________________________________________________________________________________________</span></p>\n   </td>\n  </tr>\n  <tr>\n   <td>\n   <p><strong>DID SIDE PROJECT &#8220;MY ALBUM&#8221;</strong></p>\n\n   <p><strong>Home - 4/2014 &#8211; end of month</strong></p>\n   </td>\n  </tr>\n  <tr>\n   <td>\n   <p><strong>Description</strong>: &#160;&#160;Develop a very basic project for album website (Authentication, View Album)</p>\n\n   <p><strong>Skills</strong>: XAMPP, PHP CI Framework, MySQL, HTML, CSS, OOP Javascript, Ajax, Ion Auth</p>\n\n   <p><strong>Number of team member: </strong>1 member</p>\n\n   <p><strong>Role</strong>: Project owner &#8211; full stack developer</p>\n\n   <p><strong>Result</strong>: --- Version 0.1 Done ---</p>\n\n   <p><strong>Github: </strong>&#160;<a href="https://github.com/quangnguyen90/myalbum">https://github.com/quangnguyen90/myalbum</a></p>\n\n   <p><span>______________________________________________________________________________________________________________________________________________</span></p>\n   </td>\n  </tr>\n </tbody>\n</table>\n\n<p>Thanks for your reading&#160;</p>\n\n<p>&#160;</p>\n', '2015-11-07 15:07:34', 1, 'project_JQoOAVGAVXeT.PNG', 1),
(3, 'My Side Projects With Friend(s)', 'This post will provide some information about my side projects with my friend that I joined when I have free time.  One is completed with the initial versions with the most necessary & basic features. One is delay because we are too busy for meeting . Each project also brings me different & interesting experiences. Will show source code for sharing on my github for each project. Just follow this post.', '<p><span>______________________________________________________________________________________________________________________________________________</span>&#160;</p>\n\n<table>\n <tbody>\n  <tr>\n   <td>\n   <p><strong>DOING SIDE PROJECT &#8220;SIMPLE CMS&#8221;</strong></p>\n\n   <p><strong>Home - 7/2015 &#8211; present</strong></p>\n   </td>\n  </tr>\n  <tr>\n   <td>\n   <p>&#183;&#160;<strong>Description</strong>: &#160;&#160;Develop a basic cms project then use it to develop other small/medium websites (ex: blog, product introducing, etc)</p>\n\n   <p>&#183;&#160;<strong>Skills</strong>: XAMPP, PHP (CI framework v3.0), MySQL, MVC, AngularJS, GruntJS, Tank Auth, Javascript, Boostrap, HTML, CSS, Ajax</p>\n\n   <p>&#183;&#160;<strong>Number of team member: </strong>2 member<strong>s</strong></p>\n\n   <p>&#183;&#160;<strong>Role</strong>: web service developer</p>\n\n   <p>&#183;&#160;<strong>Result</strong>: --- Delay ---</p>\n\n   <p>&#183;&#160;<strong>Github</strong><strong>:</strong> <a href="https://github.com/phatpham9/simple-cms">https://github.com/phatpham9/simple-cms</a></p>\n\n   <p><span>_____________________________________________________________________________________________________________________________________________</span></p>\n   </td>\n  </tr>\n  <tr>\n   <td>\n   <p><strong>DID SIDE PROJECT &#8220;GUEST BOOK&#8221; FOR MY CLASS</strong></p>\n\n   <p><strong>Home - 5/2014 &#8211;&#160; 10/2014</strong></p>\n   </td>\n  </tr>\n  <tr>\n   <td>\n   <p><strong>Description</strong>: A small web site that allows students who can share their profile information as well as update new status for friend, store images/album like a guest book for saving memories.</p>\n\n   <p><strong>Skills</strong>: PHP (CI framework), XAMPP 1.8.2, MySQL, Bootstrap (for UI), Ajax, Jquery, Javascript, HTML, CSS, SVN, MVC</p>\n\n   <p><strong>Number of team member: </strong>4 members</p>\n\n   <p><strong>Role</strong>:&#160; web developer (implement, test)</p>\n\n   <p><strong>Result</strong>: --- Version 0.1 Done ---</p>\n\n   <p><strong>Github</strong>: <a href="https://github.com/quangnguyen90/guestbook">https://github.com/quangnguyen90/guestbook</a></p>\n\n   <p><span>_____________________________________________________________________________________________________________________________________________</span></p>\n   </td>\n  </tr>\n </tbody>\n</table>\n\n<p>Thanks for your reading&#160;</p>\n', '2015-11-07 15:18:44', 2, 'project_OfTSihmTE4Xy.PNG', 1),
(4, 'My University Project', 'This post will provide some information about my capstone project when I am a student at Van Lang University. This project  brings me the first different experiences.  Will no source code for sharing because it is my team''s assets.  For more information about other project, you can follow on my linkedin: http://vn.linkedin.com/pub/quang-nguyen-phu/8a/7a1/a87?trk=shareTw', '<p><span>______________________________________________________________________________________________________________________________________________</span>&#160;</p>\n\n<table>\n <tbody>\n  <tr>\n   <td>\n   <p><strong>DID CAPSTONE PROJECT &#8220;ECOMMERCE SYSTEM&#8221; </strong></p>\n\n   <p><strong>Van Lang University - </strong><strong>10/2012 </strong><strong>- 5/2013</strong></p>\n   </td>\n  </tr>\n  <tr>\n   <td>\n   <p><strong>Description</strong>: An e-commerce website (Front end) that can run on browser (IE, Firefox, Chrome) and m-commerce on Android to help consumer can register an account to order deal through internet and they also can retrieve password if they forgot it. With consumers who order and view detail more deal, when they login to website, it will show new favorite deal for them and they can view order deal history as well as cancel/edit ordered deal.&#160;&#160;</p>\n\n   <p><strong>Skills</strong>: Java J2EE (Struts2 MVC framework), Restful API (Java, XML), Android (v2.0, XML), MySQL (v5.5), JDK7, Tortoise SVN, Ant, Apache, Tomcat server 7, Eclipse 7, Navicat v10.0, Ajax, Jquery, Javascript, HTML, CSS, OOP, Mybatis</p>\n\n   <p><strong>Number of team member: </strong>6 members</p>\n\n   <p><strong>Role</strong>:&#160; Chief Architect, Production engineer (requirement, design, web/android develop, test, deploy)</p>\n\n   <p><strong>Result</strong>: --- 8/10 ---</p>\n\n   <p><span>_____________________________________________________________________________________________________________________________________________</span></p>\n   </td>\n  </tr>\n </tbody>\n</table>\n\n<p>Thanks for your reading</p>\n\n<p>&#160;</p>\n', '2015-11-07 15:12:19', 6, 'project_qaNwYhRI6tLU.PNG', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(11) NOT NULL,
  `username` varchar(50) COLLATE utf8_bin NOT NULL,
  `password` varchar(255) COLLATE utf8_bin NOT NULL,
  `email` varchar(100) COLLATE utf8_bin NOT NULL,
  `activated` tinyint(1) NOT NULL DEFAULT '1',
  `banned` tinyint(1) NOT NULL DEFAULT '0',
  `ban_reason` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `new_password_key` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `new_password_requested` datetime DEFAULT NULL,
  `new_email` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `new_email_key` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `last_ip` varchar(40) COLLATE utf8_bin NOT NULL,
  `last_login` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `authenticate_level` varchar(20) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `activated`, `banned`, `ban_reason`, `new_password_key`, `new_password_requested`, `new_email`, `new_email_key`, `last_ip`, `last_login`, `created`, `modified`, `authenticate_level`) VALUES
(1, 'quang_thecenmaster', '$2a$08$0jqgQ2Nn1UvmfaegNayrpOMBqijaB.A/sQDE3wwQZ8O5BtiTG86Mu', 'nguyenphuquangk15t1@gmail.com', 1, 0, NULL, NULL, NULL, NULL, '710c8b683ac4b1874b56d0e322dc5e05', '::1', '2015-11-07 09:02:39', '2015-03-02 18:49:09', '2015-11-07 08:02:39', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `user_autologin`
--

CREATE TABLE IF NOT EXISTS `user_autologin` (
  `key_id` char(32) COLLATE utf8_bin NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `user_agent` varchar(150) COLLATE utf8_bin NOT NULL,
  `last_ip` varchar(40) COLLATE utf8_bin NOT NULL,
  `last_login` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `user_profiles`
--

CREATE TABLE IF NOT EXISTS `user_profiles` (
`id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `country` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `website` varchar(255) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog_brief`
--
ALTER TABLE `blog_brief`
 ADD PRIMARY KEY (`blog_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
 ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
 ADD PRIMARY KEY (`session_id`);

--
-- Indexes for table `login_attempts`
--
ALTER TABLE `login_attempts`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_brief`
--
ALTER TABLE `project_brief`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_autologin`
--
ALTER TABLE `user_autologin`
 ADD PRIMARY KEY (`key_id`,`user_id`);

--
-- Indexes for table `user_profiles`
--
ALTER TABLE `user_profiles`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog_brief`
--
ALTER TABLE `blog_brief`
MODIFY `blog_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `login_attempts`
--
ALTER TABLE `login_attempts`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `project_brief`
--
ALTER TABLE `project_brief`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `user_profiles`
--
ALTER TABLE `user_profiles`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
