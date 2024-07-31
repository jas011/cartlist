<?php
$key = $_GET['key'];
$servername = "localhost";
$username = "root";
$dbname = "cart";

$conn = new mysqli($servername, $username, "", $dbname);

$sql = "SELECT stock FROM stocks where Id='$key'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo $row["stock"];
  }
} else {
  echo "0 results";
}
$conn->close();
?>
