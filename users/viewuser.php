<?php

include '../database/config.php';

$sql = $conn->prepare("SELECT Emp_Name, Emp_ID, Emp_username, Task, Emp_status FROM useradd WHERE Emp_status=0");
$sql->execute();
$result = $sql->fetchAll(PDO::FETCH_ASSOC);

if (!empty($result)) {
?>
    <table border="1" align="center">
        <thead>
            <tr>
                <th>Employee Name</th>
                <th>Employee ID</th>
                <th>Employee User Name</th>
                <th>Assigned Task</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($result as $row) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($row['Emp_Name']) . "</td>";
                echo "<td>" . htmlspecialchars($row['Emp_ID']) . "</td>";
                echo "<td>" . htmlspecialchars($row['Emp_username']) . "</td>";
                echo "<td>" . htmlspecialchars($row['Task']) . "</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
<?php
} else {
    echo "No data Found";
}
?>
