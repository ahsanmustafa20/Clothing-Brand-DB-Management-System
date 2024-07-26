<html>
    <title>

    </title><link rel="stylesheet" type="text/css" href="styles.css">
    <body>
    <a href="Home.php">Home Page</a>
        <center>
            <h1>
                Customers List
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
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Phone Number</th>
                <th>Address</th>
                <th>Gender</th>
                <th>Date Joined</th>
                <th>Remarks</th>
                <th>Actions</th>
                </tr>


            <?php
            $sql = "SELECT * FROM customer";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_array($result)) { ?>
                <tr>
                    <td><?php echo $row['customerID']?></td>
                    <td><?php echo $row['fname']?></td>
                    <td><?php echo $row['lname']?></td>
                    <td><?php echo $row['email']?></td>
                    <td><?php echo $row['phone']?></td>
                    <td><?php echo $row['address']?></td>
                    <td><?php echo $row['gender']?></td>
                    <td><?php echo $row['datejoined']?></td>
                    <td><?php echo $row['remarks']?></td>
                    <td><a href="customer_edit.php?id=<?php echo $row['customerID'] ?>">EDIT</a>||
                    <a href="customer_delete.php?id=<?php echo $row['customerID'] ?>">DELETE</a></td>
            </tr>

            <?php }
            mysqli_close($conn);

            ?>
            </table>
            <a href="customer_insert.php">INSERT NEW CUSTOMERS</a>

        </center>
    </body>
</html>