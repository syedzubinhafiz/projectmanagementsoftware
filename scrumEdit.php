<?php

require_once('dbconnect.php');
$id = $_POST['submit'];

$sql = "SELECT * FROM task where id=$id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Task</title>

    <link rel="stylesheet" href="task_creation_input.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        select {
        font-size: inherit;
        color: rgb(13, 15, 15);
        position: relative;
        bottom: 36px;
        margin-left: 0px;
        border: none;
        background: none;
        }
        button:hover {
          box-shadow: 0px 5px 5px #00000400;
        }
    </style>
</head>

<form action="scrumTaskUpdate.php" method="post" style="width: 100%; display: contents;">

<div class="form__group field">
  <input
    type="input"
    class="form__field"
    placeholder="Name"
    name="name"
    id="name"
    value="<?php echo $row[1]; ?>"
    required
  />
  <label for="name" class="form__label"> Task Name:</label>
</div>

<div class="form__group field">
  <input
    type="input"
    class="form__field"
    placeholder="Task Description"
    name="description"
    id="description"
    value="<?php echo $row[2]; ?>"
    required
  />
  <label for="description" class="form__label">Description:</label>
</div>

<div class="form__group field">
  <input
    type="input"
    class="form__field_alt"
    name="assign_"
    id="assign_"
    
  />
  <label for="assign_" class="form__label">Assigned to:</label>
  <select name="assigned_to">
    <option value="<?php echo $row[5]; ?>" selected disabled hidden><?php echo $row[5]; ?></option>
    <option value="Unassigned">Unassigned</option>
    <?php
        require_once("dbconnect.php");
        $sql_ = "SELECT * FROM employee;";
        $result_ = mysqli_query($conn, $sql_);
        
        if(mysqli_num_rows($result_) > 0){
            while($row_ = mysqli_fetch_array($result_)){
                ?>
                <option value="<?php echo $row_[0] ?>"><?php echo $row_[0] ?></option>
                <?php
            }
        }
        ?>
  </select>
</div>

<div class="form__group field">
  <input
    type="input"
    class="form__field_alt"
    name="type_"
    id="type_"
    
  />
  <label for="type_" class="form__label">Task Type:</label>
  <select name="type">
    <option value="<?php echo $row[3]; ?>" selected disabled hidden><?php echo $row[3]; ?></option>
    <option value="Story">Story</option>
    <option value="Bug">Bug</option>
  </select>
</div>

<div class="form__group field">
  <input type="input" class="form__field_alt" name="tag_" id="tag_"  />
  <label for="tag_" class="form__label">Task Tag:</label>
  <select name="tag">
    <option value="<?php echo $row[4]; ?>" selected disabled hidden><?php echo $row[4]; ?></option>
    <option value="UI">UI</option>
    <option value="Testing">Testing</option>
    <option value="Critical">Critical</option>
  </select>
</div>

<div class="form__group field">
  <input type="input" class="form__field_alt" name="progress_" id="progress_" />
  <label for="progress_" class="form__label">Task Tag:</label>
  <select name="progress">
    <option value="<?php echo $row[6]; ?>" selected disabled hidden><?php echo $row[6]; ?></option>
    <option value="Not Started">Not Started</option>
    <option value="In Progress">In Progress</option>
    <option value="Completed">Completed</option>
  </select>
</div>

<div class="form__group field">
  <input
    type="input"
    class="form__field_alt"
    name="priority_"
    id="priority_"
    
  />
  <label for="priority_" class="form__label">Task Priority:</label>
  <select name="priority">
    <option value="<?php echo $row[7]; ?>" selected disabled hidden><?php echo explode(" ", $row[7])[1]; ?></option>
    <option value="1 Low">Low</option>
    <option value="2 Medium">Medium</option>
    <option value="3 High">High</option>
    <option value="4 Critical">Critical</option>
  </select>
</div>

<div class="form__group field">
  <input
    type="input"
    class="form__field"
    placeholder="0-100"
    name="story_point"
    id="story_point"
    value="<?php echo $row[8]; ?>"
    
  />
  <label for="story_point" class="form__label">Story Point:</label>
</div>

<div class="form__group field">
  <input
    type="date"
    class="form__field"
    placeholder="Start Date"
    name="s_date"
    id="s_date"
    required
  />
  <label for="s_date" class="form__label"> Start Date:</label>
</div>

<div class="form__group field">
  <input
    type="time"
    class="form__field"
    placeholder="Start Time"
    name="s_time"
    id="s_time"
    required
  />
  <label for="s_time" class="form__label"> Start Time:</label>
</div>

<div class="form__group field">
  <input
    type="time"
    class="form__field"
    placeholder="End Time"
    name="e_time"
    id="e_time"
    required
  />
  <label for="s_time" class="form__label"> End Time:</label>
</div>

<div>
    <button type="submit" 
    name="submit"
    value="<?php echo $id; ?>"
    style="
    background-color: rgb(0, 0, 0); 
    border: none; 
    color: white;
    padding-top: 25px;
    padding-bottom: 25px;
    padding-left: 50px;
    padding-right: 50px;
    margin: 25px;
    font-size: 30px;
    cursor: pointer;
    border-radius: 6px;
    font-family: 'Poppins', sans-serif;
    ">Update Task</button>

</div>

</form>

<form action="scrumTaskDelete.php" method="post" onsubmit="return confirm('Are you sure you want to delete task?')">
        <button type="submit" name="submit" value="<?php echo $id; ?>" style="border: none; background: none; cursor: pointer;"><i class="fa fa-trash" style="font-size: 40px;"></i></button>
    </form>

</html>