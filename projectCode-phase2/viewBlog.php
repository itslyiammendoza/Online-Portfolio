<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" name="viewport" content="width=devide-width, initial-scale=1.0">
    <title>View Blog</title>
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
          <li><a href="loginPage1.php" class="individualNavLinks">Add To Blog</a></li>
          <li><a href="mailto:lyiammendoza@gmail.com" class="individualNavLinks">Contact</a></li>
          <li><a href="index.php" class="individualNavLinks">Back</a></li>
          <li><a href="logout.php" class="individualNavLinks">Logout</a></li>
        </ul>
      </nav>

      <article>
        <script>
          function uploadEntry(title, text) {
            let xhr = new XMLHttpRequest();
            xhr.open("POST", "addedEntry.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function() {
              if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
                alert("Entry uploaded successfully!");
                window.location.href = 'viewBlog.php';
              }
            }
            xhr.send("title=" + encodeURIComponent(title) + "&text=" + encodeURIComponent(text));
          }
        </script>
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

            // Assuming your table has columns named 'title', 'description', 'date', and 'time'
            $sql = "SELECT * FROM BLOGS";

            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $rows = array();
                while($row = $result->fetch_assoc()) {
                    $rows[] = $row;
                }

                // Implement bubble sort
                $size = count($rows);
                for ($i=0; $i<$size-1; $i++) {
                    for ($j=0; $j<$size-$i-1; $j++) {
                        $dateA = strtotime($rows[$j]['dates'] . ' ' . $rows[$j]['times']);
                        $dateB = strtotime($rows[$j+1]['dates'] . ' ' . $rows[$j+1]['times']);

                        if ($dateA < $dateB) {
                            $temp = $rows[$j];
                            $rows[$j] = $rows[$j+1];
                            $rows[$j+1] = $temp;
                        }
                    }
                }

                // Group entries by month
                $entriesByMonth = array();
                foreach ($rows as $row) {
                    $month = date('F Y', strtotime($row['dates']));
                    if (!isset($entriesByMonth[$month])) {
                        $entriesByMonth[$month] = array();
                    }
                    $entriesByMonth[$month][] = $row;
                }

                echo "<select id='monthSelect'>";
                echo "<option value= ''>Months: </option>";
                foreach ($entriesByMonth as $month => $entries) {
                    echo "<option value='{$month}'>{$month}</option>";
                }
                echo "</select>";

                echo "<div id='entriesContainer'>";
                // Check if the preview button was pressed and display the preview data
                echo "<script type='text/javascript'>
                if (sessionStorage.getItem('previewPressed') === 'true') {
                  document.write(\"<div class='entry'>\");
                  document.write(\"<p id='time'>Posted on: \" + new Date().toLocaleString() + \"</p>\");
                  document.write(\"<p id='blogTitle'>\" + sessionStorage.getItem('previewTitle') + \"</p>\");
                  document.write(\"<p id='blogText'>\" + sessionStorage.getItem('previewText') + \"</p>\");
                  document.write(\"<button class='editButton' onclick='editEntry(\\\"\" + sessionStorage.getItem('previewTitle') + \"\\\", \\\"\" + sessionStorage.getItem('previewText') + \"\\\")'>Edit</button>\");
                  document.write(\"<button class='uploadButton' onclick='uploadEntry(\\\"\" + sessionStorage.getItem('previewTitle') + \"\\\", \\\"\" + sessionStorage.getItem('previewText') + \"\\\")'>Upload</button>\");
                  document.write(\"</div>\");
                  document.write(\"<hr>\"); // Add a horizontal line under the previewed entry
                  sessionStorage.removeItem('previewPressed');
                  sessionStorage.removeItem('previewTitle');
                  sessionStorage.removeItem('previewText');
                }
                </script>";

                $i = 0;
                $len = count($rows);
                foreach ($rows as $row) {
                  if ($i == $len - 1) {
                    echo "<div class='entry'>";
                    echo "<p id='time'>Posted on: " . $row["dates"] . " at " . $row["times"] . "</p>";
                    echo "<p id='blogTitle'>" . $row["title"] . "</p>";
                    echo "<p id='blogText'>" . $row["description"] . "</p>";
                    echo "</div>";
                  }else{
                    echo "<div class='entry'>";
                    echo "<p id='time'>Posted on: " . $row["dates"] . " at " . $row["times"] . "</p>";
                    echo "<p id='blogTitle'>" . $row["title"] . "</p>";
                    echo "<p id='blogText'>" . $row["description"] . "</p>";
                    echo "</div>";
                    echo "<hr>";
                  }
                  $i++;
                }
            } else {
                echo "No entries found";
            }

            echo "</div>";

            $conn->close();
          ?>

        <script type="text/javascript">
          window.onload = function() {
          document.getElementById('monthSelect').addEventListener('change', function() {
          const month = this.value;
          const entries = <?php echo json_encode($entriesByMonth); ?>;
          const container = document.getElementById('entriesContainer');

          // Clear the container
          while (container.firstChild) {
            container.removeChild(container.firstChild);
          }

          // Function to create an entry
          function createEntry(entry) {
            const div = document.createElement('div');
          div.className = 'entry';

          const pTime = document.createElement('p');
          pTime.id = 'time';
          pTime.textContent = 'Posted on: ' + entry.dates + ' at ' + entry.times;
          div.appendChild(pTime);

          const pTitle = document.createElement('p');
          pTitle.id = 'blogTitle';
          pTitle.textContent = entry.title;
          div.appendChild(pTitle);

          const pText = document.createElement('p');
          pText.id = 'blogText';
          pText.textContent = entry.description;
          div.appendChild(pText);

          const hr = document.createElement('hr');
          div.appendChild(hr);

          return div;
          }

          // If the selected value is not empty, show the entries for the selected month
          if (month) {
            entries[month].forEach(function(entry) {
              let div = createEntry(entry);
              container.appendChild(div);
            });
          } else {
            // If the selected value is empty, show all entries
            Object.values(entries).flat().forEach(function(entry) {
              let div = createEntry(entry);
              container.appendChild(div);
                });
              }
            });
          }
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
    <script type="text/javascript">
      function editEntry(title, text) {
        sessionStorage.setItem('editTitle', title);
        sessionStorage.setItem('editText', text);
        window.location.href = 'addToBlog.php';
      }
    </script>
  </body>
</html>