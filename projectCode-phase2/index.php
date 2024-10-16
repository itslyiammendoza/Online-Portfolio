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

  // SQL query to check if id 1 exists
  $query = "SELECT * FROM USERS WHERE ID = 1";

  // Execute the query
  $result = $conn->query($query);

  if (!($result->num_rows > 0)) 
  {
    $sql = "INSERT INTO 'USERS' (EMAIL, PASSWORD) VALUES ('lyiammendoza@gmail.com', 'Qmul2024')";
    if ($conn->query($sql) === TRUE) {
        echo "<script>console.log('User added.');</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
  }
   $conn->close();
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" name="viewport" content="width=devide-width, initial-scale=1.0">
    <title>My Portfolio</title>
    <link rel="stylesheet" type="text/css" href="css/reset.css">
    <link rel="stylesheet" type="text/css" href="css/portfolio.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" type="text/css" href="css/mobilePortfolio.css" media="screen and (max-width: 768px)">

    <!-- Google Fonts: Playfair Display -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet">

    <!-- Google Fonts: Bebas Neue -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet"> 

  </head>
  <body>
    <div id="container">
      <header>
        <a href="index.php" id="logoLink">
          <img src="images/logo.png" alt="logo" id="logo">
        </a>
        <h1>Lyiam Jeremy Mendoza</h1>
      </header>

      <nav>
        <ul id="navLinks">
          <li><a href="https://github.com/itslyiammendoza?tab=repositories" class="individualNavLinks">Coding Portfolio</a></li>
          <li><a href="viewBlog.php" class="individualNavLinks">My Blog</a></li>
          <li><a href="mailto:lyiammendoza@gmail.com" class="individualNavLinks">Contact</a></li>
          <li><a href="portfolioP2.php" class="individualNavLinks">Other info</a></li>
          <li><a href="logout.php" class="individualNavLinks">Logout</a></li>
        </ul>
      </nav>

      <article>
        <section id="myself">
          <figure>
            <img src="images/profilePic.jpg" alt="Lyiam Jeremy Mendoza" id="profilePic">
            <figcaption>Lyiam Jeremy Malabanan Mendoza</figcaption>
            <p id="underFig">Undergraduate Student</p>
          </figure>
          <section id="aboutMe">
            <h2>About Me</h2>
            <hr>
            <p>
              My name is Lyiam Jeremy Mendoza and I am currently an Undergraduate student at Queen Mary University London.
            </p>
            <p>With a varied skill set, I am excellent in communication, cashier tasks, Microsoft Office, Google Suite, customer service, and inventory management.
              My skills in these areas have been polished through both academic and practical experience. 
            </p>
            <p>
              I thrive at efficiently communicating complicated ideas, managing financial transactions with precision, 
              utilising multiple technological tools for quick work completion, and providing exceptional customer service. 
            </p>
            <p>
              My ability to adapt to new situations and communicate fluidly across teams increases my effectiveness in every professional scenario. 
              With a solid foundation in problem solving and a commitment to continual learning, I am well-positioned to contribute positively to any organization's goals.
            </p>
          </section>
        </section>
      </article>
  
      <footer>
        <a href="https://www.instagram.com/its_lyiammendoza/" class="bottomLinks">
          <img src="images/instagram.png" alt="Instagram" class="footerImages">
        </a>
        <a href="https://www.linkedin.com/in/lyiam-jeremy-mendoza-641017278/" class="bottomLinks">
          <img src="images/linkedIn.png" alt="LinkedIn" class="footerImages">
        </a>
        <a href="https://github.com/itslyiammendoza" class="bottomLinks">
          <img src="images/github.png" alt="GitHub" class="footerImages">
        </a>
      </footer>
    </div>
  </body>
</html>