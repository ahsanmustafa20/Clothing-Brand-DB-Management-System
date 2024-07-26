<html>
    <title>

    </title><link rel="stylesheet" type="text/css" href="styles.css">
    <body>
    <a href="Home.php">Home Page</a>
        <center>
            <h1>
                Product List
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
                <th>Product ID</th>
                <th>Brand ID</th>
                <th>Supplier ID</th>
                <th>Type</th>
                <th>Category Number</th>
                <th>Material</th>
                <th>Color</th>
                <th>Buying Price</th>
                <th>Description</th>
                <th>Actions</th>
                </tr>


            <?php
            $sql = "SELECT * FROM product";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_array($result)) { ?>
                <tr>
                    <td><?php echo $row['productID']?></td>
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
                    <td><?php echo $row['type']?></td>
                    <td><?php echo $row['category']?></td>
                    <td><?php echo $row['Material']?></td>
                    <td><?php echo $row['color']?></td>
                    <td><?php echo $row['buyingPrice']?></td>
                    <td><?php echo $row['description']?></td>
                    <td><a href="product_edit.php?id=<?php echo $row['productID'] ?>">EDIT</a>||
                    <a href="product_delete.php?id=<?php echo $row['productID'] ?>">DELETE</a></td>
            </tr>

            <?php }
            mysqli_close($conn);

            ?>
            </table>
            <a href="product_insert.php">INSERT NEW PRODUCT</a>

        </center>
    </body>
</html>