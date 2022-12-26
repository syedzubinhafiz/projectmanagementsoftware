<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Task</title>
</head>
<body>
    <h1>Add Task</h1>

    <form action="insertTask.php" method="post">
        <div>
        <label for="name">Task Name: </label>
        <input type="text" name="name" placeholder="Enter task name">
        </div>

        <div>
        <label for="description">Task Description: </label>
        <input type="text" name="description" placeholder="Enter task description">
        </div>

        <div>
        <label for="type">Type: </label>
        <select name="type">
            <option value="Story">Story</option>
            <option value="Bug">Bug</option>
        </select>
        </div>

        <div>
        <label for="tag">Tag: </label>
        <select name="tag">
            <option value="UI">UI</option>
            <option value="Testing">Testing</option>
            <option value="Critical">Critical</option>
        </select>
        </div>

        <div>
        <label for="progress">Progress: </label>
        <select name="progress">
            <option value="Not Started">Not Started</option>
            <option value="In Progress">In Progres</option>
            <option value="Completed">Completed</option>
        </select>
        </div>

        <div>
        <label for="priority">Priority: </label>
        <select name="priority">
            <option value="1 Low">Low</option>
            <option value="2 Medium">Medium</option>
            <option value="3 High">High</option>
            <option value="4 Critical">Critical</option>
        </select>
        </div>

        <div>
        <label for="story_point">Story Point: </label>
        <input type="number" name="story_point" min="0" max="50">
        </div>

        <div>
        <button type="submit">Add task</button>
        </div>

    </form>
</body>
</html>