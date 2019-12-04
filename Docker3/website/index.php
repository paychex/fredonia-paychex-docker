<!DOCTYPE html>
<html>
<head>
    <title>Cat Emporium</title>
    <link href="https://fonts.googleapis.com/css?family=Lato|Solway|Calistoga|Heebo&display=swap" rel="stylesheet">
    <style>
        body{
            background-color: #D0CD94;
            margin: 0;
            margin-bottom: 700px;
        }
        nav{
            background-color: #3C787e;
            width: 100%;
            height: 75px;
        }
        #logo{
            height: 70px;
            float: left;
            margin-left: 10px;
        }
        nav h1{
            font-size: 56px;
            width: 450px;
            float: left;
            margin: 0;
            color: #C7CF00;
            font-family: 'Solway', serif;
            margin-left: 7.5px;
        }
        #intro{
            margin: 20px;
            float: left;
            color: #241623;
            font-family: 'Lato', sans-serif;
            padding: 7.5px;
            border-radius: 10px;
        }
        #intro h2{
            margin: 0;
            font-size: 28px;
            margin-bottom: 10px;
        }
        #intro p{
            margin: 0;
            font-size: 18px;
        }
        .cat-card{
            height: 375px;
            width: 300px;
            float: left;
            clear: both;
            padding: 0 5px 0 5px;
            margin: 0 20px 0 20px;
            line-height: 1px;
            background-color: #D56F3E;
            font-family: 'Lato', sans-serif;
            border-radius: 10px;
            color: #241623;
            box-shadow: 5px 10px 8px #888888;
        }
        .cat-card h3{
            text-align: center;
            font-size: 28px;
            letter-spacing: 1px;
            margin: 20px 0 20px 0;
            font-family: 'Calistoga', cursive;
        }
        #selfie{
            height: 120px;
            display: block;
            margin-left: auto;
            margin-right: auto;
            border: 2px solid #241623;
        }
        .cat-card h4{
            padding-left: 25px;
            font-size: 18px;
            font-weight: 300;
            font-family: 'Heebo', sans-serif;
        }
        .cat-card h4 span{
            font-weight: 900;
        }
    </style>
</head>
<body>
    <nav>
        <img id='logo' src='cat.png'>
        <h1>Cat Emporium</h1>
    </nav>
    <div id='intro'>
        <h2>I Hope You Like Cats</h2>
        <p>
            Some random text that explains the purpose of all this
            and why a multi-million dollar company like Paychex
            would ever take the time and effort to coordinate
            valued employees to take time out of their day to 
            listen to a bunch of random college kids ramble on 
            about their random projects that they all finished 
            the night before at 2am. Like, we're getting course 
            credit for this, this is an actual thing that is 
            happening right now - it's kind of amazing. Now look 
            at these cats!
        </p>
    </div>

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

// echo "Connecting to Database: $host $user $pass $db_name";
echo "<br><br>";


// Create database connection
$conn = new mysqli('db', 'root', $pass, $db_name);
// $conn = new mysqli($host, $user, $pass, $db_name);

// Make database connection and check for errors
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
// echo "Connected to MySQL successfully!";
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

    <div class='cat-card'>
        <h3>Cat Name</h3>
        <img id='selfie' src='temp.png'>
        <h4><span>Weight:</span> 666 lbs</h4>
        <h4><span>Color:</span> Cornflower Blue</h4>
        <h4><span>Located:</span> Atlantis</h4>
        <h4><span>Category:</span> Extinct</h4>
        <h4><span>Went Extinct:</span> 30000 years ago</h4>
        <h4><span>Lifespan:</span> 99 years</h4>
        <h4><span>Cuddliness:</span> 3/5</h4>
    </div>

</body>
</html>