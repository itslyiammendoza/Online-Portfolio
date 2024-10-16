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
    <link rel="stylesheet" type="text/css" href="css/portfolioP2.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" type="text/css" href="css/mobilePortfolioP2.css" media="screen and (max-width: 768px)">    

    <!-- Google Fonts: Playfair Display -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet">

    <!-- Google Fonts: Lora -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,400..700;1,400..700&display=swap" rel="stylesheet">

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
          <li><a href="index.php" class="individualNavLinks">Back</a></li>
          <li><a href="logout.php" class="individualNavLinks">Logout</a></li>
        </ul>
      </nav>
      <aside>
        <section id="skills">
          <p class="title">Skills</p>
          <p class="info">
            <ul id="infoList"> 
              <li class="list">
                <img src="images/comms.png" alt="communication">
                <p>Communication</p>
              </li>
              <li class="list">
                <img src="images/cashier.png" alt="communication">
                <p>Cashier</p>
              </li>
              <li class="list">
                <img src="images/office.png" alt="communication">
                <p>Microsoft Office</p>
              </li>
              <li class="list">
                <img src="images/suite.png" alt="communication">
                <p>Google Suite</p>
              </li>
              <li class="list">
                <img src="images/service.png" alt="communication">
                <p>Customer Service</p>
              </li>
              <li class="list">
                <img src="images/stock.png" alt="communication">
                <p>Stock Managing</p>
              </li>
            </ul>
          </p>
        </section>
      </aside>
  
      <article>
        <section id="education">
          <p class="title">Education</p>
          <p class="info">
            <div id="infoBox">
              <div class="infoTitle">
                <a href="https://www.qmul.ac.uk/" class="infoLink">
                  <h2>Queen Mary University London</h2>
                </a>
                <p class="infoInfo">September 2023 &#8211 Ongoing</p>
              </div>
              <div class="infoTitle" class="infoLink">
                <a href="https://www.jhn.herts.sch.uk/" class="infoLink">
                  <h3>St. John Henry Newman infoTitle</h3>
                </a>
                <p class="infoInfo">September 2016 &#8211 July 2023</p>
                <p class="infoInfo">GCSE’s: Maths (8), English Literature (7), English Language (8), </p>
                <p class="infoInfo">Biology (7), Chemistry (8), Physics (7), History (7), Art (9), Religious Studies (8), Computer Science (7)</p>
                <p class="infoInfo">A-Levels: Maths (A), Computer Science (A), Economics (A)</p>
              </div>
            </div>
          </p>
        </section>
        <section id="employment">
          <p class="title">Employment</p>
          <p class="info">
            <div id="infoBox">
              <div class="infoTitle">
                <a href="https://www.bikestop.co.uk/" class="infoLink">
                  <h4>Web Administrator, Bike Stop, Stevenage</h4>
                </a>
                <p class="infoInfo">April 2022 &#8211 August 2023</p>
                <p class="infoInfo">Monitored website for errors; frequently checked the front end and back end of the website, looking for any issues</p>
                <p class="infoInfo">Managed data input (inventory); adjusted company stock depending what was in the warehouse and made edits to online stock</p>
                <p class="infoInfo">Developed improvements for the website; through coding and a premade system</p>
                <p class="infoInfo">Worked within a team</p>
              </div>
            </div>
          </p>
        </section>
        <section id="experience">
          <p class="title">Experience</p>
          <p class="info">
            <div id="infoBox">
              <div class="infoTitle">
                <a href="https://www.bhf.org.uk/what-we-do/find-bhf-near-you/welwyn-garden-city-bhf-shop" class="infoLink">
                  <h5>Volunteering at British Hear Foundation, Welwyn Garden City</h5>
                </a>
                <p class="infoInfo">September 2021 &#8211 December 2021</p>
                <p class="infoInfo">Worked as a cashier: dealt with money in and out of the shop, calculating change when necessary</p>
                <p class="infoInfo">Managed inventory: cleaned and decided what items to sell or donate</p>
                <p class="infoInfo">Designed storefront: styled mannequins and items out front to become appealing to customers</p>
                <p class="infoInfo">Customer service: Dealt with inquiries and complaints</p>
              </div>
            </div>
          </p>
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