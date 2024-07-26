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

        $sql = "UPDATE product SET productID = '$id', brandID = '$bid',
        supplierID = '$sid', type = '$type', category = '$category',
        material = '$material', color = '$color', buyingPrice = '$buyingPrice', description = '$description' WHERE productID = '$id'";

        if( mysqli_query($conn, $sql))
        {
            echo "UPDATED SUCCESSFUL!!!";
            header("location: product_data.php");
        }
        else
        {
            echo "UPDATE FAILED!!!";
        }
        mysqli_close($conn);
        
        
        ?>
    </body>
</html>