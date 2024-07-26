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

            $sql = "SELECT * FROM supplier WHERE supplierID='$sid'";
            $row = mysqli_query($conn, $sql);
            $result = mysqli_fetch_assoc($row);
            ?>
            <table border=1>
                <tr>
                    <th>ID</th>
                    <th>Supplier Name</th>
                    <th>Location</th>
                    <th>Phone Number</th>
                </tr>
                <tr>
                    <form action="supplier_update.php" method="post">
                        <td><input type="number" name = "supplierID" readonly value= "<?php echo $result['supplierID'] ?>"></td>
                        <td><input type="text" name = "name" value= "<?php echo $result['name'] ?>"></td>
                        <td><input type="text" name = "location" value= "<?php echo $result['location'] ?>"></td>
                        <td><input type="text" name = "contact" value= "<?php echo $result['contact'] ?>"></td>
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