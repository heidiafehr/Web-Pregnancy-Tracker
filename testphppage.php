<?php
    $servername = "localhost";
    $username = "heidi";
    $password = "2759Nrwy!";
    $dbname = "ptDB";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM users";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
        echo "id: " . $row["Username"] . "<br>";
      }
    } else {
      echo "0 results";
    }

    $conn->close();
?>
