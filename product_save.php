<html>
    <head>
        <title>
            Saved
        </title>
    </head>
    <body>
        <?php  
        
        $conn = mysqli_connect('127.0.0.1','root','','project1');

        if( !$conn)
        {
            die("Connection Failed: ".mysqli_connect_error());
        }

        $id = mysqli_real_escape_string($conn, $_POST['productID']);
        $bid = mysqli_real_escape_string($conn, $_POST['brandID']);
        $sid = mysqli_real_escape_string($conn, $_POST['supplierID']);
        $type = mysqli_real_escape_string($conn, $_POST['type']);
        $category = mysqli_real_escape_string($conn, $_POST['category']);
        $material = mysqli_real_escape_string($conn, $_POST['material']);
        $color = mysqli_real_escape_string($conn, $_POST['color']);
        $buyingPrice = mysqli_real_escape_string($conn, $_POST['buyingPrice']);
        $description = mysqli_real_escape_string($conn, $_POST['description']);

        $insert = "INSERT INTO product (productID, brandID, supplierID, type, category, material, color, buyingPrice, description)
         VALUES ('$id', '$bid', '$sid','$type', '$category', '$material', '$color', '$buyingPrice', '$description')";

        if( mysqli_query($conn, $insert))
        {
            echo "INSERTION SUCCESSFUL!!!";
            header("location: product_data.php");}
        else
        {
            echo "INSERTION FAILED!!!";

        }
        mysqli_close($conn);
        
        
        ?>
    </body>
</html>