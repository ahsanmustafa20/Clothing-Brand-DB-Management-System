<html>
    <title>

    </title><link rel="stylesheet" type="text/css" href="styles.css">
    <body>
    <a href="Home.php">Home Page</a>
        <center>
            <h1>
                Payment List
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
                <th>Payment ID</th>
                <th>Customer ID</th>
                <th>Customer Name</th>
                <th>Payment Date</th>
                <th>Amount</th>
                <th>Actions</th>
                </tr>


            <?php
            $sql = "SELECT * FROM payment p JOIN customer c ON p.customerID = c.customerID";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_array($result)) { ?>
                <tr>
                    <td><?php echo $row['paymentID']?></td>
                    <td><?php echo $row['customerID']?></td>

                    <td><?php echo $row['fname'] ?>  <?php echo $row['lname'] ?></td>
                    <td><?php echo $row['paymentdate']?></td>
                    <td><?php echo $row['amount']?></td>
                    <td><a href="payment_edit.php?id=<?php echo $row['paymentID'] ?>">EDIT</a>||
                    <a href="payment_delete.php?id=<?php echo $row['paymentID'] ?>">DELETE</a></td>
            </tr>

            <?php }
            mysqli_close($conn);

            ?>
            </table>
            <a href="payment_insert.php">INSERT NEW PAYMENT</a>

        </center>
    </body>
</html>