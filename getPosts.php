<?php
$servername = "localhost";
$dbname = 'lasgidi';
$username = "root";
$password = "@Edmund123";

$mysqli = new mysqli($servername, $username, $password, $dbname);

// collect value of input field


/* create a prepared statement */
$stmt = "select id,story,title,publish,image,created from posts";
$result = $mysqli->query($stmt);

// Fetch all
$data = $result->fetch_all(MYSQLI_ASSOC);

// Free result set
$result->free_result();

$mysqli->close();
// print_r($data) . 'hello';
$jdata = json_encode($data);
echo $jdata;
