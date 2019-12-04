<h3>Cat Emporium</h3>
<h4>Attempting MySQL connection from php...</h4>
<?php
// Use enviorment variables to set database variables
if(!empty($_ENV['MYSQL_HOST']))
   $host = $_ENV['MYSQL_HOST'];
else
   $host = 'moe-mysql-app';

if(!empty($_ENV['MYSQL_USER']))
   $user = $_ENV['MYSQL_USER'];
else
   $user = 'moeuser';

if(!empty($_ENV['MYSQL_PASSWORD']))
   $pass = $_ENV['MYSQL_PASSWORD'];
else
   $pass = 'moepass';

if(!empty($_ENV['MYSQL_DB']))
   $db_name = $_ENV['MYSQL_DB'];
else
   $db_name = 'moe_db';

echo "Connecting to Database: $host $user $pass $db_name";
echo "<br><br>";


// Create database connection
$conn = new mysqli('db', 'root', $pass, $db_name);
// $conn = new mysqli($host, $user, $pass, $db_name);

// Make database connection and check for errors
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected to MySQL successfully!";
echo "<br><br>";

// Set sql statment and make query
$sql = "SELECT cat_id, cat_name FROM cats_table";
$result = $conn->query($sql);

// Check for results from query
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["cat_id"]. " - Name: " . $row["cat_name"]. " " . "<br>";
    }
} else {
    echo "0 results";
}

// Close database connection
$conn->close();
?>