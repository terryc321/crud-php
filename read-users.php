
<?php



if (isset($_POST['submit'])) {


/**
  * Configuration for database connection
  *
  */

$host       = "localhost";
$username   = "terry";
$password   = "poke";
$dbname     = "crud"; // will use later
$dsn        = "mysql:host=$host;dbname=$dbname"; // will use later
$options    = array(
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
              );

$sql = "SELECT * FROM users WHERE location = :location";

try {

$connection = new PDO($dsn, $username, $password, $options);


$location = $_POST['location'];

$statement = $connection->prepare($sql);
$statement->bindParam(':location', $location, PDO::PARAM_STR);
$statement->execute();

$result = $statement->fetchAll();

echo "<br/><a href=\"index.html\">Back to Home</a>";


  } catch(PDOException $error) {
    echo $sql . "<br>" . $error->getMessage();
  }

}// if submit post







?>


