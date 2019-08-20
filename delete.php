
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

// multi - parameterized search sql query.
// limit the number of searches

try {

$connection = new PDO($dsn, $username, $password, $options);

$id  = $_POST['id'];
$firstname  = $_POST['firstname'];
$lastname  = $_POST['lastname'];
$email  = $_POST['email'];
$age  = $_POST['age'];
$location = $_POST['location'];

$sql = "DELETE FROM users WHERE id = :id";

$statement = $connection->prepare($sql);
$statement->bindParam(':id', $id, PDO::PARAM_STR);
$statement->execute();

echo "<b>database entry deleted</b>";

echo "<br/><a href=\"index.html\">Back to Home</a>";

  } catch(PDOException $error) {
    echo $sql . "<br>" . $error->getMessage();
  }

}// if submit post
else {
echo "<br/><a href=\"index.html\">Back to Home</a>";

}

?>


