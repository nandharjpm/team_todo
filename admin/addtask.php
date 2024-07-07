<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/index.css">
    <title>Document</title>
</head> 

<body>
    <div class="glass">
        <h2>Assign Task</h2>
        <form id="assign-task-form" action="../database/dbaddtask.php" method="POST">
            <div class="input-container">
                <label for="task-emp-name">Employee Name</label>
                <input type="text" id="task-emp-name" name="empname" required>
            </div>
            <div class="input-container">
                <label for="task-emp-username">Employee Username</label>
                <input type="text" id="task-emp-username" name="empusername" required>
            </div>
            <div class="input-container">
                <label for="task-emp-id">Employee ID</label>
                <input type="text" id="task-emp-id" name="empid" required>
            </div>
            <div class="input-container">
                <label for="task">Task</label>
                <input type="text" id="task" name="task" required>
            </div>
            <button type="submit">Add Task</button>
        </form>
    </div>
</body>

</html>