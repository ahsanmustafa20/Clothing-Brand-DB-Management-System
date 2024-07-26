<html>
    <head>
        <title>
            Purchase Insertion
        </title><link rel="stylesheet" type="text/css" href="styles.css">
    </head>
    <body>
    <a href="Home.php">Home Page</a>
        <center>
        <?php
                $conn = mysqli_connect('127.0.0.1','root','','project1');

                if( !$conn )
                {
                    die("Connection failed: ".mysqli_connect_error());
                }

                $brand = mysqli_query($conn, "SELECT * FROM brand");
                
                $supplier = mysqli_query($conn, "SELECT * FROM supplier");

                mysqli_close($conn);
                ?>

            <h1>Purchase data Entry</h1>
            <form action="purchase_save.php" method="post">
                <label for="purchaseID">Purchase ID: </label>
                <input type="number" name ='purchaseID' id='purchaseID'><br><br>

                <label for="brandID">Brand Name: </label>
                <select name="brandID" id="brandID">
                    <?php while($b = mysqli_fetch_array($brand))
                    {?>
                    <option value=<?php echo $b['brandID'] ?>><?php echo $b['name'] ?></option>
                    
                    <?php } ?>
                    
                </select><br><br>

                <label for="supplierID">Supplier Name: </label>
                <select name="supplierID" id="supplierID">
                    <?php while($s = mysqli_fetch_array($supplier))
                    {?>
                    <option value=<?php echo $s['supplierID'] ?>><?php echo $s['name'] ?></option>
                    
                    <?php } ?>
                    
                </select><br><br>

                <label for="suits">Quantity</label>
                <input type="number" name="suits" id="suits">
                <br><br>

                <label for="amount">Amount</label>
                <input type="amount" name="amount">
                <br><br>

                <label for="pdate">Purchase Date</label>
                <input type="date" name="pdate" ><br><br>

                <button type="submit">SUBMIT</button>
            </form>
        </center>
    </body>
</html>