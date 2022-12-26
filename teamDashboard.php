
<?php
    session_start();
    if ($_SESSION['active'] == 'False') {
        header('Location: login.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="stylesheet"
      href="sprintBoard.css"
    />
    <link
      href="https://fonts.googleapis.com/css?family=Lexend Zetta"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="footer.css" rel="stylesheet" />
    <title>Team Dashboard</title>
  </head>
  <style>
    td {
      font-family: system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI",
        Roboto, Oxygen, Ubuntu, Cantarell, "Open Sans", "Helvetica Neue",
        sans-serif;
      font-weight: bold;
    }
  </style>
  <body>

    <table class="table" style="text-align: center;">
      <tr>
        <form action="insertEmployee.php" method="post">
            <td><input type="text" name="name" placeholder="Name"></td>
            <td><input type="email" name="email" placeholder="Email"></td>
            <td><button type="submit">Add</button></td>
        </form>
      </tr>

      <tr class="headers">
        <td>Name</td>
        <td>Email</td>
        <td></td>
      </tr>

        <?php

        require_once('dbconnect.php');
        $sql = "SELECT * FROM employee;";
        $result = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_array($result)){

            ?>

            <tr>
                <td><?php echo $row[0] ?></td>
                <td><?php echo $row[1] ?></td>
                <td>
                  <div style="display: flex; flex-direction: row;">
                    <form style="display: flex; justify-content: center; align-items: center; margin: 3px;" action="" method="">
                        <button style="cursor: pointer;" type="submit" name="submit" value="<?php echo $row[0] ?>">Analytics</button>
                    </form>
                    <form style="display: flex; justify-content: center; align-items: center; margin: 3px;" action="editEmployee.php" method="post">
                        <button type="submit" name="submit" value="<?php echo $row[0]; ?>" style="border: none; background: none;"><i class="fa fa-pencil" style="font-size: 24px; cursor: pointer;"></i></button>
                    </form>
                    <form style="display: flex; justify-content: center; align-items: center; margin: 3px;" action="deleteEmployee.php" method="post" onsubmit="return confirm('Are you sure you want to delete employee?')">
                        <button type="submit" name="submit" value="<?php echo $row[0]; ?>" style="border: none; background: none;"><i class="fa fa-trash" style="font-size: 24px; cursor: pointer;"></i></button>
                    </form>
                  </div>
                </td>
            </tr>

            <?php
            }
        }
        
        ?>

    </table>

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
