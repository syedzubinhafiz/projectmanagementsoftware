<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tasks</title>
    <link href="task.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Lexend Zetta" rel="stylesheet">
    <link
      href="https://fonts.googleapis.com/css?family=Lexend Zetta"
      rel="stylesheet"
    />
    <link href="footer.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <?php
    session_start();
    if ($_SESSION['active'] == 'False') {
        header('Location: login.php');
    }
    ?>

    <div style="display: flex; flex-direction: row;">

        <?php
        
        if ($_SESSION['type'] == 'Story') {
            ?>

            <h1>
                <form name="myForm" action="taskTypeFilter.php" method="post">    
                    <select style="background: none; border: none; font-size: 100px; font-family: 'Lexend Zetta';" id="type" name="type" onchange="myForm.submit()">
                        <option value="Story">Story</option>
                        <option value="Bug">Bug</option>
                    </select>
                </form>
            </h1>

            <?php
        } else {
            ?>

            <h1>
                <form name="myForm" action="taskTypeFilter.php" method="post">    
                    <select style="background: none; border: none; font-size: 100px; font-family: 'Lexend Zetta';" id="type" name="type" onchange="myForm.submit()">
                        <option value="Bug">Bug</option>
                        <option value="Story">Story</option>
                    </select>
                </form>
            </h1>

            <?php
        }

        ?>

        <a href="addTask.php">
            <button style="font-size: 100px; background-color: rgb(0, 0, 0); color: azure; padding-top: 0.0001in; margin: 25px;">+</button>
        </a>
        <div class="hover-text"><i style="font-size:24px" class="fa">&#xf05a;</i>
            <span class="tooltip-text" id="right">Green - Low, Yellow - Medium, Orange - High, Red - Critical</span>
        </div>

    </div>

    <div style="display: flex; flex-direction: row; justify-content: flex-end;">

    <?php
    
    if ($_SESSION['tag'] == 'UI') {
        ?>

        <form name="myForm_" action="taskTagFilter.php" method="post">    
            <select style="background: none; border: none; font-size: 30px; font-family: 'Lexend Zetta';" id="tag" name="tag" onchange="myForm_.submit()">
                <option value="UI">UI</option>
                <option value="Testing">Testing</option>
                <option value="Critical">Critical</option>
            </select>
        </form>

        <?php
    } else if ($_SESSION['tag'] == 'Testing') {
        ?>

        <form name="myForm_" action="taskTagFilter.php" method="post">    
            <select style="background: none; border: none; font-size: 30px; font-family: 'Lexend Zetta';" id="tag" name="tag" onchange="myForm_.submit()">
                <option value="Testing">Testing</option>
                <option value="UI">UI</option>
                <option value="Critical">Critical</option>
            </select>
        </form>

        <?php
    } else {
        ?>

        <form name="myForm_" action="taskTagFilter.php" method="post">    
            <select style="background: none; border: none; font-size: 30px; font-family: 'Lexend Zetta';" id="tag" name="tag" onchange="myForm_.submit()">
                <option value="Critical">Critical</option>
                <option value="UI">UI</option>
                <option value="Testing">Testing</option>
            </select>
        </form>

        <?php
    }

    ?>

    </div>

    <div style='display: flex; flex-direction: row;'>

        <?php 
        require_once("dbconnect.php");
        $sql = "SELECT * FROM task ORDER BY priority DESC;";
        $result = mysqli_query($conn, $sql);
        
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_array($result)){
                if (($row[3] == $_SESSION['type']) and ($row[4] == $_SESSION['tag'])) {
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

                    <div class="card" style="background-color: <?php echo $bgCol; ?>;">
                        <div class="card_top">
                            <p style="font-family: arial; font-size: 14px; margin-left: 10px;"><?php echo $row[5]; ?></p>

                            <p class="tag"><?php echo $row[4]; ?></p>
                        </div>

                        <form action="editTask.php" method="post">
                            <button class="card_middle" type="submit" name="submit" value="<?php echo $row[0]; ?>">
                                <h2 style="margin-left: 0px;"><?php echo $row[1]; ?></h3>
                                <h3 style="margin-left: 0px;">Story Point: <?php echo $row[8]; ?></h3>
                                <h3 style="margin-left: 0px;">Progress: <?php echo $row[6]; ?></h3>
                            </button>
                        </form>
                        <!--
                        <div class="card_bottom">
                            <form action="deleteTask.php" method="post">
                                <button type="submit" name="submit" value="php echo $row[0];" style="border: none; background: none;"><i class="fa fa-trash" style="font-size: 24px;"></i></button>
                            </form>

                            <form action="editTask.php" method="post">
                                <button type="submit" name="submit" value="php echo $row[0]; ?>" style="border: none; background: none;"><i class="fa fa-pencil" style="font-size: 24px;"></i></button>
                            </form>
                        </div>
                        -->
                    </div>

                <?php
                }

            }
        }

        ?>

    </div>

    <style>
        .card_middle {
            border: none;
            background-color: transparent;
            outline: none;
            width: 100%;
            cursor: pointer;
        }
        .card_middle:focus {
            border: none;
        }
        select:focus {
            outline: none;
        }

        .tooltip-text {
        visibility: hidden;
        position: absolute;
        z-index: 2;
        width: 100px;
        color: white;
        font-size: 12px;
        background-color: #192733;
        border-radius: 10px;
        padding: 10px 15px 10px 15px;
        }

        .tooltip-text::before {
        content: "";
        position: absolute;
        transform: rotate(45deg);
        background-color: #192733;
        padding: 5px;
        z-index: 1;
        }

        .hover-text:hover .tooltip-text {
        visibility: visible;
        }

        #top {
        top: -40px;
        left: -50%;
        }

        #top::before {
        top: 80%;
        left: 45%;
        }

        #bottom {
        top: 25px;
        left: -50%;
        }

        #bottom::before {
        top: -5%;
        left: 45%;
        }

        #left {
        top: -8px;
        right: 120%;
        }

        #left::before {
        top: 35%;
        left: 94%;
        }

        #right {
        top: -8px;
        left: 120%;
        }

        #right::before {
        top: 35%;
        left: -2%;
        }

        .hover-text {
        position: relative;
        display: inline-block;
        margin: 40px;
        font-family: Avenir;
        text-align: center;
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

