<?php
header("Access-Control-Allow-Origin: *");
/*************************************************************
 * bcreate.php
 * Authors: bcreate
 *************************************************************/

require_once("utils.php");
define('DEBUG', 0);

define('DATABASE_HOST', 'server123.web-hosting.com'); 
define('DATABASE', 'crypnntk_test1'); 
define('DB_USER', 'crypnntk_dapptalk_data'); 
define('DB_PASS', 'BalconyView18'); 
define('ADMIN_EMAIL', 'talkdapp@gmail.com');

// connect to database
$mysqli = mysqli_init();
if (isRunningOnLocalhost()) {
    // local connection
    $success = mysqli_real_connect($mysqli, "127.0.0.1", "root", "", "dapptalk_data") or die('Could not connecta!');
} else {
    // connection on the production environment
    $success = mysqli_real_connect($mysqli, DATABASE_HOST, DB_USER, DB_PASS, DATABASE) or die('Could not connectb!');
}

// make sure that timestamps mean the same thing regardless of where we host
mysqli_query($mysqli, "SET time_zone = 'US/Eastern'");

ensureTable("withinsubjectquestionnaire", "CREATE TABLE `withinsubjectquestionnaire` (
  `row_id` int(11) NOT NULL AUTO_INCREMENT,
  `qv` int(11) DEFAULT NULL,
  `q0` int(11) DEFAULT NULL,
  `q1` int(11) DEFAULT NULL,
  `q2` int(11) DEFAULT NULL,
  `q3` int(11) DEFAULT NULL,
  `q4` int(11) DEFAULT NULL,
  `q5` int(11) DEFAULT NULL,
  `q6` int(11) DEFAULT NULL,
  `q7` int(11) DEFAULT NULL,
  `q8` int(11) DEFAULT NULL,
  `q9` int(11) DEFAULT NULL,
  `q10` int(11) DEFAULT NULL,
  `q11` int(11) DEFAULT NULL,
  `q12` int(11) DEFAULT NULL,
  `q13` int(11) DEFAULT NULL,
  `q14` int(11) DEFAULT NULL,
  `q15` int(11) DEFAULT NULL,
  `q16` int(11) DEFAULT NULL,
  `qq1` text DEFAULT NULL,
  `qq2` text DEFAULT NULL,
  `uitype` varchar(10) DEFAULT NULL,
  `uinumber` int(11) DEFAULT NULL,
  `uiorder` varchar(100) DEFAULT NULL,
  `videoorder` varchar(100) DEFAULT NULL,
  `videotype` int(11) DEFAULT NULL,
  `videoname` varchar(100) DEFAULT NULL,
  `recommendationtype` varchar(100) DEFAULT NULL,
  `participantid` int(11) DEFAULT NULL,
  `gain_self_efficacy` int(11) DEFAULT NULL,
  PRIMARY KEY (`row_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;");

$_POST = json_decode(file_get_contents('php://input'), true);

$qv = mysqli_real_escape_string($mysqli, $_POST["qv"]);
$q0 = mysqli_real_escape_string($mysqli, $_POST["q0"]);
$q1 = mysqli_real_escape_string($mysqli, $_POST["q1"]);
$q2 = mysqli_real_escape_string($mysqli, $_POST["q2"]);
$q3 = mysqli_real_escape_string($mysqli, $_POST["q3"]);
$q4 = mysqli_real_escape_string($mysqli, $_POST["q4"]);
$q5 = mysqli_real_escape_string($mysqli, $_POST["q5"]);
$q6 = mysqli_real_escape_string($mysqli, $_POST["q6"]);
$q7 = mysqli_real_escape_string($mysqli, $_POST["q7"]);
$q8 = mysqli_real_escape_string($mysqli, $_POST["q8"]);
$q9 = mysqli_real_escape_string($mysqli, $_POST["q9"]);
$q10 = mysqli_real_escape_string($mysqli, $_POST["q10"]);
$q11 = mysqli_real_escape_string($mysqli, $_POST["q11"]);
$q12 = mysqli_real_escape_string($mysqli, $_POST["q12"]);
$q13 = mysqli_real_escape_string($mysqli, $_POST["q13"]);
$q14 = mysqli_real_escape_string($mysqli, $_POST["q14"]);
$q15 = mysqli_real_escape_string($mysqli, $_POST["q15"]);
$q16 = mysqli_real_escape_string($mysqli, $_POST["q16"]);
$qq1 = mysqli_real_escape_string($mysqli, $_POST["qq1"]);
$qq2 = mysqli_real_escape_string($mysqli, $_POST["qq2"]);
$uitype = mysqli_real_escape_string($mysqli, $_POST["uitype"]);
$uinumber = mysqli_real_escape_string($mysqli, $_POST["uinumber"]);
$uiorder = mysqli_real_escape_string($mysqli, $_POST["uiorder"]);
$videoorder = mysqli_real_escape_string($mysqli, $_POST["videoorder"]);
$videotype = mysqli_real_escape_string($mysqli, $_POST["videotype"]);
$videoname = mysqli_real_escape_string($mysqli, $_POST["videoname"]);
$recommendationtype = mysqli_real_escape_string($mysqli, $_POST["recommendationtype"]);
$participantid = mysqli_real_escape_string($mysqli, $_POST["participantid"]);
$gain_self_efficacy = mysqli_real_escape_string($mysqli, $_POST["gain_self_efficacy"]);

//this means all worked and we can return user success and login user
$result = insert("withinsubjectquestionnaire", array("qv","q0","q1","q2","q3","q4","q5","q6","q7","q8","q9","q10","q11","q12","q13","q14","q15","q16","qq1","qq2","uitype","uinumber","uiorder","videoorder","videotype","videoname","recommendationtype","participantid","gain_self_efficacy"), array($qv, $q0, $q1, $q2, $q3, $q4, $q5, $q6, $q7, $q8, $q9, $q10, $q11, $q12, $q13, $q14, $q15, $q16, $qq1, $qq2, $uitype, $uinumber, $uiorder, $videoorder, $videotype, $videoname, $recommendationtype, $participantid, $gain_self_efficacy));
exit(json_encode($arr));

?>
