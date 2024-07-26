<html>
    <head>
        <title>
            Product Insertion
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

            <h1>Product data Entry</h1>
            <form action="product_save.php" method="post">
                <label for="productID">Product ID: </label>
                <input type="number" name ='productID' id='productID'><br><br>

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

                <label for="type">Type</label>
                <select name="type" id="type">
                    <option value="Plain">Plain</option>
                    <option value="Designed">Designed</option>
                    <option value="Embroidered">Embroidered</option>
                </select><br><br>

                <label for="category">Category</label>
                <select name="category" id="category">
                    <option value="Stitched">Stitched</option>
                    <option value="Unstitched">unstitched</option>
                </select><br><br>

                <label for="material">Fabric Material</label>
                <input type="text" name="material" id="material"><br><br>

                <label for="color">Color</label>
                <input type="text" name="color" id="color"><br><br>

                <label for="buyingPrice">Buying Price</label>
                <input type="number" name="buyingPrice" id="buyingPrice"><br><br>

                <label for="description">Description</label>
                <input type="text" name="description" id="description"><br><br>

                <button type="submit">SUBMIT</button>
            </form>
        </center>
    </body>
</html>