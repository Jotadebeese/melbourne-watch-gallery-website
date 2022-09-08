<?php
// Create connection
$conn = mysqli_connect("localhost","root","","melbourne_watch_gallery");

// Check connection
if (mysqli_connect_errno($conn))
{
   echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>