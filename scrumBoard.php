<?php

require_once('dbconnect.php');
session_start();
$_SESSION['first_load'] = 0;
$sprint_id = $_SESSION['sprint_id'];

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Scrum Board</title>
    <link rel="stylesheet" href="ScrumBoard.css" />
    <link
      href="https://fonts.googleapis.com/css?family=Lexend Zetta"
      rel="stylesheet"
    />
    <link href="footer.css" rel="stylesheet" />
    <!-- for the floating button -->
  </head>
  <body>
    <!--Header with title-->
    <div class="Title-Container">
      <div class="wrapper">
        <div class="Heading">Scrum Board</div>
      </div>
    </div>

    <div class="ScrumBoard">
      <div class="ScrumBoard__column">
        <div class="ScrumBoard__column-title">Not Started</div>
            <div class="ScrumBoard__column-items">

                    <?php 

                    $sql = "SELECT * FROM task ORDER BY priority DESC;";
                    $result = mysqli_query($conn, $sql);
                    
                    if(mysqli_num_rows($result) > 0){
                        while($row = mysqli_fetch_array($result)){
                            if (($row[6] == 'Not Started') and ($row[9] == $sprint_id)) {
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

                                <div class="ScrumBoard__item" style="background-color: <?php echo $bgCol; ?>;" draggable="false">
                                    <form action="scrumEdit.php" method="post" style="height: 100%;">
                                        <button style="height: 100%;" class="task_btn" type="submit" name="submit" value="<?php echo $row[0]; ?>"><?php echo $row[1]; ?></button>
                                    </form>
                                </div>

                            <?php
                            }
                        }
                    }
                    ?>

            </div>
        </div>

      <div class="ScrumBoard__column">
        <div class="ScrumBoard__column-title">In Progress</div>
        <div class="ScrumBoard__column-items">

                <?php 

                $sql_ = "SELECT * FROM task ORDER BY priority DESC;";
                $result_ = mysqli_query($conn, $sql_);
                
                if(mysqli_num_rows($result_) > 0){
                    while($row_ = mysqli_fetch_array($result_)){
                        if (($row_[6] == 'In Progress') and ($row_[9] == $sprint_id)) {
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

                            <div class="ScrumBoard__item" style="background-color: <?php echo $bgCol; ?>;" draggable="false">
                                <form action="scrumEdit.php" method="post" style="height: 100%;">
                                    <button style="height: 100%;" class="task_btn" type="submit" name="submit" value="<?php echo $row_[0]; ?>"><?php echo $row_[1]; ?></button>
                                </form>
                            </div>

                        <?php
                        }
                    }
                }
                ?>

        </div>
      </div>

      <div class="ScrumBoard__column">
        <div class="ScrumBoard__column-title">Completed</div>
            <div class="ScrumBoard__column-items">

                    <?php 

                    $sql__ = "SELECT * FROM task ORDER BY priority DESC;";
                    $result__ = mysqli_query($conn, $sql__);
                    
                    if(mysqli_num_rows($result__) > 0){
                        while($row__ = mysqli_fetch_array($result__)){
                            if (($row__[6] == 'Completed') and ($row__[9] == $sprint_id)) {
                                if ($row__[7] == '1 Low') {
                                    $bgCol = '#badc58';
                                }
                                else if ($row__[7] == '2 Medium') {
                                    $bgCol = '#f9ca24';
                                }
                                else if ($row__[7] == '3 High') {
                                    $bgCol = '#f0932b';
                                }
                                else if($row__[7] == '4 Critical') {
                                    $bgCol = '#f84d4d';
                                }
                                ?>

                                <div class="ScrumBoard__item" style="background-color: <?php echo $bgCol; ?>;" draggable="false">
                                    <form action="scrumEdit.php" method="post" style="height: 100%;">
                                        <button style="height: 100%;" class="task_btn" type="submit" name="submit" value="<?php echo $row__[0]; ?>"><?php echo $row__[1]; ?></button>
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

    <a href="" class="Floating_Button Back"> Back </a>
    <form action="sprintStat_.php" method="post">
        <button type="submit" name="submit" value="<?php echo $sprint_id; ?>" class="Floating_Button EndSprint"> End Sprint </button>
    </form>

    <script src="js/Main.js" type="module"></script>
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
        .ScrumBoard__item {
            margin-bottom: 15px;
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
