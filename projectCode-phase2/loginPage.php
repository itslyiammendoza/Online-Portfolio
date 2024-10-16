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

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
      
      $email = $_POST["email"];
      $password = $_POST["password"];
      
      $sql = "SELECT * FROM USERS WHERE email = '$email' AND password = '$password'";

      $result = $conn->query($sql);

      if ($result->num_rows == 1) {
        $_SESSION["loggedin"] = true;
        
        header("Location: addToBlog.php");
        exit;
      } else {
        $_SESSION["loginError"] = true;

        header("Location: loginPage1.php");
        exit;
      }
  }

  $conn->close();
?>