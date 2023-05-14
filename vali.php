<?php
include_once 'connection.php';


if ( isset($_GET["User_name"]) ) {
    $q = $_GET["User_name"];
    $sql = "SELECT * FROM sellers WHERE username='".$q."'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {

        echo "have";
    }
} 

if ( isset($_GET["Email"]) ) {
    $a = $_GET["Email"];
    $sql = "SELECT * FROM sellers WHERE email_1='".$a."'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
         
        echo "have";
    }
  
}
if ( isset($_GET["Mobile_number"]) ) {
    $b = $_GET["Mobile_number"];
    $sql = "SELECT * FROM sellers WHERE contact_no2='".$b."'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
         
        echo "have";
    }
    


}

?>