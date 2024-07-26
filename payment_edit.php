<html>
    <head>
        <title>

        </title><link rel="stylesheet" type="text/css" href="styles.css">
    </head>
    <body>
    <a href="Home.php">Home Page</a>
        <center>

            <?php

            $sid = $_GET['id'];
            $conn = mysqli_connect('127.0.0.1','root','','project1');
            if( !$conn)
            {
                die("Connection Failed: ".mysqli_connect_error());
            }

            $sql = "SELECT * FROM payment WHERE paymentID='$sid'";
            $customer = mysqli_query($conn,"SELECT * FROM customer");
            $row = mysqli_query($conn, $sql);
            $result = mysqli_fetch_assoc($row);
            ?>
            <table border=1>
                <tr>
                    <th>Payment ID</th>
                    <th>Customer</th>
                    <th>Payment date</th>
                    <th>Amount</th>
                </tr>
                <tr>
                    <form action="payment_update.php" method="post">
                        <td><input type="number" name = "paymentID" readonly value= "<?php echo $result['paymentID'] ?>"></td>
                        <td>
                        <select name="customerID" id="customerID">
                            <?php
                            while($result = mysqli_fetch_array($customer)){?>
                            <option value="<?php echo $result['customerID'] ?>"><?php echo $result['fname'] ?> <?php echo $result['lname'] ?></option>
                            <?php }
                            ?>
                        </select></td><br><br>
                        <td><input type="date" name = "paymentdate" value= "<?php echo $result['paymentdate'] ?>"></td>
                        <td><input type="number" name = "amount" value= "<?php echo $result['amount'] ?>"></td>
                </tr>
                <tr>
                    <td colspan="8" align="center"><input type="submit" name="save" value="Save" /></td>
                    </form> 
                </tr>
            </table>
            <?php mysqli_close($conn); ?>
        </center>
    </body>
</html>