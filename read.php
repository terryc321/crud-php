
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


$location = $_POST['location'];

if ($location != ''){
$sql = "select * from users where location = :location ;";
}
else {
$sql = "select * from users;";
}

try {

$connection = new PDO($dsn, $username, $password, $options);

$statement = $connection->prepare($sql);
if ($location != ''){ 
 $statement->bindParam(':location', $location, PDO::PARAM_STR);
}
$statement->execute();

$result = $statement->fetchAll();

//echo $result;

  $html = "";
  if ($result && $statement->rowCount() > 0) {

   $html .= "
    <h2>Results</h2>

    <table>
      <thead>
<tr>
  <th>#</th>
  <th>First Name</th>
  <th>Last Name</th>
  <th>Email Address</th>
  <th>Age</th>
  <th>Location</th>
  <th>Date</th>
</tr>
      </thead>
      <tbody>
   ";
   
  foreach ($result as $row) {
  $html .= "<tr>";
  $html .= "<td>" . $row["id"]  .  "</td>";
  $html .= "<td>" . $row["firstname"]  .  "</td>";
  $html .= "<td>" . $row["lastname"]  .  "</td>";  
  $html .= "<td>" . $row["email"]  .  "</td>";
  $html .= "<td>" . $row["age"]  .  "</td>";
  $html .= "<td>" . $row["location"]  .  "</td>";
  $html .= "<td>" . $row["date"]  .  "</td>";  
  $html .= "</tr>";
   }

   $html .= "
      </tbody>
  </table> ";

  } else { 
   $html .= "No results found for " . $_POST['location'] ;
   }


echo $html;

echo "<br/><a href=\"search-user.html\">Back to Search</a>";

echo "<br/><a href=\"index.html\">Back to Home</a>";


  } catch(PDOException $error) {
    echo $sql . "<br>" . $error->getMessage();
  }

}// if submit post
else {
echo "<br/><a href=\"index.html\">Back to Home</a>";

}

?>


