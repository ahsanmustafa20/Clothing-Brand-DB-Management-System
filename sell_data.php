<html>
    <title>

    </title><link rel="stylesheet" type="text/css" href="styles.css">
    <body>
    <a href="Home.php">Home Page</a>
        <center>
            <h1>
                Sell List
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
                <th>Sell ID</th>
                <th>Product ID</th>
                <th>Customer</th>
                <th>Selling Price</th>
                <th>Date</th>
                <th>Actions</th>
                </tr>

            <?php
            $sql = "SELECT * FROM sell";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_array($result)) { ?>
                <tr>
                    <td><?php echo $row['sellID'] ?></td>
                    <td><?php echo $row['productID']?></td>
                    <?php 
                    $c = $row['customerID'];
                    $a = mysqli_query($conn, "SELECT * FROM customer WHERE customerID = $c");
                    $x = mysqli_fetch_assoc($a); ?>
                    <td><?php echo $x['fname'] ?>  <?php echo $x['lname'] ?> </td>
                    <td><?php echo $row['sellingprice']?></td>
                    <td><?php echo $row['purchasedate']?></td>
   
                    <td><a href="sell_edit.php?id=<?php echo $row['sellID'] ?>">EDIT</a>||
                    <a href="sell_delete.php?id=<?php echo $row['sellID'] ?>">DELETE</a></td>
            </tr>

            <?php }
            mysqli_close($conn);

            ?>
            </table>
            <a href="sell_insert.php">INSERT NEW SELL</a>

        </center>
    </body>
</html>