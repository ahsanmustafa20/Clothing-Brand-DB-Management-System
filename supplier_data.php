<html>
    <title>

    </title><link rel="stylesheet" type="text/css" href="styles.css">
    <body>
    <a href="Home.php">Home Page</a>
        <center>
            <h1>
                Supplier List
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
                <th>Supplier Name</th>
                <th>Location</th>
                <th>Phone Number</th>
                <th>Actions</th>
                </tr>


            <?php
            $sql = "SELECT * FROM supplier";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_array($result)) { ?>
                <tr>
                    <td><?php echo $row['supplierID']?></td>
                    <td><?php echo $row['name']?></td>
                    <td><?php echo $row['location']?></td>
                    <td><?php echo $row['contact']?></td>
                    <td><a href="supplier_edit.php?id=<?php echo $row['supplierID'] ?>">EDIT</a>||
                    <a href="supplier_delete.php?id=<?php echo $row['supplierID'] ?>">DELETE</a></td>
            </tr>

            <?php }
            mysqli_close($conn);

            ?>
            </table>
            <a href="supplier_insert.php">INSERT NEW SUPPLIER</a>

        </center>
    </body>
</html>