<?php
session_start();
if($_SESSION['access'] < 9) die("<h1><font color=\"red\">Access Denied: You are not Admin!</font></h1>");
include_once("../../config.php");
include_once("../../DB.php");
include_once("../../Database/db_MYSQL.php");





$id = $_POST['id'];


$pdur =  $_POST['plus'] * 86400;
$b1dur = $_POST['wood'] * 86400;
$b2dur = $_POST['clay'] * 86400;
$b3dur = $_POST['iron'] * 86400;
$b4dur = $_POST['crop'] * 86400;
$quest = $_POST['quest'];

if($pdur  > 1){ $plus = (time() + $pdur); } else { $pdur = 'plus'; }
if($b1dur > 1){ $wood = (time() + $b1dur); } else { $wood = 'b1'; }
if($b2dur > 1){ $clay = (time() + $b2dur); } else { $clay = 'b2'; }
if($b3dur > 1){ $iron = (time() + $b3dur); } else { $iron = 'b3'; }
if($b4dur > 1){ $crop = (time() + $b4dur); } else { $crop = 'b4'; }

$database->queryFetch("UPDATE users SET
	plus = '".$plus."',
	b1 = '".$wood."',
	b2 = '".$clay."',
	b3 = '".$iron."',
	b4 = '".$crop."',
	quest = '".$quest."'
	WHERE id = $id");

header("Location: ../../../panel/admin.php?p=player&uid=".$id."");
?>