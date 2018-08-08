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
ensureTable("demographicsquestionnaire", "CREATE TABLE `demographicsquestionnaire` (
  `row_id` int(11) NOT NULL AUTO_INCREMENT,
  `participantid` int(11) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `gender` varchar(100) DEFAULT NULL,
  `skill` int(11) DEFAULT NULL,
  `q0_b` int(11) DEFAULT NULL,
  PRIMARY KEY (`row_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;");

$_POST = json_decode(file_get_contents('php://input'), true);

$participantid = mysqli_real_escape_string($mysqli, $_POST["participantid"]);
$age = mysqli_real_escape_string($mysqli, $_POST["age"]);
$gender = mysqli_real_escape_string($mysqli, $_POST["gender"]);
$skill = mysqli_real_escape_string($mysqli, $_POST["skill"]);
$q0_b = mysqli_real_escape_string($mysqli, $_POST["q0_b"]);

//this means all worked and we can return user success and login user
$result = insert("demographicsquestionnaire", array("participantid","age","gender","skill","q0_b"), array($participantid, $age, $gender, $skill, $q0_b));
exit(json_encode($arr));

?>
