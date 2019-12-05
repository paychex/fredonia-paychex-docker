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
            /*float: left;*/
            display: inline-block;
            /*height: 500px;
            width: 300px;*/
            clear: both;
            padding: 0 5px 0 5px;
            margin: 20px 20px 20px 20px;
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
            padding-right: 10px;
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
        <h2>Welcome!</h2>
        <p>
            Welcome to the Cat Emporium. This web page utilizes three docker
            containers to function. The first container runs the Apache
            web server. The second container runs the MySQL database. The third
            and last container holds this very web page you are viewing right
            now. As you can see, a lot is going on behind the scenes. We hope
            you enjoy viewing these wonderful pictures of cats.
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
$conn = new mysqli('db', $user, $pass, $db_name);
// $conn = new mysqli($host, $user, $pass, $db_name);

// Make database connection and check for errors
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// echo "Connected to MySQL successfully!";
#echo "<br><br>";

// Set sql statment and make query
#$sql = "SELECT cat_id, cat_name FROM cats_table";
#$result = $conn->query($sql);

// Check for results from query
#if ($result->num_rows > 0) {
    // output data of each row
    #while($row = $result->fetch_assoc()) {
        #echo "id: " . $row["cat_id"]. " - Name: " . $row["cat_name"]. " " . "<br>";
    #}
#} else {
#    echo "0 results";
#}

// Close database connection
#$conn->close();
?>

<?php
  #Grabs cats
  $sql = "SELECT * FROM cats_table ";
  //echo $sql;
  #$cats_set = mysqli_query($conn, $sql);
  $cats_set = $conn->query($sql);
  #while ($cat = $cats_set->fetch_assoc())
  #{
  #  echo $cat["cat_name"] . "<br>";
  #}

  #Checks that result found, else output error
  if (!$cats_set)
  {
    exit("Database query failed.");
  }
 ?>

<?php while ($cat = $cats_set->fetch_assoc())
{ ?>
    <div class='cat-card'>
        <h3><?php echo $cat["cat_name"]; ?></h3>
        <!--<img id='selfie' src='temp.png'> !-->
        <?php echo "<a href=\"\"><img src=\"" . $cat["cat_pic"] . "\" style=\"height:200px;\"></a>" ?>
        <h4><span>Size:</span><?php echo " " . $cat["cat_size"]; ?></h4>
        <h4><span>Color:</span><?php echo " " . $cat["cat_color"]; ?></h4>
        <h4><span>Located:</span><?php echo " " . $cat["cat_location"]; ?></h4>
        <h4><span>Category:</span><?php echo " " . $cat["cat_category"]; ?></h4>
        <h4><span>Went Extinct:</span><?php echo " " . $cat["cat_extinct"]; ?></h4>
        <h4><span>Lifespan:</span><?php echo " " . $cat["cat_life"]; ?></h4>
        <h4><span>Cuddliness:</span><?php echo " " . $cat["cat_cuddle"]; ?></h4>
    </div>
  <?php } ?>

<?php $conn->close(); ?>

</body>
</html>
