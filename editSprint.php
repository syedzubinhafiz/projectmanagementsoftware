<?php

require_once('dbconnect.php');
$id = $_POST['submit'];

$sql = "SELECT * FROM sprint where id=$id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Sprint</title>

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

<form action="updateSprint.php" method="post" style="width: 100%; display: contents;">

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
  <label for="name" class="form__label"> Sprint Name:</label>
</div>

<div class="form__group field">
  <input
    type="date"
    class="form__field"
    placeholder="Start Date"
    name="start_date"
    id="start_date"
    value="<?php echo $row[2]; ?>"
    required
  />
  <label for="start_date" class="form__label">Start Date:</label>
</div>

<div class="form__group field">
  <input
    type="date"
    class="form__field"
    placeholder="End Date"
    name="end_date"
    id="end_date"
    value="<?php echo $row[3]; ?>"
    required
  />
  <label for="end_date" class="form__label">End Date:</label>
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
    ">Update Sprint</button>

</div>

</form>

</html>