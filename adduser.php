
<?php



if (isset($_POST['submit'])) {

/*
echo "hello world";
echo 'firstname ' . htmlspecialchars($_POST["firstname"]) . '!';
echo 'lastname ' . htmlspecialchars($_POST["lastname"]) . '!';
echo 'email ' . htmlspecialchars($_POST["email"]) . '!';
echo 'age ' . htmlspecialchars($_POST["age"]) . '!';
echo 'location ' . htmlspecialchars($_POST["location"]) . '!';
*/

    $new_user = array(
      "firstname" => $_POST['firstname'],
      "lastname"  => $_POST['lastname'],
      "email"     => $_POST['email'],
      "age"       => $_POST['age'],
      "location"  => $_POST['location']
    );

}
else {


echo "<a href=\"index.html\">Back to Home</a>";

// some default user
    $new_user = array(
      "firstname" => "alpha",
      "lastname"  => "beta",
      "email"     => "charlie",
      "age"       => "3",
      "location"  => "delta"
    );
}





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



   $sql = 'INSERT INTO users (firstname, lastname, email, age, location) values (:firstname, :lastname, :email, :age, :location)';

try {
    $connection = new PDO($dsn, $username, $password, $options);


    $statement = $connection->prepare($sql);
    $statement->execute($new_user);


    echo "The user has been added to the database - redirect? ";
    echo "<br/><a href=\"index.html\">Back to Home</a>";


  } catch(PDOException $error) {
    echo $sql . "<br>" . $error->getMessage();
  }








?>


