<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Task</title>

    <link rel="stylesheet" href="task_creation_input.css" />
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

<form action="insertTask.php" method="post" style="width: 100%; display: contents;">

<div class="form__group field">
  <input
    type="input"
    class="form__field"
    placeholder="Name"
    name="name"
    id="name"
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
    required
  />
  <label for="description" class="form__label">Description:</label>
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
    <option value="Story">Story</option>
    <option value="Bug">Bug</option>
  </select>
</div>

<div class="form__group field">
  <input type="input" class="form__field_alt" name="tag_" id="tag_"  />
  <label for="tag_" class="form__label">Task Tag:</label>
  <select name="tag">
    <option value="UI">UI</option>
    <option value="Testing">Testing</option>
    <option value="Critical">Critical</option>
  </select>
</div>

<div class="form__group field">
  <input type="input" class="form__field_alt" name="progress_" id="progress_" />
  <label for="progress_" class="form__label">Task Tag:</label>
  <select name="progress">
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
    
  />
  <label for="story_point" class="form__label">Story Point:</label>
</div>

<div>
    <button type="submit" style="
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
    ">Add Task</button>
</div>

</form>


</html>