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

            $sql = "SELECT * FROM purchase WHERE purchaseID='$sid'";
            $row = mysqli_query($conn, $sql);
            $result = mysqli_fetch_assoc($row);
            ?>
            <table border=1>
                <tr>
                <th>Purchase ID</th>
                <th>Brand</th>
                <th>Supplier</th>
                <th>Quantity</th>
                <th>Amount Paid</th>
                <th>Purchase Date</th>
                </tr>
                <tr>
                    <form action="purchase_update.php" method="post">
                        <td><input type="number" name = "purchaseID" readonly value= "<?php echo $result['purchaseID'] ?>"></td>
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
                        <td><label for="type">Quantity</label>
                        <input type="number" name = "quantity" value= "<?php echo $result['NoOfSuits']?>"></td><br><br>
                        <td><label for="amount">Amount</label>
                        <input type="amount" name="amount">
                        </td><br><br>
                        <td><input type="date" name = "pdate" value= "<?php echo $result['purchaseDate'] ?>"></td>
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