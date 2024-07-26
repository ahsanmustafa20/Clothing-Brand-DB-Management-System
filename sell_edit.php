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

            $product = mysqli_query($conn, "SELECT * FROM product");
            $customer = mysqli_query($conn, "SELECT * FROM customer");
                
                

            $sql = "SELECT * FROM sell WHERE sellID='$sid'";
            $row = mysqli_query($conn, $sql);
            $result = mysqli_fetch_assoc($row);
            ?>
            <table border=1>
                <tr>
                <th>Sell ID</th>
                <th>Product ID</th>
                <th>Customer</th>
                <th>Selling Price</th>
                <th>Date</th>
                </tr>
                <tr>
                    <form action="sell_update.php" method="post">
                        <td><input type="number" name = "sellID" readonly value= "<?php echo $result['sellID'] ?>"></td>
                        <td><label for="productID">product Name: </label>
                        <select name="productID" id="brandID">
                        <?php while($b = mysqli_fetch_array($product))
                        {?>
                        <option value=<?php echo $b['productID'] ?>><?php echo $b['productID'] ?></option>
                    
                        <?php } ?>
                    
                        </select></td><br><br>
                        <td><label for="customerID">Customer Name: </label>
                        <select name="customerID" id="customerID">
                        <?php while($s = mysqli_fetch_array($customer))
                        {?>
                        <option value=<?php echo $s['customerID'] ?>><?php echo $s['fname'] ?> <?php echo $s['lname'] ?> </option>
                        <?php } ?>
                        </select></td><br><br>

                        <td><input type="number" name = 'sellingprice' value ="<?php echo $result['sellingprice'] ?>"></td>
                        <td><input type="date" name = "purchasedate" value= "<?php echo $result['purchasedate']?>"></td>
     
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