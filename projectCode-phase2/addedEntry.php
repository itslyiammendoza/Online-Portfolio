<?php
  session_start();

  $servername = "127.0.0.1"; 
  $username = "root"; 
  $password = ""; 
  $dbname = "ecs417";

  $conn = new mysqli($servername, $username, $password, $dbname);

  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }

  $title = $_POST["title"];
  $description = $_POST["text"];

  $sql = "INSERT INTO BLOGS (title, description, dates, times) VALUES ('$title', '$description', CURRENT_DATE(), CURRENT_TIME())";

  if ($conn->query($sql) === true) 
  {
    header("Location: viewBlog.php");
    exit();
  } else {
    echo "Error adding blog: " . $conn->error;
  }

  $conn->close();
?>