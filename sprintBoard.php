<?php
session_start();
$_SESSION['type'] = 'Story';
$_SESSION['first_load'] = 1;
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
    <title>SprintBoard</title>
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
        <form action="insertSprint.php" method="post">
            <td><input type="text" placeholder="Name" name="name"/></td>
            <td><input type="date"  name="start_date"/></td>
            <td><input type="date"  name="end_date"/></td>
            <td><button type="submit">Add</button></td>
            <td></td>
        </form>
      </tr>

      <tr class="headers">
        <td>Sprint Name</td>
        <td>Start Date</td>
        <td>End Date</td>
        <td>Status</td>
        <td></td>
      </tr>

        <?php

        require_once('dbconnect.php');
        $sql = "SELECT * FROM sprint;";
        $result = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_array($result)){

            ?>

            <tr>
                <td><?php echo $row[1] ?></td>
                <td><?php echo $row[2] ?></td>
                <td><?php echo $row[3] ?></td>
                <td><?php echo $row[4] ?></td>
                <td>
                  <div style="display: flex; flex-direction: row;">
                    <form style="display: flex; justify-content: center; align-items: center; margin: 3px;" action="backlogs.php" method="post">
                        <button style="cursor: pointer;" type="submit" name="submit" value="<?php echo $row[0] ?>">Get Started</button>
                    </form>
                    <form style="display: flex; justify-content: center; align-items: center; margin: 3px;" action="editSprint.php" method="post">
                        <button type="submit" name="submit" value="<?php echo $row[0]; ?>" style="border: none; background: none;"><i class="fa fa-pencil" style="font-size: 24px; cursor: pointer;"></i></button>
                    </form>
                    <form style="display: flex; justify-content: center; align-items: center; margin: 3px;" action="deleteSprint.php" method="post" onsubmit="return confirm('Are you sure you want to delete sprint?')">
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
