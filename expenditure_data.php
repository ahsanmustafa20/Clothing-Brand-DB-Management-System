<html>
    <title>

    </title><link rel="stylesheet" type="text/css" href="styles.css">
    <body>
    <a href="Home.php">Home Page</a>
        <center>
            <h1>
                Expenditure List
            </h1>

            <?php
            $conn = mysqli_connect('127.0.0.1','root','','project1');
            if( !$conn)
            {
                die("Connection Failed: ".mysqli_connect_error());
            }
            ?>
            <table border=1>
                <tr>
                <th>ID</th>
                <th>Date</th>
                <th>Amount</th>
                <th>Remarks</th>
                <th>Actions</th>
                </tr>


            <?php
            $sql = "SELECT * FROM expenditure";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_array($result)) { ?>
                <tr>
                    <td><?php echo $row['expenditureID']?></td>
                    <td><?php echo $row['exdate']?></td>
                    <td><?php echo $row['amount']?></td>
                    <td><?php echo $row['remarks']?></td>
                    <td><a href="expenditure_edit.php?id=<?php echo $row['expenditureID'] ?>">EDIT</a>||
                    <a href="expenditure_delete.php?id=<?php echo $row['expenditureID'] ?>">DELETE</a></td>
            </tr>

            <?php }
            mysqli_close($conn);

            ?>
            </table>
            <a href="expenditure_insert.php">INSERT NEW EXPENDITURE</a>

        </center>
    </body>
</html>