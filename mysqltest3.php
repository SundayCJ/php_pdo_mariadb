<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>My SQL test</title>
  <meta name="author" content="Github SundayCJ">

  
</head>
<body>
<h1>Start: mariadb with PDO connector_connect</h1>
<?php
if (class_exists('PDO')) print("Yes PDO is installed in PHP<hr>");
?>

<?php
$server = "localhost";
$user = "root";
$pwd = "";
$db_name="LeBusDatabase1"; // Database name

try {
    $connection = new PDO("mysql:host=$server;dbname=$db_name", $user, $pwd);
    // PDO can throw exceptions rather than Fatal errors, so let's change the error mode to exception
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "connection successful"; 
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
?>

<?php

$host="localhost"; // Host name
$username="root"; // Mysql username
$password=""; // Mysql password
$db_name="LeBusDatabase1"; // Database name
$tbl_name="users"; // Table name
$query="SELECT first_name FROM $tbl_name where user_id = 1";
$connection = "";
$associativeArrayOfArrays = "";
$anAssociativeArray = "";

// Connect to server.
$connection = new PDO("mysql:host=$server;dbname=$db_name", $user, $pwd);

print("<hr>Host: " . $host);
print("<br>Username: " . $username);
print("<br>Password: " . $password);
print("<br>Database: " . $db_name);
print("<br>Table Name: "  . $tbl_name."<hr>");

    $stmt = $connection->prepare($query);
    $stmt->execute();

    // set the resulting array to associative
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    var_dump($result);

    $associativeArrayOfArrays = $stmt->fetchAll();
    var_dump($associativeArrayOfArrays);
    print_r($associativeArrayOfArrays);
    $anAssociativeArray = $associativeArrayOfArrays[0];
    print("<hr>". $anAssociativeArray['first_name']);
?>


<?php
$conn = null; //pdo
//mysql_close();//
?>


</body>
</html>

