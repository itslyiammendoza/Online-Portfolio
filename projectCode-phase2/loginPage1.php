<?php
    session_start();

    if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true) {
      header("Location: addToBlog.php");
      exit;
    }

    if (isset($_SESSION["loginError"]) && $_SESSION["loginError"] == true) {
        $message = "Login unsuccessful. Please try again.";
    } else {
        $message = "";
    }
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" name="viewport" content="width=devide-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" type="text/css" href="css/reset.css">
    <link rel="stylesheet" type="text/css" href="css/loginPage.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" type="text/css" href="css/mobileInputBox.css?v=<?php echo time(); ?>"" media="screen and (max-width: 768px)">

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
          <li><a href="viewBlog.php" class="individualNavLinks">View Blog</a></li>
          <li><a href="loginPage1.php" class="individualNavLinks">Add to Blog</a></li>
          <li><a href="mailto:lyiammendoza@gmail.com" class="individualNavLinks">Contact</a></li>
          <li><a href="index.php" class="individualNavLinks">Back</a></li>
        </ul>
      </nav>

      <article>
        <form action="loginPage.php" method="post">
          <fieldset>
            <div id="title">
              <h2>Login</h2>
            </div>
            <div id="inputs">
              <input type="email" name="email" placeholder="Email: " required>
              <br>
              <input type="password" name="password" placeholder="Password: " required>
            </div>
            <div id="buttons">
              <input type="submit" value="Login">
            </div>
          </fieldset>
        </form>

        <script type="text/javascript">
          let newDiv = document.createElement("div");
          newDiv.className = "loginDetail";
          newDiv.setAttribute("title", "loginSuccess");

          let newDivText = document.createTextNode("<?php echo $message; ?>");

          newDiv.appendChild(newDivText);

          let container = document.querySelector("article");
          let form = document.querySelector("article form");

          container.insertBefore(newDiv, form);
        </script>

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