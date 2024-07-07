<?php

include 'config.php';

if (isset($_POST['task']) && isset($_POST['empid'])) {
    try {
        $sql = $conn->prepare("UPDATE useradd SET Task = :task WHERE Emp_ID = :empid");
        $sql->bindParam(':task', $_POST['task']);
        $sql->bindParam(':empid', $_POST['empid']);
        $sql->execute();

        $sql_fetch = $conn->prepare("SELECT Emp_Name, Emp_ID, Task FROM useradd");
        $sql_fetch->execute();

        $result = $sql_fetch->fetchAll(PDO::FETCH_ASSOC);

        if (!empty($result)) {
?>
            <table border="1" align="center">
                <thead>
                    <tr>
                        <th>Employee Name</th> 
                        <th>Employee ID</th>
                        <th>Task</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($result as $row) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($row['Emp_Name']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['Emp_ID']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['Task']) . "</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
<?php
        } else {
            echo "No Task has been Assigned";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "Task or Employee ID not set";
}
?>
