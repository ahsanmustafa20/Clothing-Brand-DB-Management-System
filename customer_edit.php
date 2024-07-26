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

            $sql = "SELECT * FROM customer WHERE customerID='$sid'";
            $row = mysqli_query($conn, $sql);
            $result = mysqli_fetch_assoc($row);
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
                </tr>
                <tr>
                    <form action="customer_update.php" method="post">
                        <td><input type="number" name = "customerID" readonly value= "<?php echo $result['customerID'] ?>"></td>
                        <td><input type="text" name = "fname" value= "<?php echo $result['fname'] ?>"></td>
                        <td><input type="text" name = "lname" value= "<?php echo $result['lname'] ?>"></td>
                        <td><input type="text" name = "email" value= "<?php echo $result['email'] ?>"></td>
                        <td><input type="text" name = "phone" value= "<?php echo $result['phone'] ?>"></td>
                        <td><input type="text" name = "address" value= "<?php echo $result['address'] ?>"></td>
                        <td>
                            <select name="gender">
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Other">Other</option>
                            </select>
                        </td>
                        <td><input type="date" name = "datejoined" value= "<?php echo $result['datejoined'] ?>"></td>
                        <td><input type="text" name = "remarks" value= "<?php echo $result['remarks'] ?>"></td>
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