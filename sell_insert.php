<html>
    <head>
        <title>
            Sell Insertion
        </title><link rel="stylesheet" type="text/css" href="styles.css">
    </head>
    <body>
    <a href="Home.php">Home Page</a>
        <?php
                $conn = mysqli_connect('127.0.0.1','root','','project1');

                if( !$conn )
                {
                    die("Connection failed: ".mysqli_connect_error());
                }

                $customer = mysqli_query($conn, "SELECT * FROM customer");
                $product = mysqli_query($conn, "SELECT * FROM product");

                mysqli_close($conn);
                ?>
        <center>
            <h1>Sell data Entry</h1>
            <form action="sell_save.php" method="post">
                
                <label for="sellID">Sell ID: </label>
                <input type="number" name="sellID" id="sellID"><br><br>

                <label for="productID">Product: </label>
                <select name="productID" id="productID">
                    <?php while($p = mysqli_fetch_array($product))
                    { ?>
                    <option value=<?php echo $p['productID'] ?>><?php echo $p['productID'] ?> </option>
                    
                    <?php } ?>
                    
                </select><br><br>

                <label for="customerID">Customer Name: </label>
                <select name="customerID" id="customerID">
                    <?php while($b = mysqli_fetch_array($customer))
                    { ?>
                    <option value=<?php echo $b['customerID'] ?>><?php echo $b['fname'] ?>  <?php echo $b['lname'] ?></option>
                    
                    <?php } ?>
                    
                </select><br><br>

                <label for="sellingprice">Selling Price: </label>
                <input type="number" name="sellingprice" id="sellingprice"><br><br>

                <label for="purchasedate">Date: </label>
                <input type="date" name="purchasedate" id="purchasedate"><br><br>

                <button type="submit">SUBMIT</button>

            </form>
        </center>
    </body>
</html>