<html>
    <title>

    </title><link rel="stylesheet" type="text/css" href="styles.css">
    <body>
    <a href="Home.php">Home Page</a>
        <center>
            <h1>
                Purchase List
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
                <th>Purchase ID</th>
                <th>Brand</th>
                <th>Supplier</th>
                <th>Quantity</th>
                <th>Amount Paid</th>
                <th>Purchase Date</th>
                <th>Actions</th>
                </tr>


            <?php
            $sql = "SELECT * FROM purchase";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_array($result)) { ?>
                <tr>
                    <td><?php echo $row['purchaseID']?></td>
                    <?php 
                    $b = $row['brandID'];
                    $a = mysqli_query($conn, "SELECT * FROM brand WHERE brandID = $b");
                    $x = mysqli_fetch_assoc($a); ?>
                    <td><?php echo $x['name'] ?></td>
                    <?php 
                    $y = $row['supplierID'];
                    $t = mysqli_query($conn, "SELECT * FROM supplier WHERE supplierID = $y");
                    $p = mysqli_fetch_assoc($t); ?>
                    <td><?php echo $p['name']?></td>
                    <td><?php echo $row['NoOfSuits']?></td>
                    <td><?php echo $row['amountPaid']?></td>
                    <td><?php echo $row['purchaseDate']?></td>
                    <td><a href="purchase_edit.php?id=<?php echo $row['purchaseID'] ?>">EDIT</a>||
                    <a href="purchase_delete.php?id=<?php echo $row['purchaseID'] ?>">DELETE</a></td>
            </tr>

            <?php }
            mysqli_close($conn);

            ?>
            </table>
            <a href="purchase_insert.php">INSERT NEW PURCHASE</a>

        </center>
    </body>
</html>