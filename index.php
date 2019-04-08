<?php
function testConnection($servername, $username, $password){	
	$conn = @mysqli_connect($servername, $username, $password); // @suppress error
	if (!$conn) {
		die('Connection failed: ' . mysqli_connect_error());
	}
	echo 'Connected successfully ';
	if (mysqli_close($conn)){
		echo 'Connection closed';
	}
	echo '<br><br>';
}

function testDatabase($servername, $username, $password, $database){
	$conn = @mysqli_connect($servername, $username, $password, $database); // @suppress error
	if (!$conn) {
		die('Connection failed: ' . mysqli_connect_error());
	}
	echo 'Connected successfully ';
	if (mysqli_close($conn)){
		echo 'Connection closed';
	}
	echo '<br><br>';
}

function checkTable($servername, $username, $password, $database, $table){
	$conn = @mysqli_connect($servername, $username, $password, $database); // @suppress error
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
	echo 'Connected successfully ';
	$sql = "SHOW TABLES like '{$table}'";
	$result = mysqli_query($conn, $sql);
	if (mysqli_num_rows($result) > 0) {
		echo 'Table Found ';
	} else {
		echo "0 results ";
	}
	if (mysqli_close($conn)){
		echo 'Connection closed';		
	}
	echo '<br><br>';
}

function connectDatabase($servername, $username, $password, $database){
	$conn = @mysqli_connect($servername, $username, $password, $database); // @suppress error
	if (!$conn) {
		die('Connection failed: ' . mysqli_connect_error());
	}
	echo 'Connected successfully ';
	echo '<br><br>';
	return $conn;
}

function closeDatabase($conn){
	if (mysqli_close($conn)){
		echo 'Connection closed';
	}
}

// your settings
$settings['servername'] = "localhost";
$settings['username'] = "root";
$settings['password'] = "";
$settings['database'] = "test";
$settings['table'] = "sample";

// test connection
testConnection($settings['servername'], $settings['username'], $settings['password']);

// test connection database
testDatabase($settings['servername'], $settings['username'], $settings['password'], $settings['database']);

// test connection database table
checkTable($settings['servername'], $settings['username'], $settings['password'], $settings['database'], $settings['table']);

// connect database
$conn = connectDatabase($settings['servername'], $settings['username'], $settings['password'], $settings['database']);

// close database connection
closeDatabase($conn);
?> 
