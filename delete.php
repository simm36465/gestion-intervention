<?php
session_start();
include("include/inc/connect.php");
$REFCODE = $_GET['ref'];
$sql = "DELETE FROM interventions WHERE ref=:REFCODE";
$qstmt = $conn->prepare($sql);
$qstmt->bindParam(':REFCODE', $REFCODE, PDO::PARAM_STR);
$qstmt->execute();
header("Location: lists.php");