<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee List</title>
</head>

<body>
    <?php
    include '../database/config.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['emp_id']) && isset($_POST['action'])) {
        $emp_id = $_POST['emp_id'];
        $action = $_POST['action'] === 'Deactivate' ? 1 : 0;

        $update_sql = $conn->prepare("UPDATE useradd SET Emp_status = :status WHERE Emp_ID = :emp_id");
        $update_sql->bindParam(':status', $action, PDO::PARAM_INT);
        $update_sql->bindParam(':emp_id', $emp_id, PDO::PARAM_INT);
        $update_sql->execute();
    }

    $sql = $conn->prepare("SELECT Emp_Name, Emp_ID, Emp_username, Emp_status FROM useradd");
    $sql->execute();
    $result = $sql->fetchAll(PDO::FETCH_ASSOC);
    ?>
    <table border="1" align="center" style="border-collapse: collapse;">
        <thead>
            <tr>
                <th>Employee Name</th>
                <th>Employee ID</th>
                <th>Employee User Name</th>
                <th>Employee Activation Status</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($result as $row) {
                $button_text = $row['Emp_status'] == 0 ? 'Deactivate' : 'Activate';
                echo "<tr>";
                echo "<td>" . htmlspecialchars($row['Emp_Name']) . "</td>";
                echo "<td>" . htmlspecialchars($row['Emp_ID']) . "</td>";
                echo "<td>" . htmlspecialchars($row['Emp_username']) . "</td>";
                echo "<td>
                    <form method='POST'>
                        <input type='hidden' name='emp_id' value='" . htmlspecialchars($row['Emp_ID']) . "'>
                        <input type='submit' name='action' value='" . $button_text . "'>
                    </form>
                </td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</body>

</html>
