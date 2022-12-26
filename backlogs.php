<?php

session_start();
require_once('dbconnect.php');
if ($_SESSION['first_load'] == 1) {
    $sprint_id = $_POST['submit'];
    $_SESSION['sprint_id'] = $sprint_id;
}

?>

<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link
      href="https://fonts.googleapis.com/css?family=Lexend Zetta"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="backlogs.css" />
    <title>Backlogs</title>
    <link
      href="https://fonts.googleapis.com/css?family=Lexend Zetta"
      rel="stylesheet"
    />
    <link href="footer.css" rel="stylesheet" />
  </head>

  <body style="margin: 0; padding: 0">
    <!-- Header Stuff and Overall page formatting... -->
    <div class="page-divider-black"></div>
    <div class="page-divider-white"></div>

    <div class="header-block">
      <div class="header">
        <h1 style="position: relative">Product Backlog</h1>
      </div>

      <div class="header">
        <h1 style="position: relative">Sprint Backlog</h1>
      </div>
    </div>

    <!-- Buttons... -->

    <?php
        
        if ($_SESSION['type'] == 'Story') {
            ?>

                <form name="myForm" action="taskTypeFilter_.php" method="post">    
                    <select class="task_type_sel" id="type" name="type" onchange="myForm.submit()">
                        <option value="Story">Story</option>
                        <option value="Bug">Bug</option>
                    </select>
                </form>

            <?php
        } else {
            ?>

                <form name="myForm" action="taskTypeFilter_.php" method="post">    
                    <select class="task_type_sel" id="type" name="type" onchange="myForm.submit()">
                        <option value="Bug">Bug</option>
                        <option value="Story">Story</option>
                    </select>
                </form>

            <?php
        }

    ?>

    <div class="button" style="margin-left: 1090px; margin-top: 15px">
      <a href="scrumBoard.php">Start Sprint</a>
    </div>
    <div class="button" style="margin-left: 1250px; margin-top: 15px">
      <form action="sprintStat.php" method="post" >
        <button type="submit" name="submit" value="<?php echo $sprint_id; ?>" style="background: transparent; border: none; outline: none;">Save & Exit</button>
      </form>
    </div>

    <div class="container">
      <div class="kanban-board">
        <!-- Left Column Is Here -->
        <div class="kanban-block">
          <!-- Tasks Inserted here... -->
          <!-- Might have to change div to buttons for implementation -->

            <?php 
            require_once("dbconnect.php");
            $sql = "SELECT * FROM task ORDER BY priority DESC;";
            $result = mysqli_query($conn, $sql);
            
            if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_array($result)){
                    if (($row[3] == $_SESSION['type']) and ($row[9] == '-1')) {
                        if ($row[7] == '1 Low') {
                            $bgCol = '#badc58';
                        }
                        else if ($row[7] == '2 Medium') {
                            $bgCol = '#f9ca24';
                        }
                        else if ($row[7] == '3 High') {
                            $bgCol = '#f0932b';
                        }
                        else if($row[7] == '4 Critical') {
                            $bgCol = '#f84d4d';
                        }
                        ?>

                        <div class="task" style="background-color: <?php echo $bgCol; ?>;">
                            <form action="switchLogProd.php" method="post">
                                <button class="task_btn" type="submit" name="submit" value="<?php echo $row[0]; ?>"><?php echo $row[1]; ?></button>
                            </form>
                        </div>                    

                    <?php
                    }
                }
            }
            ?>
        </div>
        <!-- Right Column Here -->
        <div class="kanban-block">

            <?php 
            require_once("dbconnect.php");
            $sql_ = "SELECT * FROM task ORDER BY priority DESC;";
            $result_ = mysqli_query($conn, $sql);
            
            if(mysqli_num_rows($result_) > 0){
                while($row_ = mysqli_fetch_array($result_)){
                    if (($row_[9] == $_SESSION['sprint_id'])) {
                        if ($row_[7] == '1 Low') {
                            $bgCol = '#badc58';
                        }
                        else if ($row_[7] == '2 Medium') {
                            $bgCol = '#f9ca24';
                        }
                        else if ($row_[7] == '3 High') {
                            $bgCol = '#f0932b';
                        }
                        else if($row_[7] == '4 Critical') {
                            $bgCol = '#f84d4d';
                        }
                        ?>

                        <div class="task" style="background-color: <?php echo $bgCol; ?>;">
                            <form action="switchLogSprint.php" method="post">
                                <button class="task_btn" type="submit" name="submit" value="<?php echo $row_[0]; ?>"><?php echo $row_[1]; ?></button>
                            </form>
                        </div>                    

                    <?php
                    }
                }
            }
            ?>
        
        </div>
      </div>
    </div>
        <style>
        .task_btn {
            border: none;
            background-color: transparent;
            outline: none;
            width: 100%;
            cursor: pointer;
            font: 16px sans-serif;
            font-weight: bold;
        }
        .task_btn:focus {
            border: none;
        }
        select:focus {
            outline: none;
        }
    </style>
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
