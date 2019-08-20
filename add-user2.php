<?php

/**
  * Configuration for database connection
  *
  */

$host       = "localhost";
$username   = "terry";
$password   = "rowan";
$dbname     = "crud"; // will use later
$dsn        = "mysql:host=$host;dbname=$dbname"; // will use later
$options    = array(
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
              );

/*
if (isset($_POST['submit'])) {

 try {
    $connection = new PDO($dsn, $username, $password, $options);

    $new_user = array(
      "firstname" => $_POST['firstname'],
      "lastname"  => $_POST['lastname'],
      "email"     => $_POST['email'],
      "age"       => $_POST['age'],
      "location"  => $_POST['location']
    );

   $sql = 'INSERT INTO users (firstname, lastname, email, age, location) values (:firstname, :lastname, :email, :age, :location)'

    $statement = $connection->prepare($sql);
    $statement->execute($new_user);
  } catch(PDOException $error) {
    echo $sql . "<br>" . $error->getMessage();
  }

*/


}//if post submitted



?>

