<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin.css">
    <title>Admin Page</title>
    <link rel="stylesheet" href="../css/admin.css">
</head>

<body>

    <div class="admin-container">
        <div style="display: flex;">
            <a href="../users/viewuser.php"><button class="vu">View Users</button></a>
            <div style="margin-left: 20px;">
                <a href="../admin/addtask.php"><button class="vu">Add Task</button></a>
            </div>
            <div style="margin-left: 20px;">
                <a href="activeinactive.php"><button class="vu">Block Users</button></a>
            </div>
        </div>
        <div class="glass">
            <h2>Add User</h2>
            <form id="add-user-form" action="../database/dbadduser.php" method="POST">
                <div class="input-container">
                    <label for="emp-name">Employee Name</label>
                    <input type="text" id="emp-name" name="empname" required>
                </div>
                <div class="input-container">
                    <label for="emp-username">Employee Username</label>
                    <input type="text" id="emp-username" name="empusername" required>
                </div>
                <div class="input-container">
                    <label for="emp-id">Employee ID</label>
                    <input type="text" id="emp-id" name="empid" required>
                </div>
                <div class="input-container">
                    <label for="emp-password">Employee Password</label>
                    <input type="password" id="emp-password" name="emppassword" required>
                </div>
                <button type="submit">Add User</button>
            </form>
        </div>
    </div>
</body>

</html>