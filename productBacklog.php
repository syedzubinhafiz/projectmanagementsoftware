<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://fonts.googleapis.com/css?family=Lexend Zetta"
      rel="stylesheet"
    />
    <link href="productBacklog.css" rel="stylesheet" />
    <h1>Product Backlog</h1>
    <style>
      body {
        margin-top: 10px;
        font-family: "Lexend Zetta";
      }
      title {
        font-family: "Lexend Zetta";
        margin-top: 20px;
      }
      h2 {
        margin-top: 10px;
      }
    </style>
  </head>
  <body>
    <?php
    session_start();
    if ($_SESSION['active'] == 'False') {
        header('Location: login.php');
    }
    $_SESSION['type'] = 'Story';
    $_SESSION['tag'] = 'UI';
    ?>
    
    <h2>User Stories</h2>
    <a href="task.php">
    <img
      class="icon"
      src="https://cdn-icons-png.flaticon.com/512/1387/1387819.png"
    />
    </a>
  </body>
  <body>
    <nav class="navMenu">
      <a href="productBacklog.php">Product Backlog</a>
      <a href="sprintBoard.php">Sprint Board</a>
      <a href="teamDashboard.php">Team Dashboard</a>
      <div class="dot"></div>
    </nav>
  </body>
</html>
