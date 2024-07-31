<?php
$data = file_get_contents('php://input');
$info_arr = json_decode($data, true);
$servername = "localhost";
$username = "root";
$dbname = "cart";

$conn = new mysqli($servername, $username, $password, $dbname);


foreach($info_arr as $k => $v) { 
    update($conn,$k,(int)$v);
}

function update($conn,$key,$value){
    $myfile = fopen("newfile.txt", "w") or die("Unable to open file!");
    $sql = "UPDATE stocks SET stock=$value WHERE Id='$key'";

    if ($conn->query($sql) === TRUE) {
      fwrite($myfile, "Record updated successfully -> $key=>$value ".gettype($value)."\n");;
    } else {
      fwrite($myfile, "Error updating record: " . $conn->error."\n");
    }
}




// Create connection

// Check connection



fclose($myfile);
$conn->close();
?>