<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" name="viewport" content="width=devide-width, initial-scale=1.0">
    <title>Add to Blog</title>
    <link rel="stylesheet" type="text/css" href="css/reset.css">
    <link rel="stylesheet" type="text/css" href="css/addToBlog.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" type="text/css" href="css/mobileInputBox.css" media="screen and (max-width: 768px)">

    <!-- Google Fonts: Playfair Display -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet">

    <!-- Google Fonts: Bebas Neue -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet"> 

    <script type="text/javascript" src="addToBlog.js"></script>

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
          <li><a href="viewBlog.php" class="individualNavLinks">View Blog</a></li>
          <li><a href="mailto:lyiammendoza@gmail.com" class="individualNavLinks">Contact</a></li>
          <li><a href="index.php" class="individualNavLinks">Back</a></li>
          <li><a href="logout.php" class="individualNavLinks">Logout</a></li>
        </ul>
      </nav>

      <article>
        <form action="addedEntry.php" method="post">
          <fieldset>
            <div id="title">
              <h2>Add to Blog</h2>
            </div>
            <div id="inputs">
              <input id="titleBox" type="text" name="title" placeholder="Enter your title here: ">
              <br>
              <textarea id="textBox" name="text" placeholder="Enter your text here: " rows="10" cols="65"></textarea>
            </div>
            <div id="buttons">
              <input type="submit" value="Submit">
              <input type="button" id="previewButton" value="Preview">
              <input type="reset" value="Clear">
            </div>
          </fieldset>
        </form>

        <script type="text/javascript">
          document.getElementById('previewButton').addEventListener('click', function(e) {
            e.preventDefault();
            sessionStorage.setItem('previewTitle', document.getElementById('titleBox').value);
            sessionStorage.setItem('previewText', document.getElementById('textBox').value);
            sessionStorage.setItem('previewPressed', 'true');
            window.location.href = 'viewBlog.php';
          });

          // Check if there is any data in the sessionStorage and populate the title and text boxes with this data
          if (sessionStorage.getItem('editTitle') && sessionStorage.getItem('editText')) {
            document.getElementById('titleBox').value = sessionStorage.getItem('editTitle');
            document.getElementById('textBox').value = sessionStorage.getItem('editText');
            sessionStorage.removeItem('editTitle');
            sessionStorage.removeItem('editText');
          }
        </script>

        <?php
          session_start();

          if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
              header("Location: loginPage1.php");
              exit;
          }
          echo 
          '<script type="text/javascript">
            let newDiv = document.createElement("div");
            newDiv.className = "loginDetail";
            newDiv.setAttribute("title", "loginSuccess");

            let newDivText = document.createTextNode("Login successful: Welcome Lyiam Jeremy Mendoza.");

            newDiv.appendChild(newDivText);

            let container = document.querySelector("article");
            let form = document.querySelector("article form");

            container.insertBefore(newDiv, form);
          </script>';

        ?>  
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