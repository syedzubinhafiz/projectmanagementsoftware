<?php

require_once('dbconnect.php');
$name = $_POST['submit'];

$sql = "SELECT * FROM employee where name='$name'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Employee</title>

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

<form action="updateEmployee.php" method="post" style="width: 100%; display: contents;">

<div class="form__group field">
  <input
    type="input"
    class="form__field"
    placeholder="Name"
    name="name"
    id="name"
    value="<?php echo $row[0]; ?>"
    required
  />
  <label for="name" class="form__label">Name:</label>
</div>

<div class="form__group field">
  <input
    type="email"
    class="form__field"
    placeholder="Email"
    name="email"
    id="email"
    value="<?php echo $row[1]; ?>"
    required
  />
  <label for="email" class="form__label">Email:</label>
</div>


<div>
    <button type="submit" 
    name="submit"
    value="<?php echo $name; ?>"
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
    ">Update Employee</button>

</div>

</form>

</html>