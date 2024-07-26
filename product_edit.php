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

            $brand = mysqli_query($conn, "SELECT * FROM brand");
                
            $supplier = mysqli_query($conn, "SELECT * FROM supplier");

            $sql = "SELECT * FROM product WHERE productID='$sid'";
            $row = mysqli_query($conn, $sql);
            $result = mysqli_fetch_assoc($row);
            ?>
            <table border=1>
                <tr>
                <th>Product ID</th>
                <th>Brand ID</th>
                <th>Supplier ID</th>
                <th>Type</th>
                <th>Category</th>
                <th>Material</th>
                <th>Color</th>
                <th>Buying Price</th>
                <th>Description</th>
                </tr>
                <tr>
                    <form action="product_update.php" method="post">
                        <td><input type="number" name = "productID" readonly value= "<?php echo $result['productID'] ?>"></td>
                        <td><label for="brandID">Brand Name: </label>
                        <select name="brandID" id="brandID">
                        <?php while($b = mysqli_fetch_array($brand))
                        {?>
                        <option value=<?php echo $b['brandID'] ?>><?php echo $b['name'] ?></option>
                    
                        <?php } ?>
                    
                        </select></td><br><br>
                        <td><label for="supplierID">Supplier Name: </label>
                        <select name="supplierID" id="supplierID">
                        <?php while($s = mysqli_fetch_array($supplier))
                        {?>
                        <option value=<?php echo $s['supplierID'] ?>><?php echo $s['name'] ?></option>
                        <?php } ?>
                    
                        </select></td><br><br>
                        <td><label for="type">Type</label>
                        <select name="type" id="type">
                            <option value="Plain">Plain</option>
                            <option value="Designed">Designed</option>
                            <option value="Embroidered">Embroidered</option>
                        </select></td><br><br>

                        <td><label for="category">Category</label>
                        <select name="category" id="category">
                            <option value="Stitched">Stitched</option>
                            <option value="Unstitched">unstitched</option>
                        </select></td><br><br>
                        <td><input type="text" name = "material" value= "<?php echo $result['Material'] ?>"></td>
                        <td><input type="text" name = "color" value= "<?php echo $result['color'] ?>"></td>
                        <td><input type="number" name = "buyingPrice" value= "<?php echo $result['buyingPrice'] ?>"></td>
                        <td><input type="text" name = "description" value= "<?php echo $result['description'] ?>"></td>
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