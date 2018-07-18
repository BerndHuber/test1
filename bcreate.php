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
echo "hello bcreate user";
/*
version: version, int(11)
participantid: participantid, int(11)
broll_list: broll_list, text
queries: queries, text
usertype: usertype, varchar(100)
uitype: uitype, varchar(100)
videotype: videotype varchar(100)
*/

ensureTable("bcreate", "CREATE TABLE `bcreate` (
  `row_id` int(11) NOT NULL AUTO_INCREMENT,
  `version` int(11) DEFAULT NULL,
  `participantid` int(11) DEFAULT NULL,
  `broll_list` text DEFAULT NULL,
  `queries` text DEFAULT NULL,
  `usertype` varchar(100) DEFAULT NULL,
  `uitype` varchar(100) DEFAULT NULL,
  `videotype` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`row_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;");

$_POST = json_decode(file_get_contents('php://input'), true);

$version = mysqli_real_escape_string($mysqli, $_POST["formData"]["version"]);
$participantid = mysqli_real_escape_string($mysqli, $_POST["formData"]["participantid"]);
$broll_list = mysqli_real_escape_string($mysqli, $_POST["formData"]["broll_list"]);
$queries = mysqli_real_escape_string($mysqli, $_POST["formData"]["queries"]);
$usertype = mysqli_real_escape_string($mysqli, $_POST["formData"]["usertype"]);
$uitype = mysqli_real_escape_string($mysqli, $_POST["formData"]["uitype"]);
$videotype = mysqli_real_escape_string($mysqli, $_POST["formData"]["videotype"]);

$result = insert("bcreate", array("version","participantid","broll_list","queries","usertype","uitype","videotype"), array($version, $participantid, $broll_list, $queries, $usertype, $uitype, $videotype));

if (!$result) {
    //this means insert didn't work! something's odd
    echo "fail";
} else {
    //this means all worked and we can return user success and login user
    echo "success";
}

?>
