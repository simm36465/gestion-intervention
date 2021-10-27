<?php
// CHANGE THIS TO YOUR INFO DB
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "interv";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  // IF YOU WANT TO SEE IF DB CONNECTED
  // echo 'connexion succes';

} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
?>